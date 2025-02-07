<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\BookAppointment;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Patient;
use App\Models\Event;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function home(Request $request)
    {
        $totalDoctors = Doctor::count();
        $totalClinics = Clinic::count();
        $totalBookedAppointments = BookAppointment::count();
        $totalUsers = Patient::count();
        $totalBlogCategories = 15;
        $totalSubscriptions = DB::table('subscriptions')->count();
        $totalEvents = Event::count();
        $totalLowProfileDoctors = 0;
        $allDoctor = Doctor::has('doctor_reviews')->get();

        foreach ($allDoctor as $key => $doctor) {
            $rating = $doctor->doctor_reviews()->avg('rating');
            if (!empty($rating) && $rating < 2) {
                $totalLowProfileDoctors++;
            }
        }
        $totalCompleteDoctorProfiles = User::whereHas('doctor', function ($q) {
            $q->where('profile_completion_percentage', '>=', 25);
        })->count();
        $totalCompleteClinicProfiles = User::whereHas('clinic', function ($q) {
            $q->where('profile_completion_percentage', '>=', 25);
        })->count();
        $allClinics = Clinic::has('clinic_reviews')->get();
        $totalLowProfileClinics = 0;
        foreach ($allClinics as $key => $clinic) {
            $rating = $clinic->clinic_reviews()->avg('rating');
            if (!empty($rating) && $rating < 2) {
                $totalLowProfileClinics++;
            }
        }
        $recordsByMonthThisYear = DB::table('booked_appointments')
                                ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
                                ->where('created_at', '>=', Carbon::now()->subMonths(6)->startOfMonth())
                                ->where('created_at', '<=', Carbon::now()->endOfMonth())
                                ->groupBy('year', 'month')
                                ->orderBy('year', 'asc')
                                ->orderBy('month', 'asc')
                                ->get();
                                $appointmentRecordsByMonthsKeyed = [
                                    'Total' => 0
                                ];

                                foreach ($recordsByMonthThisYear as $group) {
                                    $year = $group->year;
                                    $month = $group->month;
                                    $count = $group->count;

                                    $monthKey = Carbon::createFromDate($year, $month, 1)->format('F');

                                    $appointmentRecordsByMonthsKeyed[$monthKey] = $count;
                                    $appointmentRecordsByMonthsKeyed['Total'] = $count + $appointmentRecordsByMonthsKeyed['Total'];
                                }
                                $recordsByMonthLastYear = DB::table('booked_appointments')
                                ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
                                ->where('created_at', '>=', Carbon::now()->subMonths(18)->startOfMonth())
                                ->where('created_at', '<=', Carbon::now()->subMonths(12))
                                ->groupBy('year', 'month')
                                ->orderBy('year', 'asc')
                                ->orderBy('month', 'asc')
                                ->get();
                                $appointmentRecordsByLasteYearMonthsKeyed = ['Total' => 0];

                                foreach ($recordsByMonthLastYear as $group) {
                                    $year = $group->year;
                                    $month = $group->month;
                                    $count = $group->count;

                                    $monthKey = Carbon::createFromDate($year, $month, 1)->format('F');

                                    $appointmentRecordsByLasteYearMonthsKeyed[$monthKey] = $count;
                                    $appointmentRecordsByLasteYearMonthsKeyed['Total'] = $count + $appointmentRecordsByMonthsKeyed['Total'];
                                }
                                $currentWeekStart = Carbon::now()->startOfWeek();
                                $currentWeekEnd = Carbon::now()->endOfWeek();
                                $lastWeekStart = Carbon::now()->subWeek()->startOfWeek()->format('Y-m-d');
                                $lastWeekEnd = Carbon::now()->subWeek()->endOfWeek()->format('Y-m-d');

                                $currentWeekPatients = DB::table('patients')
                                    ->selectRaw('DAYOFWEEK(created_at) as day, COUNT(*) as count')
                                    ->whereBetween('created_at', [$currentWeekStart, $currentWeekEnd])
                                    ->groupBy('day')
                                    ->orderBy('day')
                                    ->get();
                                    $tempCurrentWeekPatients = [];
                                    foreach ($currentWeekPatients as $group) {
                                        $day = $group->day . 'th';
                                        $count = $group->count;
                                        $tempCurrentWeekPatients[$day] = $count;
                                    }
                                    $lastWeekPatients = DB::table('patients')
                                    ->selectRaw('DAYOFWEEK(created_at) as day, COUNT(*) as count')
                                    ->whereBetween('created_at', [$lastWeekStart, $lastWeekEnd])
                                    ->groupBy('day')
                                    ->orderBy('day')
                                    ->get();
                                    $templastWeekPatients = [];
                                    foreach ($lastWeekPatients as $group) {
                                        $day = $group->day . 'th';
                                        $count = $group->count;
                                        $templastWeekPatients[$day] = $count;
                                    }

        $data = [
            'totalUsers' => $totalUsers,
            'totalBookedAppointments' => $totalBookedAppointments,
            'totalBlogCategories' => $totalBlogCategories,
            'totalSubscriptions' => $totalSubscriptions,
            'totalDoctors' => $totalDoctors,
            'total_clinics' => $totalClinics,
            'total_subscriptions' => $totalUsers,
            'totalLowProfileDoctors' => $totalLowProfileDoctors,
            'totalCompleteDoctorProfiles' => $totalCompleteDoctorProfiles,
            'totalCompleteClinicProfiles' => $totalCompleteClinicProfiles,
            'totalLowProfileUsers' => $totalLowProfileDoctors + $totalLowProfileClinics + $totalLowProfileClinics + $totalCompleteClinicProfiles,
            'totalLowProfileClinics' => $totalLowProfileClinics,
            'appointmentRecordsByMonthsKeyed' => $appointmentRecordsByMonthsKeyed,
            'appointmentRecordsByLasteYearMonthsKeyed' => $appointmentRecordsByLasteYearMonthsKeyed,
            'currentWeekPatients' => $tempCurrentWeekPatients,
            'lastWeekPatients' => $templastWeekPatients,
            'totalEvents' => $totalEvents,
        ];

        return view('super_admins.dashboard', compact('data'));
    }

    public function viewNotification(Request $request, $type)
    {
        if ($type == 'low_profile_doctors') {
            /********* Get Low Profile Doctors  **********/
            $allDoctors = Doctor::has('doctor_reviews')->get();
            $doctor_ids = [];
            foreach ($allDoctors as $key => $doctor) {
                $rating = $doctor->doctor_reviews()->avg('rating');
                if (!empty($rating) && $rating < 2) {
                    $doctor_ids[] = $doctor->id;
                }
            }
            $doctors = Doctor::whereIn('id', $doctor_ids)->get();
            return view('super_admins.view_notifications_doctors.index')->with('doctors', $doctors);
        } else if ($type == 'low_profile_clinics') {
            /********* Get Low Profile Clinics  **********/
            $allClinics = Clinic::has('clinic_reviews')->get();
            $clinic_ids = [];
            foreach ($allClinics as $key => $clinic) {
                $rating = $clinic->clinic_reviews()->avg('rating');
                if (!empty($rating) && $rating < 2) {
                    $clinic_ids[] = $clinic->id;
                }
            }
            $clinics = Clinic::whereIn('id', $clinic_ids)->get();
            return view('super_admins.view_notifications_clinics.index')->with('clinics', $clinics);

        } else if ($type == 'completed_doctor_profiles') {
            /********* Get completed_doctor_profiles  **********/
            $doctors = Doctor::where('profile_completion_percentage', '>=', 25)->get();
            return view('super_admins.view_notifications_doctors.index')->with('doctors', $doctors);
        } else if ($type == 'completed_clinic_profiles') {
            /********* Get completed_clinic_profiles  **********/
            $clinics = Clinic::where('profile_completion_percentage', '>=', 25)->get();
            return view('super_admins.view_notifications_clinics.index')->with('clinics', $clinics);
        }

    }
}
