<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentMethods\StripeController;
use App\Http\Requests\API\Patients\BookAppointmentRequest;
use App\Http\Resources\API\BookAppointmentsResource;
use App\Models\AppointmentSchedule;
use App\Models\AppointmentScheduleSlot;
use App\Models\AppointmentStatus;
use App\Models\AppointmentType;
use App\Models\BookAppointment;
use Illuminate\Support\Facades\DB;

class APIAppointmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('api');
        $this->middleware('verified');
        $this->middleware('api_setting');
        $this->middleware('patient.api');
    }
    public function getter($req = null, $export = null)
    {

        $patient = auth()->user()->patient;
        if ($req != null) {
            $patient_appointments =  $patient->appointments()->withAll()->withChildren();
            if ($req->trash && $req->trash == 'with') {
                $patient_appointments =  $patient_appointments->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $patient_appointments =  $patient_appointments->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $patient_appointments = $patient_appointments->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $patient_appointments = $patient_appointments->whereLike(['name', 'description'], $req->search);
            }
            if ($req->status_code) {
                $patient_appointments = $patient_appointments->where('appointment_status_code', $req->status_code);
            }

            if ($req->sort && $req->sort['field'] != null && $req->sort['type'] != null) {
                $patient_appointments = $patient_appointments->OrderBy($req->sort['field'], $req->sort['type']);
            } else {
                $patient_appointments = $patient_appointments->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $patient_appointments = $patient_appointments->get();
                return $patient_appointments;
            }
            $totalPatientAppointments = $patient_appointments->count();
            $patient_appointments = $patient_appointments->paginate($req->perPage);
            $patient_appointments = BookAppointmentsResource::collection($patient_appointments)->response()->getData(true);

            return $patient_appointments;
        }
        $patient_appointments = BookAppointmentsResource::collection($patient->appointments()->withAll()->withChildren()->orderBy('id', 'desc')->paginate(10))->response()->getData(true);
        return $patient_appointments;
    }

    public function bookAppointment(BookAppointmentRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $user = Auth()->user();
            $patient = $user->patient->id;
            $appointment_type = AppointmentType::where('id', $request->appointment_type_id)->first();
            if ($appointment_type->is_schedule_required) {
                $schedule_slot = AppointmentScheduleSlot::with('appointment_schedule')->where('schedule_id', $request->appointment_schedule_id)->first();
                $data['start_time'] = $schedule_slot->start_time;
                $data['end_time'] = $schedule_slot->end_time;
                $data['fee'] = $schedule_slot->appointment_schedule->fee;
            } else {
                if (isset($request->doctor_id)) {
                    $appointment_schedule = AppointmentSchedule::where('doctor_id', $request->doctor_id)->where('appointment_type_id', $request->appointment_type_id)->first();
                } else {
                    $appointment_schedule = AppointmentSchedule::where('clinic_id', $request->clinic_id)->where('appointment_type_id', $request->appointment_type_id)->first();
                }
                $data['start_time'] = null;
                $data['end_time'] = null;
                $data['fee'] = $appointment_schedule->fee;
            }

            $data['patient_id'] = $patient;
            $data['appointment_status_code'] = AppointmentStatus::$Pending;
            if ($request->hasFile('attachment')) {
                $data['attachment_url'] = uploadFile($request, 'attachment', 'booked_appointments');
            }
            $request->merge(['amount' => $data['fee']]);

            $fund_request = PaymentController::addFundRequest($request);
            // dd($fund_request);
            $data['fund_id'] = $fund_request['fund']['id'] ?? null;
            if ($fund_request['fund'] ?? false) {
                $data['is_paid'] = 0;
                $appointment = BookAppointment::create($data);
                // $request->merge(['fee' => $data['fee']]);
                $appointment->fund_transaction = $fund_request['fund']->transaction ?? null;
                // $appointment->fund = $fund_request['fund'];
                $response = generateResponse($appointment, true, 'Appointment Booked Successfully', null, 'collection');
                DB::commit();
                return response()->json($response, 200);
            } else {
                $response = generateResponse($fund_request, false, 'Error', null, 'collection');
                return response()->json($response, 200);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $response = generateResponse(null, false, $e->getMessage(), null, 'collection');
            return response()->json($response, 200);
        }
    }
    public function getFilteredAppointmentlogs(Request $request)
    {
        $appointments = $this->getter($request);
        $response = generateResponse($appointments, count($appointments['data']) > 0 ? true : false, 'Filter Appointment Logs Successfully', null, 'collection');
        return response()->json($response, 200);
    }
    public function showAppointmentLogDetail(BookAppointment $book_appointment)
    {
        $user = Auth()->user();
        $appointment = BookAppointment::withAll()->find($book_appointment->id);
        return ($book_appointment->patient_id == $user->patient->id)
            ? response()->json(generateResponse(new BookAppointmentsResource($appointment), true, 'Appointment Fetched Successfully', null, 'collection'), 200)
            : response()->json(generateResponse(null, false, 'Appointment Not Found', null, 'collection'), 404);
    }
}
