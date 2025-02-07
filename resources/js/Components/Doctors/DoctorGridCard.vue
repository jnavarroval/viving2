<template>
  <div class="doctor-card">
    <div class="card bg-transparent">
      <div
        class="d-flex card-img justify-content-center overflow-hidden rounded-5"
      >
        <div class="img-doctor-tab">
          <img
            v-if="doctor.image"
            class="img-fluid h-100 object-fit-cover"
            :src="doctor.image"
            alt="doctor"
          />
          <img
            v-if="!doctor.image"
            class="img-fluid h-100 w-100"
            src="@/images/account/default_avatar_men.png"
            alt="doctor"
          />
        </div>

        <span
          class="d-flex flex-column gap-2 align-items-center mx-1 position-absolute end-0 p-3"
        >
          <span
            v-if="doctor.is_online"
            class="d-flex fs-3"
            style="color: #08fa20"
          >
            <i class="bi bi-circle-fill"></i>
          </span>
          <span v-else class="d-flex fs-3 text-muted">
            <i class="bi bi-circle-fill"></i>
          </span>

          <img
            v-if="doctor.is_featured"
            src="@/images/icons/medal.svg"
            width="30"
            class="mt-2"
            alt=""
          />
        </span>

        <div class="left-side">
          <div class="socialhvr">
            <a
              class="icon-container"
              target="_blank"
              v-if="doctor.doctor_settings.facebook_url"
              :href="doctor.doctor_settings.facebook_url"
              ><i class="bi bi-facebook text-white ms-2"></i
            ></a>
            <a
              class="icon-container"
              target="_blank"
              v-if="doctor.doctor_settings.twitter_url"
              :href="doctor.doctor_settings.twitter_url"
              ><i class="bi bi-twitter text-white ms-2"></i
            ></a>
            <a
              class="icon-container"
              target="_blank"
              v-if="doctor.doctor_settings.linkedin_url"
              :href="doctor.doctor_settings.linkedin_url"
              ><i class="bi bi-linkedin text-white ms-2"></i
            ></a>
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
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex flex-column align-items-start mb-1">
          <Link
            class="text-decoration-none pt-2"
            :href="route('doctor.profile', { user_name: doctor.user_name })"
          >
            <h2 class="fs-2 fw-bold text-primary mb-2">{{ doctor.name }}</h2>
          </Link>

          <h6 class="fs-3 fw-normal text-black">
            {{ getCategoryNames(doctor.doctor_categories) }}
          </h6>

          <star-rating
            :rating="doctor.rating"
            :star-size="16"
            :read-only="true"
            :increment="0.01"
            :show-rating="false"
          ></star-rating>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="card">
    <div class="px-3 pt-3">
      <Link
        class="text-decoration-none"
        :href="route('doctor.profile', { user_name: doctor.user_name })"
      >
        <div
          class="d-flex justify-content-center overflow-hidden position-relative rounded-4"
        >
          <img
            v-if="doctor.image"
            style="width: 100%"
            class="img-fluid"
            :src="doctor.image"
            alt="doctor"
          />
          <img
            v-if="!doctor.image"
            class="img-fluid"
            src="@/images/account/default_avatar_men.png"
            alt="doctor"
          />
          <span
            class="d-flex align-items-center mx-1 position-absolute end-0 p-3"
          >
            <span
              v-if="doctor.is_online"
              class="d-flex fs-3"
              style="color: #08fa20"
            >
              <i class="bi bi-circle-fill"></i>
            </span>
            <span v-else class="d-flex fs-3 text-muted">
              <i class="bi bi-circle-fill"></i>
            </span>
          </span>
        </div>
      </Link>
    </div>
    <div class="card-body">
      <div class="d-flex align-items-center mb-1">
        <div class="d-flex justify-content-between align-items-center w-100">
          <h2
            class="fs-3 fw-bold text-dark d-flex align-items-center justify-content-between mb-0 text-capitalize"
          >
            <i
              v-if="doctor.is_featured"
              class="bi bi-patch-check-fill me-1 text-primary"
            ></i>
            <Link
              class="text-decoration-none text-body d-flex align-items-center"
              :href="route('doctor.profile', { user_name: doctor.user_name })"
            >
              <span>{{ doctor.name }} </span>
            </Link>
          </h2>
          <img
            v-if="doctor.is_premium"
            src="@/images/icons/is_premium.svg"
            alt="Icon"
          />
        </div>
      </div>

      <div class="d-flex align-items-center mb-2">
        <star-rating
          :rating="doctor.rating"
          :star-size="16"
          :read-only="true"
          :increment="0.01"
          :show-rating="false"
        ></star-rating>
        <span class="text-dark small mt-1 ps-1"> ({{ doctor.rating }})</span>
      </div>

      <div class="d-flex align-items-center">
        <span class="fs-4" v-if="doctor.experience == 1"
          >{{ doctor.experience }} {{ __("Years experience") }}</span
        >
        <span class="fs-4" v-else
          >{{ doctor.experience }} {{ __("Years Experience") }}</span
        >
      </div>
    </div>
  </div> -->
</template>
<!-- <small v-if="doctor.clinic_name" class="text-muted">({{ doctor.clinic_name }})</small> -->
<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Link,
  },
  props: ["doctor"],
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
        .slice(0, 2)
        .map((category) => category.name)
        .join(" , ");
    },
  },
});
</script>

