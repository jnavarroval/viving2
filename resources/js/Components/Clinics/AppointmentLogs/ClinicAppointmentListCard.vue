<template>
    <div class="col-12 text-center mb-3" v-if="appointments.data.length == 0">
      <record-not-found></record-not-found>
    </div>


    <div
      class="col-lg-12 mb-3"
      v-for="(appointment, index) in appointments.data"
      :key="appointment.id"
    >

      <h1 v-if="index === 0 && isTodayMatched(appointment.date)" class="fs-2 fw-bold mb-4 ms-5">
        Latest
      </h1>


      <div v-else class="fs-3 fw-bold mb-4 ms-5">
        {{ appointment.date }}
      </div>

      <div
        class="card rounded-6 shadow-none px-4 py-2 border-primary border mb-4"
        :class="{ 'bg-white': index === 0, 'bg-stats': index !== 0 }"
      >
        <div class="card-body p-0">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="d-flex flex-md-row flex-column justify-content-around">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                  <!-- Patient Image -->
                  <div
                    class="rounded-circle ms-1 overflow-hidden"
                    style="width: 105px; height: 105px"
                  >
                    <img
                      v-if="appointment.patient_image"
                      class="img-fluid"
                      :src="appointment.patient_image"
                      alt="patient"
                    />
                    <img
                      v-else
                      class="img-fluid"
                      src="@/images/account/default_avatar_men.png"
                      alt="default avatar"
                    />
                  </div>


                  <div class="d-flex flex-column ms-4">
                    <h5 class="fw-normal text-black fs-2 mb-0">
                      {{ appointment.patient_first_name }}
                    </h5>
                  </div>
                </div>


                <div class="d-flex align-items-center justify-content-md-around px-md-2">
                  <img src="@/images/icons/Date_range.svg" alt="calendar icon" />
                  <h4  class="mb-0 text-black opacity-75 fs-3 fw-normal ms-2">
                    {{ formatDate(appointment.date) }}
                  </h4>
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
                <Link :href="route('clinic.appointment_log.detail', { id: appointment.id })">
                                <img src="@/images/icons/eye.svg" alt="view icon" />
                                </Link>
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

  export default defineComponent({
    components: {
      Head,
      Link,
      RecordNotFound,
    },
    props: ["appointments"],
    data() {
      return {
        latest: true,
      };
    },
    methods: {
      isTodayMatched(date) {
        const today = new Date().toISOString().slice(0, 10);
        return today === date;
      },
      formatDate(date) {
        const options = { year: "numeric", month: "short", day: "numeric" };
        return new Date(date).toLocaleDateString(undefined, options);
      },
    },
  });
  </script>

  <style>
  /* Add background color to the non-latest appointments */
  .bg-stats {
    background-color: #e5f0f9;
  }
  </style>
