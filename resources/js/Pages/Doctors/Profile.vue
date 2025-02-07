<template>
  <app-layout title="Profile">
    <div class="bg-primary">
      <pages-heading
        :textwhite="'true'"
        :heading="'Doctors Details'"
        :breadcrums="breadcrums"
      ></pages-heading>
    </div>
    <!-- <div class="profile-cover py-5">
            <div class="container">
                <div class="row py-5">
                    <div class="col-12">
                        <img v-if="doctor.cover_image" class="img-fluid" :src="doctor.cover_image" alt="image" />
                        <div v-else class="d-flex justify-content-center align-items-center position-relative">

                        </div>

                    </div>
                </div>
            </div>
        </div> -->

    <div class="stats">
      <div class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <div class="position-relative mb-4">
                <div class="dp-profile overflow-hidden rounded-5">
                  <img
                    v-if="doctor.image"
                    class="img-fluid w-100"
                    :src="doctor.image"
                    alt="image"
                    style="object-fit: cover"
                  />
                  <img
                    v-else
                    class="img-fluid"
                    src="@/images/account/default_avatar_men.png"
                    alt="image"
                    style="object-fit: cover"
                  />
                </div>

                <span
                  class="d-flex align-items-center position-absolute top-0 end-0 m-md-4 m-3"
                >
                  <span
                    v-if="doctor.is_online"
                    class="d-flex fs-3 p-3 align-items-center"
                    style="color: #24ff00"
                  >
                    <i class="bi bi-circle-fill me-2"></i
                    ><span style="color: #32ae1e">{{ __("Online") }}</span>
                  </span>
                  <span
                    v-else
                    class="d-flex fs-3 text-muted align-items-center"
                  >
                    <i class="bi bi-circle-fill me-3"></i
                    ><span>{{ __("Offline") }}</span>
                  </span>
                </span>
              </div>

              <div
                class="d-flex flex-md-row flex-column align-items-center justify-content-between mt-md-5 mt-3"
              >
                <h1 class="text-primary fs-1 fw-bold">
                  {{ doctor.name }}
                </h1>
                <div
                  class="d-flex flex-md-row flex-column align-items-center gap-md-3"
                >
                  <div class="d-flex align-items-center mb-1">
                    <star-rating
                      :rating="doctor.rating"
                      :star-size="16"
                      :read-only="true"
                      :increment="0.01"
                      :show-rating="false"
                    ></star-rating>
                    <span class="small mt-1 ps-1">({{ doctor.rating }})</span>
                  </div>
                  <div
                    v-if="checkObjectValuesIsNotNull(doctor.doctor_settings)"
                  >
                    <ul
                      class="d-flex ps-0 mb-0 social flex-wrap flex-md-nowrap gap-1 gap-md-0 mt-2 mt-md-0"
                    >
                      <li
                        class="list-group-item border-0"
                        v-if="doctor.doctor_settings.facebook_url"
                      >
                        <a
                          target="_blank"
                          :href="doctor.doctor_settings.facebook_url"
                          ><i class="bi bi-facebook"></i
                        ></a>
                      </li>
                      <li
                        class="list-group-item border-0"
                        v-if="doctor.doctor_settings.youtube_url"
                      >
                        <a
                          target="_blank"
                          :href="doctor.doctor_settings.youtube_url"
                          ><i class="bi bi-youtube"></i
                        ></a>
                      </li>
                      <li
                        class="list-group-item border-0"
                        v-if="doctor.doctor_settings.twitter_url"
                      >
                        <a
                          target="_blank"
                          :href="doctor.doctor_settings.twitter_url"
                          ><i class="bi bi-twitter"></i
                        ></a>
                      </li>
                      <li
                        class="list-group-item border-0"
                        v-if="doctor.doctor_settings.linkedin_url"
                      >
                        <a
                          target="_blank"
                          :href="doctor.doctor_settings.linkedin_url"
                          ><i class="bi bi-linkedin"></i
                        ></a>
                      </li>
                      <li
                        class="list-group-item border-0"
                        v-if="doctor.doctor_settings.whatsapp_url"
                      >
                        <a
                          target="_blank"
                          :href="doctor.doctor_settings.whatsapp_url"
                          ><i class="bi bi-whatsapp"></i
                        ></a>
                      </li>
                      <li
                        class="list-group-item border-0"
                        v-if="doctor.doctor_settings.instagram_url"
                      >
                        <a
                          target="_blank"
                          :href="doctor.doctor_settings.instagram_url"
                          ><i class="bi bi-instagram"></i
                        ></a>
                      </li>
                      <li
                        class="list-group-item border-0"
                        v-if="doctor.doctor_settings.tiktok_url"
                      >
                        <a
                          target="_blank"
                          :href="doctor.doctor_settings.tiktok_url"
                          ><i class="bi bi-tiktok"></i
                        ></a>
                      </li>
                      <li
                        class="list-group-item border-0"
                        v-if="doctor.doctor_settings.snapchat_url"
                      >
                        <a
                          target="_blank"
                          :href="doctor.doctor_settings.snapchat_url"
                          ><i class="bi bi-snapchat"></i
                        ></a>
                      </li>
                      <li
                        class="list-group-item border-0"
                        v-if="doctor.doctor_settings.pinterest_url"
                      >
                        <a
                          target="_blank"
                          :href="doctor.doctor_settings.pinterest_url"
                          ><i class="bi bi-pinterest"></i
                        ></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div
                v-html="doctor.description"
                class="fs-3 mb-md-5 mt-md-4 my-3"
                style="color: #696868; line-height: 30px; font-weight: normal"
              ></div>
              <!-- v-if="Object.keys(doctor.doctor_reviews).length > 0" -->
              <div class="accordion profile-accordian" id="accordionExample">
                <div class="accordion-item mb-3">
                  <h2 class="accordion-header overflow-hidden">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapsetwo"
                      aria-expanded="false"
                      aria-controls="collapsetwo"
                    >
                      {{ __("Rating & Reviews") }}
                    </button>
                  </h2>
                  <div
                    id="collapsetwo"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample"
                  >
                    <doctor-profile-reviews-section
                      :doctor_id="doctor.id"
                      :doctor="doctor"
                      :reviews="doctor.doctor_reviews"
                    ></doctor-profile-reviews-section>
                  </div>
                </div>
                <div
                  class="accordion-item mb-3"
                  v-if="Object.keys(doctor.appointment_types).length > 0"
                >
                  <h2 class="accordion-header overflow-hidden">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapsethree"
                      aria-expanded="true"
                      aria-controls="collapsethree"
                    >
                      {{ __("Doctor's Timetable") }}
                    </button>
                  </h2>
                  <div id="collapsethree" class="accordion-collapse collapse">
                    <div class="accordion-body">
                      <doctor-timetable
                        :doctor_appointments="doctor.appointment_schedules"
                      ></doctor-timetable>
                    </div>
                  </div>
                </div>
                <div
                  class="accordion-item mb-3"
                  v-if="Object.keys(doctor.doctor_podcasts).length > 0"
                >
                  <h2 class="accordion-header overflow-hidden">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapsefourth"
                      aria-expanded="true"
                      aria-controls="collapsefourth"
                    >
                      {{ __("podcast") }}
                    </button>
                  </h2>
                  <div
                    id="collapsefourth"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="col-md-12 p-3">
                      <div class="row">
                        <podcast-card
                          v-for="podcast in doctor.doctor_podcasts.slice(0, 2)"
                          :podcast="podcast"
                          :key="podcast.id"
                          :profile="true"
                        ></podcast-card>
                      </div>
                      <Link
                        class="btn btn-primary shadow-find rounded-4 fs-4 fw-bold"
                        :href="
                          route('podcasts.listing', {
                            doctor: doctor.user_name,
                          })
                        "
                        >{{ __("view all") }}</Link
                      >
                    </div>
                  </div>
                </div>
                <div
                  class="accordion-item mb-3"
                  v-if="Object.keys(doctor.doctor_events).length > 0"
                >
                  <h2 class="accordion-header overflow-hidden">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapsefifth"
                      aria-expanded="true"
                      aria-controls="collapsefifth"
                    >
                      {{ __("events") }}
                    </button>
                  </h2>
                  <div
                    id="collapsefifth"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="row">
                      <event-card
                        class="my-4"
                        :add_col="true"
                        v-for="event in doctor.doctor_events.slice(0, 2)"
                        :event="event"
                        :profile="true"
                        :key="event.id"
                      ></event-card>
                      <div class="col-md-4">
                        <Link
                          class="btn btn-primary shadow-find rounded-4 fs-4 fw-bold m-4"
                          :href="
                            route('events.listing', {
                              doctor: doctor.user_name,
                            })
                          "
                          >{{ __("view all") }}</Link
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="accordion-item mb-3"
                  v-if="Object.keys(doctor.doctor_archives).length > 0"
                >
                  <h2 class="accordion-header overflow-hidden">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapsesixth"
                      aria-expanded="true"
                      aria-controls="collapsesixth"
                    >
                      {{ __("archives") }}
                    </button>
                  </h2>
                  <div
                    id="collapsesixth"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="col-md-12 p-3">
                      <div class="row">
                        <archive-card
                          v-for="archive in doctor.doctor_archives.slice(0, 2)"
                          :archive="archive"
                          :key="archive.id"
                          :profile="true"
                        >
                        </archive-card>
                      </div>
                      <Link
                        class="btn btn-primary shadow-find rounded-4 fs-4 fw-bold"
                        :href="
                          route('archives.listing', {
                            doctor: doctor.user_name,
                          })
                        "
                        >{{ __("view all") }}</Link
                      >
                    </div>
                  </div>
                </div>
                <div
                  class="accordion-item mb-3"
                  v-if="Object.keys(doctor.doctor_posts).length > 0"
                >
                  <h2 class="accordion-header overflow-hidden">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseseventh"
                      aria-expanded="true"
                      aria-controls="collapseseventh"
                    >
                      {{ __("blogs") }}
                    </button>
                  </h2>
                  <div
                    id="collapseseventh"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="col-md-12 p-3">
                      <div class="row">
                        <post-card
                          v-for="post in doctor.doctor_posts.slice(0, 2)"
                          :post="post"
                          :key="post.id"
                          :profile="true"
                        ></post-card>
                      </div>
                      <Link
                        class="btn btn-primary shadow-find rounded-4 fs-4 fw-bold"
                        :href="
                          route('blogs.listing', { doctor: doctor.user_name })
                        "
                        >{{ __("view all") }}</Link
                      >
                    </div>
                  </div>
                </div>
                <div
                  class="accordion-item mb-3"
                  v-if="Object.keys(doctor.doctor_posts).length > 0"
                >
                  <h2 class="accordion-header overflow-hidden">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseeighth"
                      aria-expanded="true"
                      aria-controls="collapseeighth"
                    >
                      {{ __("broadcast") }}
                    </button>
                  </h2>
                  <div
                    id="collapseeighth"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample"
                  >
                    <div class="col-md-12 p-3">
                      <div class="row">
                        <broadcast-card
                          v-for="broadcast in doctor.doctor_broadcasts.slice(
                            0,
                            2
                          )"
                          :broadcast="broadcast"
                          :key="broadcast.id"
                          :profile="true"
                        ></broadcast-card>
                      </div>
                      <Link
                        class="btn btn-primary shadow-find rounded-4 fs-4 fw-bold"
                        :href="
                          route('broadcasts.listing', {
                            doctor: doctor.user_name,
                          })
                        "
                        >{{ __("view all") }}</Link
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- <h6 class="fw-bold text-center">{{ __("Share My Profile") }}</h6> -->
            <!-- <div class="dropdown-center text-center">
                <button
                  class="btn btn-secondary position-relative fw-bold"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  {{ __("Share My Profile")
                  }}<i class="bi bi-share-fill ms-2"></i>
                </button>
                <ul
                  class="dropdown-menu position-absolute border-0 bg-white mt-1 px-2 shadow-sm"
                >
                  <div
                    class="d-flex align-items-center social-share justify-content-center"
                  >
                    <li>
                      <a
                        :href="
                          'mailto:?subject=See My Profile&amp;body=Check out this Profile ' +
                          hostName() +
                          '/doctor/profile/' +
                          doctor.user_name
                        "
                      >
                        <i class="bi bi-envelope"></i
                      ></a>
                    </li>
                    <li>
                      <a
                        target="_blank"
                        :href="
                          'https://www.facebook.com/sharer.php?u=' +
                          hostName() +
                          '/doctor/profile/' +
                          doctor.user_name
                        "
                        ><i class="bi bi-facebook"></i
                      ></a>
                    </li>
                    <li>
                      <a
                        target="_blank"
                        :href="
                          'https://api.whatsapp.com/send?text=' +
                          hostName() +
                          '/doctor/profile/' +
                          doctor.user_name
                        "
                        ><i class="bi bi-whatsapp"></i
                      ></a>
                    </li>
                    <li>
                      <input
                        type="text"
                        class="border-0"
                        style="visibility: hidden; width: 0"
                        id="copyProfile"
                        :value="hostName() + '/profile/' + doctor.user_name"
                      />
                      <button
                        type="button"
                        @click="copyProfile()"
                        data-bs-container="body"
                        data-bs-toggle="popover"
                        data-bs-placement="top"
                        data-bs-content="Top popover"
                        class="position-absolute"
                      >
                        <i class="bi bi-link"></i>
                      </button>
                    </li>
                    <li>
                      <input
                        type="url"
                        id="website"
                        class="border-0"
                        style="visibility: hidden; width: 0"
                        :value="
                          hostName() + '/doctor/profile/' + doctor.user_name
                        "
                        name="website"
                        :placeholder="hostName()"
                        required
                      />
                      <button type="button" @click="generateQRCode()">
                        <i class="bi bi-qr-code-scan"></i>
                      </button>
                    </li>
                  </div>
                </ul>
              </div> -->
            <div class="col-md-5">
              <div
                class="card py-md-5 px-md-4 px-2 bg-primary"
                style="position: sticky; top: 120px"
              >
                <div class="card-body mb-2">
                  <h1 class="text-start text-white mb-5">
                    {{ __("Quick Profile") }}
                  </h1>
                  <div
                    class="d-flex align-items-center border-bottom borer-white pb-4 mb-4 fs-3 fw-normal text-white justify-content-between"
                  >
                    <span>{{ __("name") }}:</span>
                    <span>Dr.{{ doctor.name }}</span>
                  </div>
                  <div
                    class="d-flex align-items-center border-bottom borer-white pb-4 mb-4 fs-3 fw-normal text-white justify-content-between"
                  >
                    <span>{{ __("category") }}:</span>
                    <span>{{
                      getCategoryNames(doctor.doctor_categories)
                    }}</span>
                  </div>
                  <div
                    class="d-flex align-items-center border-bottom borer-white pb-4 mb-4 fs-3 fw-normal text-white justify-content-between"
                  >
                    <span>{{ __("Certificate") }}:</span>
                    <span>{{
                      formattedCertificates ? formattedCertificates : "N/A"
                    }}</span>
                  </div>
                  <div
                    class="d-flex align-items-center border-bottom borer-white pb-4 mb-4 fs-3 fw-normal text-white justify-content-between"
                  >
                    <span>{{ __("experience") }}:</span>
                    <span>{{ doctor.experience }} {{ __("years") }}</span>
                  </div>
                  <div
                    class="d-flex align-items-center border-bottom borer-white pb-4 mb-4 fs-3 fw-normal text-white justify-content-between"
                  >
                    <span>{{ __("speciality") }}:</span>
                    <span>{{ doctor.speciality }}</span>
                  </div>
                  <div
                    class="d-flex flex-column gap-4 my-5"
                    v-if="doctor.appointment_types"
                  >
                    <button
                      type="button"
                      v-for="(schedule_type, index) in doctor.appointment_types"
                      :key="index"
                      @click="
                        checkLoginAndRedirect(
                          doctor,
                          schedule_type.appointment_type
                        )
                      "
                      class="btn-appointment d-flex px-4 py-2 align-items-center justify-content-start"
                    >
                      <div
                        class="d-flex align-items-center justify-content-center"
                      >
                        <img
                          v-if="schedule_type.type == 'video'"
                          src="@/images/icons/Video3.svg"
                          alt=""
                        />
                        <img
                          v-if="schedule_type.type == 'audio'"
                          src="@/images/icons/audio2.svg"
                          alt=""
                        />
                        <img
                          v-if="schedule_type.type == 'chat'"
                          src="@/images/icons/chat2.svg"
                          alt=""
                        />
                        <span class="fw-bold ps-4">{{
                          __(schedule_type.appointment_type.display_name)
                        }}</span>
                      </div>

                      <!--  <span class="fs-5">
                          &nbsp;- (
                          {{ getDisplayAmount(schedule_type.fee) }}
                          <span v-if="schedule_type.appointment_type.is_schedule_required"> - {{ schedule_type.slot_duration }} {{ __("minutes") }}</span>
                          )
                        </span>
                      </div> -->
                    </button>
                    <button
                      v-if="doctor.doctor_settings.calendly_link"
                      :onclick="`Calendly.initPopupWidget({url: '${doctor.doctor_settings.calendly_link}'});return false;`"
                      class="btn btn-light me-0 me-md-3 px-5 ms-2 ms-md-0 px-md-4 shadow-none fw-bold py-3"
                    >
                      {{ __("book with calendly") }}
                    </button>
                  </div>
                  <p class="subheading-fs text-white text-center">
                    {{
                      __(
                        "Discover a wide range of online doctors, specialized in various fields, offering diverse treatments and services."
                      )
                    }}
                  </p>
                  <!-- <div
                    class="d-flex align-items-center flex-wrap position-relative"
                  >
                    <h2
                      class="fs-4 fw-bold text-dark d-flex align-items-center mb-2 text-capitalize"
                    >
                      <i
                        v-if="doctor.is_featured"
                        class="bi bi-patch-check-fill me-1 text-primary"
                      ></i>

                      <span class="fs-2 text-primary">{{ doctor.name }}</span>

                     <small v-if="doctor.clinic_name" class="text-muted">({{ doctor.clinic_name
                                        }})</small>

                      <span class="fw-normal small ps-1 ms-2" style="border-left:1px solid"
                                            v-if="doctor.distance"> ( {{ formatDecimal(doctor.distance) }} Km) Away</span>

                      <img
                        v-if="doctor.is_premium"
                        src="@/images/icons/is_premium.svg"
                        class="ms-5"
                        alt="Icon"
                      />
                    </h2>

                     <div class="position-absolute end-0 d-none d-md-block">

                                        <input type="url" id="website" class="border-0" style="visibility:hidden; width:0;"
                                            :value="hostName() + '/doctor/profile/' + doctor.user_name" name="website"
                                            :placeholder="hostName()" required />
                                        <div id="qrcode-container" class="d-flex justify-content-center">
                                            <div id="qrcode" class="qrcode"></div>
                                        </div>
                                    </div>

                    <div class="position-absolute end-0">
                      <input
                        type="url"
                        id="website"
                        class="border-0"
                        style="display: none; width: 0"
                        :value="
                          hostName() + '/doctor/profile/' + doctor.user_name
                        "
                        name="website"
                        :placeholder="hostName()"
                        required
                      />
                      <div
                        id="qrcode-container"
                        class="d-flex justify-content-center"
                      >
                        <div id="qrcode" class="qrcode"></div>
                      </div>
                    </div>
                  </div> -->

                  <!-- <ul class="list-unstyled d-flex flex-wrap mb-2">
                    <li
                      class="me-2 mb-2 d-inline-block pe-2"
                      style="font-size: 14px"
                      v-for="(cat, i) in visibleCategories"
                      :key="cat.id"
                      :class="{
                        'border-end': i != visibleCategories.length - 1,
                      }"
                    >
                      {{ cat.name }}
                    </li>
                  </ul>
                  <div v-if="doctor.doctor_categories.length > 6">
                    <a
                      class="text-primary fw-bold text-decoration-none"
                      style="cursor: pointer"
                      v-if="!showAll"
                      @click="showAll = true"
                      >See More</a
                    >
                    <a
                      class="text-primary fw-bold text-decoration-none"
                      style="cursor: pointer"
                      v-if="showAll"
                      @click="showAll = false"
                      >See Less</a
                    >
                  </div> -->

                  <!-- <div class="col-auto" v-if="doctor.experience">
                                        <div class="d-flex align-items-center justify-content-center mt-2">
                                            <span class="fs-4 fw-bold me-2">{{ __("Experience:") }}</span>
                                            <span class="fs-4" v-if="doctor.experience == 1">{{ doctor.experience }} {{
                                                __("Years Of Experience") }}</span>
                                            <span class="fs-4" v-else>{{ doctor.experience }} {{ __("Years of experience") }}</span>
                                        </div>
                                    </div> -->

                  <!-- <div class="col-auto" v-if="doctor.speciality">
                      <div
                        class="d-flex align-items-center justify-content-center mt-2"
                      >
                        <span class="fs-4 fw-bold me-2">{{
                          __("Speciality:")
                        }}</span>
                        <span class="fs-4">{{ doctor.speciality }}</span>
                      </div>
                    </div> -->
                </div>
              </div>
            </div>
          </div>

          <!-- </div> -->
          <!-- <ul class="social-share justify-content-center">
                            <li>
                                <a :href="'mailto:?subject=See My Profile&amp;body=Check out this Profile ' + hostName() + '/doctor/profile/' + doctor.user_name"
                                > <i class="bi bi-envelope"></i></a>
                            </li>
                            <li>
                                <a target="_blank"
                                    :href="'https://www.facebook.com/sharer.php?u=' + hostName() + '/doctor/profile/' + doctor.user_name"><i
                                        class="bi bi-facebook"></i></a>
                            </li>
                            <li>

                                <a target="_blank"
                                    :href="'https://api.whatsapp.com/send?text=' + hostName() + '/doctor/profile/' + doctor.user_name"><i
                                        class="bi bi-whatsapp"></i></a>
                            </li>
                            <li>
                                <input type="text" class="border-0" style="visibility:hidden; width:0;" id="copyProfile"
                                    :value="hostName() + '/profile/' + doctor.user_name">
                                <button type="button" @click="copyProfile()" data-bs-container="body"
                                    data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover"
                                    class="position-absolute"><i class="bi bi-link"></i></button>
                            </li>
                        </ul> -->
        </div>
      </div>
    </div>

    <!-- <div class="py-md-5">
        <div class="container">
          <div class="row">
            <ul
              class="nav nav-tabs profile-tabs gap-3 px-4 px-md-0 fw-medium mb-3"
              id="profile-tab"
              role="tablist"
            >
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="profile-blog-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#profile-blog"
                  type="button"
                  role="tab"
                  aria-controls="profile-blog"
                  aria-selected="false"
                >
                  {{ __n("blog") }}
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="profile-archive-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#profile-archive"
                  type="button"
                  role="tab"
                  aria-controls="profile-archive"
                  aria-selected="false"
                >
                  {{ __n("archive") }}
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="profile-event-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#profile-event"
                  type="button"
                  role="tab"
                  aria-controls="profile-event"
                  aria-selected="false"
                >
                  {{ __n("event") }}
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="profile-youtube-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#profile-youtube"
                  type="button"
                  role="tab"
                  aria-controls="profile-youtube"
                  aria-selected="false"
                >
                  {{ __("youtube") }}
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="profile-review-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#profile-review"
                  type="button"
                  role="tab"
                  aria-controls="profile-review"
                  aria-selected="false"
                >
                  {{ __("Reviews") }}
                </button>


              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="profile-broadcast-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#profile-broadcast"
                  type="button"
                  role="tab"
                  aria-controls="profile-broadcast"
                  aria-selected="true"
                >
                  {{ __n("broadcast") }}
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="profile-podcast-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#profile-podcast"
                  type="button"
                  role="tab"
                  aria-controls="profile-podcast"
                  aria-selected="false"
                >
                  {{ __n("podcast") }}
                </button>
              </li>

              <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-disabled-tab" data-bs-toggle="pill"
                            data-bs-target="#profile-disabled" type="button" role="tab" aria-controls="profile-disabled"
                            aria-selected="false" disabled>Disabled</button>
                    </li>
            </ul>
          </div>
          <div class="tab-content" id="profile-tabContent">
            <div
              class="tab-pane fade"
              id="profile-broadcast"
              role="tabpanel"
              aria-labelledby="profile-broadcast-tab"
              tabindex="0"
            >
              <profile-section
                :href="
                  route('broadcasts.listing', { doctor: doctor.user_name })
                "
                v-if="
                  hasModule(
                    'doctor-list-services',
                    'doctor',
                    doctor.doctor_modules
                  ) && doctor.doctor_broadcasts.length > 0
                "
                :heading="doctor.name + ' ' + __n('broadcast')"
              >
                <broadcast-card
                  v-for="broadcast in doctor.doctor_broadcasts"
                  :broadcast="broadcast"
                  :key="broadcast.id"
                ></broadcast-card>
              </profile-section>
            </div>
            <div
              class="tab-pane fade"
              id="profile-podcast"
              role="tabpanel"
              aria-labelledby="profile-podcast-tab"
              tabindex="0"
            >
              <profile-section
                :href="route('podcasts.listing', { doctor: doctor.user_name })"
                v-if="doctor.doctor_podcasts.length > 0"
                :heading="doctor.name + ' ' + __n('podcast')"
              >
                <podcast-card
                  v-for="podcast in doctor.doctor_podcasts"
                  :podcast="podcast"
                  :key="podcast.id"
                ></podcast-card>
              </profile-section>
            </div>

            <div
              class="tab-pane fade show active"
              id="profile-blog"
              role="tabpanel"
              aria-labelledby="profile-blog-tab"
              tabindex="0"
            >
              <profile-section
                :href="route('blogs.listing', { doctor: doctor.user_name })"
                v-if="doctor.doctor_posts.length > 0"
                :heading="doctor.name + ' ' + __n('blog')"
              >
                <post-card
                  v-for="post in doctor.doctor_posts"
                  :post="post"
                  :key="post.id"
                ></post-card>
              </profile-section>
            </div>

            <div
              class="tab-pane fade"
              id="profile-archive"
              role="tabpanel"
              aria-labelledby="profile-archive-tab"
              tabindex="0"
            >
              <profile-section
                :href="route('archives.listing', { doctor: doctor.user_name })"
                v-if="doctor.doctor_archives.length > 0"
                :heading="doctor.name + ' ' + __n('archive')"
              >

              </profile-section>
            </div>
            <div
              class="tab-pane fade"
              id="profile-event"
              role="tabpanel"
              aria-labelledby="profile-event-tab"
              tabindex="0"
            >
              <profile-section
                :href="route('events.listing', { doctor: doctor.user_name })"
                v-if="doctor.doctor_events.length > 0"
                :heading="doctor.name + ' ' + __n('event')"
              >
                <div class="d-flex flex-wrap align-items-center">

                </div>
              </profile-section>
            </div>
            <div
              class="tab-pane fade"
              id="profile-youtube"
              role="tabpanel"
              aria-labelledby="profile-youtube-tab"
              tabindex="0"
            >
              <profile-section
                :outer_href="doctor.doctor_settings.youtube_channel_link"
                v-if="doctor.doctor_settings.youtube_playlist_link"
                :heading="doctor.name + ' ' + __n('youtube')"
              >
                <div class="row">
                  <div class="col-12">
                    <iframe
                      width="560"
                      height="315"
                      :src="doctor.doctor_settings.youtube_playlist_link"
                      frameborder="0"
                      class="me-3"
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                      allowfullscreen
                    ></iframe>
                    <iframe
                      width="560"
                      height="315"
                      :src="doctor.doctor_settings.youtube_playlist_link"
                      frameborder="0"
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                      allowfullscreen
                    ></iframe>
                  </div>
                </div>
              </profile-section>
            </div>



          </div>
        </div>
      </div> -->
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import DoctorAccount from "@/Components/Doctors/DoctorAccount.vue";
import BroadcastCard from "@/Components/Broadcasts/BroadcastCard.vue";
import PodcastCard from "@/Components/Podcasts/PodcastCard.vue";
import ExperienceCard from "@/Components/Experiences/ExperienceCard.vue";
import DoctorTimetable from "@/Components/Doctors/DoctorTimetable.vue";
import PostCard from "@/Components/Posts/PostCard.vue";
import DoctorProductCard from "@/Components/Doctors/DoctorProductCard.vue";
import ArchiveCard from "@/Components/Archives/ArchiveCard.vue";
import EventCard from "@/Components/Events/EventCard.vue";
import ProfileSection from "@/Components/Shared/ProfileSection.vue";
import DoctorProfileReviewsSection from "@/Components/Doctors/DoctorProfileReviewsSection.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import PagesHeading from "../../Components/PagesHeading.vue";
export default defineComponent({
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    DoctorAccount,
    BroadcastCard,
    PagesHeading,
    PodcastCard,
    DoctorTimetable,
    ExperienceCard,
    ProfileSection,
    PostCard,
    DoctorProductCard,
    ArchiveCard,
    EventCard,
    DoctorProfileReviewsSection,
    Head,
    Link,
  },
  data() {
    return {
      doctor: this.$page.props.doctor,
      showAll: false,
      breadcrums: [
        {
          id: 1,
          name: this.__("Home"),
          link: "/",
        },
        {
          id: 2,
          name: this.__("doctors"),
          link: "/doctors",
        },
        {
          id: 3,
          name: `${window.location.pathname.split("/")[3]}`,
          link: "#",
        },
      ],
    };
  },
  computed: {
    visibleCategories() {
      return this.showAll
        ? this.doctor.doctor_categories
        : this.doctor.doctor_categories.slice(0, 3);
    },
  },
  computed: {
    formattedCertificates() {
      let names = this.doctor.doctor_certifications.map((cert) => cert.name);
      let joinedNames = names.join(" | ");
      if (joinedNames.length > 20) {
        return joinedNames.substring(0, 20) + "...";
      }
      return joinedNames;
    },
  },

  mounted() {
    this.generateQRCode();
  },
  props: ["appointment_types"],
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
        .join(" | ");
    },
    submit() {},
    logEvent(evt) {
      // Here you can handle the emitted events with custom code
      if (evt === "calendly.profile_page_viewed") {
      }
    },
    copyProfile() {
      // Get the text field
      var copyText = document.getElementById("copyProfile");

      // Select the text field
      copyText.select();
      copyText.setSelectionRange(0, 99999); // For mobile devices

      // Copy the text inside the text field
      navigator.clipboard.writeText(copyText.value);
      this.$toast.success("Profile link copied to Clipboard");
    },

    generateQRCode() {
      let website = document.getElementById("website").value;
      let qrcodeContainer = document.getElementById("qrcode");
      var isToggled = qrcodeContainer.innerHTML === "" ? false : true;
      if (website && !isToggled) {
        let qrcodeContainer = document.getElementById("qrcode");
        qrcodeContainer.innerHTML = "";
        new QRCode(qrcodeContainer, {
          text: website,
          width: 100,
          height: 100,
          colorDark: "#000000",
          colorLight: "#F6F7FA",
          correctLevel: QRCode.CorrectLevel.H,
        });

        document.getElementById("qrcode-container").style.display = "block";
      } else {
        qrcodeContainer.innerHTML = "";
        // alert("Please enter a valid URL");
      }
    },
  },
});
</script>

