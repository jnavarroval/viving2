<?php

namespace App\Http\Controllers\Patients;
use App\Http\Controllers\Controller;
use App\Http\Requests\Patients\AddDoctorReviewRequest;
use App\Http\Requests\Patients\AddClinicReviewRequest;

class ReviewsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
      $this->middleware('auth');
    //   $this->middleware('patient');
  }


  public function addDoctorReview(AddDoctorReviewRequest $request)
  {
      $user = auth()->user();
      $patient = $user->patient;
      if($patient){
          $patient->doctor_reviews()->create($request->all());
      }
      request()->session()->flash('alert', [
          'type' => 'success',
          'message' => 'Review Added Successfully',
      ]);
      return redirect()->back()->withResponseData([
          'message' => 'Review Added Successfully',
          'type' => 'success'
      ]);
  }
  public function addClinicReview(AddClinicReviewRequest $request)
  {
      $user = auth()->user();
      $patient = $user->patient;
      if($patient){
          $patient->clinic_reviews()->create($request->all());
      }
      request()->session()->flash('alert', [
          'type' => 'success',
          'message' => 'Review Added Successfully',
      ]);
      return redirect()->back()->withResponseData([
          'message' => 'Review Added Successfully',
          'type' => 'success'
      ]);
  }
}
