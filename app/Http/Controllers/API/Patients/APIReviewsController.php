<?php

namespace App\Http\Controllers\API\Patients;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Patients\AddDoctorReviewRequest;
use App\Http\Requests\API\Patients\AddClinicReviewRequest;

class APIReviewsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
      $this->middleware('auth:api');
    //   $this->middleware('patient');
  }


  public function addDoctorReview(AddDoctorReviewRequest $request)
  {
      $user = auth()->user();
      $patient = $user->patient;
      if($patient){
          $patient->doctor_reviews()->create($request->all());
      }
      $response = generateResponse(null,true,"Review Added Successfully",null,'collection');
      return response()->json($response);
  }
  public function addClinicReview(AddClinicReviewRequest $request)
  {
      $user = auth()->user();
      $patient = $user->patient;
      if($patient){
          $patient->clinic_reviews()->create($request->all());
      }
      $response = generateResponse(null,true,"Review Added Successfully",null,'collection');
      return response()->json($response);
  }
}
