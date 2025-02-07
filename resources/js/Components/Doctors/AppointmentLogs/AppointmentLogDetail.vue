<template>
  <section>
    <div class="stats">
      <div class="bg-primary">
        <pages-heading
          :textwhite="'true'"
          :heading="'appointment detail'"
          :breadcrums="breadcrums"
        ></pages-heading>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="d-flex mt-5 align-items-center justify-content-between">
              <h4 class="text-black fw-bolder fs-2">
                {{ __("your appointment summary") }}
              </h4>
              <h4
                class="badge"
                :style="{
                  backgroundColor: getBadgeBackgroundColor(
                    appointment.appointment_status_name
                  ),
                }"
              >
                {{ __(appointment.appointment_status_name) }}
              </h4>
            </div>
            <div class="card rounded-4 border-0 p-3 mt-4">
              <div class="card-body">
                <div
                  class="d-flex align-items-md-center flex-md-row flex-column justify-content-between"
                >
                  <div class="d-flex align-items-end gap-2">
                    <h6 class="fs-2 mb-md-0 fw-bold text-black">{{ __("date") }}:</h6>
                    <h6 class="fs-3 mb-md-0 fw-normal text-black opacity-50">
                      {{ appointment.date }}
                    </h6>
                  </div>
                  <div class="d-flex align-items-end gap-2" v-if="appointment.fee">
                    <h5 class="fs-2 mb-md-0 fw-bold text-black">{{ __("fee") }}:</h5>
                    <h6 class="fs-3 mb-md-0 fw-normal text-black opacity-50">
                      {{ getDisplayAmount(appointment.fee) }}
                    </h6>
                  </div>
                  <div class="d-flex align-items-end gap-2">
                    <h5
                      class="fs-2 mb-md-0 fw-bold text-black"
                      v-if="appointment.is_schedule_required"
                    >
                      {{ __("duration") }}:
                    </h5>
                    <h6 class="fs-3 mb-md-0 fw-normal text-black opacity-50">
                      {{ appointment.start_time }} -
                      {{ appointment.end_time }}
                    </h6>
                  </div>
                  <div
                    class="d-flex align-items-end gap-2"
                    v-if="appointment.patient_name"
                  >
                    <h5 class="fs-2 mb-md-0 fw-bold text-black">
                      {{ __("patient name") }}:
                    </h5>
                    <h6 class="fs-3 mb-md-0 fw-normal text-black opacity-50">
                      {{ appointment.patient_name }}
                    </h6>
                  </div>
                  <button
                    class="bg-transparent border-0 shadow-none text-primary fw-bold fs-2"
                    data-bs-toggle="modal"
                    :data-bs-target="'#summaryModel'"
                  >
                    {{ __("show") }}
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="section py-5">
        <div class="container">
          <div class="row">
            <div :class="prescription ? 'col-md-7' : 'col-md-12'">
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="row mx-0 mb-4"
                    v-if="appointment.appointment_status_code == 1"
                  >
                    <div
                      class="col-12 py-3 rounded-4 d-flex align-items-center"
                      style="background-color: #e7f3fa"
                    >
                      <div class="col-md-6">
                        <p class="fw-bold text-start mb-0 fs-3">
                          {{ __("Please accept the appointment from patient") }}
                        </p>
                      </div>
                      <div class="col-md-6 d-flex justify-content-end me-md-4">
                        <button
                          type="updatenStatus"
                          @click="updateAppointmentStatus(2)"
                          class="btn btn-primary rounded-4 me-3 px-5 fw-semibold"
                        >
                          {{ __("accept") }}
                        </button>
                        <button
                          type="button"
                          @click="updateAppointmentStatus(3)"
                          class="btn btn-danger rounded-4 px-4 px-5 fw-semibold"
                        >
                          {{ __("reject") }}
                        </button>
                      </div>
                    </div>
                  </div>
                  <div
                    v-if="
                      appointment.appointment_type_id !== 3 &&
                      appointment.appointment_type_id !== 2 &&
                      appointment.appointment_status_code == 2
                    "
                  >
                    <div v-if="is_call" class="col-md-12">
                      <h1 class="text-black text-center fs-2 mb-2">
                        Click on button to start call
                      </h1>
                      <img
                        class="img-fluid"
                        src="@/images/common/before_call.png"
                        alt=""
                      />
                    </div>
                  </div>

                  <div
                    class="row py-3 rounded-4 justify-content-center"
                    style="background-color: #e7f3fa"
                    v-if="appointment.appointment_status_code == 5"
                  >
                    <div class="col-md-12">
                      <p class="mb-0 fw-bold text-center fs-3 fw-bold text-black">
                        {{ __("appointment has been completed") }}
                      </p>
                    </div>
                  </div>

                  <div
                    v-if="
                      appointment.appointment_type_id == 1 &&
                      appointment.appointment_status_code != 5
                    "
                  >
                    <video-call-component
                      :is_call="is_call"
                      @update-call="updateCallStatus"
                      @showCompletedButton="
                        () => (this.showMarkedAsCompletedButton = true)
                      "
                      :appointment="appointment"
                    ></video-call-component>
                  </div>

                  <div
                    v-if="
                      appointment.appointment_type_id == 2 &&
                      appointment.appointment_status_code != 5
                    "
                  >
                    <audio-call-component
                      @showCompletedButton="
                        () => (this.showMarkedAsCompletedButton = true)
                      "
                      :appointment="appointment"
                    ></audio-call-component>
                  </div>
                  <div
                    v-if="
                      appointment.appointment_type_id == 3 &&
                      appointment.appointment_status_code == 2
                    "
                  >
                    <chat-component
                      @showCompletedButton="
                        () => (this.showMarkedAsCompletedButton = true)
                      "
                      :appointment="appointment"
                    ></chat-component>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-5 col-12">
              <Prescription
                v-if="prescription == true"
                :disabled="false"
                @hidePrescription="hidePrescription"
                :prescription="prescription"
                :booked_appointment_id="appointment.id"
                :patient_id="appointment.patient_id"
              >
              </Prescription>

              <div class="d-flex align-items-center gap-3">
                <div
                  class="btn btn-primary rounded-4 shadow-find fs-3 px-4 fw-bold mt-4"
                  v-if="prescription == false"
                  @click.prevent="prescription = true"
                >
                  {{
                    appointment.prescription
                      ? __("view and edit prescription")
                      : __("create prescription")
                  }}
                </div>
                <div class="row justify-content-start" v-if="showMarkedAsCompletedButton">
                  <div class="mt-4" v-if="appointment.appointment_status_code == 2">
                    <button
                      type="updatenStatus"
                      @click="updateAppointmentStatus(5)"
                      class="btn btn-primary fw-semibold rounded-4 fs-3 btn-success px-4"
                    >
                      {{ __("Mark as Complete") }}
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-white py-5">
      <div class="container">
        <!-- new module -->
        <div class="card shadow p-0" style="background-color: #f4f9fd">
          <div class="d-flex justify-content-between p-2 mt-4 px-5">
            <h3 class="fw-bold fs-2">{{ __("medicine details") }}</h3>
            <button
              class="border-0 bg-transparent border-0 text-primary fw-bold fs-3"
              data-bs-toggle="modal"
              data-bs-target="#ratingModel"
            >
              <img class="me-2 mb-1" src="@/images/icons/plus.svg" alt="" width="23" />
              {{ __("add medicine") }}
            </button>
          </div>
          <hr class="w-100 border-bottom border-2 mb-1 p-0 text-primary" />
          <div class="card-body pt-0 px-0">
            <div class="table-responsive">
              <table class="table table-borderless">
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
                    <th
                      style="background-color: #f4f9fd"
                      class="text-primary"
                      scope="col"
                    >
                      {{ __("action") }}
                    </th>
                  </tr>
                </thead>
                <tbody class="spacing">
                  <tr
                    v-for="(item, index) in appointment.medicines"
                    :key="index"
                    class="fw-normal fs-3 mb-3"
                    style="color: #696868; background-color: white; height: 61px"
                  >
                    <td>{{ item.name }}</td>
                    <td>{{ item.dosage }}</td>
                    <td>{{ item.frequency }}</td>
                    <td>
                      <button
                        class="border-0 bg-transparent ms-3"
                        @click="deleteMedicine(item.id)"
                      >
                        <img
                          class="ms-2"
                          src="@/images/icons/del.svg"
                          alt=""
                          width="25"
                        />
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- new module -->
        <!-- mew module2 -->
        <Modal :id="'ratingModel'" :aria-labelledby="'ratingModelLabel'">
          <div class="modal-dialog modal-dialog-centered">
            <div
              class="modal-content p-4 pb-5 rounded-5"
              style="background-color: #f4f9fd"
            >
              <div
                class="modal-header border-0 d-flex flex-column justify-content-center mt-3"
              >
                <h5 class="fw-bold fs-2 mb-5">{{ __("add your medicine") }}</h5>
                <div class="col-md-10">
                  <div class="d-flex flex-column justify-content-center">
                    <div class="col-md-12">
                      <Label class="fs-3 text-black fw-normal mb-3 ms-4">{{
                        __("medicine name")
                      }}</Label>
                      <input
                        class="radius py-3 ps-4 w-100"
                        type="text"
                        :placeholder="__('medicine name')"
                        v-model="medicine.name"
                      />
                    </div>
                  </div>
                  <div class="d-flex justify-content-center mt-3 gap-3 px-2">
                    <div class="col-md-6">
                      <Label class="fs-3 text-black fw-normal mb-3 ms-4">{{
                        __("Dosage")
                      }}</Label>
                      <input
                        class="radius py-3 ps-4 w-100"
                        type="text"
                        :placeholder="__('Tablet Dosage')"
                        v-model="medicine.dosage"
                      />
                    </div>
                    <div class="col-md-6">
                      <Label class="fs-3 text-black fw-normal mb-3 ms-4">{{
                        __("Frequency")
                      }}</Label>
                      <input
                        class="radius py-3 ps-4 w-100"
                        type="text"
                        :placeholder="__('Enter Frequency')"
                        v-model="medicine.frequency"
                      />
                    </div>
                  </div>
                  <div class="col-md-12 mt-5">
                    <button
                      type="button"
                      data-bs-dismiss="modal"
                      @click="addMedicine()"
                      class="btn btn-primary rounded-4 py-2 w-100 fs-3 shadow-find"
                    >
                      {{ __("add") }}
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </Modal>

        <!-- new module2 -->

        <!-- Show others details of Appointmentsummary -->
        <Modal :id="'summaryModel'" :aria-labelledby="'summaryModelLabel'">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4 rounded-5">
              <div class="modal-header border-0 mt-3">
                <div class="row">
                  <div class="col-md-3" v-if="appointment.doctor_name">
                    <div class="d-flex flex-column p-3 rounded-4 mb-3 stats">
                      <h5 class="fs-5 text-black mb-2 fw-bolder">
                        {{ __("selected doctor") }}
                      </h5>
                      <span class="fs-5 text-black">{{
                        appointment.doctor_name
                      }}</span>
                    </div>
                  </div>

                  <div class="col-md-3" v-if="appointment.question">
                    <div class="d-flex flex-column p-3 rounded-4 mb-3 stats">
                      <h5 class="mb-2 fs-5 fw-bolder text-black">
                        {{ __("question") }}
                      </h5>
                      <span class="fs-5 text-black">{{ appointment.question }}</span>
                    </div>
                  </div>
                  <div class="col-md-3" v-if="appointment.question">
                    <div class="d-flex flex-column p-3 rounded-4 mb-3 stats">
                      <h5 class="mb-2 text-black fs-5 fw-bolder">
                        {{ __("attachment") }}
                      </h5>
                      <img
                        :src="appointment.attachment_url"
                        height="100"
                        width="100"
                        v-if="appointment.attachment_url"
                        alt=""
                      />
                      <span class="fs-5 text-black" v-else>{{ __("N/A") }}</span>
                    </div>
                  </div>
                  <div class="col-md-3" v-if="appointment.appointment_type_name">
                    <div class="d-flex flex-column p-3 rounded-4 mb-3 stats">
                      <h5 class="mb-2 fs-5 text-black fw-bolder">
                        {{ __("appointment type") }}
                      </h5>
                      <span class="fs-5 text-black">{{
                        __(appointment.appointment_type_name)
                      }}</span>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="d-flex flex-column p-3 rounded-4 mb-3 stats">
                      <h5 class="mb-2 text-black fw-bolder fs-5">
                        {{ __("payment status") }}
                      </h5>
                      <span class="fs-5 text-black">{{
                        appointment.is_paid ? __("paid") : __("unpaid")
                      }}</span>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="d-flex flex-column p-3 rounded-4 mb-3 stats">
                      <h5 class="mb-2 fs-5 text-black fw-bolder">
                        {{ __("payment method") }}
                      </h5>
                      <span class="fs-5 text-black">{{
                        gateway?.name ?? "wallet"
                      }}</span>
                    </div>
                  </div>
                  <div
                    class="col-md-3"
                    v-if="appointment.appointment_status_code == 5 && userRating"
                  >
                    <div class="d-flex flex-column p-3 rounded-4 mb-3 stats">
                      <h5 class="mb-2 text-black fs-5 fw-bolder text-capitalize">
                        {{ __("your feedback") }}
                      </h5>
                      <div class="d-flex align-items-center gap-2 mb-2">
                        <b class="fs-5 text-black">{{ __("rating") }}: </b>
                        <star-rating
                          :rating="userRating.rating"
                          :star-size="20"
                          :read-only="true"
                          :increment="0.01"
                          :show-rating="false"
                          class="mb-1"
                        ></star-rating>
                      </div>
                      <b class="fs-5">{{ __("comment") }}: </b>
                      {{ userRating.comment }}
                    </div>
                  </div>
                  <div class="col-md-3" v-if="appointment.appointment_status_name">
                    <div class="d-flex flex-column p-3 rounded-4 mb-3 stats">
                      <h5 class="mb-2 fs-5 text-black fw-bolder">
                        {{ __("appointment status") }}
                      </h5>
                      <span class="fs-5 text-black">{{
                        __(appointment.appointment_status_name)
                      }}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  {{ __("close") }}
                </button>
              </div>
            </div>
          </div>
        </Modal>
      </div>
    </div>
  </section>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import ChatComponent from "@/Components/Shared/Appointment/ChatComponent.vue";
import VideoCallComponent from "@/Components/Shared/Appointment/VideoCallComponent.vue";
import AudioCallComponent from "@/Components/Shared/Appointment/AudioCallComponent.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Breadcrums from "../../../Components/Shared/Breadcrums.vue";
import PagesHeading from "../../PagesHeading.vue";
import Prescription from "../../Prescription.vue";
import Modal from "@/Components/Modal.vue";
import axios from "axios";

export default defineComponent({
  components: {
    Head,
    AppLayout,
    AudioCallComponent,
    VideoCallComponent,
    ChatComponent,
    ValidationErrors,
    PagesHeading,
    Modal,
    Link,
    Breadcrums,
    Prescription,
  },
  props: ["appointment", "gateway"],
  computed: {
    userRating() {
      var variable = this.appointment.ratings.find(
        (rating) =>
          rating.fromable_type == this.$page.props.auth.logged_in_as &&
          rating.fromable_id ==
            this.$page.props.auth.user[this.$page.props.auth.logged_in_as].id
      );
      return variable;
    },
  },
  data() {
    return {
      appointmentStatusForm: this.$inertia.form({
        appointment_id: this.appointment.id,
        status_code: "",
      }),
      form: this.$inertia.form({
        comment: "",
        rating: 0,
        doctor_id: this.appointment.doctor_id,
        booked_appointment_id: this.appointment.id,
      }),
      medicine: this.$inertia.form({
        booked_appointment_id: this.appointment.id,
        dosage: "",
        frequency: "",
        name: "",
      }),
      deleteMedicineForm: this.$inertia.form({
        booked_appointment_id: this.appointment.id,
        medicine_id: null,
      }),
      is_call: true,
      prescription: false,

      showMarkedAsCompletedButton: false,
      breadcrums: [
        {
          id: 1,
          name: this.__("Home"),
          link: "/",
        },
        {
          id: 2,
          name: this.__("my appointments"),
          link: "/appointment_log",
        },
        {
          id: 3,
          name: this.__("appointment detail"),
          link: "",
        },
      ],
    };
  },
  async created() {
    if (this.appointment.is_started) {
      this.showMarkedAsCompletedButton = true;
    }
  },
  methods: {
    updateCallStatus(newValue) {
      this.is_call = newValue;
    },
    getBadgeBackgroundColor(statusName) {
      switch (statusName) {
        case "Pending":
          return "#ffc107"; // Yellow background color for Pending
        case "Accepted":
          return "#28a745"; // Green background color for Accepted
        case "Rejected":
          return "#dc3545"; // Red background color for Rejected
        case "Cancelled":
          return "#6c757d"; // Grey background color for Cancelled
        case "Completed":
          return "#007bff"; // Blue background color for Completed
        default:
          return ""; // Default background color or class if status name doesn't match
      }
    },

    hidePrescription() {
      this.prescription = false;
    },
    close() {
      document.getElementById("close").click();
    },
    resetForm() {
      this.form = this.$inertia.form({
        comment: "",
        rating: 0,
      });
    },
    setRating(rating) {
      this.form.rating = rating;
    },

    updateAppointmentStatus(status_code) {
      this.appointmentStatusForm.status_code = status_code;
      this.appointmentStatusForm
        .transform((data) => ({
          ...data,
        }))
        .post(this.route("appointment_detail.updateStatus"), {
          onSuccess: () => {
            if (status_code == 2) {
              this.is_call = true;
            }
            if (status_code == 5) {
              document.getElementById("rate_now_button").click();
            }
          },
        });
    },

    submit() {
      this.form.post(this.route("add_appointment_rating"), {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
          const modalBackdrop = document.querySelector(".modal-backdrop");
          if (modalBackdrop) {
            modalBackdrop.classList.remove("modal-backdrop");
          }
          this.resetForm();
        },
      });
    },

    addMedicine() {
      this.medicine.post(this.route("appointment_detail.medicine"), {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
          this.medicine.dosage = "";
          this.medicine.frequency = "";
          this.medicine.name = "";
        },
      });
    },
    deleteMedicine(medicine_id) {
      this.deleteMedicineForm.medicine_id = medicine_id;
      this.deleteMedicineForm.post(this.route("appointment_delete.medicine"), {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {},
      });
    },
  },
});
</script>
<style scoped>
table {
  border-spacing: 0 10px;
  /* adjust the value to your liking */
  border-collapse: separate;
}

table tr {
  height: 61px;
  /* increase the height of the table rows */
}

table td {
  vertical-align: middle;
  /* center the text vertically */
}

.table > :not(caption) > * > * {
  padding: 0.5rem 3rem;
}
</style>
