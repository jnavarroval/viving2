<?php

namespace App\Http\Controllers\Doctors;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Archive;
use App\Http\Requests\Doctors\DoctorArchives\CreateRequest;
use App\Http\Resources\Web\ArchivesResource;
use Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorArchivesController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('doctor');
      // $this->middleware('permission:doctor_archives.index');
      // $this->middleware('permission:doctor_archives.create',['only' => ['store']]);
      // $this->middleware('permission:doctor_archives.update',['only' => ['update']]);
      // $this->middleware('permission:doctor_archives.delete',['only' => ['destroy']]);
      // $this->middleware('permission:doctor_archives.export',['only' => ['export']]);
      // $this->middleware('permission:doctor_archives.import',['only' => ['import']])
      // $this->middleware('permission:doctor_archives.update|doctor_archives.is_active',['only' => ['updateStatus']]);
  }

  /********* Getter For Pagination, Searching And Sorting  ***********/
  public function getter($req = null,$export = null)
  {
    $doctor = auth()->user()->doctor;
    if($req != null){
      $doctor_archives =  $doctor->doctor_archives()->withAll();
      if($req->trash && $req->trash == 'with'){
        $doctor_archives =  $doctor_archives->withTrashed();
      }
      if($req->trash && $req->trash == 'only'){
        $doctor_archives =  $doctor_archives->onlyTrashed();
      }
      if($req->column && $req->column != null && $req->search != null){
          $doctor_archives = $doctor_archives->whereLike($req->column,$req->search);
        }
       else if($req->search && $req->search != null){

            $doctor_archives = $doctor_archives->whereLike(['name','description'],$req->search);
        }
      if($req->sort && $req->sort['field'] != null && $req->sort['type'] != null){
          $doctor_archives = $doctor_archives->OrderBy($req->sort['field'],$req->sort['type']);
      }
      else
      {
        $doctor_archives = $doctor_archives->OrderBy('id','desc');
      }
      if($export != null){ // for export do not paginate
        $doctor_archives = $doctor_archives->get();
        return $doctor_archives;
      }
      $totalDoctorArchives = $doctor_archives->count();
      $doctor_archives = $doctor_archives->paginate($req->perPage);
      $doctor_archives = ArchivesResource::collection($doctor_archives)->response()->getData(true);

      return $doctor_archives;
    }
    $doctor_archives = ArchivesResource::collection($doctor->doctor_archives()->withAll()->orderBy('id','desc')->paginate(10))->response()->getData(true);
    return $doctor_archives;
  }

  /********* FETCH ALL DoctorArchives ***********/
    public function index()
    {
        $doctor_archives =  $this->getter();
        $response = generateResponse($doctor_archives,count($doctor_archives['data']) > 0 ? true:false,'DoctorArchives Fetched Successfully',null,'collection');
        return response()->json($response, 200);
    }

  /********* FILTER DoctorArchives FOR Search ***********/
   public function filter(Request $request){
     $doctor_archives = $this->getter($request);
     $response = generateResponse($doctor_archives,count($doctor_archives['data']) > 0 ? true:false,'Filter DoctorArchives Successfully',null,'collection');
     return response()->json($response, 200);
   }

    /********* ADD NEW DoctorArchive ***********/
    public function store(CreateRequest $request)
    {
      $doctor = auth()->user()->doctor;
      try{
      DB::beginTransaction();
      $request->merge(['created_by_user_id'=>auth()->user()->id]);
      $data = $request->all();
      $data['image'] = uploadCroppedFile($request,'image','doctor_archives');
      $doctor_archive = $doctor->doctor_archives()->create($data);
      $doctor_archive->slug = Str::slug($doctor_archive->name . ' ' . $doctor_archive->id, '-');
      $doctor_archive->tags()->sync($request->tag_ids);
      $doctor_archive->save();
      $doctor_archive = $doctor->doctor_archives()->withAll()->find($doctor_archive->id);
      $doctor_archive = new ArchivesResource($doctor_archive);
      DB::commit();
    }
      catch (\Exception $e) {
        DB::rollBack();
        request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
     }
      return redirect()->back();
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show( $doctor_archive)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_archive->doctor_id != $doctor->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $doctor_archive = $doctor->doctor_archives()->withAll()->find($doctor_archive);
        if($doctor_archive){
          $doctor_archive = new ArchivesResource($doctor_archive);
          $response = generateResponse($doctor_archive,true,'DoctorArchive Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'DoctorArchive Not FOund',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE DoctorArchive ***********/
    public function update(CreateRequest $request, Archive $doctor_archive)
    {
        // dd($request->all());
        $doctor = auth()->user()->doctor;
        if($doctor_archive->doctor_id != $doctor->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
      try{
        DB::beginTransaction();
        $request->merge(['last_updated_by_user_id'=>auth()->user()->id]);
        $data = $request->all();
        if ($request->image) {
            $data['image'] = uploadCroppedFile($request,'image','doctor_archives',$doctor_archive->image);
        } else {
            $data['image'] = $doctor_archive->image;
        }
        $data['slug'] = Str::slug($data['name'] . ' ' . $doctor_archive->id, '-');
        $doctor_archive->update($data);
        $doctor_archive->tags()->sync($request->tag_ids);
        DB::commit();
      }
        catch (\Exception $e) {
          DB::rollBack();
          request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
       }
       return redirect()->back();
    }

    /********* UPDATE DoctorArchive Status***********/
    public function updateStatus(Request $request,Archive $doctor_archive){
        $doctor = auth()->user()->doctor;
        if($doctor_archive->doctor_id != $doctor->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $doctor_archive->update([
          'is_active' => $doctor_archive->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'DoctorArchive Status Updated Successfully',null,'object');
        return response()->json($response, 200);
    }


    /********* DELETE DoctorArchive ***********/
    public function destroy(Request $request,Archive $doctor_archive)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_archive->doctor_id != $doctor->id){
            request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
            return redirect()->back();
        }
          if($doctor_archive->trashed()) {
            request()->session()->flash('alert',['message' => 'Already in Trash','type' => 'error']);
          }
          else{
            $doctor_archive->delete();
          }
          return redirect()->back();
    }
    /*********Permanently DELETE DoctorArchive ***********/
    public function destroyPermanently(Request $request,$doctor_archive)
    {
        $doctor= auth()->user()->doctor;
        $doctor_archive = $doctor->doctor_archives()->withTrashed()->find($doctor_archive);
        if($doctor_archive){
            if($doctor_archive->doctor_id != $doctor->id){
                return redirect()->back()->withErrors([
                    'message' => 'Invalid Request',
                    'type' => 'error'
                ]);
            }
          if ($doctor_archive->trashed()) {
            $doctor_archive->forceDelete();
            $response = generateResponse(null,true,'DoctorArchive Deleted Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'DoctorArchive is not in trash to delete permanently',null,'object');
          }
        }
        else{
          $response = generateResponse(null,false,'DoctorArchive not found',null,'object');
        }
          return response()->json($response, 200);
    }
    /********* Restore DoctorArchive ***********/
    public function restore(Request $request,$doctor_archive)
    {
      $doctor= auth()->user()->doctor;
      $doctor_archive = $doctor->doctor_archives()->withTrashed()->find($doctor_archive);
          if ($doctor_archive->trashed()) {
            $doctor_archive->restore();
            $response = generateResponse(null,true,'DoctorArchive Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'DoctorArchive is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
