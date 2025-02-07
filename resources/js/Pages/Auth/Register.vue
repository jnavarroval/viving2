<template>
  <guest-layout>
    <!-- <div v-if="!selected_role">
      <select-role
        @selectRole="
          (role) => {
            selected_role = role;
          }
        "
      ></select-role>
    </div> -->
    <div class="container-fluid px-0">
      <div class="row">
        <div class="col-md-12">
          <div class="row h-100">
            <div class="col-md-6">
              <img class="login-image" src="@/images/common/login.png" alt="" />
            </div>
            <div class="col-md-6">
              <div class="py-5 form-content">
                <div class="d-flex justify-content-center mt-2">
                  <Link :href="route('home')">
                    <img
                      v-if="$page.props && $page.props.settings && $page.props.settings.logo"
                      style="width: 250px"
                      :src="$page.props.settings.logo"
                      alt="logo"
                    /> 
                  </Link>
                </div>

                <h1 class="text-center pt-4 display-1 text-primary fw-bold">
                  {{ __("Register yourself") }}
                </h1>
                <h3 class="text-center fs-1 fw-semibold text-black">
                  {{ __("Create your account") }}
                </h3>
                <ul
                  class="nav gap-3 my-5 nav-tabs justify-content-center"
                  id="myTab"
                  role="tablist"
                >
                  <li class="nav-item" role="presentation">
                    <button
                      class="btn rounded-3 btn-outline-primary border-secondary border-1"
                      :class="{ active: tab == 'patient' }"
                      @click.prevent="changeTab('patient', 0)"
                      id="patient-register-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#patient-register-pane"
                      type="button"
                      role="tab"
                      aria-controls="patient-register-pane"
                      aria-selected="true"
                    >
                      {{ __("Register as Patient") }}
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="btn rounded-3 btn-outline-primary border-secondary border-1"
                      :class="{ active: tab == 'doctor' }"
                      @click.prevent="changeTab('doctor', 1)"
                      id="doctor-register-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#doctor-register-pane"
                      type="button"
                      role="tab"
                      aria-controls="doctor-register-pane"
                      aria-selected="false"
                    >
                      {{ __("Register as Doctor") }}
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="btn rounded-3 btn-outline-primary border-secondary border-1"
                      :class="{ active: tab == 'clinic' }"
                      @click.prevent="changeTab('clinic', 2)"
                      id="clinic-login-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#clinic-register-pane"
                      type="button"
                      role="tab"
                      aria-controls="clinic-register-pane"
                      aria-selected="false"
                    >
                      {{ __("Register as Clinic") }}
                    </button>
                  </li>
                </ul>

                <div class="tab-content mx-3 m-md-5" id="myTabContent">
                  <patient-register
                    :active="tab == 'patient'"
                    :redirectUrl="redirect_url"
                    :selected_role="selected_role"
                  ></patient-register>
                  <doctor-register
                    :active="tab == 'doctor'"
                    :selected_role="selected_role"
                  ></doctor-register>
                  <clinic-register
                    :active="tab == 'clinic'"
                    :selected_role="selected_role"
                  ></clinic-register>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </guest-layout>
</template>

<script>
import { defineComponent } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import Checkbox from "@/Components/Checkbox.vue";
import Label from "@/Components/Label.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import PatientRegister from "@/Components/Patients/PatientRegister.vue";
import DoctorRegister from "@/Components/Doctors/DoctorRegister.vue";
import ClinicRegister from "@/Components/Clinics/ClinicRegister.vue";

// import SelectRole from "@/Components/SelectRole.vue";

export default defineComponent({
  components: {
    GuestLayout,
    Head,
    Button,
    Input,
    Checkbox,
    Label,
    ValidationErrors,
    PatientRegister,
    DoctorRegister,
    ClinicRegister,
    Link,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
  },
  data() {
    return {
      currentSlide: 0,
      selected_role: route().params.tab ?? "patient",
    };
  },
  created() {
    this.tab = route().params.tab ?? "patient";
  },

  methods: {
    // changeTab(tab, val) {
    //   this.tab = tab;
    //     this.$inertia.replace(route("register"), {
    //       data: { tab: this.tab },
    //       preserveScroll: true,
    //     });
    //   this.slideTo(val);
    // },
    changeTab(newTab, val) {
      this.tab = newTab;
      this.slideTo(val);
      history.pushState(null, "", `?tab=${newTab}`);
    },
    slideTo(val) {
      this.currentSlide = val;
    },
  },
});
</script>
