<template>
  <app-layout title="Categories">
    <div class="stats">
      <pages-heading
        :heading="'Departments'"
        :breadcrums="breadcrums"
      ></pages-heading>
      <find-doctor-bar
        :title="'Search Related Doctors near by you'"
        :home="true"
      ></find-doctor-bar>
      <div class="container p-7">
        <div class="row justify-content-center mb-4">
          <div class="col-md-12">
            <h2 class="text-center heading-fs mb-4">
              {{ __("Explore different departments") }}
            </h2>
            <div
              v-if="
                getPageContentType('categories_page_description') == 'textarea'
              "
            >
              <div
                class="subheading-fs text-center"
                v-html="getPageContent('categories_page_description')"
              ></div>
            </div>
            <div
              v-else-if="
                getPageContentType('categories_page_description') == 'text'
              "
            >
              <p>
                {{ getPageContent("categories_page_description") ?? "-" }}
              </p>
            </div>
            <div v-else>
              <p class="subheading-fs text-center">
                Our team of highly skilled attorneys comprises seasoned
                professionals with extensive experience in their respective
                fields. We pride ourselves<br />
                on recruiting top legal talent, ensuring that you receive the
                highest standard of representation. From complex litigation to
                intricate.
              </p>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row py-2 px-3 px-md-0">
            <div class="col-12 p-0">
              <div class="container" v-if="fetching">
                <div class="row align-items-center">
                  <div class="col-md-2 col-6">
                    <categories-skeleton></categories-skeleton>
                  </div>
                  <div class="col-md-2 col-6">
                    <categories-skeleton></categories-skeleton>
                  </div>
                  <div class="col-md-2 col-6">
                    <categories-skeleton></categories-skeleton>
                  </div>
                  <div class="col-md-2 col-6">
                    <categories-skeleton></categories-skeleton>
                  </div>
                  <div class="col-md-2 col-6">
                    <categories-skeleton></categories-skeleton>
                  </div>
                  <div class="col-md-2 col-6">
                    <categories-skeleton></categories-skeleton>
                  </div>
                </div>
              </div>
              <div class="container" v-if="!fetching">
                <div class="row align-items-center">
                  <div
                    class="col-md-2 col-6 hvr-float d-md-block d-flex align-items-center justify-content-center"
                    v-for="(category, index) in doctor_main_categories"
                    :key="index"
                  >
                    <Link
                      v-if="index <= 18"
                      class="text-decoration-none text-center"
                      :href="`${route(
                        'doctors.listing'
                      )}?doctor_category_slug=${category.slug}`"
                    >
                      <div class="card mb-3 py-2 text-center">
                        <span class="d-flex justify-content-center mt-2">
                          <div
                            class="rounded-circle icon-back d-flex align-items-center justify-content-center"
                            style="width: 90px; height: 90px"
                          >

                            <img
                              style="width: 50px"
                              :src="category.image"
                              class="img-fluid"
                              alt="cardtopimg"
                            />
                          </div>
                        </span>

                        <div class="card-body">
                          <h4
                            class="text-black mb-2"
                            style="font-size: 1.375rem"
                          >
                            {{ category.name }}
                          </h4>
                          <p class="card-subheading-fs mb-0">
                            {{ __("Treatment perfectly match your goals.") }}
                          </p>
                        </div>
                      </div>
                    </Link>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--  -->
          <!-- <div v-if="events.meta.last_page != this.filter.page"      @click="loadMore()"
          :disabled="loading_more"  class="row pb-5">
            <div class="col-12 text-center">
              <button
                @click="loadMore()"
                class="btn btn-primary rounded-4 fs-3 fw-bold px-5"
                :disabled="loading_more"
              >
                <span
                  :class="{
                    loader: loading_more,
                  }"
                  class="position-absolute"
                ></span>
                {{ __("load more") }}
              </button>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </app-layout>
</template>

<style src="@vueform/multiselect/themes/default.css"></style>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Link } from "@inertiajs/inertia-vue3";
import axios from "axios";
import { router } from "@inertiajs/inertia-vue3";
import Multiselect from "@vueform/multiselect";
import CategoriesSkeleton from "@/Components/Skeleton/CategoriesSkeleton.vue";
import VueGoogleAutocomplete from "vue-google-autocomplete";
import Breadcrums from "../../Components/Shared/Breadcrums.vue";
import PagesHeading from "../../Components/PagesHeading.vue";
import FindDoctorBar from "@/Components/Doctors/FindDoctorBar.vue";
export default defineComponent({
  components: {
    ValidationErrors,
    FindDoctorBar,
    PagesHeading,
    Link,
    Multiselect,
    VueGoogleAutocomplete,
    AppLayout,
    Breadcrums,
    CategoriesSkeleton,
  },
  props: {
    is_redirect: {
      type: Boolean,
      default: true,
    },
  },
  created() {
    this.getDoctorMainCategories();
    // this.getCountries();
  },
  data() {
    return {
      form: {
        doctor_category: route().params.doctor_category ?? "",
        search: route().params.search ?? "",
        country: route().params.country ?? "",
        location:
          route().params.search_type == "location" && route().params.location
            ? route().params.location
            : "",
        latitude: route().params.latitude ?? "",
        longitude: route().params.longitude ?? "",
        search_type: route().params.search_type ?? "country",
        distance:
          route().params.search_type == "distance" && route().params.distance
            ? route().params.distance
            : "",
        zip_code:
          route().params.search_type == "zip_code" && route().params.zip_code
            ? route().params.zip_code
            : "",
      },
      countries: [],
      doctor_categories: [],
      doctor_main_categories: [],
      distanceOptions: [],
      fetching: true,
      breadcrums: [
        {
          id: 1,
          name: this.__("Home"),
          link: "/",
        },
        {
          id: 2,
          name: this.__("Departments"),
          link: "/categories",
        },
      ],
    };
  },
  async mounted() {
    await this.locatorButtonPressed();
    if (route().params.search) {
      this.$refs.address.update(route().params.search ?? "");
      if (!this.form.location) {
        this.$refs.address.focus();
        this.form.latitude = this.location_data.lat ?? "";
        this.form.longitude = this.location_data.lng ?? "";
      }
    }

    this.formDistanceOptions();
  },
  methods: {
    // getDoctorCategories() {
    //   axios.get(this.route("getApiDoctorCategories")).then((res) => {
    //     this.doctor_categories = res.data.data;
    //   });
    // },
    getDoctorMainCategories() {
      axios.get(this.route("getApiDoctorMainCategories")).then((res) => {
        this.doctor_main_categories = res.data.data;
        this.fetching = false;
      });
    },
    getCountries() {
      axios.get(this.route("getApiCountries")).then((res) => {
        this.countries = res.data.data;
      });
    },

    async formDistanceOptions() {
      var options = [
        { value: "", name: this.__("select distance") },
        // { value: "all", name: this.__("select all") },
      ];
      for (let i = 1; i < 1000; i++) {
        var obj = { value: i, name: i + " km" };
        options.push(obj);
      }
      this.distanceOptions = options;
    },

    updateLocation(address) {
      this.form.location = address.newVal;
    },

    async getCurrentLocation() {
      this.form.latitude = this.location_data.lat ?? "";
      this.form.longitude = this.location_data.lng ?? "";
      if (this.form.latitude && this.form.longitude) {
        var user_address = await this.getStreetAddressFrom(
          this.form.latitude,
          this.form.longitude
        );
        this.$refs.address.update(user_address);
      }
    },

    getAddressData: function (addressData, placeResultData, id) {
      this.form.latitude = addressData.latitude;
      this.form.longitude = addressData.longitude;
      this.form.location = addressData.route;
      // this.address = addressData;
    },
  },
});
</script>


<style scoped>
.details span {
  font-size: 12px;
  font-weight: 600;
  color: #575757;
}
</style>
