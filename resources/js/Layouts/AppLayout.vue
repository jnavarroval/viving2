<template>
  <div class="loader-container" :class="{ 'd-none': !showLoader }">
    <div class="loader">
      <img width="200" :src="$page.props.settings.logo" alt="logo" />
    </div>
    <div class="lds-ellipsis">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- Page Content -->
  <main class="page-content">
    <navbar @showLoaderEvent="showLoaderEvent"> </navbar>
    <header class="header">
      <slot name="header"> </slot>
    </header>
    <slot></slot>
    <doctor-country-filter></doctor-country-filter>
    <Footer />
  </main>
  <!-- <div class="parallax bg-primary">
        <div class="text-center" style="margin-top: 160px;">
            <h1 class="fw-bolder mb-0">{{ __('Become a Doctor?') }}</h1>
            <Link :href="route('register')" class="text-decoration-none fw-semibold btn btn-outline-light mb-5 shadow-none">{{ __('get started now') }}</Link>

        </div>
  </div> -->
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Footer from "@/Layouts/AppIncludes/Footer.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import { Inertia } from "@inertiajs/inertia";
import PusherMixin from "@/Mixins/PusherMixin.vue";
import DoctorCountryFilter from "@/Components/DoctorCountryFilter.vue";
export default {
  props: {
    title: String,
    showLoader: Boolean,
  },
  mixins: [PusherMixin],

  components: {
    Head,
    DoctorCountryFilter,
    Link,
    Footer,
    Navbar,
  },

  data() {
    return {
      showingNavigationDropdown: false,
      showLoader: false,
      pusherDeviceId: "",
      pusher_sender_id: "",
    };
  },
  watch: {
    "$page.props.flash.alert": {
      handler() {
        this.showAlert();
      },
      deep: true,
    },
  },
  created() {
    Inertia.on("start", (event) => {
      if (
        event.detail.visit.method == "get" &&
        event.detail.visit.url.pathname != this.path
      ) {
        this.showLoader = true;
      }
    });
    Inertia.on("finish", (event) => {
      this.showLoader = false;
    });
  },
  mounted() {
    this.showAlert();
    if (this.$page.props.auth) {
      if (this.$page.props.auth.logged_in_as == "doctor") {
        this.pusher_sender_id = this.$page.props.auth.user.doctor.id;
      }
      if (this.$page.props.auth.logged_in_as == "patient") {
        this.pusher_sender_id = this.$page.props.auth.user.patient.id;
      }
      if (this.$page.props.auth.logged_in_as == "clinic") {
        this.pusher_sender_id = this.$page.props.auth.user.clinic.id;
      }
      if (this.$page.props.settings.pusher_beams_instance_id) {
        const VITE_PUSHER_BEAMS_INSTANCE_ID =
          this.$page.props.settings.pusher_beams_instance_id;
        const beamsClient = new PusherPushNotifications.Client({
          instanceId: VITE_PUSHER_BEAMS_INSTANCE_ID,
        });
        const tokenProvider = new PusherPushNotifications.TokenProvider({
          url: "/api/v1/pusher/beams-auth",
        });
        beamsClient
          .start()
          .then((beamsClient) => beamsClient.getDeviceId())
          .then((deviceId) => {
            this.pusherDeviceId = deviceId;
          })
          .then(() =>
            beamsClient.setUserId(`${this.pusher_sender_id}`, tokenProvider)
          )
          .then(() => {})
          .catch((e) => console.error("Could not authenticate with Beams:", e));
      }
    }
  },
  methods: {
    showLoaderEvent(data) {
      this.showLoader = data;
    },
    logout() {
      if (this.$page.props.settings.pusher_beams_instance_id) {
        const VITE_PUSHER_BEAMS_INSTANCE_ID =
          this.$page.props.settings.pusher_beams_instance_id;
        const beamsClient = new PusherPushNotifications.Client({
          instanceId: VITE_PUSHER_BEAMS_INSTANCE_ID,
        });
        beamsClient
          .clearAllState()
          .then(() => {})
          .catch((e) => console.error("Could not clear Beams state", e));
      }
      this.$inertia.post(route("logout"));
    },
    showAlert() {
      if (this.$page.props.flash.alert) {
        if (this.$page.props.flash.alert.type == "success") {
          this.$toast.success(this.$page.props.flash.alert.message);
        } else if (this.$page.props.flash.alert.type == "error") {
          this.$toast.error(this.$page.props.flash.alert.message);
        } else if (this.$page.props.flash.alert.type == "warning") {
          this.$toast.warning(this.$page.props.flash.alert.message);
        } else if (this.$page.props.flash.alert.type == "info") {
          this.$toast.info(this.$page.props.flash.alert.message);
        } else {
          this.$toast.show(this.$page.props.flash.alert.message);
        }
      }
    },
  },

  computed: {
    path() {
      return window.location.pathname;
    },
  },
};
</script>
