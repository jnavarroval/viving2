<template>
  <section>
    <div class="bg-primary">
      <pages-heading
        :textwhite="'true'"
        :heading="'My Profile'"
        :breadcrums="breadcrums"
      ></pages-heading>
    </div>
    <div class="stats">
      <div class="section py-0">
        <div class="container">
          <div class="row g-0 flex-column align-items-center">
            <div class="col-md-12 p-4">
              <!-- <div
            class="nav nav-pills patient-profile ms-4"
            id="v-pills-tab"
            role="tablist"
            aria-orientation="vertical"
          >
            <li class="nav-item me-4" role="presentation">
              <button
                class="nav-link w-100  fw-bold"
                :class="{active: active_tab == 'general-info'}"
                @click="changeTab('general-info')"
                id="general-info-tab"
                data-bs-toggle="tab"
                data-bs-target="#general-info"
                type="button"
                role="tab"
                aria-controls="general-info"
                aria-selected="true"
              >{{ __('general info') }}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="nav-link w-100 fw-bold"
                :class="{active: active_tab == 'bookings'}"
                @click="changeTab('bookings')"
                id="bookings-tab"
                data-bs-toggle="tab"
                data-bs-target="#bookings"
                type="button"
                role="tab"
                aria-controls="bookings"
                aria-selected="true"
              >{{ __n('booking') }}</button>
            </li>
        </div> -->
            </div>
            <div class="row px-0" style="margin-bottom: 150px">
              <div class="col-md-12 px-0">
                <!-- Nav tabs -->

                <div class="tab-content w-100 py-md-4" id="v-pills-tabContent">
                  <patient-general-info></patient-general-info>
                  <!-- <div v-if="active_tab == 'bookings'">
                <record-not-found :active="active_tab == 'bookings'"></record-not-found>
            </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import { defineComponent } from "vue";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import Checkbox from "@/Components/Checkbox.vue";
import PagesHeading from "@/Components/PagesHeading.vue";
import Label from "@/Components/Label.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import PatientGeneralInfo from "@/Components/Patients/PatientGeneralInfo.vue";
import Breadcrums from "../../Components/Shared/Breadcrums.vue";
import RecordNotFound from "../Shared/RecordNotFound.vue";

export default defineComponent({
  components: {
    Head,
    AuthenticationCard,
    RecordNotFound,
    AuthenticationCardLogo,
    Button,
    Input,
    Checkbox,
    Label,
    AppLayout,
    ValidationErrors,
    Link,
    PatientGeneralInfo,
    PagesHeading,
    Breadcrums,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
  },
  data() {
    return {
      active_tab: route().params.active_tab ?? "general-info",
      breadcrums: [
        {
          id: 1,
          name: this.__("Home"),
          link: "/",
        },
        {
          id: 2,
          name: this.__("Profile"),
          link: "/doctors",
        },
      ],
    };
  },

  methods: {
    changeTab(tab) {
      this.active_tab = tab;
      this.$inertia.replace(route("account"), {
        data: { active_tab: this.active_tab },
        preserveScroll: true,
      });
    },
    submit() {},
  },
});
</script>
