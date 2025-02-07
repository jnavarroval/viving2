<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\Web\ArchiveCategoriesResource;
use App\Http\Resources\Web\BlogCategoriesResource;
use App\Http\Resources\Web\ClinicCategoriesResource;
use App\Http\Resources\Web\ClinicsResource;
use App\Http\Resources\Web\ArchivesResource;
use App\Http\Resources\Web\BroadcastsResource;
use App\Http\Resources\Web\ClinicReviewsResource;
use App\Http\Resources\Web\DoctorCategoriesResource;
use App\Http\Resources\Web\EventsResource;
use App\Http\Resources\Web\FAQSResource;
use App\Http\Resources\Web\DoctorMainCategoriesResource;
use App\Http\Resources\Web\PostsResource;
use App\Http\Resources\Web\PodcastsResource;
use App\Http\Resources\Web\ServiceCategoriesResource;
use App\Http\Resources\Web\ServicesResource;
use App\Http\Resources\Web\DoctorReviewsResource;
use App\Http\Resources\Web\DoctorsResource;
use App\Http\Resources\Web\MedicalTestResource;
use App\Http\Resources\Web\ModulesResource;
use App\Http\Resources\Web\PatientHealthResource;
use App\Http\Resources\Web\PricingPlansResource;
use App\Http\Resources\Web\RecordHealthResource;
use App\Http\Resources\Web\TagsResource;
use App\Http\Resources\Web\TestimonialsResource;
use App\Models\ArchiveCategory;
use App\Models\BlogCategory;
use App\Models\Clinic;
use App\Models\ClinicCategory;
use App\Models\City;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\Archive;
use App\Models\Broadcast;
use App\Models\ClinicReview;
use App\Models\State;
use App\Models\DoctorCategory;
use App\Models\Event;
use App\Models\FAQ;
use App\Models\DoctorMainCategory;
use App\Models\Post;
use App\Models\Podcast;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\DoctorReview;
use App\Models\MedicalTest;
use App\Models\PatientHealth;
use App\Models\PricingPlan;
use App\Models\PricingPlanModule;
use App\Models\RecordHealth;
use App\Models\Tag;
use App\Models\Test;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class WebAPIGeneralController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public static function searchDoctorReviews($req = null, $user_name)
    {
        if ($req != null) {
            $reviews =  DoctorReview::withAll()->active()->whereHas('doctor', function ($q) use ($user_name) {
                $q->where('user_name', $user_name);
                $q->active();
            });
            if ($req->column && $req->column != null && $req->search != null) {
                $reviews = $reviews->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {
                $reviews = $reviews->whereLike(['comment', 'rating'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $reviews = $reviews->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $reviews = $reviews->OrderBy('id', 'desc');
            }
            $reviews = $reviews->paginate($req->perPage ?? 10);
            $reviews = DoctorReviewsResource::collection($reviews)->response()->getData(true);
            return $reviews;
        }
        $reviews = DoctorReview::withAll()->active()->whereHas('doctor', function ($q) use ($user_name) {
            $q->where('user_name', $user_name);
            $q->active();
        })->orderBy('id', 'desc')->paginate(10);
        $reviews = DoctorReviewsResource::collection($reviews)->response()->getData(true);
        return $reviews;
    }
    public static function getTopRatedDoctorCategories()
    {
        //     $doctor_categories = DoctorCategory::withAll()->whereHas('doctors',function($q){
        //      $q->whereHas('doctor_reviews', function ($q) {
        //          $q->where('rating', '>=', 4);
        //          $q->orderBy('rating', 'desc');
        //      });
        //      $q->active();
        // })->active()->get();
        $doctor_categories = DoctorMainCategory::withAll()->whereHas('categories', function ($query) {
            $query->whereHas('doctors', function ($q) {
                $q->whereHas('doctor_reviews', function ($q) {
                    $q->where('rating', '>=', 4);
                    $q->orderBy('rating', 'desc');
                });
                $q->active();
            });
        })->active()->get();
        $doctor_categories = DoctorMainCategoriesResource::collection($doctor_categories)->response()->getData(true);
        return $doctor_categories;
    }

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public static function searchClinicReviews($req = null, $user_name)
    {
        if ($req != null) {
            $reviews =  ClinicReview::withAll()->active()->whereHas('clinic', function ($q) use ($user_name) {
                $q->where('user_name', $user_name);
                $q->active();
            });
            if ($req->column && $req->column != null && $req->search != null) {
                $reviews = $reviews->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {
                $reviews = $reviews->whereLike(['comment', 'rating'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $reviews = $reviews->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $reviews = $reviews->OrderBy('id', 'desc');
            }
            $reviews = $reviews->paginate($req->perPage ?? 10);
            $reviews = ClinicReviewsResource::collection($reviews)->response()->getData(true);
            return $reviews;
        }

        $reviews = ClinicReview::withAll()->active()->whereHas('clinic', function ($q) use ($user_name) {
            $q->where('user_name', $user_name);
            $q->active();
        })->orderBy('id', 'desc')->paginate(10);
        $reviews = ClinicReviewsResource::collection($reviews)->response()->getData(true);
        return $reviews;
    }
    /********* Getter For Pagination, Searching And Sorting  ***********/
    public static function searchDoctors($req = null)
    {

        if ($req != null) {
            $doctors =  Doctor::withAll()->has('user')->whereNotNull('user_name')->active()->approved();
            if ($req->doctor_category) {
                $doctor_main_category = DoctorMainCategory::where('slug', $req->doctor_main_category)->first();
                if ($doctor_main_category) {
                    $doctors = $doctors->whereHas('doctor_categories', function ($q) use ($req, $doctor_main_category) {
                        $q->where('doctor_categories.parent_category_id', $doctor_main_category->id);
                    });
                }
            }
            if ($req->main_category && $req->main_category != 'all' && $req->doctor_category == 'all') {
                $doctors = $doctors->whereHas('doctor_categories', function ($q) use ($req) {
                    $q->whereHas('main_category', function ($y) use ($req) {
                        $y->where('doctor_main_categories.slug', $req->main_category);
                    });
                });
            }
            if ($req->doctor_category && $req->doctor_category != 'all') {
                if (is_array($req->doctor_category)) {
                    $slugs = Arr::flatten($req->doctor_category);

                    $doctors = $doctors->whereHas('doctor_categories', function ($q) use ($req, $slugs) {
                        $q->whereIn('doctor_categories.id', $slugs);
                    });
                } else {
                    $doctors = $doctors->whereHas('doctor_categories', function ($q) use ($req) {
                        $q->where('doctor_categories.slug', $req->doctor_category);
                    });
                }
            }
            if ($req->country_id) {
                $doctors = $doctors->where('country_id', $req->country_id);
            }
            if ($req->region) {
                $doctors = $doctors->with('country')->whereHas('country', function ($q) use ($req) {
                    $q->where('region', $req->region);
                });
            }
            if ($req->language) {
                $doctors = $doctors->whereHas('languages', function ($q) use ($req) {
                    $q->where('all_languages.iso_code', $req->language);
                });
            }
            if ($req->is_featured) {
                $doctors = $doctors->featured();
            }
            if ($req->country) {
                $doctors = $doctors->where('country_id', $req->country);
            }
            if ($req->zip_code) {
                $doctors = $doctors->where('zip_code', $req->zip_code);
            }
            if ($req->is_top_rated) {
                $doctors = $doctors->topRated();
            }



            if ($req->column && $req->column != null && $req->search != null) {
                $doctors = $doctors->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {
                $doctors = $doctors->whereLike(['first_name', 'last_name', 'description'], $req->search);
            }
            if ($req->search && $req->search != null) {
                if ($req->column && $req->column != null) {
                    // Search in the specific column provided
                    $doctors = $doctors->whereLike($req->column, $req->search);
                } else {
                    // Search across multiple columns by default
                    $doctors = $doctors->whereLike(['first_name', 'last_name', 'description'], $req->search);
                }
            }
            // if ($req->sort_field != null && $req->sort_type != null) {
            //     $doctors = $doctors->OrderBy($req->sort_field, $req->sort_type);
            // }

            if ($req->rating) {
                $doctors = $doctors->whereHas('doctor_reviews', function ($q) use ($req) {
                    $q->where('rating', '>=', $req->rating);
                });
            }

            if ($req->review) {
                $doctors = $doctors->having('doctor_reviews_count', '>=', $req->review);
            }

            if ($req->start_price && $req->end_price) {

                $doctors = $doctors->whereHas('appointment_schedules', function ($q) use ($req) {
                    $q->where('fee', '>=', $req->start_price)
                        ->where('fee', '<=', $req->end_price);
                });
            }


            if ($req->latitude && $req->longitude) {
                $doctors = $doctors->distance($req->latitude, $req->longitude, $req->distance);
                $doctors = $doctors->OrderBy('distance', 'asc');
            } else {
                $doctors = $doctors->OrderBy('id', 'desc');
            }

            $doctors = $doctors->paginate($req->perPage ?? 10);
            $doctors = DoctorsResource::collection($doctors)->response()->getData(true);
            return $doctors;
        }

        $doctors = Doctor::withAll()->orderBy('id', 'desc')->paginate(10);

        $doctors = DoctorsResource::collection($doctors)->response()->getData(true);
        return $doctors;
    }



    /********* Getter For Pagination, Searching And Sorting  ***********/
    public static function searchClinics($req = null)
    {
        if ($req != null) {
            $clinics =  Clinic::withAll()->has('user')->whereNotNull('user_name')->approved();
            if ($req->clinic_category) {
                $clinics = $clinics->whereHas('clinic_categories', function ($q) use ($req) {
                    $q->where('clinic_categories.slug', $req->clinic_category);
                });
            }
            if ($req->country) {
                $clinics = $clinics->where('country_id', $req->country);
            }
            if ($req->search && $req->search != null) {
                if ($req->column && $req->column != null) {
                    // Search in the specific column provided
                    $clinics = $clinics->whereLike($req->column, $req->search);
                } else {
                    // Search across multiple columns by default
                    $clinics = $clinics->whereLike(['first_name', 'last_name', 'description'], $req->search);
                }
            }
            if ($req->rating) {
                $clinics = $clinics->whereHas('clinic_reviews', function ($q) use ($req) {
                    $q->where('rating', '>=', $req->rating);
                });
            }
            if ($req->review) {
                $clinics = $clinics->withCount('clinic_reviews')->having('clinic_reviews_count', '>=', $req->review);
            }
            if ($req->start_price && $req->end_price) {

                $clinics = $clinics->whereHas('appointment_schedules', function ($q) use ($req) {
                    $q->where('fee', '>=', $req->start_price)
                        ->where('fee', '<=', $req->end_price);
                });
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $clinics = $clinics->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $clinics = $clinics->OrderBy('id', 'desc');
            }
            $clinics = $clinics->paginate($req->perPage ?? 10);
            $clinics = ClinicsResource::collection($clinics)->response()->getData(true);
            return $clinics;
        }
        $clinics = Clinic::withAll()->orderBy('id', 'desc')->paginate(10);
        $clinics = ClinicsResource::collection($clinics)->response()->getData(true);
        return $clinics;
    }

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public static function searchEvents($req = null)
    {
        if ($req != null) {
            $events =  Event::withAll()->active()->approved()->upcoming()->hasModulePermissions();
            if ($req->month) {
                $months = [
                    'jan' => 1,
                    'feb' => 2,
                    'mar' => 3,
                    'apr' => 4,
                    'may' => 5,
                    'jun' => 6,
                    'jul' => 7,
                    'aug' => 8,
                    'sep' => 9,
                    'oct' => 10,
                    'nov' => 11,
                    'dec' => 12
                ];
                if (isset($months[$req->month])) {
                    $events = $events->whereMonth('starts_at', $months[$req->month]);
                }
            }
            if ($req->address) {
                $events = $events->whereLike(['address_line_1', 'address_line_2'], $req->address);
            }
            if ($req->doctor) {
                $events = $events->whereHas('doctor', function ($q) use ($req) {
                    $q->where('user_name', $req->doctor);
                });
            }
            if ($req->doctor) {
                $events = $events->whereHas('doctor', function ($q) use ($req) {
                    $q->where('user_name', $req->doctor);
                });
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $events = $events->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {
                $events = $events->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $events = $events->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $events = $events->OrderBy('id', 'desc');
            }
            $events = $events->paginate($req->perPage ?? 10);
            $events = EventsResource::collection($events)->response()->getData(true);
            return $events;
        }
        $events = Event::withAll()->hasModulePermissions()->active()->upcoming()->orderBy('id', 'desc')->paginate(10);
        $events = EventsResource::collection($events)->response()->getData(true);
        return $events;
    }

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public static function searchPosts($req = null)
    {

        if ($req != null) {
            $posts =  Post::withAll()->active()->hasModulePermissions();
            if ($req->tag) {
                $posts = $posts->whereHas('tags', function ($q) use ($req) {
                    $q->where('slug', $req->tag);
                });
            }
            if ($req->doctor) {
                $posts = $posts->whereHas('doctor', function ($q) use ($req) {
                    $q->where('user_name', $req->doctor);
                });
            }
            if ($req->clinic) {
                $posts = $posts->whereHas('clinic', function ($q) use ($req) {
                    $q->where('clinic_name', $req->clinic);
                });
            }

            if ($req->blog_category) {
                $posts = $posts->whereHas('blog_category', function ($q) use ($req) {
                    $q->where('slug', $req->blog_category);
                });
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $posts = $posts->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {
                $posts = $posts->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $posts = $posts->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $posts = $posts->OrderBy('id', 'desc');
            }
            $posts = $posts->paginate($req->perPage ?? 10);
            $posts = PostsResource::collection($posts)->response()->getData(true);
            return $posts;
        }
        $posts = Post::withAll()->hasModulePermissions()->orderBy('id', 'desc')->paginate(10);
        $posts = PostsResource::collection($posts)->response()->getData(true);
        return $posts;
    }

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public static function searchArchives($req = null)
    {
        if ($req != null) {
            $archives =  Archive::withAll()->active()->hasModulePermissions();
            if ($req->tag) {
                $archives = $archives->whereHas('tags', function ($q) use ($req) {
                    $q->where('slug', $req->tag);
                });
            }
            if ($req->archive_category) {
                $archives = $archives->whereHas('archive_category', function ($q) use ($req) {
                    $q->where('slug', $req->archive_category);
                });
            }
            if ($req->doctor) {
                $archives = $archives->whereHas('doctor', function ($q) use ($req) {
                    $q->where('user_name', $req->doctor);
                });
            }
            if ($req->clinic) {
                $archives = $archives->whereHas('clinic', function ($q) use ($req) {
                    $q->where('clinic_name', $req->clinic);
                });
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $archives = $archives->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {
                $archives = $archives->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $archives = $archives->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $archives = $archives->OrderBy('id', 'desc');
            }
            $archives = $archives->paginate($req->perPage ?? 10);
            $archives = ArchivesResource::collection($archives)->response()->getData(true);
            return $archives;
        }
        $archives = Archive::withAll()->hasModulePermissions()->orderBy('id', 'desc')->paginate(10);
        $archives = ArchivesResource::collection($archives)->response()->getData(true);
        return $archives;
    }

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public static function searchBroadcasts($req = null)
    {
        if ($req != null) {
            $broadcasts =  Broadcast::withAll()->active()->hasModulePermissions();
            if ($req->tag) {
                $broadcasts = $broadcasts->whereHas('tags', function ($q) use ($req) {
                    $q->where('slug', $req->tag);
                });
            }
            if ($req->doctor) {
                $broadcasts = $broadcasts->whereHas('doctor', function ($q) use ($req) {
                    $q->where('user_name', $req->doctor);
                });
            }
            if ($req->clinic) {
                $broadcasts = $broadcasts->whereHas('clinic', function ($q) use ($req) {
                    $q->where('clinic_name', $req->clinic);
                });
            }
            if ($req->type) {
                $broadcasts = $broadcasts->whereLike('file_type', $req->type);
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $broadcasts = $broadcasts->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {
                $broadcasts = $broadcasts->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $broadcasts = $broadcasts->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $broadcasts = $broadcasts->OrderBy('id', 'desc');
            }
            $broadcasts = $broadcasts->paginate($req->perPage ?? 10);
            $broadcasts = BroadcastsResource::collection($broadcasts)->response()->getData(true);
            return $broadcasts;
        }
        $broadcasts = Broadcast::withAll()->hasModulePermissions()->orderBy('id', 'desc')->paginate(10);
        $broadcasts = BroadcastsResource::collection($broadcasts)->response()->getData(true);
        return $broadcasts;
    }

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public static function searchPodcasts($req = null)
    {
        if ($req != null) {
            $podcasts =  Podcast::withAll()->active()->hasModulePermissions();
            if ($req->tag) {
                $podcasts = $podcasts->whereHas('tags', function ($q) use ($req) {
                    $q->where('slug', $req->tag);
                });
            }
            if ($req->doctor) {
                $podcasts = $podcasts->whereHas('doctor', function ($q) use ($req) {
                    $q->where('user_name', $req->doctor);
                });
            }
            if ($req->clinic) {
                $podcasts = $podcasts->whereHas('clinic', function ($q) use ($req) {
                    $q->where('clinic_name', $req->clinic);
                });
            }
            if ($req->type) {
                $podcasts = $podcasts->whereLike('file_type', $req->type);
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $podcasts = $podcasts->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {
                $podcasts = $podcasts->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $podcasts = $podcasts->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $podcasts = $podcasts->OrderBy('id', 'desc');
            }
            $podcasts = $podcasts->paginate($req->perPage ?? 10);
            $podcasts = PodcastsResource::collection($podcasts)->response()->getData(true);
            return $podcasts;
        }
        $podcasts = Podcast::withAll()->hasModulePermissions()->orderBy('id', 'desc')->paginate(10);
        $podcasts = PodcastsResource::collection($podcasts)->response()->getData(true);
        return $podcasts;
    }

    public static function searchServices($req = null)
    {
        if ($req != null) {
            $services =  Service::approved()->withAll()->withChildrens()->active()->hasModulePermissions();
            if ($req->tag) {
                $services = $services->whereHas('tags', function ($q) use ($req) {
                    $q->where('slug', $req->tag);
                });
            }
            if ($req->service_category) {
                $services = $services->whereHas('service_category', function ($q) use ($req) {
                    $q->where('slug', $req->service_category);
                });
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $services = $services->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {
                $services = $services->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $services = $services->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $services = $services->OrderBy('id', 'desc');
            }
            $services = $services->paginate($req->perPage ?? 10);
            $services = ServicesResource::collection($services)->response()->getData(true);
            return $services;
        }
        $services = Service::withAll()->approved()->hasModulePermissions()->orderBy('id', 'desc')->paginate(10);
        $services = ServicesResource::collection($services)->response()->getData(true);
        return $services;
    }


    public static function getCountries($request)
    {
        $countries = Country::active()->get();
        return $countries;
    }
    public static function getStates($request)
    {
        $states = State::active()->where('country_id', $request->country_id)->get();
        return $states;
    }

    public static function getTestimonials($request)
    {
        $testimonials = Testimonial::active()->get();
        $testimonials = TestimonialsResource::collection($testimonials);
        return $testimonials;
    }
    public static function getArchives($request)
    {
        $archives = Archive::active()->take(3)->get();
        $archives = ArchivesResource::collection($archives);
        return $archives;
    }

    public static function getClinicCategories($request)
    {
        $clinic_categories = ClinicCategory::active()->get();
        $clinic_categories = ClinicCategoriesResource::collection($clinic_categories);
        return $clinic_categories;
    }

    public static function getTags($request)
    {
        $tags = Tag::active()->get();
        $tags = TagsResource::collection($tags);
        return $tags;
    }

    public static function getBlogCategories($request)
    {
        $blog_categories = BlogCategory::active()->get();
        $blog_categories = BlogCategoriesResource::collection($blog_categories);
        return $blog_categories;
    }

    public static function getFaqs($request)
    {
        $faqs = FAQ::active()->get();
        $faqs = FAQSResource::collection($faqs);
        return $faqs;
    }

    public static function getArchiveCategories($request)
    {
        $archive_categories = ArchiveCategory::active()->get();
        $archive_categories = ArchiveCategoriesResource::collection($archive_categories);
        return $archive_categories;
    }

    public static function getDoctorCategories($request)
    {

        $doctor_categories = DoctorCategory::withAll()->active();
        if ($request->doctor_category_slug) {
            $doctor_category_main_ids = DoctorMainCategory::where('slug', $request->doctor_category_slug)->pluck('id')->toArray();
            $doctor_categories = $doctor_categories->whereIn('parent_category_id', $doctor_category_main_ids);
        }
        $doctor_categories = $doctor_categories->get();
        $doctor_categories = DoctorCategoriesResource::collection($doctor_categories);
        return $doctor_categories;
    }
    public static function getFeaturedDoctorCategories($request)
    {
        // $featured_doctor_categories = DoctorMainCategory::active()->featured()->whereHas('categories',function($q){
        //     $q->active();
        // })->withAll()->withChildrens()->get();

        $featured_doctor_categories = DoctorMainCategory::withAll()->active()->featured()->get();
        $featured_doctor_categories = DoctorMainCategoriesResource::collection($featured_doctor_categories);
        return $featured_doctor_categories;
    }

    public static function getCities($request)
    {
        $cities = City::active()->where('country_id', $request->country_id)->where('state_id', $request->state_id)->get();
        return $cities;
    }
    public static function getFeaturedDoctors($request)
    {
        // dd($request->all());
        $featured_doctors = Doctor::withAll()->has('user')->whereNotNull('user_name')->active()->approved()->featured();


        if ($request->category) {
            $featured_doctors = $featured_doctors->whereHas('doctor_categories', function ($q) use ($request) {
                $q->whereHas('main_category', function ($query) use ($request) {
                    $query->where('slug', $request->category);
                });
            });
        }

        if ($request->latitude && $request->longitude) {
            $featured_doctors = $featured_doctors->distance($request->latitude, $request->longitude);
            $featured_doctors = $featured_doctors->OrderBy('distance', 'asc');
        }
        $featured_doctors = $featured_doctors->get();

        $featured_doctors = DoctorsResource::collection($featured_doctors);
        return $featured_doctors;
    }

    public static function getTopRatedDoctors($request)
    {
        $top_rated_doctors = Doctor::withAll($request)->has('user')->whereNotNull('user_name')->active()->approved()->topRated()->get();
        $top_rated_doctors = DoctorsResource::collection($top_rated_doctors);
        return $top_rated_doctors;
    }

    public static function getPremiumDoctors($request)
    {
        $premium_doctors = Doctor::withAll()->has('user')->whereNotNull('user_name')->active()->approved()->premium();
        $premium_doctors = $premium_doctors->get();
        $premium_doctors = DoctorsResource::collection($premium_doctors);
        return $premium_doctors;
    }
    public static function getFeaturedTags($request)
    {
        $featured_tags = Tag::withAll()->active()->get();
        $featured_tags = TagsResource::collection($featured_tags);
        return $featured_tags;
    }

    public static function getFeaturedEvents($request)
    {
        $featured_events = Event::withAll()->active()->upcoming()->featured()->get();
        $featured_events = EventsResource::collection($featured_events);
        return $featured_events;
    }

    public static function getSpotlightDoctors($request)
    {
        $spotlight_doctors = Doctor::withAll()->has('user')->whereNotNull('user_name')->active()->approved()->featured()->get();
        $spotlight_doctors = DoctorsResource::collection($spotlight_doctors);
        return $spotlight_doctors;
    }

    public static function getFeaturedClinics($request)
    {
        $featured_clinics = Clinic::withAll()->has('user')->whereNotNull('user_name')->active()->approved()->featured()->get();
        $featured_clinics->each(function ($clinic) {
            $clinic->setRelation(
                'clinic_doctors',
                $clinic->clinic_doctors->take(4)
            );
        });
        $featured_clinics = ClinicsResource::collection($featured_clinics);
        return $featured_clinics;
    }

    public static function getServiceCategories($request)
    {
        $service_categories = ServiceCategory::withChildren()->active();
        if ($request->has_services) {
            $service_categories = $service_categories->whereHas('services', function ($q) {
                $q->active();
            });
        }
        $service_categories = $service_categories->get();
        $service_categories = ServiceCategoriesResource::collection($service_categories);
        return $service_categories;
    }

    public static function getAllReviews()
    {
        $doctorReviews = DoctorReview::withAll()->get();
        $doctorReviews = DoctorReviewsResource::collection($doctorReviews);


        $clinicReviews = ClinicReview::withAll()->get();
        $clinicReviews = ClinicReviewsResource::collection($clinicReviews);


        $allReviews = $doctorReviews->merge($clinicReviews);
        return $allReviews;
    }
    public static function getAllPricingPlans()
    {
        if (auth()->user()->clinic) {
            $type = 'clinic';
        } else {
            $type = 'doctor';
        }

        if ($type == 'doctor') {
            $pricing_plans = PricingPlan::with('modules')->doctor()->active()->get();
            $pricing_plans = PricingPlansResource::collection($pricing_plans);
            $modules = PricingPlanModule::doctor()->orderBy('sort_order', 'asc')->get();
            $modules = ModulesResource::collection($modules);
        } else if ($type == 'clinic') {
            $pricing_plans = PricingPlan::with('modules')->clinic()->active()->get();
            $pricing_plans = PricingPlansResource::collection($pricing_plans);
            $modules = PricingPlanModule::clinic()->orderBy('sort_order', 'asc')->get();
            $modules = ModulesResource::collection($modules);
        } else {
        }

        $data = ['pricing_plans' => $pricing_plans, 'modules', $modules];
        return $data;
    }

    public static function getAllMedicalTest()
    {
        $medicalTests = Test::withAll()->get();
        $medicalTests = MedicalTestResource::collection($medicalTests);
        return $medicalTests;
    }
    public static function getAllPatientHealth()
    {
        $patientHealth = PatientHealth::withAll()->get();

        $patientHealth = PatientHealthResource::collection($patientHealth);
        return $patientHealth;
    }
    public static function getAllServiceDoctors()
    {
        $service_doctors = Doctor::withAll()->has('doctor_services')->get();
        $service_doctors = DoctorsResource::collection($service_doctors);
        return $service_doctors;
    }
    public static function getLastWeekAppointment($request)
    {
        $user = Auth::user();
        $appointments = null;
        $selected_date = $request->input('date', Carbon::now()->format('Y-m-d'));
        $start_date = Carbon::parse($selected_date)->startOfWeek();
        $end_date = Carbon::parse($selected_date)->endOfWeek();

        $last7Days = [];

        for ($i = 0; $i < 7; $i++) {
            $date = $start_date->copy()->addDays($i)->format('Y-m-d');
            $dayName = $start_date->copy()->addDays($i)->format('l');
            $last7Days[$date] = [
                'day' => $dayName,
                'count' => 0,
            ];
        }
        if ($request->session()->get('logged_in_as') == 'doctor') {
            $doctor = $user->doctor;
            $appointments = $doctor->appointments()
                ->whereBetween('created_at', [$start_date, $end_date])
                ->get();
        } elseif ($request->session()->get('logged_in_as') == 'clinic') {
            $clinic = $user->clinic;
            $appointments = $clinic->appointments()
                ->whereBetween('created_at', [$start_date, $end_date])
                ->get();
        }
        foreach ($appointments as $appointment) {
            $appointmentDate = Carbon::parse($appointment->created_at)->format('Y-m-d');
            if (isset($last7Days[$appointmentDate])) {
                $last7Days[$appointmentDate]['count']++;
            }
        }
        $last_7_days = array_values($last7Days);

        return $last_7_days;
    }
    public static function getLastWeekTransaction($request)
    {
        $user = Auth::user();
        $transactions = null;
        $selected_date = $request->input('date', Carbon::now()->format('Y-m-d'));
        $start_date = Carbon::parse($selected_date)->startOfWeek();
        $end_date = Carbon::parse($selected_date)->endOfWeek();

        $last7Days = [];

        for ($i = 0; $i < 7; $i++) {
            $date = $start_date->copy()->addDays($i)->format('Y-m-d');
            $dayName = $start_date->copy()->addDays($i)->format('l');
            $last7Days[$date] = [
                'day' => $dayName,
                'count' => 0,
            ];
        }
        $transactions = $user->transactions()
            ->whereBetween('created_at', [$start_date, $end_date])
            ->get();

        foreach ($transactions as $transaction) {
            $transactionDate = Carbon::parse($transaction->created_at)->format('Y-m-d');
            if (isset($last7Days[$transactionDate])) {
                $last7Days[$transactionDate]['count']++;
            }
        }
        $last_7_days = array_values($last7Days);

        return $last_7_days;
    }
}
