<template>
  <div class="doctor-card">
    <div class="card bg-transparent">
      <div class="d-flex card-img justify-content-center overflow-hidden rounded-5">
        <div class="img-doctor-tab">
          <img
            v-if="clinic.image"
            class="img-fluid object-fit-cover h-100 w-100"
            :src="clinic.image"
            alt="doctor"
          />
          <img
            v-if="!clinic.image"
            class="img-fluid h-100 w-100"
            src="@/images/account/default_avatar_men.png"
            alt="doctor"
          />
        </div>

        <span
          class="d-flex flex-column gap-2 align-items-center mx-1 position-absolute end-0 p-3"
        >
          <span v-if="clinic.is_online" class="d-flex fs-3" style="color: #08fa20">
            <i class="bi bi-circle-fill"></i>
          </span>
          <span v-else class="d-flex fs-3 text-muted">
            <i class="bi bi-circle-fill"></i>
          </span>

          <img
            v-if="clinic.is_featured"
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
              v-if="clinic.clinic_settings.facebook_url"
              :href="clinic.clinic_settings.facebook_url"
              ><i class="bi bi-facebook text-white ms-2"></i
            ></a>
            <a
              class="icon-container"
              target="_blank"
              v-if="clinic.clinic_settings.twitter_url"
              :href="clinic.clinic_settings.twitter_url"
              ><i class="bi bi-twitter text-white ms-2"></i
            ></a>
            <a
              class="icon-container"
              target="_blank"
              v-if="clinic.clinic_settings.linkedin_url"
              :href="clinic.clinic_settings.linkedin_url"
              ><i class="bi bi-linkedin text-white ms-2"></i
            ></a>
          </div>

          <!-- <ul class="d-flex ps-0 mb-0 social flex-wrap flex-md-nowrap gap-1 gap-md-0 mt-2 mt-md-0">
                                        <li class="list-group-item border-0" v-if="clinic.clinic_settings.facebook_url
                                            ">
                                            <a  target="_blank" :href="clinic.clinic_settings
                                                .facebook_url
                                                "><i class="bi bi-facebook"></i></a>
                                        </li>
                                        <li class="list-group-item border-0" v-if="clinic.clinic_settings.youtube_url
                                            ">
                                            <a  target="_blank" :href="clinic.clinic_settings
                                                .youtube_url
                                                "><i class="bi bi-youtube"></i></a>
                                        </li>
                                        <li class="list-group-item border-0" v-if="clinic.clinic_settings.twitter_url
                                            ">
                                            <a  target="_blank" :href="clinic.clinic_settings
                                                .twitter_url
                                                "><i class="bi  bi-twitter"></i></a>
                                        </li>
                                        <li class="list-group-item  border-0" v-if="clinic.clinic_settings.linkedin_url
                                            ">
                                            <a  target="_blank" :href="clinic.clinic_settings
                                                .linkedin_url
                                                "><i class="bi  bi-linkedin"></i></a>
                                        </li>
                                        <li class="list-group-item border-0" v-if="clinic.clinic_settings.whatsapp_url
                                            ">
                                            <a  target="_blank" :href="clinic.clinic_settings
                                                .whatsapp_url
                                                "><i class="bi bi-whatsapp"></i></a>
                                        </li>
                                        <li class="list-group-item border-0" v-if="clinic.clinic_settings.instagram_url
                                            ">
                                            <a  target="_blank" :href="clinic.clinic_settings
                                                .instagram_url
                                                "><i class="bi bi-instagram"></i></a>
                                        </li>
                                        <li class="list-group-item border-0"
                                            v-if="clinic.clinic_settings.tiktok_url">
                                            <a  target="_blank" :href="clinic.clinic_settings
                                                .tiktok_url
                                                "><i class="bi bi-tiktok"></i></a>
                                        </li>
                                        <li class="list-group-item border-0" v-if="clinic.clinic_settings.snapchat_url
                                            ">
                                            <a  target="_blank" :href="clinic.clinic_settings
                                                .snapchat_url
                                                "><i class="bi bi-snapchat"></i></a>
                                        </li>
                                        <li class="list-group-item border-0" v-if="clinic.clinic_settings.pinterest_url
                                            ">
                                            <a  target="_blank" :href="clinic.clinic_settings
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
            :href="route('clinic.profile', { user_name: clinic.user_name })"
          >
            <h2 class="fs-2 fw-bold text-primary mb-2">{{ clinic.name }}</h2>
          </Link>

          <h6 class="fs-3 fw-normal text-black">
            {{ getCategoryNames(clinic.clinic_categories) }}
          </h6>

          <star-rating
            :rating="clinic.rating"
            :star-size="20"
            :read-only="true"
            :increment="0.01"
            :show-rating="false"
          ></star-rating>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Link,
  },
  props: ["clinic", "add_col"],
  created() {},
  data() {
    return {};
  },
  methods: {
    checkLoginAndRedirect(clinic, appointment_type) {
      if (this.$page.props.auth) {
        if (this.$page.props.auth.logged_in_as == "patient") {
          this.$inertia.visit(
            route("clinic.book_appointment", {
              user_name: clinic.user_name,
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
