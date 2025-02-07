<template>
  <div
    class="tab-pane active"
    id="patient-register-pane"
    role="tabpanel"
    aria-labelledby="patient-register-pane"
    tabindex="0"
  >
    <div
      class="tab-pane active"
      id="patient-register-pane"
      role="tabpanel"
      aria-labelledby="patient-register-pane"
      tabindex="0"
    >
      <div class="col-12">
        <div class="row">
          <form @submit.prevent="submit" class="loginForm">
            <validation-errors class="mb-3" />
            <div
              v-if="this.errors.first_name"
              class="error-validation text-end px-md-5"
            >
              <span>{{ this.errors.first_name }}</span>
            </div>

            <div class="form-group px-5 mb-4">
              <div class="border border-3 w-100 rounded-3">
                <div class="form-floating">
                  <input
                    id="first_name"
                    class="form-control ps-4"
                    :placeholder="__('first name')"
                    type="text"
                    v-model="form.first_name"
                  />
                  <label class="text-muted ps-4" for="floatingInput">{{
                    __("first name")
                  }}</label>
                </div>
              </div>
            </div>

            <div
              v-if="this.errors.last_name"
              class="error-validation text-end px-md-5"
            >
              <span>{{ this.errors.last_name }}</span>
            </div>
            <div class="form-group px-5 mb-4">
              <div class="border border-3 rounded-3 w-100">
                <div class="form-floating">
                  <input
                    id="last_name"
                    class="form-control ps-4"
                    :placeholder="__('last name')"
                    type="text"
                    v-model="form.last_name"
                  />
                  <label class="text-muted ps-4" for="floatingInput">{{
                    __("last name")
                  }}</label>
                </div>
              </div>
            </div>

            <div
              v-if="this.errors.email"
              class="error-validation text-danger text-end px-md-5"
            >
              <span>{{ this.errors.email }}</span>
            </div>
            <div class="input-group px-5 mb-4">
              <div class="border border-3 w-100 rounded-3">
                <div class="form-floating d-flex align-items-center">
                  <input
                    id="email"
                    class="form-control ps-4bg-transparent"
                    :placeholder="__('email address')"
                    type="email"
                    v-model="form.email"
                  />
                  <label class="text-muted ps-4" for="floatingInput">{{
                    __("email address")
                  }}</label>
                  <span
                    class="input-group-text ps-4 bg-transparent"
                    id="basic-addon2"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="25"
                      height="25"
                      fill="black"
                      class="bi bi-envelope me-3"
                      viewBox="0 0 16 16"
                    >
                      <path
                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"
                      />
                    </svg>
                  </span>
                </div>
              </div>
            </div>

            <div
              v-if="this.errors.user_name"
              class="error-validation text-danger text-end px-md-5"
            >
              <span>{{ this.errors.user_name }}</span>
            </div>
            <div class="input-group px-5 mb-4">
              <div class="border border-3 rounded-3 w-100">
                <div class="form-floating d-flex align-items-center">
                  <input
                    id="user_name"
                    class="form-control ps-4"
                    :placeholder="__('user name')"
                    type="text"
                    v-model="form.user_name"
                  />
                  <label class="text-muted ps-4" for="floatingInput">{{
                    __("user name")
                  }}</label>
                  <span
                    class="input-group-text ps-4 bg-transparent"
                    id="basic-addon2"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="25"
                      height="25"
                      fill="black"
                      class="bi bi-person me-3"
                      viewBox="0 0 16 16"
                    >
                      <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"
                      />
                    </svg>
                  </span>
                </div>
              </div>
            </div>

            <div
              v-if="this.errors.password"
              class="error-validation text-danger text-end px-md-5"
            >
              <span>{{ this.errors.password }}</span>
            </div>
            <div class="input-group px-5 mb-4">
              <div class="border border-3 w-100 rounded-3">
                <div class="form-floating d-flex align-items-center">
                  <input
                    id="password"
                    class="form-control ps-4"
                    placeholder="••••••••••"
                    type="password"
                    v-model="form.password"
                  />
                  <label class="text-muted ps-4" for="floatingInput">{{
                    __("password")
                  }}</label>
                  <span
                    class="input-group-text ps-4 bg-transparent"
                    id="basic-addon2"
                  >
                    <img
                      class="me-3"
                      src="@/images/icons/Chield_alt.png"
                      width="25"
                      alt=""
                    />
                  </span>
                </div>
              </div>
            </div>

            <div
              v-if="this.errors.password_confirmation"
              class="error-validation text-danger text-end px-md-5"
            >
              <span>{{ this.errors.password_confirmation }}</span>
            </div>
            <div class="input- px-5 mb-4">
              <div class="border border-3 w-100 rounded-3">
                <div class="form-floating d-flex align-items-center">
                  <input
                    id="password_confirmation"
                    class="form-control ps-4 bg-transparent"
                    :placeholder="__('confirm password')"
                    type="password"
                    v-model="form.password_confirmation"
                  />
                  <label class="text-muted ps-4" for="floatingInput">{{
                    __("confirm password")
                  }}</label>
                  <span
                    class="input-group-text ps-4 bg-transparent"
                    id="basic-addon2"
                  >
                    <img
                      class="me-3"
                      src="@/images/icons/Chield_alt.png"
                      width="25"
                      alt=""
                    />
                  </span>
                </div>
              </div>
            </div>

            <div class="mb-3 px-md-5">
              <div v-if="this.errors.terms" class="invalid-feedback">
                <span>{{ this.errors.terms }}</span>
              </div>
              <div class="form-check d-flex justify-content-center my-4">
                <input
                  v-model="form.terms"
                  class="form-check-input me-2"
                  type="checkbox"
                  value=""
                  id="termsBoxRegister"
                  :class="{ 'is-invalid': form.errors.terms }"
                />
                <label class="form-check-label" for="termsBoxRegister">
                  {{ __("terms changes") }}
                  <a
                    :href="route('company_pages.display', { slug: 'terms' })"
                    target="_blank"
                    >{{ __("Terms of Use & Conditions") }}</a
                  >
                  {{ __("and the") }}
                  <a
                    :href="route('company_pages.display', { slug: 'privacy' })"
                    target="_blank"
                    >{{ __("privacy policy") }}</a
                  >
                </label>
              </div>
            </div>

            <div class="d-grid px-5 gap-2 mb-3">
              <button
                class="submit btn w-100 fs-2 fw-bold rounded-4 shadow-find btn-primary"
                :class="{ 'text-white-50': form.processing }"
                :disabled="form.processing"
              >
                <SpinnerLoader v-if="form.processing" />
                {{ __("register") }}
                <img
                  src="@/images/icons/loginbtnicon.png"
                  class="ms-2"
                  width="30"
                  alt=""
                />
              </button>
            </div>
            <div class="col-md-12 text-center my-3">
              <p class="mb-0 fs-3 fw-normal">
                {{ __("if you have already account") }}?
                <Link
                  :href="route('login', { tab: 'patient' })"
                  class="link fw-bold"
                  >{{ __("login") }}</Link
                >
              </p>
            </div>
          </form>
          <hr class="mt-4" />
          <div class="col-md-12">
            <div class="text-center">
              <p class="fw-normal my-5 text-muted fs-3">
                {{ __("Login with social media accounts") }}
              </p>
              <div
                class="d-flex align-items-center gap-3 justify-content-center"
              >
                <a
                  :href="
                    route('social_redirect', {
                      provider: 'google',
                      login_as: this.form.login_as,
                    })
                  "
                >
                  <span class="icon"
                    ><img src="@/images/icons/google.png" alt=""
                  /></span>
                </a>
                <a
                  :href="
                    route('social_redirect', {
                      provider: 'facebook',
                      login_as: this.form.login_as,
                    })
                  "
                >
                  <span class="icon"
                    ><img src="@/images/icons/facebook.png" alt=""
                  /></span>
                </a>
                <a
                  :href="
                    route('social_redirect', {
                      provider: 'twitter',
                      login_as: this.form.login_as,
                    })
                  "
                >
                  <span class="icon"
                    ><img src="@/images/icons/twitter.png" alt=""
                  /></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<!-- <div class="col-lg-6 mb-2 mb-md-0">
              <input type="text" class="form-control rounded-3 px-3 shadow-sm auth-input" :placeholder="__('first name')" v-model="form.first_name"
                :class="{ 'is-invalid': form.errors.first_name }" required />
              <div v-if="form.errors.first_name" class="invalid-feedback">
                <span>{{ form.errors.first_name }}</span>
              </div>
            </div>
            <div class="col-lg-6">
              <input type="text" class="form-control rounded-3 px-3 shadow-sm auth-input" :placeholder="__('last name')" v-model="form.last_name"
                :class="{ 'is-invalid': form.errors.last_name }" required />
              <div v-if="form.errors.last_name" class="invalid-feedback">
                <span>{{ form.errors.last_name }}</span>
              </div>
            </div>

            <div class="row mb-2 mb-md-4">
                <div class="col-lg-6 mb-2 mb-md-0">
              <input type="text" class="form-control rounded-3 px-3 shadow-sm auth-input" :placeholder="__('user name')" v-model="form.user_name"
                :class="{ 'is-invalid': form.errors.user_name }" required />
              <div v-if="form.errors.user_name" class="invalid-feedback">
                <span>{{ form.errors.user_name }}</span>
              </div>
            </div>

            </div>
           <div class="row mb-2 mb-md-4">
            <div class="col-lg-6 mb-2 mb-md-0">
              <input type="password" class="form-control rounded-3 px-3 shadow-sm auth-input" placeholder="••••••••••" v-model="form.password"
                :class="{ 'is-invalid': form.errors.password }" required />
              <div v-if="form.errors.password" class="invalid-feedback">
                <span>{{ form.errors.password }}</span>
              </div>
            </div>
            <div class="col-lg-6">
              <input type="password" class="form-control rounded-3 px-3 shadow-sm auth-input" placeholder="••••••••••" v-model="form.password_confirmation"
                :class="{ 'is-invalid': form.errors.password_confirmation }" required />
              <div v-if="form.errors.password_confirmation" class="invalid-feedback">
                <span>{{ form.errors.password_confirmation }}</span>
              </div>
            </div> -->

<!-- <form @submit.prevent="submit" class="loginForm"> -->

<!-- <div class="col-12">
        <div class="row">
          <div class="col-12">
            <div v-if="this.errors.first_name" class="error-validation text-danger text-end">
              <span>{{ this.errors.first_name }}</span>
            </div>
            <div class="form-group mb-4">
              <div class="form-floating">
                <input id="first_name" class="form-control border border-primary" :placeholder="__('First Name')"
                  type="text" v-model="form.first_name" />
                <label class="text-muted" for="floatingInput">{{ __('first name') }}</label>
              </div>
            </div>
            <div v-if="this.errors.last_name" class="error-validation text-danger text-end">
              <span>{{ this.errors.last_name }}</span>
            </div>
            <div class="form-group mb-4">
              <div class="form-floating">

                <input id="last_name" class="form-control border border-primary" :placeholder="__('Last Name')"
                  type="text" v-model="form.last_name" />

                <label class="text-muted" for="last_name">{{ __('last name') }}</label>
              </div>
            </div>
            <div v-if="this.errors.user_name" class="error-validation text-danger text-end">
              <span>{{ this.errors.user_name }}</span>
            </div>
            <div class="form-group mb-4">
              <div class="form-floating">

                <input id="user_name" class="form-control border border-primary" :placeholder="__('User Name')"
                  type="text" v-model="form.user_name" />

                <label class="text-muted" for="user_name">{{ __('user name') }}</label>
              </div>
            </div>
            <div v-if="this.errors.email" class="error-validation text-danger text-end">
              <span>{{ this.errors.email }}</span>
            </div>
            <div class="form-group mb-4">
              <div class="form-floating">
                <input id="email" class="form-control border border-primary" :placeholder="__('Email')" type="email"
                  v-model="form.email" />
                <label class="text-muted" for="email">{{ __('email address') }}</label>
              </div>
            </div>
            <div v-if="this.errors.password" class="error-validation text-danger text-end">
              <span>{{ this.errors.password }}</span>
            </div>
            <div class="form-group mb-4">
              <div class="form-floating">

                <input id="pass_log_log" class="form-control border border-primary" type="password"
                  v-model="form.password" name="password" :placeholder="__('Password')" />
                <label class="text-muted" for="password">{{ __('password') }}</label>
              </div>
              <span toggle="#password-field"
                class="fa fa-fw fa-eye field_icon toggle-password-log position-absolute input-icon fs-5"></span>
            </div>
            <div v-if="this.errors.password_confirmation" class="error-validation text-danger text-end">
              <span>{{ this.errors.password_confirmation }}</span>
            </div>
            <div class="form-group mb-4">
              <div class="form-floating">

                <input id="pass_log_log" class="form-control border border-primary" type="password"
                  v-model="form.password_confirmation" name="password_confirmation"
                  :placeholder="__('Confirm Password')" />
                <label class="text-muted" for="password_confirmation">{{ __('confirm password') }}</label>
              </div>
              <span toggle="#password-field"
                class="fa fa-fw fa-eye field_icon toggle-password-log position-absolute input-icon fs-5"></span>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-12 mb-3">
            <div v-if="this.errors.terms" class="error-validation text-danger text-end">
              <span>{{ this.errors.terms }}</span>
            </div>
            <div class="form-check">
              <input v-model="form.terms" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" style="font-size: 14px;" for="flexCheckDefault">
                {{ __('terms changes') }}
                <a :href="route('company_pages.display', { slug: 'terms' })" target="_blank">Terms of Use & Conditions</a>

                and the <a :href="route('company_pages.display', { slug: 'privacy' })" target="_blank">Privacy Policy</a>
              </label>
            </div>
          </div>
          <div class="col-md-4">
            <button class="submit btn btn-primary" :class="{ 'text-white-50': form.processing }"
              :disabled="form.processing">
              <div v-show="form.processing" class="spinner-border spinner-border-sm">
                <span class="visually-hidden">{{ __('loading') }}...</span>
              </div>
              {{ __('register') }}
            </button>
          </div>
          <div class="col-md-8 text-end">
            <p class="mb-0">
              {{ __('already have a account') }}?
              <Link :href="route('login')" class="link ms-2 text-capitalize">{{ __('login') }}</Link>
            </p>
          </div>
        </div>
      </div> -->
<!-- </form> -->

<script>
import { defineComponent } from "vue";
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import Checkbox from "@/Components/Checkbox.vue";
import Label from "@/Components/Label.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Head,
    Button,
    Input,
    Checkbox,
    Label,
    ValidationErrors,
    Link,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
    selected_role: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        first_name: "",
        last_name: "",
        user_name: "",
        email: "",
        password: "",
        password_confirmation: "",
        terms: 0,
        login_as: this.selected_role,
      }),
      errors: {
        first_name: null,
        last_name: null,
        user_name: null,
        email: null,
        password: null,
        password_confirmation: null,
        terms: null,
      },
    };
  },

  methods: {
    submit() {
      this.emptyErrors();
      if (
        this.form.email &&
        this.form.password &&
        this.form.first_name &&
        this.form.last_name &&
        this.form.password_confirmation
      ) {
        this.form.post(this.route("register"), {
          onFinish: () => this.form.reset("password", "password_confirmation"),
        });
      }

      if (!this.form.first_name) {
        this.errors.first_name = "First Name is required.";
      }
      if (!this.form.last_name) {
        this.errors.last_name = "Last Name is required.";
      }

      if (!this.form.email) {
        this.errors.email = "Email is required.";
      }
      if (!this.form.password) {
        this.errors.password = "Password is required.";
      }

      if (!this.form.password_confirmation) {
        this.errors.password_confirmation =
          "Password Confirmation is required.";
      }
      if (!this.form.terms) {
        this.errors.terms = "You Must Agree Terms.";
      }
      if (!this.form.user_name) {
        this.errors.user_name = "User Name is required.";
      }
    },
    emptyErrors() {
      this.errors.email = null;
      this.errors.password = null;
      this.errors.first_name = null;
      this.errors.last_name = null;
      this.errors.password_confirmation = null;
      this.errors.terms = null;
      this.errors.user_name = null;
    },
  },
});
</script>
