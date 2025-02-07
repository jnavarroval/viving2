<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\State;
use App\Models\DoctorCategory;

class WebAPIController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function getCountries(Request $request)
    {
        $countries = WebAPIGeneralController::getCountries($request);
        $response = generateResponse($countries, true, "Countries Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getStates(Request $request)
    {
        $request->validate(['country_id' => 'exists:countries,id']);
        $states = WebAPIGeneralController::getStates($request);
        $response = generateResponse($states, true, "States Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getEvents(Request $request)
    {
        $events = WebAPIGeneralController::searchEvents($request);
        $response = generateResponse($events, true, "Events Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getTestimonials(Request $request)
    {
        $testimonials = WebAPIGeneralController::getTestimonials($request);
        $response = generateResponse($testimonials, true, "Testimonials Fetched Successfully", null, 'collection');
        return response()->json($response);
    }


    public function getPosts(Request $request)
    {
        $posts = WebAPIGeneralController::searchPosts($request);
        $response = generateResponse($posts, true, "Posts Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getArchives(Request $request)
    {
        $archives = WebAPIGeneralController::searchArchives($request);
        $response = generateResponse($archives, true, "Archives Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getCourses(Request $request)
    {
        $archives = WebAPIGeneralController::getArchives($request);
        $response = generateResponse($archives, true, "Archives Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getBroadcasts(Request $request)
    {
        $broadcasts = WebAPIGeneralController::searchBroadcasts($request);
        $response = generateResponse($broadcasts, true, "Broadcasts Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getPodcasts(Request $request)
    {
        $podcasts = WebAPIGeneralController::searchPodcasts($request);
        $response = generateResponse($podcasts, true, "Podcasts Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getDoctors(Request $request)
    {
        // $request->validate(['country_id' => 'exists:countries,id']);
        $doctors = WebAPIGeneralController::searchDoctors($request);

        $response = generateResponse($doctors, true, "Doctors Fetched Successfully", null, 'collection');
        return response()->json($response);
    }



    public function getDoctorReviews(Request $request, $user_name)
    {
        $doctor_reviews = WebAPIGeneralController::searchDoctorReviews($request, $user_name);
        $response = generateResponse($doctor_reviews, true, "Doctor Reviews Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getTopRatedDoctorCategories(Request $request)
    {
        $doctor_reviews = WebAPIGeneralController::getTopRatedDoctorCategories();
        $response = generateResponse($doctor_reviews, true, "Top Rated Doctor Categories Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getClinicReviews(Request $request, $user_name)
    {
        $clinic_reviews = WebAPIGeneralController::searchClinicReviews($request, $user_name);
        $response = generateResponse($clinic_reviews, true, "Clinic Reviews Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getClinics(Request $request)
    {
        // $request->validate(['country_id' => 'exists:countries,id']);
        $clinics = WebAPIGeneralController::searchClinics($request);
        $response = generateResponse($clinics, true, "Clinics Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getClinicCategories(Request $request)
    {
        $clinic_categories = WebAPIGeneralController::getClinicCategories($request);
        $response = generateResponse($clinic_categories, true, "Clinic Categories Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getBlogCategories(Request $request)
    {
        $blog_categories = WebAPIGeneralController::getBlogCategories($request);
        $response = generateResponse($blog_categories, true, "Blog Categories Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getTags(Request $request)
    {
        $tags = WebAPIGeneralController::getTags($request);
        $response = generateResponse($tags, true, "Tags Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getArchiveCategories(Request $request)
    {
        $archive_categories = WebAPIGeneralController::getArchiveCategories($request);
        $response = generateResponse($archive_categories, true, "Blog Categories Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getDoctorCategories(Request $request)
    {
        $doctor_categories = WebAPIGeneralController::getDoctorCategories($request);
        $response = generateResponse($doctor_categories, true, "Doctor Categories Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getFeaturedDoctorCategories(Request $request)
    {
        $featured_doctor_categories = WebAPIGeneralController::getFeaturedDoctorCategories($request);
        $response = generateResponse($featured_doctor_categories, true, "Doctor Categories Fetched Successfully", null, 'collection');
        return response()->json($response);
    }


    public function getCities(Request $request)
    {
        $request->validate(['state_id' => 'exists:states,id']);
        $cities = WebAPIGeneralController::getCities($request);
        $response = generateResponse($cities, true, "Cities Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getFeaturedTags(Request $request)
    {
        $featured_tags = WebAPIGeneralController::getFeaturedTags($request);
        $response = generateResponse($featured_tags, true, "Featured Tags Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getFeaturedDoctors(Request $request)
    {
        $featured_doctors = WebAPIGeneralController::getFeaturedDoctors($request);
        $response = generateResponse($featured_doctors, true, "Featured Doctors Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getTopRatedDoctors(Request $request)
    {
        $top_rated_doctors = WebAPIGeneralController::getTopRatedDoctors($request);
        $response = generateResponse($top_rated_doctors, true, "Featured Doctors Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getPremiumDoctors(Request $request)
    {
        $premium_doctores = WebAPIGeneralController::getPremiumDoctors($request);
        $response = generateResponse($premium_doctores, true, "Premium Doctors Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getFeaturedEvents(Request $request)
    {
        $featured_events = WebAPIGeneralController::getFeaturedEvents($request);
        $response = generateResponse($featured_events, true, "Featured Events Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getSpotlightDoctors(Request $request)
    {
        $spotlight_doctors = WebAPIGeneralController::getSpotlightDoctors($request);
        $response = generateResponse($spotlight_doctors, true, "Spotlight Doctors Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getFeaturedClinics(Request $request)
    {
        $featured_clinics = WebAPIGeneralController::getFeaturedClinics($request);
        $response = generateResponse($featured_clinics, true, "Featured Clinics Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getFaqs(Request $request)
    {
        $faqs = WebAPIGeneralController::getFaqs($request);
        $response = generateResponse($faqs, true, "FAQS Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getServiceCategories(Request $request)
    {
        $service_categories = WebAPIGeneralController::getServiceCategories($request);

        $response = generateResponse($service_categories, true, "ServiceCategories Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getServices(Request $request)
    {
        $services = WebAPIGeneralController::searchServices($request);
        $response = generateResponse($services, true, "Services Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getAllReviews(Request $request)
    {
        $services = WebAPIGeneralController::getAllReviews();
        $response = generateResponse($services, true, "Reviews Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getAllPricingPlans(Request $request)
    {
        $services = WebAPIGeneralController::getAllPricingPlans();
        $response = generateResponse($services, true, "Pricing Plans Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getAllServiceDoctors(Request $request)
    {
        $services = WebAPIGeneralController::getAllServiceDoctors();
        $response = generateResponse($services, true, "Service Doctors Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getAllMedicalTest(Request $request)
    {
        $services = WebAPIGeneralController::getAllMedicalTest();
        $response = generateResponse($services, true, "Medical Test Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getAllPatientHealth(Request $request)
    {
        $services = WebAPIGeneralController::getAllPatientHealth();
        $response = generateResponse($services, true, "Medical Test Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getLastWeekAppointment(Request $request)
    {
        $services = WebAPIGeneralController::getLastWeekAppointment($request);
        $response = generateResponse($services, true, "Last Week Appointment  Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
    public function getLastWeekTransaction(Request $request)
    {
        $services = WebAPIGeneralController::getLastWeekTransaction($request);
        $response = generateResponse($services, true, "Last Week Appointment  Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
}
