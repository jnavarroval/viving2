<template>
  <app-layout title="Appointment Log">
    <template #default>
      <doctor-appointment
        v-if="$page.props.auth.logged_in_as == 'doctor'"
        :appointment_status="appointment_status"
      ></doctor-appointment>
      <clinic-appointment
        v-if="$page.props.auth.logged_in_as == 'clinic'"
        :appointment_status="appointment_status"
      ></clinic-appointment>
      <patient-appointment
        v-if="$page.props.auth.logged_in_as == 'patient'"
        :appointment_status="appointment_status"
      ></patient-appointment>
    </template>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import DoctorAppointment from "@/Components/Doctors/AppointmentLogs/AppointmentLogs.vue";
import ClinicAppointment from "@/Components/Clinics/AppointmentLogs/AppointmentLogs.vue";
import PatientAppointment from "@/Components/Patients/PatientAppointment.vue";

export default defineComponent({
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    DoctorAppointment,
    ClinicAppointment,
    PatientAppointment,
  },
  props: ["appointment_status"],
  created() {},
});
</script>
