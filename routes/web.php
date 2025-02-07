<?php

use App\Http\Controllers\AgoraController;
use App\Http\Controllers\API\APIController;
use App\Http\Controllers\API\RecordPrescriptionController;
use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\WebAPIController;
use App\Http\Controllers\Clinics\ClinicArchivesController;
use App\Http\Controllers\Clinics\ClinicBroadcastsController;
use App\Http\Controllers\Clinics\ClinicEventsController;
use App\Http\Controllers\Clinics\ClinicPodcastsController;
use App\Http\Controllers\Clinics\ClinicPostsController;
use App\Http\Controllers\Clinics\ClinicProfileController;
use App\Http\Controllers\CompanyPagesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\Patients\ReviewsController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\Doctors\DoctorArchivesController;
use App\Http\Controllers\Doctors\DoctorBroadcastsController;
use App\Http\Controllers\Doctors\DoctorEventsController;
use App\Http\Controllers\Doctors\DoctorPodcastsController;
use App\Http\Controllers\Doctors\DoctorPostsController;
use App\Http\Controllers\Doctors\DoctorProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\PricingPlansController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use App\PusherBeam\PusherBeamService;
use App\Http\Controllers\Doctors\AppointmentScheduleController;
use App\Http\Controllers\Doctors\BookAppointmentController as DoctorsBookAppointmentController;
use App\Http\Controllers\Patients\BookAppointmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentRatingsController;
use App\Http\Controllers\Clinics\AppointmentScheduleController as ClinicsAppointmentScheduleController;
use App\Http\Controllers\Clinics\BookAppointmentController as ClinicsBookAppointmentController;
use App\Http\Controllers\ChatMessagesController;
use App\Http\Controllers\Clinics\ClinicCertificationsController;
use App\Http\Controllers\Clinics\ClinicDoctorsController;
use App\Http\Controllers\Clinics\ClinicServicesController;
use App\Http\Controllers\Doctors\DoctorServicesController;
use App\Http\Controllers\Doctors\DoctorCertificationsController;
use App\Http\Controllers\Doctors\DoctorExperiencesController;
use App\Http\Controllers\Doctors\DoctorEducationsController;
use App\Http\Middleware\API\Doctor;
use App\Models\Archive;
use App\Models\Broadcast;
use App\Models\Event;
use App\Models\Clinic;
use App\Models\Doctor as ModelsDoctor;
use App\Models\Podcast;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Patients\BookedServicesController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\Doctors\BookedServicesController as DoctorsBookedServicesController;
use App\Http\Controllers\Clinics\BookedServicesController as ClinicsBookedServicesController;
use App\Http\Controllers\Doctors\DoctorMedicineController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Patients\ElectronicHealthRecordsController;
use App\Http\Controllers\Patients\RecordDiseaseController;
use App\Http\Controllers\PaymentMethods\StripePaymentsController;
use App\Http\Controllers\ServiceRatingsController;
use App\Http\Resources\Web\BookAppointmentsResource;
use App\Models\BankAccount;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('gateways', [PaymentController::class, 'gateways']);
Route::get('add_fund_request', [PaymentController::class, 'addFundRequest'])->name('user.addFund');
Route::get('add_fund_confirm/{transaction}', [PaymentController::class, 'depositConfirm'])->name('user.addFund.confirm');
Route::match(['get', 'post'], 'success', [PaymentController::class, 'success'])->name('success');
Route::match(['get', 'post'], 'failed', [PaymentController::class, 'failed'])->name('failed');
Route::match(['get', 'post'], 'payment/{code}/{trx?}/{type?}', [PaymentController::class, 'gatewayIpn'])->name('ipn');

Route::get('/email/verify', [VerificationController::class, 'showEmailVerificationPage'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verifyEmail'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [VerificationController::class, 'resendVerificationEmail'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/start', function () {
    return Inertia::render('Auth/SelectRole');
})->name('start');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/forgot_password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot_password');
Route::get('/reset_password', [AuthController::class, 'showResetPasswordForm'])->name('reset_password');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/login', [AuthController::class, 'submitLoginForm'])->name('submit.login');
Route::post('/register', [AuthController::class, 'submitRegisterForm'])->name('submit.register');
Route::post('/forgot_password', [AuthController::class, 'submitForgotPasswordForm'])->name('password.forgot');
Route::post('/reset_password', [AuthController::class, 'submitResetPasswordForm'])->name('password.reset');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/social_auth/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('social_redirect');
Route::get('/social_auth/{provider}/callback', [SocialAuthController::class, 'providerCallback'])->name('social_callback');

Route::get('language/{language}', function (Request $request, $language) {
    session()->put('locale', $language);
    request()->session()->flash('alert', [
        'type' => 'info',
        'message' => 'Language Switched Successfully',
    ]);
    return redirect()->back();
})->name('language');

Route::prefix('doctors')->name('doctors.')->group(function () {
    Route::post('update_general_info', [AccountController::class, 'updateDoctorGeneralInformation'])->name('update_general_info');
    Route::post('update_settings', [AccountController::class, 'updateDoctorSettings'])->name('update_settings');

    Route::apiCrudRoutes('doctor_broadcasts', DoctorBroadcastsController::class);
    // Route::apiCrudRoutes('doctor_medicines', DoctorMedicineController::class);
    Route::apiCrudRoutes('doctor_podcasts', DoctorPodcastsController::class);
    Route::apiCrudRoutes('doctor_events', DoctorEventsController::class);
    Route::apiCrudRoutes('doctor_archives', DoctorArchivesController::class);
    Route::apiCrudRoutes('doctor_posts', DoctorPostsController::class);
    Route::apiCrudRoutes('doctor_certifications', DoctorCertificationsController::class);
    Route::apiCrudRoutes('doctor_experiences', DoctorExperiencesController::class);
    Route::apiCrudRoutes('doctor_educations', DoctorEducationsController::class);
    Route::apiCrudRoutes('doctor_services', DoctorServicesController::class);
});
Route::prefix('clinics')->name('clinics.')->group(function () {
    Route::post('update_general_info', [AccountController::class, 'updateClinicGeneralInformation'])->name('update_general_info');
    Route::post('update_settings', [AccountController::class, 'updateClinicSettings'])->name('update_settings');
    Route::apiCrudRoutes('clinic_services', ClinicServicesController::class);
    Route::apiCrudRoutes('clinic_broadcasts', ClinicBroadcastsController::class);
    Route::apiCrudRoutes('clinic_podcasts', ClinicPodcastsController::class);
    Route::apiCrudRoutes('clinic_events', ClinicEventsController::class);
    Route::apiCrudRoutes('clinic_archives', ClinicArchivesController::class);
    Route::apiCrudRoutes('clinic_posts', ClinicPostsController::class);
    Route::apiCrudRoutes('clinic_certifications', ClinicCertificationsController::class);
    // Route::apiCrudRoutes('clinic_doctors', ClinicDoctorsController::class);
});
Route::prefix('patients')->name('patients.')->group(function () {
    Route::post('add_doctor_review', [ReviewsController::class, 'addDoctorReview'])->name('add_doctor_review');
    Route::post('add_clinic_review', [ReviewsController::class, 'addClinicReview'])->name('add_clinic_review');
});

Route::prefix('patients')->name('patients.')->group(function () {
    Route::post('update_general_info', [AccountController::class, 'updatePatientGeneralInformation'])->name('update_general_info');
    Route::post('book_appointment', [BookAppointmentController::class, 'bookAppointment'])->name('book_appointment');
    Route::get('appointment_bank_transfers/{appointment_id}', [BookAppointmentController::class, 'getBankTransfers'])->name('appointment_bank_transfers');
    Route::post('fund_bank_transfer', [BookAppointmentController::class, 'fundBankTransfer'])->name('fund_bank_transfer');
    Route::get('appointment_stripe_transfers/{appointment_id}', [StripePaymentsController::class, 'getStripeAccount'])->name('appointment_stripe_transfers');
    Route::get('service_stripe_transfers/{service_id}', [StripePaymentsController::class, 'getServiceStripeAccount'])->name('service_stripe_transfers');
    Route::get('wallet_stripe_transfers', [StripePaymentsController::class, 'getStripeAccountForWallet'])->name('appointment_stripe_transfers_for_wallet');



    Route::post('book_service', [BookedServicesController::class, 'bookService'])->name('book_service');
    Route::get('service_bank_transfers/{service_id}', [BookedServicesController::class, 'getBankTransfers'])->name('service_bank_transfers');
    Route::apiCrudRoutes('electronic_health_record', ElectronicHealthRecordsController::class);
    Route::post('/electronic_health_record', [ElectronicHealthRecordsController::class, 'index'])->name('ehr.listing ');
    Route::get('/electronic_health_record', [ElectronicHealthRecordsController::class, 'index'])->name('ehr.listing');
    Route::get('/electronic_health_record/detail/{id}', [ElectronicHealthRecordsController::class, 'showEhrDetailPage'])->name('ehr.detail');
    Route::post('/electronic_health_record/appointment_pdf_download', [ElectronicHealthRecordsController::class, 'downloadAppointmentPdf'])->name('appointment.pdf.download');
    Route::get('/record_disease', [RecordDiseaseController::class, 'GetAllDisease'])->name('record.disease');
    Route::get('/medical_test', [WebAPIController::class, 'getAllMedicalTest'])->name('medical.test');
    Route::get('/record_health', [WebAPIController::class, 'getAllPatientHealth'])->name('record.health');
    // Route::post('/record_prescription', [RecordPrescriptionController::class, 'store'])->name('prescription.store');
});
Route::get('book_service/{service}', [BookedServicesController::class, 'showBookServicePage'])->name('book_service_display')->middleware(['auth', 'patient']);

Route::prefix('doctor')->name('doctor.')->group(function () {
    Route::get('profile', [DoctorProfileController::class, 'myProfile'])->name('my_profile');
    Route::get('profile/{user_name}', [DoctorProfileController::class, 'profile'])->name('profile');
    Route::get('reviews/{user_name}', [DoctorProfileController::class, 'reviews'])->name('reviews');

    Route::post('save_appointment_schedules', [AppointmentScheduleController::class, 'saveAppointmentSchedule'])->name('save_appointment_schedules');
    Route::post('add_new_appointment_schedules', [AppointmentScheduleController::class, 'addNewAppointmentSchedule'])->name('add_new_appointment_schedules');
    Route::post('delete_appointment_slots', [AppointmentScheduleController::class, 'deleteAppointmentScheduleSlots'])->name('delete_appointment_slots');
    Route::get('/api_appointment_schedules', [AppointmentScheduleController::class, 'getAppointmentSchedules'])->name('getApiAppointmentSchedules');
    Route::get('/get_appointment_commission', [AppointmentScheduleController::class, 'getAppointmentCommission'])->name('getApiAppointmentCommission');
    Route::get('profile/{user_name}/book_appointment', [DoctorProfileController::class, 'bookAppointment'])->name('book_appointment')->middleware(['auth', 'patient']);
});
Route::prefix('clinic')->name('clinic.')->group(function () {
    Route::get('profile', [ClinicProfileController::class, 'myProfile'])->name('my_profile');
    Route::get('profile/{user_name}', [ClinicProfileController::class, 'profile'])->name('profile');
    Route::get('reviews/{user_name}', [ClinicProfileController::class, 'reviews'])->name('reviews');
    Route::post('save_appointment_schedules', [ClinicsAppointmentScheduleController::class, 'saveAppointmentSchedule'])->name('save_appointment_schedules');
    Route::post('add_new_appointment_schedules', [ClinicsAppointmentScheduleController::class, 'addNewAppointmentSchedule'])->name('add_new_appointment_schedules');
    Route::post('delete_appointment_slots', [ClinicsAppointmentScheduleController::class, 'deleteAppointmentScheduleSlots'])->name('delete_appointment_slots');
    Route::get('/api_appointment_schedules', [ClinicsAppointmentScheduleController::class, 'getAppointmentSchedules'])->name('getApiAppointmentSchedules');
    Route::get('/get_appointment_commission', [ClinicsAppointmentScheduleController::class, 'getAppointmentCommission'])->name('getApiAppointmentCommission');
    Route::get('profile/{user_name}/book_appointment', [ClinicProfileController::class, 'bookAppointment'])->name('book_appointment')->middleware(['auth', 'patient']);
});


//dashboard

Route::get('/dashboard', [AccountController::class, 'showDashboardPage'])->name('dashboard');
Route::post('/dashboard_last_week_appointment', [WebAPIController::class, 'getLastWeekAppointment'])->name('dashboard.last_week.appointment');
Route::post('/dashboard_last_week_transaction', [WebAPIController::class, 'getLastWeekTransaction'])->name('dashboard.last_week.transaction');
// Route::post('/dashboard_transaction_history', [WebAPIController::class, 'getLastWeekAppointment'])->name('dashboard.last_week.appointment');


Route::post('add_appointment_rating', [AppointmentRatingsController::class, 'addAppointmentRating'])->name('add_appointment_rating');
Route::post('add_service_rating', [ServiceRatingsController::class, 'addServiceRating'])->name('add_service_rating');
Route::get('/account', [AccountController::class, 'showAccountPage'])->name('account');
Route::post('/account_become_doctor', [AccountController::class, 'becomeDoctor'])->name('account.become_doctor');
Route::post('/account_become_user', [AccountController::class, 'becomeUser'])->name('account.become_user');
Route::post('/account_become_clinic', [AccountController::class, 'becomeClinic'])->name('account.become_clinic');
Route::post('/account_switch_role/{role}', [AccountController::class, 'switchRole'])->name('account.switch_role');
Route::get('/account_states', [AccountController::class, 'getStates'])->name('account.getStates');
Route::get('/account_cities', [AccountController::class, 'getCities'])->name('account.getCities');

Route::get('/api_countries', [WebAPIController::class, 'getCountries'])->name('getApiCountries');
Route::get('/api_doctor_categories', [WebAPIController::class, 'getDoctorCategories'])->name('getApiDoctorCategories');
Route::get('/api_featured_doctor_categories', [WebAPIController::class, 'getFeaturedDoctorCategories'])->name('getApiFeaturedDoctorCategories');
Route::get('/api_doctor_main_categories', [APIController::class, 'getDoctorMainCategoriesWithChildrens'])->name('getApiDoctorMainCategories');

Route::get('/api_clinic_categories', [WebAPIController::class, 'getClinicCategories'])->name('getApiClinicCategories');
Route::get('/api_clinic_main_categories', [APIController::class, 'getClinicMainCategoriesWithChildrens'])->name('getApiClinicMainCategories');
Route::get('/api_featured_doctors', [WebAPIController::class, 'getFeaturedDoctors'])->name('getApiFeaturedDoctors');
Route::get('/api_top_rated_doctors', [WebAPIController::class, 'getTopRatedDoctors'])->name('getApiTopRatedDoctors');
Route::get('/api_premium_doctors', [WebAPIController::class, 'getPremiumDoctors'])->name('getApiPremiumDoctors');

Route::get('/api_featured_clinics', [WebAPIController::class, 'getFeaturedClinics'])->name('getApiFeaturedClinics');
Route::get('/api_featured_events', [WebAPIController::class, 'getFeaturedEvents'])->name('getApiFeaturedEvents');
Route::get('/api_featured_tags', [WebAPIController::class, 'getFeaturedTags'])->name('getApiFeaturedTags');
Route::post('/api_doctors', [WebAPIController::class, 'getDoctors'])->name('getApiDoctors');
Route::post('/api_clinics', [WebAPIController::class, 'getClinics'])->name('getApiClinics');
Route::post('/api_doctor_reviews/{user_name}', [WebAPIController::class, 'getDoctorReviews'])->name('getApiDoctorReviews');
Route::get('/api_top_rated_doctor_categories', [WebAPIController::class, 'getTopRatedDoctorCategories'])->name('getApiTopRatedDoctorCategories');
Route::post('/api_clinic_reviews/{user_name}', [WebAPIController::class, 'getClinicReviews'])->name('getApiClinicReviews');

Route::get('/api_testimonials', [WebAPIController::class, 'getTestimonials'])->name('getApiTestimonials');

Route::post('/api_events', [WebAPIController::class, 'getEvents'])->name('getApiEvents');
Route::get('/api_blog_categories', [WebAPIController::class, 'getBlogCategories'])->name('getApiBlogCategories');
Route::get('/api_tags', [WebAPIController::class, 'getTags'])->name('getApiTags');
Route::get('/api_archive_categories', [WebAPIController::class, 'getArchiveCategories'])->name('getApiArchiveCategories');
Route::post('/api_posts', [WebAPIController::class, 'getPosts'])->name('getApiPosts');
Route::post('/api_archives', [WebAPIController::class, 'getArchives'])->name('getApiArchives');
Route::get('/api_archive_courses', [WebAPIController::class, 'getCourses'])->name('getApiCourses');
Route::post('/api_broadcasts', [WebAPIController::class, 'getBroadcasts'])->name('getApiBroadcasts');
Route::post('/api_podcasts', [WebAPIController::class, 'getPodcasts'])->name('getApiPodcasts');
Route::get('/api_faqs', [WebAPIController::class, 'getFaqs'])->name('getApiFaqs');
Route::get('/api_service_categories', [WebAPIController::class, 'getServiceCategories'])->name('getApiServiceCategories');
Route::post('/api_services', [WebAPIController::class, 'getServices'])->name('getApiServices');
Route::get('/api_reviews', [WebAPIController::class, 'getAllReviews'])->name('getApiAllReviews');
Route::get('/api_pricing_plans', [WebAPIController::class, 'getAllPricingPlans'])->name('getApiAllPricingPlans');
Route::get('/api_service_related_doctors', [WebAPIController::class, 'getAllServiceDoctors'])->name('getApiAllServiceDoctors');

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/pricing/{type}', [PricingPlansController::class, 'index'])->name('pricing');
Route::get('/pricing/{type}/{slug}', [PricingPlansController::class, 'show'])->name('pricing.show');
Route::post('/subscription/{type}/{slug}', [PricingPlansController::class, 'subscription'])->name('pricing.subscription');

Route::get('doctors', [ListingController::class, 'doctorListing'])->name('doctors.listing');
Route::post('doctors', [ListingController::class, 'doctorListing'])->name('doctors.listing');
Route::get('clinics', [ListingController::class, 'clinicListing'])->name('clinics.listing');
Route::get('events', [ListingController::class, 'eventListing'])->name('events.listing');
Route::get('blogs', [ListingController::class, 'blogListing'])->name('blogs.listing');
Route::get('courses', [ListingController::class, 'archiveListing'])->name('archives.listing');
Route::get('podcasts', [ListingController::class, 'podcastListing'])->name('podcasts.listing');
Route::get('media', [ListingController::class, 'broadcastListing'])->name('broadcasts.listing');
Route::get('tags', [ListingController::class, 'tagListing'])->name('tags.listing');
Route::get('services', [ListingController::class, 'serviceListing'])->name('services.listing');
Route::get('services/{slug}', [DetailController::class, 'serviceDetail'])->name('services.detail');

Route::get('blogs/{slug}', [DetailController::class, 'blogDetail'])->name('blogs.detail');
Route::get('courses/{slug}', [DetailController::class, 'archiveDetail'])->name('archives.detail');
Route::get('podcasts/{slug}', [DetailController::class, 'podcastDetail'])->name('podcasts.detail');
Route::get('media/{slug}', [DetailController::class, 'broadcastDetail'])->name('broadcasts.detail');
Route::get('events/{slug}', [DetailController::class, 'eventDetail'])->name('events.detail');
Route::get('tags/{slug}', [DetailController::class, 'tagDetail'])->name('tags.detail');

Route::get('/appointment_log', [AppointmentController::class, 'showAppointmentLogPage'])->name('appointment_log');
Route::get('/appointment_log/detail/{id}', [BookAppointmentController::class, 'showAppointmentLogDetailPage'])->name('patient.appointment_log.detail');
Route::post('/api_get_filter_appointment_logs', [BookAppointmentController::class, 'getFilteredAppointmentlogs'])->name('getApiFilterAppointmentLogs');
Route::post('/api_doctor_get_filter_appointment_logs', [DoctorsBookAppointmentController::class, 'getDoctorFilteredAppointmentlogs'])->name('getApiDoctorFilterAppointmentLogs');


Route::get('/doctor_appointment_log/detail/{id}', [DoctorsBookAppointmentController::class, 'showDoctorAppointmentLogDetailPage'])->name('doctor.appointment_log.detail');
Route::post('/update_appointment_status', [DoctorsBookAppointmentController::class, 'updateAppointmentStatus'])->name('appointment_detail.updateStatus');
Route::post('/update_appointment_started', [DoctorsBookAppointmentController::class, 'updateAppointmentStarted'])->name('appointment_detail.updateStarted');
Route::post('/add_prescription_appointment', [DoctorsBookAppointmentController::class, 'createPrescriptionAppointment'])->name('appointment_detail.prescription');
Route::get('/get_prescription_appointment/{booked_appointment_id}', [DoctorsBookAppointmentController::class, 'getPrescriptionAppointment'])->name('appointment_get_detail.prescription');

Route::post('/add_medicine_appointment', [DoctorsBookAppointmentController::class, 'createMedicineAppointment'])->name('appointment_detail.medicine');
Route::post('/delete_medicine_appointment', [DoctorsBookAppointmentController::class, 'deleteMedicineAppointment'])->name('appointment_delete.medicine');



Route::post('/api_clinic_get_filter_appointment_logs', [ClinicsBookAppointmentController::class, 'getClinicsFilteredAppointmentlogs'])->name('getApiClinicsFilterAppointmentLogs');
Route::get('/clinic_appointment_log/detail/{id}', [ClinicsBookAppointmentController::class, 'showClinicsAppointmentLogDetailPage'])->name('clinic.appointment_log.detail');
Route::post('/update_appointment_status_clinic', [ClinicsBookAppointmentController::class, 'updateAppointmentStatus'])->name('clinic.appointment_detail.updateStatus');
Route::post('/update_appointment_started_clinic', [ClinicsBookAppointmentController::class, 'updateAppointmentStarted'])->name('clinic.appointment_detail.updateStarted');
Route::get('/api_get_appointment_slots', [APIController::class, 'getAppointmentScheduleSlots'])->name('getApiAppointmentScheduleSlots');
Route::get('/api_get_clinic_appointment_slots', [APIController::class, 'getClinicAppointmentScheduleSlots'])->name('getApiClinicAppointmentScheduleSlots');

Route::post('/clinic_add_prescription_appointment', [ClinicsBookAppointmentController::class, 'createPrescriptionAppointment'])->name('clinic.appointment_detail.prescription');
Route::get('/clinic_get_prescription_appointment/{booked_appointment_id}', [ClinicsBookAppointmentController::class, 'getPrescriptionAppointment'])->name('clinic.appointment_get_detail.prescription');

Route::post('/clinic_add_medicine_appointment', [ClinicsBookAppointmentController::class, 'createMedicineAppointment'])->name('clinic.appointment_detail.medicine');
Route::post('/clinic_delete_medicine_appointment', [ClinicsBookAppointmentController::class, 'deleteMedicineAppointment'])->name('clinic.appointment_delete.medicine');



Route::get('/service_log', [ServicesController::class, 'showServiceLogsPage'])->name('service_log');
Route::get('/service_log/detail/{id}', [BookedServicesController::class, 'showServiceLogDetailPage'])->name('patient.service_log.detail');
Route::post('/api_get_filter_service_logs', [BookedServicesController::class, 'getFilteredServiceLogs'])->name('getApiFilterServiceLogs');
Route::post('/api_doctor_get_filter_service_logs', [DoctorsBookedServicesController::class, 'getDoctorFilteredServiceLogs'])->name('getApiDoctorFilterServiceLogs');
Route::get('/doctor_service_log/detail/{id}', [DoctorsBookedServicesController::class, 'showDoctorServiceLogDetailPage'])->name('doctor.service_log.detail');
Route::post('/update_service_status', [DoctorsBookedServicesController::class, 'updateServiceStatus'])->name('service_detail.updateStatus');
Route::post('/update_service_started', [DoctorsBookedServicesController::class, 'updateServiceStarted'])->name('service_detail.updateStarted');
Route::post('/api_clinic_get_filter_service_logs', [ClinicsBookedServicesController::class, 'getClinicFilteredServiceLogs'])->name('getApiClinicFilterServiceLogs');
Route::get('/clinic_service_log/detail/{id}', [ClinicsBookedServicesController::class, 'showClinicServiceLogDetailPage'])->name('clinic.service_log.detail');
Route::post('/update_service_status_clinic', [ClinicsBookedServicesController::class, 'updateServiceStatus'])->name('clinic.service_detail.updateStatus');
Route::post('/update_service_started_clinic', [ClinicsBookedServicesController::class, 'updateServiceStarted'])->name('clinic.service_detail.updateStarted');

Route::get('/api_get_chat_messages', [ChatMessagesController::class, 'getChatMessages'])->name('getApiChatMessages');
Route::post('/api_send_chat_message', [ChatMessagesController::class, 'sendChatMessage'])->name('postApiSendMessage');

Route::get('/api_generate_agora_token', [AgoraController::class, 'generateAgoraToken'])->name('getAgoraToken');
Route::post('/api_make_agora_call', [AgoraController::class, 'makeAgoraCall'])->name('postApiMakeAgoraCall');
Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');
Route::post('/add-to-wallet', [WalletController::class, 'AddAmountToWallet'])->name('wallet.addAmount');
Route::post('/withdraw-from-wallet', [WalletController::class, 'withdrawAmount'])->name('wallet.withdraw');


Route::get('/patient_notifications', [NotificationController::class, 'showNotifications'])->name('patient-notifications');
Route::post('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');
Route::get('/notifications/read_all', [NotificationController::class, 'markAllAsRead'])->name('notifications.read_all');
Route::get('/notifications/add', [NotificationController::class, 'addNotification'])->name('notifications.add');

Route::get('/api_send_notification', function (Request $request) {
    $title = $request->title;
    $body = $request->body;
    $deep_link = env('APP_URL') . $request->deep_link;
    $pusher = new PusherBeamService;
    $users = (string)$request->reciever_id;
    $pusher->sendNotificationToUsers($users, $title, $body, $deep_link, $request->payload);
})->name('getApiSendPushNotification');


Route::get('/add_fund_bank_account', function (Request $request) {
    // dd($request->all());
    $bank_accounts = BankAccount::active()->get();
    return Inertia::render('AddFundBankAccount', [
        'bank_accounts' => $bank_accounts,
        'fund_id' => $request->data['fund_id'],
        'amount' => $request->data['amount'],
    ]);
})->name('add_fund_bank_account');

Route::get('/contact', function () {
    // dd('ok');
    return Inertia::render('Contact');
})->name('contact');
Route::post('contact', [ContactsController::class, 'contact'])->name('contact.store');

Route::get('/donation', function () {
    // dd('ok');
    return Inertia::render('Donation');
})->name('donation');



Route::get('/faqs', [CompanyPagesController::class, 'faqs'])->name('faqs');
Route::get('/pages/about', [CompanyPagesController::class, 'about'])->name('about');
Route::get('/pages/{slug}', [CompanyPagesController::class, 'companyPage'])->name('company_pages.display');


Route::get('/forum', function () {
    // dd('ok');
    return Inertia::render('Forum');
})->name('forum');

Route::get('/shop', function () {
    // dd('ok');
    return Inertia::render('Shop');
})->name('shop');
// Route::get('/dashboard', function () {


//     return Inertia::render('Dashboard');
// })->name('dashboard');

Route::get('/appointment', function () {
    // dd('ok');
    return Inertia::render('Appointment');
})->name('appointment');

Route::get('/appointment-log', function () {
    // dd('ok');
    return Inertia::render('AppointmentLog');
})->name('appointment-log');

Route::get('/our-story', function () {
    return Inertia::render('OurStory');
})->name('our-story');

Route::get('/heal-yourself', function () {
    return Inertia::render('HealYourSelf');
})->name('heal-yourself');


Route::get('/categories', function () {
    // dd('ok');
    return Inertia::render('Categories/Listing');
})->name('categories');

Route::get('/quickby-services', function () {
    // dd('ok');
    return Inertia::render('QuickbyService');
})->name('quickby-services');
// Route::get('/patient_notifications', function () {
//     // dd('ok');
//     return Inertia::render('Patients/Notifications/PatientNotification');
// })->name('patient-notifications');

Route::post('add_money/stripe', [StripePaymentsController::class, 'stripeTransfer'])->name('addmoney.stripe');
Route::post('add_money/service_stripe', [StripePaymentsController::class, 'servicestripeTransfer'])->name('addmoney.service_stripe');
Route::post('add_money_wallet/stripe', [StripePaymentsController::class, 'stripeTransferWallet'])->name('wallet.addmoney.stripe');


Route::get('duplicate_data', function () {
    $complete_data = Post::where('clinic_id', 3)->whereNull('doctor_id')->get();
    $copy_data_ids = Clinic::where('id', '!=', 3)->pluck('id')->toArray();
    // dd($complete_data);
    foreach ($copy_data_ids as $key_law => $clinic_id) {
        foreach ($complete_data as $key => $data) {
            $inserted_data = [
                'clinic_id' => $clinic_id,
                'blog_category_id' => $data->blog_category_id,
                'name' => $data->getTranslations('name'),
                'description' => $data->getTranslations('description'),
                'is_active' => $data->is_active,
                'is_featured' => $data->is_featured,
                'image' => $data->image,
            ];
            $RESULT = Post::create(
                $inserted_data
            );
            $RESULT->slug = Str::slug($data['name'] . ' ' . $RESULT->id, '-');
            $RESULT->save();
        }
    }
    return 'updated';
});
