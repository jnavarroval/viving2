<?php

namespace App\Http\Controllers\Clinics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Clinics\ClinicPosts\CreateRequest;
use App\Http\Resources\Web\PostsResource;
use Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClinicPostsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('clinic');
        // $this->middleware('permission:clinic_posts.index');
        // $this->middleware('permission:clinic_posts.create',['only' => ['store']]);
        // $this->middleware('permission:clinic_posts.update',['only' => ['update']]);
        // $this->middleware('permission:clinic_posts.delete',['only' => ['destroy']]);
        // $this->middleware('permission:clinic_posts.export',['only' => ['export']]);
        // $this->middleware('permission:clinic_posts.import',['only' => ['import']])
        // $this->middleware('permission:clinic_posts.update|clinic_posts.is_active',['only' => ['updateStatus']]);
    }

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public function getter($req = null, $export = null)
    {
        $clinic = auth()->user()->clinic;
        if ($req != null) {
            $clinic_posts =  $clinic->clinic_posts()->withAll();
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
            if ($req->sort && $req->sort['field'] != null && $req->sort['type'] != null) {
                $clinic_posts = $clinic_posts->OrderBy($req->sort['field'], $req->sort['type']);
            } else {
                $clinic_posts = $clinic_posts->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $clinic_posts = $clinic_posts->get();
                return $clinic_posts;
            }
            $totalClinicPosts = $clinic_posts->count();
            $clinic_posts = $clinic_posts->paginate($req->perPage);
            $clinic_posts = PostsResource::collection($clinic_posts)->response()->getData(true);

            return $clinic_posts;
        }
        $clinic_posts = PostsResource::collection($clinic->clinic_posts()->withAll()->orderBy('id', 'desc')->paginate(10))->response()->getData(true);
        return $clinic_posts;
    }

    /********* FETCH ALL ClinicPosts ***********/
    public function index()
    {
        $clinic_posts =  $this->getter();
        $response = generateResponse($clinic_posts, count($clinic_posts['data']) > 0 ? true : false, 'ClinicPosts Fetched Successfully', null, 'collection');
        return response()->json($response, 200);
    }

    /********* FILTER ClinicPosts FOR Search ***********/
    public function filter(Request $request)
    {
        $clinic_posts = $this->getter($request);
        $response = generateResponse($clinic_posts, count($clinic_posts['data']) > 0 ? true : false, 'Filter ClinicPosts Successfully', null, 'collection');
        return response()->json($response, 200);
    }

    /********* ADD NEW ClinicPost ***********/
    public function store(CreateRequest $request)
    {
        $clinic = auth()->user()->clinic;
        try {
            DB::beginTransaction();
            $request->merge(['created_by_user_id' => auth()->user()->id]);
            $data = $request->all();
            $data['image'] = uploadCroppedFile($request, 'image', 'clinic_posts');
            $clinic_post = $clinic->clinic_posts()->create($data);
            $clinic_post->slug = Str::slug($clinic_post->name . ' ' . $clinic_post->id, '-');
            $clinic_post->save();
            $clinic_post = $clinic->clinic_posts()->withAll()->find($clinic_post->id);
            $clinic_post = new PostsResource($clinic_post);
            $clinic_post->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            request()->session()->flash('alert', ['message' => 'Invalid Request', 'type' => 'error']);
        }
        return redirect()->back();
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show($clinic_post)
    {
        $clinic = auth()->user()->clinic;
        if ($clinic_post->clinic_id != $clinic->id) {
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $clinic_post = $clinic->clinic_posts()->withAll()->find($clinic_post);
        if ($clinic_post) {
            $clinic_post = new PostsResource($clinic_post);
            $response = generateResponse($clinic_post, true, 'ClinicPost Fetched Successfully', null, 'object');
        } else {
            $response = generateResponse(null, false, 'ClinicPost Not FOund', null, 'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE ClinicPost ***********/
    public function update(CreateRequest $request, Post $clinic_post)
    {
        // dd($request->all());
        $clinic = auth()->user()->clinic;
        if ($clinic_post->clinic_id != $clinic->id) {
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        try {
            DB::beginTransaction();
            $request->merge(['last_updated_by_user_id' => auth()->user()->id]);
            $data = $request->all();
            if ($request->image) {
                $data['image'] = uploadCroppedFile($request, 'image', 'clinic_posts', $clinic_post->image);
            } else {
                $data['image'] = $clinic_post->image;
            }
            $clinic_post->update($data);
            $clinic_post = $clinic_post->find($clinic_post->id);
            $slug = Str::slug($clinic_post['name'] . ' ' . $clinic_post->id, '-');
            $clinic_post->update(
                [
                    'slug' => $slug
                ]
            );
            $clinic_post->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            request()->session()->flash('alert', ['message' => 'Invalid Request', 'type' => 'error']);
        }
        return redirect()->back();
    }

    /********* UPDATE ClinicPost Status***********/
    public function updateStatus(Request $request, Post $clinic_post)
    {
        $clinic = auth()->user()->clinic;
        if ($clinic_post->clinic_id != $clinic->id) {
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $clinic_post->update([
            'is_active' => $clinic_post->is_active == 1 ? 0 : 1
        ]);
        $response = generateResponse(null, true, 'ClinicPost Status Updated Successfully', null, 'object');
        return response()->json($response, 200);
    }


    /********* DELETE ClinicPost ***********/
    public function destroy(Request $request, Post $clinic_post)
    {
        $clinic = auth()->user()->clinic;
        if ($clinic_post->clinic_id != $clinic->id) {
            request()->session()->flash('alert', ['message' => 'Invalid Request', 'type' => 'error']);
            return redirect()->back();
        }
        if ($clinic_post->trashed()) {
            request()->session()->flash('alert', ['message' => 'Already in Trash', 'type' => 'error']);
        } else {
            $clinic_post->delete();
        }
        return redirect()->back();
    }
    /*********Permanently DELETE ClinicPost ***********/
    public function destroyPermanently(Request $request, $clinic_post)
    {
        $clinic = auth()->user()->clinic;
        $clinic_post = $clinic->clinic_posts()->withTrashed()->find($clinic_post);
        if ($clinic_post) {
            if ($clinic_post->clinic_id != $clinic->id) {
                return redirect()->back()->withErrors([
                    'message' => 'Invalid Request',
                    'type' => 'error'
                ]);
            }
            if ($clinic_post->trashed()) {
                $clinic_post->forceDelete();
                $response = generateResponse(null, true, 'ClinicPost Deleted Successfully', null, 'object');
            } else {
                $response = generateResponse(null, false, 'ClinicPost is not in trash to delete permanently', null, 'object');
            }
        } else {
            $response = generateResponse(null, false, 'ClinicPost not found', null, 'object');
        }
        return response()->json($response, 200);
    }
    /********* Restore ClinicPost ***********/
    public function restore(Request $request, $clinic_post)
    {
        $clinic = auth()->user()->clinic;
        $clinic_post = $clinic->clinic_posts()->withTrashed()->find($clinic_post);
        if ($clinic_post->trashed()) {
            $clinic_post->restore();
            $response = generateResponse(null, true, 'ClinicPost Restored Successfully', null, 'object');
        } else {
            $response = generateResponse(null, false, 'ClinicPost is not trashed', null, 'object');
        }
        return response()->json($response, 200);
    }
}
