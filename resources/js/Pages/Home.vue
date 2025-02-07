<template>
  <app-layout title="Home" :showLoader="showLoader">
    <template #header>
      <section class="hero-carousel position-relative overflow-hidden">
        <!-- <Carousel :settings="settings" :breakpoints="breakpoints">
          <Slide class="" key="1">
            <div class="stats head-size">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row align-items-center">
                      <div
                        class="col-md-5"
                        data-aos="fade-right"
                        data-aos-duration="1500"
                      >
                        <div
                          v-if="getPageContentType('main_heading_slide_1') == 'textarea'"
                          class="text-start"
                        >
                          <div
                            class="text-dark"
                            v-html="getPageContent('main_heading_slide_1')"
                          ></div>
                        </div>

                        <div
                          v-else-if="getPageContentType('main_heading_slide_1') == 'text'"
                        >
                          <p>
                            {{ getPageContent("main_heading_slide_1") ?? "-" }}
                          </p>
                        </div>
                        <div v-else>
                          <h1 class="text-white display-6">
                            <small
                              class="d-block fs-2 text-capitalize fw-bold text-black"
                              >{{ __("Your Legal Solution Just A Click Away") }}</small
                            >
                            {{ __("Online Consultation") }}
                          </h1>
                          <p class="text-white py-3 fs-6">
                            <span class="fw-bold">
                              <span class="text-primary">{{ __("27/7 Video") }} </span>
                              {{ __("Consultations, ") }}
                              <span class="text-primary">{{ __("Audio") }} </span>

                              {{ __("Calls + ") }}

                              <span class="text-primary">{{ __("Chat") }} </span>

                              {{ __("Consultation") }}
                            </span>
                          </p>
                        </div>

                        <div
                          v-if="
                            getPageContentType('header_content_slide_1') == 'textarea'
                          "
                        >
                          <div
                            class="text-white"
                            v-html="getPageContent('header_content_slide_1')"
                          ></div>
                        </div>
                        <div
                          v-else-if="
                            getPageContentType('header_content_slide_1') == 'text'
                          "
                        >
                          <p>
                            {{ getPageContent("header_content_slide_1") ?? "-" }}
                          </p>
                        </div>
                        <p v-else class="mb-0 text-primary mt-3 pe-md-4">
                          Get professional legal advice from the comfort of your home with
                          our virtual consultations. Connect with experienced doctors
                          online and find the answers you need for your legal matters.
                          Convenient, confidential, and just a click away
                        </p>
                        <span class="d-flex justify-content-start mt-5">
                          <Link
                            :href="route('doctors.listing')"
                            data-aos-duration="1500"
                            class="fw-bold btn btn-primary fs-2 shadow-find rounded-4 text-white text-decoration-none"
                            >{{ __("Find The Doctors") }}
                            <img
                              class="ms-4"
                              src="@/images/icons/loginbtnicon.png"
                              style="width: 30px"
                              alt="icon-login"
                          /></Link>
                        </span>
                      </div>
                      <div class="col-md-7 doctor-head-img position-relative">
                        <img
                          data-aos="fade-left"
                          data-aos-once="false"
                          data-aos-duration="1500"
                          data-aos-delay="1100"
                          class="head-img"
                          src="@/images/home/headerimg.svg"
                          alt=""
                        />
                        <img
                          class="card-custom"
                          data-aos="zoom-in"
                          data-aos-duration="1500"
                          src="@/images/home/card.svg"
                          alt=""
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </Slide>
          <Slide class="" key="2">
            <div class="stats head-size">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row align-items-center">
                      <div class="col-md-5" data-aos="fade-up" data-aos-duration="1500">
                        <div
                          v-if="getPageContentType('main_heading_slide_1') == 'textarea'"
                          class="text-start"
                        >
                          <div
                            class="text-dark"
                            v-html="getPageContent('main_heading_slide_1')"
                          ></div>
                        </div>

                        <div
                          v-else-if="getPageContentType('main_heading_slide_1') == 'text'"
                        >
                          <p>
                            {{ getPageContent("main_heading_slide_1") ?? "-" }}
                          </p>
                        </div>
                        <div v-else>
                          <h1 class="text-white display-6">
                            <small
                              class="d-block fs-2 text-capitalize fw-bold text-black"
                              >{{ __("Your Legal Solution Just A Click Away") }}</small
                            >
                            {{ __("Online Consultation") }}
                          </h1>
                          <p class="text-white py-3 fs-6">
                            <span class="fw-bold">
                              <span class="text-primary">{{ __("27/7 Video") }} </span>
                              {{ __("Consultations, ") }}
                              <span class="text-primary">{{ __("Audio") }} </span>

                              {{ __("Calls + ") }}

                              <span class="text-primary">{{ __("Chat") }} </span>

                              {{ __("Consultation") }}
                            </span>
                          </p>
                        </div>

                        <div
                          v-if="
                            getPageContentType('header_content_slide_1') == 'textarea'
                          "
                        >
                          <div
                            class="text-white"
                            v-html="getPageContent('header_content_slide_1')"
                          ></div>
                        </div>
                        <div
                          v-else-if="
                            getPageContentType('header_content_slide_1') == 'text'
                          "
                        >
                          <p>
                            {{ getPageContent("header_content_slide_1") ?? "-" }}
                          </p>
                        </div>
                        <p v-else class="mb-0 text-primary mt-3 pe-md-4">
                          Get professional legal advice from the comfort of your home with
                          our virtual consultations. Connect with experienced doctors
                          online and find the answers you need for your legal matters.
                          Convenient, confidential, and just a click away
                        </p>
                        <span class="d-flex justify-content-start mt-5">
                          <Link
                            :href="route('doctors.listing')"
                            data-aos-duration="1500"
                            class="fw-bold btn btn-primary fs-2 shadow-find rounded-4 text-white text-decoration-none"
                            >{{ __("Find The Doctors") }}
                            <img
                              class="ms-4"
                              src="@/images/icons/loginbtnicon.png"
                              style="width: 30px"
                              alt="icon-login"
                          /></Link>
                        </span>
                      </div>
                      <div class="col-md-7 doctor-head-img position-relative">
                        <img
                          data-aos="fade-left"
                          data-aos-once="false"
                          data-aos-duration="1500"
                          data-aos-delay="1100"
                          class="head-img"
                          src="@/images/home/headerimg.svg"
                          alt=""
                        />
                        <img
                          class="card-custom"
                          data-aos="zoom-in"
                          data-aos-duration="1500"
                          src="@/images/home/card.svg"
                          alt=""
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </Slide>
          <template #addons>
            <navigation />
          </template>
        </Carousel> -->
        <content-slider></content-slider>
      </section>
    </template>
    <FindDoctorBar
      :title="'Discover and schedule appointments with top-rated doctors in your area'"
      :home="true"
    ></FindDoctorBar>
    <home-statistics-bar></home-statistics-bar>
    <spotlight-doctor-section></spotlight-doctor-section>
    <home-static-cards-section></home-static-cards-section>
    <doctors-tabs-section></doctors-tabs-section>
    <featured-clinic-section></featured-clinic-section>

    <!-- <PopularCoursesSection></PopularCoursesSection> -->

    <!-- Quick Buy Services -->

    <div class="p-6 bg-white">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="text-center">
              <h1
                data-aos="fade-down"
                data-aos-duration="1500"
                class="heading-fs"
                v-html="getPageContent('doctor_quick_services_title')"
              ></h1>
              <p
                v-html="getPageContent('doctor_quick_services')"
                class="subheading-fs"
              ></p>
            </div>
          </div>
        </div>

        <div class="row py-4">
          <!-- Loop through service categories -->

          <div
            class="col-md-4"
            v-for="(category, index) in serviceCategories"
            :key="category.id"
          >
            <div v-if="index <= 2" class="card border-0 mx-2 mb-3 mb-md-0">
              <div
                class="rounded-5 overflow-hidden image-container"
                style="width: 100%; height: 280px"
              >
                <img
                  v-if="category.image"
                  class="h-100 objext-fit-cover"
                  :src="category.image"
                  alt="categoryimg"
                />
                <img
                  v-else
                  class="image"
                  src="@/images/cardlaw.jpg"
                  alt="categoryimg"
                />
              </div>
              <div class="card-body">
                <div class="d-flex flex-column align-items-start">
                  <h3 class="fs-2 fw-bolder text-primary mb-0">
                    {{ category.name }}
                  </h3>
                  <h6 class="text-black fw-normal fs-3 mt-2 mb-4">
                    {{ __("Starting from") }}
                    <span class="text-primary fs-3 fw-bold"
                      >{{ getDisplayAmount(category.service_min_price ?? 5) }}</span
                    >/{{ __("per 30 minute") }}
                  </h6>
                  <!-- <star-rating
                            :rating="category.rating"
                            :star-size="18"
                            :read-only="true"
                            :increment="0.01"
                            :show-rating="false"
                        ></star-rating> -->
                </div>
                <!-- <p class="fs-4 mt-3 fw-regular text-black lineclamp-2" v-html="category.description"></p> -->
                <Link
                  :href="
                    route('services.listing', {
                      service_category: category.slug,
                    })
                  "
                  class="btn btn-secondary fs-3 fw-bold rounded-4 fw-bolder custom-padding"
                  >{{ __("Consult Now") }}</Link
                >
              </div>
            </div>
          </div>
          <!-- End loop -->
        </div>
        <div class="row pt-4 justify-content-center">
          <div class="col-md-3 d-flex justify-content-center">
            <Link
              :href="route('services.listing')"
              class="btn btn-outline-primary fw-medium fs-3 px-md-5 px-3 rounded-4"
            >
              <span class="button-text">{{
                getPageContent("general_view_more_btn_text") ?? __("view more")
              }}</span>
            </Link>
          </div>
        </div>
      </div>
    </div>

    <!-- Quick Buy Services -->

    <!-- Free Online Consultation -->

    <!-- Find Nearest Doctor -->
    <!-- <div class="section nearest-doctor mt-5 pt-5">
      <div class="container">
        <div class="row py-md-5 align-items-center">
          <div class="col-lg-6 mb-4 mb-lg-0 text-center">
            <img
              class="img-fluid"
              width="350"
              src="@/images/home/group3.png"
              alt="Image"
            />
          </div>

          <div class="col-lg-6">
            <div
              v-if="
                getPageContentType('find_nearest_doctor_description') ==
                'textarea'
              "
            >
              <div
                v-html="getPageContent('find_nearest_doctor_description')"
              ></div>
            </div>
            <div
              v-else-if="
                getPageContentType('find_nearest_doctor_description') == 'text'
              "
            >
              <p>
                {{ getPageContent("find_nearest_doctor_description") ?? "-" }}
              </p>
            </div>
            <div v-else>
              <span class="fs-3">{{ __("Find Your") }}</span>
              <h2 class="display-6">
                {{ __("Nearest Doctors") }}
              </h2>

              <p>
                {{ __("resonance healing energy description") }}
              </p>
            </div>
            <div>
              <a :href="route('doctors.listing')" class="btn btn-primary">{{
                getPageContent("find_nearest_doctor_button_text") ??
                __("Find Nearest Doctors")
              }}</a>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Free Online Consultation -->
    <!-- <div class="free-consulation pt-4">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img
              src="@/images/home/27718-5-business-people-hd.png"
              alt
              style="margin-top: -100px"
              class="img-fluid"
              data-aos="fade-right"
              data-aos-once="false"
              data-aos-duration="1500"
              data-aos-delay="800"
            />
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <div
              class="py-5 my-3 text-capitalize"
              data-aos="fade-left"
              data-aos-once="false"
              data-aos-duration="1500"
              data-aos-delay="800"
            >
              <div
                class="col-12"
                v-if="
                  getPageContentType('free_consultation_description') ==
                  'textarea'
                "
              >
                <div
                  v-html="getPageContent('free_consultation_description')"
                ></div>
              </div>
              <div
                class="col-12"
                v-else-if="
                  getPageContentType('free_consultation_description') == 'text'
                "
              >
                <p>
                  {{ getPageContent("free_consultation_description") ?? "-" }}
                </p>
              </div>
              <div v-else>
                <h4 class="display-4 fw-bolder text-white">
                  {{ __("Free online consultations") }}
                </h4>
                <p class="fs-2 fw-bolder text-white">
                  {{ __("Starting at $15/month") }}
                </p>
              </div>
              <span v-if="$page.props.auth">
                <a
                  v-if="$page.props.auth.logged_in_as == 'doctor'"
                  :href="route('pricing', { type: 'doctor' })"
                  class="btn btn-primary"
                  type="button"
                  >{{
                    getPageContent("free_consultation_button") ??
                    __("Get Membership")
                  }}</a
                >
                <a
                  v-if="$page.props.auth.logged_in_as == 'clinic'"
                  :href="route('pricing', { type: 'clinic' })"
                  class="btn btn-primary"
                  type="button"
                  >{{
                    getPageContent("free_consultation_button") ??
                    __("Get Membership")
                  }}</a
                >
              </span>
              <a
                v-else
                :href="route('register', { tab: 'doctor' })"
                class="btn btn-primary"
                type="button"
                >{{
                  getPageContent("free_consultation_button") ??
                  __("Get Membership")
                }}</a
              >
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- Free Online Consultation -->
    <!-- <featured-testimonials-section></featured-testimonials-section> -->

    <!-- App Section -->

    <div class="section bg-primary student-app mt-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 position-relative">
            <div
              class="mobile-img text-end mb-4 mb-lg-0"
              data-aos="fade-right"
              data-aos-once="false"
              data-aos-duration="1500"
              data-aos-delay="500"
            >
              <img
                src="@/images/home/appsection.png"
                alt
                class="img-fluid h-100"
              />
            </div>
          </div>
          <div class="col-md-8">
            <div
              class="d-flex ps-md-4 justify-content-center p-0 flex-column h-100"
              data-aos="fade-left"
              data-aos-once="false"
              data-aos-duration="1500"
              data-aos-delay="800"
            >
              <div
                v-if="
                  getPageContentType('app_section_description') == 'textarea'
                "
              >
                <div v-html="getPageContent('app_section_description')"></div>
              </div>
              <div
                v-else-if="
                  getPageContentType('app_section_description') == 'text'
                "
              >
                <p>{{ getPageContent("app_section_description") ?? "-" }}</p>
              </div>
              <div v-else>
                <span class="fs-3">{{ __("Download") }}</span>
                <h2 class="display-6">
                  {{ __("Consultant App") }}
                </h2>
                <p>
                  Our commitment to excellence extends to our commitment to
                  integrity. We adhere to the highest ethical standards,
                  treating each case with the utmost professionalism and
                  confidentiality. We understand the gravity of the legal
                  matters we handle, and we approach them with the respect and
                  dedication they deserve.
                </p>
              </div>

              <div
                class="d-flex align-items-start flex-lg-row flex-column mt-3"
              >
                <a
                  href="#"
                  v-if="
                    getPageContent('app_section_play_btn_text') != '' &&
                    getPageContent('app_section_play_btn_text') != null
                  "
                  class="btn bg-white rounded-4 border border-secondary border-3 px-4 d-flex align-items-center me-3 mb-2 mb-md-0"
                  style="height: 70px"
                >
                  <img
                    src="@/images/icons/playstore.png"
                    width="40"
                    class="me-2"
                  />
                  <!-- <i class="bi bi-google-play fs-1 me-3"></i> -->
                  <div class="d-flex flex-column align-items-start">
                    <div
                      v-if="
                        getPageContentType('app_section_play_btn_text') ==
                        'textarea'
                      "
                    >
                      <div
                        class="text-start"
                        v-html="getPageContent('app_section_play_btn_text')"
                      ></div>
                    </div>
                    <div
                      v-else-if="
                        getPageContentType('app_section_play_btn_text') ==
                        'text'
                      "
                    >
                      <p>
                        {{ getPageContent("app_section_play_btn_text") ?? "-" }}
                      </p>
                    </div>
                    <div v-else>
                      <span class="btn-label">{{ __("Get it on") }}</span>
                      <span class="btn-caption">{{ __("Google Store") }}</span>
                    </div>
                  </div>
                </a>

                <a
                  v-if="
                    getPageContent('app_section_app_store_btn_text') != '' &&
                    getPageContent('app_section_app_store_btn_text') != null
                  "
                  href="#"
                  class="btn bg-white rounded-4 border border-secondary border-3 px-4 d-flex align-items-center"
                  style="height: 70px"
                >
                  <i class="bi bi-apple fs-1 me-3"></i>
                  <div
                    v-if="
                      getPageContentType('app_section_app_store_btn_text') ==
                      'textarea'
                    "
                  >
                    <div
                      class="text-start"
                      v-html="getPageContent('app_section_app_store_btn_text')"
                    ></div>
                  </div>
                  <div
                    v-else-if="
                      getPageContentType('app_section_app_store_btn_text') ==
                      'text'
                    "
                  >
                    <p>
                      {{
                        getPageContent("app_section_app_store_btn_text") ?? "-"
                      }}
                    </p>
                  </div>
                  <div v-else>
                    <span class="btn-label">{{ __("Download on the") }}</span>
                    <span class="btn-caption">{{ __("App Store") }}</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- App Section -->

    <!-- Faqs Section -->
    <div class="section stats p-6" v-if="faqs.length > 0">
      <div class="container">
        <div class="row">
          <div class="col-12 mb-5 text-center">
            <div
              v-if="
                getPageContentType('faqs_section_description') == 'textarea'
              "
            >
              <div v-html="getPageContent('faqs_section_description')"></div>
            </div>
            <div
              v-else-if="
                getPageContentType('faqs_section_description') == 'text'
              "
            >
              <p>{{ getPageContent("faqs_section_description") ?? "-" }}</p>
            </div>
            <div v-else>
              <span class="fs-3">{{ __("Find some ") }}</span>
              <h2 class="5">{{ __("Answer Questions") }}</h2>
              <p>
                When you choose Elite Legal Services, you are choosing a trusted
                partner dedicated to your success. Here are some frequently
                asked questions by some users. Feel free to add your questions
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="rounded-5 mb-4 mb-md-0 overflow-hidden">
              <img class="faq-img" src="@/images/home/faq.png" alt="" />
            </div>
          </div>
          <div class="col-md-7">
            <div class="accordion home-faqs-accord" id="accordionPanelsStayOpenExample">
              <div
                class="accordion-item rounded-4 mb-3 border-0 shadow"
                v-for="item in faqs"
                :key="item.id"
              >
                <h2
                  class="accordion-header border-0"
                  :id="`panelsStayOpen-headingOne${item.id}`"
                >
                  <button
                    style="height: 4rem"
                    class="accordion-button border-0 rounded-5 shadow-none overflow-hidden bg-white collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    :data-bs-target="`#panelsStayOpen-collapseOne${item.id}`"
                    aria-expanded="false"
                    :aria-controls="`panelsStayOpen-collapseOne${item.id}`"
                  >
                    <span
                      class="fw-bold home-faqs-text"

                      >{{ item.name }}</span
                    >
                  </button>
                </h2>
                <div
                  :id="`panelsStayOpen-collapseOne${item.id}`"
                  class="accordion-collapse border-top border-primary border-1 mx-3 collapse"
                  :aria-labelledby="`panelsStayOpen-headingOne${item.id}`"
                >
                  <div class="accordion-body subheading-fs fw-bold">
                    <div v-html="item.description"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row pt-5 justify-content-center">
          <div class="col-md-3 d-flex justify-content-center">
            <Link
              :href="route('faqs')"
              class="btn btn-outline-primary fw-medium fs-3 px-md-5 px-3 rounded-4"
            >
              <span class="button-text">{{
                getPageContent("general_view_more_btn_text") ?? __("view more")
              }}</span>
            </Link>
          </div>
        </div>
        <!-- <div class="row pt-4 justify-content-center">
          <div class="col-md-3 d-flex justify-content-center">
            <Link href="#" class="learn-more btn position-relative">
              <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
              </span>
              <span class="button-text">{{
                getPageContent("general_view_more_btn_text") ?? __("view more")
              }}</span>
            </Link>
          </div>
        </div> -->
      </div>
    </div>

    <review-section></review-section>
    <featured-event-section findDoctors="true"></featured-event-section>

    <!-- Faqs Section -->
    <!-- <featured-tags-section class="bg-light"></featured-tags-section> -->

    <!-- Button trigger modal -->
    <!-- <Modal style="background-color: white !important" ref="modal" class="rounded-0" maxWidth="lg" :id="'newsletterModal'">

            <div class="modal-content p-md-4">
            <div class="modal-header border-0">
                <h5 class="modal-title ms-2 text-primary fs-2 fw-bold" id="newsletterModalLabel"></h5>
                <button :id="id+'close'" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-md-3 d-flex align-items-center flex-column pb-md-5">
                 <h2 class="fw-bold display-6 mb-3" style="color: #0B86CA">Sign up for our newsletter</h2>
                 <p class="fs-4 px-md-5 text-center text-black">Join our mailing list! Get the latest updates on education, courses, events, and beyond in addition to special offers and useful tips sent directly to your inbox</p>
                <div class="d-flex align-items-center  mt-3">
                    <input class="newsletter-input me-2" type="email" placeholder="Add your email here"/>
                    <button  class="btn btn-primary rounded-pill py-md-3">{{ __('Subscribe') }}</button>
                 </div>
                 <span class="text-start text-black fs-6 mt-3">We respect your privacy. We will not publish or share your email address in any way.</span>
            </div>
            </div>
        </Modal> -->
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Modal from "@/Components/Modal.vue";
import FindDoctorBar from "@/Components/Doctors/FindDoctorBar.vue";
import FindClinicBar from "@/Components/Clinics/FindClinicBar.vue";
import FindEventBar from "@/Components/Events/FindEventBar.vue";
import SpotlightDoctorSection from "@/Components/Doctors/SpotlightDoctorSection.vue";
import HomeStatisticsBar from "@/Components/HomeStatisticsBar.vue";
import FeaturedTagsSection from "@/Components/Shared/FeaturedTagsSection.vue";
import FeaturedEventSection from "@/Components/Events/FeaturedEventSection.vue";
import DoctorsTabsSection from "@/Components/Doctors/DoctorsTabs.vue";
import FeaturedTestimonialsSection from "@/Components/Shared/FeaturedTestimonialsSection.vue";

import HomeStaticCardsSection from "@/Components/HomeStaticCardsSection.vue";
import ReviewSection from "@/Components/ReviewSection.vue";

import { Head, Link } from "@inertiajs/inertia-vue3";
import Section from "@/Components/Section.vue";
import axios from "axios";
import { Carousel, Navigation, Pagination, Slide } from "vue3-carousel";
import FeaturedClinicSection from "@/Components/Clinics/FeaturedClinicSection.vue";
import ContentSlider from "../Components/ContentSlider.vue";
import CardSkeleton from "../Components/Skeleton/CardSkeleton.vue";

export default defineComponent({
  props: {
    id: {
      type: String,
      required: true,
    },
  },
  components: {
    Head,
    Link,
    ContentSlider,
    Modal,
    AppLayout,

    CardSkeleton,
    FindDoctorBar,
    FindClinicBar,
    FindEventBar,
    HomeStatisticsBar,
    DoctorsTabsSection,
    HomeStaticCardsSection,
    SpotlightDoctorSection,
    FeaturedTagsSection,
    FeaturedEventSection,
    FeaturedTestimonialsSection,
    FeaturedClinicSection,

    ReviewSection,
    Carousel,
    Slide,
    Section,
    Pagination,
    Navigation,
  },
  created() {
    this.getFAQS();
    this.getServiceCategories();
    setTimeout(this.launchModal, 5000);
  },

  data: () => ({
    faqs: [],
    serviceCategories: [],
    // carousel settings
    settings: {
      itemsToShow: 1,
      snapAlign: "start",
    },
    modelValue: false,
    // breakpoints are mobile first
    // any settings not specified will fallback to the carousel settings
    breakpoints: {
      // 700px and up
      700: {
        itemsToShow: 1,
        snapAlign: "start",
      },
      // 1024 and up
      1024: {
        itemsToShow: 1,
        snapAlign: "start",
      },
    },
  }),
  methods: {
    readFunction() {
      var dots = document.getElementById("dots");
      var moreText = document.getElementById("more");
      var btnText = document.getElementById("myBtn");

      if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "read more";
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "read less";
        moreText.style.display = "inline";
      }
    },
    getFAQS() {
      axios.get(this.route("getApiFaqs")).then((res) => {
        this.faqs = res.data.data;
      });
    },
    getServiceCategories() {
      axios.get(this.route("getApiServiceCategories")).then((res) => {
        this.serviceCategories = res.data.data;
      });
    },

    launchModal() {
      const modalButton = document.querySelector(
        '[data-bs-target="#newsletterModal"]'
      );
      if (modalButton) {
        modalButton.click();
      }
    },
  },
});
</script>
<style scoped>
.accordion-button:not(.collapsed) {
  color: #294481 !important;
}
</style>
