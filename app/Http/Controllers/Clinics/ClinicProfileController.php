<?php

namespace App\Http\Controllers\Clinics;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Resources\Web\AppointmentSchedulesResource;
use App\Http\Resources\Web\AppointmentTypesResource;
use App\Http\Resources\Web\ClinicsResource;
use App\Models\AppointmentSchedule;
use App\Models\AppointmentType;
use App\Models\BookAppointment;
use App\Models\Gateway;
use App\Models\Clinic;

class ClinicProfileController extends Controller
{
    public function __construct()
    {
    }

    public function myProfile(Request $request)
    {
        $user = auth()->user();
        $clinic = $user->clinic;
        $clinic = Clinic::withChildrens()->active()->withAll()->where('id', $clinic->id)->first();
        if (!$clinic) {
            abort(404);
        }
        $clinic = new ClinicsResource($clinic);
        $appointment_types = AppointmentType::active()->get();
        $appointment_types = AppointmentTypesResource::collection($appointment_types);
        return Inertia::render('Clinics/Profile', [
            'clinic' => $clinic,
            'appointment_types' => $appointment_types
        ]);
    }
    public function profile(Request $request)
    {
        $clinic = Clinic::withChildrens()->active()->approved()->withAll()->where('user_name', $request->user_name)->first();

        if (!$clinic) {
            abort(404);
        }
        $clinic->setRelation(
            'clinic_doctors',
            $clinic->clinic_doctors->take(20)
        );
        $clinic = new ClinicsResource($clinic);
        $appointment_types = AppointmentType::active()->get();
        $appointment_types = AppointmentTypesResource::collection($appointment_types);
        return Inertia::render('Clinics/Profile', [
            'clinic' => $clinic,
            'appointment_types' => $appointment_types

        ]);
    }

    public function reviews(Request $request)
    {
        $clinic = Clinic::withChildrens()->active()->approved()->withAll()->where('user_name', $request->user_name)->first();
        if (!$clinic) {
            abort(404);
        }
        $clinic = new ClinicsResource($clinic);
        return Inertia::render('Clinics/Reviews', [
            'clinic' => $clinic
        ]);
    }
    public function bookAppointment(Request $request, $user_name)
    {
        $clinic = Clinic::where('user_name', $user_name)->first();
        $clinic_id = $clinic->id;
        $appointment_type = AppointmentType::select('id', 'is_schedule_required','display_name')->where('type', $request->type)->first();

        $appointment_type_id = $appointment_type->id;
        $day = strtolower(Date('l'));
        $date = today();
        if ($appointment_type->is_schedule_required) {
            $schedule = AppointmentSchedule::with('appointment_type')->with('schedule_slots')->where('clinic_id', $clinic_id)->where('appointment_type_id', $appointment_type_id)->where('day', $day)->first();
        } else {
            $schedule = AppointmentSchedule::with('appointment_type')->with('schedule_slots')->where('clinic_id', $clinic_id)->where('appointment_type_id', $appointment_type_id)->first();
        }
        if ($schedule) {
            $scheduleSlots = $schedule->schedule_slots;
            if (count($scheduleSlots) > 0) {
                foreach ($scheduleSlots as $scheduleSlot) {
                    $is_disabled = BookAppointment::where('clinic_id', $clinic_id)
                        ->whereDate('date', $date)
                        ->where('is_paid', 1)
                        ->where(function ($q) use ($scheduleSlot) {
                            $q->where(function ($z) use ($scheduleSlot) {
                                $z->where('start_time', $scheduleSlot->start_time);
                                $z->where('end_time', $scheduleSlot->end_time);
                            });
                        })->count();

                    $scheduleSlot['is_disabled'] = $is_disabled;
                }
            }
            $schedule = new AppointmentSchedulesResource($schedule);
        } else {
            $schedule = null;
        }
        $gateways = Gateway::where('status', 1)->orderBy('sort_by', 'ASC')->get();

        return Inertia::render('Clinics/BookAppointment', [
            'schedule' => $schedule,
            'clinic_id' => $clinic_id,
            'clinic' => $clinic,
            'appointment_type_name' => $appointment_type->display_name,
            'appointment_type_id' => $appointment_type_id,
            'is_schedule_required' => $appointment_type->is_schedule_required,
            "gateways" => $gateways

        ]);
    }
}
