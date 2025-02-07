<template>
  <div class="card rounded-3">
    <div class="row g-0 align-items-center">
      <div class="col-md-3">
        <div class="p-3">
          <Link
            class="text-decoration-none"
            :href="route('clinic.profile', { user_name: clinic.user_name })"
          >
            <div
              class="clinic-img-list overflow-hidden position-relative rounded-5"
            >
              <img
                v-if="clinic.image"
                class="w-100 h-100 object-fit-cover"
                :src="clinic.image"
                alt="doctor"
              />
              <img
                v-if="!clinic.image"
                class="img-fluid"
                src="@/images/account/default_avatar_men.png"
                alt="doctor"
              />
            </div>
          </Link>
          <!-- <div class="d-flex align-items-center justify-content-center mt-1">

            <star-rating :rating="doctor.rating" :star-size="16" :read-only="true" :increment="0.01"
              :show-rating="false"></star-rating>
            <span class="text-dark small mt-1 ps-1">({{ doctor.rating }})</span>
          </div> -->
        </div>
      </div>
      <div class="col-md-9 py-md-4">
        <div class="card-body py-md-0 pe-md-5">
          <div class="d-flex align-items-center mb-1">
            <div
              class="d-flex align-items-center justify-content-between w-100"
            >
              <h2
                class="fs-4 fw-bold text-dark d-flex align-items-center mb-0 text-capitalize"
              >
                <!-- <i
                  v-if="doctor.is_featured"
                  class="bi bi-patch-check-fill me-1 text-primary"
                ></i> -->
                <Link
                  class="text-decoration-none text-body d-flex align-items-center"
                  :href="
                    route('clinic.profile', { user_name: clinic.user_name })
                  "
                >
                  <span class="fs-1 text-primary fw-bold">{{
                    clinic.name
                  }}</span>
                </Link>
              </h2>
              <div class="d-flex align-items-center gap-4">
                <span class="d-flex align-items-center mx-2">
                  <span
                    v-if="clinic.is_online"
                    class="d-flex align-items-center fs-5"
                    style="color: #24ff00"
                  >
                    <i class="bi bi-circle-fill"></i
                    ><span class="ms-2 subheading-fs">{{ __("Online") }}</span>
                  </span>
                  <span
                    v-else
                    class="d-flex align-items-center fs-5 text-muted"
                  >
                    <i class="bi bi-circle-fill"></i
                    ><span class="ms-2 subheading-fs">{{ __("Offline") }}</span>
                  </span>
                </span>
                <img
                  v-if="clinic.is_premium"
                  src="@/images/icons/medal.png"
                  width="30"
                  alt="Icon"
                />
              </div>
            </div>
          </div>

          <div class="row align-items-center justify-content-between mt-2">
            <ul
              class="list-unstyled truncate"
              v-if="
                clinic.clinic_categories && clinic.clinic_categories.length > 0
              "
            >
              <li
                class="me-2 lh-1 d-inline-block fs-3 text-dark fw-normal pe-2"
                v-for="(cat, i) in clinic.clinic_categories"
                :key="cat.id"
                v-bind:class="{
                  'border-end': i != clinic.clinic_categories.length - 1,
                }"
              >
                {{ cat.name }}
              </li>
            </ul>
            <!-- <div class="col-12">
              <small
                v-if="doctor.clinic_name"
                class="text-black fs-4 fw-normal"
                >{{ doctor.clinic_name }}</small
              >
              <span
                class="fw-normal fs-5 small ps-1 ms-2 fw-bold"
                style="border-left: 1px solid"
                v-if="doctor.distance"
              >
                ( {{ formatDecimal(doctor.distance) }} Km) Away
              </span>
            </div> -->
          </div>

          <div class="row mb-4">
            <div class="col-12">
              <div
                v-html="clinic.description"
                class="line-clamp"
                style="font-size: 16px; font-weight: normal; color: #696868"
              ></div>
            </div>
          </div>

          <div class="row align-items-center">
            <div class="col-md-3 text-start mb-2 mb-md-0">
              <star-rating
                class="mb-3 gap-2"
                :rating="clinic.rating"
                :star-size="20"
                :read-only="true"
                :increment="0.01"
                :show-rating="false"
              ></star-rating>
              <ul
                v-if="checkObjectValuesIsNotNull(clinic.clinic_settings)"
                class="d-flex gap-2 flex-wrap ps-0 mb-0 list-group list-group-horizontal"
              >
                <li
                  class="list-group-item rounded-2 d-flex align-items-center justify-content-center bg-primary border-0 listing-card-icons"
                  v-if="clinic.clinic_settings.facebook_url"
                >
                  <a
                    target="_blank"
                    class="text-white"
                    :href="clinic.clinic_settings.facebook_url"
                    ><i class="bi bi-facebook fs-3"></i
                  ></a>
                </li>
                <!-- <li
                  class="list-group-item rounded-2 d-flex align-items-center justify-content-center bg-primary border-0 listing-card-icons"
                  v-if="clinic.clinic_settings.youtube_url"
                >
                  <a
                    target="_blank"
                    class="text-white"
                    :href="clinic.clinic_settings.youtube_url"
                    ><i class="bi bi-youtube fs-3"></i
                  ></a>
                </li> -->
                <li
                  class="list-group-item rounded-2 d-flex align-items-center justify-content-center bg-primary border-0 listing-card-icons"
                  v-if="clinic.clinic_settings.twitter_url"
                >
                  <a
                    target="_blank"
                    class="text-white"
                    :href="clinic.clinic_settings.twitter_url"
                    ><i class="bi bi-twitter fs-3"></i
                  ></a>
                </li>
                <li
                  class="list-group-item rounded-2 d-flex align-items-center justify-content-center bg-primary border-0 listing-card-icons"
                  v-if="clinic.clinic_settings.linkedin_url"
                >
                  <a
                    target="_blank"
                    class="text-white"
                    :href="clinic.clinic_settings.linkedin_url"
                    ><i class="bi bi-linkedin fs-3"></i
                  ></a>
                </li>
                <!-- <li
                  class="list-group-item rounded-2 d-flex align-items-center justify-content-center bg-primary border-0 listing-card-icons"
                  v-if="clinic.clinic_settings.whatsapp_url"
                >
                  <a
                    target="_blank"
                    class="text-white"
                    :href="clinic.clinic_settings.whatsapp_url"
                    ><i class="bi bi-whatsapp fs-3"></i
                  ></a>
                </li>
                <li
                  class="list-group-item rounded-2 d-flex align-items-center justify-content-center bg-primary border-0 listing-card-icons"
                  v-if="clinic.clinic_settings.instagram_url"
                >
                  <a
                    target="_blank"
                    class="text-white"
                    :href="clinic.clinic_settings.instagram_url"
                    ><i class="bi bi-instagram fs-3"></i
                  ></a>
                </li>
                <li
                  class="list-group-item rounded-2 d-flex align-items-center justify-content-center bg-primary border-0 listing-card-icons"
                  v-if="clinic.clinic_settings.tiktok_url"
                >
                  <a
                    target="_blank"
                    class="text-white"
                    :href="clinic.clinic_settings.tiktok_url"
                    ><i class="bi bi-tiktok fs-3"></i
                  ></a>
                </li>
                <li
                  class="list-group-item rounded-2 d-flex align-items-center justify-content-center bg-primary border-0 listing-card-icons"
                  v-if="clinic.clinic_settings.snapchat_url"
                >
                  <a
                    target="_blank"
                    class="text-white"
                    :href="clinic.clinic_settings.snapchat_url"
                    ><i class="bi bi-snapchat fs-3"></i
                  ></a>
                </li>
                <li
                  class="list-group-item rounded-2 d-flex align-items-center justify-content-center bg-primary border-0 listing-card-icons"
                  v-if="clinic.clinic_settings.pinterest_url"
                >
                  <a
                    target="_blank"
                    class="text-white"
                    :href="clinic.clinic_settings.pinterest_url"
                    ><i class="bi bi-pinterest fs-3"></i
                  ></a>
                </li> -->
              </ul>

              <!-- <span class="text-dark small mt-1 ps-1 fs-5"
                  >({{ doctor.rating }})</span
                > -->
            </div>
            <div
              class="col-md-3 text-start mb-2 mb-md-0 font-roboto"
              v-if="clinic.experience"
            >
              <h6 class="fs-3 text-black fw-semibold">
                {{ __("experience") }}
              </h6>
              <span
                style="color: #2d2d2d"
                class="fs-4"
                v-if="clinic.experience == 1"
                >{{ clinic.experience }} {{ __("year") }}</span
              >
              <span style="color: #2d2d2d" class="fs-4" v-else
                >{{ clinic.experience }} {{ __("years") }}</span
              >
            </div>

            <div
              v-if="clinic.speciality"
              class="col-md-3 text-start mb-2 mb-md-0 font-roboto"
            >
              <h6 class="fs-3 text-black fw-semibold">
                {{ __("speciality") }}
              </h6>
              <span style="color: #2d2d2d" class="fs-4">{{
                clinic.speciality
              }}</span>
            </div>
            <div class="col-md-3 justify-content-end py-2 py-md-0">
              <Link
                :href="route('clinic.profile', { user_name: clinic.user_name })"
                class="btn btn-secondary fs-3 fw-bold shadow-find rounded-4 ps-md-3 py-2 d-inline-flex align-items-center"
                >{{ __("View Detail")
                }}<img
                  width="30"
                  class="ms-3"
                  src="@/images/icons/loginbtnicon.png"
              /></Link>
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

export default defineComponent({
  components: {
    Link,
  },
  props: ["clinic", "view_type"],
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
  },
});
</script>


<style>
.listing-card-icons {
  width: 38px;
  height: 32px;
}

.font-roboto {
  font-family: "Roboto", sans-serif;
}
</style>
