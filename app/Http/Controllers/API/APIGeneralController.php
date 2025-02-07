<?php

namespace App\Http\Controllers\API;

use App\Models\AppointmentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\ArchiveCategoriesResource;
use App\Http\Resources\API\BlogCategoriesResource;
use App\Http\Resources\API\ClinicCategoriesResource;
use App\Http\Resources\API\ClinicsResource;
use App\Http\Resources\API\ArchivesResource;
use App\Http\Resources\API\BroadcastsResource;
use App\Http\Resources\API\ClinicReviewsResource;
use App\Http\Resources\API\DoctorCategoriesResource;
use App\Http\Resources\API\DoctorMainCategoriesResource;
use App\Http\Resources\API\EventsResource;
use App\Http\Resources\API\PostsResource;
use App\Http\Resources\API\PodcastsResource;
use App\Http\Resources\API\DoctorReviewsResource;
use App\Http\Resources\API\CompanyPagesResource;
use App\Http\Resources\API\DoctorsResource;
use App\Http\Resources\API\TagsResource;
use App\Http\Resources\API\TestimonialsResource;
use App\Http\Resources\API\AppointmentTypesResource;
use App\Http\Resources\API\BookAppointmentsResource;
use App\Http\Resources\API\ClinicMainCategoriesResource;
use App\Http\Resources\API\DiseasesResource;
use App\Http\Resources\API\MedicalTestResource;
use App\Http\Resources\API\PatientHealthResource;
use App\Http\Resources\API\ServicesResource;
use App\Http\Resources\Web\ServiceCategoriesResource;
use App\Models\ArchiveCategory;
use App\Models\BlogCategory;
use App\Models\Clinic;
use App\Models\ClinicCategory;
use App\Models\City;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\Archive;
use App\Models\Broadcast;
use App\Models\ClinicMainCategory;
use App\Models\ClinicReview;
use App\Models\State;
use App\Models\DoctorCategory;
use App\Models\DoctorMainCategory;
use App\Models\Event;
use App\Models\Post;
use App\Models\Podcast;
use App\Models\DoctorReview;
use App\Models\Tag;
use App\Models\Testimonial;
use App\Models\CompanyPage;
use App\Models\Disease;
use App\Models\PatientHealth;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Test;
use Illuminate\Support\Arr;

class APIGeneralController extends Controller
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
            if ($req->all) {
                $reviews = $reviews->get();
            } else {
                $reviews = $reviews->paginate($req->perPage ?? 10);
            }
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

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public static function searchDoctorPodcasts($req = null, $user_name)
    {
        if ($req != null) {
            $podcasts =  Podcast::withAll()->active()->whereHas('doctor', function ($q) use ($user_name) {
                $q->where('user_name', $user_name);
                $q->active();
            });
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
            if ($req->all) {
                $podcasts = $podcasts->get();
            } else {
                $podcasts = $podcasts->paginate($req->perPage ?? 10);
            }
            $podcasts = PodcastsResource::collection($podcasts)->response()->getData(true);
            return $podcasts;
        }
        $podcasts = Podcast::withAll()->active()->whereHas('doctor', function ($q) use ($user_name) {
            $q->where('user_name', $user_name);
            $q->active();
        })->orderBy('id', 'desc')->paginate(10);
        $podcasts = PodcastsResource::collection($podcasts)->response()->getData(true);
        return $podcasts;
    }

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public static function searchDoctorBroadcasts($req = null, $user_name)
    {
        if ($req != null) {
            $broadcasts =  Broadcast::withAll()->active()->whereHas('doctor', function ($q) use ($user_name) {
                $q->where('user_name', $user_name);
                $q->active();
            });
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
            if ($req->all) {
                $broadcasts = $broadcasts->get();
            } else {
                $broadcasts = $broadcasts->paginate($req->perPage ?? 10);
            }
            $broadcasts = BroadcastsResource::collection($broadcasts)->response()->getData(true);
            return $broadcasts;
        }
        $broadcasts = Broadcast::withAll()->active()->whereHas('doctor', function ($q) use ($user_name) {
            $q->where('user_name', $user_name);
            $q->active();
        })->orderBy('id', 'desc')->paginate(10);
        $broadcasts = BroadcastsResource::collection($broadcasts)->response()->getData(true);
        return $broadcasts;
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
            if ($req->all) {
                $reviews = $reviews->get();
            } else {
                $reviews = $reviews->paginate($req->perPage ?? 10);
            }
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
            // if($req->doctor_category){
            //     $doctors = $doctors->whereHas('doctor_categories',function($q) use($req){
            //         $q->where('doctor_categories.slug',$req->doctor_category);
            //     });
            // }
            // else if($req->doctor_main_category){
            //     $doctor_main_category = DoctorMainCategory::where('slug',$req->doctor_main_category)->first();
            //     if($doctor_main_category){
            //         $doctors = $doctors->whereHas('doctor_categories',function($q) use($req,$doctor_main_category){
            //             $q->where('doctor_categories.parent_category_id',$doctor_main_category->id);
            //         });
            //     }
            // }
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

            if ($req->doctor_subcategory && $req->doctor_subcategory != 'all') {
                if (is_array($req->doctor_subcategory)) {
                    $slugs = Arr::flatten($req->doctor_subcategory);

                    $doctors = $doctors->whereHas('doctor_categories', function ($q) use ($req, $slugs) {
                        $q->whereIn('doctor_categories.id', $slugs);
                    });
                } else {
                    $doctors = $doctors->whereHas('doctor_categories', function ($q) use ($req) {
                        $q->where('doctor_categories.slug', $req->doctor_subcategory);
                    });
                }
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
            $clinics =  Clinic::withAll()->has('user')->whereNotNull('user_name')->active()->approved();
            // dd($req->all());
            if ($req->clinic_category) {
                $clinics = $clinics->whereHas('clinic_categories', function ($q) use ($req) {
                    $q->where('clinic_categories.slug', $req->clinic_category);
                });
            }
            if ($req->country) {
                $clinics = $clinics->where('country_id', $req->country);
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $clinics = $clinics->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {
                $clinics = $clinics->whereLike(['first_name', 'last_name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $clinics = $clinics->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $clinics = $clinics->OrderBy('id', 'desc');
            }
            if ($req->all) {
                $clinics = $clinics->get();
            } else {
                $clinics = $clinics->paginate($req->perPage ?? 10);
            }
            $clinics = ClinicsResource::collection($clinics)->response()->getData(true);
            return $clinics;
        }
        $clinics = Clinic::withAll()->orderBy('id', 'desc');
        if ($req->all) {
            $clinics = $clinics->get();
        } else {
            $clinics = $clinics->paginate(10);
        }
        $clinics = ClinicsResource::collection($clinics)->response()->getData(true);
        return $clinics;
    }

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public static function searchEvents($req = null)
    {
        if ($req != null) {
            $events =  Event::withAll()->active()->upcoming();
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
                $events = $events->whereLike('address', $req->address);
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
            if ($req->all) {
                $events = $events->get();
            } else {
                $events = $events->paginate($req->perPage ?? 10);
            }
            $events = EventsResource::collection($events)->response()->getData(true);
            return $events;
        }
        $events = Event::withAll()->active()->upcoming()->orderBy('id', 'desc')->paginate(10);
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
            if ($req->all) {
                $posts = $posts->get();
            } else {
                $posts = $posts->paginate($req->perPage ?? 10);
            }
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
            if ($req->all) {
                $archives = $archives->get();
            } else {
                $archives = $archives->paginate($req->perPage ?? 10);
            }
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
            if ($req->all) {
                $broadcasts = $broadcasts->get();
            } else {
                $broadcasts = $broadcasts->paginate($req->perPage ?? 10);
            }
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
            if ($req->all) {
                $podcasts = $podcasts->get();
            } else {
                $podcasts = $podcasts->paginate($req->perPage ?? 10);
            }
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
            $services =  Service::withAll()->active()->approved()->hasModulePermissions();
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
            if ($req->service_category_id) {
                $services = $services->where('service_category_id', $req->service_category_id);
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
            if ($req->all) {
                $services = $services->get();
            } else {
                $services = $services->paginate($req->perPage ?? 10);
            }
            $services = ServicesResource::collection($services)->response()->getData(true);
            return $services;
        }
        $services = Service::withAll()->hasModulePermissions()->orderBy('id', 'desc')->paginate(10);
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
        $testimonials = Testimonial::active()->when($request->limit, function ($query) use ($request) {
            $query->take($request->limit);
        })->get();
        $testimonials = TestimonialsResource::collection($testimonials);
        return $testimonials;
    }

    public static function getClinicCategories($request)
    {
        $clinic_categories = ClinicCategory::active()->when($request->limit, function ($query) use ($request) {
            $query->take($request->limit);
        })->get();
        $clinic_categories = ClinicCategoriesResource::collection($clinic_categories);
        return $clinic_categories;
    }

    public static function getTags($request)
    {
        $tags = Tag::active()->when($request->limit, function ($query) use ($request) {
            $query->take($request->limit);
        })->get();
        $tags = TagsResource::collection($tags);
        return $tags;
    }

    public static function getBlogCategories($request)
    {
        $blog_categories = BlogCategory::active()->when($request->limit, function ($query) use ($request) {
            $query->take($request->limit);
        })->get();
        $blog_categories = BlogCategoriesResource::collection($blog_categories);
        return $blog_categories;
    }

    public static function getArchiveCategories($request)
    {
        $archive_categories = ArchiveCategory::active()->when($request->limit, function ($query) use ($request) {
            $query->take($request->limit);
        })->get();
        $archive_categories = ArchiveCategoriesResource::collection($archive_categories);
        return $archive_categories;
    }

    public static function getDoctorCategories($request)
    {

        $doctor_categories = DoctorCategory::active()
            ->when($request->limit, function ($query) use ($request) {
                $query->take($request->limit);
            })->get();
        $doctor_categories = DoctorCategoriesResource::collection($doctor_categories);
        return $doctor_categories;
    }

    public static function getDoctorMainCategoriesWithChildrens($request)
    {
        $doctor_main_categories = DoctorMainCategory::withAll()->active()->whereHas('categories', function ($q) {
            $q->active();
        })->when($request->limit, function ($query) use ($request) {
            $query->take($request->limit);
        })->withAll()->withChildrens()->active();
        $doctor_main_categories = $doctor_main_categories->get();

        $doctor_main_categories = DoctorMainCategoriesResource::collection($doctor_main_categories);
        return $doctor_main_categories;
    }
    public static function getClinicMainCategoriesWithChildrens($request)
    {
        $clinic_main_categories = ClinicMainCategory::withAll()->active()->whereHas('categories', function ($q) {
            $q->active();
        })->when($request->limit, function ($query) use ($request) {
            $query->take($request->limit);
        })->withAll()->withChildrens()->active();
        $clinic_main_categories = $clinic_main_categories->get();

        // dd( $clinic_main_categories);


        $clinic_main_categories = ClinicMainCategoriesResource::collection($clinic_main_categories);
        return $clinic_main_categories;
    }

    public static function getCities($request)
    {
        $cities = City::active()->where('country_id', $request->country_id)->where('state_id', $request->state_id)->get();
        return $cities;
    }
    public static function getFeaturedDoctors($request)
    {
        $featured_doctors = Doctor::withAll()->has('user')->whereNotNull('user_name')->active()->approved()->featured()->when($request->limit, function ($query) use ($request) {
            $query->take($request->limit);
        })->get();
        $featured_doctors = DoctorsResource::collection($featured_doctors);
        return $featured_doctors;
    }
    public static function getTopRatedDoctors($request)
    {
        $featured_doctors = Doctor::withAll()->has('user')->whereNotNull('user_name')->active()->approved()->featured()->when($request->limit, function ($query) use ($request) {
            $query->take($request->limit);
        })->topRated()->get();
        $featured_doctors = DoctorsResource::collection($featured_doctors);
        return $featured_doctors;
    }

    public static function getFeaturedTags($request)
    {
        $featured_tags = Tag::withAll()->active()->when($request->limit, function ($query) use ($request) {
            $query->take($request->limit);
        })->get();
        $featured_tags = TagsResource::collection($featured_tags);
        return $featured_tags;
    }

    public static function getFeaturedEvents($request)
    {
        $featured_events = Event::withAll()->hasModulePermissions()->active()->upcoming()->when($request->limit, function ($query) use ($request) {
            $query->take($request->limit);
        })->get();
        $featured_events = EventsResource::collection($featured_events);
        return $featured_events;
    }

    public static function getSpotlightDoctors($request)
    {
        $spotlight_doctors = Doctor::withAll()->has('user')->whereNotNull('user_name')->active()->approved()->featured();

        $spotlight_doctors = $spotlight_doctors->get();
        $spotlight_doctors = DoctorsResource::collection($spotlight_doctors);
        return $spotlight_doctors;
    }

    public static function getFeaturedClinics($request)
    {
        $featured_clinics = Clinic::withAll()->has('user')->whereNotNull('user_name')->active()->approved()->featured()->when($request->limit, function ($query) use ($request) {
            $query->take($request->limit);
        })->get();
        $featured_clinics = ClinicsResource::collection($featured_clinics);
        return $featured_clinics;
    }
    public static function getCompanyPage($request, $slug)
    {
        $company_page = CompanyPage::withAll()->where('slug', $slug)->first();
        $company_page = new CompanyPagesResource($company_page);
        return $company_page;
    }
    public static function getAppointmentTypes($request)
    {
        $appointment_types = AppointmentType::active()->get();
        $appointment_types = AppointmentTypesResource::collection($appointment_types);
        return $appointment_types;
    }

    public static function getServiceCategories($request)
    {
        $service_categories = ServiceCategory::active()->when($request->limit, function ($query) use ($request) {
            $query->take($request->limit);
        })->get();
        $service_categories = ServiceCategoriesResource::collection($service_categories);
        return $service_categories;
    }


    public static function getAllMedicalTests()
    {
        $medicalTests = Test::withAll()->get();
        $medicalTests = MedicalTestResource::collection($medicalTests);
        return $medicalTests;
    }
    public static function getAllPatientHealths()
    {
        $patientHealths = PatientHealth::withAll()->get();

        $patientHealths = PatientHealthResource::collection($patientHealths);
        return $patientHealths;
    }
    public static function getAllDiseases()
    {
        $diseases = Disease::withAll()->get();

        $diseases = DiseasesResource::collection($diseases);
        return $diseases;
    }
    public static function getAllPatientDoctors()
    {
        $patient = auth()->user()->patient;
        $doctors = $patient->appointments()
            ->whereHas('doctor')
            ->with('doctor')
            ->get()
            ->pluck('doctor')
            ->unique('id')
            ->values();
        $doctors = DoctorsResource::collection($doctors);

        return $doctors;
    }
    public static function getAllPatientDiseases()
    {
        $patient = auth()->user()->patient;
        $diseases = $patient->appointments()
            ->whereHas('diseases')
            ->with('diseases')
            ->get()
            ->pluck('diseases')
            ->flatten()
            ->unique('id')
            ->values();
        $diseases = DiseasesResource::collection($diseases);

        return $diseases;
    }
    public static function getAllPatientAppointments()
    {
        $patient = auth()->user()->patient;
        $appointments = $patient->appointments()
            ->with(['doctor', 'clinic', 'diseases', 'appointment_status'])
            ->orderBy('date', 'desc')
            ->get();
        $appointments = BookAppointmentsResource::collection($appointments);

        return $appointments;
    }



    public static function searchAppointments($req = null)
    {
        $patient = auth()->user()->patient;

        $appointments = $patient->appointments()->withAll()->withChildren()->with('doctor');

        if ($req != null) {
            if ($req->tag) {
                $appointments = $appointments->whereHas('tags', function ($q) use ($req) {
                    $q->where('slug', $req->tag);
                });
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $appointments = $appointments->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {
                $appointments = $appointments->whereLike(['name', 'description'], $req->search);
            }
            if ($req->doctor_ids != null && count($req->doctor_ids) > 0) {
                $appointments = $appointments->whereHas('doctor', function ($q) use ($req) {
                    $q->whereIn('id', $req->doctor_ids);
                });
            }
            if ($req->appointment_id) {
                $appointments = $appointments->where('id', $req->appointment_id);
            }
            if ($req->disease_ids) {
                $appointments = $appointments->whereHas('diseases', function ($q) use ($req) {
                    $q->whereIn('disease_id', $req->disease_ids);
                });
            }
            if ($req->medicine_name) {
                $appointments = $appointments->whereHas('medicines', function ($q) use ($req) {
                    $q->whereLike(['name'], $req->medicine_name);
                });
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $appointments = $appointments->orderBy($req->sort_field, $req->sort_type);
            } else {
                $appointments = $appointments->orderBy('id', 'desc');
            }
            if ($req->all) {
                $appointments = $appointments->get();
            } else {
                $perPage = $req->perPage ?? 10;
                $appointments = $appointments->paginate($perPage);
            }
            $appointmentsData = BookAppointmentsResource::collection($appointments)->response()->getData(true);

            return $appointmentsData;
        }

        // If no filters, return all appointments
        $appointments = $appointments->orderBy('id', 'desc')->paginate(10);
        $appointmentsData = BookAppointmentsResource::collection($appointments)->response()->getData(true);

        return $appointmentsData;
    }



    public static function searchDiseases($req = null)
    {
        $patient = auth()->user()->patient;
        $diseases = $patient->appointments()
            ->whereHas('diseases')
            ->with(['diseases', 'doctor']);
        if ($req !== null) {
            if (!empty($req->tag)) {
                $diseases->whereHas('diseases.tags', function ($q) use ($req) {
                    $q->where('slug', $req->tag);
                });
            }
            if (!empty($req->column) && !empty($req->search)) {
                $diseases->whereHas('diseases', function ($q) use ($req) {
                    $q->whereLike($req->column, $req->search);
                });
            } elseif (!empty($req->search)) {
                $diseases->whereHas('diseases', function ($q) use ($req) {
                    $q->whereLike(['name', 'description'], $req->search);
                });
            }

            if (!empty($req->sort_field) && !empty($req->sort_type)) {
                $diseases->orderBy($req->sort_field, $req->sort_type);
            } else {
                $diseases->orderBy('id', 'desc');
            }

            if (!empty($req->all)) {
                $appointments = $diseases->get();
            } else {
                $appointments = $diseases->paginate($req->perPage ?? 10);
            }
        } else {
            $appointments = $diseases->orderBy('id', 'desc')->paginate(10);
        }
        $patientDiseases = [];
        foreach ($appointments as $appointment) {
            $appointmentDoctorImage = $appointment->doctor->image ?? "";
            $appointmentDoctorName = $appointment->doctor->name ?? "";
            $appointmentDate = $appointment->date ?? "";
            $appointmentDoctorSpeciality = $appointment->doctor->specialization ?? "";
            $appointmentId = $appointment->id ?? "";
            foreach ($appointment->diseases as $disease) {
                $disease['appointment_doctor_image'] = $appointmentDoctorImage;
                $disease['appointment_doctor_name'] = $appointmentDoctorName;
                $disease['appointment_id'] = $appointmentId;
                $disease['appointment_date'] = $appointmentDate;
                $disease['appointment_doctor_speciality'] = $appointmentDoctorSpeciality;
                $patientDiseases[] = $disease;
            }
        }

       
        $patientDiseases = collect($patientDiseases)->values();
        $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage();
        $perPage = $req->perPage ?? 10;

        $pagedDiseases = new \Illuminate\Pagination\LengthAwarePaginator(
            $patientDiseases->forPage($currentPage, $perPage),
            $patientDiseases->count(),
            $perPage,
            $currentPage,
            ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()]
        );

        return DiseasesResource::collection($pagedDiseases)->response()->getData(true);
    }


    public static function searchPatientDoctors($req = null)
    {
        $patient = auth()->user()->patient;

        if ($req != null) {
            $doctors = $patient->appointments()->withAll()->withChildren()
                ->whereHas('doctor')
                ->with('doctor');
            if (!empty($req->tag)) {
                $doctors->whereHas('doctor.tags', function ($q) use ($req) {
                    $q->where('slug', $req->tag);
                });
            }
            if (!empty($req->column) && !empty($req->search)) {
                $doctors->whereHas('doctor', function ($q) use ($req) {
                    $q->whereLike($req->column, $req->search);
                });
            } elseif (!empty($req->search)) {
                $doctors->whereHas('doctor', function ($q) use ($req) {
                    $q->whereLike(['name', 'email'], $req->search);
                });
            }

            if (!empty($req->sort_field) && !empty($req->sort_type)) {
                $doctors->orderBy($req->sort_field, $req->sort_type);
            } else {
                $doctors->orderBy('id', 'desc');
            }

            if (!empty($req->all)) {
                $doctors = $doctors->withAll()->withChildren()->get()->pluck('doctor')->unique('id')->values();
            } else {
                $appointments = $doctors->paginate($req->perPage ?? 10);
                $doctors = $appointments->pluck('doctor')->unique('id')->values();
                $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage();
                $perPage = $req->perPage ?? 10;

                $doctors = new \Illuminate\Pagination\LengthAwarePaginator(
                    $doctors->forPage($currentPage, $perPage),
                    $doctors->count(),
                    $perPage,
                    $currentPage,
                    ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()]
                );
            }

            return DoctorsResource::collection($doctors)->response()->getData(true);
        }

        $appointments = $patient->appointments()
            ->whereHas('doctor')
            ->with('doctor')
            ->orderBy('id', 'desc')
            ->paginate(10);

        $doctors = $appointments->pluck('doctor')->unique('id')->values();

        return DoctorsResource::collection($doctors)->response()->getData(true);
    }
}
