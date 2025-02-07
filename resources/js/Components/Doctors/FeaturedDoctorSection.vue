<template>
  <div
    class="row h-100 pt-4 px-4 px-md-0"
    v-if="!fetching && featured_doctors.length > 0"
  >
    <div class="col-md-3" v-for="doctor in featured_doctors" :key="doctor.id">
      <doctor-card :doctortab="true" :doctor="doctor"></doctor-card>
    </div>

    <div class="row mt-5 justify-content-center">
      <div class="col-md-3 d-flex justify-content-center">
        <Link
          :href="route('doctors.listing')"
          class="btn btn-outline-primary fw-bold fs-3 px-md-5 px-3 rounded-4"
        >
          {{
            getPageContent("general_find_doctor_btn_text") ?? __("find doctor")
          }}
        </Link>
      </div>
    </div>
  </div>
  <Section v-else-if="!fetching && featured_doctors.length == 0">
    <record-not-found></record-not-found>
  </Section>

  <div class="row" v-else>
    <div class="col-md-3">
      <card-skeleton></card-skeleton>
    </div>
    <div class="col-md-3">
      <card-skeleton></card-skeleton>
    </div>
    <div class="col-md-3">
      <card-skeleton></card-skeleton>
    </div>
    <div class="col-md-3">
      <card-skeleton></card-skeleton>
    </div>
  </div>

  <!-- -->
  <!-- <div class="pt-4" v-else>
    <Carousel key="02323232" :breakpoints="breakpoints">
        <Slide v-for="slide in 4" :key="slide">
          <doctor-card-skeleton></doctor-card-skeleton>
        </Slide>
      </Carousel>
    </div> -->
</template>
<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import DoctorCard from "@/Components/Doctors/DoctorCard.vue";
import CardSkeleton from "@/Components/Skeleton/CardSkeleton.vue";
import axios from "axios";
import { Carousel, Navigation, Pagination, Slide } from "vue3-carousel";
import Section from "@/Components/Section.vue";
import RecordNotFound from "../Shared/RecordNotFound.vue";
import CategoriesSkeleton from "../Skeleton/CategoriesSkeleton.vue";
import DoctorCardSkeleton from "../Skeleton/DoctorCardSkeleton.vue";

export default defineComponent({
  components: {
    DoctorCard,
    Link,
    Carousel,
    Slide,
    Pagination,
    Navigation,
    Section,
    CardSkeleton,
    CategoriesSkeleton,
    DoctorCardSkeleton,

    // CardSkeleton,
    RecordNotFound,
  },
  created() {
    if (this.featured_doctors.length == 0) {
      this.getFeaturedDoctors();
    }
  },
  data() {
    return {
      form: this.$inertia.form({}),
      featured_doctors: [],
      key: 1,
      fetching: true,
      settings: {
        itemsToShow: 3.95,
        snapAlign: "center",
        autoplay: false,
        wrapAround: "true",
      },
      // breakpoints are mobile firstTop Featured Doctors
      // any settings not specified will fallback to the carousel settings
      breakpoints: {
        // 700px and up
        700: {
          itemsToShow: 1,
          snapAlign: "center",
          wrapAround: "true",
        },
        // 1024 and up
        1024: {
          itemsToShow: 3.95,
          snapAlign: "center",
          wrapAround: "true",
        },
      },
    };
  },
  methods: {
    getFeaturedDoctors() {
      axios
        .get(this.route("getApiFeaturedDoctors", { category: this.category }))
        .then((res) => {
          this.fetching = false;
          this.featured_doctors = res.data.data;
        });
    },
    submit() {},
  },
  props: ["findDoctors", "refresh", "category"],
  watch: {
    refresh(newVal, oldVal) {
      this.key++;
    },
    category(newVal, oldVal) {
      this.fetching = true;
      this.key++;
      this.getFeaturedDoctors();
    },
  },
});
</script>
