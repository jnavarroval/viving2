<template>
  <app-layout title="Dashboard">
    <template #default>
      <div class="bg-primary">
        <pages-heading
          :textwhite="'true'"
          :heading="'about us'"
          :breadcrums="breadcrums"
        >
        </pages-heading>
      </div>

      <div class="section general-pages about py-5 stats">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-md-6">
                  <img
                    :src="about_page.image"
                    class="rounded-4 img-about"
                    alt=""
                  />
                </div>
                <div class="col-md-6 pt-4">
                  <span
                    style="background-color: #294481; opacity: 0.6"
                    class="fs-3 text-white fw-bold rounded-pill px-4 py-2 mt-3 mt-md-0"
                    >{{ __("WHAT ABOUT US") }}</span
                  >
                  <div class="mt-4" v-html="about_page.description"></div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mt-5 text-center">
                <span
                  style="background-color: #294481; opacity: 0.6"
                  class="fs-3 text-white fw-bold rounded-pill px-4 py-2"
                  >{{ __("Explore Services") }}</span
                >
                <h3 class="display-7 fw-bold text-black mt-4">
                  {{ __("Explore Our Main Service") }}
                </h3>
              </div>
              <div class="row mt-5">
                <div
                  class="col-md-3 col-6 hvr-float d-md-block d-flex align-items-center justify-content-center"
                  v-for="(service, index) in about_categories"
                  :key="index"
                >
                  <Link
                    v-if="index <= 7"
                    class="text-decoration-none text-center"
                    :href="`${route('doctors.listing')}?doctor_category_slug=${
                      service.slug
                    }`"
                  >
                    <div class="card mb-3 py-2 text-center rounded-5">
                      <span class="d-flex justify-content-center mt-2">
                        <div
                          class="rounded-circle icon-back d-flex align-items-center justify-content-center"
                          style="width: 90px; height: 90px"
                        >
                          <img
                            style="width: 50px"
                            :src="service.image"
                            class="img-fluid"
                            alt="cardtopimg"
                          />
                        </div>
                      </span>

                      <div class="card-body">
                        <h4 class="text-black mb-2 fs-2">
                          {{ service.name }}
                        </h4>
                        <p class="card-subheading-fs mb-0">
                          {{ __("Treatment perfectly") }} <br />
                          {{ __("match your goals") }}.
                        </p>
                      </div>
                    </div>
                  </Link>
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-6" v-if="about_page.image">
                <img :src="about_page.image" alt="" class="w-100 h-auto img-fluid rounded overflow-hidden">
              </div> -->
          </div>
        </div>
      </div>
    </template>
  </app-layout>
</template>

  <script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import PagesHeading from "../Components/PagesHeading.vue";
import axios from "axios";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    AppLayout,
    Navbar,
    Link,
    PagesHeading,
  },
  data() {
    return {
      about_categories: [],
    };
  },
  props: ["about_page"],
  breadcrums: [
    {
      id: 1,
      name: "Home",
      link: "/",
    },
    {
      id: 2,
      name: "About Us",
    },
  ],
  created() {
    this.getDoctorMainCategories();
  },
  methods: {
    getDoctorMainCategories() {
      axios.get(this.route("getApiDoctorMainCategories")).then((res) => {
        this.about_categories = res.data.data;
      });
    },
  },
});
</script>
