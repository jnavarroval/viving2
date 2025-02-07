<template>
    <div class="row">
      <div class="col-12 text-center mb-3" v-if="services.data.length == 0">
        <record-not-found></record-not-found>
      </div>

      <!-- Group services by date -->
      <div v-for="(group, dateIndex) in groupedServices" :key="dateIndex" class="col-lg-12 mb-3">
        <!-- Display 'Latest' for today's services, otherwise show the date -->
        <div class="fs-3 fw-bold mb-4 ms-5">
          {{ dateIndex === 0 && isTodayMatched(group[0].date) ? 'Latest' : formatDate(group[0].date) }}
        </div>

        <!-- Appointment Cards -->
        <div v-for="(service, index) in group" :key="service.id" class="card rounded-6 shadow-none px-4 py-2 border-primary border mb-4">
          <div class="card-body p-0">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="d-flex flex-md-row flex-column justify-content-between">
                  <div class="d-flex align-items-center mb-3 mb-md-0">
                    <!-- Patient Image -->
                    <div class="rounded-circle ms-1 overflow-hidden" style="width: 105px; height: 105px">
                      <img v-if="service.patient_image" class="img-fluid" :src="service.patient_image" alt="patient" />
                      <img v-else class="img-fluid" src="@/images/account/default_avatar_men.png" alt="patient" />
                    </div>
                    <!-- Patient Details -->
                    <div class="d-flex flex-column ms-4">
                      <h5 class="fw-normal text-black fs-2 mb-0">{{ service.patient_first_name }}</h5>
                    </div>
                  </div>
                  <!-- Appointment Date -->
                  <div class="d-flex align-items-center justify-content-md-around px-md-2">
                    <img src="@/images/icons/Date_range.svg" alt="" />
                    <h4 style="font-size: 20px" class="mb-0 text-black opacity-75 fw-normal ms-2">{{ formatDate(service.date) }}</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-6 my-2 my-md-0">
                <div class="d-flex align-items-start align-items-md-center flex-column flex-md-row justify-content-around">
                  <span class="badge p-2 fs-6 rounded-3 bg-opacity-50" :class="service.is_paid ? 'bg-success' : 'bg-danger'">{{ service.is_paid  ? __("paid") : __("unpaid") }}</span>
                  <Link :href="route('doctor.service_log.detail', { id: service.id })">
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
    props: ["services"],
    data() {
      return {
        latest: true,
        latest_index: null,
        form: this.$inertia.form({
          comment: "",
          rating: 0,
          doctor_id: null,
          booked_service_id: null,
        }),
        showRatingObj: [],
      };
    },
    computed: {
      groupedServices() {

        const groups = {};
        this.services.data.forEach((service) => {
          const date = service.date;
          if (!groups[date]) {
            groups[date] = [];
          }
          groups[date].push(service);
        });
        return Object.values(groups);
      },
    },
    methods: {
      setService(service) {
        this.form.booked_service_id = service.id;
        this.form.doctor_id = service.doctor_id;
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
          booked_service_id: null,
        });
      },
      checkUserAlreadyRated(service) {
        const userId = this.$page.props.auth.user[this.$page.props.auth.logged_in_as].id;
        return !service.ratings.some((rating) => rating.fromable_id === userId && rating.fromable_type === this.$page.props.auth.logged_in_as);
      },
      isShowRateBtn(service) {
        const ratingObj = this.showRatingObj.find((rating) => rating.service_id === service.id);
        return ratingObj ? ratingObj.isShow : false;
      },
      setRating(rating) {
        this.form.rating = rating;
      },
      submit() {
        this.form.post(this.route("add_service_rating"), {
          preserveState: true,
          preserveScroll: true,
          onSuccess: () => {
            const modalBackdrop = document.querySelector(".modal-backdrop");
            if (modalBackdrop) {
              modalBackdrop.classList.remove("modal-backdrop");
            }
            this.close();
            const index = this.showRatingObj.findIndex((rating) => rating.service_id === this.form.booked_service_id);
            if (index >= 0) {
              this.showRatingObj[index].isShow = false;
            }
            this.resetForm();
          },
        });
      },
    },
    mounted() {
      this.services.data.forEach((service) => {
        this.showRatingObj.push({
          service_id: service.id,
          isShow: this.checkUserAlreadyRated(service),
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
