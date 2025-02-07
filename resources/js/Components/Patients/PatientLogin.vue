<template>
  <div
    class="tab-pane"
    :class="{ active: active }"
    id="patient-login-pane"
    role="tabpanel"
    aria-labelledby="patient-login-tab"
    tabindex="0"
  >
    <!-- <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a vestibulum metus,
      sed ultrices tellus. Etiam finibus elit non condimentum auctor. </p>-->
    <form @submit.prevent="submit" class="loginForm">
      <validation-errors class="mb-3" />

      <div class="col-12">
        <div class="row">
          <div class="col-12">
            <div
              v-if="this.errors.email"
              class="error-validation text-danger text-end px-md-5"
            >
              <span>{{ this.errors.email }}</span>
            </div>
            <div class="input-group px-md-5 mb-4">
              <div class="border border-3 rounded-3 w-100">
                <div class="form-floating d-flex align-items-center rounded-3">
                  <input
                    id="email"
                    class="form-control ps-4 bg-transparent"
                    :placeholder="__('email address')"
                    type="email"
                    v-model="form.email"
                  />
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
                  <label class="text-muted ps-4" for="floatingInput">{{
                    __("email address")
                  }}</label>
                </div>
              </div>
            </div>

            <div
              v-if="this.errors.password"
              class="error-validation text-danger text-end px-md-5"
            >
              <span>{{ this.errors.password }}</span>
            </div>
            <div class="input-group px-md-5 mb-4">
              <div class="border border-3 rounded-3 w-100">
                <div class="form-floating d-flex align-items-center">
                  <!-- <label for="password">{{ __('password') }}</label> -->
                  <input
                    id="pass_log_log"
                    class="form-control ps-4"
                    type="password"
                    v-model="form.password"
                    name="password"
                    :placeholder="__('password')"
                  />
                  <label class="text-muted ps-4" for="floatingInput">{{
                    __("password")
                  }}</label>
                  <span
                    class="input-group-text bg-transparent d-flex gap-2"
                    toggle="#password-field"
                  >
                    <Link
                      class="fw-bold text-decoration-none me-3"
                      :href="route('forgot_password')"
                      >{{ __("Forgot") }}</Link
                    >
                    <img
                      src="@/images/icons/Chield_alt.png"
                      width="25"
                      alt=""
                    />
                    <!-- <i class="bi bi-key field_icon toggle-password-log input-icon fs-5"></i> -->
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row px-md-5 align-items-center">
          <div class="col-md-12">
            <button
              class="submit btn w-100 fs-2 fw-bold rounded-4 shadow-find btn-primary mb-3"
              :class="{ 'text-white-50': form.processing }"
              :disabled="form.processing"
            >
              <SpinnerLoader v-if="form.processing" />
              {{ __("login") }}
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
              {{ __("Dont have an account") }}?
              <Link
                :href="route('register', { tab: 'patient' })"
                class="link ms-1 text-capitalize"
                >{{ __("register") }}</Link
              >
            </p>
          </div>
        </div>
      </div>
    </form>
    <hr />
    <div class="col-md-12">
      <div class="text-center">
        <p class="fw-normal my-5 fs-3" style="color: #808080">
          {{ __("Login with social media accounts") }}
        </p>
        <div class="d-flex align-items-center gap-3 justify-content-center">
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
</template>
    <script>
import { defineComponent } from "vue";
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import Checkbox from "@/Components/Checkbox.vue";
import Label from "@/Components/Label.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import SpinnerLoader from "@/Components/Shared/SpinnerLoader.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Button,
    Input,
    Checkbox,
    SpinnerLoader,
    Label,
    ValidationErrors,
    Link,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
    active: Boolean,
    redirectUrl: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
        remember: false,
        login_as: "patient",
        redirectUrl: null,
      }),
      errors: {
        email: null,
        password: null,
      },
    };
  },

  methods: {
    submit() {
      this.emptyErrors();
      if (this.form.email && this.form.password) {
        if (this.redirectUrl && this.redirectUrl != "") {
          this.form.redirectUrl = this.redirectUrl;
        }
        this.form
          .transform((data) => ({
            ...data,
            remember: this.form.remember ? "on" : "",
          }))
          .post(this.route("submit.login"), {
            onFinish: () => {
              this.form.reset("password");
              if (this.redirectUrl && this.redirectUrl != "") {
                this.$inertia.visit(this.redirectUrl);
              }
            },
          });
      }

      if (!this.form.email) {
        this.errors.email = "Email is required.";
      }
      if (!this.form.password) {
        this.errors.password = "Password is required.";
      }
    },
    emptyErrors() {
      this.errors.email = null;
      this.errors.password = null;
    },
  },
});
</script>
