<template>
  <div class="py-4 px-3 p-md-5 stats">
    <div class="container px-0">
      <div class="row gap-md-4">
        <div class="col">
          <div
            class="d-flex flex-column ps-md-4 align-items-start item mb-4 mb-md-0 aos-init aos-animate"
            data-aos="fade-right"
            data-aos-once="false"
            data-aos-duration="1500"
            data-aos-delay="700"
          >
            <img
              class="static-icon"
              src="@/images/icons/totaldoctors.png"
              alt="doctor"
            />

            <h3
              v-if="$page.props.dashboard_data.total_doctors > 100"
              class="mb-1 mt-2 display-6 text-primary fw-bold"
            >
              {{ $page.props.dashboard_data.total_doctors
              }}<span v-if="$page.props.dashboard_data.total_doctors > 0"
                >+</span
              >
            </h3>
            <h3 v-else class="mb-1 mt-2 display-6 text-primary fw-bold">80+</h3>

            <span class="text-black fs-2 fw-bold">{{
              __("Total Doctors")
            }}</span>
          </div>
        </div>
        <div class="col">
          <div
            class="d-flex flex-column align-items-start item mb-4 mb-md-0 aos-init aos-animate"
            data-aos="fade-right"
            data-aos-once="false"
            data-aos-duration="1500"
            data-aos-delay="900"
          >
            <img
              class="static-icon"
              src="@/images/icons/totalappointments.png"
              alt="like"
            />
            <div class="d-flex flex-column ms-3">
              <h3
                v-if="$page.props.dashboard_data.total_appointments > 100"
                class="mb-1 mt-2 display-6 text-primary fw-bold"
              >
                {{ $page.props.dashboard_data.total_appointments
                }}<span v-if="$page.props.dashboard_data.total_appointments > 0"
                  >+</span
                >
              </h3>
              <h3 v-else class="mb-1 mt-2 display-6 text-primary fw-bold">
                70+
              </h3>
              <span class="text-black fs-2 fw-bold">{{
                __("Total Appointments")
              }}</span>
            </div>
          </div>
        </div>

        <div class="col">
          <div
            class="d-flex flex-column ps-md-5 align-items-start item mb-4 mb-md-0 aos-init aos-animate"
            data-aos="fade-right"
            data-aos-once="false"
            data-aos-duration="1500"
            data-aos-delay="500"
          >
            <img
              class="static-icon"
              src="@/images/icons/globalpresence.png"
              alt="patient"
            />

            <h3
              v-if="$page.props.dashboard_data.total_users > 100"
              class="mb-1 mt-2 display-6 text-primary fw-bold"
            >
              {{ $page.props.dashboard_data.total_users
              }}<span v-if="$page.props.dashboard_data.total_users > 0">+</span>
            </h3>
            <h3 v-else class="mb-1 mt-2 display-6 text-primary fw-bold">95+</h3>
            <span class="text-black fs-2 fw-bold">{{
              __("Global Presence")
            }}</span>
          </div>
        </div>

        <div class="col">
          <div
            class="d-flex flex-column ps-md-5 align-items-start item mb-4 mb-md-0 aos-init aos-animate"
            data-aos="fade-right"
            data-aos-once="false"
            data-aos-duration="1500"
            data-aos-delay="1100"
          >
            <img
              class="static-icon"
              src="@/images/icons/totalpatient.png"
              alt="school"
            />

            <h3
              v-if="$page.props.dashboard_data.total_users > 100"
              class="mb-1 mt-2 display-6 text-primary fw-bold"
            >
              {{ $page.props.dashboard_data.total_users
              }}<span v-if="$page.props.dashboard_data.total_users > 0">+</span>
            </h3>
            <h3 v-else class="mb-1 mt-2 display-6 text-primary fw-bold">
              300+
            </h3>
            <span class="text-black fs-2 fw-bold">{{
              __("Total Patients")
            }}</span>
          </div>
        </div>

        <!-- <div
                        class="d-flex flex-column align-items-center justify-content-start item"
                        data-aos="fade-right"
                        data-aos-once="false"
                        data-aos-duration="1500"
                        data-aos-delay="1300"
                    >
                        <img src="@/images/icons/event_1.svg" alt="event">
                        <div class="d-flex flex-column ms-3">
                            <h3 class="mb-0 mb-0 text-customblue fw-bold">
                                {{ $page.props.dashboard_data.total_events }}<span v-if="$page.props.dashboard_data.total_events > 0">+</span>
                            </h3>
                            <span class="home-subheading">{{ __('events') }}</span>
                        </div>
                   </div> -->
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
  created() {},
  data() {
    return {};
  },
  methods: {},
});
</script>
