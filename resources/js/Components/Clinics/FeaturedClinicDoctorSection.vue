<template>
  <!-- v-if="clinic_doctors.length > 0" -->
  <div class="featured-clinic-doctors">
    <carousel
      v-if="clinic_doctors.length > 0"
      :wrapAround="true"
      :breakpoints="breakpoints"
    >
      <slide v-for="doctor in clinic_doctors" :key="doctor.id">
        <doctor-card :doctortab="true" :doctor="doctor"></doctor-card>
      </slide>
      <template #addons>
        <navigation />
      </template>
    </carousel>
  </div>

  <!-- v-if="clinic_doctors.length > 0" -->
  <!-- <div >
        <div class="row doctor-clinic">
            <div class="col-3">
                <card-skeleton></card-skeleton>
            </div>
            <div class="col-3">
                <card-skeleton></card-skeleton>
            </div>
            <div class="col-3">
                <card-skeleton></card-skeleton>
            </div>
            <div class="col-3">
                <card-skeleton></card-skeleton>
            </div>
        </div>
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
  },
  created() {},
  data() {
    return {
      form: this.$inertia.form({}),
      featured_doctors: [],
      fetching: true,
      key: 1,
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
          itemsToShow: 4.25,
          snapAlign: "center",
        },
      },
    };
  },
  methods: {
    submit() {},
  },
  props: ["findDoctors", "refresh", "clinic_doctors"],
  watch: {
    refresh(newVal, oldVal) {
      this.key++;
    },
  },
});
</script>
