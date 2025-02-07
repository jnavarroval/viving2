<template>
  <div class="container">
    <div class="row mb-3">
      <div class="col-md-3 col-4">
        <h4 class="text-primary fs-2 fw-bold">{{ __("days") }}</h4>
      </div>
      <div class="col-md-6 col-4">
        <h4 class="text-primary fs-2 fw-bold">{{ __("timings") }}</h4>
      </div>
      <div class="col-md-3 col-4">
        <h4 class="text-primary fs-2 fw-bold">{{ __("status") }}</h4>
      </div>
    </div>

    <div v-for="day in days" :key="day" class="row mb-2 border-bottom pb-2">
      <div class="col-md-3 col-4">
        <h5 class="fs-3 fw-normal">{{ __(day) }}</h5>
      </div>

      <div class="col-md-6 col-4">
        <div v-for="appointment in doctor_appointments" :key="appointment.id">
          <div
            v-if="
              appointment.day === day &&
              (appointment.type === 'video' || appointment.type === 'audio')
            "
            class="d-flex align-items-center gap-4"
          >
            <h5 class="fs-3 fw-normal">
              {{ formatTimeWithAMPM(appointment.start_time) }} -
              {{ formatTimeWithAMPM(appointment.end_time) }}
            </h5>
          </div>
        </div>

        <div
          v-if="!doctor_appointments.some((app) => app.day === day)"
          class="d-flex align-items-center gap-4"
        >
          <h5 class="fs-3 fw-normal">---</h5>
        </div>
      </div>

      <div class="col-md-3 col-4">
        <span
          v-if="doctor_appointments.some((app) => app.day === day)"
          class="badge text-bg-success fw-bold fs-5"
          >{{ __("Open") }}</span
        >
        <span
          v-if="!doctor_appointments.some((app) => app.day === day)"
          class="badge text-bg-danger fw-bold fs-5"
          >{{ __("Closed") }}</span
        >
      </div>
    </div>
  </div>
</template>

  <script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Link,
  },
  props: {
    doctor_appointments: Array,
  },
  data() {
    return {
      days: [
        "monday",
        "tuesday",
        "wednesday",
        "thursday",
        "friday",
        "saturday",
        "sunday",
      ],
    };
  },
  methods: {
    formatTimeWithAMPM(time) {
      const [hour, minute] = time.split(":");
      const hourInt = parseInt(hour, 10);
      const ampm = hourInt >= 12 ? "PM" : "AM";
      const hour12 = hourInt % 12 || 12;
      return `${hour12}:${minute} ${ampm}`;
    },
  },
});
</script>


