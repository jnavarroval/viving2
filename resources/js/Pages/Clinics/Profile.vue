<template>
  <app-layout title="My Profile">
    <div class="stats">
      <div class="bg-primary">
        <pages-heading
          :textwhite="'true'"
          :heading="'Clinics Details'"
          :breadcrums="breadcrums"
        ></pages-heading>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div
              class="card w-100 rounded-0 py-3 mx-md-3 my-5"
              style="background-color: #ebf3f9"
            >
              <div class="card-body pb-0 px-3">
                <div class="row px-md-3">
                  <div class="col-lg-3">
                    <!-- <i v-if="clinic.is_featured" class="bi text-primary bi-patch-check-fill position-absolute top-0 start-0 ms-2 fs-2" style="z-index: 2;"></i> -->
                    <Link
                      :href="
                        route('clinic.profile', { user_name: clinic.user_name })
                      "
                    >
                      <div
                        class="d-flex justify-content-center rounded-5 overflow-hidden"
                        style="height: 250px"
                      >
                        <img
                          v-if="clinic.image"
                          class="img-fluid w-100"
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
                      <div
                        class="d-flex mb-0 mb-md-2 flex-column align-items-start"
                      >
                        <h2 class="mb-0 fs-5 text-capitalize">
                          <Link
                            :href="
                              route('clinic.profile', {
                                user_name: clinic.user_name,
                              })
                            "
                            class="text-decoration-none text-primary fw-bold fs-1 mb-3 mb-md-0"
                            >{{ clinic.name }}</Link
                          >
                        </h2>
                      </div>
                      <div class="text-end d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center">
                          <star-rating
                            :rating="clinic.rating"
                            :star-size="15"
                            :read-only="true"
                            :increment="0.01"
                            :show-rating="false"
                          ></star-rating>
                          <span class="text-black opacity-50 mt-1 ps-1 fs-5"
                            >({{ clinic.rating }} /5)</span
                          >
                        </div>

                        <!-- <Link
                          :href="
                            route('clinic.profile', {
                              user_name: clinic.user_name,
                            })
                          "
                          class="btn btn-primary px-4 fs-3 py-2 rounded-4"
                        >
                          {{
                            getPageContent("general_book_btn_1_text") ??
                            __("book appointment")
                          }}
                        </Link> -->
                      </div>
                    </div>

                    <div class="d-flex align-items-center gap-3 mb-3">
                      <h3 class="fs-3 text-black fw-normal mb-0">
                        {{ clinic.clinic_categories.name }}
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
                        <h6 class="fs-3 text-primary fw-bold">
                          {{ __("experience") }}
                        </h6>
                        <span class="fs-3 text-dark opacity-50">{{
                          clinic.experience
                        }}</span>
                        <!-- <span class="fs-5 text-lightsecondary" v-if="clinic.experience == 1">{{ clinic.experience }} {{ __("year") }}</span>
                            <span class="fs-5 text-lightsecondary" v-else>{{ clinic.experience }} {{ __("years") }}</span> -->
                      </div>
                      <div class="col-md-3 text-start mb-2 mb-md-0">
                        <h6 class="fs-3 text-primary fw-bold">
                          {{ __("doctors") }}
                        </h6>
                        <span class="fs-3 text-dark opacity-50"
                          >{{ clinic.total_clinic_doctors }}
                          {{ __("doctors") }}</span
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
                        <h6 class="fs-3 text-primary fw-bold">
                          {{ __("socials") }}
                        </h6>
                        <div
                          class="col-md-12 text-start"
                          v-if="
                            checkObjectValuesIsNotNull(clinic.clinic_settings)
                          "
                        >
                          <div
                            class="d-flex justify-content-between align-items-center"
                          >
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

                    <div
                      v-if="clinic.appointment_types"
                      class="d-flex flex-md-row gap-4 my-5 flex-column"
                    >
                      <button
                        type="button"
                        v-for="(
                          schedule_type, index
                        ) in clinic.appointment_types"
                        :key="index"
                        @click="
                          -checkLoginAndRedirect(
                            clinic,
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
                            src="@/images/icons/video3.svg"
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="section py-5">
      <div class="container">
        <div class="row mb-4">
          <div class="col-12">
            <img
              v-if="clinic.cover_image"
              class="img-fluid"
              :src="clinic.cover_image"
              alt="image"
              style="width: 100%; height: 300px"
            />
            <div v-else class="cover-header rounded-2"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-12">
             <i
              v-if="clinic.is_featured"
              class="bi text-primary bi-patch-check-fill ms-2 fs-2"
              style="z-index: 2"
            ></i>
            <div class="profile-image position-relative shadow rounded-5 mb-4">
              <img
                v-if="clinic.image"
                class="img-fluid w-100 rounded-5"
                :src="clinic.image"
                alt="image"
                style="object-fit: contain"
              />
              <img
                v-else
                class="img-fluid mt-4"
                src="@/images/account/default_avatar_men.png"
                alt="image"
              />
              <span
                class="d-flex align-items-center position-absolute top-0 end-0 m-3"
              >
                <span
                  v-if="clinic.is_online"
                  class="d-flex fs-4"
                  style="color: #08fa20"
                >
                  <i class="bi bi-circle-fill"></i>
                </span>
                <span v-else class="d-flex fs-4 text-muted">
                  <i class="bi bi-circle-fill"></i>
                </span>
              </span>
            </div>

            <div class="dropdown-center text-center">
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
                        '/clinic/profile/' +
                        clinic.user_name
                      "
                      title="Share by Email"
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
                        '/clinic/profile/' +
                        clinic.user_name
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
                        '/clinic/profile/' +
                        clinic.user_name
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
                      :value="hostName() + '/profile/' + clinic.user_name"
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
                      <i class="bi bi-check2-all"></i>
                    </button>
                  </li>
                  <li>
                    <input
                      type="url"
                      id="website"
                      class="border-0"
                      style="visibility: hidden; width: 0"
                      :value="
                        hostName() + '/clinic/profile/' + clinic.user_name
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
            </div>
          </div>

          <div class="col-md-9">
            <div class="card bg-transparent">
              <div class="card-body mb-2">
                <div
                  class="d-flex align-items-center flex-wrap position-relative"
                >
                  <h2
                    class="fs-4 fw-bold text-dark d-flex align-items-center mb-2 text-capitalize"
                  >
                    <i
                      v-if="clinic.is_featured"
                      class="bi bi-patch-check-fill me-1 text-primary"
                    ></i>

                    <span class="fs-2 text-primary">{{ clinic.name }}</span>

                     <small v-if="doctor.clinic_name" class="text-muted">({{ doctor.clinic_name
                                        }})</small> -->

      <!-- <span class="fw-normal small ps-1 ms-2" style="border-left:1px solid"
                                            v-if="doctor.distance"> ( {{ formatDecimal(doctor.distance) }} Km) Away</span>

                    <img
                      v-if="clinic.is_premium"
                      src="@/images/icons/is_premium.svg"
                      class="ms-5"
                      alt="Icon"
                    />
                  </h2>

                  <div class="position-absolute end-0">
                    <input
                      type="url"
                      id="website"
                      class="border-0"
                      style="visibility: hidden; width: 0"
                      :value="
                        hostName() + '/clinic/profile/' + clinic.user_name
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
                </div>

                <ul class="list-unstyled mb-3 w-lg-75 truncate">
                  <li
                    class="me-2 d-inline-block pe-2"
                    style="font-size: 14px"
                    v-for="(cat, i) in clinic.clinic_categories"
                    :key="cat.id"
                    v-bind:class="{
                      'border-end': i != clinic.clinic_categories.length - 1,
                    }"
                  >
                    {{ cat.name }}
                  </li>
                </ul>

                <div class="row align-items-center mb-3">
                  <div class="col-auto">
                    <div
                      class="d-flex align-items-center justify-content-center"
                    >
                      <star-rating
                        :rating="clinic.rating"
                        :star-size="18"
                        :read-only="true"
                        :increment="0.01"
                        :show-rating="false"
                      ></star-rating>
                      <span class="small mt-2 ps-1">({{ clinic.rating }})</span>
                    </div>
                  </div>

                  <div class="col-auto" v-if="clinic.speciality">
                    <div
                      class="d-flex align-items-center justify-content-center mt-2"
                    >
                      <span class="fs-4 fw-bold me-2">{{
                        __("Speciality:")
                      }}</span>
                      <span class="fs-4">{{ clinic.speciality }}</span>
                    </div>
                  </div>
                  <div
                    class="d-flex col-auto align-items-start align-items-md-center mt-2 flex-column flex-md-row"
                    v-if="checkObjectValuesIsNotNull(clinic.clinic_settings)"
                  >
                    <span class="text-black fw-bold fs-4 me-2">{{
                      __("Socials:")
                    }}</span>
                    <ul
                      class="d-flex ps-0 mb-0 social flex-wrap flex-md-nowrap gap-1 gap-md-0 mt-2 mt-md-0"
                    >
                      <li
                        class="list-group-item border-0"
                        v-if="clinic.clinic_settings.facebook_url"
                      >
                        <a
                          target="_blank"
                          :href="clinic.clinic_settings.facebook_url"
                          ><i class="bi bi-facebook"></i
                        ></a>
                      </li>
                      <li
                        class="list-group-item border-0"
                        v-if="clinic.clinic_settings.youtube_url"
                      >
                        <a
                          target="_blank"
                          :href="clinic.clinic_settings.youtube_url"
                          ><i class="bi bi-youtube"></i
                        ></a>
                      </li>
                      <li
                        class="list-group-item border-0"
                        v-if="clinic.clinic_settings.twitter_url"
                      >
                        <a
                          target="_blank"
                          :href="clinic.clinic_settings.twitter_url"
                          ><i class="bi bi-twitter"></i
                        ></a>
                      </li>
                      <li
                        class="list-group-item border-0"
                        v-if="clinic.clinic_settings.linkedin_url"
                      >
                        <a
                          target="_blank"
                          :href="clinic.clinic_settings.linkedin_url"
                          ><i class="bi bi-linkedin"></i
                        ></a>
                      </li>
                      <li
                        class="list-group-item border-0"
                        v-if="clinic.clinic_settings.whatsapp_url"
                      >
                        <a
                          target="_blank"
                          :href="clinic.clinic_settings.whatsapp_url"
                          ><i class="bi bi-whatsapp"></i
                        ></a>
                      </li>
                      <li
                        class="list-group-item border-0"
                        v-if="clinic.clinic_settings.instagram_url"
                      >
                        <a
                          target="_blank"
                          :href="clinic.clinic_settings.instagram_url"
                          ><i class="bi bi-instagram"></i
                        ></a>
                      </li>
                      <li
                        class="list-group-item border-0"
                        v-if="clinic.clinic_settings.tiktok_url"
                      >
                        <a
                          target="_blank"
                          :href="clinic.clinic_settings.tiktok_url"
                          ><i class="bi bi-tiktok"></i
                        ></a>
                      </li>
                      <li
                        class="list-group-item border-0"
                        v-if="clinic.clinic_settings.snapchat_url"
                      >
                        <a
                          target="_blank"
                          :href="clinic.clinic_settings.snapchat_url"
                          ><i class="bi bi-snapchat"></i
                        ></a>
                      </li>
                      <li
                        class="list-group-item border-0"
                        v-if="clinic.clinic_settings.pinterest_url"
                      >
                        <a
                          target="_blank"
                          :href="clinic.clinic_settings.pinterest_url"
                          ><i class="bi bi-pinterest"></i
                        ></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <h3 class="text-primary fw-bold fs-2 mt-4">
                  {{ __("About Me") }}
                </h3>
                <div
                  v-html="clinic.description"
                  class="fs-4 text-black line-clamp"
                ></div>
              </div>
            </div>

            <div class="d-flex align-items-center flex-wrap">
                            <div class="d-flex align-items-center" v-if="doctor.appointment_types">
                                <button type="button" v-for="(schedule_type, index) in doctor.appointment_types"
                                    :key="index" @click="checkLoginAndRedirect(doctor, schedule_type.appointment_type)"
                                    class="btn btn-light d-flex px-4 py-3 align-items-center me-3 shadow-none">

                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="bi bi-camera-video-fill fs-5" v-if="schedule_type.type == 'video'"></i>
                                        <i class="bi bi-mic-fill fs-5" v-if="schedule_type.type == 'audio'"></i>
                                        <i class="bi bi-chat-dots-fill fs-5" v-if="schedule_type.type == 'chat'"></i>

                                    </div>
                                    <div class="d-flex ms-2">
                                        <span class="fs-5 fw-bold">{{ schedule_type.appointment_type.display_name }}</span>
                                        <span class="fs-5">
                                            &nbsp;- (
                                            {{ getDisplayAmount(schedule_type.fee) }} -->
      <!-- <span v-if="schedule_type.appointment_type.is_schedule_required"> - {{ schedule_type.slot_duration }} {{ __("minutes") }}</span> -->
      <!-- )
                                        </span>

                                    </div>
                                </button>
                            </div>
                            <button v-if="clinic.clinic_settings
                                .calendly_link
                                "
                                :onclick="`Calendly.initPopupWidget({url: '${clinic.clinic_settings.calendly_link}'});return false;`"
                                class="btn btn-light me-3 shadow-none fw-bold py-3">
                                {{ __("book with calendly") }}
                            </button>
                        </div>

            <div class="d-flex align-items-center flex-wrap">
              <div
                class="d-flex align-items-center flex-column flex-md-row ms-2 ms-md-0"
                v-if="clinic.appointment_types"
              >
                <button
                  type="button"
                  v-for="(schedule_type, index) in clinic.appointment_types"
                  :key="index"
                  @click="
                    checkLoginAndRedirect(
                      clinic,
                      schedule_type.appointment_type
                    )
                  "
                  class="btn btn-light d-flex px-4 py-3 align-items-center me-md-3 mb-2 mb-md-0 shadow-none"
                >
                  <div class="d-flex align-items-center justify-content-center">
                    <i
                      class="bi bi-camera-video-fill fs-5"
                      v-if="schedule_type.type == 'video'"
                    ></i>
                    <i
                      class="bi bi-mic-fill fs-5"
                      v-if="schedule_type.type == 'audio'"
                    ></i>
                    <i
                      class="bi bi-chat-dots-fill fs-5"
                      v-if="schedule_type.type == 'chat'"
                    ></i>
                  </div>
                  <div class="d-flex ms-2">
                    <span class="fs-5 fw-bold">{{
                      schedule_type.appointment_type.display_name
                    }}</span>
                    <span class="fs-5">
                      &nbsp;- (
                      {{ getDisplayAmount(schedule_type.fee) }}
                       <span v-if="schedule_type.appointment_type.is_schedule_required"> - {{ schedule_type.slot_duration }} {{ __("minutes") }}</span>
                      )
                    </span>
                  </div>
                </button>
              </div>
              <button
                v-if="clinic.clinic_settings.calendly_link"
                :onclick="`Calendly.initPopupWidget({url: '${clinic.clinic_settings.calendly_link}'});return false;`"
                class="btn btn-light me-3 shadow-none fw-bold py-3"
              >
                {{ __("book with calendly") }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> -->

      <!-- <div class="py-md-5">
      <div class="container px-0">
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
              :disabled="clinic.clinic_reviews == 0"
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
              :href="route('broadcasts.listing', { clinic: clinic.user_name })"
              v-if="clinic.clinic_broadcasts.length > 0"
              :heading="clinic.name + ' ' + __n('broadcast')"
            >
              <broadcast-card
                v-for="broadcast in clinic.clinic_broadcasts"
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
              :href="route('podcasts.listing', { clinic: clinic.user_name })"
              v-if="clinic.clinic_podcasts.length > 0"
              :heading="clinic.name + ' ' + __n('podcast')"
            >
              <podcast-card
                v-for="podcast in clinic.clinic_podcasts"
                :podcast="podcast"
                :key="podcast.id"
              ></podcast-card>
            </profile-section>
          </div>

          <div
            class="tab-pane show active fade"
            id="profile-blog"
            role="tabpanel"
            aria-labelledby="profile-blog-tab"
            tabindex="0"
          >
            <profile-section
              :href="route('blogs.listing', { clinic: clinic.user_name })"
              v-if="clinic.clinic_posts.length > 0"
              :heading="clinic.name + ' ' + __n('blogs')"
            >
              <post-card
                v-for="post in clinic.clinic_posts"
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
              :href="route('archives.listing', { clinic: clinic.user_name })"
              v-if="clinic.clinic_archives.length > 0"
              :heading="clinic.name + ' ' + __n('archive')"
            >
              <archive-card
                v-for="archive in clinic.clinic_archives"
                :archive="archive"
                :key="archive.id"
              >
              </archive-card>
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
              :href="route('events.listing', { clinic: clinic.user_name })"
              v-if="clinic.clinic_events.length > 0"
              :heading="clinic.name + ' ' + __n('event')"
            >
              <event-card
                :add_col="true"
                v-for="event in clinic.clinic_events"
                :event="event"
                :key="event.id"
              ></event-card>
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
              :outer_href="clinic.clinic_settings.youtube_channel_link"
              v-if="clinic.clinic_settings.youtube_playlist_link"
              :heading="clinic.name + ' ' + __n('youtube')"
            >
              <div class="row">
                <div class="col-12">
                  <iframe
                    width="560"
                    height="315"
                    class="me-3"
                    :src="clinic.clinic_settings.youtube_playlist_link"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                  ></iframe>
                  <iframe
                    width="560"
                    height="315"
                    :src="clinic.clinic_settings.youtube_playlist_link"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                  ></iframe>
                </div>
              </div>
            </profile-section>
          </div>

          <div
            class="tab-pane fade"
            id="profile-review"
            role="tabpanel"
            aria-labelledby="profile-review-tab"
            tabindex="0"
          >
            <clinic-profile-reviews-section
              :clinic_id="clinic.id"
              :clinic="clinic"
              :reviews="clinic.clinic_reviews"
            ></clinic-profile-reviews-section>
          </div>
           <div class="tab-pane fade" id="profile-disabled" role="tabpanel" aria-labelledby="profile-disabled-tab"
                        tabindex="0">...</div> -->
      <!-- </div>
      </div>
    </div> -->

      <!-- <Link
              :href="
                route('clinic.profile', {
                  user_name: clinic.user_name,
                })
              "
            >
              <div
                class="profile-image mx-4 shadow rounded-2 position-relative"
                style="background-color: rgb(228, 228, 228);max-height: 300px"
              >
                <img
                  v-if="clinic.image"
                  class="img-fluid img-fluid w-100 rounded"
                  :src="clinic.image"
                  alt="law"
                  style="object-fit: contain;"
                />
                <img
                  v-if="!clinic.image"
                  class="img-fluid"
                  src="@/images/account/default_avatar_men.png"
                  alt="law"
                  style="object-fit: contain;"
                />

              </div>
            </Link> -->
      <!-- <div class="d-flex align-items-center justify-content-md-center me-4 mt-3"
                >
                  <span class="mt-1 me-2 text-muted"
                    > ({{ clinic.rating }}/5)</span
                  >
                  <span class="text-white" style="color: #f5d812">
                    <star-rating
                      :rating="clinic.rating"
                      :star-size="18"
                      :read-only="true"
                      :increment="0.01"
                      :show-rating="false"
                    ></star-rating>
                  </span>
                </div>
                <span class="d-flex justify-content-center text-muted" style="font-size: 14px;">
                            <i class="bi bi-circle-fill"></i> <span class="ms-1">Offline</span>
                           </span>
                           <div class="col-md-12 text-center">
              <h6 class="fw-bold my-3">{{ __("Share My Profile") }}</h6>
                <ul class="social-share justify-content-center">
                    <li>
                        <a :href="'mailto:?subject=See My Profile&amp;body=Check out this Profile '+hostName()+'/clinic/profile/'+clinic.user_name" title="Share by Email"> <i class="bi bi-envelope"></i></a>
                    </li>
                    <li>
                        <a target="_blank" :href="'https://www.facebook.com/sharer.php?u='+hostName()+'/clinic/profile/'+clinic.user_name"><i  class="bi bi-facebook"></i></a>
                    </li>
                    <li>

                        <a target="_blank" :href="'https://api.whatsapp.com/send?text='+hostName()+'/clinic/profile/'+clinic.user_name"><i class="bi bi-whatsapp"></i></a>
                    </li>
                    <li>
                        <input type="text" class="border-0" style="visibility:hidden; width:0;" id="copyProfile" :value="hostName()+'/profile/'+clinic.user_name">
                        <button type="button"  @click="copyProfile()" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover" class="position-absolute"><i class="bi bi-check2-all"></i></button>
                    </li>
                    <li>
                    <input type="url" id="website" class="border-0" style="visibility:hidden; width:0;" :value="hostName()+'/clinic/profile/'+clinic.user_name" name="website" :placeholder="hostName()" required />
                            <button type="button" @click="generateQRCode()">
                            <i class="bi bi-qr-code-scan"></i>
                    </button>
                    </li>
                </ul>

                <div id="qrcode-container" class="p-4 d-flex justify-content-center">
                    <div id="qrcode" class="qrcode"></div>
                </div>
            </div>

          </div>
          <div class="col-lg-9 col-md-12">
            <div class="d-md-flex align-items-center justify-content-between mb-3">
              <div class="d-flex mb-md-0 mb-3 flex-column align-items-start">
                <h2 class="mb-0 fs-5 text-capitalize">
                  <i
                    v-if="clinic.is_featured"
                    class="bi text-primary bi-patch-check-fill me-2 fs-5"
                  ></i>
                  <Link
                    :href="
                      route('clinic.profile', {
                        user_name: clinic.user_name,
                      })
                    "
                    class="text-decoration-none text-dark fs-6"
                    >{{ clinic.name }}</Link
                  >
                </h2>
              </div>
              <div class="d-flex align-items-center">
                <button
                  v-if="clinic.clinic_settings.calendly_link"
                  :onclick="`Calendly.initPopupWidget({url: '${clinic.clinic_settings.calendly_link}'});return false;`"
                  class="btn btn-primary"
                >
                  {{ __("book with calendly") }}
                </button>

                <div v-if="clinic.appointment_types">
                  <button
                    type="button"
                    v-for="(schedule_type, index) in clinic.appointment_types"
                    :key="index"
                    @click="
                      checkLoginAndRedirect(
                        clinic,
                        schedule_type.appointment_type
                      )
                    "
                    class="ms-2 btn btn-primary"
                  >
                    {{ schedule_type.appointment_type.display_name }}
                  </button>
                </div>
              </div>
            </div>

            <div
              class="my-2 d-flex align-items-csnter"
              v-if="clinic.clinic_categories.length > 0"
            >
              <span class="fw-bold">Specialist:</span>
              <ul class="list-unstyled d-md-flex align-items-center ms-3 mb-0">
                <li
                  v-for="(category, index) in clinic.clinic_categories"
                  :key="index"
                  class="me-3 pe-3 border-end"
                  style="font-size: 12px"
                >
                  {{ category.name }}
                </li>
              </ul>
            </div>
            <div style="font-size: 14px" class="text-start">
              <p>{{ clinic.description }}</p>
            </div>

            <div class="row mt-3"> -->
      <!-- <div class="col-md-4 text-start">

              </div> -->
      <!--
              <div class="col-md-5 text-start" v-if="checkObjectValuesIsNotNull(clinic.clinic_settings)">
                <div class="d-flex flex-column align-items-start">
                  <h6 class="fs-6 fw-bold text-capitalize">
                    {{ __("socials") }}
                  </h6>
                  <ul
                    class="d-flex flex-wrap justify-content-end ps-0 mb-0 list-group list-group-horizontal"
                  >
                    <li
                      class="list-group-item p-1 py-0 bg-transparent border-0"
                      v-if="clinic.clinic_settings.facebook_url"
                    >
                      <a
                        target="_blank"
                        class="text-dark"
                        :href="clinic.clinic_settings.facebook_url"
                        ><i class="bi bi-facebook"></i
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
                        ><i class="bi bi-youtube"></i
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
                        ><i class="bi bi-twitter"></i
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
                        ><i class="bi bi-linkedin"></i
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
                        ><i class="bi bi-whatsapp"></i
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
                        ><i class="bi bi-instagram"></i
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
                        ><i class="bi bi-tiktok"></i
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
                        ><i class="bi bi-snapchat"></i
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
                        ><i class="bi bi-pinterest"></i
                      ></a>
                    </li>
                  </ul>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div> -->

      <!-- <div class="stats my-5 py-3">
        <div class="container">
          <div class="row mx-0 align-items-center">
            <div class="col-md-4 text-center text-md-start">
              <span class="fs-3"
                >Why Choose <br />
                {{ clinic.name }}</span
              >
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                  <div
                    class="d-flex align-items-center justify-content-center item aos-init aos-animate"
                  >
                    <i class="bi bi bi-person-fill"></i>
                    <div class="d-flex flex-column ms-3">
                      <h3 class="mb-0">
                        {{ clinic.clinic_doctors.length }}
                        <span v-if="clinic.clinic_doctors.length > 0"
                          >+</span
                        >
                      </h3>
                      <span class="">{{ __("Doctors") }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                  <div
                    class="d-flex align-items-center justify-content-center item aos-init aos-animate"
                  >
                    <i class="bi bi bi-people-fill"></i>
                    <div class="d-flex flex-column ms-3">
                      <h3 class="mb-0">
                        {{ clinic.booked_appointments }}
                        <span v-if="clinic.booked_appointments > 0">+</span>
                      </h3>
                      <span class="">{{ __("Users") }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div
                    class="d-flex align-items-center justify-content-center item aos-init aos-animate"
                  >
                    <i class="bi bi bi-calendar-x"></i>
                    <div class="d-flex flex-column ms-3">
                      <h3 class="mb-0">
                        {{ clinic.clinic_events.length }}
                        <span v-if="clinic.clinic_events.length > 0"
                          >+</span
                        >
                      </h3>
                      <span class="">{{ __("events") }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->

      <!-- v-if="clinic.clinic_doctors.length > 0" -->
      <div class="container pt-6">
        <div class="row pt-3 clinic-doctor">
          <div class="col-12 mb-4">
            <div class="d-flex flex-column justify-content-center">
              <div
                class="d-flex justify-content-center text-center align-items-center flex-column mb-2 mb-md-0 mx-4"
              >
                <h2 class="display-6 text-black">
                  {{ clinic.name }} {{ __("associate doctors") }}
                </h2>
                <p class="subheading-fs">
                  {{
                    __(
                      "Discover a wide range of online doctors, specialized in various fields, offering diverse treatments and services. Explore doctor reviews and effortlessly schedule appointments online"
                    )
                  }}
                </p>
              </div>
              <!-- <Link
              :href="route('doctors.listing')"
              class="btn btn-outline-primary fw-bold"
              >{{ __("view all") }}</Link
            > -->
            </div>
          </div>

          <div class="col-md-12 px-md-0">
            <div class="row">
              <FeaturedClinicDoctorSection
                class="pt-2"
                findDoctors="true"
                :clinic_doctors="clinic.clinic_doctors"
              ></FeaturedClinicDoctorSection>
            </div>
          </div>
        </div>

        <div class="container pt-6">
          <div class="row pt-3 clinic-doctor">
            <div class="col-12 mb-4">
              <div class="d-flex flex-column justify-content-center">
                <div
                  class="d-flex justify-content-center text-center align-items-center flex-column mb-2 mb-md-0 mx-4"
                >
                  <h2 class="display-6 text-black">
                    {{ clinic.name }} {{ __("Review") }}
                  </h2>
                  <p class="subheading-fs">
                    {{
                      __(
                        "Discover a wide range of online doctors, specialized in various fields, offering diverse treatments and services. Explore doctor reviews and effortlessly schedule appointments online"
                      )
                    }}
                  </p>
                </div>
                <!-- <Link
              :href="route('doctors.listing')"
              class="btn btn-outline-primary fw-bold"
              >{{ __("view all") }}</Link
            > -->
              </div>
            </div>

            <div class="col-md-12 px-md-0">
              <div class="row">
                <clinic-profile-reviews-section
                  :clinic_id="clinic.id"
                  :clinic="clinic"
                  :reviews="clinic.clinic_reviews"
                >
                </clinic-profile-reviews-section>
                <!-- <div
                  v-for="(review, index) in clinic.clinic_reviews"
                  class="col-md-4 review-card mb-3"
                  :key="index"
                >
                  <div class="card h-100 p-3">
                    <div class="card-body">
                      <div class="d-flex align-items-center gap-3">
                        <img
                          src="@/images/home/Maskgroup.png"
                          class="rounded-circle"
                          style="width: 76px; height: 76px"
                          alt=""
                        />
                        <div class="d-flex flex-column">
                          <h2 class="fs-2">{{ review.clinic_name }}</h2>
                          <h6 class="fs-5">
                            {{ review.main_categories.name }}
                          </h6>
                        </div>
                      </div>
                      <p class="paragraph">
                        {{ review.comment }}
                      </p>
                      <star-rating
                        :rating="review.rating"
                        :star-size="20"
                        :read-only="true"
                        :increment="0.01"
                        :show-rating="false"
                      ></star-rating>
                    </div>
                  </div>
                </div> -->
              </div>
              <div class="d-flex justify-content-center my-4">
                <Link
                  class="btn btn-primary rounded-4 fw-bold shadow-find px-5"
                  :href="
                    route('clinic.reviews', { user_name: clinic.user_name })
                  "
                  >{{ __("view all") }}</Link
                >
              </div>
            </div>

            <div
              class="col-md-12 pt-6"
              v-if="clinic.clinic_broadcasts.length > 0"
            >
              <h2 class="display-6 text-black text-center mb-5">
                {{ clinic.name }} {{ __("broadcast") }}
              </h2>
              <div class="row">
                <broadcast-card
                  v-for="broadcast in clinic.clinic_broadcasts"
                  :broadcast="broadcast"
                  :key="broadcast.id"
                ></broadcast-card>
              </div>
              <div class="d-flex justify-content-center my-4">
                <Link
                  class="btn btn-primary rounded-4 fw-bold shadow-find px-5"
                  :href="
                    route('broadcasts.listing', { user_name: clinic.user_name })
                  "
                  >{{ __("view all") }}</Link
                >
              </div>
            </div>
            <div class="col-md-12 pt-6" v-if="clinic.clinic_events.length > 0">
              <h2 class="display-6 text-black text-center mb-5">
                {{ clinic.name }} {{ __("events") }}
              </h2>
              <div class="row">
                <event-card
                  :add_col="true"
                  v-for="event in clinic.clinic_events.slice(0, 2)"
                  :event="event"
                  :key="event.id"
                ></event-card>
              </div>
              <div class="d-flex justify-content-center my-4">
                <Link
                  class="btn btn-primary rounded-4 fw-bold shadow-find px-5"
                  :href="
                    route('events.listing', { user_name: clinic.user_name })
                  "
                  >{{ __("view all") }}</Link
                >
              </div>
            </div>
            <div
              class="col-md-12 pt-6"
              v-if="clinic.clinic_podcasts.length > 0"
            >
              <h2 class="display-6 text-black text-center mb-5">
                {{ clinic.name }} {{ __("podcast") }}
              </h2>
              <div class="row">
                <podcast-card
                  v-for="podcast in clinic.clinic_podcasts.slice(0, 3)"
                  :podcast="podcast"
                  :key="podcast.id"
                ></podcast-card>
              </div>
              <div class="d-flex justify-content-center my-4">
                <Link
                  class="btn btn-primary rounded-4 fw-bold shadow-find px-5"
                  :href="
                    route('podcasts.listing', { user_name: clinic.user_name })
                  "
                  >{{ __("view all") }}</Link
                >
              </div>
            </div>
            <div
              class="col-md-12 pt-6"
              v-if="clinic.clinic_archives.length > 0"
            >
              <h2 class="display-6 text-black text-center mb-5">
                {{ clinic.name }} {{ __("archives") }}
              </h2>
              <div class="row">
                <archive-card
                  v-for="archive in clinic.clinic_archives.slice(0, 3)"
                  :archive="archive"
                  :key="archive.id"
                >
                </archive-card>
              </div>
              <div class="d-flex justify-content-center my-4">
                <Link
                  class="btn btn-primary rounded-4 fw-bold shadow-find px-5"
                  :href="
                    route('archives.listing', { user_name: clinic.user_name })
                  "
                  >{{ __("view all") }}</Link
                >
              </div>
            </div>
            <div
              class="col-md-12 pt-6 pb-5"
              v-if="clinic.clinic_posts.length > 0"
            >
              <h2 class="display-6 text-black text-center mb-5">
                {{ clinic.name }} {{ __("blogs") }}
              </h2>
              <div class="row">
                <post-card
                  v-for="post in clinic.clinic_posts.slice(0, 3)"
                  :post="post"
                  :key="post.id"
                ></post-card>
              </div>
              <div class="d-flex justify-content-center my-4">
                <Link
                  class="btn btn-primary rounded-4 fw-bold shadow-find px-5"
                  :href="
                    route('blogs.listing', { user_name: clinic.user_name })
                  "
                  >{{ __("view all") }}</Link
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import ClinicAccount from "@/Components/Clinics/ClinicAccount.vue";
import BroadcastCard from "@/Components/Broadcasts/BroadcastCard.vue";
import PodcastCard from "@/Components/Podcasts/PodcastCard.vue";
import PostCard from "@/Components/Posts/PostCard.vue";
import ClinicProductCard from "@/Components/Clinics/ClinicProductCard.vue";
import ArchiveCard from "@/Components/Archives/ArchiveCard.vue";
import EventCard from "@/Components/Events/EventCard.vue";
import ProfileSection from "@/Components/Shared/ProfileSection.vue";
import ClinicProfileReviewsSection from "@/Components/Clinics/ClinicProfileReviewsSection.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import FeaturedClinicDoctorSection from "@/Components/Clinics/FeaturedClinicDoctorSection.vue";

import PagesHeading from "../../Components/PagesHeading.vue";
export default defineComponent({
  components: {
    Head,
    Link,
    AppLayout,
    Navbar,
    PageHeader,
    ClinicAccount,
    BroadcastCard,
    PodcastCard,
    ProfileSection,
    PostCard,
    ClinicProductCard,
    ArchiveCard,
    EventCard,
    ClinicProfileReviewsSection,
    FeaturedClinicDoctorSection,
    PagesHeading,
  },
  data() {
    return {
      clinic: this.$page.props.clinic,
      breadcrums: [
        {
          id: 1,
          name: this.__("Home"),
          link: "/",
        },
        {
          id: 2,
          name: this.__("clinic"),
          link: "/clinics",
        },
        {
          id: 3,
          name: `${window.location.pathname.split("/")[3]}`,
          link: "#",
        },
      ],
    };
  },
  mounted() {},
  props: ["appointment_types"],
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
          width: 128,
          height: 128,
          colorDark: "rgb(38, 41, 41)",
          colorLight: "#ffffff",
          correctLevel: QRCode.CorrectLevel.H,
        });
        /*With some styles*/
        // let qrcodeContainer2 = document.getElementById("qrcode-2");
        // qrcodeContainer2.innerHTML = "";
        // new QRCode(qrcodeContainer2, {
        //   text: website,
        //   width: 128,
        //   height: 128,
        //   colorDark: "#5868bf",
        //   colorLight: "#ffffff",
        //   correctLevel: QRCode.CorrectLevel.H
        // });
        document.getElementById("qrcode-container").style.display = "block";
      } else {
        qrcodeContainer.innerHTML = "";
        // alert("Please enter a valid URL");
      }
    },
  },
});
</script>

