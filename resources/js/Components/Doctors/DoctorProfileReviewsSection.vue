<template>
  <div class="section pb-0 pt-5">
    <div class="container">
      <div class="row">
        <div
          class="col-md-12 d-flex align-items-center justify-content-between mb-4"
        >
          <div
            class="rating d-flex gap-3 fs-3 text-warning"
            v-if="doctor.rating > 0"
          >
            <h2 class="display-3 mb-0 lh-1 text-dark">
              {{ doctor.rating }}/<span class="fs-2">5 </span>
            </h2>
            <div class="d-flex flex-column">
              <star-rating
                :rating="doctor.rating"
                :star-size="25"
                :read-only="true"
                :increment="0.01"
                :show-rating="false"
              ></star-rating>
              <ul class="user-rating p-0">
                <li
                  class="list-unstyled"
                  v-for="(rating, i) in rating_group_keys"
                  :key="i"
                >
                  <div class="rating mt-2">
                    <star-rating
                      :rating="rating"
                      :star-size="18"
                      :read-only="true"
                      :increment="0.01"
                      :show-rating="false"
                    ></star-rating>
                  </div>
                  <div class="d-flex align-items-center">
                    <div
                      style="width: 40%"
                      class="progress mt-2"
                      role="progressbar"
                      aria-label="rating-bar"
                      :aria-valuenow="rating"
                      aria-valuemin="0"
                      aria-valuemax="2"
                    >
                      <div
                        class="progress-bar bg-primary"
                        :style="{ width: rating * 5 + '%' }"
                      ></div>
                    </div>
                    <span class="mt-2 ms-2 fw-bold fs-3 text-black">{{
                      rating_groups[rating].length
                    }}</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div
            v-if="
              $page.props.auth &&
              $page.props.auth.user.email_verified_at &&
              $page.props.auth.logged_in_as == 'patient'
            "
            class=""
          >
            <button
              class="btn btn-primary px-4 shadow-find rounded-4 fs-4 fw-bold"
              data-bs-toggle="modal"
              data-bs-target="#RatingModal"
            >
              {{ __("write a review") }}
            </button>
          </div>
        </div>

        <div class="col-md-12 pb-4">
          <div class="row" v-if="reviews.length > 0">
            <div
              class="col-md-6"
              v-for="review in reviews.slice(0, 2)"
              :key="review.id"
            >
              <doctor-review-card :review="review"></doctor-review-card>
            </div>
          </div>
          <div v-else class="row">
            <div class="col-12 text-center">
              <h4 class="text-capitalize">{{ __("no review found") }}</h4>
            </div>
          </div>
          <div class="col-md-3">
            <Link
              :href="route('doctor.reviews', { user_name: doctor.user_name })"
              class="btn btn-primary shadow-find rounded-4 fs-4 fw-bold"
            >
              <span>{{ __("view all") }}</span>
            </Link>
          </div>
        </div>
      </div>
    </div>
    <!-- <hr>
        <div class="container">
            <div class="row">
                <div class="col-12">

                </div>
            </div>
        </div> -->
    <add-review-modal :doctor_id="doctor_id"></add-review-modal>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import DoctorReviewCard from "@/Components/Doctors/DoctorReviewCard.vue";
import AddReviewModal from "@/Components/Doctors/AddReviewModal.vue";
import axios from "axios";
import { Carousel, Navigation, Pagination, Slide } from "vue3-carousel";

export default defineComponent({
  components: {
    DoctorReviewCard,
    AddReviewModal,
    Link,
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },
  created() {
    // group by rating
    this.rating_groups = this.reviews.reduce((x, y) => {
      (x[y.rating] = x[y.rating] || []).push(y);
      return x;
    }, {});

    this.rating_group_keys = Object.keys(this.rating_groups).sort((a, b) =>
      b.localeCompare(a)
    );
  },
  props: ["reviews", "doctor", "doctor_id"],
  data() {
    return {
      rating_groups: [],
      rating_group_keys: [],
      form: this.$inertia.form({}),
      featured_doctors: [],
      settings: {
        itemsToShow: 2,
        snapAlign: "center",
      },
      // breakpoints are mobile first
      // any settings not specified will fallback to the carousel settings
      breakpoints: {
        // 700px and up
        700: {
          itemsToShow: 1,
          snapAlign: "center",
        },
        // 1024 and up
        1024: {
          itemsToShow: 1,
          snapAlign: "center",
        },
      },
    };
  },
  methods: {
    submit() {},

    next() {
      this.$refs.carousel.next();
    },
    prev() {
      this.$refs.carousel.prev();
    },
  },
});
</script>

<style lang="scss" scoped>
@media screen and (max-width: 768px) {
  h2 {
    font-size: 20px !important;
  }
}
</style>
