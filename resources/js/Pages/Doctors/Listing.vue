<template>
  <app-layout title="Doctors">
    <div class="stats">
      <pages-heading
        :heading="'Find the Doctors'"
        :breadcrums="breadcrums"
      ></pages-heading>
      <find-doctor-bar
        @updateFormData="updateFormData"
        :title="'Search Related Doctors near by you'"
        :home="true"
        :search="search"
        :is_doctor_page="true"
      ></find-doctor-bar>
      <div class="pt-7">
        <div class="container mb-3">
          <div class="row">
            <div class="col-md-12">
              <div
                v-if="
                  getPageContentType('doctors_page_description') == 'textarea'
                "
              >
                <div v-html="getPageContent('doctors_page_description')"></div>
              </div>
              <div
                v-else-if="
                  getPageContentType('doctors_page_description') == 'text'
                "
              >
                <p>{{ getPageContent("doctors_page_description") ?? "-" }}</p>
              </div>
              <div v-else>
                <p class="fs-4 text-center text-black">
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
        </div>

        <div class="container">
          <div class="row bg-white rounded-4 p-2">
            <div class="col-md-12">
              <div class="row align-items-center py-4 py-md-2">
                <div class="col-md-4">
                  <div class="d-flex gap-3">
                    <span class="pe-3" style="border-right: 1px solid #e5e5e5">
                      <button
                        :class="
                          list_view
                            ? 'btn fs-3 btn-primary rounded-custom px-4 border-0'
                            : 'btn fs-3 text-black btn-transparent rounded-custom px-4 border-0'
                        "
                        @click="listView()"
                      >
                        <i
                          :class="list_view ? 'text-white' : 'text-dark'"
                          class="bi bi-list me-2"
                        ></i>
                        {{
                          getPageContent("general_list_btn_text") ?? "List View"
                        }}
                      </button>
                    </span>
                    <button
                      :class="
                        grid_view
                          ? 'btn fs-3 btn-primary rounded-custom px-4 border-0'
                          : 'btn fs-3 text-black btn-transparent rounded-custom px-4 border-0'
                      "
                      @click="GridView()"
                    >
                      <i
                        :class="grid_view ? 'text-white' : 'text-dark'"
                        class="bi bi-columns-gap me-2"
                      ></i>
                      {{
                        getPageContent("general_grid_btn_text") ?? "Grid View"
                      }}
                    </button>
                  </div>
                </div>
                <div class="col-md-8">
                  <div
                    class="d-flex mt-3 mt-md-0 align-items-center justify-content-md-end"
                  >
                    <div class="d-flex align-items-center col-md-5 col-8">
                      <label
                        for="exampleFormControlInput1"
                        class="form-label text-black fs-3 fw-normal mb-0 pe-md-2"
                        >{{ __("Show Result") }}:</label
                      >
                      <div class="col-md-7 col-10">
                        <select
                          class="form-select fs-4 py-2 px-4 ms-3 text-black"
                          style="
                            border-radius: 12px;
                            border: 1px solid #294481 !important;
                          "
                          aria-label="Default select example"
                          v-model="show_results"
                          @change="getDoctors()"
                        >
                          <option>10</option>
                          <option>20</option>
                          <option>30</option>
                        </select>
                      </div>
                    </div>
                    <button
                      class="btn px-3 py-2 ms-5 ms-md-3 btn-primary rounded-4"
                      data-bs-toggle="offcanvas"
                      data-bs-target="#offcanvasRight"
                      aria-controls="offcanvasRight"
                    >
                      <img width="25" src="@/images/icons/Union.png" alt="" />
                    </button>

                    <div
                      class="offcanvas p-4 custom-offcanvas offcanvas-end"
                      tabindex="-1"
                      id="offcanvasRight"
                      aria-labelledby="offcanvasRightLabel"
                    >
                      <div
                        class="offcanvas-header align-items-start border-bottom border-2"
                      >
                        <div class="d-flex flex-column">
                          <h5 class="display-6 text-black">
                            {{ __("Filters") }}
                          </h5>
                          <p class="subheading-fs">
                            {{
                              __(
                                "Discover your ideal doctor effortlessly using these convenient filters"
                              )
                            }}
                          </p>
                        </div>
                        <button
                          type="button"
                          class="btn-close d-block d-md-none"
                          data-bs-dismiss="offcanvas"
                          aria-label="Close"
                        ></button>
                      </div>
                      <div class="offcanvas-body">
                        <find-doctor-bar
                          @getDoctors="onSearch"
                          :is_redirect="false"
                          :is_doctor_page="true"
                        ></find-doctor-bar>

                        <div class="row flex-column align-items-start">
                          <div class="col-md-12">
                            <Label class="fs-2 text-black fw-bold mb-2">{{
                              __("Select Categories")
                            }}</Label>
                            <Multiselect
                              class="py-2 px-3"
                              v-model="form.doctor_category"
                              valueProp="id"
                              label="name"
                              groupLabel="name"
                              :placeholder="__('Select Category')"
                              groupOptions="categories"
                              :groupSelect="true"
                              :groups="true"
                              mode="tags"
                              :close-on-select="false"
                              :searchable="true"
                              :options="this.doctor_main_categories"
                            />
                          </div>
                          <div class="custom2">
                            <button
                              type="button"
                              class="btn-close bg-white rounded-circle me-0"
                              data-bs-dismiss="offcanvas"
                              aria-label="Close"
                            ></button>
                          </div>

                          <hr class="mt-4 border-bottom border-2" />

                          <div class="col-md-12">
                            <Label class="fs-2 text-black fw-bold mb-2">{{
                              __("Sort By Price")
                            }}</Label>
                            <div
                              class="d-flex gap-4 align-item-center justify-content-between"
                            >
                              <div class="d-flex flex-column">
                                <Label
                                  class="fs-3 mb-2 text-black fw-normal"
                                  >{{ __("from") }}</Label
                                >
                                <input
                                  v-model="form.start_price"
                                  type="number"
                                  class="form-control fs-4 py-3 px-3"
                                  placeholder="$20"
                                />
                              </div>
                              <div class="d-flex flex-column">
                                <div class="d-flex flex-column">
                                  <Label
                                    class="fs-3 mb-2 text-black fw-normal"
                                    >{{ __("to") }}</Label
                                  >
                                  <input
                                    v-model="form.end_price"
                                    type="number"
                                    class="form-control fs-4 py-3 px-3"
                                    placeholder="$200"
                                  />
                                </div>
                              </div>
                            </div>
                          </div>
                          <hr class="mt-4 border-bottom border-2" />

                          <div class="col-md-12">
                            <Label class="fs-2 text-black fw-bold mb-2">{{
                              __("Sort by Reivews")
                            }}</Label>
                            <select
                              v-model="form.review"
                              class="form-select py-3 px-3"
                              aria-label="Default select example"
                            >
                              <option value="0">0 +</option>
                              <option value="5">5 +</option>
                              <option value="10">10 +</option>
                              <option value="15">15 +</option>
                              <option value="20">20 +</option>
                              <option value="25">25 +</option>
                              <option value="30">30 +</option>
                            </select>
                          </div>

                          <hr class="mt-4 border-bottom border-2" />

                          <div class="col-md-12">
                            <Label class="fs-2 text-black fw-bold my-3">{{
                              __("Sort by Rating")
                            }}</Label>
                            <select
                              class="form-select py-3 px-3"
                              v-model="form.rating"
                              aria-label="Default select example"
                            >
                              <option value="">
                                {{ __("select Rating") }}
                              </option>
                              <option value="1">1 Stars</option>
                              <option value="2">2 Stars</option>
                              <option value="3">3 Stars</option>
                              <option value="4">4 Stars</option>
                              <option value="5">5 Stars</option>
                            </select>
                          </div>
                          <div class="col-md-12">
                            <div
                              class="d-flex flex-md-row flex-column justify-content-around my-4 gap-md-4 gap-3"
                            >
                              <button
                                @click="clearFilters()"
                                data-bs-dismiss="offcanvas"
                                aria-label="Close"
                                class="btn btn-primary d-flex justify-content-center justify-content-md-start rounded-4 fs-3 shadow-find"
                              >
                                {{ __("clear all") }}
                                <img
                                  class="ms-4"
                                  src="@/images/icons/group.svg"
                                  alt=""
                                  width="30"
                                />
                              </button>
                              <button
                                @click="getDoctors()"
                                data-bs-dismiss="offcanvas"
                                aria-label="Close"
                                class="btn btn-secondary d-flex justify-content-center justify-content-md-start rounded-4 fs-3 shadow-find"
                              >
                                {{ __("search") }}
                                <img
                                  class="ms-4"
                                  src="@/images/icons/group.svg"
                                  alt=""
                                  width="30"
                                />
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="py-5">
          <div class="container">
            <div class="row">
              <div class="col-12" v-if="fetching">
                <div class="row">
                  <div class="col-md-12">
                    <spotlight-card-skeleton></spotlight-card-skeleton>
                  </div>
                  <div class="col-md-12">
                    <spotlight-card-skeleton></spotlight-card-skeleton>
                  </div>
                  <div class="col-md-12">
                    <spotlight-card-skeleton></spotlight-card-skeleton>
                  </div>
                  <div class="col-md-12">
                    <spotlight-card-skeleton></spotlight-card-skeleton>
                  </div>
                </div>
              </div>
              <div class="col-12" v-if="!fetching">
                <div v-if="doctors.data.length > 0" class="row">
                  <div
                    :class="
                      list_view
                        ? 'col-md-12'
                        : grid_view
                        ? 'col-md-3'
                        : 'col-md-12'
                    "
                    class="mb-4"
                    v-for="(doctor, index) in doctors.data"
                    :key="index"
                  >
                    <div v-if="list_view">
                      <doctor-listing-card
                        :key="doctor.id"
                        :doctor="doctor"
                      ></doctor-listing-card>
                    </div>

                    <div v-if="grid_view">
                      <doctor-grid-card
                        :key="doctor.id"
                        :doctor="doctor"
                      ></doctor-grid-card>
                    </div>
                  </div>
                </div>

                <div v-else class="row">
                  <div class="col-12 mb-3">
                    <record-not-found></record-not-found>
                  </div>
                </div>
              </div>
              <!-- v-if="doctors.meta.last_page != this.filter.page" -->
              <div class="col-12" v-if="!fetching">
                <div
                  class="d-flex align-items-center justify-content-center mt-5"
                  v-if="doctors.length > 10"
                >
                  <button
                    v-if="doctors.meta.last_page != this.filter.page"
                    @click="loadMore()"
                    class="btn btn-primary fs-2 fw-bold shadow-find rounded-4 px-4 py-2 mb-3"
                    :disabled="loading_more"
                  >
                    <span
                      :class="{
                        loader: loading_more,
                      }"
                      class="position-absolute"
                    ></span>
                    {{
                      getPageContent("general_load_btn_text") ?? __("load more")
                    }}
                    <img
                      width="30"
                      class="ms-4 mb-1"
                      src="@/images/icons/loginbtnicon.png"
                      alt=""
                    />
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import PaginationMixin from "@/Mixins/PaginationMixin.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import FindDoctorBar from "@/Components/Doctors/FindDoctorBar.vue";
import SpotlightDoctorSection from "@/Components/Doctors/SpotlightDoctorSection.vue";
import FeaturedDoctorSection from "@/Components/Doctors/FeaturedDoctorSection.vue";
import DoctorGridCard from "@/Components/Doctors/DoctorGridCard.vue";
import DoctorListingCard from "@/Components/Doctors/DoctorListingCard.vue";
import SpotlightCardSkeleton from "@/Components/Skeleton/SpotLightCardSkeleton.vue";
import RecordNotFound from "../../Components/Shared/RecordNotFound.vue";
import PagesHeading from "../../Components/PagesHeading.vue";
import Multiselect from "@vueform/multiselect";
import route from "../../../../vendor/tightenco/ziggy/src/js";

export default defineComponent({
  mixins: [PaginationMixin],
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    FindDoctorBar,
    PagesHeading,
    SpotlightDoctorSection,
    FeaturedDoctorSection,
    DoctorGridCard,
    DoctorListingCard,
    SpotlightCardSkeleton,
    RecordNotFound,
    Multiselect,
  },
  data() {
    return {
      doctors: {},
      grid_view: false,
      list_view: true,
      single_view: false,
      fetching: true,
      country_id: this.$page.props ? this.$page.props.country_id : "",
      region: this.$page.props ? this.$page.props.region : "",
      doctor_category_slug: this.$page.props
        ? this.$page.props.doctor_category_slug
        : "",
      show_results: 10,
      breadcrums: [
        {
          id: 1,
          name: this.__("Home"),
          link: "/",
        },
        {
          id: 2,
          name: this.__("doctors"),
        },
      ],

      form: this.$inertia.form({
        doctor_category: this.$page.props.category
          ? this.$page.props.category
            ? [this.$page.props.category]
            : []
          : [],
        search: this.$page.props ? this.$page.props.search : "",
        country_id: this.$page.props ? this.$page.props.country_id : "",
        doctor_category_slug: this.$page.props
          ? this.$page.props.doctor_category_slug
          : "",
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
        main_category: this.$page.props.main_category
          ? this.$page.props.main_category.slug
          : "all",
        review: 0,
        rating: "",
        start_price: 0,
        end_price: 0,
      }),

      isLoading: false,
      isClearLoading: false,
      countries: [],
      categoryIds: [],
      doctor_categories: [],
      doctor_main_categories: [],
      distanceOptions: [],
      current_address: "",
      doctor_category_selected: this.$page.props.doctor_category ?? "",
    };
  },

  async mounted() {
    await this.locatorButtonPressed();
    // await this.$refs.address.update(this.$page.props.clinic.address_line_1);

    // this.$refs.address.update(route().params.search ?? "");
    if (!this.form.location) {
      this.form.latitude = this.location_data.lat ?? "";
      this.form.longitude = this.location_data.lng ?? "";
    }

    // navigator.geolocation.getCurrentPosition(
    //   (position) => {
    //     let lat = position.coords.latitude;
    //     let lng = position.coords.longitude;
    //     (this.filter.latitude = lat), (this.filter.longitude = lng);
    //   },
    //   (error) => {}
    // );
    // this.filter.perPage = 12;
    // this.getDoctors();

    this.getDoctors();
    this.formDistanceOptions();
  },

  created() {
    this.getDoctorMainCategories();
    this.getCountries();

    if (this.$page.props.main_category_slug) {
      this.doctor_category_selected = this.$page.props.main_category_slug;
    }
    if (this.$page.props.doctor_category) {
      this.form.doctor_category.push(this.$page.props.doctor_category);
    }
  },
  methods: {
    async getPaginatedData(loading_more = false) {
      await this.getDoctors(loading_more);
    },

    updateFormData(data) {
      this.form.search = data.search;
      this.form.latitude = data.latitude;
      this.form.longitude = data.longitude;
      this.getDoctors();
    },

    getDoctors(loading_more = false) {
      // return
      //   if(Object.keys(route().params).length > 0){
      //       this.$inertia.replace(route('doctors.listing'))
      //   }
      this.form.country_id = this.country_id;
      this.form.region = this.region;
      this.form.doctor_category_slug = this.doctor_category_slug;
      this.form.perPage = this.show_results;
      axios.post(this.route("getApiDoctors"), this.form).then((res) => {
        const data = res.data.data;
        if (loading_more) {
          this.doctors.data = this.doctors.data.concat(data.data);
        } else {
          this.doctors.data = data.data;
        }

        // if (this.form.search && this.$page.props.search) {
        //   this.$page.props.search = "";
        //   this.form.search = "";
        // }
        this.doctors.links = data.links;
        this.doctors.meta = data.meta;
        this.fetching = false;
      });
    },
    listView() {
      this.list_view = true;
      this.grid_view = false;
      //   this.single_view = false;
    },

    GridView() {
      this.list_view = false;
      this.grid_view = true;
      //   this.single_view = false;
    },

    submit() {
      this.isLoading = true;
      const fetchDataPromise = new Promise((resolve, reject) => {
        setTimeout(() => {
          var payload = {
            data: this.form,
            replace: true,
            preserveScroll: true,
          };
          const data = this.$inertia.post(
            this.route("doctors.listing"),
            payload
          );
          this.$emit("getDoctors", this.form);
          resolve(data);
        }, 1000);
      });
      fetchDataPromise
        .then((data) => {})
        .catch((error) => {})
        .finally(() => {
          this.isLoading = false;
        });
    },

    getDoctorMainCategories() {
      axios.get(this.route("getApiDoctorMainCategories")).then((res) => {
        this.doctor_main_categories = res.data.data;

        if (this.$page.props.doctor_category_slug) {
          const categoryIds = this.doctor_main_categories
            .filter(
              (category) =>
                category.slug === this.$page.props.doctor_category_slug
            )
            .flatMap((category) => category.categories)
            .map((category) => category.id);
          this.form.doctor_category = categoryIds;
          // this.submit();
        }
      });
    },

    clearFilters() {
      this.form.doctor_category = [];
      this.form.start_price = "";
      this.form.end_price = "";
      this.form.review = 0;
      this.form.rating = "";
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

    getCountries() {
      axios.get(this.route("getApiCountries")).then((res) => {
        this.countries = res.data.data;
      });
    },

    // () {
    //   this.list_view = false;
    //   this.grid_view = false;
    //   this.single_view = true;
    // },
  },
});
</script>

<style lang="scss">
.rounded-custom {
  border-radius: 15px;
}
</style>
