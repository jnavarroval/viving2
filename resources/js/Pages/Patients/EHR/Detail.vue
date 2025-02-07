<template>
  <app-layout title="Pricing Plan">
    <div class="stats">
      <div class="bg-primary">
        <pages-heading
          :textwhite="'true'"
          :heading="'EHR Detail'"
          :breadcrums="breadcrums"
        ></pages-heading>
      </div>
      <div class="container p-6">
        <div class="row">
          <div class="col-md-12 mb-6">
            <div class="card rounded-6 p-md-5 p-3" style="background-color: #e5f0f9">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-md-7 border-end border-primary">
                    <h1 class="text-seconary fs-custom-1 fw-bold mb-4">
                      {{ appointment_disease.name }}
                    </h1>
                    <p class="subheading-fs" v-html="appointment_disease.description"></p>
                  </div>
                  <div class="col-md-5">
                    <div class="d-flex align-items-center justify-content-md-center">
                      <div
                        class="rounded-circle ms-1 overflow-hidden"
                        style="width: 105px; height: 105px"
                      >
                        <img
                          :src="appointment.doctor_image"
                          class="img-fluid"
                          alt="image"
                        />
                      </div>
                      <div class="d-flex flex-column ms-4">
                        <h5 class="fw-normal text-black fs-1">
                          {{ appointment.doctor_name }}
                        </h5>
                        <h5 class="fs-2 fw-medium mb-0" style="color: #817b7b"></h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6 mb-5">
                <div
                  class="card bg-white h-100 overflow-hidden shadow rounded-5 px-md-3 py-2"
                >
                  <div class="card-body p-3">
                    <div
                      class="d-flex align-items-center justify-content-between mb-5 mt-4"
                    >
                      <h5 class="fw-bold fs-3 text-black text-capitalize mb-0">
                        {{ __("patient health") }}
                      </h5>
                      <div class="d-flex align-items-center justify-content-around px-2">
                        <img src="@/images/icons/Date_range.svg" alt="" />
                        <h4 class="fs-4 mb-0 text-black opacity-75 fw-normal ms-3">
                          {{ appointment.date }}
                        </h4>
                      </div>
                    </div>
                    <div v-if="appointment.patient_healths.length > 0">
                      <div
                        v-for="(disease, index) in appointment.patient_healths"
                        :key="index"
                        class="d-flex align-items-center justify-content-between stats radius-15 py-3 px-4 mb-3"
                      >
                        <h3 class="subheading-fs mb-0">{{ disease.name }}</h3>
                        <span class="subheading-fs mb-0">{{ disease.value }}</span>
                      </div>
                    </div>

                    <div v-else>{{ __("patient health not found") }}</div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-5">
                <div
                  class="card bg-white h-100 overflow-hidden shadow rounded-5 px-md-3 py-2"
                >
                  <div class="card-body p-3">
                    <div
                      class="d-flex align-items-center justify-content-between mb-5 mt-4"
                    >
                      <h5 class="fw-bold fs-3 text-black text-capitalize mb-0">
                        {{ __("Diseases Test Reports") }}
                      </h5>
                      <div class="d-flex align-items-center justify-content-around px-2">
                        <img src="@/images/icons/Date_range.svg" alt="" />
                        <h4 class="fs-4 mb-0 text-black opacity-75 fw-normal ms-3">
                          {{ appointment.date }}
                        </h4>
                      </div>
                    </div>
                    <div v-if="appointment.tests.length > 0">
                      <div
                        v-for="(appointment, index) in appointment.tests"
                        :key="index"
                        class="d-flex align-items-center justify-content-between stats radius-15 py-3 px-4 mb-3"
                      >
                        <div class="d-flex align-items-center">
                          <img src="@/images/icons/File_dock.svg" alt="document-file" />
                          <h3 class="subheading-fs mb-0 ms-2">
                            {{ appointment.name }}
                          </h3>
                        </div>
                        <button @click.prevent="downloadPdf()" style="border: none">
                          <img src="@/images/icons/eye.svg" alt="" />
                        </button>
                      </div>
                    </div>
                    <div v-else>
                      {{ __("test not found") }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-5">
                <div
                  class="card bg-white h-100 overflow-hidden shadow rounded-5 px-md-3 py-2"
                >
                  <div class="card-body p-3">
                    <div
                      class="d-flex align-items-center justify-content-between mb-5 mt-4"
                    >
                      <h5 class="fw-bold fs-3 text-black text-capitalize mb-0">
                        {{ __("Recommended Medicine") }}
                      </h5>
                      <div class="d-flex align-items-center justify-content-around px-2">
                        <img src="@/images/icons/Date_range.svg" alt="" />
                        <h4 class="fs-4 mb-0 text-black opacity-75 fw-normal ms-3">
                          {{ appointment.date }}
                        </h4>
                      </div>
                    </div>
                    <div v-if="appointment.medicines.length > 0">
                      <div
                        v-for="(ele, index) in appointment.medicines"
                        :key="index"
                        class="d-flex flex-md-row flex-column align-items-md-center justify-content-between stats radius-15 py-3 px-3 mb-3"
                      >
                        <h3 class="subheading-fs mb-0">
                          <span class="fw-bold">{{ __("Tab:") }}</span
                          >{{ ele.name }}
                        </h3>
                        <span class="subheading-fs mb-0">{{ ele.dosage }}</span>
                        <span class="subheading-fs mb-0">{{ ele.duration }}</span>
                        <span class="subheading-fs mb-0"
                          >{{ ele.frequency }}/day - {{ ele.duration }}</span
                        >
                      </div>
                    </div>

                    <div v-else>
                      {{ __("medicines is not found") }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-5">
                <div
                  class="card bg-white h-100 overflow-hidden shadow rounded-5 px-md-3 py-2"
                >
                  <div class="card-body p-3">
                    <div
                      class="d-flex align-items-center justify-content-between mb-5 mt-4"
                    >
                      <h5 class="fw-bold fs-3 text-black text-capitalize mb-0">
                        <!-- {{ appointment.prescription}} -->

                        {{ __("Prescription for Fever") }}
                        <!-- {{ __("prescription for fever") }} -->
                      </h5>
                      <div class="d-flex align-items-center justify-content-around px-2">
                        <img src="@/images/icons/Date_range.svg" alt="" />
                        <h4 class="fs-4 mb-0 text-black opacity-75 fw-normal ms-3">
                          {{ appointment.date }}
                        </h4>
                      </div>
                    </div>

                    <div
                      class="d-flex align-items-center justify-content-between stats radius-15 py-3 px-4 mb-3"
                    >
                      <div
                        v-if="
                          appointment.prescription && appointment.prescription != null
                        "
                      >
                        <p class="subheading-fs">
                          {{ appointment.prescription }}
                        </p>
                      </div>
                      <div>
                        {{ __("no Prescription found") }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import PageHeader from "@/Components/PageHeader.vue";
import PagesHeading from "@/Components/PagesHeading.vue";
import { Link } from "@inertiajs/inertia-vue3";
import axios from "axios";
export default defineComponent({
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    PagesHeading,
    Link,
  },
  props: ["appointment", "appointment_disease"],

  data() {
    return {
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
        {
          id: 3,
          name: this.__("EHR"),
          link: "#",
        },
      ],
    };
  },

  created() {},
  methods: {
    downloadPdf() {
      const data = {
        appointment_id: this.appointment.id,
      };

      axios
        .post(route("patients.appointment.pdf.download"), data, {
          responseType: "blob", // Important for handling PDF files
        })
        .then((response) => {
          const url = window.URL.createObjectURL(new Blob([response.data]));
          const link = document.createElement("a");
          link.href = url;
          link.setAttribute("download", "appointment_report.pdf");
          document.body.appendChild(link);
          link.click();
        })
        .catch((error) => {
          console.error("Error downloading the PDF:", error);
        });
    },
  },
});
</script>
