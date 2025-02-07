<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\PostsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\Posts\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\PostsImport;
use App\Models\Post;
use App\Models\Clinic;
use App\Models\BlogCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ClinicPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public function getter($req = null, $export = null , $clinic)
    {
        if ($req != null) {
            $clinic_posts =  $clinic->clinic_posts();
            if ($req->trash && $req->trash == 'with') {
                $clinic_posts =  $clinic_posts->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $clinic_posts =  $clinic_posts->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $clinic_posts = $clinic_posts->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $clinic_posts = $clinic_posts->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $clinic_posts = $clinic_posts->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $clinic_posts = $clinic_posts->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $clinic_posts = $clinic_posts->get();
                return $clinic_posts;
            }
            $clinic_posts = $clinic_posts->get();
            return $clinic_posts;
        }
        $clinic_posts = $clinic->clinic_posts()->withAll()->orderBy('id', 'desc')->get();
        return $clinic_posts;
    }


    /*********View All Posts  ***********/
    public function index(Request $request , Clinic $clinic)
    {
        $clinic_posts = $this->getter($request , null , $clinic);
        return view('super_admins.clinics.clinic_posts.index' , compact('clinic_posts' , 'clinic'));
    }

    /*********View Create Form of Post  ***********/
    public function create(Clinic $clinic)
    {
        $blog_categories = BlogCategory::active()->get();
        $tags = Tag::active()->get();
        
        return view('super_admins.clinics.clinic_posts.create', compact('blog_categories' , 'clinic' , 'tags'));
    }

    /*********Store Post  ***********/
    public function store(CreateRequest $request , Clinic $clinic)
    {
        
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $request->merge(['created_by_user_id'=>auth()->user()->id]);
            $data = $request->all();
            $data['image'] = uploadCroppedFile($request,'image','clinic_posts');
            $clinic_post = $clinic->clinic_posts()->create($data);
            $clinic_post->slug = Str::slug($clinic_post->name . ' ' . $clinic_post->id, '-');
            $clinic_post->save();
            $clinic_post = $clinic->clinic_posts()->withAll()->find($clinic_post->id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinic_posts.index' , $clinic->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinic_posts.index' , $clinic->id)->with('message', 'Post Created Successfully')->with('message_type', 'success');
    }

    /*********View Post  ***********/
    public function show(Clinic $clinic ,Post $clinic_post)
    {
        if($clinic->id != $clinic_post->clinic_id){
            return redirect()->back()->with('message', 'ClinicEducation Not Found')->with('message_type', 'error');
        }
        return view('super_admins.clinics.clinic_posts.show', compact('clinic_post' , 'clinic'));
    }

    /*********View Edit Form of Post  ***********/
    public function edit(Clinic $clinic ,Post $clinic_post)
    {
        if($clinic->id != $clinic_post->clinic_id){
            return redirect()->back()->with('message', 'ClinicEducation Not Found')->with('message_type', 'error');
        }
        $blog_categories = BlogCategory::active()->get();
        $tags = Tag::active()->get();
        return view('super_admins.clinics.clinic_posts.edit', compact('clinic_post','blog_categories' , 'clinic' , 'tags'));
    }

    /*********Update Post  ***********/
    public function update(CreateRequest $request,Clinic $clinic , Post $clinic_post)
    {
        if($clinic->id != $clinic_post->clinic_id){
            return redirect()->back()->with('message', 'ClinicEducation Not Found')->with('message_type', 'error');
        }
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $request->merge(['last_updated_by_user_id'=>auth()->user()->id]);
            $data = $request->all();
            if ($request->image) {
                $data['image'] = uploadCroppedFile($request,'image','clinic_posts',$clinic_post->image);
            } else {
                $data['image'] = $clinic_post->image;
            }
            $clinic_post->update($data);
            $clinic_post = Post::find($clinic_post->id);
            $slug = Str::slug($clinic_post->name . ' ' . $clinic_post->id, '-');
            $clinic_post->update([
                'slug' => $slug
            ]);
            $clinic_post->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinic_posts.index' , $clinic->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinic_posts.index' , $clinic->id)->with('message', 'Post Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $clinic_posts = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "clinic_posts." . $extension;
        return Excel::download(new PostsExport($clinic_posts), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new PostsImport, $file);
        return redirect()->back()->with('message', 'Post Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE Post ***********/
    public function destroy(Clinic $clinic ,Post $clinic_post)
    {
        if($clinic->id != $clinic_post->clinic_id){
            return redirect()->back()->with('message', 'ClinicEducation Not Found')->with('message_type', 'error');
        }
        $clinic_post->delete();
        return redirect()->back()->with('message', 'Post Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Post ***********/
    public function destroyPermanently(Request $request,Clinic $clinic ,$clinic_post)
    {
        if($clinic->id != $clinic_post->clinic_id){
            return redirect()->back()->with('message', 'ClinicEducation Not Found')->with('message_type', 'error');
        }
        $clinic_post = Post::withTrashed()->find($clinic_post);
        if ($clinic_post) {
            if ($clinic_post->trashed()) {
                if ($clinic_post->image && file_exists(public_path($clinic_post->image))) {
                    unlink(public_path($clinic_post->image));
                }
                $clinic_post->forceDelete();
                return redirect()->back()->with('message', 'Post Category Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Post Category is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Post Category Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Post***********/
    public function restore(Request $request,Clinic $clinic, $clinic_post)
    {
        if($clinic->id != $clinic_post->clinic_id){
            return redirect()->back()->with('message', 'ClinicEducation Not Found')->with('message_type', 'error');
        }
        $clinic_post = Post::withTrashed()->find($clinic_post);
        if ($clinic_post->trashed()) {
            $clinic_post->restore();
            return redirect()->back()->with('message', 'Post Category Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Post Category Not Found')->with('message_type', 'error');
        }
    }
}
