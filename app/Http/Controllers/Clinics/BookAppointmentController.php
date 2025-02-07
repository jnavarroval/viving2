<?php

namespace App\Http\Controllers\Clinics;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Resources\Web\AppointmentMedicineResource;
use App\Http\Resources\Web\BookAppointmentsResource;
use App\Models\AppointmentStatus;
use App\Models\BookAppointment;
use App\Models\Commission;
use App\PusherBeam\PusherBeamService;
use App\Http\Requests\Doctors\AppointmentMedicines\CreateRequest;
use Carbon\Carbon;

class BookAppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('clinic');
    }
    public function getter($req = null, $export = null)
    {

        $clinic = auth()->user()->clinic;
        if ($req != null) {
            $clinic_appointments =  $clinic->appointments()->withAll();
            if ($req->trash && $req->trash == 'with') {
                $clinic_appointments =  $clinic_appointments->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $clinic_appointments =  $clinic_appointments->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $clinic_appointments = $clinic_appointments->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $clinic_appointments = $clinic_appointments->whereLike(['name', 'description'], $req->search);
            }

            if ($req->status_code) {
                $clinic_appointments = $clinic_appointments->where('appointment_status_code', $req->status_code);
            }

            if ($req->sort && $req->sort['field'] != null && $req->sort['type'] != null) {
                $clinic_appointments = $clinic_appointments->OrderBy($req->sort['field'], $req->sort['type']);
            } else {
                $clinic_appointments = $clinic_appointments->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $clinic_appointments = $clinic_appointments->get();
                return $clinic_appointments;
            }
            $totalClinicAppointments = $clinic_appointments->count();
            $clinic_appointments = $clinic_appointments->paginate($req->perPage);
            $clinic_appointments = BookAppointmentsResource::collection($clinic_appointments)->response()->getData(true);

            return $clinic_appointments;
        }
        $clinic_appointments = BookAppointmentsResource::collection($clinic->appointments()->withAll()->orderBy('id', 'desc')->paginate(10))->response()->getData(true);
        return $clinic_appointments;
    }
    public function getClinicsFilteredAppointmentlogs(Request $request)
    {
        $appointments = $this->getter($request);
        $response = generateResponse($appointments, count($appointments['data']) > 0 ? true : false, 'Filter Appointment Logs Successfully', null, 'collection');
        return response()->json($response, 200);
    }
    public function showClinicsAppointmentLogDetailPage($id)
    {
        $user = Auth()->user();
        $clinic_id = $user->clinic->id;
        $appointment = BookAppointment::withAll()->where('id', $id)->where('clinic_id', $clinic_id)->first();
        $appointment = new BookAppointmentsResource($appointment);
        $data = [
            'appointment' => $appointment,
        ];
        return Inertia::render('AppointmentLogDetail', $data);
    }
    public function updateAppointmentStatus(Request $request)
    {

        $user = Auth()->user();
        $settings = generalSettings();
        $clinic_id = $user->clinic->id;
        $appointment = BookAppointment::withAll()->where('id', $request->appointment_id)->where('clinic_id', $clinic_id)->first();
        $patient_id = $appointment->patient->id;
        if ($appointment) {
            $updated =  $appointment->update([
                'appointment_status_code' => $request->status_code
            ]);
            if ($request->status_code == AppointmentStatus::$Completed) {
                $appointment->update([
                    'ended_at' => Carbon::now(),
                ]);
            }
            if ($updated) {
                if ($request->status_code == AppointmentStatus::$Accepted) {
                    $title = 'Your Appointment has been Accepted';
                    $body = 'You have a new notification';
                    $deep_link = env('APP_URL') . '/appointment_log';
                }
                if ($request->status_code == AppointmentStatus::$Rejected) {
                    $title = 'Your Appointment has been Rejected';
                    $body = 'You have a new notification';
                    $deep_link = env('APP_URL') . '/appointment_log';
                }
                if ($request->status_code == AppointmentStatus::$Cancel) {

                    $title = 'Your Appointment has been Canceled';
                    $body = 'You have a new notification';
                    $deep_link = env('APP_URL') . '/appointment_log';
                }
                if ($request->status_code == AppointmentStatus::$Completed) {

                    $title = 'Your Appointment has been Completed';
                    $body = 'You have a new notification';
                    $deep_link = env('APP_URL') . '/appointment_log';
                    if ((int)$settings['enable_wallet_system']) {
                        if ($settings['commission_type'] == 'commission_base') {
                            $commission = Commission::where('appointment_type_id', $appointment->appointment_type_id)->first();
                            if ($commission && $commission->commission_type == 'fixed_rate') {
                                $commission_amount = $commission->rate ?? 0;
                                $final_amount = $appointment->fee - $commission_amount;
                            } else {
                                $rate = $commission->rate ?? 0;
                                $percentage_value = ($appointment->fee / 100) * $rate;
                                $commission_amount = $percentage_value;
                                $final_amount = $appointment->fee - $percentage_value;
                            }
                        } else {
                            $final_amount = $appointment->fee;
                        }
                        $meta = ['details' => 'Deposit on Completion of Appointment # ' . $appointment->id];

                        $user->deposit($final_amount, $meta);
                    }
                }
                $pusher = new PusherBeamService;
                $users = (string)$patient_id;
                $pusher->sendNotificationToUsers($users, $title, $body, $deep_link);
            }


            if ($request->status_code == 2) {
                request()->session()->flash('alert', [
                    'type' => 'info',
                    'message' => 'Appointment Accepted Successfully',
                ]);
            } elseif ($request->status_code == 3) {
                request()->session()->flash('alert', [
                    'type' => 'info',
                    'message' => 'Appointment Rejected Successfully',
                ]);
            } elseif ($request->status_code == 5) {
                request()->session()->flash('alert', [
                    'type' => 'info',
                    'message' => 'Appointment Mark as Completed Successfully',
                ]);
            }
            return redirect()->back();
        }
    }
    public function updateAppointmentStarted(Request $request)
    {

        $user = Auth()->user();
        $clinic_id = $user->clinic->id;
        $appointment = BookAppointment::withAll()->where('id', $request->appointment_id)->where('clinic_id', $clinic_id)->first();
        if ($appointment) {
            $updated =  $appointment->update([
                'started_at' => Carbon::now(),
            ]);

            $response = generateResponse(null, true, 'Appointment Joined Successfully', null, 'object');
            return response()->json($response, 200);
        }
    }

    public function createPrescriptionAppointment(Request $request)
    {
            $user = Auth()->user();
            $clinic = $user->clinic;;


            $appointment =  $clinic->appointments->where('id', $request->booked_appointment_id)->first();
            if ($clinic) {
                $request->merge(
                    [
                        'clinic_id' => $clinic->id
                    ]
                );
            }


            $appointment->update([
                'prescription' => $request->prescription,
            ]);

            if ($request->test_ids) {
                $appointment->tests()->sync($request->test_ids);
            }



            if ($request->patient_healths) {

                $appointment->patient_healths()->delete();
                foreach ($request->patient_healths as $healthData) {
                    $appointment->patient_healths()->create([
                        'patient_health_id' => $healthData['id'],
                        'value' => $healthData['value'],
                    ]);
                }
            }

            if ($request->disease_ids) {
                $appointment->diseases()->sync($request->disease_ids);
            }
            request()->session()->flash('alert', [
                'type' => 'success',
                'message' => 'Prescription Appointment Added Successfully',
            ]);

            $response = generateResponse($appointment, true, 'Prescription Appointment Added Successfully', null, 'collection');
            return response()->json($response, 200);


    }

    public function getPrescriptionAppointment(Request $request, $booked_appointment_id)
    {
        $user = Auth()->user();
        $clinic = $user->clinic;
        $appointment = $clinic->appointments()->where('id', $booked_appointment_id)->first();
        $healths = $appointment->patient_healths;
        $diseases = $appointment->diseases;
        $medicines = $appointment->medicines;
        $tests = $appointment->tests;
        $disease_ids = $diseases->pluck('id')->toArray();
        $test_ids = $tests->pluck('id')->toArray();
        $patient_healths = [];
        foreach ($healths as $health) {
            $object = new \stdClass();

            $object->id = $health->patient_health_id;
            $object->value = $health->value;
            $object->name = $health->healths->name ?? '';

            array_push($patient_healths, $object);
        }

        $data = [
            'medicines' => AppointmentMedicineResource::collection($medicines),
            'disease_ids' =>  $disease_ids,
            'patient_healths' => $patient_healths,
            'test_ids' => $test_ids,
            'prescription' =>  $appointment->prescription ?? "",

        ];


        $response = generateResponse($data, true, 'Prescription Appointment get Successfully', null, 'collection');
        return response()->json($response, 200);
    }
    public function createMedicineAppointment(CreateRequest $request)
    {
        $user = Auth()->user();
        $clinic_id = $user->clinic->id;
        $appointment_medicine = BookAppointment::where('id', $request->booked_appointment_id)->where('clinic_id', $clinic_id)->first();

        $appointment_medicine = $appointment_medicine->medicines()->create([
            'name' => $request->name,
            'frequency' => $request->frequency,
            'dosage' => $request->dosage,
        ]);

        $appointment_medicine = new AppointmentMedicineResource($appointment_medicine);
        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'Medicine Added Successfully',
        ]);

        return redirect()->back();
    }
    public function deleteMedicineAppointment(Request $request)
    {
        $user = Auth()->user();
        $clinic_id = $user->clinic->id;
        $appointment_medicine = BookAppointment::where('id', $request->booked_appointment_id)->where('clinic_id', $clinic_id)->first();
        if ($appointment_medicine) {
            $appointment_medicine = $appointment_medicine->medicines()->where('id', $request->medicine_id)->delete();
        }
        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'Medicine Deleted Successfully',
        ]);

        return redirect()->back();
    }
}
