<?php

namespace App\Http\Controllers\Clinics;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Archive;
use App\Http\Requests\Clinics\ClinicArchives\CreateRequest;
use App\Http\Resources\Web\ArchivesResource;
use Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClinicArchivesController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('clinic');
      // $this->middleware('permission:clinic_archives.index');
      // $this->middleware('permission:clinic_archives.create',['only' => ['store']]);
      // $this->middleware('permission:clinic_archives.update',['only' => ['update']]);
      // $this->middleware('permission:clinic_archives.delete',['only' => ['destroy']]);
      // $this->middleware('permission:clinic_archives.export',['only' => ['export']]);
      // $this->middleware('permission:clinic_archives.import',['only' => ['import']])
      // $this->middleware('permission:clinic_archives.update|clinic_archives.is_active',['only' => ['updateStatus']]);
  }

  /********* Getter For Pagination, Searching And Sorting  ***********/
  public function getter($req = null,$export = null)
  {
    $clinic = auth()->user()->clinic;
    if($req != null){
      $clinic_archives =  $clinic->clinic_archives()->withAll();
      if($req->trash && $req->trash == 'with'){
        $clinic_archives =  $clinic_archives->withTrashed();
      }
      if($req->trash && $req->trash == 'only'){
        $clinic_archives =  $clinic_archives->onlyTrashed();
      }
      if($req->column && $req->column != null && $req->search != null){
          $clinic_archives = $clinic_archives->whereLike($req->column,$req->search);
        }
       else if($req->search && $req->search != null){

            $clinic_archives = $clinic_archives->whereLike(['name','description'],$req->search);
        }
      if($req->sort && $req->sort['field'] != null && $req->sort['type'] != null){
          $clinic_archives = $clinic_archives->OrderBy($req->sort['field'],$req->sort['type']);
      }
      else
      {
        $clinic_archives = $clinic_archives->OrderBy('id','desc');
      }
      if($export != null){ // for export do not paginate
        $clinic_archives = $clinic_archives->get();
        return $clinic_archives;
      }
      $totalClinicArchives = $clinic_archives->count();
      $clinic_archives = $clinic_archives->paginate($req->perPage);
      $clinic_archives = ArchivesResource::collection($clinic_archives)->response()->getData(true);

      return $clinic_archives;
    }
    $clinic_archives = ArchivesResource::collection($clinic->clinic_archives()->withAll()->orderBy('id','desc')->paginate(10))->response()->getData(true);
    return $clinic_archives;
  }

  /********* FETCH ALL ClinicArchives ***********/
    public function index()
    {
        $clinic_archives =  $this->getter();
        $response = generateResponse($clinic_archives,count($clinic_archives['data']) > 0 ? true:false,'ClinicArchives Fetched Successfully',null,'collection');
        return response()->json($response, 200);
    }

  /********* FILTER ClinicArchives FOR Search ***********/
   public function filter(Request $request){
     $clinic_archives = $this->getter($request);
     $response = generateResponse($clinic_archives,count($clinic_archives['data']) > 0 ? true:false,'Filter ClinicArchives Successfully',null,'collection');
     return response()->json($response, 200);
   }

    /********* ADD NEW ClinicArchive ***********/
    public function store(CreateRequest $request)
    {
      $clinic = auth()->user()->clinic;
      try{
      DB::beginTransaction();
      $request->merge(['created_by_user_id'=>auth()->user()->id]);
      $data = $request->all();
      $data['image'] = uploadCroppedFile($request,'image','clinic_archives');
      $clinic_archive = $clinic->clinic_archives()->create($data);
      $clinic_archive->slug = Str::slug($clinic_archive->name . ' ' . $clinic_archive->id, '-');
      $clinic_archive->tags()->sync($request->tag_ids);
      $clinic_archive->save();
      $clinic_archive = $clinic->clinic_archives()->withAll()->find($clinic_archive->id);
      $clinic_archive = new ArchivesResource($clinic_archive);
      DB::commit();
    }
      catch (\Exception $e) {
        DB::rollBack();
        request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
     }
      return redirect()->back();
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show( $clinic_archive)
    {
        $clinic = auth()->user()->clinic;
        if($clinic_archive->clinic_id != $clinic->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $clinic_archive = $clinic->clinic_archives()->withAll()->find($clinic_archive);
        if($clinic_archive){
          $clinic_archive = new ArchivesResource($clinic_archive);
          $response = generateResponse($clinic_archive,true,'ClinicArchive Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'ClinicArchive Not FOund',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE ClinicArchive ***********/
    public function update(CreateRequest $request, Archive $clinic_archive)
    {
        // dd($request->all());
        $clinic = auth()->user()->clinic;
        if($clinic_archive->clinic_id != $clinic->id){
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
            $data['image'] = uploadCroppedFile($request,'image','clinic_archives',$clinic_archive->image);
        } else {
            $data['image'] = $clinic_archive->image;
        }
        $data['slug'] = Str::slug($data['name'] . ' ' . $clinic_archive->id, '-');
        $clinic_archive->update($data);
        $clinic_archive->tags()->sync($request->tag_ids);
        DB::commit();
      }
        catch (\Exception $e) {
          DB::rollBack();
          request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
       }
       return redirect()->back();
    }

    /********* UPDATE ClinicArchive Status***********/
    public function updateStatus(Request $request,Archive $clinic_archive){
        $clinic = auth()->user()->clinic;
        if($clinic_archive->clinic_id != $clinic->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $clinic_archive->update([
          'is_active' => $clinic_archive->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'ClinicArchive Status Updated Successfully',null,'object');
        return response()->json($response, 200);
    }


    /********* DELETE ClinicArchive ***********/
    public function destroy(Request $request,Archive $clinic_archive)
    {
        $clinic = auth()->user()->clinic;
        if($clinic_archive->clinic_id != $clinic->id){
            request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
            return redirect()->back();
        }
          if($clinic_archive->trashed()) {
            request()->session()->flash('alert',['message' => 'Already in Trash','type' => 'error']);
          }
          else{
            $clinic_archive->delete();
          }
          return redirect()->back();
    }
    /*********Permanently DELETE ClinicArchive ***********/
    public function destroyPermanently(Request $request,$clinic_archive)
    {
        $clinic= auth()->user()->clinic;
        $clinic_archive = $clinic->clinic_archives()->withTrashed()->find($clinic_archive);
        if($clinic_archive){
            if($clinic_archive->clinic_id != $clinic->id){
                return redirect()->back()->withErrors([
                    'message' => 'Invalid Request',
                    'type' => 'error'
                ]);
            }
          if ($clinic_archive->trashed()) {
            $clinic_archive->forceDelete();
            $response = generateResponse(null,true,'ClinicArchive Deleted Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'ClinicArchive is not in trash to delete permanently',null,'object');
          }
        }
        else{
          $response = generateResponse(null,false,'ClinicArchive not found',null,'object');
        }
          return response()->json($response, 200);
    }
    /********* Restore ClinicArchive ***********/
    public function restore(Request $request,$clinic_archive)
    {
      $clinic= auth()->user()->clinic;
      $clinic_archive = $clinic->clinic_archives()->withTrashed()->find($clinic_archive);
          if ($clinic_archive->trashed()) {
            $clinic_archive->restore();
            $response = generateResponse(null,true,'ClinicArchive Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'ClinicArchive is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
