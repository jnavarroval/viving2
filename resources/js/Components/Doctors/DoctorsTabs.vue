<template>
  <div class="doctor-tabs section p-6 position-relative bg-white">
    <div class="container-fluid px-0 overflow-hidden">
      <div class="container">
        <div class="row">
          <div class="col-12 mb-4 text-center">
            <div
              v-if="
                getPageContentType('medical_speacilist_description') ==
                'textarea'
              "
            >
              <div
                v-html="getPageContent('medical_speacilist_description')"
              ></div>
            </div>
            <div
              v-else-if="
                getPageContentType('medical_speacilist_description') == 'text'
              "
            >
              <p>
                {{ getPageContent("medical_speacilist_description") ?? "-" }}
              </p>
            </div>
            <div v-else>
              <h2 class="heading-fs text-center mb-3 aos-init aos-animate">
                {{ __("Are you Looking medical specialists") }}
              </h2>
              <p>
                {{
                  __(
                    "Discover a wide range of online doctors, specialized in various fields, offering diverse treatments and services. Explore doctor reviews and effortlessly schedule appointments online"
                  )
                }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <ul
        class="nav doctortabs nav-pills mb-3 p-3 text-center d-flex align-items-center justify-content-center gap-tab-buttons"
        style="margin: 0 auto"
        id="pills-tab"
        role="tablist"
      >
        <li class="nav-item all-tab-text" role="presentation">
          <button
            class="nav-link active text-dark p-0"
            id="pills-all-doctors-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-all-doctors"
            type="button"
            @click="refreshSlider('all')"
            role="tab"
            aria-controls="pills-all-doctors"
            aria-selected="false"
          >
            {{ __("all") }}
          </button>
        </li>

        <div class="vr"></div>
        <li class="nav-item featured-tab-text" role="presentation">
          <button
            class="nav-link text-dark p-0"
            id="pills-featured-doctors-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-featured-doctors"
            type="button"
            @click="refreshSlider('featured')"
            role="tab"
            aria-controls="pills-featured-doctors"
            aria-selected="false"
          >
            {{ getPageContent("doctors_tabs_button_2") ?? "Featured" }}
          </button>
        </li>
        <div class="vr"></div>
        <li class="nav-item top--tab-text" role="presentation">
          <button
            class="nav-link text-dark p-0"
            id="pills-top-rated-doctors-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-top-rated-doctors"
            type="button"
            @click="refreshSlider('top_rated')"
            role="tab"
            aria-controls="pills-top-rated-doctors"
            aria-selected="true"
          >
            {{ getPageContent("doctors_tabs_button_1") ?? "Top Rated" }}
          </button>
        </li>
      </ul>

    </div>
    <div class="tab-content w-100" id="pills-tabContent">
      <div
        class="tab-pane fade"
        id="pills-top-rated-doctors"
        role="tabpanel"
        aria-labelledby="pills-top-rated-doctors-tab"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <top-rated-doctor-section
                class="py-2"
                :refresh="top_rated_key"
                background="true"
                v-if="top_rated_tab"
              ></top-rated-doctor-section>
            </div>
          </div>
        </div>
      </div>
      <div
        class="tab-pane fade"
        id="pills-featured-doctors"
        role="tabpanel"
        aria-labelledby="pills-featured-doctors-tab"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <featured-doctor-section
                class="py-2"
                :refresh="featured_key"
                findDoctors="true"
                v-if="featured_tab"
              ></featured-doctor-section>
            </div>
          </div>
        </div>
      </div>
      <div
        class="tab-pane fade show active"
        id="pills-all-doctors"
        role="tabpanel"
        aria-labelledby="pills-all-doctors-tab"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <all-doctor-section
                class="py-2"
                findDoctors="true"
                :refresh="all_doctor_key"
                v-if="all_doctor_tab"
              ></all-doctor-section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import FeaturedDoctorSection from "@/Components/Doctors/FeaturedDoctorSection.vue";
import TopRatedDoctorSection from "@/Components/Doctors/TopRatedDoctorSection.vue";
import AllDoctorSection from "@/Components/Doctors/AllDoctorSection.vue";
import DoctorCard from "@/Components/Doctors/DoctorCard.vue";
import axios from "axios";
import { Carousel, Navigation, Pagination, Slide } from "vue3-carousel";
import Section from "@/Components/Section.vue";
import { ref } from "vue";

export default defineComponent({
  components: {
    // DoctorCard,
    FeaturedDoctorSection,
    TopRatedDoctorSection,
    AllDoctorSection,
    Link,
    Carousel,
    Slide,
    Pagination,
    Navigation,
    Section,
  },
  created() {

  },
  data() {
    return {
      form: this.$inertia.form({}),
      top_rated_tab: false,

      featured_tab: false,
      all_doctor_tab: true,
      top_rated_key: 1,
      featured_key: 1,
      all_doctor_key: 1,
      selected_main_category: null,
    };
  },
  methods: {
    refreshSlider(tab) {
      if (tab == "top_rated") {
        this.top_rated_tab = true;
        this.top_rated_key++;
      }
      if (tab == "featured") {
        this.featured_tab = true;
        this.featured_key++;
      }
      if (tab == "all") {
        this.all_doctor_tab = true;
        this.all_doctor_key++;
      }
    },
    selectCategory(category) {
      this.selected_main_category = category.slug;
      this.featured_key++;
    },

    submit() {},
  },
});
</script>
