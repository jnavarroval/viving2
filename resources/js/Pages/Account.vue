<template>
  <app-layout title="My Profile">
    <template #header>
      <!-- <page-header >
    My Profile
    </page-header> -->
    </template>
    <template #default>
      <doctor-account v-if="$page.props.auth.logged_in_as == 'doctor'"></doctor-account>
      <patient-account
        v-if="$page.props.auth.logged_in_as == 'patient'"
      ></patient-account>
      <clinic-account v-if="$page.props.auth.logged_in_as == 'clinic'"></clinic-account>
    </template>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import DoctorAccount from "@/Components/Doctors/DoctorAccount.vue";
import PatientAccount from "@/Components/Patients/PatientAccount.vue";
import ClinicAccount from "@/Components/Clinics/ClinicAccount.vue";

export default defineComponent({
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    DoctorAccount,
    PatientAccount,
    ClinicAccount,
  },
});
</script>
