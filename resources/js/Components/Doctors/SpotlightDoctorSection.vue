<template>
  <div class="section spotlight p-6">
    <div class="container-fluid px-0 overflow-hidden">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="position-relative text-center">
              <!-- <img src="@/images/home/premium.png" alt="" class="img-fluid mb-3" /> -->
              <div
                class="col-12"
                v-if="
                  getPageContentType('premium_doctors_description') ==
                  'textarea'
                "
              >
                <div
                  v-html="getPageContent('premium_doctors_description')"
                ></div>
              </div>
              <div
                class="col-12"
                v-else-if="
                  getPageContentType('premium_doctors_description') == 'text'
                "
              >
                <p>
                  {{ getPageContent("premium_doctors_description") ?? "-" }}
                </p>
              </div>
              <div v-else>
                <h2
                  class="text-center display-6"
                  data-aos="fade-down"
                  data-aos-once="false"
                  data-aos-duration="1500"
                  data-aos-delay="200"
                >
                  {{ __("Premium Doctors") }}
                </h2>

                <p class="text-center mb-5">
                  Our team of highly skilled attorneys comprises seasoned
                  professionals with extensive experience in their respective
                  fields. We pride ourselves on recruiting top legal talent,
                  ensuring that you receive the highest standard of
                  representation. From complex litigation to intricate
                  transactional matters, we have the depth of knowledge and
                  breadth of skills to handle even the most challenging cases.
                </p>
              </div>

              <!-- <div class="position-absolute top-0" style="right: 15%;">

                <button @click="prev" class="btn">
                  <i class="bi bi-chevron-left"></i>
                </button>
                <button @click="next" class="btn">
                  <i class="bi bi-chevron-right"></i>
                </button>
              </div> -->
            </div>
          </div>
        </div>
      </div>

      <div
        class="container spotlight-carousel px-0"
        v-if="!fetching && premium_doctors.length > 0"
      >
        <Carousel
          :wrapAround="true"
          :breakpoints="breakpoints"
          ref="carousel"
          v-model="currentSlide"
        >
          <Slide v-for="doctor in premium_doctors" :key="doctor.id">
            <!-- <doctor-spotlight-card :doctor="doctor"></doctor-spotlight-card> -->
            <doctor-card :doctor="doctor"></doctor-card>
          </Slide>
          <template #addons>
            <navigation />
          </template>
        </Carousel>
      </div>
      <Section v-else-if="!fetching && premium_doctors.length == 0">
        <record-not-found></record-not-found>
      </Section>
      <div class="container spotlight-carousel px-0" v-else>
        <Carousel :wrapAround="true" :breakpoints="breakpoints" ref="carousel">
          <Slide v-for="slide in 3" :key="slide">
            <card-skeleton></card-skeleton>
          </Slide>
          <template #addons>
            <navigation />
          </template>
        </Carousel>
      </div>

      <div class="row pt-md-5 justify-content-center">
        <div class="col-md-3 d-flex justify-content-center">
          <Link
            :href="route('doctors.listing')"
            class="btn btn-outline-primary fw-medium fs-3 px-md-5 px-3 rounded-4"
          >
            <span class="button-text">{{
              getPageContent("general_view_more_btn_text") ?? __("view more")
            }}</span>
          </Link>
        </div>
      </div>
      <!-- <div class="row mt-5">
            <div class="col-12 text-center">
             <Link :href="route('doctors.listing')" class="btn btn-primary rounded-pill">{{ __('Explore More') }}</Link>
            </div>
            </div> -->
    </div>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
// import DoctorSpotlightCard from "@/Components/Doctors/DoctorSpotlightCard.vue";
import DoctorCard from "@/Components/Doctors/DoctorCard.vue";
import axios from "axios";
import SpotlightCardSkeleton from "@/Components/Skeleton/SpotLightCardSkeleton.vue";
import { Carousel, Navigation, Pagination, Slide } from "vue3-carousel";
import RecordNotFound from "../Shared/RecordNotFound.vue";
import CardSkeleton from "@/Components/Skeleton/CardSkeleton.vue";

export default defineComponent({
  components: {
    DoctorCard,
    CardSkeleton,
    Link,
    Carousel,
    Slide,
    Pagination,
    Navigation,
    SpotlightCardSkeleton,
    RecordNotFound,
  },
  created() {
    this.getFeaturedDoctors();
  },
  data() {
    return {
      form: this.$inertia.form({}),
      premium_doctors: [],
      fetching: true,
      settings: {
        snapAlign: "center",
      },
      breakpoints: {
        // 700px and up
        700: {
          itemsToShow: 1,
          snapAlign: "center",
        },
        // 1024 and up
        1024: {
          itemsToShow: 3,
          snapAlign: "center",
        },
      },
    };
  },
  methods: {
    getFeaturedDoctors() {
      axios.get(this.route("getApiPremiumDoctors")).then((res) => {
        this.fetching = false;
        this.premium_doctors = res.data.data;
      });
    },
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
