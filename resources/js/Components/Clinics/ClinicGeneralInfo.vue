<template>
  <div
    class="tab-pane"
    :class="{ active: active }"
    id="general-info"
    role="tabpanel"
    aria-labelledby="general-info-tab"
    tabindex="0"
  >
    <form @submit.prevent="submit" class="profileForm">
      <div class="row">
        <!-- <div class="col-12">
            <div class="cover-header rounded-2"></div>
          </div> -->

        <!-- <div
              class="d-flex align-items-center gap-3 p-4 rounded-3"
              style="background: #efefef"
            >
              <div>
                <label for="status" class="me-2"
                  ><b>{{ __("status") }}:</b></label
                >
                <input
                  id="healer-image"
                  style="display: none"
                  @change="onFileChange"
                  type="file"
                />
                <span
                  v-if="
                    $page.props &&
                    $page.props.clinic &&
                    $page.props.clinic.is_active
                  "
                  class="badge bg-active rounded-pill px-3 py-2 fs-5"
                  >{{ __("active") }}</span
                >
                <span
                  v-else
                  class="badge bg-inactive rounded-pill px-3 py-2 fs-5"
                  >{{ __("inactive") }}</span
                >
              </div>

              <div class="d-flex align-items-center">
                <label for="subscription" class="me-2">
                  <b>{{ __("Package") }}:</b></label
                >
                <span
                  style="background-color: #ffa928"
                  class="badge rounded-pill px-3 py-2 fs-5 text-capitalize"
                  >{{ $page.props.clinic.pricing_plan_name ?? "N/A" }}
                  <Link :href="route('pricing', { type: 'clinic' })" class="ms-2"
                    ><i class="bi bi-pencil text-white fw-bold"></i
                  ></Link>
                </span>
                <label for="subscription" class="me-2"
                  ><b>{{ __("package plan") }}:</b></label
                >
                <span class="badge mx-2 bg-primary">{{
                  $page.props.clinic.pricing_plan_name ?? "N/A"
                }}</span>
                <Link :href="route('pricing', { type: 'clinic' })" class=""
                  ><i class="bi bi-pencil-fill"></i
                ></Link>
              </div>
            </div> -->
        <!-- <div class="card mt-4 py-3 card-alt">
              <div class="card-body text-center">
                <label for="clinic-image">
                  <div
                    class="profile-image my-0 p-5 border-primary rounded-3 position-relative"
                    style="border-style: dotted"
                  >
                    <label for="image" class="mb-3 fs-6 fw-bold text-black"
                      >{{ __("Upload your") }} <br />
                      {{ __("Profile image") }}</label
                    >

                    <div
                      class="icon m-3 position-absolute z-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                      style="cursor: pointer; width: 40px; height: 40px"
                    >
                      <i class="bi bi-pencil-fill"></i>
                    </div>
                    <img
                      v-if="form.image"
                      class="img-fluid w-100"
                      :src="form.image"
                      alt="logo"
                    />
                    <img
                      v-if="!form.image && $page.props.clinic.image"
                      class="img-fluid w-100"
                      :src="$page.props.clinic.image"
                      alt="logo"
                    />
                    <img
                      v-if="!form.image && !$page.props.clinic.image"
                      class="img-fluid"
                      src="@/images/account/default_avatar_men.png"
                      alt="logo"
                    />
                    <img
                        v-if="!form.image && !$page.props.doctor.image"
                        class="img-fluid w-100"
                        src="@/images/account/default_avatar_men.png"
                        alt="logo"
                      />
                  </div>
                  <div class="profile-image mx-4 mb-5 shadow rounded-2 position-relative"
                              style="background-color: #e4e4e4; width: 220px">
                              <div class="icon position-absolute z-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                  style="cursor: pointer; width: 40px; height: 40px">
                                  <i class="bi bi-pencil-fill"></i>
                              </div>
                              <img v-if="form.image" class="img-fluid" :src="form.image" alt="logo" />
                              <img v-if="!form.image && $page.props.clinic.image" class="img-fluid"
                                  :src="$page.props.clinic.image" alt="logo" />
                              <img v-if="!form.image && !$page.props.clinic.image" class="img-fluid"
                                  src="@/images/account/default_avatar_men.png" alt="logo" />
                          </div>
                  <button
                    data-bs-toggle="modal"
                    id="clinicImageCropperModalButton"
                    data-bs-target="#clinicImageCropModal"
                    style="display: none"
                  ></button>
                  <ImageCropperModal
                    :show="showImportModal"
                    id="clinicImageCropModal"
                    :image_url="image_url"
                    @cropImage="cropImage"
                    aspectRatio="1/1"
                  >
                  </ImageCropperModal>
                </label>
                <input
                  id="clinic-image"
                  style="display: none"
                  @change="onFileChange"
                  type="file"
                />
                <input
                          id="clinic-image"
                          style="display: none"
                          @change="onFileChange"
                          type="file"
                      />
              </div>
            </div> -->
        <!-- <div class="col-md-12">
                      <label for="clinic-image">
                      <div
                      class="profile-image my-0 p-5 border-primary rounded-3 position-relative"
                      style="border-style: dotted;"
                    >
                      <label for="image" class="mb-3 fs-6 fw-bold text-black">{{ __('Upload your') }} <br> {{ __('Profile image') }}</label>

                      <div
                        class="icon m-3 position-absolute z-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                        style="cursor: pointer; width: 40px; height: 40px"
                      >
                        <i class="bi bi-pencil-fill"></i>

                      </div>
                      <img
                        v-if="form.image"
                        class="img-fluid w-100"
                        :src="form.image"
                        alt="logo"
                      />
                      <img
                        v-if="!form.image && $page.props.clinic.image"
                        class="img-fluid w-100"
                        :src="$page.props.clinic.image"
                        alt="logo"
                      />
                      <img v-if="!form.image && !$page.props.clinic.image" class="img-fluid"
                                  src="@/images/account/default_avatar_men.png" alt="logo" />
                       <img
                        v-if="!form.image && !$page.props.doctor.image"
                        class="img-fluid w-100"
                        src="@/images/account/default_avatar_men.png"
                        alt="logo"
                      /> -->
        <!-- </div> -->
        <!-- <div class="profile-image mx-4 mb-5 shadow rounded-2 position-relative"
                              style="background-color: #e4e4e4; width: 220px">
                              <div class="icon position-absolute z-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                  style="cursor: pointer; width: 40px; height: 40px">
                                  <i class="bi bi-pencil-fill"></i>
                              </div>
                              <img v-if="form.image" class="img-fluid" :src="form.image" alt="logo" />
                              <img v-if="!form.image && $page.props.clinic.image" class="img-fluid"
                                  :src="$page.props.clinic.image" alt="logo" />
                              <img v-if="!form.image && !$page.props.clinic.image" class="img-fluid"
                                  src="@/images/account/default_avatar_men.png" alt="logo" />
                          </div> -->
        <!-- <button data-bs-toggle="modal" id="clinicImageCropperModalButton"
                              data-bs-target="#clinicImageCropModal" style="display: none"></button>
                          <ImageCropperModal :show="showImportModal" id="clinicImageCropModal" :image_url="image_url"
                              @cropImage="cropImage" aspectRatio="1/1">
                          </ImageCropperModal>
                      </label>
                      <input id="clinic-image" style="display: none" @change="onFileChange" type="file" /> -->
        <!-- <input
              id="doctor-cover-image"
              style="display: none"
              @change="onFileChangeCover"
              type="file"
            /> -->
        <!-- </div> -->
        <!-- <div class="card mt-4 py-3 card-alt">
              <div class="card-body text-center">
                <label for="clinic-image-cover">
                  <div
                    class="profile-image my-0 p-5 border-primary rounded-3 position-relative"
                    style="border-style: dotted"
                  >
                    <label for="image" class="mb-3 fs-6 fw-bold text-black"
                      >{{ __("Upload your") }} <br />
                      {{ __("cover image") }}</label
                    >

                    <div
                      class="icon m-3 position-absolute z-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                      style="cursor: pointer; width: 40px; height: 40px"
                    >
                      <i class="bi bi-pencil-fill"></i>
                    </div>
                    <img
                      v-if="form.cover_image"
                      class="img-fluid w-100"
                      :src="form.cover_image"
                      alt="logo"
                    />
                    <img
                      v-if="!form.cover_image && $page.props.clinic.cover_image"
                      class="img-fluid w-100"
                      :src="$page.props.clinic.cover_image"
                      alt="logo"
                    />
                    <img
                        v-if="!form.image && !$page.props.doctor.image"
                        class="img-fluid w-100"
                        src="@/images/account/default_avatar_men.png"
                        alt="logo"
                      />
                  </div>
                  <button
                    data-bs-toggle="modal"
                    id="coverImageCropModalButton"
                    data-bs-target="#coverImageCropModal"
                    style="display: none"
                  ></button>
                  <ImageCropperModal
                    :show="showCoverImportModal"
                    aspectRatio="1/8"
                    id="coverImageCropModal"
                    :image_url="cover_image_url"
                    @cropImage="cropCoverImage"
                  >
                  </ImageCropperModal>
                </label>
                <input
                  id="clinic-image-cover"
                  style="display: none"
                  @change="onFileChangeCover"
                  type="file"
                />
                <input
                          id="clinic-image"
                          style="display: none"
                          @change="onFileChange"
                          type="file"
                      />
              </div>
            </div> -->
        <validation-errors></validation-errors>
        <div class="col-12">
          <div class="card">
            <div class="card-body px-0 info-tabs">
              <ul class="nav nav-pills mt-2 gap-md-4 gap-2" id="pills-tab" role="tablist">
                <li class="nav-item ms-md-4 ms-2" role="presentation">
                  <button
                    class="nav-link active px-2"
                    id="pills-home-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-home"
                    type="button"
                    role="tab"
                    aria-controls="pills-home"
                    aria-selected="true"
                  >
                    {{ __("basic information") }}
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link px-2"
                    id="pills-profile-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-profile"
                    type="button"
                    role="tab"
                    aria-controls="pills-profile"
                    aria-selected="false"
                  >
                    {{ __("additional information") }}
                  </button>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div
                  class="tab-pane fade show active"
                  id="pills-home"
                  role="tabpanel"
                  aria-labelledby="pills-home-tab"
                  tabindex="0"
                >
                  <div class="row form-inputs p-4">
                    <div class="col-md-12">
                      <div class="form-check form-switch">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          v-model="isOnline"
                          role="switch"
                          id="flexSwitchCheckChecked"
                        />

                        <label class="form-check-label" for="flexSwitchCheckChecked">
                          {{ form.is_online ? __("Online") : __("Offline") }}
                        </label>
                      </div>
                      <div class="form-group">
                        <label class="mb-2" for="category"
                          >{{ __("choose") }} {{ __("category") }}</label
                        >
                        <Multiselect
                          class="multiselect shadow-none h-auto p-2"
                          v-model="form.clinic_categories"
                          valueProp="id"
                          label="name"
                          groupLabel="name"
                          groupOptions="categories"
                          :groupSelect="true"
                          :groups="true"
                          mode="tags"
                          :close-on-select="false"
                          :searchable="true"
                          :options="this.clinic_categories"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="speciality">{{ __("speciality") }}</label>
                        <input
                          v-model="form.speciality"
                          class="w-100 form-control px-3"
                          :placeholder="__('please enter')"
                          type="text"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="experience"
                          >{{ __("choose") }} {{ __("experience") }}</label
                        >
                        <Multiselect
                          class="multiselect shadow-none h-auto p-2"
                          v-model="form.experience"
                          :close-on-select="true"
                          :searchable="true"
                          :options="experienceOptions"
                          valueProp="value"
                          label="name"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="user_name"
                          ><span class="text-danger">*</span>{{ __("username") }}</label
                        >
                        <input
                          v-model="form.user_name"
                          class="w-100 form-control auth-input px-3"
                          :placeholder="__('please enter')"
                          type="text"
                          :class="{
                            'is-invalid': form.errors[`user_name`],
                          }"
                        />
                        <span class="text-danger" v-if="form.errors[`user_name`]">
                          {{ form.errors[`user_name`] }}
                        </span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="clinic_name"
                          ><span class="text-danger">*</span>{{ __("name") }}</label
                        >
                        <input
                          v-model="form.clinic_name"
                          class="w-100 form-control auth-input px-3"
                          :placeholder="__('please enter')"
                          type="text"
                          :class="{
                            'is-invalid': form.errors[`clinic_name`],
                          }"
                        />
                        <span class="text-danger" v-if="form.errors[`clinic_name`]">
                          {{ form.errors[`clinic_name`] }}
                        </span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="first_name"
                          ><span class="text-danger">*</span>{{ __("first name") }}</label
                        >
                        <input
                          v-model="form.first_name"
                          class="w-100 form-control auth-input px-3"
                          :placeholder="__('please enter')"
                          type="text"
                          :class="{
                            'is-invalid': form.errors[`first_name`],
                          }"
                        />
                        <span class="text-danger" v-if="form.errors[`first_name`]">
                          {{ form.errors[`first_name`] }}
                        </span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="last_name"
                          ><span class="text-danger">*</span>{{ __("last name") }}</label
                        >
                        <input
                          v-model="form.last_name"
                          class="w-100 form-control auth-input px-3"
                          :placeholder="__('please enter')"
                          type="text"
                          :class="{
                            'is-invalid': form.errors[`last_name`],
                          }"
                        />
                        <span class="text-danger" v-if="form.errors[`last_name`]">
                          {{ form.errors[`last_name`] }}
                        </span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="category">{{ __("choose") }} {{ __n("tag") }}</label>
                        <Multiselect
                          :placeholder="__('please select')"
                          v-model="form.tags"
                          valueProp="id"
                          label="name"
                          mode="tags"
                          class="multiselect shadow-none h-auto p-2"
                          :close-on-select="false"
                          :searchable="true"
                          :options="this.tags"
                        />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="category"
                          >{{ __("choose") }} {{ __n("language") }}</label
                        >
                        <Multiselect
                          :placeholder="__('please select')"
                          v-model="form.languages"
                          valueProp="id"
                          label="name"
                          mode="tags"
                          class="multiselect shadow-none h-auto p-2"
                          :close-on-select="false"
                          :searchable="true"
                          :options="this.languages"
                        />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="country"
                          >{{ __("select") }} {{ __("country") }}</label
                        >
                        <select
                          v-model="form.country_id"
                          @change="getStates()"
                          class="form-select px-3"
                          aria-label="country"
                        >
                          <option value="null" selected disabled>
                            {{ __("country") }}
                          </option>
                          <option
                            v-for="country in this.countries"
                            :key="country.id"
                            :value="country.id"
                          >
                            {{ country.name }}
                          </option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="state">{{ __("select") }} {{ __("state") }}</label>
                        <select
                          v-model="form.state_id"
                          @change="getCities()"
                          class="form-select px-3"
                          aria-label="state"
                        >
                          <option value="null" selected disabled>
                            {{ __("state") }}
                          </option>
                          <option
                            v-for="state in this.states"
                            :key="state.id"
                            :value="state.id"
                          >
                            {{ state.name }}
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="city">{{ __("select") }} {{ __("city") }}</label>
                        <select
                          v-model="form.city_id"
                          class="form-select px-3"
                          aria-label="city"
                        >
                          <option value="null" selected disabled>
                            {{ __("city") }}
                          </option>
                          <option
                            v-for="city in this.cities"
                            :key="city.id"
                            :value="city.id"
                          >
                            {{ city.name }}
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="zip_code"
                          ><span class="text-danger">*</span>{{ __("zip code") }}</label
                        >
                        <input
                          v-model="form.zip_code"
                          class="w-100 form-control auth-input px-3"
                          :placeholder="__('please enter')"
                          type="text"
                          :class="{
                            'is-invalid': form.errors[`zip_code`],
                          }"
                        />
                        <span class="text-danger" v-if="form.errors[`zip_code`]">
                          {{ form.errors[`zip_code`] }}
                        </span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group position-relative">
                        <label for="home_phone">{{ __("home phone") }}</label>
                        <input
                          :disabled="disable_fields"
                          v-model="form.home_phone"
                          class="w-100 form-control auth-input px-3"
                          :placeholder="__('please enter')"
                          type="text"
                        />
                        <div
                          class="spinner-border position-absolute"
                          ref="home_phone"
                          role="status"
                          style="top: 35px; right: 10px; display: none"
                        >
                          <span class="visually-hidden">{{ __("loading...") }}</span>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group position-relative">
                        <label for="cell_phone">{{ __("cell phone") }}</label>
                        <input
                          :disabled="disable_fields"
                          v-model="form.cell_phone"
                          class="w-100 form-control auth-input px-3"
                          :placeholder="__('please enter')"
                          type="text"
                        />
                        <div
                          class="spinner-border position-absolute"
                          ref="cell_phone"
                          role="status"
                          style="top: 35px; right: 10px; display: none"
                        >
                          <span class="visually-hidden">{{ __("loading...") }}</span>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group position-relative">
                        <label for="job_title">{{ __("job title") }}</label>
                        <input
                          :disabled="disable_fields"
                          v-model="form.job_title"
                          class="w-100 form-control auth-input px-3"
                          :placeholder="__('please enter')"
                          type="text"
                        />
                        <div
                          class="spinner-border position-absolute"
                          ref="job_title"
                          role="status"
                          style="top: 35px; right: 10px; display: none"
                        >
                          <span class="visually-hidden">{{ __("loading...") }}</span>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group position-relative">
                        <label for="website">{{ __("website") }}</label>
                        <input
                          :disabled="disable_fields"
                          v-model="form.website"
                          class="w-100 form-control auth-input px-3"
                          :placeholder="__('please enter')"
                          type="text"
                        />
                        <div
                          class="spinner-border position-absolute"
                          ref="website"
                          role="status"
                          style="top: 35px; right: 10px; display: none"
                        >
                          <span class="visually-hidden">{{ __("loading...") }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group position-relative">
                        <label for="company">{{ __("company") }}</label>
                        <input
                          :disabled="disable_fields"
                          v-model="form.company"
                          class="w-100 form-control auth-input px-3"
                          :placeholder="__('please enter')"
                          type="text"
                        />
                        <div
                          class="spinner-border position-absolute"
                          ref="company"
                          role="status"
                          style="top: 35px; right: 10px; display: none"
                        >
                          <span class="visually-hidden">{{ __("loading...") }}</span>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group position-relative">
                        <label for="email">{{ __("email") }}</label>
                        <input
                          :disabled="disable_fields"
                          v-model="form.email"
                          class="w-100 form-control auth-input px-3"
                          :placeholder="__('please enter')"
                          type="text"
                        />
                        <div
                          class="spinner-border position-absolute"
                          ref="email"
                          role="status"
                          style="top: 35px; right: 10px; display: none"
                        >
                          <span class="visually-hidden">{{ __("loading...") }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="address"
                          ><span class="text-danger">*</span
                          >{{ __("address line") }} 1</label
                        >
                        <textarea
                          v-model="form.address_line_1"
                          class="w-100 auth-input form-control px-3"
                          :placeholder="__('please enter')"
                          type="text"
                          :class="{
                            'is-invalid': form.errors[`address_line_1`],
                          }"
                        ></textarea>

                        <span class="text-danger" v-if="form.errors[`address_line_1`]">
                          {{ form.errors[`address_line_1`] }}
                        </span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="address"
                          ><span class="text-danger">*</span
                          >{{ __("address line") }} 2</label
                        >
                        <textarea
                          v-model="form.address_line_2"
                          class="w-100 form-control auth-input px-3"
                          :placeholder="__('please enter')"
                          :class="{
                            'is-invalid': form.errors[`address_line_2`],
                          }"
                          type="text"
                        ></textarea>
                        <span class="text-danger" v-if="form.errors[`address_line_2`]">
                          {{ form.errors[`address_line_2`] }}
                        </span>
                      </div>
                    </div>
                    <!-- <div class="col-md-12">
                      <div class="row">
                        <div class="col-12">
                          <div class="card border-0">
                            <div class="card-body px-0">
                              <label class="fs-3 mb-3" for="description">{{
                                __("description")
                              }}</label>
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
                                    :class="{ active: index == 0 }"
                                    class="nav-link mr-1 fw-bold rounded-top fs-3"
                                    :id="`nav-${lang.code}-tab`"
                                    data-bs-toggle="tab"
                                    :data-bs-target="`#nav-${lang.code}`"
                                    type="button"
                                    role="tab"
                                    :aria-controls="`nav-${lang.code}`"
                                    aria-selected="true"
                                  >
                                    {{ lang.name }}
                                  </button>
                                </li>
                              </ul>
                              <div
                                v-for="(lang, secondIndex) in $page.props
                                  .translation_languages"
                                :key="lang.id"
                                class="tab-content mt-1"
                                id="myTabContent"
                              >
                                <div
                                  :class="{ 'show active': secondIndex == 0 }"
                                  class="tab-pane fade mb-2"
                                  :id="`nav-${lang.code}`"
                                  role="tabpanel"
                                  :aria-labelledby="`nav-${lang.code}-tab`"
                                >
                                  <div class="col-md-12 decription-content">
                                    <div class="form-group rounded-3">
                                      <textarea
                                        :class="{
                                          'is-invalid':
                                            form.errors[
                                              `description.${lang.code}`
                                            ],
                                        }"
                                        v-model="form.description[lang.code]"
                                        class="form-control"
                                      ></textarea>
                                      <span
                                        v-if="
                                          form.errors[
                                            `description.${lang.code}`
                                          ]
                                        "
                                      >
                                        {{
                                          form.errors[
                                            `description.${lang.code}`
                                          ]
                                        }}
                                      </span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="pills-profile"
                  role="tabpanel"
                  aria-labelledby="pills-profile-tab"
                  tabindex="0"
                >
                  <div class="col-12">
                    <div class="profile-page-wizrd">
                      <Wizard
                        navigable-tabs
                        hideButtons
                        :custom-tabs="[
                          {
                            title: this.__('Home Address'),
                          },
                          {
                            title: this.__('Work Address'),
                          },
                          {
                            title: this.__('Billing Address'),
                          },
                          {
                            title: this.__('Shipping Address'),
                          },
                        ]"
                        :beforeChange="onTabBeforeChange"
                        @change="onChangeCurrentTab"
                      >
                        <div v-if="currentTabIndex === 0">
                          <div class="card bg-transparent border-0 home-address">
                            <div class="card-body p-md-4">
                              <!-- Home Address -->
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="country"
                                      >{{ __("select") }} {{ __("country") }}</label
                                    >
                                    <select
                                      v-model="form.country_id"
                                      @change="getStates()"
                                      class="form-select"
                                      aria-label="country"
                                    >
                                      <option value="null" selected disabled>
                                        {{ __("country") }}
                                      </option>
                                      <option
                                        v-for="country in this.countries"
                                        :key="country.id"
                                        :value="country.id"
                                      >
                                        {{ country.name }}
                                      </option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="state"
                                      >{{ __("select") }} {{ __("state") }}</label
                                    >
                                    <select
                                      v-model="form.state_id"
                                      @change="getCities()"
                                      class="form-select"
                                      aria-label="state"
                                    >
                                      <option value="null" selected disabled>
                                        {{ __("state") }}
                                      </option>
                                      <option
                                        v-for="state in this.states"
                                        :key="state.id"
                                        :value="state.id"
                                      >
                                        {{ state.name }}
                                      </option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="city"
                                      >{{ __("select") }} {{ __("city") }}</label
                                    >
                                    <select
                                      v-model="form.city_id"
                                      class="form-select"
                                      aria-label="city"
                                    >
                                      <option value="null" selected disabled>
                                        {{ __("city") }}
                                      </option>
                                      <option
                                        v-for="city in this.cities"
                                        :key="city.id"
                                        :value="city.id"
                                      >
                                        {{ city.name }}
                                      </option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group position-relative">
                                    <label for="zip_code"
                                      ><span class="text-danger">*</span
                                      >{{ __("zip code") }}</label
                                    >
                                    <input
                                      :disabled="disable_fields"
                                      v-model="form.zip_code"
                                      class="w-100 form-control auth-input px-3"
                                      :placeholder="__('please enter')"
                                      type="text"
                                    />
                                    <div
                                      class="spinner-border position-absolute"
                                      ref="zip_code"
                                      role="status"
                                      style="top: 35px; right: 10px; display: none"
                                    >
                                      <span class="visually-hidden">{{
                                        __("loading...")
                                      }}</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="address"
                                      >{{ __("address line") }} 1</label
                                    >
                                    <div class="input-group-from position-relative">
                                      <vue-google-autocomplete
                                        id="map"
                                        ref="address"
                                        enable-geolocation
                                        classname="w-100 form-control px-3"
                                        :placeholder="__('please enter')"
                                        v-on:inputChange="updateLocation"
                                        v-on:placechanged="getAddressData"
                                      >
                                      </vue-google-autocomplete>
                                      <button
                                        type="button"
                                        class="btn position-absolute shadow-none"
                                        style="right: 4px; top: 4px"
                                        @click="getCurrentLocation()"
                                      >
                                        <i class="bi bi-geo-alt-fill"></i>
                                      </button>
                                    </div>
                                    <GMapMap
                                      :center="{
                                        lat: this.form.latitude,
                                        lng: this.form.longitude,
                                      }"
                                      :zoom="7"
                                      class="mt-3"
                                      map-type-id="terrain"
                                      style="width: 100%; height: 500px"
                                    >
                                      <GMapMarker
                                        @dragend="showInfo"
                                        ref="myMarker"
                                        @click="openInfoWIndow($event)"
                                        :clickable="true"
                                        :draggable="true"
                                        :position="{
                                          lat: this.form.latitude,
                                          lng: this.form.longitude,
                                        }"
                                      />
                                    </GMapMap>
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="form-group position-relative">
                                    <label for="address"
                                      >{{ __("address line") }} 2</label
                                    >
                                    <textarea
                                      :disabled="disable_fields"
                                      v-model="form.address_line_2"
                                      class="w-100 form-control auth-input px-3"
                                      :placeholder="__('please enter')"
                                      type="text"
                                    ></textarea>
                                    <div
                                      class="spinner-border position-absolute"
                                      ref="address_line_2"
                                      role="status"
                                      style="top: 35px; right: 10px; display: none"
                                    >
                                      <span class="visually-hidden">{{
                                        __("loading...")
                                      }}</span>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-12">
                                <div class="d-md-flex justify-content-end">
                                  <button
                                    type="button"
                                    @click="onChangeCurrentTab(1)"
                                    class="btn btn-primary rounded-4 fs-3 fw-bold"
                                  >
                                    {{ __("next") }}
                                    <img
                                      src="@/images/icons/loginbtnicon.png"
                                      class="ms-2 mb-1"
                                      width="25"
                                      alt=""
                                    />
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div v-if="currentTabIndex === 1">
                          <div class="card bg-transparent border-0 address-details">
                            <div class="card-body">
                              <div class="row">
                                <div class="form-group mb-2">
                                  <div class="row">
                                    <div class="col-6">
                                      <div class="form-check form-switch">
                                        <input
                                          class="form-check-input"
                                          v-model="billing_same_address"
                                          @change="makeSameAddress('billing')"
                                          type="checkbox"
                                          role="switch"
                                          id="CoCreationSwitch"
                                        />
                                        <label
                                          class="form-check-label mb-2"
                                          for="CoCreationSwitch"
                                          >{{ __("same as home address") }}?</label
                                        >
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <!-- Billing Address -->
                                  <div class="form-group">
                                    <label for="country"
                                      >{{ __("select") }} {{ __("country") }}</label
                                    >
                                    <select
                                      v-model="form.billing_country_id"
                                      @change="getBillingStates()"
                                      class="form-select"
                                      aria-label="country"
                                    >
                                      <option value="null" selected disabled>
                                        {{ __("country") }}
                                      </option>
                                      <option
                                        v-for="country in this.countries"
                                        :key="country.id"
                                        :value="country.id"
                                      >
                                        {{ country.name }}
                                      </option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="state"
                                      >{{ __("select") }} {{ __("state") }}</label
                                    >
                                    <select
                                      v-model="form.billing_state_id"
                                      @change="getBillingCities()"
                                      class="form-select"
                                      aria-label="state"
                                    >
                                      <option value="null" selected disabled>
                                        {{ __("state") }}
                                      </option>
                                      <option
                                        v-for="state in this.billing_states"
                                        :key="state.id"
                                        :value="state.id"
                                      >
                                        {{ state.name }}
                                      </option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="city"
                                      >{{ __("select") }} {{ __("city") }}</label
                                    >
                                    <select
                                      v-model="form.billing_city_id"
                                      class="form-select"
                                      aria-label="city"
                                    >
                                      <option value="null" selected disabled>
                                        {{ __("city") }}
                                      </option>
                                      <option
                                        v-for="city in this.billing_cities"
                                        :key="city.id"
                                        :value="city.id"
                                      >
                                        {{ city.name }}
                                      </option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group position-relative">
                                    <label for="zip_code">{{ __("zip code") }}</label>
                                    <input
                                      :disabled="disable_fields"
                                      v-model="form.billing_zip_code"
                                      class="w-100 form-control auth-input px-3"
                                      :placeholder="__('please enter')"
                                      type="text"
                                    />
                                    <div
                                      class="spinner-border position-absolute"
                                      ref="billing_zip_code"
                                      role="status"
                                      style="top: 35px; right: 10px; display: none"
                                    >
                                      <span class="visually-hidden">{{
                                        __("loading...")
                                      }}</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="form-group position-relative">
                                    <label for="address"
                                      >{{ __("address line") }} 1</label
                                    >
                                    <textarea
                                      v-model="form.billing_address_line_1"
                                      class="w-100 form-control auth-input px-3"
                                      :placeholder="__('please enter')"
                                      type="text"
                                    ></textarea>
                                    <div
                                      class="spinner-border position-absolute"
                                      ref="billing_address_line_1"
                                      role="status"
                                      style="top: 35px; right: 10px; display: none"
                                    >
                                      <span class="visually-hidden">{{
                                        __("loading...")
                                      }}</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="form-group position-relative">
                                    <label for="address"
                                      >{{ __("address line") }} 2</label
                                    >
                                    <textarea
                                      :disabled="disable_fields"
                                      v-model="form.billing_address_line_2"
                                      class="w-100 form-control auth-input px-3"
                                      :placeholder="__('please enter')"
                                      type="text"
                                    ></textarea>
                                    <div
                                      class="spinner-border position-absolute"
                                      ref="billing_address_line_2"
                                      role="status"
                                      style="top: 35px; right: 10px; display: none"
                                    >
                                      <span class="visually-hidden">{{
                                        __("loading...")
                                      }}</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12">
                                  <div class="d-md-flex gap-2 justify-content-end">
                                    <button
                                      type="button"
                                      @click="onChangeCurrentTab(0)"
                                      class="btn btn-dark rounded-4 fs-3 fw-bold"
                                    >
                                      {{ __("Back") }}
                                      <img
                                        src="@/images/icons/loginbtnicon.png"
                                        class="ms-2 mb-1"
                                        width="26"
                                        alt=""
                                      />
                                    </button>

                                    <button
                                      type="button"
                                      @click="onChangeCurrentTab(2)"
                                      class="btn btn-primary rounded-4 fs-3 fw-bold"
                                    >
                                      {{ __("next") }}
                                      <img
                                        src="@/images/icons/loginbtnicon.png"
                                        class="ms-2 mb-1"
                                        width="26"
                                        alt=""
                                      />
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div v-if="currentTabIndex === 2">
                          <div class="card bg-transparent border-0 address-details">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-6 mb-2">
                                  <div class="form-check form-switch">
                                    <input
                                      class="form-check-input"
                                      v-model="shipping_same_address"
                                      @change="makeSameAddress('shipping')"
                                      type="checkbox"
                                      role="switch"
                                      id="CoCreationSwitch"
                                    />
                                    <label
                                      class="form-check-label mb-2"
                                      for="CoCreationSwitch"
                                      >{{ __("same as home address") }}?</label
                                    >
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="country"
                                      >{{ __("select") }} {{ __("country") }}</label
                                    >
                                    <select
                                      v-model="form.shipping_country_id"
                                      @change="getShippingStates()"
                                      class="form-select"
                                      aria-label="country"
                                    >
                                      <option value="null" selected disabled>
                                        {{ __("country") }}
                                      </option>
                                      <option
                                        v-for="country in this.countries"
                                        :key="country.id"
                                        :value="country.id"
                                      >
                                        {{ country.name }}
                                      </option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="state"
                                      >{{ __("select") }} {{ __("state") }}</label
                                    >
                                    <select
                                      v-model="form.shipping_state_id"
                                      @change="getShippingCities()"
                                      class="form-select"
                                      aria-label="state"
                                    >
                                      <option value="null" selected disabled>
                                        {{ __("state") }}
                                      </option>
                                      <option
                                        v-for="state in this.shipping_states"
                                        :key="state.id"
                                        :value="state.id"
                                      >
                                        {{ state.name }}
                                      </option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="city"
                                      >{{ __("select") }} {{ __("city") }}</label
                                    >
                                    <select
                                      v-model="form.shipping_city_id"
                                      class="form-select"
                                      aria-label="city"
                                    >
                                      <option value="null" selected disabled>
                                        {{ __("city") }}
                                      </option>
                                      <option
                                        v-for="city in this.shipping_cities"
                                        :key="city.id"
                                        :value="city.id"
                                      >
                                        {{ city.name }}
                                      </option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group position-relative">
                                    <label for="zip_code">{{ __("zip code") }}</label>
                                    <input
                                      :disabled="disable_fields"
                                      v-model="form.shipping_zip_code"
                                      class="w-100 form-control auth-input px-3"
                                      :placeholder="__('please enter')"
                                      type="text"
                                    />
                                    <div
                                      class="spinner-border position-absolute"
                                      ref="shipping_zip_code"
                                      role="status"
                                      style="top: 35px; right: 10px; display: none"
                                    >
                                      <span class="visually-hidden">{{
                                        __("loading...")
                                      }}</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="form-group position-relative">
                                    <label for="address"
                                      >{{ __("address line") }} 1</label
                                    >
                                    <textarea
                                      :disabled="disable_fields"
                                      v-model="form.shipping_address_line_1"
                                      class="w-100 form-control auth-input px-3"
                                      :placeholder="__('please enter')"
                                      type="text"
                                    ></textarea>
                                    <div
                                      class="spinner-border position-absolute"
                                      ref="shipping_address_line_1"
                                      role="status"
                                      style="top: 35px; right: 10px; display: none"
                                    >
                                      <span class="visually-hidden">{{
                                        __("loading...")
                                      }}</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="form-group mb-3 position-relative">
                                    <label class="mb-2" for="address"
                                      >{{ __("address line") }} 2</label
                                    >
                                    <textarea
                                      :disabled="disable_fields"
                                      v-model="form.shipping_address_line_2"
                                      class="w-100 form-control auth-input px-3"
                                      :placeholder="__('please enter')"
                                      type="text"
                                    ></textarea>
                                    <div
                                      class="spinner-border position-absolute"
                                      ref="shipping_address_line_2"
                                      role="status"
                                      style="top: 35px; right: 10px; display: none"
                                    >
                                      <span class="visually-hidden">{{
                                        __("loading...")
                                      }}</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12">
                                  <div class="d-md-flex gap-2 justify-content-end">
                                    <button
                                      type="button"
                                      @click="onChangeCurrentTab(1)"
                                      class="btn btn-dark rounded-4 fs-3 fw-bold"
                                    >
                                      {{ __("Back") }}
                                      <img
                                        src="@/images/icons/loginbtnicon.png"
                                        class="ms-2 mb-1"
                                        width="26"
                                        alt=""
                                      />
                                    </button>
                                    <button
                                      type="button"
                                      @click="onChangeCurrentTab(3)"
                                      class="btn btn-primary rounded-4 fs-3 fw-bold"
                                    >
                                      {{ __("next") }}
                                      <img
                                        src="@/images/icons/loginbtnicon.png"
                                        class="ms-2 mb-1"
                                        width="26"
                                        alt=""
                                      />
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div v-if="currentTabIndex === 3">
                          <div class="card bg-transparent border-0 address-details">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-6">
                                  <div class="form-check form-switch mb-2">
                                    <input
                                      :disabled="disable_fields"
                                      class="form-check-input"
                                      v-model="work_same_address"
                                      @change="makeSameAddress('work')"
                                      type="checkbox"
                                      role="switch"
                                      id="CoCreationSwitch"
                                    />
                                    <label
                                      class="form-check-label mb-2"
                                      for="CoCreationSwitch"
                                      >{{ __("same as home address") }}?</label
                                    >
                                    <div
                                      class="spinner-border position-absolute"
                                      ref="work_same_address"
                                      role="status"
                                      style="top: 35px; right: 10px; display: none"
                                    >
                                      <span class="visually-hidden">{{
                                        __("loading...")
                                      }}</span>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="country"
                                      >{{ __("select") }} {{ __("country") }}</label
                                    >
                                    <select
                                      v-model="form.work_country_id"
                                      @change="getWorkStates()"
                                      class="form-select"
                                      aria-label="country"
                                    >
                                      <option value="null" selected disabled>
                                        {{ __("country") }}
                                      </option>
                                      <option
                                        v-for="country in this.countries"
                                        :key="country.id"
                                        :value="country.id"
                                      >
                                        {{ country.name }}
                                      </option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="state"
                                      >{{ __("select") }} {{ __("state") }}</label
                                    >
                                    <select
                                      v-model="form.work_state_id"
                                      @change="getWorkCities()"
                                      class="form-select"
                                      aria-label="state"
                                    >
                                      <option value="null" selected disabled>
                                        {{ __("state") }}
                                      </option>
                                      <option
                                        v-for="state in this.work_states"
                                        :key="state.id"
                                        :value="state.id"
                                      >
                                        {{ state.name }}
                                      </option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="city"
                                      >{{ __("select") }} {{ __("city") }}</label
                                    >
                                    <select
                                      v-model="form.work_city_id"
                                      class="form-select"
                                      aria-label="city"
                                    >
                                      <option value="null" selected disabled>
                                        {{ __("city") }}
                                      </option>
                                      <option
                                        v-for="city in this.work_cities"
                                        :key="city.id"
                                        :value="city.id"
                                      >
                                        {{ city.name }}
                                      </option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group position-relative">
                                    <label for="zip_code">{{ __("zip code") }}</label>
                                    <input
                                      :disabled="disable_fields"
                                      v-model="form.work_zip_code"
                                      class="w-100 form-control auth-input px-3"
                                      :placeholder="__('please enter')"
                                      type="text"
                                    />
                                    <div
                                      class="spinner-border position-absolute"
                                      ref="work_zip_code"
                                      role="status"
                                      style="top: 35px; right: 10px; display: none"
                                    >
                                      <span class="visually-hidden">{{
                                        __("loading...")
                                      }}</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="form-group position-relative">
                                    <label for="address"
                                      >{{ __("address line") }} 1</label
                                    >
                                    <textarea
                                      :disabled="disable_fields"
                                      v-model="form.work_address_line_1"
                                      class="w-100 form-control auth-input px-3"
                                      :placeholder="__('please enter')"
                                      type="text"
                                    ></textarea>
                                    <div
                                      class="spinner-border position-absolute"
                                      ref="work_address_line_1"
                                      role="status"
                                      style="top: 35px; right: 10px; display: none"
                                    >
                                      <span class="visually-hidden">{{
                                        __("loading...")
                                      }}</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="form-group position-relative">
                                    <label for="address"
                                      >{{ __("address line") }} 2</label
                                    >
                                    <textarea
                                      :disabled="disable_fields"
                                      v-model="form.work_address_line_2"
                                      class="w-100 form-control auth-input px-3"
                                      :placeholder="__('please enter')"
                                      type="text"
                                    ></textarea>
                                    <div
                                      class="spinner-border position-absolute"
                                      ref="work_address_line_2"
                                      role="status"
                                      style="top: 35px; right: 10px; display: none"
                                    >
                                      <span class="visually-hidden">{{
                                        __("loading...")
                                      }}</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12">
                                  <div class="d-md-flex justify-content-end">
                                    <button
                                      type="button"
                                      @click="onChangeCurrentTab(2)"
                                      class="btn btn-dark fs-3 fw-bold rounded-4"
                                    >
                                      {{ __("Back") }}
                                      <img
                                        src="@/images/icons/loginbtnicon.png"
                                        class="ms-2 mb-1"
                                        width="26"
                                        alt=""
                                      />
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Work Address -->
                        </div>
                      </Wizard>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 text-end mt-4 ms-4 pe-md-4">
        <button
          type="submit"
          :disabled="form.processing"
          class="btn btn-primary rounded-4 fs-2 fw-bold px-4"
        >
          <SpinnerLoader v-if="form.processing" />
          {{ __("save") }}
          <img
            src="@/images/icons/loginbtnicon.png"
            width="30"
            class="ms-2 mb-1"
            alt=""
          />
        </button>
      </div>
    </form>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import ImageCropperModal from "@/Components//Shared/ImageCropperModal.vue";
import SpinnerLoader from "@/Components/Shared/SpinnerLoader.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import axios from "axios";
import Multiselect from "@vueform/multiselect";
import VueGoogleAutocomplete from "vue-google-autocomplete";

export default defineComponent({
  components: {
    Head,
    ValidationErrors,
    Link,
    SpinnerLoader,
    ImageCropperModal,
    Multiselect,
    VueGoogleAutocomplete,
  },
  props: ["active", "clinic", "image", "description"],
  async mounted() {
    this.form.image = this.image;
    this.form.description = this.description;
    await this.locatorButtonPressed();
    await this.$refs.address.update(this.$page.props.clinic.address_line_1);
    this.form.latitude = parseFloat(this.$page.props.clinic.latitude);
    this.form.longitude = parseFloat(this.$page.props.clinic.longitude);
    if (!this.form.latitude && !this.form.longitude) {
      this.form.latitude = this.location_data.lat ?? -34.6161385;
      this.form.longitude = this.location_data.lng ?? -58.39748470000001;
    }
    this.formExperienceOptions();
  },

  data() {
    return {
      currentTabIndex: 0,
      billing_same_address: false,
      shipping_same_address: false,
      work_same_address: false,
      form: this.$inertia.form({
        clinic_categories: this.$page.props.clinic.clinic_category_ids,
        clinic_name: this.$page.props.clinic.clinic_name,
        clinic_website: this.$page.props.clinic.clinic_website,
        country_id: this.$page.props.clinic.country_id,
        state_id: this.$page.props.clinic.state_id,
        city_id: this.$page.props.clinic.city_id,
        languages: this.$page.props.clinic.language_ids,
        tags: this.$page.props.clinic.tag_ids,
        clinic_website: this.$page.props.clinic.clinic_website,
        first_name: this.$page.props.clinic.first_name,
        last_name: this.$page.props.clinic.last_name,
        description:
          this.$page.props.clinic.description_translations.length == 0
            ? {}
            : this.$page.props.clinic.description_translations,
        address_line_1: this.$page.props.clinic.address_line_1,
        address_line_2: this.$page.props.clinic.address_line_2,
        latitude: this.$page.props.clinic.latitude,
        is_online: this.$page.props.clinic.is_online,
        longitude: this.$page.props.clinic.longitude,
        prefix: this.$page.props.clinic.prefix,
        suffix: this.$page.props.clinic.suffix,
        home_phone: this.$page.props.clinic.home_phone,
        cell_phone: this.$page.props.clinic.cell_phone,
        job_title: this.$page.props.clinic.cell_phone,
        company: this.$page.props.clinic.company,
        website: this.$page.props.clinic.website,
        email: this.$page.props.clinic.email,
        billing_country_id: this.$page.props.clinic.billing_country_id,
        billing_state_id: this.$page.props.clinic.billing_state_id,
        billing_city_id: this.$page.props.clinic.billing_city_id,
        billing_address_line_1: this.$page.props.clinic.billing_address_line_1,
        billing_address_line_2: this.$page.props.clinic.billing_address_line_2,
        billing_zip_code: this.$page.props.clinic.billing_zip_code,
        shipping_country_id: this.$page.props.clinic.shipping_country_id,
        shipping_state_id: this.$page.props.clinic.shipping_state_id,
        shipping_city_id: this.$page.props.clinic.shipping_city_id,
        shipping_address_line_1: this.$page.props.clinic.shipping_address_line_1,
        shipping_address_line_2: this.$page.props.clinic.shipping_address_line_2,
        shipping_zip_code: this.$page.props.clinic.shipping_zip_code,
        work_country_id: this.$page.props.clinic.work_country_id,
        work_state_id: this.$page.props.clinic.work_state_id,
        work_city_id: this.$page.props.clinic.work_city_id,
        work_address_line_1: this.$page.props.clinic.work_address_line_1,
        work_address_line_2: this.$page.props.clinic.work_address_line_2,
        work_zip_code: this.$page.props.clinic.work_zip_code,
        icon: null,
        image: null,
        cover_image: null,
        user_name: this.$page.props.clinic.user_name,
        zip_code: this.$page.props.clinic.zip_code,
        speciality: this.$page.props.clinic.speciality,
        experience: this.$page.props.clinic.experience,
      }),
      experienceOptions: [
        { name: "1 years", value: "1" },
        { name: "2 years", value: "2" },
        { name: "3 years", value: "3" },
        { name: "4 years", value: "4" },
        { name: "5 years", value: "5" },
        { name: "6 years", value: "6" },
        { name: "7 years", value: "7" },
        { name: "8 years", value: "8" },
        { name: "9 years", value: "9" },
        { name: "10 years", value: "10" },
      ],
      showImportModal: false,
      image_url: null,
      cover_image_url: null,
      croppedImageSrc: null,
      showCoverImportModal: false,
      croppedCoverImageSrc: null,
      countries: this.$page.props.countries,
      states: this.$page.props.states,
      cities: this.$page.props.cities,
      billing_states: this.$page.props.billing_states,
      billing_cities: this.$page.props.billing_cities,
      shipping_states: this.$page.props.shipping_states,
      shipping_cities: this.$page.props.shipping_cities,
      work_states: this.$page.props.work_states,
      work_cities: this.$page.props.work_cities,
      clinic_categories: this.$page.props.clinic_categories,
      languages: this.$page.props.languages,
      tags: this.$page.props.tags,
    };
  },

  mounted() {
    this.form.image = this.image;
    this.form.description = this.description;
  },
  methods: {
    async showInfo(info) {
      this.form.latitude = info.latLng.lat();
      this.form.longitude = info.latLng.lng();

      if (this.form.latitude && this.form.longitude) {
        var user_address = await this.getStreetAddressFrom(
          this.form.latitude,
          this.form.longitude
        );
        this.$refs.address.update(user_address);
      }
    },
    async getCurrentLocation() {
      this.form.latitude = this.location_data.lat ?? -34.6161385;
      this.form.longitude = this.location_data.lng ?? -58.39748470000001;
      if (this.form.latitude && this.form.longitude) {
        var user_address = await this.getStreetAddressFrom(
          this.form.latitude,
          this.form.longitude
        );
        this.$refs.address.update(user_address);
      }
    },
    makeSameAddress(type) {
      if (type == "billing" && this.billing_same_address) {
        this.form.billing_country_id = this.form.country_id;
        this.billing_states = this.states;
        this.form.billing_state_id = this.form.state_id;
        this.billing_cities = this.cities;
        this.form.billing_city_id = this.form.city_id;
        this.form.billing_address_line_1 = this.form.address_line_1;
        this.form.billing_address_line_2 = this.form.address_line_2;
        this.form.billing_zip_code = this.form.zip_code;
      }
      if (type == "shipping" && this.shipping_same_address) {
        this.form.shipping_country_id = this.form.country_id;
        this.shipping_states = this.states;
        this.form.shipping_state_id = this.form.state_id;
        this.shipping_cities = this.cities;
        this.form.shipping_city_id = this.form.city_id;
        this.form.shipping_address_line_1 = this.form.address_line_1;
        this.form.shipping_address_line_2 = this.form.address_line_2;
        this.form.shipping_zip_code = this.form.zip_code;
      }
      if (type == "work" && this.work_same_address) {
        this.form.work_country_id = this.form.country_id;
        this.work_states = this.states;
        this.form.work_state_id = this.form.state_id;
        this.work_cities = this.cities;
        this.form.work_city_id = this.form.city_id;
        this.form.work_address_line_1 = this.form.address_line_1;
        this.form.work_address_line_2 = this.form.address_line_2;
        this.form.work_zip_code = this.form.zip_code;
      }
    },
    updateLocation(address) {
      this.form.address_line_1 = address.newVal;
    },
    getAddressData: function (addressData, placeResultData, id) {
      this.form.latitude = addressData.latitude;
      this.form.longitude = addressData.longitude;
      this.form.address_line_1 = addressData.route;
    },
    onFileChange(e) {
      this.image_url = null;
      const file = e.target.files[0];
      this.image_url = URL.createObjectURL(file);
      this.croppedImageSrc = null;
      this.showImportModal = true;
    },
    cropImage(image) {
      this.croppedImageSrc = image;
      this.form.image = image;
      this.image_url = null;
      this.showImportModal = false;
    },
    onFileChangeCover(e) {
      this.cover_image_url = null;
      const file = e.target.files[0];
      this.cover_image_url = URL.createObjectURL(file);
      this.croppedCoverImageSrc = null;
      this.showCoverImportModal = true;
    },
    cropCoverImage(image) {
      this.croppedCoverImageSrc = image;
      this.form.cover_image = image;
      this.cover_image_url = null;
      this.showCoverImportModal = false;
    },
    getStates() {
      this.form.state_id = null;
      this.form.city_id = null;
      axios
        .get(
          this.route("account.getStates", {
            country_id: this.form.country_id,
          })
        )
        .then((res) => {
          this.states = res.data.data;
        });
    },
    getCities() {
      this.form.city_id = null;
      axios
        .get(
          this.route("account.getCities", {
            country_id: this.form.country_id,
            state_id: this.form.state_id,
          })
        )
        .then((res) => {
          this.cities = res.data.data;
        });
    },
    getBillingStates() {
      this.form.billing_state_id = null;
      this.form.billing_city_id = null;
      axios
        .get(
          this.route("account.getStates", {
            country_id: this.form.billing_country_id,
          })
        )
        .then((res) => {
          this.billing_states = res.data.data;
        });
    },
    getBillingCities() {
      this.form.billing_city_id = null;
      axios
        .get(
          this.route("account.getCities", {
            country_id: this.form.billing_country_id,
            state_id: this.form.billing_state_id,
          })
        )
        .then((res) => {
          this.billing_cities = res.data.data;
        });
    },
    getShippingStates() {
      this.form.shipping_state_id = null;
      this.form.shipping_city_id = null;
      axios
        .get(
          this.route("account.getStates", {
            country_id: this.form.shipping_country_id,
          })
        )
        .then((res) => {
          this.shipping_states = res.data.data;
        });
    },
    getShippingCities() {
      this.form.shipping_city_id = null;
      axios
        .get(
          this.route("account.getCities", {
            country_id: this.form.shipping_country_id,
            state_id: this.form.shipping_state_id,
          })
        )
        .then((res) => {
          this.shipping_cities = res.data.data;
        });
    },
    getWorkStates() {
      this.form.work_state_id = null;
      this.form.work_city_id = null;
      axios
        .get(
          this.route("account.getStates", {
            country_id: this.form.work_country_id,
          })
        )
        .then((res) => {
          this.work_states = res.data.data;
        });
    },
    getWorkCities() {
      this.form.work_city_id = null;
      axios
        .get(
          this.route("account.getCities", {
            country_id: this.form.work_country_id,
            state_id: this.form.work_state_id,
          })
        )
        .then((res) => {
          this.work_cities = res.data.data;
        });
    },
    autoUpdateProfile(elementRef) {
      this.disable_fields = true;
      this.$refs[elementRef].style.display = "block";
      this.autoUpdate(this.$refs[elementRef]);
    },
    autoUpdate(refElement) {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("clinics.update_general_info"), {
          preserveScroll: true,
          onSuccess: () => {
            refElement.style.display = "none";
            this.disable_fields = false;
          },
          onError: () => {
            refElement.style.display = "none";
            this.disable_fields = false;
          },
        });
    },
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("clinics.update_general_info"), {
          onSuccess: () => {
            // this.goToNextTab();
          },
        });
    },
    goToNextTab() {
      this.$inertia.visit(route("account"), {
        data: { active_tab: "social-info" },
      });
    },

    onChangeCurrentTab(index) {
      this.currentTabIndex = index;
    },
    onTabBeforeChange() {
      if (this.currentTabIndex === 0) {
      }
    },
  },
  computed: {
    isOnline: {
      get() {
        return this.form.is_online === 1;
      },
      set(value) {
        this.form.is_online = value ? 1 : 0;
      },
    },
  },
});
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
