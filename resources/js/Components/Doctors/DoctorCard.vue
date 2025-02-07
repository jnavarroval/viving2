<template>
  <div class="doctor-card">
    <div class="card bg-transparent rounded-5 overflow-hidden">
      <div
        class="d-flex card-img justify-content-center overflow-hidden rounded-4"
        :class="doctortab ? 'img-doctor-tab' : 'img-doctor'"
      >
        <img
          v-if="doctor.image"

          class="img-fluid object-fit-cover"
          :src="doctor.image"
          alt="doctor"
        />
        <img
          v-if="!doctor.image"
          class="img-fluid object-fit-cover w-100"
          src="@/images/account/default_avatar_men.png"
          alt="doctor"
        />

        <span
          class="d-flex align-items-center mx-1 position-absolute end-0 p-3"
        >
          <img
            v-if="doctor.is_featured"
            src="@/images/icons/medal.svg"
            width="30"
            class="mt-2"
            alt="featured"
          />
        </span>

        <div class="left-side">
          <div class="socialhvr">
            <a
              class="icon-container"
              target="_blank"
              v-if="doctor.doctor_settings.facebook_url"
              :href="doctor.doctor_settings.facebook_url"
              ><i
                class="bi bi-facebook text-white"
                :class="doctortab ? 'ms-1' : 'ms-0'"
              ></i
            ></a>
            <a
              class="icon-container"
              target="_blank"
              v-if="doctor.doctor_settings.twitter_url"
              :href="doctor.doctor_settings.twitter_url"
              ><i
                class="bi bi-twitter text-white"
                :class="doctortab ? 'ms-1' : 'ms-0'"
              ></i
            ></a>
            <a
              class="icon-container"
              target="_blank"
              v-if="doctor.doctor_settings.linkedin_url"
              :href="doctor.doctor_settings.linkedin_url"
              ><i
                class="bi bi-linkedin text-white"
                :class="doctortab ? 'ms-1' : 'ms-0'"
              ></i
            ></a>
          </div>
        </div>
        <!-- <ul class="d-flex ps-0 mb-0 social flex-wrap flex-md-nowrap gap-1 gap-md-0 mt-2 mt-md-0">
                                        <li class="list-group-item border-0" v-if="doctor.doctor_settings.facebook_url
                                            ">
                                            <a  target="_blank" :href="doctor.doctor_settings
                                                .facebook_url
                                                "><i class="bi bi-facebook"></i></a>
                                        </li>
                                        <li class="list-group-item border-0" v-if="doctor.doctor_settings.youtube_url
                                            ">
                                            <a  target="_blank" :href="doctor.doctor_settings
                                                .youtube_url
                                                "><i class="bi bi-youtube"></i></a>
                                        </li>
                                        <li class="list-group-item border-0" v-if="doctor.doctor_settings.twitter_url
                                            ">
                                            <a  target="_blank" :href="doctor.doctor_settings
                                                .twitter_url
                                                "><i class="bi  bi-twitter"></i></a>
                                        </li>
                                        <li class="list-group-item  border-0" v-if="doctor.doctor_settings.linkedin_url
                                            ">
                                            <a  target="_blank" :href="doctor.doctor_settings
                                                .linkedin_url
                                                "><i class="bi  bi-linkedin"></i></a>
                                        </li>
                                        <li class="list-group-item border-0" v-if="doctor.doctor_settings.whatsapp_url
                                            ">
                                            <a  target="_blank" :href="doctor.doctor_settings
                                                .whatsapp_url
                                                "><i class="bi bi-whatsapp"></i></a>
                                        </li>
                                        <li class="list-group-item border-0" v-if="doctor.doctor_settings.instagram_url
                                            ">
                                            <a  target="_blank" :href="doctor.doctor_settings
                                                .instagram_url
                                                "><i class="bi bi-instagram"></i></a>
                                        </li>
                                        <li class="list-group-item border-0"
                                            v-if="doctor.doctor_settings.tiktok_url">
                                            <a  target="_blank" :href="doctor.doctor_settings
                                                .tiktok_url
                                                "><i class="bi bi-tiktok"></i></a>
                                        </li>
                                        <li class="list-group-item border-0" v-if="doctor.doctor_settings.snapchat_url
                                            ">
                                            <a  target="_blank" :href="doctor.doctor_settings
                                                .snapchat_url
                                                "><i class="bi bi-snapchat"></i></a>
                                        </li>
                                        <li class="list-group-item border-0" v-if="doctor.doctor_settings.pinterest_url
                                            ">
                                            <a  target="_blank" :href="doctor.doctor_settings
                                                .pinterest_url
                                                "><i class="bi bi-pinterest"></i></a>
                                        </li>
                                    </ul> -->

        <div v-if="!doctortab" class="hvr px-4">
          <div class="d-flex flex-column align-items-center mb-1">
            <Link
              class="text-decoration-none pt-2"
              :href="route('doctor.profile', { user_name: doctor.user_name })"
            >
              <h2 class="card-title fs-2 fw-bold mb-2">{{ doctor.name }}</h2>
            </Link>

            <h6 class="fs-3 card-subtitle">
              {{ getCategoryNames(doctor.doctor_categories) }}
            </h6>
          </div>
        </div>
      </div>
      <!-- Doctor Tabs -->
      <div v-if="doctortab" class="card-body">
        <div class="d-flex flex-column align-items-start mb-1">
          <Link
            class="text-decoration-none pt-2"
            :href="route('doctor.profile', { user_name: doctor.user_name })"
          >
            <h2 class="card-title fs-2 text-primary mb-2">{{ doctor.name }}</h2>
          </Link>

          <h6 class="fs-3 fw-normal text-black">
            {{ getCategoryNames(doctor.doctor_categories) }}
          </h6>

          <star-rating
            :rating="doctor.rating"
            :star-size="20"
            :read-only="true"
            :increment="0.01"
            :show-rating="false"
          ></star-rating>
        </div>
      </div>
      <!-- Doctor Tabs -->
    </div>
  </div>

  <!-- <span v-if="doctor.is_online" class="d-flex fs-3" style="color: #08FA20;">
                    <i class="bi bi-circle-fill"></i>
                  </span>
                  <span v-else class="d-flex fs-3 text-muted">
                    <i class="bi bi-circle-fill"></i>
                  </span> -->

  <!-- <i v-if="doctor.is_premium" class="bi bi-patch-check-fill me-1 text-primary"></i> -->

  <!-- <small v-if="doctor.clinic_name" class="text-muted">({{ doctor.clinic_name }})</small> -->
  <!-- <img v-if="doctor.is_premium" src="@/images/icons/is_premium.svg" alt="Icon"> -->
  <!-- <div class="d-flex align-items-center">
          <span class="fs-4 fw-lightbold" v-if="doctor.experience == 1">{{ doctor.experience }} {{ __("Years Experience") }}</span>
          <span class="fs-4 fw-lightbold" v-else>{{ doctor.experience }} {{ __("Years Experience") }}</span>

        </div> -->

  <!-- <div class="d-flex align-items-center mb-2">
          <star-rating :rating="doctor.rating" :star-size="16" :read-only="true" :increment="0.01"
            :show-rating="false"></star-rating>
          <span class="text-dark small mt-1 ps-1"> ({{
            doctor.rating
          }})</span>
        </div> -->
</template>
<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Link,
  },
  props: ["doctor", "doctortab"],
  created() {},
  data() {
    return {};
  },
  methods: {
    checkLoginAndRedirect(doctor, appointment_type) {
      if (this.$page.props.auth) {
        if (this.$page.props.auth.logged_in_as == "patient") {
          this.$inertia.visit(
            route("doctor.book_appointment", {
              user_name: doctor.user_name,
              type: appointment_type.type,
            })
          );
        } else {
          this.$toast.warning("You must log in as a patient");
        }
      } else {
        this.$toast.warning("Please login first");
        this.$inertia.visit(route("login"), {
          data: {
            is_redirect: 1,
          },
        });
      }
    },
    getCategoryNames(main_categories) {
      return main_categories
        .slice(0, 1)
        .map((category) => category.name)
        .join(" , ");
    },
  },
});
</script>

<style scoped>
.img-doctor {
  width: 100%;
  height: 430px;
}
.img-doctor-tab {
  width: 100%;
  height: 320px;
}
</style>
