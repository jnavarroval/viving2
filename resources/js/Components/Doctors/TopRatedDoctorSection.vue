<template>
  <div class="row h-100 pt-4 px-4 px-md-0" v-if="!fetching && top_rated_doctors.length > 0">
    <div class="col-md-3" v-for="doctor in top_rated_doctors" :key="doctor.id">
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

  <Section v-else-if="!fetching && top_rated_doctors.length == 0">
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
    RecordNotFound,
  },
  created() {
    if (this.top_rated_doctors.length == 0) {
      this.getTopRatedDoctors();
    }
  },
  data() {
    return {
      form: this.$inertia.form({}),
      top_rated_doctors: [],
      key: 1,
      fetching: true,
      settings: {
        itemsToShow: 1,
        snapAlign: "start",
        autoplay: false,
        wrapAround: "true",
      },
      // breakpoints are mobile firstTop Featured Doctors
      // any settings not specified will fallback to the carousel settings
      breakpoints: {
        // 700px and up
        700: {
          itemsToShow: 1,
          snapAlign: "start",
        },
        // 1024 and up
        1024: {
          itemsToShow: 4,
          snapAlign: "start",
        },
      },
    };
  },
  methods: {
    getTopRatedDoctors() {
      axios.get(this.route("getApiTopRatedDoctors")).then((res) => {
        this.fetching = false;
        this.top_rated_doctors = res.data.data;
      });
    },
    submit() {},
  },
  props: ["refresh"],
  watch: {
    refresh(newVal, oldVal) {
      this.key++;
    },
  },
});
</script>
