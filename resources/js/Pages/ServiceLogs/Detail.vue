<template>
  <app-layout title="Service Log Detail">
    <template #default>
      <doctor-service-detail
        v-if="$page.props.auth.logged_in_as == 'doctor'"
        :service="service"
        :gateway="gateway"
      ></doctor-service-detail>
      <clinic-service-detail
        v-if="$page.props.auth.logged_in_as == 'clinic'"
        :service="service"
        :gateway="gateway"
      ></clinic-service-detail>
      <patient-service-detail
        v-if="$page.props.auth.logged_in_as == 'patient'"
        :service="service"
        :gateway="gateway"
      ></patient-service-detail>
    </template>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import DoctorServiceDetail from "@/Components/Doctors/ServiceLogs/ServiceLogDetail.vue";
import ClinicServiceDetail from "@/Components/Clinics/ServiceLogs/ServiceLogDetail.vue";
import PatientServiceDetail from "@/Components/Patients/ServiceLogs/ServiceLogDetail.vue";

export default defineComponent({
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    DoctorServiceDetail,
    PatientServiceDetail,
    ClinicServiceDetail,
  },
  props: ["service", "gateway"],
  created() {},
});
</script>
