<template>
    <app-layout title="Appointment Log Detail">
        <template #default>
            <doctor-appointment-detail v-if="$page.props.auth.logged_in_as == 'doctor'"
                :appointment="appointment" :gateway="gateway"></doctor-appointment-detail>
            <clinic-appointment-detail v-if="$page.props.auth.logged_in_as == 'clinic'"
                :appointment="appointment" :gateway="gateway"></clinic-appointment-detail>
            <patient-appointment-detail v-if="$page.props.auth.logged_in_as == 'patient'"
                :appointment="appointment" :gateway="gateway"></patient-appointment-detail>
        </template>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import DoctorAppointmentDetail from "@/Components/Doctors/AppointmentLogs/AppointmentLogDetail.vue";
import ClinicAppointmentDetail from "@/Components/Clinics/AppointmentLogs/AppointmentLogDetail.vue";
import PatientAppointmentDetail from "@/Components/Patients/PatientAppointmentDetail.vue";

export default defineComponent({
    components: {
        AppLayout,
        Navbar,
        PageHeader,
        DoctorAppointmentDetail,
        PatientAppointmentDetail,
        ClinicAppointmentDetail,
    },
    props: ["appointment","gateway"],
    created() { },
});
</script>
