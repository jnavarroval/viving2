<template>
  <section>
    <div class="bg-primary">
      <pages-heading :account="true" :textwhite="'true'" :heading="'Profile'">
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
                          v-if="$page.props.auth.user.clinic.image"
                          class="rounded-circle img-fluid"
                          :src="image ? image : $page.props.auth.user.clinic.image"
                          width="160"
                        />
                        <img
                          v-else
                          style="background-color: #150b19ad"
                          class="rounded-circle img-fluid"
                          src="@/images/icons/hospital.png"
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
                              <!-- <ImageCropperModal
                                :show="showImportModal"
                                id="archiveImageCropModal"
                                :image_url="image_url"
                                @cropImage="cropImage"
                              ></ImageCropperModal> -->
                            </div>
                          </div>
                        </Modal>
                      </div>
                      <div class="d-flex flex-column ms-md-2">
                        <a
                          :href="route('clinic.my_profile')"
                          class="nav-link"
                          target="_blank"
                        >
                          <h2 class="text-primary fw-bold mt-2 mb-1 fs-2">
                            {{ $page.props.clinic.first_name }}
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
                            <!-- {{ __($page.props.auth.clinic.email) }} -->
                          </h6>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                          <div class="detail_icons">
                            <img src="@/images/icons/doctorcall.svg" alt="" />
                          </div>
                          <h6 class="fs-4 text-paragraphcolor fw-normal mb-0">
                            <!-- {{ __($page.props.auth.clinic.cell_phone) }} -->
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
                            $page.props.clinic &&
                            $page.props.clinic.is_active
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
                              hasRole('clinic') &&
                              $page.props.auth.logged_in_as == 'clinic'
                            "
                            :href="route('pricing', { type: 'clinic' })"
                          >
                            <i
                              class="bi bi-pencil-square mb-1 text-primary ms-2 fs-3"
                            ></i>
                          </Link>
                        </div>
                        <span
                          style="background-color: #ffa928"
                          class="badge rounded-pill px-3 py-2 fs-3 text-capitalize"
                          >{{ $page.props.clinic.pricing_plan_name ?? "N/A" }}
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
                              <!-- <textarea
                                style="
                                  border-radius: 20px;
                                  min-height: 150px;
                                  scrollbar-width: none;
                                "
                                class="form-control border p-4"
                                id="exampleFormControlTextarea1"
                                rows="3"
                                v-model="description"
                              ></textarea> -->
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
                        {{ $page.props.clinic.description }}
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
                  v-if="hasModule('clinic-social-info', 'clinic')"
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
                  v-if="hasModule('clinic-certifications', 'clinic')"
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
                <li
                  class="nav-item"
                  role="presentation"
                  v-if="hasModule('clinic-broadcasts', 'clinic')"
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
                  v-if="hasModule('clinic-podcasts', 'clinic')"
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
                            v-if="!isSubscriptionEnabled() || hasModule('clinic-services', 'clinic')">
                            <button class="nav-link w-100 text-dark" :class="{ active: active_tab == 'services' }"
                                @click="changeTab('services')" id="services-tab" data-bs-toggle="tab"
                                data-bs-target="#services" type="button" role="tab" aria-controls="services"
                                aria-selected="false">{{ __n('service') }}</button>
                        </li> -->

                <li
                  class="nav-item"
                  role="presentation"
                  v-if="hasModule('clinic-events', 'clinic')"
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
                  v-if="hasModule('clinic-archives', 'clinic')"
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
                  v-if="hasModule('clinic-appointment', 'clinic')"
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
                  v-if="hasModule('clinic-blogs', 'clinic')"
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
                  v-if="hasModule('clinic-calendly', 'clinic')"
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
              <clinic-general-info
                v-if="active_tab == 'general-info'"
                :image="image"
                :description="form.description"
                :key="key"
                :active="active_tab == 'general-info'"
              ></clinic-general-info>
              <clinic-social-info
                v-if="
                  hasModule('clinic-social-info', 'clinic') && active_tab == 'social-info'
                "
                :active="active_tab == 'social-info'"
              ></clinic-social-info>
              <clinic-certifications
                v-if="
                  hasModule('clinic-certifications', 'clinic') &&
                  active_tab == 'certifications'
                "
                :active="active_tab == 'certifications'"
              ></clinic-certifications>
              <clinic-broadcasts
                v-if="
                  hasModule('clinic-broadcasts', 'clinic') && active_tab == 'broadcasts'
                "
                :active="active_tab == 'broadcasts'"
              ></clinic-broadcasts>
              <clinic-podcasts
                v-if="hasModule('clinic-podcasts', 'clinic') && active_tab == 'podcasts'"
                :active="active_tab == 'podcasts'"
              ></clinic-podcasts>
              <!-- <clinic-services
                            v-if="!isSubscriptionEnabled() || hasModule('clinic-services', 'clinic') && active_tab == 'services'"
                            :active="active_tab == 'services'"></-services> -->
              <clinic-services :active="active_tab == 'services'"></clinic-services>
              <clinic-events
                v-if="hasModule('clinic-events', 'clinic') && active_tab == 'events'"
                :active="active_tab == 'events'"
              ></clinic-events>
              <clinic-products
                v-if="hasModule('clinic-products', 'clinic') && active_tab == 'products'"
                :active="active_tab == 'products'"
              ></clinic-products>
              <clinic-youtube
                v-if="active_tab == 'youtube'"
                :active="active_tab == 'youtube'"
              ></clinic-youtube>
              <clinic-instagram
                v-if="active_tab == 'instagram'"
                :active="active_tab == 'instagram'"
              ></clinic-instagram>
              <clinic-calendly
                v-if="hasModule('clinic-calendly', 'clinic') && active_tab == 'calendly'"
                :active="active_tab == 'calendly'"
              ></clinic-calendly>
              <clinic-appointment
                v-if="
                  hasModule('clinic-appointment', 'clinic') && active_tab == 'appointment'
                "
                :active="active_tab == 'appointment'"
              ></clinic-appointment>
              <clinic-posts
                v-if="hasModule('clinic-blogs', 'clinic') && active_tab == 'blogs'"
                :active="active_tab == 'blogs'"
              ></clinic-posts>
              <clinic-archives
                v-if="hasModule('clinic-archives', 'clinic') && active_tab == 'archives'"
                :active="active_tab == 'archives'"
              ></clinic-archives>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- <div class="py-5">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <div class="bg-white shadow">
            <div class="d-flex position-relative">
              <img
                v-if="$page.props.clinic.cover_image"
                class="img-fluid"
                :src="$page.props.clinic.cover_image"
                alt="image"
                style="width: 100%; height: 290px"
              />
              <img
                v-else
                class="img-fluid"
                src="@/images/common/bg_profile.jpg"
                alt="image"
                style="width: 100%; height: 290px"
              />

              <div class="position-absolute end-0">
                <button
                  style="height: 40px; width: 40px"
                  class="btn p-0 btn-primary rounded-pill m-3"
                >
                  <i class="bi bi-pencil"></i>
                </button>
              </div>
            </div>

            <ul
              class="nav navs nav-pills position-relative fs-5 fw-semibold d-flex justify-content-between mt-3 mx-3"
              id="v-pills-tab"
              role="tablist"
              aria-orientation="vertical"
            >
              <li class="nav-item tabs" role="presentation">
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
                  {{ __("general info") }}
                </button>
              </li>
              <li
                class="nav-item tabs"
                role="presentation"
                v-if="hasModule('clinic-social-info', 'clinic')"
              >
                <button
                  class="nav-link"
                  :class="{ active: active_tab == 'social-info' }"
                  @click="changeTab('social-info')"
                  id="social-info-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#socialInfo"
                  type="button"
                  role="tab"
                  aria-controls="social-info"
                  aria-selected="false"
                >
                  {{ __("social info") }}
                </button>
              </li>
              v-if="hasModule('test')"
              <li
                class="nav-item tabs"
                role="presentation"
                v-if="hasModule('clinic-certifications', 'clinic')"
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
                  {{ __("certifications") }}
                </button>
              </li>

              <li
                class="nav-item tabs"
                role="presentation"
                v-if="hasModule('clinic-broadcasts', 'clinic')"
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
                  {{ __n("broadcast") }}
                </button>
              </li>

              <li
                class="nav-item tabs"
                role="presentation"
                v-if="hasModule('clinic-podcasts', 'clinic')"
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
                  {{ __n("podcast") }}
                </button>
              </li>
              <li class="d-flex flex-column align-items-center profile-img">
                <img
                  class="rounded-3 img-fluid"
                  :src="$page.props.clinic.image"
                  width="160"
                />
                <a
                  :href="route('clinic.my_profile')"
                  class="nav-link text-center"
                  target="_blank"
                >
                  <h2 class="text-primary fw-bold mt-2 mb-1 fs-2">
                    {{ $page.props.clinic.first_name }}
                  </h2>
                  <h6 class="fs-6 text-black fw-semibold mb-0">
                    {{ __($page.props.auth.logged_in_as) }}
                  </h6>
                </a>

                <div class="position-absolute start-0">
                  <button
                    style="height: 30px; width: 30px"
                    class="btn p-0 btn-primary rounded-pill mt-2 mx-5"
                  >
                    <i class="bi bi-pencil"></i>
                  </button>
                </div>
              </li>
              <li class="nav-item tabs" role="presentation" v-if="!isSubscriptionEnabled() || hasModule('clinic-services', 'clinic')"  >

                <button class="nav-link" :class="{ active: active_tab == 'services' }"
                    @click="changeTab('services')" id="services-tab" data-bs-toggle="tab"
                    data-bs-target="#services" type="button" role="tab" aria-controls="services"
                    aria-selected="false">{{ __n('Services') }}</button>
            </li>
              <li
                class="nav-item tabs"
                role="presentation"
                v-if="hasModule('clinic-events', 'clinic')"
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
                  {{ __n("event") }}
                </button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link" :class="{ active: active_tab == 'youtube' }" @click="changeTab('youtube')"
                  id="youtube-tab" data-bs-toggle="tab" data-bs-target="#youtube" type="button" role="tab"
                  aria-controls="youtube" aria-selected="false">{{ __('youtube') }}</button>
              </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" :class="{ active: active_tab == 'instagram' }"
                @click="changeTab('instagram')" id="instagram-tab" data-bs-toggle="tab" data-bs-target="#instagram"
                type="button" role="tab" aria-controls="instagram" aria-selected="false">{{ __('instagram') }}</button>
            </li>

              <li
                class="nav-item tabs"
                role="presentation"
                v-if="hasModule('clinic-appointment', 'clinic')"
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
                  {{ __("appointment") }}
                </button>
              </li>
              <li
                class="nav-item tabs"
                role="presentation"
                v-if="hasModule('clinic-blogs', 'clinic')"
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
                  {{ __n("blog") }}
                </button>
              </li>
              <li
                class="nav-item tabs"
                role="presentation"
                v-if="hasModule('clinic-archives', 'clinic')"
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
                  {{ __n("archive") }}
                </button>
              </li>
              <li class="nav-item tabs">
                <button
                  class="nav-link"
                  :class="{ active: active_tab == 'youtube' }"
                  @click="changeTab('youtube')"
                  id="youtube-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#youtube"
                  type="button"
                  role="tab"
                  aria-controls="youtube"
                  aria-selected="false"
                >
                  {{ __("youtube") }}
                </button>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <v-if="hasModule('test')"
          Tab panes
          <div class="tab-content" id="v-pills-tabContent">
            <clinic-general-info
              :active="active_tab == 'general-info'"
            ></clinic-general-info>
            <clinic-social-info
              v-if="
                hasModule('clinic-social-info', 'clinic') &&
                active_tab == 'social-info'
              "
              :active="active_tab == 'social-info'"
            ></clinic-social-info>
            <clinic-certifications
              v-if="
                hasModule('clinic-certifications', 'clinic') &&
                active_tab == 'certifications'
              "
              :active="active_tab == 'certifications'"
            ></clinic-certifications>



              <clinic-services
             :active="active_tab == 'services'"></clinic-services>
            <clinic-doctors
              :active="active_tab == 'doctors'"
            ></clinic-doctors>

            <clinic-broadcasts
              v-if="
                hasModule('clinic-broadcasts', 'clinic') &&
                active_tab == 'broadcasts'
              "
              :active="active_tab == 'broadcasts'"
            ></clinic-broadcasts>
            <clinic-podcasts
              v-if="
                hasModule('clinic-podcasts', 'clinic') &&
                active_tab == 'podcasts'
              "
              :active="active_tab == 'podcasts'"
            ></clinic-podcasts>
            <clinic-events
              v-if="
                hasModule('clinic-events', 'clinic') && active_tab == 'events'
              "
              :active="active_tab == 'events'"
            ></clinic-events>
            <clinic-products
              v-if="
                hasModule('clinic-events', 'clinic') &&
                active_tab == 'products'
              "
              :active="active_tab == 'products'"
            ></clinic-products>
            <clinic-youtube
              :active="active_tab == 'youtube'"
            ></clinic-youtube>
            <clinic-instagram
              :active="active_tab == 'instagram'"
            ></clinic-instagram>
            <clinic-calendly
              v-if="
                hasModule('clinic-calendly', 'clinic') &&
                active_tab == 'calendly'
              "
              :active="active_tab == 'calendly'"
            ></clinic-calendly>
            <clinic-appointment
              v-if="
                hasModule('clinic-appointment', 'clinic') &&
                active_tab == 'appointment'
              "
              :active="active_tab == 'appointment'"
            ></clinic-appointment>
            <clinic-posts
              v-if="
                hasModule('clinic-blogs', 'clinic') && active_tab == 'blogs'
              "
              :active="active_tab == 'blogs'"
            ></clinic-posts>
            <clinic-archives
              v-if="
                hasModule('clinic-archives', 'clinic') &&
                active_tab == 'archives'
              "
              :active="active_tab == 'archives'"
            ></clinic-archives>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid py-5 border-bottom border-dark">
    <div class="row">
      <div class="col-12">
        <h2 class="fs-2 text-center">
          <span class="fw-normal"
            >Hello {{ $page.props.auth.user.name }} |</span
          >
          <span class="fw-bold"> Set Profile</span>
        </h2>
  <p class="text-center mb-0">Discover The Best Doctors Near You</p>
  </div>
      <breadcrums :breadcrums="breadcrums"></breadcrums>
    </div>
  </div>
  <div class="section p-0 profile">
    <div class="container">
      <div class="row g-0">
        <div class="col-md-3 p-4">
          <div
            class="nav flex-column nav-pills account-tabs"
            id="v-pills-tab"
            role="tablist"
            aria-orientation="horizontal"
          >
            <li class="nav-item mb-3" role="presentation" >
              <button
                class="nav-link w-100 text-dark"
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
                {{ __("general info") }}
              </button>
            </li>
   v-if="hasModule('test')" -->
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
import ClinicGeneralInfo from "@/Components/Clinics/ClinicGeneralInfo.vue";
import ClinicSocialInfo from "@/Components/Clinics/ClinicSocialInfo.vue";
import ClinicBroadcasts from "@/Components/Clinics/Broadcasts/ClinicBroadcasts.vue";
import ClinicPodcasts from "@/Components/Clinics/Podcasts/ClinicPodcasts.vue";
import ClinicEvents from "@/Components/Clinics/Events/ClinicEvents.vue";
import ClinicPosts from "@/Components/Clinics/Posts/ClinicPosts.vue";
import ClinicProducts from "@/Components/Clinics/ClinicProducts.vue";
import ClinicYoutube from "@/Components/Clinics/ClinicYoutube.vue";
import ClinicInstagram from "@/Components/Clinics/ClinicInstagram.vue";
import ClinicCalendly from "@/Components/Clinics/ClinicCalendly.vue";
import ClinicAppointment from "@/Components/Clinics/Appointments/ClinicAppointment.vue";
import ClinicCertifications from "@/Components/Clinics/Certifications/ClinicCertifications.vue";
import ClinicDoctors from "@/Components/Clinics/Doctors/ClinicDoctors.vue";
import Breadcrums from "../../Components/Shared/Breadcrums.vue";
import PagesHeading from "../PagesHeading.vue";
import ClinicServices from "@/Components/Clinics/Services/ClinicServices.vue";
import ClinicArchives from "@/Components/Clinics/Archives/ClinicArchives.vue";
import ImageCropperModal from "../Shared/ImageCropperModal.vue";
import Modal from "../Modal.vue";

export default defineComponent({
  components: {
    Head,
    AuthenticationCard,
    AuthenticationCardLogo,
    Button,
    Input,
    Checkbox,
    Label,
    PagesHeading,
    AppLayout,
    ValidationErrors,
    Link,
    Modal,
    ClinicGeneralInfo,
    ClinicSocialInfo,
    ClinicBroadcasts,
    ClinicPodcasts,
    ClinicEvents,
    ClinicProducts,
    ClinicPosts,
    ClinicArchives,
    ClinicYoutube,
    ClinicInstagram,
    ClinicCalendly,
    ClinicAppointment,
    ClinicCertifications,
    ClinicDoctors,
    Breadcrums,
    ClinicServices,
    ImageCropperModal,
  },

  data() {
    return {
      active_tab: route().params.active_tab ?? "general-info",
      breadcrums: [
        {
          id: 1,
          name: "Home",
          link: "/",
        },
        {
          id: 2,
          name: "Account",
          link: "",
        },
      ],
      activeTab: 0,
      image_url: null,
      image: null,
      showImportModal: false,
      croppedImageSrc: null,
      description: null,
      form: this.$inertia.form({
        first_name: this.$page.props.clinic.first_name,
        last_name: this.$page.props.clinic.last_name,
        description:
          this.$page.props.clinic.description_translations.length == 0
            ? {}
            : this.$page.props.clinic.description_translations,
        languages: this.$page.props.clinic.language_ids,

        address_line_1: this.$page.props.clinic.address_line_1,

        address_line_2: this.$page.props.clinic.address_line_2,
        zip_code: this.$page.props.clinic.zip_code,

        user_name: this.$page.props.clinic.user_name,
      }),
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

    saveDescription() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("clinics.update_general_info"), {
          onSuccess: () => {
            this.goToNextTab();
          },
        });
    },

    onFileChange(e) {
      this.image_url = null;
      const file = e.target.files[0];
      this.image_url = URL.createObjectURL(file);
      this.croppedImageSrc = null;
      this.showImportModal = true;
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
