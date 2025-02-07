<template>
  <Section class="p-6" :class="{ 'find-clinics': findClinics }">
    <div class="row">
      <div class="col-12 mb-4 text-center">
        <div
          class="col-12"
          v-if="
            getPageContentType('featured_clinics_description') == 'textarea'
          "
        >
          <div v-html="getPageContent('featured_clinics_description')"></div>
        </div>
        <div
          class="col-12"
          v-else-if="
            getPageContentType('featured_clinics_description') == 'text'
          "
        >
          <p>{{ getPageContent("featured_clinics_description") ?? "-" }}</p>
        </div>
        <div v-else>
          <span class="fs-3">{{ __("Are you Looking For") }}</span>
          <h2 class="display-6">{{ __("Featured Clinic") }}</h2>
        </div>
      </div>
    </div>

    <!-- <template #paragraph>
      <p class="text-center mb-4">Your overall healing and well-being matters to us which is why we’re excited to partner with world renowned clinics and integrated clinics. When dealing with unresolved or unexplained physical or emotional issues and trauma, having a guide and community to help and support you along your path to finding a solution that works for you is something we all can benefit from! Connect with our top rated clinics and clinics.</p>
    </template> -->

    <div class="spotlight-carousel px-0">
      <Carousel
        class="clinic_carousel featured-clinic-carousel"
        :settings="settings"
        :breakpoints="breakpoints"
        ref="carousel"
        v-model="currentSlide"
      >
        <Slide v-for="clinic in featured_clinics" :key="clinic.id">
          <clinic-card :clinic="clinic"></clinic-card>
        </Slide>
        <template #addons>
          <navigation />
        </template>
      </Carousel>
    </div>

    <!-- <div class="container">
        <div class="row">
        <div class="col-12 d-flex align-items-center gap-3">
        <div class="col-6" v-for="clinic in featured_clinics" :key="clinic.id">
            <clinic-card :clinic="clinic"></clinic-card>
        </div>
        </div>
        </div>

      </div> -->

    <div class="pt-4 d-flex justify-content-center">
      <Link
        :href="route('clinics.listing')"
        class="btn btn-outline-primary fw-bold fs-3 px-md-5 px-3 rounded-4"
      >
        {{ getPageContent("general_view_more_btn_text") ?? __("view more") }}
      </Link>
    </div>
  </Section>
</template>
<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import ClinicCard from "@/Components/Clinics/ClinicCard.vue";
import axios from "axios";
import { Carousel, Navigation, Pagination, Slide } from "vue3-carousel";
import Section from "@/Components/Section.vue";

export default defineComponent({
  components: {
    ClinicCard,
    Link,
    Carousel,
    Slide,
    Pagination,
    Navigation,
    Section,
  },
  created() {
    this.getFeaturedClinics();
  },
  data() {
    return {
      form: this.$inertia.form({}),
      featured_clinics: [],
      settings: {
        itemsToShow: 1,
        snapAlign: "start",
      },
      // breakpoints are mobile first
      // any settings not specified will fallback to the carousel settings
      breakpoints: {
        // 700px and up
        700: {
          itemsToShow: 1,
          snapAlign: "start",
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
    getFeaturedClinics() {
      axios.get(this.route("getApiFeaturedClinics")).then((res) => {
        this.featured_clinics = res.data.data;
      });
    },
    submit() {},
  },
  props: ["findClinics"],
});
</script>
