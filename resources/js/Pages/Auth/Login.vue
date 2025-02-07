<template>
  <guest-layout>
    <div class="container-fluid px-0" style="height: 100vh">
      <div class="row">
        <div class="col-md-6">
          <img
            class="login-image"
            src="@/images/common/login.png"
            alt="Image"
          />
        </div>
        <div class="col-md-6">
          <div class="py-5 form-content">
            <span class="d-flex justify-content-center mt-2">
              <Link :href="route('home')">
                <img
                  v-if="$page.props && $page.props.settings && $page.props.settings.logo"
                  style="width: 250px"
                  :src="$page.props.settings.logo"
                  alt="logo"
                /> 
              </Link>
            </span>

            <h1 class="text-center pt-4 display-1 text-primary fw-bold">
              {{ __("Hi") }}, {{ __("welcome back") }}!
            </h1>
            <h3 class="text-center fs-1 fw-normal text-black">
              {{ __("Login into your account") }}
            </h3>
            <!-- <ul
              class="nav gap-3 my-5 nav-tabs login-btn justify-content-center"
              id="myTab"
              role="tablist"
            >
              <li class="nav-item" role="presentation">
                <button
                  class="btn rounded-3 shadow-none btn-outline-primary"
                  :class="{ active: tab === 'patient' }"
                  @click.prevent="changeTab('patient', 0)"
                  id="patient-login-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#patient-login-pane"
                  type="button"
                  role="tab"
                  aria-controls="patient-login-pane"
                  aria-selected="true"
                >
                  {{ __("Login as Patient") }}
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="btn rounded-3 shadow-none btn-outline-primary"
                  :class="{ active: tab === 'doctor' }"
                  @click.prevent="changeTab('doctor', 1)"
                  id="doctor-login-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#doctor-login-pane"
                  type="button"
                  role="tab"
                  aria-controls="doctor-login-pane"
                  aria-selected="false"
                >
                  {{ __("Login as Doctor") }}
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="btn rounded-3 shadow-none btn-outline-primary"
                  :class="{ active: tab === 'clinic' }"
                  @click.prevent="changeTab('clinic', 2)"
                  id="clinic-login-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#clinic-login-pane"
                  type="button"
                  role="tab"
                  aria-controls="clinic-login-pane"
                  aria-selected="false"
                >
                  {{ __("Login as Clinic") }}
                </button>
              </li>
            </ul> -->
            <div class="tab-content mx-3 m-md-5" id="myTabContent">
              <patient-login
                :active="tab === 'patient'"
                :redirect_url="redirect_url"
              ></patient-login>
              <doctor-login :active="tab === 'doctor'"></doctor-login>
              <clinic-login :active="tab === 'clinic'"></clinic-login>
            </div>
          </div>
        </div>
      </div>
    </div>
  </guest-layout>
</template>

<script>
import { defineComponent, ref } from "vue";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import Checkbox from "@/Components/Checkbox.vue";
import Label from "@/Components/Label.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import PatientLogin from "@/Components/Patients/PatientLogin.vue";
import DoctorLogin from "@/Components/Doctors/DoctorLogin.vue";
import ClinicLogin from "@/Components/Clinics/ClinicLogin.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { Carousel, Navigation, Pagination, Slide } from "vue3-carousel";
import simplebar from "simplebar-vue";
import "simplebar-vue/dist/simplebar.min.css";

export default defineComponent({
  components: {
    Head,
    AuthenticationCard,
    AuthenticationCardLogo,
    Button,
    Input,
    Checkbox,
    simplebar,
    Label,
    AppLayout,
    ValidationErrors,
    PatientLogin,
    DoctorLogin,
    ClinicLogin,
    GuestLayout,
    Link,
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
    redirect_url: String,
  },

  setup() {
    const tab = ref(route().params.tab ?? "patient");

    return {
      tab: route().params.tab ?? "patient",
      currentSlide: ref(0),
      settings: {
        itemsToShow: 1,
        snapAlign: "center",
        autoplay: false,
        wrapAround: "true",
      },
      // breakpoints are mobile first
      // any settings not specified will fallback to the carousel settings
      breakpoints: {
        // 1024 and up
        1024: {
          itemsToShow: 1,
          snapAlign: "center",
        },
      },
    };
  },
  created() {
    this.tab = route().params.tab ?? "patient";
  },

  methods: {
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
