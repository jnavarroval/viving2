<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patients\AddDoctorRatingRequest;
use App\Models\AppointmentRating;
use App\Models\BookAppointment;

class AppointmentRatingsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function addAppointmentRating(AddDoctorRatingRequest $request)
    {
        $user = auth()->user();
        $patient = $user->patient;

        $appointment = BookAppointment::where('id', $request->booked_appointment_id)->first();
        $logged_in_as = $request->session()->get('logged_in_as');
        if ($logged_in_as == 'patient') {
            if ($appointment->patient_id != $patient->id) {
                request()->session()->flash('alert', [
                    'type' => 'error',
                    'message' => 'not authenticated',
                ]);
                return redirect()->route('appointment_log');
            }
            $fromable_id = $patient->id;
            $fromable_type = 'App\Models\Patient';
            if ($appointment->doctor_id) {
                $to_id = $appointment->doctor_id;
                $to_type = 'App\Models\Doctor';
            }
            if ($appointment->clinic_id) {
                $to_id = $appointment->clinic_id;
                $to_type = 'App\Models\Clinic';
            }
        } else {
            if ($logged_in_as == 'doctor') {
                $doctor = $user->doctor;
                if ($appointment->doctor_id != $doctor->id) {
                    request()->session()->flash('alert', [
                        'type' => 'error',
                        'message' => 'not authenticated',
                    ]);
                    return redirect()->route('appointment_log');
                }

                $fromable_id = $doctor->id;
                $fromable_type = 'App\Models\Doctor';
            }
            if ($logged_in_as == 'clinic') {
                $clinic = $user->clinic;
                if ($appointment->clinic_id != $clinic->id) {
                    request()->session()->flash('alert', [
                        'type' => 'error',
                        'message' => 'not authenticated',
                    ]);
                    return redirect()->route('appointment_log');
                }
                $fromable_id = $clinic->id;
                $fromable_type = 'App\Models\Clinic';
            }
            $to_id = $appointment->patient_id;
            $to_type = 'App\Models\Patient';
        }
        $data['fromable_id'] = $fromable_id;
        $data['fromable_type'] = $fromable_type;
        $data['to_id'] = $to_id;
        $data['to_type'] = $to_type;
        $data['booked_appointment_id'] = $request->booked_appointment_id;
        $data['comment'] = $request->comment;
        $data['rating'] = $request->rating;
        AppointmentRating::create($data);
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
