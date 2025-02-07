<template>
  <section>
    <div class="bg-primary">
      <pages-heading
        :account="true"
        :textwhite="'true'"
        :heading="'Profile'"
        :breadcrums="breadcrums"
      >
      </pages-heading>
    </div>
    <div class="py-5 stats">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card shadow mb-md-5 mb-4">
              <div class="card-body py-4">
                <div class="row">
                  <div class="col-md-5">
                    <div class="d-flex align-items-center gap-4 ms-md-4 mt-2">
                      <div class="position-relative">
                        <img
                          v-if="$page.props.auth.user.doctor.image"
                          class="rounded-circle img-fluid"
                          :src="image ? image : $page.props.auth.user.doctor.image"
                          width="160"
                        />
                        <img
                          v-else
                          class="rounded-circle img-fluid"
                          src="@/images/icons/user.png"
                          width="160"
                        />

                        <button
                          class="border-0 position-absolute bg-transparent"
                          style="right: 3px; top: 15px"
                          type="button"
                          :data-bs-target="'#profileuploadModal'"
                          data-bs-toggle="modal"
                        >
                          <img src="@/images/icons/Group1.svg" alt="" width="35" />
                        </button>
                        <Modal
                          :id="'profileuploadModal'"
                          :aria-labelledby="'profileuploadModalLabel'"
                          :maxWidth="'modal-sm'"
                        >
                          <div class="modal-content p-4 radius-50">
                            <div class="modal-body border-upload">
                              <div
                                class="d-flex flex-column align-items-center justify-content-center gap-4"
                              >
                                <img
                                  width="100"
                                  src="@/images/icons/uploadfile.svg"
                                  alt="upload-icon"
                                />
                                <h6 class="fs-3 fw-normal text-black">
                                  {{ __("Drag and drop files here") }}
                                </h6>
                                <button
                                  class="btn btn-primary shadow-find rounded-4 fs-3 fw-bold py-2"
                                  @click="triggerFileUpload"
                                  data-bs-dismiss="modal"
                                >
                                  {{ __("Upload") }}
                                  <img
                                    src="@/images/icons/up.svg"
                                    width="30"
                                    class="mb-1 ms-2"
                                    alt="up-icon"
                                    data-bs-dismiss="modal"
                                  />
                                </button>
                                <!-- Hidden file input -->
                                <input
                                  type="file"
                                  ref="fileInput"
                                  @change="onFileChange"
                                  class="d-none"
                                />
                              </div>
                            </div>
                          </div>
                        </Modal>
                      </div>
                      <div class="d-flex flex-column ms-md-2">
                        <a
                          :href="route('doctor.my_profile')"
                          class="nav-link"
                          target="_blank"
                        >
                          <h2 class="text-primary fw-bold mt-2 mb-1 fs-2">
                            {{ $page.props.doctor.first_name }}
                          </h2>
                          <h6 class="fs-4 text-paragraphcolor fw-normal mb-0">
                            {{ __($page.props.auth.logged_in_as) }}
                            <i class="bi bi-eye ms-2 fs-3"></i>
                          </h6>
                        </a>
                        <div class="d-flex align-items-center gap-2 mb-2 mt-3">
                          <div class="detail_icons">
                            <img src="@/images/icons/email.svg" alt="" />
                          </div>
                          <h6 class="fs-4 text-paragraphcolor fw-normal mb-0">
                            {{ $page.props.auth.user.doctor.email }}
                          </h6>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                          <div class="detail_icons">
                            <img src="@/images/icons/doctorcall.svg" alt="" />
                          </div>
                          <h6 class="fs-4 text-paragraphcolor fw-normal mb-0">
                            {{ $page.props.auth.user.doctor.cell_phone }}
                          </h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 border-status my-2">
                    <div class="d-flex flex-md-column flex-row mt-3 ms-2">
                      <div class="d-flex flex-column align-items-start mb-3">
                        <label
                          for="status"
                          class="fw-normal mb-2 fs-4 text-paragraphcolor"
                          >{{ __("status") }}</label
                        >

                        <span
                          v-if="
                            $page.props &&
                            $page.props.doctor &&
                            $page.props.doctor.is_active
                          "
                          class="badge bg-active rounded-pill px-4 py-2 fs-3"
                          >{{ __("active") }}</span
                        >
                        <span
                          v-else
                          class="badge bg-inactive px-4 rounded-pill py-2 fs-3"
                          >{{ __("inactive") }}</span
                        >
                      </div>
                      <div class="d-flex flex-column align-items-start ms-3 ms-md-0">
                        <div class="d-flex align-items-center gap-5">
                          <label
                            for="subscription"
                            class="mb-2 fs-4 fw-normal text-paragraphcolor"
                            >{{ __("Package") }}</label
                          >
                          <Link
                            v-if="
                              $page.props.auth.user.email_verified_at &&
                              hasRole('doctor') &&
                              $page.props.auth.logged_in_as == 'doctor'
                            "
                            :href="route('pricing', { type: 'doctor' })"
                          >
                            <i
                              class="bi bi-pencil-square mb-1 text-primary ms-2 fs-3"
                            ></i>
                          </Link>
                        </div>
                        <span
                          style="background-color: #ffa928"
                          class="badge rounded-pill px-3 py-2 fs-3 text-capitalize"
                          >{{ $page.props.doctor.pricing_plan_name ?? "N/A" }}
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="card rounded-20 p-4 ms-md-3" style="background: #f0f7fa">
                      <div class="d-flex gap-3 align-items-center about-modal">
                        <h3 class="fw-bold text-primary fs-2 mb-0">
                          {{ __("about") }}
                        </h3>
                        <button
                          class="border-0"
                          type="button"
                          data-bs-toggle="modal"
                          :data-bs-target="'#aboutModal'"
                        >
                          <img src="@/images/icons/Group1.svg" alt="" width="30" />
                        </button>
                        <!-- Modal -->
                        <Modal :id="'aboutModal'" :aria-labelledby="'aboutModalLabel'">
                          <div class="modal-content p-4 radius-50">
                            <div class="modal-header border-0">
                              <h1
                                class="display-6 fw-bold text-primary mb-0"
                                id="exampleModalLabel"
                              >
                                {{ __("about") }}
                              </h1>
                            </div>
                            <div class="modal-body">
                              <div class="card border-0">
                                <div class="card-body px-0">
                                  <label class="fs-3 mb-3" for="description">{{
                                    __("description")
                                  }}</label>

                                  <!-- Tabs -->
                                  <ul
                                    class="nav mb-3 modal-tabs nav-tabs gap-3 px-2 border-bottom border-1 my-2"
                                    id="myTab"
                                    role="tablist"
                                  >
                                    <li
                                      v-for="(lang, index) in $page.props
                                        .translation_languages"
                                      :key="lang.id"
                                      class="nav-item"
                                      role="presentation"
                                    >
                                      <button
                                        :class="{ active: activeTab === index }"
                                        class="nav-link mr-1 fw-bold rounded-top fs-3"
                                        @click="activeTab = index"
                                        :id="`nav-${lang.code}-tab`"
                                        type="button"
                                        role="tab"
                                        :aria-controls="`nav-${lang.code}`"
                                        aria-selected="activeTab === index"
                                      >
                                        {{ lang.name }}
                                      </button>
                                    </li>
                                  </ul>

                                  <!-- Tab Content -->
                                  <div class="tab-content mt-1" id="myTabContent">
                                    <div
                                      v-for="(lang, index) in $page.props
                                        .translation_languages"
                                      :key="lang.id"
                                      :class="{
                                        'show active': activeTab === index,
                                      }"
                                      class="tab-pane fade mb-2"
                                      :id="`nav-${lang.code}`"
                                      role="tabpanel"
                                      :aria-labelledby="`nav-${lang.code}-tab`"
                                    >
                                      <div class="col-md-12 decription-content">
                                        <div class="form-group rounded-3">
                                          <textarea
                                            v-model="form.description[lang.code]"
                                            class="form-control"
                                          ></textarea>
                                          <!-- Show error messages dynamically -->
                                          <span
                                            v-if="
                                              form.errors &&
                                              form.errors[`description.${lang.code}`]
                                            "
                                          >
                                            {{ form.errors[`description.${lang.code}`] }}
                                          </span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <!-- {{ form.description }} -->
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer border-0">
                              <!-- <button
                                type="button"
                                class="btn btn-secondary fs-2 shadow-find me-3"
                                data-bs-dismiss="modal"
                              >
                                {{ __("cancel") }}
                              </button> -->
                              <button
                                type="button"
                                @click.prevent="saveDescription"
                                class="btn btn-primary fs-2 shadow-find"
                                data-bs-dismiss="modal"
                              >
                                {{ __("save changes") }}
                              </button>
                            </div>
                          </div>
                        </Modal>

                        <div>
                          <!-- Cropped image previewer -->
                          <ImageCropperModal
                            :show="showImportModal"
                            id="archiveImageCropModal"
                            :image_url="image_url"
                            @cropImage="cropImage"
                          ></ImageCropperModal>
                          <!-- <img
                          v-if="croppedImageSrc"
                          style="width: 120px; height: 120px"
                          class="mx-auto m-2 rounded-4 bg-light"
                          :src="croppedImageSrc"
                        /> -->
                        </div>
                      </div>
                      <p class="mb-0 lineclamp-4 mt-2 text-paragraphcolor fs-4 fw-normal">
                        {{ $page.props.doctor.description }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">
            <div class="card shadow px-md-5 px-3 py-4 bg-white rounded-20 mb-4 mb-md-0">
              <ul
                class="nav flex-column nav-pills account-tabs my-md-5"
                id="v-pills-tab"
                role="tablist"
                aria-orientation="vertical"
              >
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    :class="{ active: active_tab == 'general-info' }"
                    @click="changeTab('general-info')"
                    id="general-info-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#general-info"
                    type="button"
                    role="tab"
                    aria-controls="general-info"
                    aria-selected="true"
                  >
                    <div class="icon-background ms-2">
                      <i class="bi bi-info-circle"></i>
                    </div>
                    {{ __("general info") }}
                  </button>
                </li>
                <li
                  class="nav-item"
                  role="presentation"
                  v-if="hasModule('doctor-social-info', 'doctor')"
                >
                  <button
                    class="nav-link"
                    :class="{ active: active_tab == 'social-info' }"
                    @click="changeTab('social-info')"
                    id="social-info-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#social-info"
                    type="button"
                    role="tab"
                    aria-controls="social-info"
                    aria-selected="true"
                  >
                    <div class="icon-background ms-2">
                      <i class="bi bi-twitter"></i>
                    </div>

                    {{ __("social info") }}
                  </button>
                </li>
                <!-- v-if="hasModule('test')" -->
                <li
                  class="nav-item"
                  role="presentation"
                  v-if="hasModule('doctor-certifications', 'doctor')"
                >
                  <button
                    class="nav-link"
                    :class="{ active: active_tab == 'certifications' }"
                    @click="changeTab('certifications')"
                    id="certifications-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#certifications"
                    type="button"
                    role="tab"
                    aria-controls="certifications"
                    aria-selected="false"
                  >
                    <div class="icon-background ms-2">
                      <i class="bi bi-journal"></i>
                    </div>
                    {{ __("certifications") }}
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    :class="{ active: active_tab == 'experiences' }"
                    @click="changeTab('experiences')"
                    id="experiences-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#experiences"
                    type="button"
                    role="tab"
                    aria-controls="experiences"
                    aria-selected="false"
                  >
                    <div class="icon-background ms-2">
                      <i class="bi bi-person-check-fill"></i>
                    </div>
                    {{ __("experiences") }}
                  </button>
                </li>
                <li
                  class="nav-item"
                  role="presentation"
                  v-if="hasModule('doctor-broadcasts', 'doctor')"
                >
                  <button
                    class="nav-link"
                    :class="{ active: active_tab == 'broadcasts' }"
                    @click="changeTab('broadcasts')"
                    id="broadcasts-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#broadcasts"
                    type="button"
                    role="tab"
                    aria-controls="broadcasts"
                    aria-selected="false"
                  >
                    <div class="icon-background ms-2">
                      <i class="bi bi-broadcast"></i>
                    </div>

                    {{ __n("broadcast") }}
                  </button>
                </li>

                <li
                  class="nav-item"
                  role="presentation"
                  v-if="hasModule('doctor-podcasts', 'doctor')"
                >
                  <button
                    class="nav-link"
                    :class="{ active: active_tab == 'podcasts' }"
                    @click="changeTab('podcasts')"
                    id="podcasts-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#podcasts"
                    type="button"
                    role="tab"
                    aria-controls="podcasts"
                    aria-selected="false"
                  >
                    <div class="icon-background ms-2">
                      <i class="bi bi-mic"></i>
                    </div>
                    {{ __n("podcast") }}
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    :class="{ active: active_tab == 'services' }"
                    @click="changeTab('services')"
                    id="services-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#services"
                    type="button"
                    role="tab"
                    aria-controls="services"
                    aria-selected="false"
                  >
                    <div class="icon-background ms-2">
                      <i class="bi bi-briefcase"></i>
                    </div>
                    {{ __n("services") }}
                  </button>
                </li>
                <!-- <li class="nav-item mb-3" role="presentation"
                            v-if="!isSubscriptionEnabled() || hasModule('doctor-services', 'doctor')">
                            <button class="nav-link w-100 text-dark" :class="{ active: active_tab == 'services' }"
                                @click="changeTab('services')" id="services-tab" data-bs-toggle="tab"
                                data-bs-target="#services" type="button" role="tab" aria-controls="services"
                                aria-selected="false">{{ __n('service') }}</button>
                        </li> -->

                <li
                  class="nav-item"
                  role="presentation"
                  v-if="hasModule('doctor-events', 'doctor')"
                >
                  <button
                    class="nav-link"
                    :class="{ active: active_tab == 'events' }"
                    @click="changeTab('events')"
                    id="events-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#events"
                    type="button"
                    role="tab"
                    aria-controls="events"
                    aria-selected="false"
                  >
                    <div class="icon-background ms-2">
                      <i class="bi bi-calendar2-event"></i>
                    </div>
                    {{ __n("event") }}
                  </button>
                </li>

                <!-- <li class="nav-item" role="presentation">
                <button class="nav-link" :class="{ active: active_tab == 'youtube' }" @click="changeTab('youtube')"
                  id="youtube-tab" data-bs-toggle="tab" data-bs-target="#youtube" type="button" role="tab"
                  aria-controls="youtube" aria-selected="false">{{ __('youtube') }}</button>
              </li> -->
                <!-- <li class="nav-item" role="presentation">
              <button class="nav-link" :class="{ active: active_tab == 'instagram' }"
                @click="changeTab('instagram')" id="instagram-tab" data-bs-toggle="tab" data-bs-target="#instagram"
                type="button" role="tab" aria-controls="instagram" aria-selected="false">{{ __('instagram') }}</button>
            </li> -->
                <li
                  class="nav-item"
                  role="presentation"
                  v-if="hasModule('doctor-archives', 'doctor')"
                >
                  <button
                    class="nav-link"
                    :class="{ active: active_tab == 'archives' }"
                    @click="changeTab('archives')"
                    id="archives-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#archives"
                    type="button"
                    role="tab"
                    aria-controls="archives"
                    aria-selected="false"
                  >
                    <div class="icon-background ms-2">
                      <i class="bi bi-book"></i>
                    </div>
                    {{ __n("archive") }}
                  </button>
                </li>
                <li
                  class="nav-item"
                  role="presentation"
                  v-if="hasModule('doctor-appointment', 'doctor')"
                >
                  <button
                    class="nav-link"
                    :class="{ active: active_tab == 'appointment' }"
                    @click="changeTab('appointment')"
                    id="appointment-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#appointment"
                    type="button"
                    role="tab"
                    aria-controls="appointment"
                    aria-selected="false"
                  >
                    <div class="icon-background ms-2">
                      <i class="bi bi-receipt"></i>
                    </div>
                    {{ __("appointment") }}
                  </button>
                </li>
                <li
                  class="nav-item"
                  role="presentation"
                  v-if="hasModule('doctor-blogs', 'doctor')"
                >
                  <button
                    class="nav-link"
                    :class="{ active: active_tab == 'blogs' }"
                    @click="changeTab('blogs')"
                    id="blogs-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#blogs"
                    type="button"
                    role="tab"
                    aria-controls="blogs"
                    aria-selected="false"
                  >
                    <div class="icon-background ms-2">
                      <i class="bi bi-card-image"></i>
                    </div>
                    {{ __n("blog") }}
                  </button>
                </li>
                <li
                  class="nav-item"
                  role="presentation"
                  v-if="hasModule('doctor-calendly', 'doctor')"
                >
                  <button
                    class="nav-link"
                    :class="{ active: active_tab == 'calendly' }"
                    @click="changeTab('calendly')"
                    id="calendly-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#calendly"
                    type="button"
                    role="tab"
                    aria-controls="calendly"
                    aria-selected="false"
                  >
                    <div class="icon-background ms-2">
                      <i class="bi bi-camera-video"></i>
                    </div>
                    {{ __("calendly") }}
                  </button>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-7">
            <!-- v-if="hasModule('test')" -->
            <!-- Tab panes -->
            <div class="tab-content" id="v-pills-tabContent">
              <doctor-general-info
                v-if="active_tab == 'general-info'"
                :image="image"
                :description="form.description"
                :key="key"
                :active="active_tab == 'general-info'"
              ></doctor-general-info>
              <doctor-social-info
                v-if="
                  hasModule('doctor-social-info', 'doctor') && active_tab == 'social-info'
                "
                :active="active_tab == 'social-info'"
              ></doctor-social-info>
              <doctor-certifications
                v-if="
                  hasModule('doctor-certifications', 'doctor') &&
                  active_tab == 'certifications'
                "
                :active="active_tab == 'certifications'"
              ></doctor-certifications>
              <doctor-experiences
                v-if="active_tab == 'experiences'"
                :active="active_tab == 'experiences'"
              >
              </doctor-experiences>
              <doctor-broadcasts
                v-if="
                  hasModule('doctor-broadcasts', 'doctor') && active_tab == 'broadcasts'
                "
                :active="active_tab == 'broadcasts'"
              ></doctor-broadcasts>
              <doctor-podcasts
                v-if="hasModule('doctor-podcasts', 'doctor') && active_tab == 'podcasts'"
                :active="active_tab == 'podcasts'"
              ></doctor-podcasts>
              <!-- <doctor-services
                            v-if="!isSubscriptionEnabled() || hasModule('doctor-services', 'doctor') && active_tab == 'services'"
                            :active="active_tab == 'services'"></-services> -->
              <doctor-services :active="active_tab == 'services'"></doctor-services>
              <doctor-events
                v-if="hasModule('doctor-events', 'doctor') && active_tab == 'events'"
                :active="active_tab == 'events'"
              ></doctor-events>
              <doctor-products
                v-if="hasModule('doctor-products', 'doctor') && active_tab == 'products'"
                :active="active_tab == 'products'"
              ></doctor-products>
              <doctor-youtube
                v-if="active_tab == 'youtube'"
                :active="active_tab == 'youtube'"
              ></doctor-youtube>
              <doctor-instagram
                v-if="active_tab == 'instagram'"
                :active="active_tab == 'instagram'"
              ></doctor-instagram>
              <doctor-calendly
                v-if="hasModule('doctor-calendly', 'doctor') && active_tab == 'calendly'"
                :active="active_tab == 'calendly'"
              ></doctor-calendly>
              <doctor-appointment
                v-if="
                  hasModule('doctor-appointment', 'doctor') && active_tab == 'appointment'
                "
                :active="active_tab == 'appointment'"
              ></doctor-appointment>
              <doctor-posts
                v-if="hasModule('doctor-blogs', 'doctor') && active_tab == 'blogs'"
                :active="active_tab == 'blogs'"
              ></doctor-posts>
              <doctor-archives
                v-if="hasModule('doctor-archives', 'doctor') && active_tab == 'archives'"
                :active="active_tab == 'archives'"
              ></doctor-archives>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import { defineComponent } from "vue";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import Checkbox from "@/Components/Checkbox.vue";
import Label from "@/Components/Label.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import DoctorGeneralInfo from "@/Components/Doctors/DoctorGeneralInfo.vue";
import DoctorSocialInfo from "@/Components/Doctors/DoctorSocialInfo.vue";
import DoctorBroadcasts from "@/Components/Doctors/Broadcasts/DoctorBroadcasts.vue";
import DoctorPodcasts from "@/Components/Doctors/Podcasts/DoctorPodcasts.vue";
import DoctorEvents from "@/Components/Doctors/Events/DoctorEvents.vue";
import DoctorPosts from "@/Components/Doctors/Posts/DoctorPosts.vue";
import DoctorProducts from "@/Components/Doctors/DoctorProducts.vue";
import DoctorYoutube from "@/Components/Doctors/DoctorYoutube.vue";
import DoctorInstagram from "@/Components/Doctors/DoctorInstagram.vue";
import DoctorCalendly from "@/Components/Doctors/DoctorCalendly.vue";
import DoctorAppointment from "@/Components/Doctors/Appointments/DoctorAppointment.vue";
import DoctorCertifications from "@/Components/Doctors/Certifications/DoctorCertifications.vue";
import Breadcrums from "../../Components/Shared/Breadcrums.vue";
import DoctorServices from "@/Components/Doctors/Services/DoctorServices.vue";
import DoctorArchives from "@/Components/Doctors/Archives/DoctorArchives.vue";
import PagesHeading from "../PagesHeading.vue";
import Modal from "../Modal.vue";
import DoctorExperiences from "./Experiences/DoctorExperiences.vue";
import ImageCropperModal from "../Shared/ImageCropperModal.vue";
export default defineComponent({
  components: {
    Head,
    AuthenticationCard,
    AuthenticationCardLogo,
    Button,
    Input,
    Checkbox,
    Label,
    AppLayout,
    ValidationErrors,
    Link,
    PagesHeading,
    DoctorGeneralInfo,
    DoctorSocialInfo,
    DoctorBroadcasts,
    DoctorPodcasts,
    DoctorEvents,
    DoctorProducts,
    DoctorExperiences,
    DoctorPosts,
    DoctorArchives,
    DoctorYoutube,
    DoctorInstagram,
    DoctorCalendly,
    DoctorAppointment,
    DoctorCertifications,
    Breadcrums,
    DoctorServices,
    Modal,
    ImageCropperModal,
  },

  data() {
    return {
      active_tab: route().params.active_tab ?? "general-info",
      breadcrums: [
        {
          id: 1,
          name: this.__("Home"),
          link: "/",
        },
        {
          id: 2,
          name: this.__("account"),
        },
      ],

      activeTab: 0,
      form: this.$inertia.form({
        doctor_categories: this.$page.props.doctor.doctor_category_ids ?? "",
        country_id: this.$page.props.doctor.country_id,
        experience: this.$page.props.doctor.experience ?? "",
        speciality: this.$page.props.doctor.speciality ?? "",
        state_id: this.$page.props.doctor.state_id,
        city_id: this.$page.props.doctor.city_id,
        first_name: this.$page.props.doctor.first_name,
        last_name: this.$page.props.doctor.last_name,
        description:
          this.$page.props.doctor.description_translations.length == 0
            ? {}
            : this.$page.props.doctor.description_translations,
        languages: this.$page.props.doctor.language_ids,
        tags: this.$page.props.doctor.tag_ids,
        prefix: this.$page.props.doctor.prefix,
        suffix: this.$page.props.doctor.suffix,
        home_phone: this.$page.props.doctor.home_phone,
        cell_phone: this.$page.props.doctor.cell_phone,
        job_title: this.$page.props.doctor.cell_phone,
        company: this.$page.props.doctor.company,
        website: this.$page.props.doctor.website,
        email: this.$page.props.doctor.email,

        state_id: this.$page.props.doctor.state_id,
        city_id: this.$page.props.doctor.city_id,
        address_line_1: this.$page.props.doctor.address_line_1,
        latitude: this.$page.props.doctor.latitude,
        longitude: this.$page.props.doctor.longitude,
        address_line_2: this.$page.props.doctor.address_line_2,
        zip_code: this.$page.props.doctor.zip_code,
        billing_country_id: this.$page.props.doctor.billing_country_id,
        billing_state_id: this.$page.props.doctor.billing_state_id,
        billing_city_id: this.$page.props.doctor.billing_city_id,
        billing_address_line_1: this.$page.props.doctor.billing_address_line_1,
        billing_address_line_2: this.$page.props.doctor.billing_address_line_2,
        billing_zip_code: this.$page.props.doctor.billing_zip_code,
        shipping_country_id: this.$page.props.doctor.shipping_country_id,
        shipping_state_id: this.$page.props.doctor.shipping_state_id,
        shipping_city_id: this.$page.props.doctor.shipping_city_id,
        shipping_address_line_1: this.$page.props.doctor.shipping_address_line_1,
        shipping_address_line_2: this.$page.props.doctor.shipping_address_line_2,
        shipping_zip_code: this.$page.props.doctor.shipping_zip_code,
        work_country_id: this.$page.props.doctor.work_country_id,
        work_state_id: this.$page.props.doctor.work_state_id,
        work_city_id: this.$page.props.doctor.work_city_id,
        work_address_line_1: this.$page.props.doctor.work_address_line_1,
        work_address_line_2: this.$page.props.doctor.work_address_line_2,
        work_zip_code: this.$page.props.doctor.work_zip_code,
        icon: null,
        image: null,
        cover_image: null,
        user_name: this.$page.props.doctor.user_name,
        is_co_creation: this.$page.props.doctor.is_co_creation ? true : false,
        is_out_of_office: this.$page.props.doctor.is_out_of_office ? true : false,
        is_energy_exchange: this.$page.props.doctor.is_energy_exchange ? true : false,
        is_hide_location: this.$page.props.doctor.is_hide_location ? true : false,
      }),
      image_url: null,
      image: null,
      showImportModal: false,
      croppedImageSrc: null,
      key: 0,
    };
  },

  methods: {
    changeTab(tab) {
      this.active_tab = tab;
      this.$inertia.replace(route("account"), {
        data: { active_tab: this.active_tab },
        preserveScroll: true,
      });
    },

    triggerFileUpload() {
      // Trigger the hidden file input
      this.$refs.fileInput.click();
    },
    onFileChange(e) {
      this.image_url = null;
      const file = e.target.files[0];
      this.image_url = URL.createObjectURL(file);
      this.croppedImageSrc = null;
      this.showImportModal = true;
    },

    saveDescription() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("doctors.update_general_info"), {
          onSuccess: () => {
            this.goToNextTab();
          },
          OnError: () => {
            this.goToNextTab();
          },
        });
    },

    goToNextTab() {
      this.$inertia.visit(route("account"), {
        data: { active_tab: "general-info" },
      });
    },
    cropImage(image) {
      this.key++;
      this.croppedImageSrc = image;
      this.image = image;

      this.image_url = null;
      this.showImportModal = false;
    },

    submit() {},
  },
});
</script>
