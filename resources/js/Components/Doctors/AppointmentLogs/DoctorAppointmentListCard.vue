<template>
    <div class="row">
      <div class="col-12 text-center mb-3" v-if="appointments.data.length == 0">
        <record-not-found></record-not-found>
      </div>

      <!-- Group appointments by date -->
      <div v-for="(group, dateIndex) in groupedAppointments" :key="dateIndex" class="col-lg-12 mb-3">
        <!-- Display 'Latest' for today's appointments, otherwise show the date -->
        <div class="fs-3 fw-bold mb-4 ms-5">
          {{ dateIndex === 0 && isTodayMatched(group[0].date) ? 'Latest' : formatDate(group[0].date) }}
        </div>

        <!-- Appointment Cards -->
        <div v-for="(appointment) in group" :key="appointment.id" class="card rounded-6 shadow-none px-4 py-2 border-primary border mb-4">
          <div class="card-body p-0">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="d-flex flex-md-row flex-column justify-content-around">
                  <div class="d-flex align-items-center mb-3 mb-md-0">
                    <!-- Patient Image -->
                    <div class="rounded-circle ms-1 overflow-hidden" style="width: 105px; height: 105px">
                      <img v-if="appointment.patient_image" class="img-fluid" :src="appointment.patient_image" alt="patient" />
                      <img v-else class="img-fluid" src="@/images/account/default_avatar_men.png" alt="patient" />
                    </div>
                    <!-- Patient Details -->
                    <div class="d-flex flex-column ms-4">
                      <h5 class="fw-normal text-black fs-2 mb-0">{{ appointment.patient_first_name }}</h5>
                    </div>
                  </div>
                  <!-- Appointment Date -->
                  <div class="d-flex align-items-center justify-content-md-around px-md-2">
                    <img src="@/images/icons/Date_range.svg" alt="" />
                    <h4 class="mb-0 text-black opacity-75 fw-normal ms-2 fs-3">{{ formatDate(appointment.date) }}</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-6 my-2 my-md-0">
                <div class="d-flex align-items-center justify-content-md-around justify-content-between">
                <span class="d-flex align-items-center gap-2" v-if="appointment.appointment_type == 'video'">
                    <i class="bi bi-play-circle-fill text-primary fs-2"></i>
                    <h5 class="fs-3 mb-0">{{ __('Video Call') }}</h5>
                </span>
                <span class="d-flex align-items-center gap-2" v-else-if="appointment.appointment_type == 'audio'">
                    <i class="bi bi-volume-up text-primary fs-2"></i>
                    <h5 class="fs-3 mb-0">{{ __('Audio Call') }}</h5>
                </span>
                <span class="d-flex align-items-center gap-2" v-else>
                                        <i class="bi bi-chat-right-text text-primary fs-2"></i>
                                        <h5 class="fs-3 mb-0">{{ __('Live Chat') }}</h5>
                </span>
 <span class="badge p-2 fs-6 rounded-3 bg-opacity-50" :class="appointment.is_paid ? 'bg-success' : 'bg-danger'">{{ appointment.is_paid  ? __("paid") : __("unpaid") }}</span>
 <Link :href="route('doctor.appointment_log.detail', { id: appointment.id })">
                    <img src="@/images/icons/eye.svg" alt="" />
                  </Link>
</div>
</div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </template>

  <script>
  import { defineComponent } from "vue";
  import { Head, Link } from "@inertiajs/inertia-vue3";
  import RecordNotFound from "../../Shared/RecordNotFound.vue";
  import Modal from "@/Components/Modal.vue";

  export default defineComponent({
    components: {
      Head,
      Link,
      RecordNotFound,
      Modal,
    },
    props: ["appointments"],
    data() {
      return {
        latest: true,
        latest_index: null,
        form: this.$inertia.form({
          comment: "",
          rating: 0,
          doctor_id: null,
          booked_appointment_id: null,
        }),
        showRatingObj: [],
      };
    },
    computed: {
      groupedAppointments() {

        const groups = {};
        this.appointments.data.forEach((appointment) => {
          const date = appointment.date;
          if (!groups[date]) {
            groups[date] = [];
          }
          groups[date].push(appointment);
        });
        return Object.values(groups);
      },
    },
    methods: {
      setAppointment(appointment) {
        this.form.booked_appointment_id = appointment.id;
        this.form.doctor_id = appointment.doctor_id;
      },
      close() {
        document.getElementById("close").click();
      },
      isTodayMatched(date) {
        const today = new Date().toISOString().slice(0, 10);
        return today === date;
      },
      formatDate(date) {
        const options = { year: "numeric", month: "short", day: "numeric" };
        return new Date(date).toLocaleDateString(undefined, options);
      },
      resetForm() {
        this.form = this.$inertia.form({
          comment: "",
          rating: 0,
          doctor_id: null,
          booked_appointment_id: null,
        });
      },
      checkUserAlreadyRated(appointment) {
        const userId = this.$page.props.auth.user[this.$page.props.auth.logged_in_as].id;
        return !appointment.ratings.some((rating) => rating.fromable_id === userId && rating.fromable_type === this.$page.props.auth.logged_in_as);
      },
      isShowRateBtn(appointment) {
        const ratingObj = this.showRatingObj.find((rating) => rating.appointment_id === appointment.id);
        return ratingObj ? ratingObj.isShow : false;
      },
      setRating(rating) {
        this.form.rating = rating;
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
            this.close();
            const index = this.showRatingObj.findIndex((rating) => rating.appointment_id === this.form.booked_appointment_id);
            if (index >= 0) {
              this.showRatingObj[index].isShow = false;
            }
            this.resetForm();
          },
        });
      },
    },
    mounted() {
      this.appointments.data.forEach((appointment) => {
        this.showRatingObj.push({
          appointment_id: appointment.id,
          isShow: this.checkUserAlreadyRated(appointment),
        });
      });
    },
  });
  </script>

  <style>
  .bg-stats {
    background-color: #e5f0f9;
  }
  </style>
