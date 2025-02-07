<template>
  <app-layout title="Quick by Services">
    <div class="bg-primary">
      <pages-heading
        :textwhite="'true'"
        :heading="service.name"
        :breadcrums="breadcrums"
      ></pages-heading>
    </div>
    <section style="background-color: #f4f9fd">
      <div class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12 p-0">
              <div class="row">
                <div class="col-md-4">
                  <div
                    class="avatar overflow-hidden mb-3 rounded-lg bg-light"
                    style="height: 380px"
                  >
                    <img
                      class="w-100 h-100"
                      v-if="service.image"
                      :src="service.image"
                      alt="ServiceImage"
                    />
                    <img
                      v-else
                      style="width: 100%"
                      src="@/images/common/avatar.png"
                      alt="Avatar"
                    />
                  </div>
                </div>
                <div class="col-md-8">
                  <h4>{{ service.name }}</h4>
                  <p v-html="service.description" class="fs-3 text-paragraphcolor"></p>
                  <div
                    class="d-flex rounded-4 w-100 p-1 mb-4 justify-content-between align-items-center bg-primary"
                  >
                    <span class="px-2 fw-bold text-white"
                      >{{ __("consultation fee") }}
                      {{ getDisplayAmount(service.price) }}</span
                    >
                    <Link
                      :href="route('book_service_display', { service: service.slug })"
                      class="btn btn-secondary rounded-4 fw-bold px-4 me-1"
                      >{{ __("buy now") }}</Link
                    >
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 text-center mt-5 mb-5 px-3">
              <h1 class="heading-fs mb-3">
                {{ __("Discover healthcare professionals associated with this service") }}
              </h1>
              <p class="subheading-fs">
                Discover a wide range of online doctors, specialized in various fields,
                offering diverse treatments and services.<br />
                Explore doctor reviews and effortlessly schedule appointments online
              </p>
            </div>

            <div class="col-md-12 service-detail-carousel">
              <carousel
                v-if="service_doctors.length > 0"
                :wrapAround="true"
                :breakpoints="breakpoints"
              >
                <slide v-for="doctor in service_doctors" :key="doctor.id">
                  <doctor-card
                    class="w-100"
                    :doctortab="true"
                    :doctor="doctor"
                  ></doctor-card>
                </slide>
                <template #addons>
                  <navigation />
                </template>
              </carousel>
            </div>
          </div>
        </div>
      </div>

      <div class="py-5" v-if="service.faqs.length > 0">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center mb-4 px-3">
              <h1 class="heading-fs mb-3">
                {{ __("Answer Questions related this service") }}
              </h1>
              <p class="subheading-fs">
                {{
                  __n(
                    "Discover a wide range of online doctors, specialized in various fields, offering diverse treatments and services. Explore doctor reviews and effortlessly schedule appointments online"
                  )
                }}
              </p>
            </div>
            <div class="col-md-12">
              <div class="accordion home-faqs-accord" id="accordionPanelsStayOpenExample">
                <div
                  class="accordion-item rounded-4 mb-3 border-0 shadow"
                  v-for="faq in service.faqs"
                  :key="faq.id"
                >
                  <h2 class="accordion-header border-0">
                    <button
                      style="height: 4rem"
                      class="accordion-button border-0 rounded-5 shadow-none overflow-hidden bg-white collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      :data-bs-target="'#flush-collapse-' + faq.id"
                      aria-expanded="false"
                      :aria-controls="'flush-collapse-' + faq.id"
                    >
                      <span class="fw-bold home-faqs-text">{{ faq.question }}</span>
                    </button>
                  </h2>
                  <div
                    :id="'flush-collapse-' + faq.id"
                    class="accordion-collapse border-top border-primary border-1 mx-3 collapse"
                    :aria-labelledby="`panelsStayOpen-headingOne${faq.id}`"
                  >
                    <div class="accordion-body subheading-fs fw-bold">
                      <p>{{ faq.answer }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Breadcrums from "../../Components/Shared/Breadcrums.vue";
import { Carousel, Navigation, Pagination, Slide } from "vue3-carousel";
import { Link } from "@inertiajs/inertia-vue3";
import PagesHeading from "@/Components/PagesHeading.vue";
import axios from "axios";
import DoctorCard from "../../Components/Doctors/DoctorCard.vue";

export default defineComponent({
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    Breadcrums,
    PagesHeading,
    Carousel,
    Navigation,
    Pagination,
    Slide,
    Link,
    DoctorCard,
  },
  props: ["service", "related_services", "service_category"],
  created() {
    this.getServicesDoctor();

  },
  data() {
    return {
      service_doctors: [],
      // carousel settings
      breakpoints: {
        // 700px and up
        700: {
          itemsToShow: 1,
        },
        // 1024 and up
        1024: {
          itemsToShow: 3.95,
        },
      },
      posts: {},
      breadcrums: [
        {
          id: 1,
          name: this.__("Home"),
          link: "/",
        },
        {
          id: 2,
          name: this.__("services"),
          link: "/services",
        },
        {
          id: 3,
          name: this.__("service details"),
        },
      ],
    };
  },
  methods: {
    getServicesDoctor() {
      axios.get(this.route("getApiAllServiceDoctors")).then((res) => {
        this.service_doctors = res.data.data;
      });
    },
  },
});
</script>

<style scoped>
.accordion-button:not(.collapsed) {
  color: #294481 !important;
}
</style>
