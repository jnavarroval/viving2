<template>
  <div
    class="bg-primary bar-search-doctor d-flex flex-column justify-content-center"
    v-if="home"
  >
    <div class="container">
      <h2 class="text-center fs-1 fw-bold text-white mb-4">{{ __(title) }}</h2>
      <div class="row mx-2 mx-md-0 py-md-0 align-items-center bg-white rounded-4 bar">
        <div class="col-md-5">
          <div class="input-group-from position-relative d-flex align-items-center">
            <vue-google-autocomplete
              id="map"
              ref="address"
              enable-geolocation
              classname="form-control bg-transparent fs-3 border-0 shadow-none"
              :placeholder="__('Enter Your Current Location')"
              v-on:inputChange="updateLocation"
              v-on:placechanged="getAddressData"
            >
            </vue-google-autocomplete>
            <button
              type="button"
              class="btn btn-info text-primary fs-2 d-flex align-items-center px-3 shadow-none rounded-3"
              @click="getCurrentLocation()"
            >
              {{ __("Detect") }}
              <img
                src="@/images/icons/Gps_fixed.png"
                class="ms-2"
                style="width: 2.5rem"
                alt="locationicon"
              />
            </button>
          </div>
        </div>
        <!-- <div class="col-12 col-md-4 mb-3 mb-md-0">
          <div
            class="d-flex flex-md-row flex-column location-select align-items-md-center align-items-start"
          >
            <div class="d-flex align-items-center">
              <input
                v-model="current_address"
                type="text fw-medium"
                class="form-control bg-transparent fs-3 border-0 shadow-none"
                :placeholder="__('Enter your current location')"
              />
            </div>
            <Button
              type="button"
              @click="getCurrentLocation()"
              class="btn btn-info text-primary fs-2 d-flex align-items-center px-3 shadow-none rounded-3 ms-md-2"
            >
              {{ __("Detect") }}
              <img
                src="@/images/icons/Gps_fixed.png"
                class="ms-2"
                style="width: 2.5rem"
                alt="locationicon"
              />
            </Button>
          </div>
        </div> -->
        <div class="col-12 col-md-7 pe-md-2">
          <div
            class="d-flex doctor-search flex-column flex-md-row align-items-md-center align-items-start justify-content-between"
          >
            <input
              v-model="form.search"
              type="search"
              @input="updateQuery"
              :placeholder="__('Search Doctors')"
              class="bg-transparent fs-3 border-0 shadow-none w-100 mb-3 mb-md-0 ms-2 ms-md-0"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            />
            <button
              @click="searchData"
              type="button"
              :disabled="isLoading"
              class="btn btn-secondary px-md-4 py-2 fs-2 fw-bold rounded-3"
            >
              <SpinnerLoader v-if="isLoading" />
              {{ getPageContent("general_search_btn_text") ?? __("search") }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { computed, defineComponent } from "vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Link } from "@inertiajs/inertia-vue3";
import SpinnerLoader from "@/Components/Shared/SpinnerLoader.vue";
import VueGoogleAutocomplete from "vue-google-autocomplete";
import { Inertia } from "@inertiajs/inertia";

export default defineComponent({
  components: {
    ValidationErrors,
    Link,
    SpinnerLoader,
    VueGoogleAutocomplete,
  },
  props: {
    title: {
      type: String,
    },
    search: {
      type: String,
    },
    is_redirect: {
      type: Boolean,
      default: true,
    },
    home: {
      type: Boolean,
      default: false,
    },
    is_doctor_page: {
      type: Boolean,
      default: false,
    },
  },
  created() {},

  data() {
    return {
      form: {
        search: "",
        latitude: "",
        longitude: "",
      },
      isLoading: false,
      isClearLoading: false,
      distanceOptions: [],
      current_address: "",
    };
  },

  async mounted() {
    await this.locatorButtonPressed();
    // await this.$refs.address.update(this.$page.props.clinic.address_line_1);

    if (this.$page.props.search) {
      this.form.search = this.$page.props.search ?? "";
      if (!this.form.location) {
        this.form.latitude = this.location_data.lat ?? "";
        this.form.longitude = this.location_data.lng ?? "";
      }
    }
    if (this.$page.props.latitude && this.$page.props.longitude) {
      this.getCurrentLocation();
    }
  },

  computed: {},
  methods: {
    callHref() {
      let url = this.route("doctors.listing");

      const params = new URLSearchParams();
      if (this.form.search) {
        params.append("search", encodeURIComponent(this.form.search));
      }
      if (this.form.latitude) {
        params.append("latitude", encodeURIComponent(this.form.latitude));
      }
      if (this.form.longitude) {
        params.append("longitude", encodeURIComponent(this.form.longitude));
      }
      if (params.toString()) {
        url += "?" + params.toString();
      }
      return url;
    },
    searchData() {
      if (!this.is_doctor_page) {
        this.$inertia.replace(this.callHref());
      } else {
        this.$emit("updateFormData", this.form);
      }
    },
    showInfo(info) {
      this.form.latitude = info.latLng.lat();
      this.form.longitude = info.latLng.lng();
    },
    updateQuery() {
      const searchParams = new URLSearchParams(window.location.search);

      if (this.form.search) {
        searchParams.set("search", this.form.search);
      }
      if (!this.form.search) {
        searchParams.delete("search");
      }
      if (this.form.latitude && this.form.longitude) {
        searchParams.set("latitude", this.form.latitude);
        searchParams.set("longitude", this.form.longitude);
      }
      if (!this.current_address) {
        searchParams.delete("latitude", this.form.latitude);
        searchParams.delete("longitude", this.form.longitude);
      }

      const newUrl = `${window.location.pathname}?${searchParams.toString()}`;
      window.history.pushState({}, "", newUrl);
    },
    updateLocation(address) {
      this.current_address = address.newVal;

      this.updateQuery();
    },

    async getCurrentLocation() {
      this.form.latitude = this.location_data.lat ?? -34.6161385;
      this.form.longitude = this.location_data.lng ?? -58.39748470000001;
      if (this.form.latitude && this.form.longitude) {
        var user_address = await this.getStreetAddressFrom(
          this.form.latitude,
          this.form.longitude
        );
        this.current_address = user_address;
        this.$refs.address.update(user_address);
      }
    },

    getAddressData: function (addressData, placeResultData, id) {
      this.form.latitude = addressData.latitude;
      this.form.longitude = addressData.longitude;
      this.form.location = addressData.route;
      // this.address = addressData;
    },

    searchTypeChanged() {
      this.form.distance = "";
      this.form.location = "";
      this.form.country = "";
      this.form.zip_code = "";
    },
  },
});
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
