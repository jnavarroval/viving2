<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\AppointmentStatus;
use App\Models\BookAppointment;
use App\Models\Patient;
use App\Models\Event;
use App\Models\Clinic;
use App\Models\Doctor;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function home(Request $request)
    {
        $totalUsers = Patient::count();
        $totalDoctors = Doctor::has('user')->whereNotNull('user_name')->active()->approved()->count();
        $totalClinic = Clinic::active()->approved()->count();
        $totalEvents = Event::active()->approved()->upcoming()->count();
        $totalAppointments = BookAppointment::where('appointment_status_code',AppointmentStatus::$Completed)->count();
        $data = [
            'total_users' => $totalUsers,
            'total_doctors' => $totalDoctors,
            'total_law_frims' => $totalClinic,
            'total_events' => $totalEvents,
            'total_subscriptions' => $totalUsers,
            'total_appointments' => $totalAppointments,
        ];
        return Inertia::render('Home',['dashboard_data' => $data]);
    }
}
