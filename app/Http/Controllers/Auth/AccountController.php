<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\API\APIGeneralController;
use App\Models\EventCategory;
use App\Models\PodcastCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\UpdatePatientGeneralInfoRequest;
use App\Http\Requests\Account\UpdateDoctorGeneralInfoRequest;
use App\Http\Requests\Account\UpdateClinicGeneralInfoRequest;
use App\Http\Resources\API\AppointmentSchedulesResource;
use App\Http\Resources\Web\BookAppointmentsResource;
use App\Http\Resources\Web\AppointmentTypesResource;
use App\Http\Resources\Web\ArchiveCategoriesResource;
use App\Http\Resources\Web\BlogCategoriesResource;
use App\Http\Resources\Web\ClinicsResource;
use App\Http\Resources\Web\ClinicMainCategoriesResource;
use App\Http\Resources\Web\PatientsResource;
use App\Http\Resources\Web\EventCategoriesResource;
use App\Http\Resources\Web\DoctorMainCategoriesResource;
use App\Http\Resources\Web\DoctorsResource;
use App\Http\Resources\Web\PodcastCategoriesResource;
use App\Http\Resources\Web\ServiceCategoriesResource;
use App\Http\Resources\Web\TagsResource;
use App\Models\AllLanguage;
use App\Models\AppointmentStatus;
use App\Models\AppointmentType;
use App\Models\ArchiveCategory;
use App\Models\BlogCategory;
use App\Models\Clinic;
use App\Models\ClinicCategory;
use App\Models\ClinicMainCategory;
use App\Models\City;
use App\Models\Country;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\DoctorCategory;
use App\Models\DoctorMainCategory;
use App\Models\Role;
use App\Models\ServiceCategory;
use App\Models\State;
use App\Models\Tag;
use Carbon\Carbon;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    public function showAccountPage(Request $request)
    {
        $user = Auth::user();
        if ($request->session()->get('logged_in_as') == 'doctor') {
            $doctor = $user->doctor;
            $doctor = Doctor::withChildrens()->withAll()->where('id', $doctor->id)->first();
            $doctor = new DoctorsResource($doctor);
            $doctor_categories = DoctorMainCategory::active()->whereHas('categories', function ($q) {
                $q->active();
            })->withAll()->withChildrens()->get();
            $doctor_categories = DoctorMainCategoriesResource::collection($doctor_categories);
            // $doctor_categories = DoctorCategory::active()->get();
            $blog_categories = BlogCategory::active()->get();
            $blog_categories = BlogCategoriesResource::collection($blog_categories);
            $event_categories = EventCategory::active()->get();
            $event_categories = EventCategoriesResource::collection($event_categories);
            $podcast_categories = PodcastCategory::active()->get();
            $podcast_categories = PodcastCategoriesResource::collection($podcast_categories);
            $archive_categories = ArchiveCategory::active()->get();
            $archive_categories = ArchiveCategoriesResource::collection($archive_categories);
            $tags = Tag::active()->get();
            $tags = TagsResource::collection($tags);
            $countries = Country::active()->get();
            $states = State::active()->where('country_id', $doctor->country_id)->get();
            $cities = City::active()->where('state_id', $doctor->state_id)->get();
            $appointment_types = AppointmentType::active()->get();
            $appointment_types = AppointmentTypesResource::collection($appointment_types);
            $billing_states = State::active()->where('country_id', $doctor->billing_country_id)->get();
            $billing_cities = City::active()->where('state_id', $doctor->billing_state_id)->get();
            $shipping_states = State::active()->where('country_id', $doctor->shipping_country_id)->get();
            $shipping_cities = City::active()->where('state_id', $doctor->shipping_state_id)->get();
            $work_states = State::active()->where('country_id', $doctor->work_country_id)->get();
            $work_cities = City::active()->where('state_id', $doctor->work_state_id)->get();
            $languages = AllLanguage::active()->get();
            $service_categories = ServiceCategory::active()->get();
            $service_categories = ServiceCategoriesResource::collection($service_categories);
            $data = [
                'doctor' => $doctor,
                'doctor_categories' => $doctor_categories,
                'blog_categories' => $blog_categories,
                'event_categories' => $event_categories,
                'podcast_categories' => $podcast_categories,
                'archive_categories' => $archive_categories,
                'countries' => $countries,
                'states' => $states,
                'cities' => $cities,
                'tags' => $tags,
                'service_categories' => $service_categories,
                'billing_states' => $billing_states,
                'billing_cities' => $billing_cities,
                'shipping_states' => $shipping_states,
                'shipping_cities' => $shipping_cities,
                'work_states' => $work_states,
                'work_cities' => $work_cities,
                'languages' => $languages,
                'appointment_types' => $appointment_types
            ];
        }
        if ($request->session()->get('logged_in_as') == 'clinic') {
            $clinic = $user->clinic;
            $clinic = Clinic::withChildrens()->withAll()->where('id', $clinic->id)->first();
            $clinic = new ClinicsResource($clinic);
            $clinic_categories = ClinicMainCategory::active()->whereHas('categories', function ($q) {
                $q->active();
            })->withAll()->withChildrens()->get();
            $clinic_categories = ClinicMainCategoriesResource::collection($clinic_categories);
            $blog_categories = BlogCategory::active()->get();
            $blog_categories = BlogCategoriesResource::collection($blog_categories);
            $event_categories = EventCategory::active()->get();
            $event_categories = EventCategoriesResource::collection($event_categories);
            $podcast_categories = PodcastCategory::active()->get();
            $podcast_categories = PodcastCategoriesResource::collection($podcast_categories);
            $archive_categories = ArchiveCategory::active()->get();
            $archive_categories = ArchiveCategoriesResource::collection($archive_categories);
            $tags = Tag::active()->get();
            $tags = TagsResource::collection($tags);
            $countries = Country::active()->get();
            $service_categories = ServiceCategory::active()->get();
            $service_categories = ServiceCategoriesResource::collection($service_categories);
            $states = State::active()->where('country_id', $clinic->country_id)->get();
            $cities = City::active()->where('state_id', $clinic->state_id)->get();
            $billing_states = State::active()->where('country_id', $clinic->billing_country_id)->get();
            $billing_cities = City::active()->where('state_id', $clinic->billing_state_id)->get();
            $shipping_states = State::active()->where('country_id', $clinic->shipping_country_id)->get();
            $shipping_cities = City::active()->where('state_id', $clinic->shipping_state_id)->get();
            $work_states = State::active()->where('country_id', $clinic->work_country_id)->get();
            $work_cities = City::active()->where('state_id', $clinic->work_state_id)->get();
            $languages = AllLanguage::active()->get();
            $appointment_types = AppointmentType::active()->get();
            $appointment_types = AppointmentTypesResource::collection($appointment_types);
            $data = [
                'clinic' => $clinic,
                'clinic_categories' => $clinic_categories,
                'blog_categories' => $blog_categories,
                'event_categories' => $event_categories,
                'podcast_categories' => $podcast_categories,
                'archive_categories' => $archive_categories,
                'countries' => $countries,
                'states' => $states,
                'cities' => $cities,
                'billing_states' => $billing_states,
                'billing_cities' => $billing_cities,
                'shipping_states' => $shipping_states,
                'shipping_cities' => $shipping_cities,
                'work_states' => $work_states,
                'work_cities' => $work_cities,
                'tags' => $tags,
                'service_categories' => $service_categories,
                'languages' => $languages,
                'appointment_types' => $appointment_types
            ];
        }
        if ($request->session()->get('logged_in_as') == 'patient') {
            $patient = $user->patient;
            $patient = Patient::withChildrens()->withAll()->where('id', $patient->id)->first();
            $patient = new PatientsResource($patient);
            $countries = Country::active()->get();
            $states = State::active()->where('country_id', $patient->country_id)->get();
            $cities = City::active()->where('state_id', $patient->state_id)->get();
            $data = [
                'patient' => $patient,
                'countries' => $countries,
                'states' => $states,
                'cities' => $cities,
            ];
        }

        return Inertia::render('Account', $data);
    }

    public function showDashboardPage(Request $request)
    {
        $user = Auth::user();



        if ($request->session()->get('logged_in_as') == 'clinic') {
            $clinic = $user->clinic;
            $balance = $user->wallet->balance;
            $clinic = Clinic::withChildrens()->withAll()->where('id', $clinic->id)->first();
            $pending_appointments = $clinic->appointments()->with('patient')->where('appointment_status_code', AppointmentStatus::$Pending)->take(5)->get();
            $reject_appointments = $clinic->appointments()->with('patient')->where('appointment_status_code', AppointmentStatus::$Rejected)->take(5)->get();
            $accept_appointments = $clinic->appointments()->with('patient')->where('appointment_status_code', AppointmentStatus::$Accepted)->take(5)->get();
            $messages = $clinic->appointments()->with('messages', function ($q) {
                $q->with('sender');
                $q->orderBy('created_at', 'desc')->first();
            })->has('messages')->where('appointment_type_id', 3)->orderBy('created_at', 'desc')->get();


            $clinic = new ClinicsResource($clinic);
            $transactions = $user->transactions()->with('fund')->orderBy('id', 'desc');



            $notifications = $user->notifications()
                ->with('sender')
                ->orderBy('created_at', 'desc')
                ->get();

            if ($request != null && $request->perPage) {
                $transactions =  $transactions->paginate($request->perPage);
            } else {
                $transactions =  $transactions->paginate(5);
            }


            $appointments = [
                'pending' => BookAppointmentsResource::collection($pending_appointments),
                'reject' => BookAppointmentsResource::collection($reject_appointments),
                'accept' => BookAppointmentsResource::collection($accept_appointments),

            ];

            $data = [
                'clinic' => $clinic,
                'appointments' => $appointments,
                'transactions' => $transactions,
                'notifications' => $notifications,
                'messages' => $messages,
                'balance' => $balance,

            ];
        } else if ($request->session()->get('logged_in_as') == 'doctor') {

            $doctor = $user->doctor;
            $balance = $user->wallet->balance;
            $doctor = Doctor::withChildrens()->withAll()->where('id', $doctor->id)->first();
            $pending_appointments = $doctor->appointments()->with('patient')->where('appointment_status_code', AppointmentStatus::$Pending)->take(5)->get();
            $reject_appointments = $doctor->appointments()->with('patient')->where('appointment_status_code', AppointmentStatus::$Rejected)->take(5)->get();
            $accept_appointments = $doctor->appointments()->with('patient')->where('appointment_status_code', AppointmentStatus::$Accepted)->take(5)->get();
            $messages = $doctor->appointments()->with('messages', function ($q) {
                $q->with('sender');
                $q->orderBy('created_at', 'desc')->first();
            })->has('messages')->where('appointment_type_id', 3)->orderBy('created_at', 'desc')->get();
            // dd($messages);
            $doctor = new DoctorsResource($doctor);
            // $pending_appointments = new AppointmentSchedulesResource($pending_appointments);

            $transactions = $user->transactions()->with('fund')->orderBy('id', 'desc');

            $notifications = $user->notifications()
                ->with('sender')
                ->orderBy('created_at', 'desc')
                ->get();





            if ($request != null && $request->perPage) {
                $transactions =  $transactions->paginate($request->perPage);
            } else {
                $transactions =  $transactions->paginate(5);
            }



            $appointments = [
                'pending' => BookAppointmentsResource::collection($pending_appointments),
                'reject' => BookAppointmentsResource::collection($reject_appointments),
                'accept' => BookAppointmentsResource::collection($accept_appointments),
            ];

            $data = [
                'doctor' => $doctor,
                'appointments' => $appointments,
                'transactions' => $transactions,
                'notifications' => $notifications,
                'messages' => $messages,
                'balance' => $balance,


            ];
        } else {

            return redirect()->back();
        }



        return Inertia::render('Dashboard', $data);
    }




    public function updatePatientGeneralInformation(UpdatePatientGeneralInfoRequest $request)
    {

        $carbonDate = Carbon::parse($request->dob);
        $formattedDate = $carbonDate->format('Y-m-d');
        $request->merge(['dob' => $formattedDate]);



        $user = auth()->user();
        $patient = $user->patient;
        if ($patient) {
            $patient->update($request->only(['first_name', 'last_name', 'user_name', 'father_name', 'blood_group', 'dob', 'gender', 'description', 'country_id', 'state_id', 'city_id', 'address_line_1', 'address_line_2', 'zip_code']));
            $image = uploadCroppedFile($request, 'image', 'profile_images', $patient->image);
            $cover_image = uploadCroppedFile($request, 'cover_image', 'cover_images', $patient->cover_images);
            $patient->update(['image' => $image]);
            $patient->update(['cover_image' => $cover_image]);
        }
        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'Profile Updated Successfully',
        ]);
        return redirect()->back()->withResponseData([
            'message' => 'Profile Updated Successfully',
            'type' => 'success'
        ]);
    }

    public function updateDoctorGeneralInformation(UpdateDoctorGeneralInfoRequest $request)
    {
        // dd($request->all());
        $user = auth()->user();
        $doctor = $user->doctor;
        if ($doctor) {
            $doctor->update($request->only([
                'first_name',
                'last_name',
                'description',
                'country_id',
                'state_id',
                'is_online',
                'city_id',
                'experience',
                'speciality',
                'address_line_1',
                'address_line_2',
                'longitude',
                'latitude',
                'zip_code',
                'user_name',
                'is_energy_exchange',
                'is_co_creation',
                'prefix',
                'suffix',
                'home_phone',
                'cell_phone',
                'job_title',
                'company',
                'website',
                'email',
                'billing_address_line_1',
                'billing_address_line_2',
                'billing_country_id',
                'billing_state_id',
                'billing_city_id',
                'billing_zip_code',
                'shipping_address_line_1',
                'shipping_address_line_2',
                'shipping_country_id',
                'shipping_state_id',
                'shipping_city_id',
                'shipping_zip_code',
                'work_address_line_1',
                'work_address_line_2',
                'work_country_id',
                'work_state_id',
                'work_city_id',
                'work_zip_code'
            ]));
            $image = uploadCroppedFile($request, 'image', 'profile_images', $doctor->image);
            $cover_image = uploadCroppedFile($request, 'cover_image', 'cover_images', $doctor->cover_image);
            $doctor->update(['image' => $image]);
            $doctor->update(['cover_image' => $cover_image]);
            $doctor->doctor_categories()->sync($request->doctor_categories);
            $doctor->languages()->sync($request->languages);
            $doctor->tags()->sync($request->tags);
        }
        // $this->updateUserProifleCompletion('healer');

        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'Profile Updated Successfully',
        ]);
        return redirect()->back()->withResponseData([
            'message' => 'Profile Updated Successfully',
            'type' => 'success'
        ]);
    }

    public function updateDoctorSettings(Request $request)
    {
        $user = Auth::user();
        $doctor = $user->doctor;
        foreach ($request->settings as $setting) {
            $doctor->doctor_settings()->updateOrCreate(['name' => $setting['name']], $setting);
        }
        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'Settings Updated Successfully',
        ]);
        return redirect()->back()->withResponseData([
            'message' => 'Settings Updated Successfully',
            'type' => 'success'
        ]);
    }

    public function updateClinicGeneralInformation(UpdateClinicGeneralInfoRequest $request)
    {
        $user = auth()->user();
        $clinic = $user->clinic;
        if ($clinic) {
            $clinic->update($request->only([
                'clinic_name',
                'clinic_website',
                'first_name',
                'last_name',
                'is_online',
                'description',
                'country_id',
                'state_id',
                'city_id',
                'address_line_1',
                'address_line_2',
                'zip_code',
                'user_name',
                'longitude',
                'latitude',
                'prefix',
                'suffix',
                'home_phone',
                'cell_phone',
                'job_title',
                'company',
                'website',
                'email',
                'billing_address_line_1',
                'billing_address_line_2',
                'billing_country_id',
                'billing_state_id',
                'billing_city_id',
                'billing_zip_code',
                'shipping_address_line_1',
                'shipping_address_line_2',
                'shipping_country_id',
                'shipping_state_id',
                'shipping_city_id',
                'shipping_zip_code',
                'work_address_line_1',
                'work_address_line_2',
                'work_country_id',
                'work_state_id',
                'work_city_id',
                'work_zip_code'
            ]));
            $image = uploadCroppedFile($request, 'image', 'profile_images', $clinic->image);
            $cover_image = uploadCroppedFile($request, 'cover_image', 'cover_images', $clinic->cover_image);

            $clinic->update(['image' => $image]);
            $clinic->update(['cover_image' => $cover_image]);

            $clinic->clinic_categories()->sync($request->clinic_categories);
            $clinic->languages()->sync($request->languages);
            $clinic->tags()->sync($request->tags);
        }
        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'Profile Updated Successfully',
        ]);
        return redirect()->back()->withResponseData([
            'message' => 'Profile Updated Successfully',
            'type' => 'success'
        ]);
    }

    public function updateClinicSettings(Request $request)
    {
        $user = Auth::user();
        $clinic = $user->clinic;
        foreach ($request->settings as $setting) {
            $clinic->clinic_settings()->updateOrCreate(['name' => $setting['name']], $setting);
        }
        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'Settings Updated Successfully',
        ]);
        return redirect()->back()->withResponseData([
            'message' => 'Settings Updated Successfully',
            'type' => 'success'
        ]);
    }

    public function becomeDoctor(Request $request)
    {
        $user = Auth::user();
        $logged_in_as = $request->session()->get('logged_in_as');
        $data = $user->{$logged_in_as};
        $pricing_plan = getDoctorDefaultPricingPlan();

        if (!$user->hasRole(Role::$Doctor)) {
            $user->roles()->attach([Role::$Doctor]);
            $user->doctor()->create([
                'first_name' => $data->first_name,
                'last_name' => $data->last_name,
                'description' => $data->description,
                'country_id' => $data->country_id,
                'state_id' => $data->state_id,
                'city_id' => $data->city_id,
                'address_line_1' => $data->address_line_1,
                'address_line_2' => $data->address_line_2,
                'zip_code' => $data->zip_code,
                'pricing_plan_id' => $pricing_plan->id ?? null
            ]);
        }
        // $request->session()->put('logged_in_as', Role::$Doctor);
        // request()->session()->flash('alert', [
        //     'type' => 'success',
        //     'message' => 'Successfully Switched To '.ucfirst(Role::$Doctor),
        // ]);
        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'Now, You Are A Doctor Also',
        ]);
        return redirect()->back();
    }
    public function becomeUser(Request $request)
    {
        $user = Auth::user();
        $logged_in_as = $request->session()->get('logged_in_as');
        $data = $user->{$logged_in_as};
        if (!$user->hasRole(Role::$Patient)) {
            $user->roles()->attach([Role::$Patient]);
            $user->patient()->create([
                'first_name' => $data->first_name,
                'last_name' => $data->last_name,
                'description' => $data->description,
                'country_id' => $data->country_id,
                'state_id' => $data->state_id,
                'city_id' => $data->city_id,
                'address_line_1' => $data->address_line_1,
                'address_line_2' => $data->address_line_2,
                'zip_code' => $data->zip_code,

            ]);
        }
        // $request->session()->put('logged_in_as', Role::$Patient);
        // request()->session()->flash('alert', [
        //     'type' => 'success',
        //     'message' => 'Successfully Switched To '.ucfirst(Role::$Patient),
        // ]);
        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'Now, You Are A Patient Also',
        ]);
        return redirect()->back();
    }
    public function becomeClinic(Request $request)
    {
        $user = Auth::user();
        $logged_in_as = $request->session()->get('logged_in_as');
        $data = $user->{$logged_in_as};
        $pricing_plan = getClinicDefaultPricingPlan();
        if (!$user->hasRole(Role::$Clinic)) {
            $user->roles()->attach([Role::$Clinic]);
            $user->clinic()->create([
                'first_name' => $data->first_name,
                'last_name' => $data->last_name,
                'description' => $data->description,
                'country_id' => $data->country_id,
                'state_id' => $data->state_id,
                'city_id' => $data->city_id,
                'address_line_1' => $data->address_line_1,
                'address_line_2' => $data->address_line_2,
                'zip_code' => $data->zip_code,
                'pricing_plan_id' => $pricing_plan->id ?? null
            ]);
        }
        // $request->session()->put('logged_in_as', Role::$Clinic);
        // request()->session()->flash('alert', [
        //     'type' => 'success',
        //     'message' => 'Successfully Switched To '.ucfirst(Role::$Clinic),
        // ]);
        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'Now, You Are A Clinic User Also',
        ]);
        return redirect()->back();
    }
    public function switchRole(Request $request, $role)
    {
        $user = Auth::user();
        $logged_in_as = $request->session()->get('logged_in_as');
        $data = $user->{$logged_in_as};
        if(!$data){
            if ($user->hasRole($role)) {
                $user->roles()->detach([$role]);
            }
            request()->session()->flash('alert', [
                'type' => 'success',
                'message' => 'Role not Found ' . ucfirst($role),
            ]);
            return redirect()->back();
        }
        if ($user->hasRole($role)) {
            if (isset($data)) {
                $data->update(['is_online' => 0]);
            }
            if (isset($user->{$role})) {
                $user->{$role}->update(['is_online' => 1]);
            }
            $request->session()->put('logged_in_as', $role);
        }


        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'Successfully Switched To ' . ucfirst($role),
        ]);
        return redirect()->back();
    }

    public function getStates(Request $request)
    {
        $request->validate(['country_id' => 'exists:countries,id']);
        $states = APIGeneralController::getStates($request);
        $response = generateResponse($states, true, "States Fetched Successfully", null, 'collection');
        return response()->json($response);
    }

    public function getCities(Request $request)
    {
        $request->validate(['city_id' => 'exists:cities,id']);
        $cities = APIGeneralController::getCities($request);
        $response = generateResponse($cities, true, "Cities Fetched Successfully", null, 'collection');
        return response()->json($response);
    }
}
