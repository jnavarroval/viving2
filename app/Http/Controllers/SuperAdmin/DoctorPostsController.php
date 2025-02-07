<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\PostsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\Posts\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\PostsImport;
use App\Models\Post;
use App\Models\Doctor;
use App\Models\BlogCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class DoctorPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public function getter($req = null, $export = null , $doctor)
    {
        if ($req != null) {
            $doctor_posts =  $doctor->doctor_posts();
            if ($req->trash && $req->trash == 'with') {
                $doctor_posts =  $doctor_posts->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $doctor_posts =  $doctor_posts->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $doctor_posts = $doctor_posts->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $doctor_posts = $doctor_posts->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $doctor_posts = $doctor_posts->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $doctor_posts = $doctor_posts->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $doctor_posts = $doctor_posts->get();
                return $doctor_posts;
            }
            $doctor_posts = $doctor_posts->get();
            return $doctor_posts;
        }
        $doctor_posts = $doctor->doctor_posts()->withAll()->orderBy('id', 'desc')->get();
        return $doctor_posts;
    }


    /*********View All Posts  ***********/
    public function index(Request $request , Doctor $doctor)
    {
        $doctor_posts = $this->getter($request , null , $doctor);
        return view('super_admins.doctors.doctor_posts.index' , compact('doctor_posts' , 'doctor'));
    }

    /*********View Create Form of Post  ***********/
    public function create(Doctor $doctor)
    {
        $blog_categories = BlogCategory::active()->get();
        $tags = Tag::active()->get();
        
        return view('super_admins.doctors.doctor_posts.create', compact('blog_categories' , 'doctor' , 'tags'));
    }

    /*********Store Post  ***********/
    public function store(CreateRequest $request , Doctor $doctor)
    {
        
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $request->merge(['created_by_user_id'=>auth()->user()->id]);
            $data = $request->all();
            $data['image'] = uploadCroppedFile($request,'image','doctor_posts');
            $doctor_post = $doctor->doctor_posts()->create($data);
            $doctor_post->slug = Str::slug($doctor_post->name . ' ' . $doctor_post->id, '-');
            $doctor_post->save();
            $doctor_post = $doctor->doctor_posts()->withAll()->find($doctor_post->id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_posts.index' , $doctor->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_posts.index' , $doctor->id)->with('message', 'Post Created Successfully')->with('message_type', 'success');
    }

    /*********View Post  ***********/
    public function show(Doctor $doctor ,Post $doctor_post)
    {
        if($doctor->id != $doctor_post->doctor_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        return view('super_admins.doctors.doctor_posts.show', compact('doctor_post' , 'doctor'));
    }

    /*********View Edit Form of Post  ***********/
    public function edit(Doctor $doctor ,Post $doctor_post)
    {
        if($doctor->id != $doctor_post->doctor_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        $blog_categories = BlogCategory::active()->get();
        $tags = Tag::active()->get();
        return view('super_admins.doctors.doctor_posts.edit', compact('doctor_post','blog_categories' , 'doctor' , 'tags'));
    }

    /*********Update Post  ***********/
    public function update(CreateRequest $request,Doctor $doctor , Post $doctor_post)
    {
        if($doctor->id != $doctor_post->doctor_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
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
                $data['image'] = uploadCroppedFile($request,'image','doctor_posts',$doctor_post->image);
            } else {
                $data['image'] = $doctor_post->image;
            }
            $doctor_post->update($data);
            $doctor_post = Post::find($doctor_post->id);
            $slug = Str::slug($doctor_post->name . ' ' . $doctor_post->id, '-');
            $doctor_post->update([
                'slug' => $slug
            ]);
            $doctor_post->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_posts.index' , $doctor->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_posts.index' , $doctor->id)->with('message', 'Post Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $doctor_posts = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "doctor_posts." . $extension;
        return Excel::download(new PostsExport($doctor_posts), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new PostsImport, $file);
        return redirect()->back()->with('message', 'Post Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE Post ***********/
    public function destroy(Doctor $doctor ,Post $doctor_post)
    {
        if($doctor->id != $doctor_post->doctor_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        $doctor_post->delete();
        return redirect()->back()->with('message', 'Post Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Post ***********/
    public function destroyPermanently(Request $request,Doctor $doctor ,$doctor_post)
    {
        if($doctor->id != $doctor_post->doctor_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        $doctor_post = Post::withTrashed()->find($doctor_post);
        if ($doctor_post) {
            if ($doctor_post->trashed()) {
                if ($doctor_post->image && file_exists(public_path($doctor_post->image))) {
                    unlink(public_path($doctor_post->image));
                }
                $doctor_post->forceDelete();
                return redirect()->back()->with('message', 'Post Category Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Post Category is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Post Category Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Post***********/
    public function restore(Request $request,Doctor $doctor, $doctor_post)
    {
        if($doctor->id != $doctor_post->doctor_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        $doctor_post = Post::withTrashed()->find($doctor_post);
        if ($doctor_post->trashed()) {
            $doctor_post->restore();
            return redirect()->back()->with('message', 'Post Category Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Post Category Not Found')->with('message_type', 'error');
        }
    }
}
