<?php

namespace App\Http\Controllers\API\Doctors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Doctors\Appointments\AddScheduleRequest;
use App\Http\Requests\API\Doctors\Appointments\CreateRequest;
use App\Http\Requests\API\Doctors\Appointments\DeleteRequest;
use App\Http\Resources\API\AppointmentSchedulesResource;
use App\Models\AppointmentSchedule;
use App\Models\AppointmentScheduleSlot;
use App\Models\BookAppointment;
use App\Http\Resources\API\BookAppointmentsResource;
use App\Models\AppointmentStatus;
use App\Models\Commission;
use App\PusherBeam\PusherBeamService;
use Illuminate\Support\Facades\DB;

class APIDoctorAppointmentScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['api', 'auth:api', 'verified', 'api_setting']);
        $this->middleware('doctor.api');
    }
    public function getter($req = null, $export = null)
    {
        $doctor = auth()->user()->doctor;
        if ($req != null && count($req->all()) > 0) {
            // dd('te');
            $doctor_appointments = $doctor->appointments()->withAll()->withChildren();
            if ($req->trash && $req->trash == 'with') {
                $doctor_appointments =  $doctor_appointments->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $doctor_appointments =  $doctor_appointments->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $doctor_appointments = $doctor_appointments->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $doctor_appointments = $doctor_appointments->whereLike(['name', 'description'], $req->search);
            }

            if ($req->status_code) {
                $doctor_appointments = $doctor_appointments->where('appointment_status_code', $req->status_code);
            }

            if ($req->sort && $req->sort['field'] != null && $req->sort['type'] != null) {
                $doctor_appointments = $doctor_appointments->OrderBy($req->sort['field'], $req->sort['type']);
            } else {
                $doctor_appointments = $doctor_appointments->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $doctor_appointments = $doctor_appointments->get();
                return $doctor_appointments;
            }
            $totaldoctorAppointments = $doctor_appointments->count();
            // dd($req->perPage,$doctor_appointments);
            $doctor_appointments = $doctor_appointments->paginate($req->perPage);
            // dd($doctor_appointments);
            $doctor_appointments = BookAppointmentsResource::collection($doctor_appointments)->response()->getData(true);
// dd('tets');
// dd($doctor_appointments);
            return $doctor_appointments;
        }
        $doctor_appointments = BookAppointmentsResource::collection($doctor->appointments()->withAll()->withChildren()->orderBy('id', 'desc')->paginate(10))->response()->getData(true);
        return $doctor_appointments;
    }

    public function saveAppointmentSchedule(CreateRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $user = Auth()->user();
            $doctor_id = $user->doctor->id;
            $data['doctor_id'] = $doctor_id;
            if ($request->is_schedule_required) {
                $records = AppointmentSchedule::where('doctor_id', $doctor_id)->where('appointment_type_id', $request->appointment_type_id)->get();
                $schedule_ids = $records->pluck('id')->toArray();
                if ($records) {
                    AppointmentScheduleSlot::whereIn('schedule_id', $schedule_ids)->delete();
                    $records->each->delete();
                }

                foreach ($request->selected_days as $key => $day) {
                    $schedule =  AppointmentSchedule::create([
                        'doctor_id' => $doctor_id,
                        'appointment_type_id' => $request->appointment_type_id,
                        'fee' => $request->fee,
                        'day' => $day,
                        'is_holiday' => isset($request->generated_slots[$day]) ? count($request->generated_slots[$day]) > 0 ? 1 : 0 : 1,
                        'start_time' => $request->start_time,
                        'end_time' => $request->end_time,
                        'slot_duration' => $request->interval,
                    ]);
                    if (isset($request->generated_slots[$day])) {
                        foreach ($request->generated_slots[$day] as $key => $slot) {
                            AppointmentScheduleSlot::create(
                                [
                                    'schedule_id' => $schedule->id,
                                    'start_time' => $slot['start_time'],
                                    'end_time' => $slot['end_time'],
                                    'is_active' => $slot['is_active'],
                                ]
                            );
                        }
                    }
                }
                $response = generateResponse(null, true, 'Schedules have been added Successfully', null, 'collection');
            } else {
                AppointmentSchedule::where('doctor_id', $doctor_id)->where('appointment_type_id', $request->appointment_type_id)->delete();
                if ($request->fee) {
                    $schedule = AppointmentSchedule::create($data);
                    $response = generateResponse(null, true, 'Schedules have been added Successfully', null, 'collection');
                } else {
                    $response = generateResponse(null, true, 'Schedules have been added Successfully', null, 'collection');
                }
            }
            DB::commit();
            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollBack();
            $response = generateResponse(null, false, $e->getLine() . $e->getMessage(), null, 'collection');
            return response()->json($response, 200);
        }
    }
    public function getAppointmentSchedules(Request $request)
    {
        try {
            $request->validate([
                'appointment_type_id' => 'required|integer',
                'is_schedule_required' => 'required|integer',
            ]);
            $user = Auth()->user();
            if ($request->is_schedule_required) {
                $schedules = AppointmentSchedule::withAll()->where('doctor_id', $user->doctor->id)->where('appointment_type_id', $request->appointment_type_id)->get();
                $schedules = AppointmentSchedulesResource::collection($schedules)->keyBy('day');
                $response = generateResponse($schedules, true, "Appointment Schedules Fetched Successfully", null, 'collection');
            } else {
                $schedule = AppointmentSchedule::withAll()->where('doctor_id', $user->doctor->id)->where('appointment_type_id', $request->appointment_type_id)->first();
                if ($schedule) {
                    $schedule = new AppointmentSchedulesResource($schedule);
                } else {
                    $schedule = null;
                }
                $response = generateResponse($schedule, true, "Appointment Schedule Fetched Successfully", null, 'collection');
            }
            if ($response['data']->isEmpty()) {
                $response['data'] = null;
            }
            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollBack();
            $response = generateResponse(null, false, $e->getMessage(), null, 'collection');
            return response()->json($response, 200);
        }
    }
    public function deleteAppointmentScheduleSlots(DeleteRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = Auth()->user();
            $schedule = AppointmentSchedule::withAll()->where('doctor_id', $user->doctor->id)->where('appointment_type_id', $request->appointment_type_id)->where('day', $request->day)->first();
            $schedule->schedule_slots()->delete();
            $schedule->delete();
            $response = generateResponse(null, true, 'Schedule slots have been deleted Successfully', null, 'collection');
            DB::commit();
            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollBack();
            $response = generateResponse(null, false, $e->getMessage(), null, 'collection');
            return response()->json($response, 200);
        }
    }
    public function addNewAppointmentSchedule(AddScheduleRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = Auth()->user();
            $doctor_id = $user->doctor->id;
            $schedule = AppointmentSchedule::withAll()->where('doctor_id', $doctor_id)->where('appointment_type_id', $request->appointment_type_id)->first();
            $created = AppointmentSchedule::create([
                'doctor_id' => $doctor_id,
                'appointment_type_id' => $request->appointment_type_id,
                'fee' => $schedule->fee,
                'day' => $request->day,
                'is_holiday' => count($request->generated_slots) > 0 ? 1 : 0,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'slot_duration' => $request->interval,
            ]);
            foreach ($request->generated_slots as $key => $slot) {
                AppointmentScheduleSlot::create(
                    [
                        'schedule_id' => $created->id,
                        'start_time' => $slot['start_time'],
                        'end_time' => $slot['end_time'],
                        'is_active' => $slot['is_active'],
                    ]
                );
            }
            $response = generateResponse($created, true, 'Schedules have been added Successfully', null, 'collection');
            DB::commit();
            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollBack();
            $response = generateResponse(null, false, $e->getMessage(), null, 'collection');
            return response()->json($response, 200);
        }
    }
    public function getFilteredAppointmentlogs(Request $request)
    {
        // dd($request->all());
        // $doctor = auth()->user()->doctor;
        // $appointments = $doctor->appointments()->withAll()->withChildren()->get();
        // $appointments = BookAppointmentsResource::collection($appointments)->response()->getData(true);
        $appointments = $this->getter($request);
        // $response = generateResponse($appointments, true, 'Filter Appointment Logs Successfully', null, 'collection');

        $response = generateResponse($appointments, count($appointments['data']) > 0 ? true : false, 'Filter Appointment Logs Successfully', null, 'collection');
        return response()->json($response, 200);
    }
    public function showAppointmentLogDetail(BookAppointment $book_appointment)
    {
        $user = Auth()->user();
        return ($book_appointment->doctor_id == $user->doctor->id)
            ? response()->json(generateResponse(new BookAppointmentsResource($book_appointment), true, 'Appointment Fetched Successfully', null, 'collection'), 200)
            : response()->json(generateResponse(null, false, 'Appointment Not Found', null, 'collection'), 404);
    }

    public function updateAppointmentStatus(Request $request, BookAppointment $book_appointment)
    {
        $request->validate([
            'appointment_status_code' => 'required|in:1,2,3,4,5',
        ]);
        $user = Auth()->user();
        $settings = generalSettings();
        if (($book_appointment->doctor_id == $user->doctor->id)) {
            $patient_id = $book_appointment->patient->id;
            $updated = $book_appointment->update([
                'appointment_status_code' => $request->appointment_status_code
            ]);
            if ($updated) {
                if ($request->appointment_status_code == AppointmentStatus::$Accepted) {
                    $title = 'Your Appointment has been Accepted';
                    $body = 'You have a new notification';
                    $deep_link = env('APP_URL') . '/appointment_log';
                }
                if ($request->appointment_status_code == AppointmentStatus::$Rejected) {
                    $title = 'Your Appointment has been Rejected';
                    $body = 'You have a new notification';
                    $deep_link = env('APP_URL') . '/appointment_log';
                }
                if ($request->appointment_status_code == AppointmentStatus::$Cancel) {

                    $title = 'Your Appointment has been Canceled';
                    $body = 'You have a new notification';
                    $deep_link = env('APP_URL') . '/appointment_log';
                }
                if ($request->appointment_status_code == AppointmentStatus::$Completed) {

                    $title = 'Your Appointment has been Completed';
                    $body = 'You have a new notification';
                    $deep_link = env('APP_URL') . '/appointment_log';
                    if ((int)$settings['enable_wallet_system']) {
                        if ($settings['commission_type'] == 'commission_base') {
                            $commission = Commission::where('appointment_type_id', $book_appointment->appointment_type_id)->first();
                            if ($commission && $commission->commission_type == 'fixed_rate') {
                                $commission_amount = $commission->rate ?? 0;
                                $final_amount = $book_appointment->fee - $commission_amount;
                            } else {
                                $rate = $commission->rate ?? 0;
                                $percentage_value = ($book_appointment->fee / 100) * $rate;
                                $commission_amount = $percentage_value;
                                $final_amount = $book_appointment->fee - $percentage_value;
                            }
                        } else {
                            $final_amount = $book_appointment->fee;
                        }
                        $meta = ['details' => 'Deposit on Completion of Appointment # ' . $book_appointment->id];

                        $user->deposit($final_amount, $meta);
                    }
                }
                $pusher = new PusherBeamService;
                $users = (string)$patient_id;
                $pusher->sendNotificationToUsers($users, $title, $body, $deep_link);
            }
        }
        $book_appointment = new BookAppointmentsResource($book_appointment);
        $response = generateResponse($book_appointment, isset($book_appointment) ? true : false, 'Appointment Status Updated Successfully', null, 'collection');
        return response()->json($response, 200);
    }
    public function getAppointmentCommission(Request $request)
    {
        $request->validate([
            'appointment_type_id' => 'required|integer',
        ]);
        $user = Auth()->user();

        $commission = Commission::where('appointment_type_id', $request->appointment_type_id)->first();
        $response = generateResponse($commission, true, "Commission Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
}
