<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patients\AddServiceRatingRequest;
use App\Models\BookedService;
use App\Models\ServiceRating;
use App\Models\ServiceReview;

class ServiceRatingsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function addServiceRating(AddServiceRatingRequest $request)
    {

        $user = auth()->user();
        $patient = $user->patient;

        $service = BookedService::where('id', $request->booked_service_id)->first();
        $logged_in_as = $request->session()->get('logged_in_as');
        if ($logged_in_as == 'patient') {
            if ($service->patient_id != $patient->id) {
                request()->session()->flash('alert', [
                    'type' => 'error',
                    'message' => 'not authenticated',
                ]);
                return redirect()->route('service_log');
            }
            $fromable_id = $patient->id;
            $fromable_type = 'App\Models\Patient';
            if ($service->doctor_id) {
                $to_id = $service->doctor_id;
                $to_type = 'App\Models\Doctor';
            }
            if ($service->clinic_id) {
                $to_id = $service->clinic_id;
                $to_type = 'App\Models\Clinic';
            }
        } else {
            if ($logged_in_as == 'doctor') {
                $doctor = $user->doctor;
                if ($service->doctor_id != $doctor->id) {
                    request()->session()->flash('alert', [
                        'type' => 'error',
                        'message' => 'not authenticated',
                    ]);
                    return redirect()->route('service_log');
                }

                $fromable_id = $doctor->id;
                $fromable_type = 'App\Models\Doctor';
            }
            if ($logged_in_as == 'clinic') {
                $clinic = $user->clinic;
                if ($service->clinic_id != $clinic->id) {
                    request()->session()->flash('alert', [
                        'type' => 'error',
                        'message' => 'not authenticated',
                    ]);
                    return redirect()->route('service_log');
                }
                $fromable_id = $clinic->id;
                $fromable_type = 'App\Models\Clinic';
            }
            $to_id = $service->patient_id;
            $to_type = 'App\Models\Patient';
        }
        // $data['fromable_id'] = $fromable_id;
        // $data['fromable_type'] = $fromable_type;
        $data['patient_id'] = $service->patient_id ?? null;
        $data['clinic_id'] = $service->clinic_id ?? null;
        $data['doctor_id'] = $service->doctor_id ?? null;
        // $data['to_id'] = $to_id;
        // $data['to_type'] = $to_type;
        $data['service_id'] = $service->service_id;
        $data['booked_service_id'] = $request->booked_service_id;
        $data['comment'] = $request->comment;
        $data['rating'] = $request->rating;
        ServiceReview::create($data);
        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'Rating Added Successfully',
        ]);
        return redirect()->back()->withResponseData([
            'message' => 'Rating Added Successfully',
            'type' => 'success'
        ]);
    }
}
