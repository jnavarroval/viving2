<?php

use App\Http\Controllers\SuperAdmin\AJAXController;
use App\Http\Controllers\SuperAdmin\ArchiveCategoriesController;
use App\Http\Controllers\SuperAdmin\Auth\ForgotPasswordController;
use App\Http\Controllers\SuperAdmin\Auth\LoginController;
use App\Http\Controllers\SuperAdmin\RolesController;
use App\Http\Controllers\SuperAdmin\UsersController;
use App\Http\Controllers\SuperAdmin\PatientsController;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\GeneralSettingsController;
use App\Http\Controllers\SuperAdmin\ProfileController;
use App\Http\Controllers\SuperAdmin\BlogCategoriesController;
use App\Http\Controllers\SuperAdmin\CitiesController;
use App\Http\Controllers\SuperAdmin\CompanyPagesController;
use App\Http\Controllers\SuperAdmin\CountriesController;
use App\Http\Controllers\SuperAdmin\FAQCategoriesController;
use App\Http\Controllers\SuperAdmin\EventsController;
use App\Http\Controllers\SuperAdmin\FAQSController;
use App\Http\Controllers\SuperAdmin\LanguagesController;
use App\Http\Controllers\SuperAdmin\StatesController;
use App\Http\Controllers\SuperAdmin\PricingPlansController;
use App\Http\Controllers\SuperAdmin\TagsController;
use App\Http\Controllers\SuperAdmin\TestimonialsController;
use App\Http\Controllers\SuperAdmin\PagesContentsController;
use App\Http\Controllers\SuperAdmin\ContactsController;
use App\Http\Controllers\SuperAdmin\PostsController;
use App\Http\Controllers\SuperAdmin\ArchivesController;
use App\Http\Controllers\SuperAdmin\PodcastsController;
use App\Http\Controllers\SuperAdmin\BroadcastsController;
use App\Http\Controllers\SuperAdmin\BroadcastCategoriesController;
use App\Http\Controllers\SuperAdmin\EventCategoriesController;
use App\Http\Controllers\SuperAdmin\PodcastCategoriesController;
use App\Http\Controllers\SuperAdmin\BookedAppointmentsController;
use App\Http\Controllers\SuperAdmin\CurruncyController;
use App\Http\Controllers\SuperAdmin\GatewaysController;
//Clinic
use App\Http\Controllers\SuperAdmin\ClinicCategoriesController;
use App\Http\Controllers\SuperAdmin\ClinicMainCategoriesController;
use App\Http\Controllers\SuperAdmin\ClinicsController;
use App\Http\Controllers\SuperAdmin\ClinicPostsController;
use App\Http\Controllers\SuperAdmin\ClinicEventsController;
use App\Http\Controllers\SuperAdmin\ClinicCertificationsController;
use App\Http\Controllers\SuperAdmin\ClinicBroadcastsController;
use App\Http\Controllers\SuperAdmin\ClinicPodcastsController;
use App\Http\Controllers\SuperAdmin\ClinicArchivesController;
use App\Http\Controllers\SuperAdmin\BankAccountsController;
use App\Http\Controllers\SuperAdmin\BankTransactionsController;
use App\Http\Controllers\SuperAdmin\CommissionSettingsController;
use App\Http\Controllers\SuperAdmin\DiseaseController;
use App\Http\Controllers\SuperAdmin\NotificationSettingsController;
//Clinic
//Doctor
use App\Http\Controllers\SuperAdmin\DoctorPostsController;
use App\Http\Controllers\SuperAdmin\DoctorEventsController;
use App\Http\Controllers\SuperAdmin\DoctorEducationsController;
use App\Http\Controllers\SuperAdmin\DoctorExperiencesController;
use App\Http\Controllers\SuperAdmin\DoctorCertificationsController;
use App\Http\Controllers\SuperAdmin\DoctorBroadcastsController;
use App\Http\Controllers\SuperAdmin\DoctorPodcastsController;
use App\Http\Controllers\SuperAdmin\DoctorArchivesController;
use App\Http\Controllers\SuperAdmin\DoctorCategoriesController;
use App\Http\Controllers\SuperAdmin\DoctorMainCategoriesController;
use App\Http\Controllers\SuperAdmin\DoctorsController;
use App\Http\Controllers\SuperAdmin\PatientHealthController;
use App\Http\Controllers\SuperAdmin\PaymentMethodsController;
use App\Http\Controllers\SuperAdmin\ReviewsController;
use App\Http\Controllers\SuperAdmin\ServiceCategoriesController;
use App\Http\Controllers\SuperAdmin\ServicesController;
use App\Http\Controllers\SuperAdmin\TestController;
use App\Http\Controllers\SuperAdmin\VersionUpgradesController;
use App\Http\Controllers\SuperAdmin\WithdrawRequestsController;
//Doctor

use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->prefix('super_admin')->name('super_admin.')->group(function () {
    Route::post('login', [LoginController::class, 'login'])->name('submit_login');
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('reset_password', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset_password');
    Route::get('forgot_password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot_password');
    Route::post('submit_reset_password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('submit_reset_password');
    Route::post('submit_forgot_password', [ForgotPasswordController::class, 'submitForgotPasswordForm'])->name('submit_forgot_password');
});

Route::middleware(['auth', 'super_admin'])->prefix('super_admin')->name('super_admin.')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'home'])->name('dashboard');
    Route::resource('users', UsersController::class);
    Route::crudRoutes('patients', PatientsController::class);
    Route::crudRoutes('doctors', DoctorsController::class);
    Route::get('doctors/blogs/{doctor}', [DoctorsController::class, 'viewBlogs'])->name('doctors.blog');
    Route::get('doctors/events/{doctor}', [DoctorsController::class, 'viewEvents'])->name('doctors.event');
    Route::put('doctors/{doctor}/approve', [DoctorsController::class, 'approve'])->name('doctors.approve');
    Route::put('doctors-bulk/{type}', [DoctorsController::class, 'bulkActionDoctors'])->name('doctors.bulk');
    Route::crudRoutes('clinics', ClinicsController::class);
    Route::put('clinics/{clinic}/approve', [ClinicsController::class, 'approve'])->name('clinics.approve');
    Route::put('clinics-bulk/{type}', [ClinicsController::class, 'bulkActionClinics'])->name('clinics.bulk');
    Route::crudRoutes('events', EventsController::class);
    Route::put('events/{event}/approve', [EventsController::class, 'approve'])->name('events.approve');

    Route::crudRoutes('tests', TestController::class);
    Route::crudRoutes('patient_healths', PatientHealthController::class);
    Route::crudRoutes('diseases', DiseaseController::class);
    Route::crudRoutes('tags', TagsController::class);
    Route::crudRoutes('testimonials', TestimonialsController::class);
    Route::crudRoutes('company_pages', CompanyPagesController::class);
    Route::crudRoutes('doctor_categories', DoctorCategoriesController::class);
    Route::crudRoutes('doctor_main_categories', DoctorMainCategoriesController::class);
    Route::crudRoutes('clinic_categories', ClinicCategoriesController::class);
    Route::crudRoutes('clinic_main_categories', ClinicMainCategoriesController::class);
    Route::crudRoutes('blog_categories', BlogCategoriesController::class);
    Route::crudRoutes('event_categories', EventCategoriesController::class);
    Route::crudRoutes('faq_categories', FAQCategoriesController::class);
    Route::crudRoutes('podcast_categories', PodcastCategoriesController::class);
    Route::crudRoutes('broadcast_categories', BroadcastCategoriesController::class);
    Route::crudRoutes('faqs', FAQSController::class);
    Route::crudRoutes('posts', PostsController::class);
    Route::crudRoutes('archives', ArchivesController::class);
    Route::crudRoutes('booked_appointments', BookedAppointmentsController::class);
    Route::crudRoutes('podcasts', PodcastsController::class);
    Route::crudRoutes('broadcasts', BroadcastsController::class);


    Route::dependentCrudRoutes('doctor_posts/{doctor}', DoctorPostsController::class);
    Route::dependentCrudRoutes('doctor_events/{doctor}', DoctorEventsController::class);
    Route::dependentCrudRoutes('doctor_educations/{doctor}', DoctorEducationsController::class);
    Route::dependentCrudRoutes('doctor_experiences/{doctor}', DoctorExperiencesController::class);
    Route::dependentCrudRoutes('doctor_certifications/{doctor}', DoctorCertificationsController::class);
    Route::dependentCrudRoutes('doctor_broadcasts/{doctor}', DoctorBroadcastsController::class);
    Route::dependentCrudRoutes('doctor_podcasts/{doctor}', DoctorPodcastsController::class);
    Route::dependentCrudRoutes('doctor_archives/{doctor}', DoctorArchivesController::class);

    //Law firm
    Route::dependentCrudRoutes('clinic_posts/{clinic}', ClinicPostsController::class);
    Route::dependentCrudRoutes('clinic_events/{clinic}', ClinicEventsController::class);
    // Route::dependentCrudRoutes('clinic_educations/{clinic}', ClinicEducationsController::class);
    // Route::dependentCrudRoutes('clinic_experiences/{clinic}', ClinicExperiencesController::class);
    Route::dependentCrudRoutes('clinic_certifications/{clinic}', ClinicCertificationsController::class);
    Route::dependentCrudRoutes('clinic_broadcasts/{clinic}', ClinicBroadcastsController::class);
    Route::dependentCrudRoutes('clinic_podcasts/{clinic}', ClinicPodcastsController::class);
    Route::dependentCrudRoutes('clinic_archives/{clinic}', ClinicArchivesController::class);

    Route::prefix('doctors')->name('doctors.')->group(function () {
        Route::get('profile/{doctor}', [DoctorsController::class, 'profile'])->name('profile');
    });
    Route::prefix('clinics')->name('clinics.')->group(function () {
        Route::get('profile/{clinic}', [ClinicsController::class, 'profile'])->name('profile');
    });

    Route::crudRoutes('bank_accounts', BankAccountsController::class);
    Route::crudRoutes('bank_transactions', BankTransactionsController::class);
    Route::put('bank_transactions/{bank_transaction}/approve', [BankTransactionsController::class, 'approve'])->name('bank_transactions.approve');
    Route::put('bank_transactions-bulk/{type}', [BankTransactionsController::class, 'approveapprove'])->name('bank_transactions.bulk');

    Route::crudRoutes('archive_categories', ArchiveCategoriesController::class);
    Route::crudRoutes('languages', LanguagesController::class);
    Route::crudRoutes('countries', CountriesController::class);
    Route::crudRoutes('states', StatesController::class);
    Route::crudRoutes('cities', CitiesController::class);
    Route::get('cities_states', [AJAXController::class, 'getStatesByCountry'])->name('getStatesByCountry');

    Route::crudRoutes('pricing_plans', PricingPlansController::class);
    Route::post('pricing_plans_syn', [PricingPlansController::class, 'syncPlans'])->name('pricing_plans.sync');

    Route::get('commission', [CommissionSettingsController::class, 'index'])->name('commission.index');
    Route::post('commission', [CommissionSettingsController::class, 'commissionUpdate'])->name('commission.update');

    Route::get('version', [VersionUpgradesController::class, 'index'])->name('version_upgrade.index');
    Route::post('version_upgrade', [VersionUpgradesController::class, 'upgrade'])->name('version_upgrade.upgrade');

    // General Settings route
    Route::get('general_settings', [GeneralSettingsController::class, 'index'])->name('general_settings.index');
    Route::get('social_media_settings', [GeneralSettingsController::class, 'getSocialLinksSettings'])->name('specific_settings.social_media_settings');
    Route::get('payment_method_settings', [GeneralSettingsController::class, 'getPaymentMethodsSettings'])->name('specific_settings.payment_method_settings');
    Route::get('footer_settings', [GeneralSettingsController::class, 'getFooterSettings'])->name('specific_settings.footer_settings');
    Route::get('configurations', [GeneralSettingsController::class, 'getconfigurationsSettings'])->name('specific_settings.configurations');
    Route::get('home_page_statistics_settings', [GeneralSettingsController::class, 'getHomePageStatisticsSettings'])->name('specific_settings.home_page_statistics_settings');

    Route::put('general_settings', [GeneralSettingsController::class, 'update'])->name('general_settings.update');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('roles', RolesController::class);
    Route::get('get_permissions_except_role', [RolesController::class, 'getPermissionsExceptRole'])->name('getPermissionsExceptRole');
    Route::get('view_notifications/{type}', [DashboardController::class, 'viewNotification'])->name('viewNotifications');

    // Content Pages
    Route::get('pages_contents/{section}', [PagesContentsController::class, 'getPageContent'])->name('pages_contents.get');
    Route::put('pages_contents', [PagesContentsController::class, 'update'])->name('pages_contents.update');

    //Contact
    Route::crudRoutes('contacts', ContactsController::class);


    Route::crudRoutes('gateways', GatewaysController::class);
    Route::crudRoutes('currencies', CurruncyController::class);
    Route::crudRoutes('withdraw_requests', WithdrawRequestsController::class);
    Route::resource('notification_settings', NotificationSettingsController::class);

    // Quick By Services
    Route::crudRoutes('service_categories', ServiceCategoriesController::class);
    Route::crudRoutes('reviews', ReviewsController::class);
    Route::crudRoutes('services', ServicesController::class);
    Route::put('services/{service}/approve', [ServicesController::class, 'approve'])->name('services.approve');
    Route::put('services-bulk/{type}', [ServicesController::class, 'bulkActionServices'])->name('services.bulk');


    // Route::get('payment-methods', 'Admin\PaymentMethodController@index')->name('payment.methods');
    // Route::post('payment-methods/deactivate', 'Admin\PaymentMethodController@deactivate')->name('payment.methods.deactivate');
    // Route::get('payment-methods/deactivate', 'Admin\PaymentMethodController@deactivate')->name('payment.methods.deactivate');
    // Route::post('sort-payment-methods', 'Admin\PaymentMethodController@sortPaymentMethods')->name('sort.payment.methods');
    // Route::get('payment-methods/edit/{id}', 'Admin\PaymentMethodController@edit')->name('edit.payment.methods');
    // Route::put('payment-methods/update/{id}', 'Admin\PaymentMethodController@update')->name('update.payment.methods');
});
