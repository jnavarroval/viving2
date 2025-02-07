<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;
use Illuminate\Support\Facades\DB;
use Spatie\Translatable\HasTranslations;

class Clinic extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Billable, HasTranslations;
    public $translatable = ['description'];
    protected $fillable = [
        'user_id', 'pricing_plan_id', 'country_id', 'state_id', 'city_id', 'state_id', 'first_name', 'last_name', 'clinic_name', 'experience', 'speciality', 'clinic_website',
        'description', 'address_line_1', 'address_line_2', 'is_active', 'is_approved', 'approved_at', 'is_featured', 'icon',
        'image', 'cover_image', 'user_name', 'zip_code',
        'prefix', 'suffix', 'home_phone', 'cell_phone', 'job_title', 'company', 'website', 'email',
        'billing_address_line_1', 'billing_address_line_2', 'billing_country_id', 'billing_state_id', 'billing_city_id', 'billing_zip_code',
        'shipping_address_line_1', 'shipping_address_line_2', 'shipping_country_id', 'shipping_state_id', 'shipping_city_id', 'shipping_zip_code',
        'work_address_line_1', 'work_address_line_2', 'work_country_id', 'work_state_id', 'work_city_id', 'work_zip_code',
        'longitude', 'latitude', 'is_online'
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function scopeWithAll($query)
    {
        if (request()->get('latitude') && request()->get('longitude')) {
            $this->distance(request()->get('latitude'), request()->get('longitude'));
        }
        // if (request()->query('latitude') && request()->query('longitude')) {
        //     $this->distance(request()->query('latitude'),request()->query('longitude'));
        // }
        return $query->with('country')->with('state')->with('city')->with('clinic_categories')->with('clinic_doctors', function ($q) {
            $q->orderBy('id', 'desc');

            $q->active();
            $q->approved();
            $q->withAll();
        })
            ->with('appointment_schedules', function (
                $q
            ) {
                $q->with('appointment_type');
            })->with('clinic_certifications')->with('languages')->with('tags')->with('appointments')->with('user')->with('clinic_settings')->with('clinic_reviews', function ($q) {
                $q->active();
                $q->has('patient');
                $q->withAll();
            });
    }
    public function scopeDistance($query, $latitude, $longitude, $distance = null, $unit = "km")
    {
        $constant = $unit == "km" ? 6371 : 3959;
        $haversine = "(
            $constant * acos(
                cos(radians(" . $latitude . "))
                * cos(radians(`latitude`))
                * cos(radians(`longitude`) - radians(" . $longitude . "))
                + sin(radians(" . $latitude . ")) * sin(radians(`latitude`))
            )
        )";
        if ($distance) {
            return $query->whereNotNULL('longitude')->WhereNotNull('latitude')->select('*', DB::raw("$haversine AS distance"))
                ->having("distance", "<=", $distance);
        } else {
            return $query->select('*', DB::raw("$haversine AS distance"));
        }
    }
    public function scopeWithChildrens($query)
    {
        return $query->with('clinic_broadcasts', function ($q) {
            $q->active();
            $q->hasModulePermissions();
        })
            ->with('clinic_podcasts', function ($q) {
                $q->active();
                $q->hasModulePermissions();
            })
            ->with('clinic_services', function ($q) {
                $q->active();
                $q->hasModulePermissions();
            })
            ->with('clinic_events', function ($q) {
                $q->active();
                $q->hasModulePermissions();
                $q->upcoming();
            })->with('clinic_posts', function ($q) {
                $q->active();
                $q->hasModulePermissions();
            })->with('clinic_archives', function ($q) {
                $q->active();
                $q->hasModulePermissions();
            })->with('pricing_plan', function ($q) {
                $q->with('clinic_modules');
            })
            ->with('clinic_doctors', function ($q) {
                $q->orderBy('id', 'desc');
                $q->active();
                $q->approved();
                $q->with('doctor_reviews');
            });
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', 1);
    }
    public function scopeApproved($query)
    {
        return $query->where('is_approved', 1);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pricing_plan()
    {
        return $this->belongsTo(PricingPlan::class, 'pricing_plan_id')->withTrashed();
    }
    public function clinic_categories()
    {
        return $this->belongsToMany(ClinicCategory::class, 'clinic_category');
    }
    public function clinic_posts()
    {
        return $this->hasMany(Post::class);
    }
    public function clinic_archives()
    {
        return $this->hasMany(Archive::class);
    }
    public function clinic_broadcasts()
    {
        return $this->hasMany(Broadcast::class);
    }
    public function clinic_podcasts()
    {
        return $this->hasMany(Podcast::class);
    }
    public function clinic_events()
    {
        return $this->hasMany(Event::class);
    }
    public function clinic_settings()
    {
        return $this->hasMany(ClinicSetting::class);
    }
    public function clinic_reviews()
    {
        return $this->hasMany(ClinicReview::class);
    }
    public function appointments()
    {
        return $this->hasMany(BookAppointment::class, 'clinic_id', 'id');
    }
    public function clinic_certifications()
    {
        return $this->hasMany(Certification::class);
    }
    public function scopeTopRated($query)
    {
        return $query->whereHas('clinic_reviews', function ($q) {
            $q->where('rating', '>=', 4);
        });
    }
    public function scopeShowLocation($query)
    {
        return $query->where('is_hide_location', 0)->orWhereNull('is_hide_location');
    }
    public function languages()
    {
        return $this->belongsToMany(AllLanguage::class, 'clinic_language');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'clinic_tag');
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function clinic_doctors()
    {
        return $this->hasMany(Doctor::class, 'clinic_id');
    }
    public function appointment_schedules()
    {
        return $this->hasMany(AppointmentSchedule::class, 'clinic_id', 'id');
    }
    public function clinic_services()
    {
        return $this->hasMany(Service::class);
    }
    public function services()
    {
        return $this->hasMany(BookedService::class, 'clinic_id', 'id');
    }
}
