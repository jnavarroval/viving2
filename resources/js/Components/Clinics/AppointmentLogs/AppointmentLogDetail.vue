<template>
  <section>
    <div class="stats">
      <div class="bg-primary">
        <pages-heading
          :textwhite="'true'"
          :heading="'Appointment Detail'"
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
                <div class="col-lg-12">
                  <div
                    class="row mx-0 mb-4"
                    v-if="appointment.appointment_status_code == 1"
                  >
                    <div
                      class="col-12 py-3 rounded-4 d-flex align-items-center"
                      style="background-color: #e7f3fa"
                    >
                      <div class="col-md-6">
                        <p class="fw-bold text-center ms-1 mb-0 fs-5">
                          {{ __("Please accept the appointment from patient") }}
                        </p>
                      </div>
                      <div class="col-md-6 d-flex justify-content-end">
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
                    class="row justify-content-center py-3 rounded-4"
                    style="background-color: #e7f3fa"
                    v-if="appointment.appointment_status_code == 5"
                  >
                    <div class="col-md-12">
                      <p class="mb-0 fw-bold fs-5 text-center">
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

                  <div class="row justify-content-end" v-if="showMarkedAsCompletedButton">
                    <div class="col-md-6 d-flex justify-content-end flex-wrap">
                      <div class="mt-4" v-if="appointment.appointment_status_code == 2">
                        <button
                          type="updatenStatus"
                          @click="updateAppointmentStatus(5)"
                          class="btn btn-primary fw-semibold rounded-4 btn-success px-5"
                        >
                          {{ __("Mark as complete") }}
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-5">
              <ClinicPrescription
                v-if="prescription == true"
                :disabled="false"
                @hidePrescription="hidePrescription"
                :prescription="prescription"
                :booked_appointment_id="appointment.id"
                :patient_id="appointment.patient_id"
              >
              </ClinicPrescription>
            </div>

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
                  <span class="fs-5 text-black">{{ appointment.doctor_name }}</span>
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
                  <span class="fs-5 text-black">{{ gateway?.name ?? "wallet" }}</span>
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
import ClinicPrescription from "../../ClinicPrescription.vue";
import Modal from "@/Components/Modal.vue";

export default defineComponent({
  components: {
    Head,
    AppLayout,
    AudioCallComponent,
    VideoCallComponent,
    PagesHeading,
    ChatComponent,
    ValidationErrors,
    Link,
    Modal,
    Breadcrums,
    ClinicPrescription,
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
      showMarkedAsCompletedButton: false,
      prescription: false,
      breadcrums: [
        {
          id: 1,
          name: "Home",
          link: "/",
        },
        {
          id: 2,
          name: "My Appointments",
          link: "/appointment_log",
        },
        {
          id: 3,
          name: "Appointment Detail",
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
        .post(this.route("clinic.appointment_detail.updateStatus"), {
          onSuccess: () => {
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
  },
});
</script>
