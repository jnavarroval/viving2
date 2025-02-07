<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Web\AppointmentSchedulesResource;
use App\Models\AppointmentSchedule;
use App\Models\BookAppointment;
use App\Models\Currency;
use App\Models\Gateway;
use App\Models\Language;
use Carbon\Carbon;

class APIController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }


    public function getAllSettings()
    {
        $settings = generalSettings();
        $default_currency = Currency::where('is_default', 1)->first();
        $settings['default_currency'] = $default_currency;
        $response = generateResponse($settings, true, "Settings Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getCountries(Request $request)
    {
        $countries = APIGeneralController::getCountries($request);
        $response = generateResponse($countries, true, "Countries Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getStates(Request $request)
    {
        $request->validate(['country_id' => 'exists:countries,id']);
        $states = APIGeneralController::getStates($request);
        $response = generateResponse($states, true, "States Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getEvents(Request $request)
    {
        $events = APIGeneralController::searchEvents($request);
        $response = generateResponse($events, true, "Events Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getTestimonials(Request $request)
    {
        $testimonials = APIGeneralController::getTestimonials($request);
        $response = generateResponse($testimonials, true, "Testimonials Fetched Successfully", null, 'collection');
        return response()->json($response);
    }


    public function getPosts(Request $request)
    {
        $posts = APIGeneralController::searchPosts($request);
        $response = generateResponse($posts, true, "Posts Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getArchives(Request $request)
    {
        $archives = APIGeneralController::searchArchives($request);
        $response = generateResponse($archives, true, "Archives Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getBroadcasts(Request $request)
    {
        $broadcasts = APIGeneralController::searchBroadcasts($request);
        $response = generateResponse($broadcasts, true, "Broadcasts Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getPodcasts(Request $request)
    {
        $podcasts = APIGeneralController::searchPodcasts($request);
        $response = generateResponse($podcasts, true, "Podcasts Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getDoctors(Request $request)
    {
        // $request->validate(['country_id' => 'exists:countries,id']);
        $doctors = APIGeneralController::searchDoctors($request);
        $response = generateResponse($doctors, true, "Doctors Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getAllPatientDoctors(Request $request)
    {
        // $request->validate(['country_id' => 'exists:countries,id']);
        $doctors = APIGeneralController::getAllPatientDoctors($request);
        $response = generateResponse($doctors, true, "Doctors Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getAllPatientDiseases(Request $request)
    {
        // $request->validate(['country_id' => 'exists:countries,id']);
        $diseases = APIGeneralController::getAllPatientDiseases($request);
        $response = generateResponse($diseases, true, "Diseases Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getAllPatientAppointments(Request $request)
    {
        // $request->validate(['country_id' => 'exists:countries,id']);
        $appointments = APIGeneralController::getAllPatientAppointments($request);
        $response = generateResponse($appointments, true, "Appointments Fetched Successfully", null, 'collection');
        return response()->json($response);
    }



    public function getDoctorReviews(Request $request, $user_name)
    {
        $doctor_reviews = APIGeneralController::searchDoctorReviews($request, $user_name);
        $response = generateResponse($doctor_reviews, true, "Doctor Reviews Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getDoctorPodcasts(Request $request, $user_name)
    {
        $doctor_podcasts = APIGeneralController::searchDoctorPodcasts($request, $user_name);
        $response = generateResponse($doctor_podcasts, true, "Doctor Podcasts Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getDoctorBroadcasts(Request $request, $user_name)
    {
        $doctor_broadcasts = APIGeneralController::searchDoctorBroadcasts($request, $user_name);
        $response = generateResponse($doctor_broadcasts, true, "Doctor Broadcasts Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getClinicReviews(Request $request, $user_name)
    {
        $clinic_reviews = APIGeneralController::searchClinicReviews($request, $user_name);
        $response = generateResponse($clinic_reviews, true, "Clinic Reviews Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getClinics(Request $request)
    {
        // $request->validate(['country_id' => 'exists:countries,id']);
        $clinics = APIGeneralController::searchClinics($request);
        $response = generateResponse($clinics, true, "Clinics Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getClinicCategories(Request $request)
    {
        $clinic_categories = APIGeneralController::getClinicCategories($request);
        $response = generateResponse($clinic_categories, true, "Clinic Categories Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getBlogCategories(Request $request)
    {
        $blog_categories = APIGeneralController::getBlogCategories($request);
        $response = generateResponse($blog_categories, true, "Blog Categories Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getTags(Request $request)
    {
        $tags = APIGeneralController::getTags($request);
        $response = generateResponse($tags, true, "Tags Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getArchiveCategories(Request $request)
    {
        $archive_categories = APIGeneralController::getArchiveCategories($request);
        $response = generateResponse($archive_categories, true, "Blog Categories Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getDoctorCategories(Request $request)
    {
        $doctor_categories = APIGeneralController::getDoctorCategories($request);
        $response = generateResponse($doctor_categories, true, "Doctor All Categories Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getDoctorMainCategoriesWithChildrens(Request $request)
    {
        $doctor_main_categories = APIGeneralController::getDoctorMainCategoriesWithChildrens($request);
        $response = generateResponse($doctor_main_categories, true, "Doctor Main Categories with Childrens Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getClinicMainCategoriesWithChildrens(Request $request)
    {
        $doctor_main_categories = APIGeneralController::getClinicMainCategoriesWithChildrens($request);
        $response = generateResponse($doctor_main_categories, true, "Clinic Main Categories with Childrens Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getCities(Request $request)
    {
        $request->validate(['state_id' => 'exists:states,id']);
        $cities = APIGeneralController::getCities($request);
        $response = generateResponse($cities, true, "Cities Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getFeaturedTags(Request $request)
    {
        $featured_tags = APIGeneralController::getFeaturedTags($request);
        $response = generateResponse($featured_tags, true, "Featured Tags Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getFeaturedDoctors(Request $request)
    {
        $featured_doctors = APIGeneralController::getFeaturedDoctors($request);
        $response = generateResponse($featured_doctors, true, "Featured Doctors Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getTopRatedDoctors(Request $request)
    {
        $featured_doctors = APIGeneralController::getTopRatedDoctors($request);
        $response = generateResponse($featured_doctors, true, "Top Doctors Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getFeaturedEvents(Request $request)
    {
        $featured_events = APIGeneralController::getFeaturedEvents($request);
        $response = generateResponse($featured_events, true, "Featured Events Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getSpotlightDoctors(Request $request)
    {
        $spotlight_doctors = APIGeneralController::getSpotlightDoctors($request);
        $response = generateResponse($spotlight_doctors, true, "Spotlight Doctors Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getFeaturedClinics(Request $request)
    {
        $featured_clinics = APIGeneralController::getFeaturedClinics($request);
        $response = generateResponse($featured_clinics, true, "Featured Clinics Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getCompanyPage(Request $request, $slug)
    {
        $company_page = APIGeneralController::getCompanyPage($request, $slug);
        $response = generateResponse($company_page, true, "Company Page $slug Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getAppointmentScheduleSlots(Request $request)
    {
        // $doctor_id = 2;
        $doctor_id = $request->doctor_id;
        $day = Carbon::parse($request->selected_date)->format('l');
        $day = strtolower($day);
        $date = Carbon::parse($request->selected_date);
        $schedule = AppointmentSchedule::with('schedule_slots')->where('doctor_id', $doctor_id)->where('appointment_type_id', $request->appointment_type_id)->where('day', $day)->first();
        if ($schedule) {
            $scheduleSlots = $schedule->schedule_slots;
            if (count($scheduleSlots) > 0) {
                foreach ($scheduleSlots as $scheduleSlot) {
                    $is_disabled = BookAppointment::where('doctor_id', $doctor_id)
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
        $response = generateResponse($schedule, true, "Appointment Schedule Slots Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getClinicAppointmentScheduleSlots(Request $request)
    {
        $clinic_id = $request->clinic_id;
        $day = Carbon::parse($request->selected_date)->format('l');
        $day = strtolower($day);
        $date = Carbon::parse($request->selected_date);

        $schedule = AppointmentSchedule::with('schedule_slots')->where('clinic_id', $clinic_id)->where('appointment_type_id', $request->appointment_type_id)->where('day', $day)->first();
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
        $response = generateResponse($schedule, true, "Appointment Schedule Slots Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getAppointmentTypes(Request $request)
    {
        $appointment_types = APIGeneralController::getAppointmentTypes($request);
        $response = generateResponse($appointment_types, true, "AppointmentTypes Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getAllGateways()
    {
        $gateways = Gateway::where('status', 1)->orderBy('sort_by', 'ASC')->get();
        $response = generateResponse($gateways, true, "Gateways Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getServiceCategories(Request $request)
    {
        $service_categories = APIGeneralController::getServiceCategories($request);
        $response = generateResponse($service_categories, true, "Service Categories Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getServices(Request $request)
    {
        $services = APIGeneralController::searchServices($request);
        $response = generateResponse($services, true, "Services Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getAllLanguages()
    {
        $language = Language::active()->get();
        $response = generateResponse($language, true, "language Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getAllMedicalTests(Request $request)
    {
        $services = APIGeneralController::getAllMedicalTests();
        $response = generateResponse($services, true, "Medical Test Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getAllPatientHealths(Request $request)
    {
        $services = APIGeneralController::getAllPatientHealths();
        $response = generateResponse($services, true, "Medical Test Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getAllDiseases(Request $request)
    {
        $services = APIGeneralController::getAllDiseases();
        $response = generateResponse($services, true, "Medical Test Fetched Successfully", null, 'collection');
        return response()->json($response);
    }



    public function patientAppointmens(Request $request)
    {
        $appointments = APIGeneralController::searchAppointments($request);
        $response = generateResponse($appointments, true, "appointments Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function patientAppointmentDiseases(Request $request)
    {
        $diseases = APIGeneralController::searchDiseases($request);
        $response = generateResponse($diseases, true, "diseases Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function patientAppointmentDoctors(Request $request)
    {
        $doctors = APIGeneralController::searchPatientDoctors($request);
        $response = generateResponse($doctors, true, "doctors Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

}
