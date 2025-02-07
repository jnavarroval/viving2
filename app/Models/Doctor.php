<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\Doctor\AddressesRelations;
use Spatie\Translatable\HasTranslations;

class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Billable , AddressesRelations, HasTranslations;
    public $translatable = ['description'];

    protected $fillable = [
        'clinic_id','user_id','pricing_plan_id', 'country_id', 'state_id', 'city_id', 'state_id', 'first_name','last_name','experience','speciality','is_premium',

        'prefix','suffix','home_phone','cell_phone','job_title','company','website','email',
        'billing_address_line_1','billing_address_line_2','billing_country_id', 'billing_state_id', 'billing_city_id','billing_zip_code',
        'shipping_address_line_1','shipping_address_line_2','shipping_country_id', 'shipping_state_id', 'shipping_city_id','shipping_zip_code',
        'work_address_line_1','work_address_line_2','work_country_id', 'work_state_id', 'work_city_id','work_zip_code',
        'description', 'longitude','latitude','address_line_1','address_line_2', 'is_active', 'is_approved', 'approved_at', 'is_featured', 'icon',
        'image', 'cover_image','user_name','zip_code','is_certified','is_verified','is_co_creation','is_energy_exchange','is_special','is_spotlight' , 'profile_completion_percentage','is_online'
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
        return $query->distance(request()->get('latitude'),request()->get('longitude'))->with('clinic')->with('doctor_categories')->with('appointment_schedules', function($q
        )
        {
            $q->with('appointment_type');
        })->with('user')->with('doctor_certifications')->with('doctor_settings')->with('languages')->with('tags')->with('doctor_reviews', function ($q) {
            $q->active();
            $q->has('patient');
            $q->withAll();
        })->withAddresses();
    }
    public function scopewithAddresses($query)
    {
        return $query
        ->with('country')
        ->with('state')
        ->with('city')
        ->with('billing_country')
        ->with('billing_state')
        ->with('billing_city')
        ->with('work_country')
        ->with('work_state')
        ->with('work_city')
        ->with('shipping_country')
        ->with('shipping_state')
        ->with('shipping_city');

    }
    public function scopeDistance($query, $latitude, $longitude, $distance = null, $unit = "km")
    {

        if ($latitude && $longitude) {
            $constant = $unit == "km" ? 6371 : 3959;
            $haversine = "(
                $constant * acos(
                    cos(radians(" .$latitude. "))
                    * cos(radians(`latitude`))
                    * cos(radians(`longitude`) - radians(" .$longitude. "))
                    + sin(radians(" .$latitude. ")) * sin(radians(`latitude`))
                )
            )";
            if($distance){
                return $query->whereNotNULL('longitude')->WhereNotNull('latitude')->select('*',DB::raw("$haversine AS distance"))
                ->having("distance", "<=", $distance);
            }else{
                // dd($haversine);
                return $query->select('*',DB::raw("$haversine AS distance"));
            }
        }else{
            return $query;
        }

    }
    public function scopeWithChildrens($query)
    {
        return $query->with('doctor_broadcasts', function ($q) {
            $q->active();
            $q->hasModulePermissions();
        })
            ->with('doctor_podcasts', function ($q) {
                $q->active();
                $q->hasModulePermissions();
            })
            ->with('doctor_experiences', function ($q) {
                $q->active();

            })
            ->with('doctor_services', function ($q) {
                $q->active();
                $q->hasModulePermissions();
            })->with('doctor_events', function ($q) {
                $q->active();
                $q->hasModulePermissions();
                $q->upcoming();
            })->with('doctor_posts', function ($q) {
                $q->active();
                $q->hasModulePermissions();
            })->with('doctor_archives', function ($q) {
                $q->active();
                $q->hasModulePermissions();
            })->with('pricing_plan', function ($q) {
                $q->with('doctor_modules');
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
    public function scopePremium($query)
    {
        return $query->where('is_premium', 1);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pricing_plan()
    {
        return $this->belongsTo(PricingPlan::class, 'pricing_plan_id')->withTrashed();
    }

    public function doctor_categories()
    {
        return $this->belongsToMany(DoctorCategory::class, 'doctor_category');
    }

    public function doctor_posts()
    {
        return $this->hasMany(Post::class);
    }
    public function doctor_archives()
    {
        return $this->hasMany(Archive::class);
    }
    public function doctor_broadcasts()
    {
        return $this->hasMany(Broadcast::class);
    }
    public function doctor_podcasts()
    {
        return $this->hasMany(Podcast::class);
    }
    public function doctor_events()
    {
        return $this->hasMany(Event::class);
    }
    public function doctor_settings()
    {
        return $this->hasMany(DoctorSetting::class);
    }
    public function doctor_reviews()
    {
        return $this->hasMany(DoctorReview::class);
    }
    public function appointments()
    {
        return $this->hasMany(BookAppointment::class);
    }
    public function doctor_certifications()
    {
        return $this->hasMany(Certification::class);
    }
    public function languages()
    {
        return $this->belongsToMany(AllLanguage::class, 'doctor_language');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'doctor_tag');
    }
    public function scopeTopRated($query)
    {
        return $query->whereHas('doctor_reviews', function ($q) {
            $q->where('rating', '>=', 4);
            $q->orderBy('rating', 'desc');
        });
    }
    public function appointment_schedules()
    {
        return $this->hasMany(AppointmentSchedule::class,'doctor_id','id');
    }
    public function scopeShowLocation($query)
    {
        return $query->where('is_hide_location', 0)->orWhereNull('is_hide_location');
    }
    public function doctor_experiences()
    {
        return $this->hasMany(DoctorExperience::class);
    }
    public function doctor_educations()
    {
        return $this->hasMany(DoctorEducation::class);
    }
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
    public function doctor_services()
    {
        return $this->hasMany(Service::class);
    }
    public function services()
    {
        return $this->hasMany(BookedService::class);
    }

}
