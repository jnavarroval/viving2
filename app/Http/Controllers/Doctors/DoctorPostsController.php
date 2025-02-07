<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Doctors\DoctorPosts\CreateRequest;
use App\Http\Resources\Web\PostsResource;
use Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorPostsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('doctor');
        // $this->middleware('permission:doctor_posts.index');
        // $this->middleware('permission:doctor_posts.create',['only' => ['store']]);
        // $this->middleware('permission:doctor_posts.update',['only' => ['update']]);
        // $this->middleware('permission:doctor_posts.delete',['only' => ['destroy']]);
        // $this->middleware('permission:doctor_posts.export',['only' => ['export']]);
        // $this->middleware('permission:doctor_posts.import',['only' => ['import']])
        // $this->middleware('permission:doctor_posts.update|doctor_posts.is_active',['only' => ['updateStatus']]);
    }

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public function getter($req = null, $export = null)
    {
        $doctor = auth()->user()->doctor;
        if ($req != null) {
            $doctor_posts =  $doctor->doctor_posts()->withAll();
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
            if ($req->sort && $req->sort['field'] != null && $req->sort['type'] != null) {
                $doctor_posts = $doctor_posts->OrderBy($req->sort['field'], $req->sort['type']);
            } else {
                $doctor_posts = $doctor_posts->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $doctor_posts = $doctor_posts->get();
                return $doctor_posts;
            }
            $totalDoctorPosts = $doctor_posts->count();
            $doctor_posts = $doctor_posts->paginate($req->perPage);
            $doctor_posts = PostsResource::collection($doctor_posts)->response()->getData(true);

            return $doctor_posts;
        }
        $doctor_posts = PostsResource::collection($doctor->doctor_posts()->withAll()->orderBy('id', 'desc')->paginate(10))->response()->getData(true);
        return $doctor_posts;
    }

    /********* FETCH ALL DoctorPosts ***********/
    public function index()
    {
        $doctor_posts =  $this->getter();
        $response = generateResponse($doctor_posts, count($doctor_posts['data']) > 0 ? true : false, 'DoctorPosts Fetched Successfully', null, 'collection');
        return response()->json($response, 200);
    }

    /********* FILTER DoctorPosts FOR Search ***********/
    public function filter(Request $request)
    {
        $doctor_posts = $this->getter($request);
        $response = generateResponse($doctor_posts, count($doctor_posts['data']) > 0 ? true : false, 'Filter DoctorPosts Successfully', null, 'collection');
        return response()->json($response, 200);
    }

    /********* ADD NEW DoctorPost ***********/
    public function store(CreateRequest $request)
    {
        $doctor = auth()->user()->doctor;
        try {
            DB::beginTransaction();
            $request->merge(['created_by_user_id' => auth()->user()->id]);
            $data = $request->all();
            $data['image'] = uploadCroppedFile($request, 'image', 'doctor_posts');
            $doctor_post = $doctor->doctor_posts()->create($data);
            $doctor_post->slug = Str::slug($doctor_post->name . ' ' . $doctor_post->id, '-');
            $doctor_post->save();
            $doctor_post = $doctor->doctor_posts()->withAll()->find($doctor_post->id);
            $doctor_post = new PostsResource($doctor_post);
            $doctor_post->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            request()->session()->flash('alert', ['message' => 'Invalid Request', 'type' => 'error']);
        }
        return redirect()->back();
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show($doctor_post)
    {
        $doctor = auth()->user()->doctor;
        if ($doctor_post->doctor_id != $doctor->id) {
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $doctor_post = $doctor->doctor_posts()->withAll()->find($doctor_post);
        if ($doctor_post) {
            $doctor_post = new PostsResource($doctor_post);
            $response = generateResponse($doctor_post, true, 'DoctorPost Fetched Successfully', null, 'object');
        } else {
            $response = generateResponse(null, false, 'DoctorPost Not FOund', null, 'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE DoctorPost ***********/
    public function update(CreateRequest $request, Post $doctor_post)
    {
        // dd($request->all());
        $doctor = auth()->user()->doctor;
        if ($doctor_post->doctor_id != $doctor->id) {
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
                $data['image'] = uploadCroppedFile($request, 'image', 'doctor_posts', $doctor_post->image);
            } else {
                $data['image'] = $doctor_post->image;
            }
            $doctor_post->update($data);
            $doctor_post = $doctor_post->find($doctor_post->id);
            $slug = Str::slug($doctor_post['name'] . ' ' . $doctor_post->id, '-');
            $doctor_post->update(
                [
                    'slug' => $slug
                ]
            );
            $doctor_post->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            request()->session()->flash('alert', ['message' => 'Invalid Request', 'type' => 'error']);
        }
        return redirect()->back();
    }

    /********* UPDATE DoctorPost Status***********/
    public function updateStatus(Request $request, Post $doctor_post)
    {
        $doctor = auth()->user()->doctor;
        if ($doctor_post->doctor_id != $doctor->id) {
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $doctor_post->update([
            'is_active' => $doctor_post->is_active == 1 ? 0 : 1
        ]);
        $response = generateResponse(null, true, 'DoctorPost Status Updated Successfully', null, 'object');
        return response()->json($response, 200);
    }


    /********* DELETE DoctorPost ***********/
    public function destroy(Request $request, Post $doctor_post)
    {
        $doctor = auth()->user()->doctor;
        if ($doctor_post->doctor_id != $doctor->id) {
            request()->session()->flash('alert', ['message' => 'Invalid Request', 'type' => 'error']);
            return redirect()->back();
        }
        if ($doctor_post->trashed()) {
            request()->session()->flash('alert', ['message' => 'Already in Trash', 'type' => 'error']);
        } else {
            $doctor_post->delete();
        }
        return redirect()->back();
    }
    /*********Permanently DELETE DoctorPost ***********/
    public function destroyPermanently(Request $request, $doctor_post)
    {
        $doctor = auth()->user()->doctor;
        $doctor_post = $doctor->doctor_posts()->withTrashed()->find($doctor_post);
        if ($doctor_post) {
            if ($doctor_post->doctor_id != $doctor->id) {
                return redirect()->back()->withErrors([
                    'message' => 'Invalid Request',
                    'type' => 'error'
                ]);
            }
            if ($doctor_post->trashed()) {
                $doctor_post->forceDelete();
                $response = generateResponse(null, true, 'DoctorPost Deleted Successfully', null, 'object');
            } else {
                $response = generateResponse(null, false, 'DoctorPost is not in trash to delete permanently', null, 'object');
            }
        } else {
            $response = generateResponse(null, false, 'DoctorPost not found', null, 'object');
        }
        return response()->json($response, 200);
    }
    /********* Restore DoctorPost ***********/
    public function restore(Request $request, $doctor_post)
    {
        $doctor = auth()->user()->doctor;
        $doctor_post = $doctor->doctor_posts()->withTrashed()->find($doctor_post);
        if ($doctor_post->trashed()) {
            $doctor_post->restore();
            $response = generateResponse(null, true, 'DoctorPost Restored Successfully', null, 'object');
        } else {
            $response = generateResponse(null, false, 'DoctorPost is not trashed', null, 'object');
        }
        return response()->json($response, 200);
    }
}
