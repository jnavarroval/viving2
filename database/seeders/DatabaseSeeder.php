<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(AllLanguagesTableSeeder::class);
        $this->call(AppointmentRatingsTableSeeder::class);
        $this->call(AppointmentScheduleSlotsTableSeeder::class);
        $this->call(AppointmentSchedulesTableSeeder::class);
        $this->call(AppointmentStatusesTableSeeder::class);
        $this->call(AppointmentTypesTableSeeder::class);
        $this->call(ArchiveCategoriesTableSeeder::class);
        $this->call(ArchiveTagTableSeeder::class);
        $this->call(ArchivesTableSeeder::class);
        $this->call(BlogCategoriesTableSeeder::class);
        $this->call(BookedAppointmentsTableSeeder::class);
        $this->call(BroadcastCategoriesTableSeeder::class);
        $this->call(BroadcastTagTableSeeder::class);
        $this->call(BroadcastsTableSeeder::class);
        $this->call(CertificationsTableSeeder::class);
        $this->call(ChangeLogsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(CompanyPagesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(PatientsTableSeeder::class);
        $this->call(EventCategoriesTableSeeder::class);
        $this->call(EventSponsersTableSeeder::class);
        $this->call(EventTagTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(FaqCategoriesTableSeeder::class);
        $this->call(FaqsTableSeeder::class);
        $this->call(GeneralSettingsTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(ClinicCategoriesTableSeeder::class);
        $this->call(ClinicCategoryTableSeeder::class);
        $this->call(ClinicLanguageTableSeeder::class);
        $this->call(ClinicMainCategoriesTableSeeder::class);
        $this->call(ClinicReviewsTableSeeder::class);
        $this->call(ClinicSettingsTableSeeder::class);
        $this->call(ClinicTagTableSeeder::class);
        $this->call(ClinicsTableSeeder::class);
        $this->call(DoctorCategoriesTableSeeder::class);
        $this->call(DoctorCategoryTableSeeder::class);
        $this->call(DoctorEducationsTableSeeder::class);
        $this->call(DoctorExperiencesTableSeeder::class);
        $this->call(DoctorLanguageTableSeeder::class);
        $this->call(DoctorMainCategoriesTableSeeder::class);
        $this->call(DoctorPaymentsHistoryTableSeeder::class);
        $this->call(DoctorReviewsTableSeeder::class);
        $this->call(DoctorSettingsTableSeeder::class);
        $this->call(DoctorTagTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(MediaCategoriesTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(OauthAccessTokensTableSeeder::class);
        $this->call(OauthAuthCodesTableSeeder::class);
        $this->call(OauthClientsTableSeeder::class);
        $this->call(OauthPersonalAccessClientsTableSeeder::class);
        $this->call(OauthRefreshTokensTableSeeder::class);
        $this->call(PagesContentsTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(PersonalAccessTokensTableSeeder::class);
        $this->call(PodcastCategoriesTableSeeder::class);
        $this->call(PodcastTagTableSeeder::class);
        $this->call(PodcastsTableSeeder::class);
        $this->call(PostTagTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PricingPlanModuleTableSeeder::class);
        $this->call(PricingPlanModulesTableSeeder::class);
        $this->call(PricingPlansTableSeeder::class);
        $this->call(RolePermissionTableSeeder::class);
        $this->call(RolePermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SessionsTableSeeder::class);
        $this->call(SocialAccountsTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(SubscriptionItemsTableSeeder::class);
        $this->call(SubscriptionsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(CurrencyCodesTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(TransfersTableSeeder::class);
        $this->call(WalletsTableSeeder::class);
        $this->call(WithdrawRequestsTableSeeder::class);
        $this->call(GatewaysTableSeeder::class);
        $this->call(CommissionsTableSeeder::class);
        $this->call(FundsTableSeeder::class);
        $this->call(AppointmentDiseaseTableSeeder::class);
        $this->call(AppointmentMedicinesTableSeeder::class);
        $this->call(AppointmentPatientHealthsTableSeeder::class);
        $this->call(AppointmentTestTableSeeder::class);
        $this->call(BankAccountsTableSeeder::class);
        $this->call(BookedServicesTableSeeder::class);
        $this->call(CustomNotificationsTableSeeder::class);
        $this->call(DiseasesTableSeeder::class);
        $this->call(FundBankTransfersTableSeeder::class);
        $this->call(InAppNotificationsTableSeeder::class);
        $this->call(MedicalTestsTableSeeder::class);
        $this->call(NotificationSettingsTableSeeder::class);
        $this->call(PatientHealthsTableSeeder::class);
        $this->call(ServiceCategoriesTableSeeder::class);
        $this->call(ServiceFaqsTableSeeder::class);
        $this->call(ServiceRatingsTableSeeder::class);
        $this->call(ServiceReviewsTableSeeder::class);
        $this->call(ServiceStatusesTableSeeder::class);
        $this->call(ServiceTagTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(TestsTableSeeder::class);
    }
}
