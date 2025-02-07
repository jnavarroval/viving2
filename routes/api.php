<?php

use App\Http\Controllers\API\AgoraController;
use App\Http\Controllers\API\Auth\APIAuthController;
use App\Http\Controllers\API\APIController;
use App\Http\Controllers\API\APIDetailController;
use App\Http\Controllers\API\Auth\APIAccountController;
use App\Http\Controllers\API\Auth\APIBroadcastAuthController;
use App\Http\Controllers\API\Patients\APIReviewsController;
use App\Http\Controllers\API\APIAppointmentsController;
use App\Http\Controllers\API\Patients\PatientChatMessagesController;
//Doctors
use App\Http\Controllers\API\Doctors\APIDoctorAppointmentScheduleController;
use App\Http\Controllers\API\Doctors\APIDoctorProfileController;
use App\Http\Controllers\API\Doctors\DoctorCertificationsController;
use App\Http\Controllers\API\Doctors\DoctorBroadcastsController;
use App\Http\Controllers\API\Doctors\DoctorPodcastsController;
use App\Http\Controllers\API\Doctors\DoctorEventsController;
use App\Http\Controllers\API\Doctors\DoctorPostsController;
use App\Http\Controllers\API\Doctors\DoctorArchivesController;
use App\Http\Controllers\API\Doctors\DoctorExperiencesController;
use App\Http\Controllers\API\Doctors\DoctorEducationsController;
use App\Http\Controllers\API\Doctors\DoctorChatMessagesController;
//Doctors
//Clinics
use App\Http\Controllers\API\Clinic\APIClinicAppointmentScheduleController;
use App\Http\Controllers\API\Clinic\APIClinicProfileController;
use App\Http\Controllers\API\NotificationSettingsController;
use App\Http\Controllers\API\Patients\PatientBookedServicesController;
use App\Http\Controllers\API\Patients\PatientServiceChatMessagesController;
use App\Http\Controllers\API\Doctors\DoctorBookedServicesController;
use App\Http\Controllers\API\Doctors\DoctorServiceChatMessagesController;
use App\Http\Controllers\API\Doctors\DoctorServicesController;
use App\Http\Controllers\API\WalletController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\API\Patients\ElectronicHealthRecordsController;
use App\Http\Controllers\Doctors\BookAppointmentController as DoctorsBookAppointmentController;
//Clinics
use App\PusherBeam\PusherBeamService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('/login', [APIAuthController::class, 'submitLoginForm'])->name('submit.login');
    Route::post('/social_login', [APIAuthController::class, 'socialLogin'])->name('submit.social_login');
    Route::post('/register', [APIAuthController::class, 'submitRegisterForm'])->name('submit.register');
    Route::post('/forgot_password', [APIAuthController::class, 'submitForgotPasswordForm'])->name('password.forgot');
    Route::post('/reset_password', [APIAuthController::class, 'submitResetPasswordForm'])->name('password.reset');
    Route::get('/logout', [APIAuthController::class, 'logout'])->name('logout');
    Route::get('/user', [APIAuthController::class, 'getLoggedInUser'])->name('user');
});

Route::get('in_app_notifications', [NotificationSettingsController::class, 'getInAppNotification']);
Route::post('is_seen_notification_status/{id}', [NotificationSettingsController::class, 'updateIsSeenNotificationStatus']);

Route::prefix('doctors')->name('doctors.')->group(function () {
    Route::post('update_general_info', [APIAccountController::class, 'updateDoctorGeneralInformation'])->name('update_general_info');
    Route::post('update_settings', [APIAccountController::class, 'updateDoctorSettings'])->name('update_settings');
    Route::post('become_doctor', [APIAccountController::class, 'becomeDoctor'])->name('doctors.become_doctor');
    //Doctor Appointments Apis
    Route::post('save_appointment_schedules', [APIDoctorAppointmentScheduleController::class, 'saveAppointmentSchedule'])->name('save_appointment_schedules');
    Route::post('add_new_appointment_schedules', [APIDoctorAppointmentScheduleController::class, 'addNewAppointmentSchedule'])->name('add_new_appointment_schedules');
    Route::post('delete_appointment_slots', [APIDoctorAppointmentScheduleController::class, 'deleteAppointmentScheduleSlots'])->name('delete_appointment_slots');
    Route::get('/api_appointment_schedules', [APIDoctorAppointmentScheduleController::class, 'getAppointmentSchedules'])->name('getApiAppointmentSchedules');
    Route::get('/get_filter_appointment_logs', [APIDoctorAppointmentScheduleController::class, 'getFilteredAppointmentlogs'])->name('getApiFilsterAppointmentLogs');
    Route::get('/get_filter_appointment_log_detail/{book_appointment}', [APIDoctorAppointmentScheduleController::class, 'showAppointmentLogDetail'])->name('showAppointmentLogDetail');
    Route::get('profile/{user_name}/book_appointment', [APIDoctorProfileController::class, 'bookAppointment'])->name('book_appointment');
    Route::get('profile/{user_name}/appointment_types', [APIDoctorProfileController::class, 'getLwyerAppointmentTypes'])->name('book_appointment');
    Route::get('/get_appointment_commission', [APIDoctorAppointmentScheduleController::class, 'getAppointmentCommission'])->name('getApiAppointmentCommission');






    Route::post('update_appointment_status/{book_appointment}', [APIDoctorAppointmentScheduleController::class, 'updateAppointmentStatus'])->name('update_appointment_status');
    //Doctor Call Apis
    Route::get('/api_generate_agora_token', [AgoraController::class, 'generateAgoraToken'])->name('getAgoraToken');
    Route::post('/api_make_agora_call', [AgoraController::class, 'makeAgoraCall'])->name('postApiMakeAgoraCall');
    //Doctor Call Apis
    //Doctor Chat Apis
    Route::get('/api_get_chat_messages/{appointment}', [DoctorChatMessagesController::class, 'getChatMessages'])->name('getApiChatMessages');
    Route::post('/api_send_chat_message', [DoctorChatMessagesController::class, 'sendChatMessage'])->name('postApiSendMessage');

    //Doctor Chat Apis
    //Doctor Appointments Apis

    Route::get('/get_filter_booked_services', [DoctorBookedServicesController::class, 'getFilteredBookedServices'])->name('getApiFilterBookedServices');
    Route::get('/get_filter_booked_service_detail/{booked_service}', [DoctorBookedServicesController::class, 'showBookedServiceDetail'])->name('showBookedServiceDetail');
    Route::post('update_booked_service_status/{booked_service}', [DoctorBookedServicesController::class, 'updateBookedServiceStatus'])->name('update_service_status');
    Route::get('/api_get_service_chat_messages/{booked_service}', [DoctorServiceChatMessagesController::class, 'getChatMessages'])->name('getApiServiceChatMessages');
    Route::post('/api_service_send_chat_message', [DoctorServiceChatMessagesController::class, 'sendChatMessage'])->name('postApiSendServiceMessage');


    //Doctor CRUDS
    Route::apiCrudRoutes('doctor_certifications', DoctorCertificationsController::class);
    Route::apiCrudRoutes('doctor_broadcasts', DoctorBroadcastsController::class);
    Route::apiCrudRoutes('doctor_podcasts', DoctorPodcastsController::class);
    Route::apiCrudRoutes('doctor_events', DoctorEventsController::class);
    Route::apiCrudRoutes('doctor_posts', DoctorPostsController::class);
    Route::apiCrudRoutes('doctor_archives', DoctorArchivesController::class);
    Route::apiCrudRoutes('doctor_experiences', DoctorExperiencesController::class);
    Route::apiCrudRoutes('doctor_educations', DoctorEducationsController::class);
    Route::apiCrudRoutes('doctor_services', DoctorServicesController::class);


    //Ehr Dropdowns

    Route::get('/electronic_health_record/diseases', [APIController::class, 'getAllDiseases'])->name('record.disease');
    Route::get('/electronic_health_record/medical_tests', [APIController::class, 'getAllMedicalTests'])->name('medical.test');
    Route::get('/electronic_health_record/patient_healths', [APIController::class, 'getAllPatientHealths'])->name('record.health');



    //Ehr Save Details

    Route::post('/electronic_health_record/add_prescription_appointment', [ElectronicHealthRecordsController::class, 'createPrescriptionAppointment'])->name('appointment_detail.prescription');
    Route::get('/electronic_health_record/get_prescription_appointment/{booked_appointment_id}', [ElectronicHealthRecordsController::class, 'getPrescriptionAppointment'])->name('appointment_get_detail.prescription');

    //Ehr Medicine details

    Route::post('/electronic_health_record/add_medicine_appointment', [ElectronicHealthRecordsController::class, 'createMedicineAppointment'])->name('appointment_detail.medicine');
    Route::post('/electronic_health_record/delete_medicine_appointment', [ElectronicHealthRecordsController::class, 'deleteMedicineAppointment'])->name('appointment_delete.medicine');

    //Doctor CRUDS

    Route::post('/api_send_notification', function (Request $request) {
        $request->validate(
            [
                'title' => 'required|string',
                'body' => 'required|string',
                'deep_link' => 'required|string',
                'reciever_id' => 'required|exists:patients,id',
                'payload' => 'required',
                'payload.appointment' => "required",
                'payload.channel_name' => "required",
                'payload.token' => "required"
            ]
        );
        try {
            $title = $request->title;
            $body = $request->body;
            $deep_link = env('APP_URL') . $request->deep_link;
            $pusher = new PusherBeamService;
            $users = (string)$request->reciever_id;
            $pusher->sendNotificationToUsers($users, $title, $body, $deep_link, $request->payload);
            $response = generateResponse(null, true, "Notification Sent Successfully", null, 'collection');
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = generateResponse(null, false, $e->getMessage(), null, 'collection');
            return response()->json($response, 200);
        }
    })->name('getApiSendPushNotification');
});
Route::prefix('clinics')->name('clinics.')->group(function () {
    Route::post('update_general_info', [APIAccountController::class, 'updateClinicGeneralInformation'])->name('update_general_info');
    Route::post('update_settings', [APIAccountController::class, 'updateClinicSettings'])->name('update_settings');
    Route::post('become_clinic', [APIAccountController::class, 'becomeClinic'])->name('clinics.become_clinic');
    //Doctor Appointments Apis
    Route::post('save_appointment_schedules', [APIClinicAppointmentScheduleController::class, 'saveAppointmentSchedule'])->name('save_appointment_schedules');
    Route::post('add_new_appointment_schedules', [APIClinicAppointmentScheduleController::class, 'addNewAppointmentSchedule'])->name('add_new_appointment_schedules');
    Route::post('delete_appointment_slots', [APIClinicAppointmentScheduleController::class, 'deleteAppointmentScheduleSlots'])->name('delete_appointment_slots');
    Route::get('/api_appointment_schedules', [APIClinicAppointmentScheduleController::class, 'getAppointmentSchedules'])->name('getApiAppointmentSchedules');
    Route::get('profile/{user_name}/book_appointment', [APIClinicProfileController::class, 'bookAppointment'])->name('book_appointment');
    Route::get('/get_appointment_commission', [APIClinicAppointmentScheduleController::class, 'getAppointmentCommission'])->name('getApiAppointmentCommission');
    //Doctor Appointments Apis


});
Route::prefix('patients')->name('patients.')->group(function () {
    Route::post('update_general_info', [APIAccountController::class, 'updatePatientGeneralInformation'])->name('update_general_info');
    Route::post('become_patient', [APIAccountController::class, 'becomeUser'])->name('become_user');
    Route::post('add_doctor_review', [APIReviewsController::class, 'addDoctorReview'])->name('add_doctor_review');
    Route::post('add_clinic_review', [APIReviewsController::class, 'addClinicReview'])->name('add_clinic_review');
    Route::post('book_appointment', [APIAppointmentsController::class, 'bookAppointment'])->name('book_appointment');
    Route::get('/get_filter_appointment_logs', [APIAppointmentsController::class, 'getFilteredAppointmentlogs'])->name('getApiFilsterAppointmentLogs');
    Route::get('/get_filter_appointment_log_detail/{book_appointment}', [APIAppointmentsController::class, 'showAppointmentLogDetail'])->name('showAppointmentLogDetail');
    //Patient Call Apis
    // Route::get('/api_generate_agora_token', [AgoraController::class, 'generateAgoraToken'])->name('getAgoraToken');
    // Route::post('/api_make_agora_call', [AgoraController::class, 'makeAgoraCall'])->name('postApiMakeAgoraCall');
    //Patient Call Apis
    //Patient Chat Apis


    Route::get('//api_get_chat_messages/{appointment}', [PatientChatMessagesController::class, 'getChatMessages'])->name('getApiChatMessages');
    Route::post('/api_send_chat_message', [PatientChatMessagesController::class, 'sendChatMessage'])->name('postApiSendMessage');

    Route::post('book_service', [PatientBookedServicesController::class, 'bookService'])->name('book_appointment');
    Route::get('/get_filter_service_logs', [PatientBookedServicesController::class, 'getFilteredServiceLogs'])->name('getApiFilterServiceLogs');
    Route::get('/get_filter_service_log_detail/{booked_service}', [PatientBookedServicesController::class, 'showServiceLogDetail'])->name('showAppointmentLogDetail');
    Route::get('/api_get_service_chat_messages/{booked_service}', [PatientServiceChatMessagesController::class, 'getChatMessages'])->name('getApiServiceChatMessages');
    Route::post('/api_send_service_chat_message', [PatientServiceChatMessagesController::class, 'sendChatMessage'])->name('postApiSendServiceMessage');
    //Patient Chat Apis

    //EHr
    Route::post('/electronic_health_record', [ElectronicHealthRecordsController::class, 'index'])->name('ehr.listing');
    // Route::get('/electronic_health_record', [ElectronicHealthRecordsController::class, 'index'])->name('ehr.listing');
   
    Route::get('/electronic_health_record/detail/{id}', [ElectronicHealthRecordsController::class, 'showEhrDetailPage'])->name('ehr.detail');
    Route::post('/electronic_health_record/appointment_pdf_download', [ElectronicHealthRecordsController::class, 'downloadAppointmentPdf'])->name('appointment.pdf.download');
});
Route::post('/broadcasting/auth', [APIBroadcastAuthController::class, 'auth']);


Route::middleware(['api', 'api_setting'])->group(function () {


    Route::get('settings', [APIController::class, 'getAllSettings'])->name('getAllSettings');
    Route::get('gateways', [APIController::class, 'getAllGateways'])->name('getAllGateways');
    Route::get('countries', [APIController::class, 'getCountries'])->name('getCountries');
    Route::get('appointment_types', [APIController::class, 'getAppointmentTypes'])->name('getAppointmentTypes');
    Route::get('doctor_categories', [APIController::class, 'getDoctorCategories'])->name('getDoctorCategories');
    Route::get('doctor_main_categories_with_childrens', [APIController::class, 'getDoctorMainCategoriesWithChildrens'])->name('getDoctorMainCategoriesWithChildrens');
    Route::get('clinic_categories', [APIController::class, 'getClinicCategories'])->name('getClinicCategories');
    Route::get('featured_doctors', [APIController::class, 'getFeaturedDoctors'])->name('getFeaturedDoctors');
    Route::get('featured_clinics', [APIController::class, 'getFeaturedClinics'])->name('getFeaturedClinics');
    Route::get('featured_events', [APIController::class, 'getFeaturedEvents'])->name('getFeaturedEvents');
    Route::get('featured_tags', [APIController::class, 'getFeaturedTags'])->name('getFeaturedTags');
    Route::get('top_rated_doctors', [APIController::class, 'getTopRatedDoctors'])->name('getTopRatedDoctors');
    Route::post('filter_doctors', [APIController::class, 'getDoctors'])->name('getDoctors');
    Route::post('filter_clinics', [APIController::class, 'getClinics'])->name('getClinics');
    Route::post('filter_doctor_reviews/{user_name}', [APIController::class, 'getDoctorReviews'])->name('getDoctorReviews');
    Route::post('filter_doctor_podcasts/{user_name}', [APIController::class, 'getDoctorPodcasts'])->name('getDoctorPodcasts');
    Route::post('filter_doctor_broadcasts/{user_name}', [APIController::class, 'getDoctorBroadcasts'])->name('getDoctorBroadcasts');
    Route::post('filter_clinic_reviews/{user_name}', [APIController::class, 'getClinicReviews'])->name('getClinicReviews');
    Route::get('testimonials', [APIController::class, 'getTestimonials'])->name('getTestimonials');
    Route::post('filter_events', [APIController::class, 'getEvents'])->name('getEvents');
    Route::get('blog_categories', [APIController::class, 'getBlogCategories'])->name('getBlogCategories');
    Route::get('tags', [APIController::class, 'getTags'])->name('getTags');
    Route::get('archive_categories', [APIController::class, 'getArchiveCategories'])->name('getArchiveCategories');
    Route::post('filter_posts', [APIController::class, 'getPosts'])->name('getPosts');
    Route::post('filter_archives', [APIController::class, 'getArchives'])->name('getArchives');
    Route::post('filter_broadcasts', [APIController::class, 'getBroadcasts'])->name('getBroadcasts');
    Route::post('filter_podcasts', [APIController::class, 'getPodcasts'])->name('getPodcasts');
    Route::get('company_page/{slug}', [APIController::class, 'getCompanyPage'])->name('getCompanyPage');
    Route::get('doctors/{user_name}', [APIDetailController::class, 'doctorDetail'])->name('doctors.detail');
    Route::get('clinics/{user_name}', [APIDetailController::class, 'lawFIrmDetail'])->name('law_fIrms.detail');
    Route::get('blogs/{slug}', [APIDetailController::class, 'blogDetail'])->name('blogs.detail');
    Route::get('archives/{slug}', [APIDetailController::class, 'archiveDetail'])->name('archives.detail');
    Route::get('podcasts/{slug}', [APIDetailController::class, 'podcastDetail'])->name('podcasts.detail');
    Route::get('broadcasts/{slug}', [APIDetailController::class, 'broadcastDetail'])->name('broadcasts.detail');
    Route::get('events/{slug}', [APIDetailController::class, 'eventDetail'])->name('events.detail');
    Route::get('tags/{slug}', [APIDetailController::class, 'tagDetail'])->name('tags.detail');
    Route::post('contact', [ContactsController::class, 'contact_api'])->name('contact_api.store');
    Route::get('get_current_balance', [WalletController::class, 'getCurrentBalance'])->name('get_current_balance');
    Route::get('get_wallet_transactions', [WalletController::class, 'getWalletTransactions'])->name('get_wallet_transactions');
    Route::get('get_wallet_withdrawls', [WalletController::class, 'getWalletWithdrawls'])->name('get_wallet_withdrawls');
    Route::post('withdraw_amount', [WalletController::class, 'withdrawAmount'])->name('withdraw_amount');
    Route::post('add-to-wallet', [WalletController::class, 'AddAmountToWallet'])->name('wallet.addAmount');

    Route::get('service_categories', [APIController::class, 'getServiceCategories'])->name('getServiceCategories');
    Route::post('filter_services', [APIController::class, 'getServices'])->name('getServices');
    Route::get('services/{slug}', [APIDetailController::class, 'serviceDetail'])->name('services.detail');
    Route::get('get_all_languages', [APIController::class, 'getAllLanguages'])->name('getAllLanguages');
    Route::get('patient_doctors', [APIController::class, 'getAllPatientDoctors'])->name('getAllPatientDoctors');
    Route::get('patient_diseases', [APIController::class, 'getAllPatientDiseases'])->name('getAllPatientDiseases');
    // Route::get('patient_appointments', [APIController::class, 'getAllPatientAppointments'])->name('getAllPatientAppointments');


    Route::post('patient_appointments',[APIController::class,'patientAppointmens'])->name('patientAppointmens')->middleware('auth:api');
    Route::post('patient_appointment_diseases',[APIController::class,'patientAppointmentDiseases'])->name('patientAppointmentDiseases')->middleware('auth:api');
    Route::post('patient_appointment_doctors',[APIController::class,'patientAppointmentDoctors'])->name('patientAppointmentDoctors')->middleware('auth:api');
});
Route::get('pusher/beams-auth', [PusherBeamService::class, 'generateToken']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
