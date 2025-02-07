<template>
  <app-layout title="Pricing Plan">
    <div class="bg-primary">
      <pages-heading
        :textwhite="'true'"
        :heading="'Electronic Health Records'"
        :breadcrums="breadcrums"
      ></pages-heading>
    </div>
    <div class="stats p-6">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card pt-4" style="background-color: #e5f0f9; border-radius: 30px">
              <div class="card-body pb-0">
                <div class="row">
                  <div class="col-md-6">
                    <h2 class="display-1 fw-bold ms-md-5 ms-2" style="color: #5f5e5e">
                      {{ $page.props.auth[$page.props.auth.logged_in_as].name }}
                    </h2>

                    <div class="d-flex gap-4">
                      <div class="d-flex flex-column ms-md-5 ms-2 mt-4 gap-3">
                        <div>
                          <h6 class="fs-3 fw-bold text-primary">
                            {{ __("Date of Birth") }}
                          </h6>
                          <h6 class="fs-3 fw-normal text-black">
                            {{
                              $page.props.auth.user.patient.dob
                                ? calculateAge($page.props.auth.user.patient.dob)
                                : "N/A"
                            }}
                            years
                          </h6>
                        </div>
                        <div>
                          <h6 class="fs-3 fw-bold text-primary">
                            {{ __("Sex Type") }}
                          </h6>
                          <h6 class="fs-3 fw-normal text-black">
                            {{
                              $page.props.auth.user.patient.gender
                                ? $page.props.auth.user.patient.gender
                                : "N/A"
                            }}
                          </h6>
                        </div>
                        <div>
                          <h6 class="fs-3 mt-4 fw-bold text-primary">
                            {{ __("Blood Group") }}
                          </h6>
                          <h6 class="fs-3 fw-normal text-black">
                            {{
                              $page.props.auth.user.patient.blood_group
                                ? $page.props.auth.user.patient.blood_group
                                : "N/A"
                            }}
                          </h6>
                        </div>
                      </div>
                      <div class="d-flex flex-column ms-md-5 ms-2 mt-4 gap-3">
                        <div>
                          <h6 class="fs-3 fw-bold text-primary">
                            {{ __("Father Name") }}
                          </h6>
                          <h6 class="fs-3 fw-normal text-black">
                            {{
                              $page.props.auth.user.patient.father_name
                                ? $page.props.auth.user.patient.father_name
                                : "N/A"
                            }}
                          </h6>
                        </div>
                        <div>
                          <h6 class="fs-3 fw-bold text-primary">
                            {{ __("email") }}
                          </h6>
                          <h6 class="fs-3 fw-normal text-black">
                            {{
                              $page.props.auth.user.email
                                ? $page.props.auth.user.email
                                : "N/A"
                            }}
                          </h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="d-flex flex-md-row flex-column">
                      <div
                        class="d-flex flex-column gap-4 justify-content-start my-4 my-md-0"
                      >
                        <div
                          class="card text-center text-primary px-5 py-4 rounded-5"
                          style="background-color: #d6e8f8"
                        >
                          <div class="d-flex flex-column">
                            <h2 class="fs-3">{{ __("Diseases") }}</h2>
                            <h1 class="display-1">
                              {{
                                patient_diseases.length ? patient_diseases.length : "0"
                              }}
                            </h1>
                          </div>
                        </div>
                        <div
                          class="card text-center text-primary px-5 py-4 rounded-5"
                          style="background-color: #d6e8f8"
                        >
                          <div class="d-flex flex-column">
                            <h2 class="fs-3">{{ __("Medication") }}</h2>
                            <h1 class="display-1">
                              {{
                                selected_prescription?.medicines.length
                                  ? selected_prescription?.medicines.length
                                  : "0"
                              }}
                            </h1>
                          </div>
                        </div>
                      </div>
                      <img class="ehr-img" src="@/images/common/half-body.png" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 text-center mt-5 mb-5">
            <h1 class="heading-fs">
              {{ __("EHR History") }}
            </h1>
            <p class="subheading-fs">
              {{
                __(
                  "Discover a wide range of online doctors, specialized in various fields, offering diverse treatments and services. Explore doctor reviews and effortlessly schedule appointments online"
                )
              }}
            </p>
          </div>
        </div>
      </div>
      <div class="container ehr-buttons">
        <div class="row bg-white rounded-4 p-3">
          <div class="col-md-12">
            <div class="row align-items-center py-4 py-md-2">
              <div class="col-md-4">
                <ul class="nav nav-pills gap-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link shadow-sm active"
                      id="pills-home-tab"
                      data-bs-toggle="pill"
                      data-bs-target="#pills-home"
                      type="button"
                      role="tab"
                      aria-controls="pills-home"
                      aria-selected="true"
                    >
                      {{ __("Diseases") }}
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link shadow-sm"
                      id="pills-profile-tab"
                      data-bs-toggle="pill"
                      data-bs-target="#pills-profile"
                      type="button"
                      role="tab"
                      aria-controls="pills-profile"
                      aria-selected="false"
                    >
                      {{ __("doctors") }}
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link shadow-sm"
                      id="pills-presciption-tab"
                      data-bs-toggle="pill"
                      data-bs-target="#pills-presciption"
                      type="button"
                      role="tab"
                      aria-controls="pills-presciption"
                      aria-selected="false"
                    >
                      {{ __("Prescription") }}
                    </button>
                  </li>
                </ul>
              </div>
              <div class="col-md-8">
                <div
                  class="d-flex mt-3 mt-md-0 align-items-center justify-content-md-end"
                >
                  <button
                    class="btn px-3 py-2 ms-0 ms-md-3 btn-primary rounded-4"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight"
                    aria-controls="offcanvasRight"
                  >
                    <img width="25" src="@/images/icons/Union.png" alt="" />
                  </button>

                  <div
                    class="offcanvas p-4 custom-offcanvas offcanvas-end"
                    tabindex="-1"
                    id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel"
                  >
                    <div
                      class="offcanvas-header flex-column align-items-start border-bottom border-2"
                    >
                      <h5 class="display-6 text-black">
                        {{ __("Filters") }}
                      </h5>
                      <p class="subheading-fs">
                        {{
                          __(
                            " Discover your ideal doctor effortlessly using these convenient filters"
                          )
                        }}
                      </p>
                    </div>
                    <div class="offcanvas-body">
                      <div class="col-md-12 d-flex flex-column gap-3">
                        <label class="fw-bold fs-2 text-black">{{
                          __("Search by Doctor")
                        }}</label>

                        <Multiselect
                          class="shadow-none border-0 bg-transparent h-100 p-2"
                          placeholder="Select Doctors"
                          v-model="form.doctor_ids"
                          mode="tags"
                          valueProp="id"
                          label="name"
                          :close-on-select="false"
                          :searchable="true"
                          :options="this.doctors"
                        />

                        <div class="col-md-12">
                          <Label class="fs-3 text-black fw-normal my-3 ms-md-4">{{
                            __("Search by Disease")
                          }}</Label>

                          <Multiselect
                            class="shadow-none border-0 bg-transparent h-100 p-2"
                            placeholder="Select Diseases"
                            v-model="form.disease_ids"
                            mode="tags"
                            valueProp="id"
                            label="name"
                            :close-on-select="false"
                            :searchable="true"
                            :options="this.diseases"
                          />
                        </div>

                        <label class="fw-bold fs-2 text-black">{{
                          __("Search by Medicine")
                        }}</label>
                        <input
                          type="text"
                          v-model="form.medicine_name"
                          class="fs-4 py-3 px-4 rounded-5 text-black input-ehr"
                          placeholder="Type here"
                        />
                        <label class="fw-bold fs-2 text-black">{{
                          __("Search by Appointment")
                        }}</label>
                        <Multiselect
                          placeholder="Select Appointment"
                          class="shadow-none border-0 bg-transparent h-100 p-2"
                          v-model="form.appointment"
                          valueProp="id"
                          label="doctor_name_with_date"
                          :close-on-select="false"
                          :searchable="true"
                          :options="this.appointments"
                        />
                      </div>
                      <div class="d-flex justify-content-center my-4 gap-4">
                        <button
                          @click="clearFilters()"
                          data-bs-dismiss="offcanvas"
                          aria-label="Close"
                          class="btn btn-primary d-flex rounded-4 fs-3 shadow-find"
                        >
                          {{ __("clear all") }}
                          <img
                            class="ms-4"
                            src="@/images/icons/group.svg"
                            alt=""
                            width="30"
                          />
                        </button>
                        <button
                          @click="submit()"
                          data-bs-dismiss="offcanvas"
                          aria-label="Close"
                          class="btn btn-secondary d-flex rounded-4 fs-3 shadow-find"
                        >
                          {{ __("search") }}
                          <img
                            class="ms-4"
                            src="@/images/icons/group.svg"
                            alt=""
                            width="30"
                          />
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
          <div
            class="tab-pane fade show"
            id="pills-presciption"
            role="tabpanel"
            aria-labelledby="pills-presciption-tab"
            tabindex="0"
          >
            <div class="container">
              <div class="row py-5">
                <div class="col-md-12 ehr-listing">
                  <div
                    class="d-flex align-items-md-center flex-md-row justify-content-between flex-column align-items-start"
                  >
                    <h2 class="fs-1 fw-bold mb-3 mb-md-0">
                      {{ __("prescription") }}
                    </h2>
                    <div class="d-flex ehr-multiselect justify-content-end">
                      <Multiselect
                        class="shadow-none h-100 p-2"
                        placeholder="Select Appointment"
                        v-model="selected_prescription_id"
                        valueProp="id"
                        label="doctor_name_with_date"
                        :close-on-select="false"
                        :searchable="true"
                        :options="prescriptions"
                        @select="changePrescription"
                      />
                    </div>
                  </div>
                  <div v-if="selected_prescription && selected_prescription.prescription">
                    <div class="bg-white rounded-20 mt-5 shadow">
                      <div
                        class="d-flex align-items-md-center gap-3 flex-md-row flex-column p-4 pb-0 justify-content-between pb-3 gap-md-0"
                      >
                        <div class="d-flex align-items-center gap-3">
                          <div style="width: 60px; height: 60px" class="rounded-circle overflow-hidden">
                            <img class="img-fluid w-100" :src="selected_prescription.doctor_image" alt="" />
                          </div>
                          <h2 class="mb-0 fs-2 fw-normal text-black">
                            {{ selected_prescription.doctor_name }}
                          </h2>
                        </div>
                        <div class="d-flex gap-3">
                          <div
                            class="d-flex align-items-center gap-2 justify-content-around px-2"
                          >
                            <img src="@/images/icons/Date_range.png" alt="" />
                            <h4 class="fs-4 mb-0 text-black opacity-50">
                              {{ getFormattedDateOnly(selected_prescription.date) }}
                            </h4>
                          </div>
                          <div class="link d-flex gap-2">
                            <Button
                              :disabled="this.selected_prescription_id == null"
                              class="text-decoration-none border-0 bg-transparent text-primary"
                              @click="downloadPdf"
                            >
                              <img src="@/images/icons/pdf.svg" alt="" />
                              {{ __("download") }}
                            </Button>
                          </div>
                        </div>
                      </div>
                      <div class="card border-0 shadow-lg rounded-20">
                        <div class="card-body px-md-5 pb-md-4 pt-md-0">
                          <div class="row">
                            <div class="col-md-4 border-end border-primary">
                              <div
                                class="pb-md-4 mt-5"
                                v-if="
                                  this.selected_prescription.tests &&
                                  this.selected_prescription.tests.length > 0
                                "
                              >
                                <h3 class="fs-2 fw-bold mb-md-5 mb-3">
                                  {{ __("the tests you needed?") }}
                                </h3>
                                <ul class="text-primary fs-3 fw-bold">
                                  <li
                                    class="mb-3"
                                    v-for="(test, index) in selected_prescription.tests"
                                    :key="index"
                                  >
                                    {{ test.name }}
                                  </li>
                                </ul>
                              </div>
                              <div
                                class="pb-4"
                                v-if="
                                  this.selected_prescription.patient_healths &&
                                  this.selected_prescription.patient_healths.length > 0
                                "
                              >
                                <h3 class="fs-2 fw-bold mb-md-5 mb-3">
                                  {{ __("patient health") }}
                                </h3>
                                <ul class="text-primary fs-3 fw-bold">
                                  <li
                                    class="mb-2"
                                    v-for="(
                                      health, index
                                    ) in selected_prescription.patient_healths"
                                    :key="index"
                                  >
                                    {{ health.name }}
                                    <h5 class="fs-3 text-paragraphcolor fw-normal mb-3">
                                      {{ health.value }}
                                    </h5>
                                  </li>
                                </ul>
                              </div>
                              <div
                                class="pb-4"
                                v-if="
                                  this.selected_prescription.diseases &&
                                  this.selected_prescription.diseases.length > 0
                                "
                              >
                                <h3 class="fs-2 fw-bold mb-md-5 mb-3">
                                  {{ __("diagnose") }}
                                </h3>
                                <ul class="text-primary fs-3 fw-bold">
                                  <li
                                    class="mb-3"
                                    v-for="(
                                      disease, index
                                    ) in selected_prescription.diseases"
                                    :key="index"
                                  >
                                    {{ disease.name }}
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="col-md-8 ps-md-0">
                              <h3 class="fs-2 fw-bold mb-md-5 ms-md-5 mt-md-5 mb-3">
                                {{ __("prescription") }}
                              </h3>
                              <div
                                class="border border-primary border-start-0 border-end-0"
                              >
                                <p class="my-3 ms-md-5 fs-3 text-paragraphcolor">
                                  {{ selected_prescription.prescription }}
                                </p>
                              </div>
                              <div
                                v-if="
                                  selected_prescription.medicines &&
                                  selected_prescription.medicines.length > 0
                                "
                                class="card shadow p-0 m-4"
                                style="background-color: #f4f9fd"
                              >
                                <div
                                  class="card-body overflow-hidden pt-1 pb-0 px-0 rounded-5"
                                >
                                  <div class="table-responsive">
                                    <table class="table table-border mb-0">
                                      <thead>
                                        <tr class="text-primary fw-bold fs-2">
                                          <th
                                            style="background-color: #f4f9fd"
                                            class="text-primary"
                                            scope="col"
                                          >
                                            {{ __("medicine name") }}
                                          </th>
                                          <th
                                            style="background-color: #f4f9fd"
                                            class="text-primary"
                                            scope="col"
                                          >
                                            {{ __("dosage") }}
                                          </th>
                                          <th
                                            style="background-color: #f4f9fd"
                                            class="text-primary"
                                            scope="col"
                                          >
                                            {{ __("frequency") }}
                                          </th>
                                        </tr>
                                      </thead>
                                      <tbody class="spacing">
                                        <tr
                                          v-for="(
                                            item, index
                                          ) in selected_prescription.medicines"
                                          :key="index"
                                          class="fw-normal fs-3 mb-3"
                                          style="
                                            color: #696868;
                                            background-color: white;
                                            height: 61px;
                                          "
                                        >
                                          <td>{{ item.name }}</td>
                                          <td>{{ item.dosage }}</td>
                                          <td>{{ item.frequency }}</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div
                        class="d-flex flex-md-row align-items-start rounded-20 p-4 gap-3 mt-5 flex-column align-items-md-center"
                        style="background-color: #e1eef5"
                      >
                        <div style="width: 60px; height: 60px" class="rounded-circle overflow-hidden">
                          <img
                            :src="selected_prescription.doctor_image"
                            class="w-100 h-100"
                            alt=""
                          />
                        </div>
                        <h2 class="mb-0 fs-2 fw-normal text-black">
                          {{ selected_prescription.doctor_address }}
                        </h2>
                      </div>
                    </div>
                  </div>
                  <div v-else>
                    <h1>{{ __("no Prescription found") }}</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade show"
            id="pills-profile"
            role="tabpanel"
            aria-labelledby="pills-profile-tab"
            tabindex="0"
          >
            <div class="container px-0">
              <div class="row mt-5" v-if="patient_doctors.length">
                <div
                  class="col-md-4 mb-3"
                  v-for="(doctor, index) in patient_doctors"
                  :key="index"
                >
                  <div
                    class="card bg-white h-100 overflow-hidden shadow-sm rounded-5 px-3 py-2"
                  >
                    <div class="card-body p-3">
                      <div class="d-flex justify-content-between">
                        <div
                          class="d-flex align-items-center justify-content-center overflow-hidden rounded-circle"
                          style="width: 100px; height: 100px; background-color: #ebf3f6"
                        >
                          <img
                            width="100"
                            height="65"
                            class="img-fluid"
                            :src="doctor.image"
                            alt="image"
                          />
                        </div>
                        <div
                          class="card-cal rounded-pill d-flex align-items-center justify-content-around px-2"
                        >
                          <img src="@/images/icons/Date_range.png" alt="" />
                          <h4 class="fs-5 mb-0 text-black opacity-50">
                            {{ getFormattedDateOnly(doctor.updated_at) }}
                          </h4>
                        </div>
                      </div>
                      <div class="d-flex flex-column">
                        <h5 class="fw-bold fs-2 text-black text-capitalize my-3">
                          {{ doctor.name }}
                        </h5>
                        <p
                          v-html="doctor.description"
                          class="mb-3 subheading-fs line-clamp"
                        ></p>
                      </div>
                      <div class="d-flex justify-content-between align-items-center">
                        <button
                          @click="selectDoctor(doctor.id)"
                          class="border-0 shadow-0 bg-transparent"
                        >
                          <img
                            src="@/images/icons/group.svg"
                            alt=""
                            width="40"
                            height="40"
                          />
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                v-else
                class="d-flex justify-content-center my-3 align-items-center fs-2 fw-bold"
              >
                {{ __("no doctor found") }}
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade show active"
            id="pills-home"
            role="tabpanel"
            aria-labelledby="pills-home-tab"
            tabindex="0"
          >
            <div class="container px-0">
              <div class="row mt-5" v-if="patient_diseases.length">
                <div
                  class="col-md-4 mb-3"
                  v-for="(patient_disease, index) in patient_diseases"
                  :key="index"
                >
                  <div
                    class="card bg-white h-100 overflow-hidden shadow-sm rounded-5 px-3 py-2"
                  >
                    <div class="card-body p-3">
                      <div class="d-flex justify-content-between">
                        <div
                          class="d-flex align-items-center justify-content-center overflow-hidden rounded-circle"
                          style="width: 100px; height: 100px; background-color: #ebf3f6"
                        >
                          <img
                            width="60"
                            height="60"
                            class="img-fluid"
                            :src="patient_disease.image"
                            alt="image"
                          />
                        </div>
                        <div
                          class="card-cal rounded-pill d-flex align-items-center justify-content-around px-2"
                        >
                          <img src="@/images/icons/Date_range.png" alt="" />
                          <h4 class="fs-5 mb-0 text-black opacity-50">
                            {{ getFormattedDateOnly(patient_disease.appointment_date) }}
                          </h4>
                        </div>
                      </div>
                      <div class="d-flex flex-column">
                        <h5 class="fw-bold fs-2 text-black text-capitalize my-3">
                          {{ patient_disease.name }}
                        </h5>
                        <p
                          v-html="patient_disease.description"
                          class="mb-3 subheading-fs line-clamp"
                        ></p>
                      </div>
                      <div class="d-flex justify-content-between align-items-center">
                        <div
                          style="width: 200px; height: 75px; background-color: #f4f9fd"
                          class="radius-15 d-flex align-items-center ps-1"
                        >
                          <div
                            class="overflow-hidden rounded-circle ms-1"
                            style="width: 60px; height: 60px"
                          >
                            <img
                              width="60"
                              height="60"
                              :src="patient_disease.appointment_doctor_image"
                              alt="image"
                            />
                          </div>
                          <div class="d-flex flex-column ms-3">
                            <h5 class="fw-normal text-black fs-4">
                              {{ patient_disease.appointment_doctor_name }}
                            </h5>
                            <h5 class="fs-5 fw-medium mb-0" style="color: #817b7b">
                              {{
                                patient_disease.appointment_doctor_speciality ?? "MBBS"
                              }}
                            </h5>
                          </div>
                        </div>

                        <a
                          :href="
                            route('patients.ehr.detail', {
                              id: patient_disease.id,
                              appointment_id: patient_disease.appointment_id,
                            })
                          "
                          class="border-0 shadow-0 bg-transparent"
                        >
                          <img
                            src="@/images/icons/group.svg"
                            alt=""
                            width="40"
                            height="40"
                          />
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                v-else
                class="d-flex justify-content-center my-3 align-items-center fs-2 fw-bold"
              >
                {{ __("no disease found") }}
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
import Multiselect from "@vueform/multiselect";

export default defineComponent({
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    PagesHeading,
    Link,
    Multiselect,
  },
  props: [
    "patient_appointments",
    "diseases",
    "patient_diseases",
    "doctors",
    "appointments",
    "patient_doctors",
    "patient_prescription",
  ],

  mounted() {
    if (this.prescriptions.length > 0) {
      this.selected_prescription = this.prescriptions[0];
      this.selected_prescription_id = this.prescriptions[0].id;
    }
  },
  data() {
    return {
      type: route().params.type,
      loading: false,
      breadcrums: [
        {
          id: 1,
          name: this.__("Home"),
          link: "/",
        },
        {
          id: 2,
          name: this.__("EHR"),
          link: "#",
        },
      ],
      prescriptions: this.$page.props.patient_appointments,
      selected_prescription: null,
      selected_prescription_id: null,
      form: this.$inertia.form({
        doctor_ids: [],
        disease_ids: [],
        appointment: route().params.appointment ? route().params.appointment : null,
        medicine_name: "",
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("patients.ehr.listing"), {
        preserveState: true,
        preserveScroll: true,
        onSuccess: (res) => {
          this.prescriptions = this.$page.props.patient_appointments;
          this.selected_prescription =
            this.prescriptions.length > 0 ? this.prescriptions[0] : null;
          this.selected_prescription_id =
            this.prescriptions.length > 0 ? this.prescriptions[0].id : null;
        },
      });
    },

    selectDoctor(id) {
      this.form.doctor_ids = [id];
      document.getElementById("pills-presciption-tab").click();
      this.submit();
    },
    changePrescription() {
      let sel_pres = this.prescriptions.find(
        (pre) => pre.id == this.selected_prescription_id
      );
      if (sel_pres) {
        this.selected_prescription = sel_pres;
      }
    },

    downloadPdf() {
      const data = {
        appointment_id: this.selected_prescription.id,
      };

      axios
        .post(route("patients.appointment.pdf.download"), data, {
          responseType: "blob",
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
    clearFilters() {
      this.form.doctor_ids = [];
      this.form.disease_ids = [];
      this.form.appointment = null;
      this.form.appointment_id = [];
      this.form.medicine_name = "";
      this.submit();
    },
  },
});
</script>
<style src="@vueform/multiselect/themes/default.css"></style>

<style scoped>
.table > :not(caption) > * > * {
  padding: 1rem 0.6rem !important;
}
</style>
