<template>
  <div class="container">
    <form @submit.prevent="submit">
      <div class="row">
        <div class="col-md-4 px-0 px-md-3">
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="d-flex flex-column">
                <div
                  class="img-container w-100 h-100 d-flex flex-column align-items-center justify-content-center"
                >
                  <label for="doctor-image">
                    <div class="card-img1 rounded-circle position-relative">
                      <img
                        v-if="form.image || $page.props.patient.image"
                        class="img-fluid rounded-circle"
                        :src="form.image ? form.image : $page.props.patient.image"
                        alt="logo"
                      />
                      <!-- <img
                        v-if="!form.image && $page.props.patient.image"
                        class="img-fluid rounded-circle"
                        :src="$page.props.patient.image"
                        alt="logo"
                      /> -->
                      <img
                        v-if="!form.image && !$page.props.patient.image"
                        class="img-fluid rounded-circle"
                        src="@/images/account/default_avatar_men.png"
                        alt="logo"
                      />
                      <button
                        class="border-0 position-absolute bg-transparent"
                        style="right: 10px; top: 24px"
                        @click="triggerFileInput"
                        type="button"
                      >
                        <img src="@/images/icons/Group1.svg" alt="" width="35" />
                      </button>
                    </div>

                    <button
                      data-bs-toggle="modal"
                      id="ImageCropperModalButton"
                      data-bs-target="#imageCropModal"
                      style="display: none"
                    ></button>
                    <ImageCropperModal
                      :show="showImportModal"
                      id="imageCropModal"
                      :image_url="image_url"
                      @cropImage="cropImage"
                    >
                    </ImageCropperModal>
                  </label>
                  <input
                    id="doctor-image"
                    ref="fileInput"
                    style="display: none"
                    @change="onFileChange"
                    type="file"
                  />
                  <!-- <input
                id="doctor-cover-image"
                style="display: none"
                @change="onFileChangeCover"
                type="file"
              /> -->

                  <div class="mt-5 card1 card p-4">
                    <div class="d-flex justify-content-between align-items-center">
                      <h3 class="fw-bold text-primary fs-2">
                        {{ __("about") }}
                      </h3>
                      <button
                        class="border-0"
                        data-bs-toggle="modal"
                        data-bs-target="#aboutModal"
                        type="button"
                      >
                        <img src="@/images/icons/Group1.svg" alt="" width="30" />
                      </button>
                    </div>

                    <Modal :id="'aboutModal'" :aria-labelledby="'aboutModalLabel'">
                      <div class="modal-content p-4 radius-50">
                        <div class="modal-header border-0">
                          <h1
                            class="fs-2 fw-bold text-primary mb-0"
                            id="exampleModalLabel"
                          >
                            {{ __("about") }}
                          </h1>
                        </div>
                        <div class="modal-body">
                          <textarea
                            style="
                              border-radius: 20px;
                              min-height: 150px;
                              scrollbar-width: none;
                            "
                            class="form-control border p-4"
                            id="exampleFormControlTextarea1"
                            rows="3"
                            v-model="form.description"
                          ></textarea>

                          <div class="text-danger" v-if="form.errors.description">
                            {{ form.errors.description }}
                          </div>
                        </div>
                        <div class="modal-footer border-0">
                          <button
                            type="button"
                            data-bs-dismiss="modal"
                            class="btn btn-secondary"
                            id="descriptionSave"
                          >
                            {{ __("close") }}
                          </button>
                          <button
                            type="button"
                            @click.prevent="submit('description')"
                            class="btn btn-primary fs-3 shadow-find"
                          >
                            {{ __("save") }}
                          </button>
                        </div>
                      </div>
                    </Modal>

                    <div>
                      <p class="lineclamp-4">{{ form.description }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 px-0 px-md-3">
          <div class="d-flex flex-column gap-3">
            <div class="card shadow w-100 mb-4">
              <div class="card-body p-0">
                <div
                  class="d-flex justify-content-between align-items-center p-2 border-bottom border-primary pb-3 px-3 mt-3"
                >
                  <h3 class="fw-bold fs-3 mb-0 ms-md-4">
                    {{ __("Personal information") }}
                  </h3>
                  <button
                    type="button"
                    class="btn btn-primary fs-3 me-md-3 rounded-4 shadow px-3 py-2 fw-bold d-flex justify-content-center align-items-center"
                    data-bs-toggle="modal"
                    data-bs-target="#personalInformationModel"
                  >
                    <img class="me-2" src="@/images/icons/pen.svg" alt="" />
                    {{ __("Edit") }}
                  </button>
                  <Modal
                    :id="'personalInformationModel'"
                    tabindex="-1"
                    :aria-labelledby="'personalInformationModelLabel'"
                  >
                    <div class="modal-content" style="border-radius: 20px">
                      <div class="modal-header p-4">
                        <h5 class="modal-title" :id="'personalInformationModelLabel'">
                          {{ __("Personal information") }}
                        </h5>
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                        ></button>
                      </div>
                      <div class="modal-body">
                        <!-- <validation-errors></validation-errors> -->
                        <div class="form-group mb-3">
                          <label for="first_name"
                            >{{ __("first name")
                            }}<span class="text-danger">*</span></label
                          >
                          <input
                            v-model="form.first_name"
                            class="form-control px-3 fw-bold text-black"
                            :placeholder="__('Please Enter')"
                            type="text"
                          />
                          <div class="text-danger" v-if="form.errors.first_name">
                            {{ form.errors.first_name }}
                          </div>
                        </div>

                        <div class="form-group mb-3">
                          <label for="last_name"
                            >{{ __("last name")
                            }}<span class="text-danger">*</span></label
                          >
                          <input
                            v-model="form.last_name"
                            class="form-control px-3 fw-bold text-black"
                            :placeholder="__('Please Enter')"
                            type="text"
                          />
                          <div class="text-danger" v-if="form.errors.last_name">
                            {{ form.errors.last_name }}
                          </div>
                        </div>
                        <div class="form-group dob-picker mb-3">
                          <label for="dob"
                            >{{ __("Date of Birth")
                            }}<span class="text-danger">*</span></label
                          >
                          <div class="dob-pick">
                            <VueDatePicker
                              v-model="form.dob"
                              is24="false"
                              format="dd/MM/yyyy"
                            ></VueDatePicker>
                          </div>
                          <div class="text-danger" v-if="form.errors.dob">
                            {{ form.errors.dob }}
                          </div>
                        </div>

                        <div class="form-group mb-3">
                          <label for="user_name"
                            >{{ __("username") }}<span class="text-danger">*</span></label
                          >
                          <input
                            v-model="form.user_name"
                            class="form-control px-3 fw-bold text-black"
                            :placeholder="__('Please Enter')"
                            type="text"
                          />
                          <div class="text-danger" v-if="form.errors.user_name">
                            {{ form.errors.user_name }}
                          </div>
                        </div>

                        <div class="form-group mb-3">
                          <label for="user_name"
                            >{{ __("Father Name")
                            }}<span class="text-danger">*</span></label
                          >
                          <input
                            class="form-control px-3 fw-bold text-black"
                            :placeholder="__('Please Enter')"
                            v-model="form.father_name"
                            type="text"
                          />
                          <div class="text-danger" v-if="form.errors.father_name">
                            {{ form.errors.father_name }}
                          </div>
                        </div>
                        <div class="form-group mb-3">
                          <label for="user_name"
                            >{{ __("blood group")
                            }}<span class="text-danger">*</span></label
                          >
                          <input
                            class="form-control px-3 fw-bold text-black"
                            :placeholder="__('Please Enter')"
                            v-model="form.blood_group"
                            type="text"
                          />
                          <div class="text-danger" v-if="form.errors.blood_group">
                            {{ form.errors.blood_group }}
                          </div>
                        </div>
                        <div class="form-group mb-3">
                          <label for="user_name"
                            >{{ __("gender") }}<span class="text-danger">*</span></label
                          >
                          <select
                            v-model="form.gender"
                            class="form-select"
                            aria-label="Default select example"
                          >
                            <option value="" disabled selected>
                              {{ __("Select gender") }}
                            </option>
                            <!-- Placeholder option -->
                            <option value="male">{{ __("male") }}</option>
                            <option value="female">{{ __("female") }}</option>
                          </select>
                          <div class="text-danger" v-if="form.errors.gender">
                            {{ form.errors.gender }}
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer border-0 pt-0">
                        <button
                          type="button"
                          class="btn btn-secondary"
                          id="close"
                          data-bs-dismiss="modal"
                        >
                          {{ __("close") }}
                        </button>
                        <button
                          type="button"
                          @click="submit('personal_info')"
                          class="btn btn-primary"
                        >
                          {{ __("save") }}
                        </button>
                      </div>
                    </div>
                  </Modal>
                </div>
                <div class="row mt-3 p-3 ms-md-1">
                  <div class="col-md-4">
                    <div class="form-group mb-3">
                      <label
                        class="text-black opacity-50 ms-3 fs-3 fw-normal"
                        for="first_name"
                        >{{ __("first name") }}</label
                      >
                      <input
                        v-model="form.first_name"
                        class="w-100 form-control bg-transparent shadow-none rounded-3 px-3 py-1 fs-3 fw-bold text-black"
                        :placeholder="__('Please Enter')"
                        disabled
                        type="text"
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-3">
                      <label
                        class="text-black opacity-50 ms-3 fs-3 fw-normal"
                        for="last_name"
                        >{{ __("last name") }}</label
                      >
                      <input
                        v-model="form.last_name"
                        class="w-100 form-control bg-transparent shadow-none rounded-3 px-3 py-1 fs-3 fw-bold text-black"
                        :placeholder="__('Please Enter')"
                        disabled
                        type="text"
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-3">
                      <label
                        class="text-black opacity-50 ms-3 fs-3 fw-normal"
                        disabled
                        for="user_name"
                        >{{ __("username") }}</label
                      >
                      <input
                        v-model="form.user_name"
                        class="w-100 form-control bg-transparent shadow-none rounded-3 px-3 py-1 fs-3 fw-bold text-black"
                        disabled
                        :placeholder="__('Please Enter')"
                        type="text"
                      />
                    </div>
                  </div>
                  <!-- <div class="col-md-4">
                    <div class="form-group mb-3">
                      <label
                        class="text-black opacity-50 ms-3 fs-3 fw-normal"
                        for="user_name"
                        >{{ __("email") }}</label
                      >
                      <input
                        class="w-100 form-control bg-transparent shadow-none rounded-3 px-3 py-1 fs-3 fw-bold text-black"
                        :placeholder="__('Please Enter')"
                        v-model="form.email"
                        disabled
                        type="email"
                      />
                    </div>
                  </div> -->
                  <div class="col-md-4">
                    <div class="form-group mb-3">
                      <label
                        class="text-black opacity-50 ms-3 fs-3 fw-normal"
                        for="user_name"
                        >{{ __("Father Name") }}</label
                      >
                      <input
                        class="w-100 form-control bg-transparent shadow-none rounded-3 px-3 py-1 fs-3 fw-bold text-black"
                        v-model="form.father_name"
                        disabled
                        type="text"
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-3">
                      <label
                        class="text-black opacity-50 ms-3 fs-3 fw-normal"
                        for="user_name"
                        >{{ __("Date of Birth") }}</label
                      >
                      <input
                        class="w-100 form-control bg-transparent shadow-none rounded-3 px-3 py-1 fs-3 fw-bold text-black"
                        v-model="form.dob"
                        disabled
                        type="text"
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-3">
                      <label
                        class="text-black opacity-50 ms-3 fs-3 fw-normal"
                        for="user_name"
                        >{{ __("blood group") }}</label
                      >
                      <input
                        class="w-100 form-control bg-transparent shadow-none rounded-3 px-3 py-1 fs-3 fw-bold text-black"
                        v-model="form.blood_group"
                        disabled
                        type="text"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow w-100 group-address mb-4">
              <div class="card-body p-0">
                <div
                  class="d-flex justify-content-between align-items-center p-2 border-bottom border-primary pb-3 px-3 mt-3"
                >
                  <h3 class="fw-bold mb-0 fs-3 ms-md-4">{{ __("address") }}</h3>

                  <button
                    type="button"
                    class="btn btn-primary fs-3 me-md-3 rounded-4 shadow px-3 py-2 fw-bold d-flex justify-content-center align-items-center"
                    data-bs-toggle="modal"
                    data-bs-target="#addressModel"
                  >
                    <img class="me-2" src="@/images/icons/pen.svg" alt="" />
                    {{ __("Edit") }}
                  </button>
                  <Modal
                    :id="'addressModel'"
                    tabindex="-1"
                    :aria-labelledby="'addressModelLabel'"
                  >
                    <div class="modal-content" style="border-radius: 20px">
                      <div class="modal-header p-4">
                        <h5 class="modal-title" :id="'addressModelLabel'">
                          {{ __("address") }}
                        </h5>
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                        ></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group mb-3">
                              <label for="country">{{ __("country") }}</label>

                              <select
                                v-model="form.country_id"
                                @change="getStates()"
                                class="form-select fw-bold text-black"
                                aria-label="country"
                              >
                                <option value="null" selected>
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
                          <div class="col-md-4">
                            <div class="form-group mb-3">
                              <label for="state">{{ __("state") }}</label>

                              <select
                                v-model="form.state_id"
                                @change="getCities()"
                                class="form-select fw-bold text-black"
                                aria-label="state"
                              >
                                <option value="null" selected>
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
                          <div class="col-md-4">
                            <div class="form-group mb-3">
                              <label for="city">{{ __("city") }}</label>
                              <select
                                v-model="form.city_id"
                                class="form-select"
                                aria-label="city"
                              >
                                <option value="null" selected>
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
                          <div class="col-md-4">
                            <div class="form-group mb-3">
                              <label for="zip_code">{{ __("Postal Code") }}</label>
                              <input
                                v-model="form.zip_code"
                                class="form-control px-3 fw-bold text-black"
                                :placeholder="__('Please Enter')"
                                type="number"
                              />
                            </div>
                          </div>

                          <div class="form-group mb-3">
                            <label for="address"
                              >{{ __("address line") }} 1<span class="text-danger"
                                >*</span
                              ></label
                            >
                            <textarea
                              v-model="form.address_line_1"
                              class="form-control px-3 fw-bold text-black"
                              :placeholder="__('Please Enter')"
                              type="text"
                            ></textarea>
                            <div class="text-danger" v-if="form.errors.address_line_1">
                              {{ form.errors.address_line_1 }}
                            </div>
                          </div>

                          <div class="form-group mb-3">
                            <label for="address"
                              >{{ __("address line") }} 2<span class="text-danger"
                                >*</span
                              ></label
                            >
                            <textarea
                              v-model="form.address_line_2"
                              class="form-control px-3 fw-bold text-black"
                              :placeholder="__('Please Enter')"
                              type="text"
                            ></textarea>
                            <div class="text-danger" v-if="form.errors.address_line_2">
                              {{ form.errors.address_line_2 }}
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer border-0 pt-0">
                        <button
                          type="button"
                          class="btn btn-secondary"
                          data-bs-dismiss="modal"
                          id="address_close"
                        >
                          {{ __("close") }}
                        </button>
                        <button
                          type="button"
                          @click="submit('address')"
                          class="btn btn-primary"
                        >
                          {{ __("save") }}
                        </button>
                      </div>
                    </div>
                  </Modal>
                </div>
                <div class="row mt-3 p-3 ms-md-1">
                  <div class="col-md-4">
                    <div class="form-group mb-3">
                      <label
                        class="text-black opacity-50 ms-2 fs-3 fw-normal"
                        for="country"
                        >{{ __("country") }}</label
                      >

                      <select
                        v-model="form.country_id"
                        @change="getStates()"
                        class="form-select bg-transparent rounded-3 fs-3 fw-bold text-black"
                        aria-label="country"
                        disabled
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
                  <div class="col-md-4">
                    <div class="form-group mb-3">
                      <label
                        class="text-black opacity-50 ms-2 fs-3 fw-normal"
                        for="state"
                        >{{ __("state") }}</label
                      >
                      <select
                        v-model="form.state_id"
                        @change="getCities()"
                        disabled
                        class="form-select bg-transparent rounded-3 fs-3 fw-bold text-black"
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
                  <div class="col-md-4">
                    <div class="form-group mb-3">
                      <label
                        class="text-black opacity-50 ms-2 fs-3 fw-normal"
                        for="city"
                        >{{ __("city") }}</label
                      >
                      <select
                        v-model="form.city_id"
                        disabled
                        class="form-select bg-transparent rounded-3 fs-3 fw-bold text-black"
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
                  <div class="col-md-4">
                    <div class="form-group mb-3">
                      <label
                        class="text-black opacity-50 ms-3 fs-3 fw-normal"
                        for="zip_code"
                        >{{ __("Postal Code") }}</label
                      >
                      <input
                        v-model="form.zip_code"
                        class="w-100 form-control bg-transparent shadow-none rounded-3 px-3 fs-3 fw-bold text-black"
                        disabled
                        :placeholder="__('Please Enter')"
                        type="number"
                      />
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group mb-3">
                      <label
                        class="text-black opacity-50 ms-3 fs-3 fw-normal"
                        for="address"
                        >{{ __("address line") }} 1</label
                      >
                      <textarea
                        v-model="form.address_line_1"
                        class="w-100 form-control bg-transparent shadow-none rounded-3 px-3 fs-3 fw-bold text-black"
                        disabled
                        :placeholder="__('Please Enter')"
                        type="text"
                      ></textarea>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mb-3">
                      <label
                        class="text-black opacity-50 ms-3 fs-3 fw-normal"
                        for="address"
                        >{{ __("address line") }} 2</label
                      >
                      <textarea
                        v-model="form.address_line_2"
                        class="w-100 form-control bg-transparent shadow-none rounded-3 px-3 fs-3 fw-bold text-black"
                        disabled
                        :placeholder="__('Please Enter')"
                        type="text"
                      ></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="card shadow w-100 group-address mb-4">
              <div class="card-body p-0">
                <div
                  class="d-flex justify-content-between align-items-center p-2 border-bottom border-primary pb-3 px-3 mt-3"
                >
                  <h3 class="fw-bold mb-0 fs-3 ms-md-4">
                    {{ __("Security") }}
                  </h3>

                  <button
                    type="button"
                    class="btn btn-primary fs-3 me-md-3 rounded-4 shadow px-3 py-2 fw-bold d-flex justify-content-center align-items-center"
                    data-bs-toggle="modal"
                    data-bs-target="#securityModel"
                  >
                    <img class="me-2" src="@/images/icons/pen.svg" alt="" />
                    {{ __("Edit") }}
                  </button>
                  <Modal
                    :id="'securityModel'"
                    tabindex="-1"
                    :aria-labelledby="'securityModelLabel'"
                  >
                    <div class="modal-content" style="border-radius: 20px">
                      <div class="modal-header p-4">
                        <h5 class="modal-title" :id="'securityModelLabel'">
                          {{ __("Security") }}
                        </h5>
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                        ></button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group mb-3">
                          <label
                            class="text-black opacity-50 ms-2 fs-3 fw-normal"
                            for="address"
                            >{{ __("Current Password") }}</label
                          >
                          <input
                            class="form-control px-2 fw-bold text-black"
                            :placeholder="__('*******')"
                            type="password"
                          />
                        </div>
                        <div class="form-group mb-3">
                          <label
                            class="text-black opacity-50 ms-2 fs-3 fw-normal"
                            for="address"
                            >{{ __("New Password") }}</label
                          >
                          <input
                            class="form-control px-2 fw-bold text-black"
                            :placeholder="__('*******')"
                            type="password"
                          />
                        </div>
                      </div>
                      <div class="modal-footer border-0 pt-0">
                        <button
                          type="button"
                          class="btn btn-secondary"
                          id="close"
                          data-bs-dismiss="modal"
                        >
                          {{ __("close") }}
                        </button>
                        <button
                          type="button"
                          @click="submit()"
                          data-bs-dismiss="modal"
                          class="btn btn-primary"
                        >
                          {{ __("save") }}
                        </button>
                      </div>
                    </div>
                  </Modal>
                </div>
                <div class="row mt-3 p-3 ms-md-1">
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label
                        class="text-black opacity-50 ms-2 fs-3 fw-normal"
                        for="address"
                        >{{ __("Current Password") }}</label
                      >
                      <input
                        class="w-100 form-control bg-transparent shadow-none rounded-3 px-2 py-1 fs-3 fw-bold text-black"
                        disabled
                        :placeholder="__('*******')"
                        type="password"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label
                        class="text-black opacity-50 ms-2 fs-3 fw-normal"
                        for="address"
                        >{{ __("New Password") }}</label
                      >
                      <input
                        class="w-100 form-control bg-transparent shadow-none rounded-3 px-2 py-1 fs-3 fw-bold text-black"
                        disabled
                        :placeholder="__('*******')"
                        type="password"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- <div class="row align-items-center">
              <div class="col-md-12 d-flex justify-content-end mt-4">
                <button
                  type="submit"
                  :disabled="form.processing"
                  class="btn btn-primary shadow-find fs-2 fw-bold rounded-4 px-4 py-2"
                >
                  <SpinnerLoader v-if="form.processing" />
                  {{ __("update") }}
                  <img class="ms-4 mb-1" src="@/images/icons/up.svg" alt="" width="30" />
                </button>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </form>
  </div>

  <!-- <div class="tab-pane" :class="{ active: active }" id="general-info" role="tabpanel" aria-labelledby="genetal-info-tab"
    tabindex="0">
    <form @submit.prevent="submit" class="profileForm">
     <div class="card bg-transparent border border-secondary p-3">
        <div class="card-body">
            <div class="row">
        <div class="col-12 position-relative">
            <label for="doctor-cover-image" style="position: absolute; right: 20px; top: 10px; ">
                <div class="icon z-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                    style="cursor: pointer; width: 40px; height: 40px;">
                    <i class="bi bi-pencil-fill"></i>
                </div>

                <ImageCropperModal :show="showCoverImportModal" id="coverImageCropModal"
                    :image_url="cover_image_url" @cropImage="cropCoverImage" aspectRatio="2/1">
                </ImageCropperModal>
            </label>
            <div class="cover-header rounded-2" v-if="!form.cover_image && !$page.props.patient.cover_image">
            </div>
            <div class="cover-header rounded-2">
                <img v-if="form.cover_image"  class="img-fluid" :src="form.cover_image" style="width: 100%; height: 290px;"  alt="logo">
                <img v-if="!form.cover_image && $page.props.patient.cover_image" style="width: 100%; height: 290px;"  class="img-fluid"
                    :src="$page.props.patient.cover_image" alt="logo">
                <img v-if="!form.cover_image && !$page.props.patient.cover_image" style="width: 100%; height: 290px;" class="img-fluid"
                    src="@/images/common/bg_profile.jpg" alt="logo">
            </div>
            <div v-if="form.cover_image" class="cover-header rounded-2"
                v-bind:style="{ 'background-image': 'url(' + form.cover_image + ')' }"></div>
            <div class="cover-header rounded-2" v-if="!form.cover_image && $page.props.patient.cover_image"
                v-bind:style="{ 'background-image': 'url(' + $page.props.patient.cover_image + ')' }"></div>
        </div>
            <div class="col-md-3">

                    <label for="doctor-image">
                        <label for="image" class="mb-3">{{ __('select') }} {{ __('image') }}</label>
                        <div class="profile-image mx-4  shadow rounded-3 overflow-hidden position-relative" style="background-color:#E4E4E4 ; bottom: 90px;">
                            <div class="icon position-absolute z-3 m-2 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                style="cursor:pointer;width: 40px; height: 40px;">
                                <i class="bi bi-pencil-fill "></i>
                            </div>
                            <img v-if="form.image" class="img-fluid" :src="form.image" alt="logo">
                            <img v-if="!form.image && $page.props.patient.image" class="img-fluid"
                                :src="$page.props.patient.image" alt="logo">
                            <img v-if="!form.image && !$page.props.patient.image" class="img-fluid"
                                src="@/images/account/default_avatar_men.png" alt="logo">
                        </div>
                        <button data-bs-toggle="modal" id="ImageCropperModalButton" data-bs-target="#imageCropModal"
                            style="display:none"></button>
                        <ImageCropperModal :show="showImportModal" id="imageCropModal" :image_url="image_url" @cropImage="cropImage">
                        </ImageCropperModal>
                    </label>
                    <input id="doctor-image" style="display:none" @change="onFileChange" type="file" />
                    <input id="doctor-cover-image" style="display: none" @change="onFileChangeCover" type="file" />


            </div>

        <div class="col-md-12">
          <validation-errors></validation-errors>
          <validation-errors class="mb-3" />

          <div class="col-12">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="mb-2 label-text" for="user_name">{{ __('username') }}</label>
                    <input v-model="form.user_name"
                        class="w-100 form-control auth-input rounded-3 px-3 fs-5"
                        :placeholder="__('Please Enter') " type="text" />
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="label-text mb-2" for="first_name">{{ __('first name') }}</label>
                    <input v-model="form.first_name"
                        class="w-100 form-control auth-input rounded-3 px-3 fs-5"
                        :placeholder="__('Please Enter') " type="text" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="label-text mb-2" for="last_name">{{ __('last name') }}</label>
                    <input v-model="form.last_name"
                        class="w-100 form-control auth-input rounded-3 px-3 fs-5"
                        :placeholder="__('Please Enter') " type="text" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="label-text mb-2" for="country">{{ __('select') }} {{ __('country') }}</label>
                    <select v-model="form.country_id" @change="getStates()" class="form-select rounded-3 fs-5"
                        aria-label="country">
                        <option value="null" selected disabled>{{ __('country') }}</option>
                        <option v-for="country in this.countries" :key="country.id" :value="country.id">
                            {{ country.name }}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="label-text mb-2" for="address">{{ __('address line') }} 1</label>
                    <textarea v-model="form.address_line_1"
                        class="w-100 form-control auth-input px-3 rounded-3 fs-5"
                        :placeholder="__('Please Enter') " type="text"></textarea>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="label-text mb-2" for="address">{{ __('address line') }} 2</label>
                    <textarea v-model="form.address_line_2"
                        class="w-100 form-control auth-input px-3 rounded-3 fs-5"
                        :placeholder="__('Please Enter') " type="text"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="label-text mb-2" for="state">{{ __('select') }} {{ __('state') }}</label>
                    <select v-model="form.state_id" @change="getCities()" class="form-select rounded-3 fs-5"
                        aria-label="state">
                        <option value="null" selected disabled>{{ __('state') }}</option>
                        <option v-for="state in this.states" :key="state.id" :value="state.id">{{
                            state.name
                        }}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="label-text mb-2" for="city">{{ __('select') }} {{ __('city') }}</label>
                    <select v-model="form.city_id" class="form-select rounded-3 fs-5" aria-label="city">
                        <option value="null" selected disabled>{{ __('city') }}</option>
                        <option v-for="city in this.cities" :key="city.id" :value="city.id">{{
                            city.name
                        }}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="label-text mb-2" for="zip_code">{{ __('zip code') }}</label>
                    <input v-model="form.zip_code"
                        class="w-100 form-control auth-input px-3 rounded-3 fs-5"
                        :placeholder="__('Please Enter') " type="text" />
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group mb-3">
                    <label class="label-text mb-2" for="description">{{ __('description') }}</label>
                    <textarea v-model="form.description"
                        class="w-100 form-control auth-input px-3 rounded-3 fs-5"
                        :placeholder="__('Please Enter') " type="text" rows="6"></textarea>
                </div>
            </div>
            </div>

            <div class="row align-items-center">
              <div class="col-md-12 d-flex justify-content-end">
                <button type="submit" :disabled="form.processing" class="submit btn btn-primary">
                  <SpinnerLoader v-if="form.processing" />
                    {{ __('Update Profile') }}
                </button>
              </div>
            </div>
          </div>

        </div>

      </div>
        </div>
     </div>
    </form>
  </div> -->
</template>
<script>
import { defineComponent } from "vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import ImageCropperModal from "@/Components//Shared/ImageCropperModal.vue";
import SpinnerLoader from "@/Components/Shared/SpinnerLoader.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import axios from "axios";
import Modal from "../Modal.vue";

export default defineComponent({
  components: {
    Head,
    ValidationErrors,
    SpinnerLoader,
    ImageCropperModal,
    Link,
    Modal,
  },
  props: ["active"],

  data() {
    return {
      modal: null,
      form: this.$inertia.form({
        country_id: this.$page.props.patient.country_id,
        state_id: this.$page.props.patient.state_id,
        city_id: this.$page.props.patient.city_id,
        first_name: this.$page.props.patient.first_name,
        last_name: this.$page.props.patient.last_name,
        user_name: this.$page.props.patient.user_name,
        father_name: this.$page.props.patient.father_name,
        description: this.$page.props.patient.description,
        address_line_1: this.$page.props.patient.address_line_1,
        address_line_2: this.$page.props.patient.address_line_2,
        zip_code: this.$page.props.patient.zip_code,
        type: null,
        icon: null,
        image: null,
        cover_image: null,
        blood_group: this.$page.props.patient.blood_group,
        gender: this.$page.props.patient.gender,
        dob: this.$page.props.patient.dob,
        username: this.$page.props.patient.username,
        email: this.$page.props.auth.user.email,
      }),

      errors: {
        first_name: null,
        last_name: null,
        user_name: null,
        father_name: null,
        blood_group: null,
        gender: null,
        dob: null,
      },
      showImportModal: false,
      image_url: null,
      cover_image: null,
      cover_image_url: null,
      croppedImageSrc: null,
      showCoverImportModal: false,
      croppedCoverImageSrc: null,
      countries: this.$page.props.countries,
      states: this.$page.props.states,
      cities: this.$page.props.cities,
      activeTab: 0,
    };
  },

  methods: {
    triggerAboutField() {
      this.$refs.aboutText.focus();
    },
    triggerFileInput() {
      this.$refs.fileInput.click();
    },
    onFileChange(e) {
      this.image_url = null;
      const file = e.target.files[0];
      this.image_url = URL.createObjectURL(file);
      this.croppedImageSrc = null;
      this.showImportModal = true;
    },
    onFileChangeCover(e) {
      this.cover_image_url = null;
      const file = e.target.files[0];
      this.cover_image_url = URL.createObjectURL(file);
      this.croppedCoverImageSrc = null;
      this.showCoverImportModal = true;
    },

    cropImage(image) {
      this.croppedImageSrc = image;
      this.form.image = image;
      this.image_url = null;
      this.showImportModal = false;
      this.submit();
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
    submit(type) {
      this.form.type = null;
      if (type) {
        this.form.type = type;
      }

      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("patients.update_general_info"), {
          onSuccess: () => {
            this.form.type = null;
            document.getElementById("close").click();
            document.getElementById("address_close").click();
            document.getElementById("descriptionSave").click();
            // const addressModal = new bootstrap.Modal(
            //   document.getElementById("addressModel")
            // );
            // addressModal.hide();
            // const generalInfoModal = new bootstrap.Modal(
            //   document.getElementById("personalInformationModel")
            // );
            // generalInfoModal.hide();
          },
        });
    },
  },
});
</script>
