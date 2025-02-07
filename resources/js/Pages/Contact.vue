<template>
  <app-layout title="Contact">
    <div class="bg-primary">
      <pages-heading
        :textwhite="'true'"
        :heading="'Contact us'"
        :breadcrums="breadcrums"
      >
      </pages-heading>
    </div>
    <div class="stats">
      <div class="page section py-0">
        <div class="py-3">
          <div class="container">
            <div class="row"></div>
          </div>
        </div>
        <div class="container">
          <div class="row justify-content-center py-5">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <validation-errors class="mb-3" />
                    <div class="card-body p-md-4">
                      <div class="p-3">
                        <div>
                          <h3 class="fs-3 ms-1 fw-bold text-primary">
                            {{ __("Get in Touch") }}
                          </h3>
                        </div>
                        <div>
                          <h2 class="display-5 fw-bold">
                            {{ __("Let's Chat,Reach Out") }}<br />
                            {{ __("to Us") }}
                          </h2>
                        </div>
                        <div>
                          <p class="fs-3 text-paragraphcolor">
                            {{
                              __(
                                "Have questions or feedback?We're here to help.Send us a message,and we'll respond within 24hours"
                              )
                            }}
                          </p>
                        </div>
                      </div>
                      <hr class="pb-4" />

                      <div
                        class="col-md-12 d-flex justify-content-center gap-3 px-1"
                      >
                        <div class="col-md-6 mb-4">
                          <div class="">
                            <label
                              for="exampleFormControlInput0"
                              class="form-label fs-4 text-black fw-medium"
                              >{{ __("whats your name?") }}</label
                            >
                            <input
                              type="text"
                              class="form-control border rounded-4"
                              id="exampleFormControlInput0"
                              v-model="form.name"
                              :placeholder="__('Please Enter')"
                            />
                          </div>
                        </div>
                        <div class="col-md-6 mb-4">
                          <div class="">
                            <label
                              for="exampleFormControlInput1"
                              class="form-label fs-4 text-black fw-medium"
                              >{{ __("email address") }}</label
                            >
                            <input
                              type="email"
                              class="form-control border rounded-4"
                              id="exampleFormControlInput1"
                              v-model="form.email"
                              placeholder="name@example.com"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="mb-4">
                        <label
                          for="exampleFormControlInput2"
                          class="form-label fs-4 text-black fw-medium"
                          >{{
                            __("what phone number can we reach you at?")
                          }}</label
                        >
                        <input
                          type="text"
                          class="form-control border rounded-4"
                          id="exampleFormControlInput2"
                          v-model="form.phone"
                          :placeholder="__('Please Enter')"
                        />
                      </div>
                      <div class="mb-4">
                        <label
                          for="exampleFormControlTextarea1"
                          class="form-label fs-4 text-black fw-medium"
                          >{{ __("how can we help?write us a message") }}</label
                        >
                        <textarea
                          class="form-control border rounded-4"
                          id="exampleFormControlTextarea1"
                          v-model="form.message"
                          rows="3"
                        ></textarea>
                      </div>
                      <button
                        @click="submit()"
                        :class="{ 'text-white-50': form.processing }"
                        :disabled="form.processing"
                        class="btn rounded-4 btn-primary w-100 fw-bold"
                      >
                        <div
                          v-show="form.processing"
                          class="spinner-border spinner-border-sm"
                        >
                          <span class="visually-hidden"
                            >{{ __("loading") }}...</span
                          >
                        </div>
                        {{ __("send message") }}
                      </button>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 ps-md-5 ps-0">
                  <img
                    class="rounded-5 contact-img"
                    src="@/images/icons/Contact.svg"
                    alt="contact-img"
                  />
                  <div
                    class="card p-4 mt-3"
                    v-if="
                      getPageContentType('contact_page_description') ==
                      'textarea'
                    "
                  >
                    <div
                      v-html="getPageContent('contact_page_description')"
                    ></div>
                  </div>
                  <p
                    v-else-if="
                      getPageContentType('contact_page_description') == 'text'
                    "
                  >
                    {{ getPageContent("contact_page_description") ?? __(" ") }}
                  </p>
                  <div v-else>-------------------------------------</div>
                </div>
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
import ValidationErrors from "@/Components/ValidationErrors.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import PagesHeading from "@/Components/PagesHeading.vue";

export default defineComponent({
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    ValidationErrors,
    PagesHeading,
  },
  data() {
    return {
      form: this.$inertia.form({
        name: "",
        email: "",
        phone: "",
        message: "",
        agree_terms: 0,
      }),
      breadcrums: [
        {
          id: 1,
          name: this.__("Home"),
          link: "/",
        },
        {
          id: 2,
          name: this.__("Contact us"),
          link: "",
        },
      ],
    };
  },
  methods: {
    submit() {
      this.form.post(this.route("contact.store"), {
        onSuccess: () =>
          this.form.reset("name", "email", "phone", "message", "agree_terms"),
      });
    },
  },
});
</script>
<style>
input {
  background-color: #f4f9fd !important;
}
textarea {
  background-color: #f4f9fd !important;
}
</style>
