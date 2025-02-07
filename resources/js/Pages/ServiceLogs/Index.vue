<template>
  <app-layout title="Service Log">
    <template #default>
      <doctor-service-logs
        v-if="$page.props.auth.logged_in_as == 'doctor'"
        :service_statuses="service_statuses"
      ></doctor-service-logs>
      <clinic-service-logs
        v-if="$page.props.auth.logged_in_as == 'clinic'"
        :service_statuses="service_statuses"
      ></clinic-service-logs>
      <patient-service-logs
        v-if="$page.props.auth.logged_in_as == 'patient'"
        :service_statuses="service_statuses"
      ></patient-service-logs>
    </template>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import DoctorServiceLogs from "@/Components/Doctors/ServiceLogs/ServiceLogs.vue";
import ClinicServiceLogs from "@/Components/Clinics/ServiceLogs/ServiceLogs.vue";
import PatientServiceLogs from "@/Components/Patients/ServiceLogs/ServiceLogs.vue";

export default defineComponent({
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    DoctorServiceLogs,
    ClinicServiceLogs,
    PatientServiceLogs,
  },
  props: ["service_statuses"],
  created() {},
});
</script>
