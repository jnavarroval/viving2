<?php

namespace App\Http\Controllers\Clinics;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certification;
use App\Http\Requests\Clinics\ClinicCertifications\CreateRequest;
use App\Http\Resources\Web\CertificationsResource;
use Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClinicCertificationsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('clinic');

      // $this->middleware('permission:clinic_certifications.index');
      // $this->middleware('permission:clinic_certifications.create',['only' => ['store']]);
      // $this->middleware('permission:clinic_certifications.update',['only' => ['update']]);
      // $this->middleware('permission:clinic_certifications.delete',['only' => ['destroy']]);
      // $this->middleware('permission:clinic_certifications.export',['only' => ['export']]);
      // $this->middleware('permission:clinic_certifications.import',['only' => ['import']])
      // $this->middleware('permission:clinic_certifications.update|clinic_certifications.is_active',['only' => ['updateStatus']]);
  }

  /********* Getter For Pagination, Searching And Sorting  ***********/
  public function getter($req = null,$export = null)
  {
    $clinic = auth()->user()->clinic;
    if($req != null){
      $clinic_certifications =  $clinic->clinic_certifications()->withAll();
      if($req->trash && $req->trash == 'with'){
        $clinic_certifications =  $clinic_certifications->withTrashed();
      }
      if($req->trash && $req->trash == 'only'){
        $clinic_certifications =  $clinic_certifications->onlyTrashed();
      }
      if($req->column && $req->column != null && $req->search != null){
          $clinic_certifications = $clinic_certifications->whereLike($req->column,$req->search);
        }
       else if($req->search && $req->search != null){

            $clinic_certifications = $clinic_certifications->whereLike(['name','description'],$req->search);
        }
      if($req->sort && $req->sort['field'] != null && $req->sort['type'] != null){
          $clinic_certifications = $clinic_certifications->OrderBy($req->sort['field'],$req->sort['type']);
      }
      else
      {
        $clinic_certifications = $clinic_certifications->OrderBy('id','desc');
      }
      if($export != null){ // for export do not paginate
        $clinic_certifications = $clinic_certifications->get();
        return $clinic_certifications;
      }
      $totalClinicCertifications = $clinic_certifications->count();
      $clinic_certifications = $clinic_certifications->paginate($req->perPage);
      $clinic_certifications = CertificationsResource::collection($clinic_certifications)->response()->getData(true);

      return $clinic_certifications;
    }
    $clinic_certifications = CertificationsResource::collection($clinic->clinic_certifications()->withAll()->orderBy('id','desc')->paginate(10))->response()->getData(true);
    return $clinic_certifications;
  }

  /********* FETCH ALL ClinicCertifications ***********/
    public function index()
    {
        $clinic_certifications =  $this->getter();
        $response = generateResponse($clinic_certifications,count($clinic_certifications['data']) > 0 ? true:false,'ClinicCertifications Fetched Successfully',null,'collection');
        return response()->json($response, 200);
    }

  /********* FILTER ClinicCertifications FOR Search ***********/
   public function filter(Request $request){
     $clinic_certifications = $this->getter($request);
     $response = generateResponse($clinic_certifications,count($clinic_certifications['data']) > 0 ? true:false,'Filter ClinicCertifications Successfully',null,'collection');
     return response()->json($response, 200);
   }

    /********* ADD NEW ClinicCertification ***********/
    public function store(CreateRequest $request)
    {
      $clinic = auth()->user()->clinic;
      try{
      DB::beginTransaction();
      $request->merge(['created_by_user_id'=>auth()->user()->id]);
      $data = $request->all();
      $data['image'] = uploadCroppedFile($request,'image','clinic_certifications');
      $clinic_certification = $clinic->clinic_certifications()->create($data);
      $clinic_certification = $clinic->clinic_certifications()->withAll()->find($clinic_certification->id);
      $clinic_certification = new CertificationsResource($clinic_certification);
      DB::commit();
    }
      catch (\Exception $e) {
        DB::rollBack();
        request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
     }
      return redirect()->back();
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show( $clinic_certification)
    {
        $clinic = auth()->user()->clinic;
        if($clinic_certification->clinic_id != $clinic->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $clinic_certification = $clinic->clinic_certifications()->withAll()->find($clinic_certification);
        if($clinic_certification){
          $clinic_certification = new CertificationsResource($clinic_certification);
          $response = generateResponse($clinic_certification,true,'ClinicCertification Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'ClinicCertification Not FOund',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE ClinicCertification ***********/
    public function update(CreateRequest $request, Certification $clinic_certification)
    {
        // dd($request->all());
        $clinic = auth()->user()->clinic;
        if($clinic_certification->clinic_id != $clinic->id){
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
            $data['image'] = uploadCroppedFile($request,'image','clinic_certifications',$clinic_certification->image);
        } else {
            $data['image'] = $clinic_certification->image;
        }
        $clinic_certification->update($data);
        DB::commit();
      }
        catch (\Exception $e) {
          DB::rollBack();
          request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
       }
       return redirect()->back();
    }

    /********* UPDATE ClinicCertification Status***********/
    public function updateStatus(Request $request,Certification $clinic_certification){
        $clinic = auth()->user()->clinic;
        if($clinic_certification->clinic_id != $clinic->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $clinic_certification->update([
          'is_active' => $clinic_certification->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'ClinicCertification Status Updated Successfully',null,'object');
        return response()->json($response, 200);
    }


    /********* DELETE ClinicCertification ***********/
    public function destroy(Request $request,Certification $clinic_certification)
    {
        $clinic = auth()->user()->clinic;
        if($clinic_certification->clinic_id != $clinic->id){
            request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
            return redirect()->back();
        }
          if($clinic_certification->trashed()) {
            request()->session()->flash('alert',['message' => 'Already in Trash','type' => 'error']);
          }
          else{
            $clinic_certification->delete();
          }
          return redirect()->back();
    }
    /*********Permanently DELETE ClinicCertification ***********/
    public function destroyPermanently(Request $request,$clinic_certification)
    {
        $clinic= auth()->user()->clinic;
        $clinic_certification = $clinic->clinic_certifications()->withTrashed()->find($clinic_certification);
        if($clinic_certification){
            if($clinic_certification->clinic_id != $clinic->id){
                return redirect()->back()->withErrors([
                    'message' => 'Invalid Request',
                    'type' => 'error'
                ]);
            }
          if ($clinic_certification->trashed()) {
            $clinic_certification->forceDelete();
            $response = generateResponse(null,true,'ClinicCertification Deleted Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'ClinicCertification is not in trash to delete permanently',null,'object');
          }
        }
        else{
          $response = generateResponse(null,false,'ClinicCertification not found',null,'object');
        }
          return response()->json($response, 200);
    }
    /********* Restore ClinicCertification ***********/
    public function restore(Request $request,$clinic_certification)
    {
      $clinic= auth()->user()->clinic;
      $clinic_certification = $clinic->clinic_certifications()->withTrashed()->find($clinic_certification);
          if ($clinic_certification->trashed()) {
            $clinic_certification->restore();
            $response = generateResponse(null,true,'ClinicCertification Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'ClinicCertification is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
