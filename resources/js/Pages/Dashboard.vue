<template>
  <section>
    <doctor-dashboard
      v-if="$page.props.auth.logged_in_as == 'doctor'"
      :appointments="appointments"
    ></doctor-dashboard>
    <clinic-dashboard
      v-if="$page.props.auth.logged_in_as == 'clinic'"
      :appointments="appointments"
    ></clinic-dashboard>
  </section>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import DoctorDashboard from "@/Components/Doctors/DoctorDashboard.vue";
import ClinicDashboard from "@/Components/Clinics/ClinicDashboard.vue";

export default defineComponent({
  props: ["appointments", "readNotifications", "unreadNotifications"],

  components: {
    AppLayout,
    Navbar,
    PageHeader,
    DoctorDashboard,
    ClinicDashboard,
  },
});
</script>
