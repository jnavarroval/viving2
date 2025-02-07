<template>
  <guest-layout>
    <div
      class="container-fluid px-0 d-flex flex-column justify-content-md-center justify-content-start"
      style="height: 100vh"
    >
      <div class="row">
        <div class="col-md-6">
          <img
            class="login-image"
            src="@/images/common/login.png"
            alt="Image"
          />
        </div>
        <div class="col-md-6">
          <div class="py-md-5 px-4 px-md-0">
            <span class="d-flex justify-content-center mt-2">
              <Link :href="route('home')">
                <img
                  src="@/images/icons/healthconsultant.png"
                  class="mb-4"
                  alt=""
                  style="width: 250px"
                />
              </Link>
            </span>

            <h1 class="text-center text-primary fw-bold display-6 mb-4">
              {{ __("Reset your password") }}
            </h1>
            <form @submit.prevent="submit">
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="mb-4">
                    <input
                      class="form-control border rounded-4"
                      :class="{ 'is-invalid': form.errors.password }"
                      type="password"
                      v-model="form.password"
                      placeholder="••••••••••"
                      required
                    />
                    <div v-if="form.errors.password" class="invalid-feedback">
                      <span>{{ form.errors.password }}</span>
                    </div>
                  </div>
                  <div class="mb-4">
                    <input
                      class="form-control border rounded-4"
                      :class="{
                        'is-invalid': form.errors.password_confirmation,
                      }"
                      type="password"
                      v-model="form.password_confirmation"
                      placeholder="••••••••••"
                      required
                    />
                    <div
                      v-if="form.errors.password_confirmation"
                      class="invalid-feedback"
                    >
                      <span>{{ form.errors.password_confirmation }}</span>
                    </div>
                  </div>

                  <div
                    v-if="form.errors.token"
                    class="text-danger mb-3 text-center"
                  >
                    <span>{{ form.errors.token }}</span>
                  </div>

                  <div class="d-grid gap-2 mb-4">
                    <button
                      class="submit shadow-find fs-3 fw-bold btn btn-primary rounded-4"
                      :class="{ 'text-white-50': form.processing }"
                      :disabled="form.processing"
                    >
                      <SpinnerLoader v-if="form.processing" />
                      {{ __("update") }}

                      <img
                        src="@/images/icons/loginbtnicon.png"
                        width="25"
                        class="ms-3"
                        alt=""
                      />
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="section login py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div>
              <div v-if="getPageContentType('reset_password_page') == 'textarea'">
                                    <div v-html="getPageContent('reset_password_page')"> </div>
                            </div>
                                <div v-else-if="getPageContentType('reset_password_page') == 'text'">
                                        <p> {{getPageContent('reset_password_page') ?? '-'}} </p>
                                </div>
              <div v-else>
                <p class="fs-3 mb-0 text-white">
                Welcome to |
                <span class="text-primary">Law Consulting</span>
              </p>

              <p
                class="mb-0 text-muted"
              >Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi sequi ex velit. Hic ut numquam blanditiis est sunt ullam tenetur aspernatur facilis inventore, quaerat id eaque ipsum voluptas adipisci esse!</p>
              </div>
              <div class="text-white py-5">
                <h1 class="fw-bold display-1 mb-4 text-capitalize">Reset Password ?</h1>
                <p>Please enter new password.</p>
                <div v-if="status" class="alert alert-success" role="alert">{{ status }}</div>

                <form @submit.prevent="submit">
                  <validation-errors class="mb-2" />
                  <div class="col-12">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group mb-4">
                          <div class="form-floating">
                            <input
                              id="password"
                              type="password"
                              placeholder="Password"
                              class="form-control border border-primary"
                              v-model="form.password"
                              required
                              autofocus
                            />
                            <label for="password" class="text-muted">{{ __('Password') }}</label>
                          </div>
                        </div>

                        <div class="form-group mb-4">
                            <div class="form-floating">
                                <input
                                id="password"
                                type="password"
                                placeholder="Confirm Password"
                                class="form-control border border-primary"
                                v-model="form.password_confirmation"
                                required
                              />

                              <label for="password" class="text-muted">{{ __('Confirm Password') }}</label>
                            </div>
                          </div>
                      </div>
                    </div>

                    <div class="row align-items-center">
                      <div class="col-md-5">

                            <button
                              :class=" { 'text-white-50': form.processing }"
                              class=" submit btn btn-primary"
                              :disabled="form.processing"
                            >
                              <div
                                v-show="form.processing"
                                class="spinner-border spinner-border-sm"
                                role="status"
                              >
                                <div
                                  v-show="form.processing"
                                  class="spinner-border spinner-border-sm"
                                  role="status"
                                >
                                  <span class="visually-hidden">Loading...</span>
                                </div>
                              </div>Reset
                            </button>

                      </div>
                      <div class="col-md-7 text-end">
                        <Link :href="route('login')">{{ __('return to login') }}</Link>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <div class="card-body form-section pe-md-5"></div>
          </div>

          <div class="col-md-6">
            <Carousel
              ref="carousel"
              v-model="currentSlide"
              :settings="settings"
              :breakpoints="breakpoints"
            >
              <Slide v-for="slide in 4" :key="slide">
                <div class="carousel__item">
                  <img src="@/images/home/slider-img.png" alt class="img-fluid" />
                </div>
              </Slide>

              <template #addons>
                <Pagination />
              </template>
            </Carousel>
          </div>
        </div>
      </div>
    </div> -->
  </guest-layout>
</template>

<script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
export default defineComponent({
  components: {
    Head,
    Button,
    Input,
    Label,
    AppLayout,
    GuestLayout,
    ValidationErrors,
    Link,
  },

  props: {
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        password: "",
        password_confirmation: "",
      }),
    };
  },

  methods: {
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          token: this.route().params.token,
        }))
        .post(this.route("password.reset"));
    },
  },
  mounted() {},
});
</script>
