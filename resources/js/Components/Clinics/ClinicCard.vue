<template>
  <!-- :class="{ 'col-md-4 col-clinic': add_col, 'w-100': !add_col }" -->


  <div

    class="card w-100 rounded-0 shadow-none pt-4 mx-md-3"
    style="background-color: #ebf3f9"
  >
    <div class="card-body pb-0 px-3">
      <div class="row px-md-3">
        <div class="col-lg-3">
          <!-- <i v-if="clinic.is_featured" class="bi text-primary bi-patch-check-fill position-absolute top-0 start-0 ms-2 fs-2" style="z-index: 2;"></i> -->
          <Link
            :href="route('clinic.profile', { user_name: clinic.user_name })"
          >
            <div
              class="d-flex justify-content-center rounded-5 overflow-hidden"
              style="height: 250px"
            >
              <img
                v-if="clinic.image"
                class="img-fluid object-fit-cover"
                :src="clinic.image"
                alt="law"
              />
              <img
                v-if="!clinic.image"
                class="img-fluid"
                src="@/images/account/default_avatar_men.png"
                alt="law"
              />
            </div>
          </Link>
        </div>
        <div class="col-lg-9 ps-md-4">
          <div
            class="d-flex flex-column flex-md-row align-items-center justify-content-between mt-3 mt-md-0 mb-1"
          >
            <div class="d-flex mb-0 mb-md-2 flex-column align-items-start">
              <h2 class="mb-md-0 mb-3 fs-5 text-capitalize">
                <Link
                  :href="
                    route('clinic.profile', { user_name: clinic.user_name })
                  "
                  class="text-decoration-none text-primary fw-bold fs-2 mb-3 mb-md-0"
                  >{{ clinic.name }}</Link
                >
              </h2>
            </div>
            <div
              class="text-end d-flex flex-column flex-md-row align-items-center gap-md-4"
            >
              <div class="d-flex align-items-center">
                <star-rating
                  :rating="clinic.rating"
                  :star-size="15"
                  :read-only="true"
                  :increment="0.01"
                  :show-rating="false"
                ></star-rating>
                <span class="text-black fw-bold opacity-50 mt-1 ps-1 fs-5"
                  >({{ clinic.rating }} /5)</span
                >
              </div>

              <Link
                :href="route('clinic.profile', { user_name: clinic.user_name })"
                class="btn btn-secondary fw-bold px-4 fs-3 py-2 rounded-4 my-3 my-md-0"
              >
                {{
                  getPageContent("general_book_btn_1_text") ??
                  __("book appointment")
                }}
              </Link>
            </div>
          </div>

          <div class="d-flex align-items-center gap-3 mb-3">
            <h3 class="fs-3 text-black fw-normal mb-0">
              {{ clinic.clinic_categories[0].name }}
            </h3>
            <span class="d-flex align-items-center gap-2">
              <img src="@/images/icons/pin_fill.png" alt="" />
              <h6 class="fs-5 text-black opacity-50 mb-0 fw-normal">
                {{ clinic.distance }}
              </h6>
            </span>
          </div>

          <!-- <ul
            class="list-unstyled d-flex flex-wrap mb-3"
            v-if="clinic.clinic_categories.length > 0"
          >
            <li
              class="me-2 fs-5 pe-2 text-black fw-lightbold mb-1 border-end"
              v-for="(category, index) in clinic.clinic_categories"
              :key="index"
            >
              {{ category.name }}
            </li>
          </ul> -->

          <div
            style="
              font-size: 16px;
              color: rgb(105, 104, 104);
              line-height: 27px;
            "
            class="text-start mb-4"
            v-html="clinic.description"
          ></div>

          <div class="row d-flex mb-3">
            <!-- <div class="col-md-4 text-start" v-if="clinic.experience"> -->
            <div class="col-md-3 text-start mb-2 mb-md-0">
              <h6 class="fs-3 text-primary fw-bold">{{ __("experience") }}</h6>
              <span class="fs-3 text-dark opacity-50"
                >{{ clinic.experience ?? 3 }}+,{{ __("since 2016") }}</span
              >
              <!-- <span class="fs-5 text-lightsecondary" v-if="clinic.experience == 1">{{ clinic.experience }} {{ __("year") }}</span>
                            <span class="fs-5 text-lightsecondary" v-else>{{ clinic.experience }} {{ __("years") }}</span> -->
            </div>
            <div class="col-md-3 text-start mb-2 mb-md-0">
              <h6 class="fs-3 text-primary fw-bold">{{ __("doctors") }}</h6>
              <span class="fs-3 text-dark opacity-50"
                >{{ clinic.total_clinic_doctors }}+{{ __("doctors") }}</span
              >
            </div>

            <!-- <div class="col-md-4 text-start" v-if="clinic.speciality"> -->
            <!-- <div class="col-md-4 text-start mb-2 mb-md-0">
              <h6 class="fs-5 fw-bold">{{ __("speciality") }}</h6>
              <span class="fs-5 text-lightsecondary">{{
                __("Real Estate Law")
              }}</span>
              <span class="fs-5 text-lightsecondary">{{ clinic.speciality }}</span>
            </div> -->
            <div class="col-md-3 text-start mb-2 mb-md-0">
              <h6 class="fs-3 text-primary fw-bold">{{ __("socials") }}</h6>
              <div
                class="col-md-12 text-start"
                v-if="checkObjectValuesIsNotNull(clinic.clinic_settings)"
              >
                <div class="d-flex justify-content-between align-items-center">
                  <ul
                    class="d-flex flex-wrap justify-content-start gap-2 ps-0 mb-0 list-group list-group-horizontal"
                  >
                    <li
                      class="list-group-item p-1 py-0 bg-transparent border-0"
                      v-if="clinic.clinic_settings.facebook_url"
                    >
                      <a
                        target="_blank"
                        class="text-dark"
                        :href="clinic.clinic_settings.facebook_url"
                        ><i class="bi bi-facebook fs-4"></i
                      ></a>
                    </li>
                    <li
                      class="list-group-item p-1 py-0 bg-transparent border-0"
                      v-if="clinic.clinic_settings.youtube_url"
                    >
                      <a
                        target="_blank"
                        class="text-dark"
                        :href="clinic.clinic_settings.youtube_url"
                        ><i class="bi bi-youtube fs-4"></i
                      ></a>
                    </li>
                    <li
                      class="list-group-item p-1 py-0 bg-transparent border-0"
                      v-if="clinic.clinic_settings.twitter_url"
                    >
                      <a
                        target="_blank"
                        class="text-dark"
                        :href="clinic.clinic_settings.twitter_url"
                        ><i class="bi bi-twitter fs-4"></i
                      ></a>
                    </li>
                    <li
                      class="list-group-item p-1 py-0 bg-transparent border-0"
                      v-if="clinic.clinic_settings.linkedin_url"
                    >
                      <a
                        target="_blank"
                        class="text-dark"
                        :href="clinic.clinic_settings.linkedin_url"
                        ><i class="bi bi-linkedin fs-4"></i
                      ></a>
                    </li>
                    <li
                      class="list-group-item p-1 py-0 bg-transparent border-0"
                      v-if="clinic.clinic_settings.whatsapp_url"
                    >
                      <a
                        target="_blank"
                        class="text-dark"
                        :href="clinic.clinic_settings.whatsapp_url"
                        ><i class="bi bi-whatsapp fs-4"></i
                      ></a>
                    </li>
                    <li
                      class="list-group-item p-1 py-0 bg-transparent border-0"
                      v-if="clinic.clinic_settings.instagram_url"
                    >
                      <a
                        target="_blank"
                        class="text-dark"
                        :href="clinic.clinic_settings.instagram_url"
                        ><i class="bi bi-instagram fs-4"></i
                      ></a>
                    </li>
                    <li
                      class="list-group-item p-1 py-0 bg-transparent border-0"
                      v-if="clinic.clinic_settings.tiktok_url"
                    >
                      <a
                        target="_blank"
                        class="text-dark"
                        :href="clinic.clinic_settings.tiktok_url"
                        ><i class="bi bi-tiktok fs-4"></i
                      ></a>
                    </li>
                    <li
                      class="list-group-item p-1 py-0 bg-transparent border-0"
                      v-if="clinic.clinic_settings.snapchat_url"
                    >
                      <a
                        target="_blank"
                        class="text-dark"
                        :href="clinic.clinic_settings.snapchat_url"
                        ><i class="bi bi-snapchat fs-4"></i
                      ></a>
                    </li>
                    <li
                      class="list-group-item p-1 py-0 bg-transparent border-0"
                      v-if="clinic.clinic_settings.pinterest_url"
                    >
                      <a
                        target="_blank"
                        class="text-dark"
                        :href="clinic.clinic_settings.pinterest_url"
                        ><i class="bi bi-pinterest fs-4"></i
                      ></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="row mt-3">

                            <div class="col-lg-4 text-start">
                                <div
                                    class="d-flex align-items-center justify-content-start me-4"
                                >
                                    <span class="mt-1 me-2"
                                        >{{
                                            __("rating")
                                        }}
                                        ({{clinic.rating}}/5)</span
                                    >
                                    <span class="text-white" style="color: #f5d812;">
                                        <star-rating :rating="clinic.rating" :star-size="18" :read-only="true" :increment="0.01"
                                        :show-rating="false"></star-rating>
                                    </span>
                                </div>
                            </div>


                        </div> -->
        </div>
      </div>

      <div
        class="row py-4 mt-5 align-items-center"
        style="background-color: #f4f9fd"
      >
        <div class="col-md-12">
          <div class="row">
            <div
              class="col-lg-4 mb-3 mb-md-0"
              v-for="(doctor, index) in clinic.clinic_doctors"
              :key="doctor.id"
            >
              <Link
                class="text-decoration-none text-black"
                :href="route('doctor.profile', { user_name: doctor.user_name })"
              >
                <div
                  class="card bg-transparent shadow-none border-0"
                  v-if="index <= 2"
                >
                  <div class="d-flex align-items-center gap-3">
                    <div
                      class="doctor-profile-img rounded-5 m-1 position-relative overflow-hidden"
                    >
                      <img
                        :src="doctor.image"
                        class="img-fluid h-100 object-fit-cover"
                        alt="doctor-image"
                      />
                    </div>
                    <!-- <i
                    class="bi bi-circle-fill position-absolute end-0 my-3 me-4"
                    style="color: #08fa20"
                  ></i> -->
                    <div class="text-start">
                      <h5 class="fw-bold text-primary" style="font-size: 21px">
                        {{ doctor.name }}
                      </h5>
                      <h6 class="fw-normal text-black fs-4">
                        {{ getCategoryNames(doctor.doctor_categories) }}
                      </h6>

                      <!-- <h6 class="fs-6">{{ getCategoryNames(doctor.main_categories) }}</h6> -->
                      <star-rating
                        :rating="doctor.rating"
                        :star-size="16"
                        :read-only="true"
                        :increment="0.01"
                        :show-rating="false"
                      ></star-rating>
                      <Link
                        :href="
                          route('doctor.profile', {
                            user_name: doctor.user_name,
                          })
                        "
                        class="btn btn-secondary mt-3 fw-bold fs-5 rounded-4 px-4 py-2"
                      >
                        {{ __("Consult Now") }}
                      </Link>
                      <!-- <span class="card-subtitle fs-5"
                      >{{ doctor.experience }} {{ __("year") }}
                      {{ __("experience") }}</span> -->
                    </div>
                  </div>
                </div>
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div

    class="row pt-3 clinic-doctor"
    v-if="clinic.clinic_doctors.length > 0"
  >
    <div class="col-12" style="background-color:#f4f9fd">
      <featured-clinic-doctor-section
        class="pt-2"
        findDoctors="true"
        :clinic_doctors="clinic.clinic_doctors"
      ></featured-clinic-doctor-section>
    </div>
  </div> -->
</template>
<script>
import { defineComponent } from "vue";
import axios from "axios";

import { Link } from "@inertiajs/inertia-vue3";
import FeaturedLawfirmDoctorSection from "@/Components/Clinics/FeaturedClinicDoctorSection.vue";
export default defineComponent({
  components: {
    Link,
    FeaturedLawfirmDoctorSection,
  },
  props: ["clinic", "add_col"],
  created() {

  },
  data() {
    return {
      fetching: true,
    };
  },
  methods: {
    getCategoryNames(main_categories) {
      return main_categories
        .slice(0, 1)
        .map((category) => category.name)
        .join(" | ");
    },
  },
});
</script>
