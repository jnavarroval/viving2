<template>
  <div
    class="tab-pane"
    :class="{ active: active }"
    id="socialInfo"
    role="tabpanel"
    aria-labelledby="social-info-tab"
    tabindex="0"
  >
    <form @submit.prevent="submit" class="profileForm">
      <div class="row">
        <div class="col-md-12">
          <validation-errors></validation-errors>
          <div class="col-md-12">
            <div class="card rounded-20">
              <div class="card-body px-0">
                <h4 class="text-black ms-4 my-2 fs-3 fw-bold">
                  {{ __("Add your Social Media Information") }}
                </h4>
                <hr class="border-primary" />
                <validation-errors></validation-errors>
                <div class="col-12">
                  <div class="row p-4 pb-0 social-inputs">
                    <div
                      v-for="(setting, i) in form.settings"
                      :key="i"
                      class="col-md-12 mb-1"
                    >
                      <!-- <img src="@/images/icons/facebook.png" width="15" alt=""> -->
                      <label class="col-3" :for="setting.display_name">{{
                        setting.display_name
                      }}</label>
                      <div class="form-group d-flex align-items-center ps-4">
                        <img
                          :src="'/assets/icons/' + setting.image_url"
                          width="35"
                          alt=""
                        />

                        <input
                          v-model="setting.value"
                          :placeholder="`${setting.display_name} link here`"
                          class="w-100 bg-transparent border-0 shadow-none px-3"
                          type="text"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row mt-2 align-items-center">
                    <div class="col-md-9">
                      <button
                        type="submit"
                        :disabled="form.processing"
                        class="btn btn-primary fs-3 fw-bold rounded-4 ms-4 mb-3"
                      >
                        <SpinnerLoader v-if="form.processing" />
                        {{ __("save") }}
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
        </div>
      </div>
    </form>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import SpinnerLoader from "@/Components/Shared/SpinnerLoader.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import axios from "axios";

export default defineComponent({
  components: {
    Head,
    SpinnerLoader,
    ValidationErrors,
    Link,
  },
  props: ["active"],
  data() {
    return {
      form: this.$inertia.form({
        settings: [
          {
            name: "facebook_url",
            display_name: "Facebook Url",
            image_url: "facebook.png",
            value: this.$page.props.clinic.clinic_settings["facebook_url"] ?? "",
          },
          {
            name: "twitter_url",
            display_name: "Twitter Url",
            image_url: "twitter.png",
            value: this.$page.props.clinic.clinic_settings["twitter_url"] ?? "",
          },
          {
            name: "youtube_url",
            display_name: "Youtube Url",
            image_url: "youtube.png",
            value: this.$page.props.clinic.clinic_settings["youtube_url"] ?? "",
          },
          {
            name: "tiktok_url",
            display_name: "TikTok Url",
            image_url: "tiktok.png",
            value: this.$page.props.clinic.clinic_settings["tiktok_url"] ?? "",
          },
          {
            name: "linkedin_url",
            display_name: "LinkedIn Url",
            image_url: "linkedin.png",
            value: this.$page.props.clinic.clinic_settings["linkedin_url"] ?? "",
          },
          {
            name: "whatsapp_url",
            display_name: "Whatsapp Url",
            image_url: "whatsapp.png",
            value: this.$page.props.clinic.clinic_settings["whatsapp_url"] ?? "",
          },
          {
            name: "snapchat_url",
            display_name: "Snapchat Url",
            image_url: "snapchat.png",
            value: this.$page.props.clinic.clinic_settings["snapchat_url"] ?? "",
          },
          {
            name: "instagram_url",
            display_name: "Instagram Url",
            image_url: "instagram.png",
            value: this.$page.props.clinic.clinic_settings["instagram_url"] ?? "",
          },
          {
            name: "pinterest_url",
            display_name: "PinTerest Url",
            image_url: "pinterest.png",
            value: this.$page.props.clinic.clinic_settings["pinterest_url"] ?? "",
          },
        ],
      }),
    };
  },
  methods: {
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("clinics.update_settings"), {
          onSuccess: () => {
            // this.goToNextTab();
          },
        });
    },
    goToNextTab() {
      this.$inertia.visit(route("account"), {
        data: { active_tab: "broadcasts" },
      });
    },
  },
});
</script>

<style scoped>
.bg {
  background-color: #e7f3fa;
}
.input[type="text"]::placeholder {
  font-size: 18px;
  color: rgba(33, 37, 41, 0.75);
  font-weight: bold;
}
</style>
