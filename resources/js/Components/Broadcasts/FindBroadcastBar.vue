<template>
  <div v-if="home">
    <div class="row">
      <div class="col-md-4">
        <select
          v-model="form.type"
          class="form-select border-0 py-3"
          aria-label="Select Type"
        >
          <option value="" selected>{{ __("select") }} {{ __("type") }}</option>
          <option value="audio">{{ __("audio") }}</option>
          <option value="video">{{ __("video") }}</option>
        </select>
      </div>
      <div class="col-md-4">
        <input
          type="text"
          class="form-control border-0 py-3"
          v-model="form.search"
          id="findBroadcastHome"
          :placeholder="__('search')"
        />
      </div>
      <div class="col-md-4">
        <div class="d-flex">
          <select
            v-model="form.tag"
            class="form-select border-0 py-3"
            aria-label="Select Tag"
          >
            <option value="" selected>
              {{ __("select") }} {{ __("tag") }}
            </option>
            <option v-for="tag in tags" :key="tag.id" :value="tag.slug">
              {{ tag.name }}
            </option>
          </select>

          <button
            :href="route('broadcasts.listing')"
            @click="submit"
            class="btn btn-primary ms-3"
            type="submit"
          >
            <i class="bi bi-search"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="py-4" v-else>
    <div class="container">
      <div class="row align-items-center rounded-4 bg-white">
        <div
          class="col-12 d-flex flex-column flex-md-row align-items-md-center align-items-start p-3"
        >
          <div class="col-md-3">
            <h3 class="text-primary py-3 py-md-0 mb-0 fw-bold">
              {{ __("find") }} {{ __n("broadcast") }}
            </h3>
          </div>
          <div
            class="col-md-9 d-flex justify-content-end flex-column flex-md-row"
          >
            <div class="col-md-3 me-0 me-md-3 mb-2 mb-md-0">
              <select v-model="form.type" class="form-select rounded-4 border">
                <option value="" selected>
                  {{ __("select") }} {{ __("type") }}
                </option>
                <option value="audio">{{ __("audio") }}</option>
                <option value="video">{{ __("video") }}</option>
              </select>
            </div>
            <div class="col-md-3 me-0 me-md-3 mb-2 mb-md-0">
              <input
                type="text"
                v-model="form.search"
                class="form-control rounded-4 border"
                id="findBroadcastListing2"
                :placeholder="__('search')"
              />
            </div>
            <div class="col-md-3 me-0 me-md-3 mb-2 mb-md-0">
              <select
                v-model="form.tag"
                class="form-select rounded-4 border"
                aria-label="Select Tag"
              >
                <option value="" selected>
                  {{ __("select") }} {{ __("tag") }}
                </option>
                <option v-for="tag in tags" :key="tag.id" :value="tag.slug">
                  {{ tag.name }}
                </option>
              </select>
            </div>

            <button
              :href="route('broadcasts.listing')"
              @click="submit"
              class="btn btn-primary rounded-4 fs-3 fw-bold"
              :disabled="isLoading"
              type="submit"
            >
              <SpinnerLoader v-if="isLoading" />
              {{ __("search") }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import SpinnerLoader from "@/Components/Shared/SpinnerLoader.vue";
import { Link } from "@inertiajs/inertia-vue3";
import axios from "axios";
import { router } from "@inertiajs/inertia-vue3";
export default defineComponent({
  components: {
    ValidationErrors,
    Link,
    SpinnerLoader,
  },
  props: {
    is_redirect: {
      type: Boolean,
      default: true,
    },
    home: {
      type: Boolean,
      default: false,
    },
  },
  created() {
    this.getTags();
    this.$emit("getBroadcasts", this.form);
  },
  data() {
    return {
      form: {
        search: route().params.search ?? "",
        type: route().params.type ?? "",
        tag: route().params.tag ?? "",
      },
      isLoading: false,
      tags: [],
    };
  },

  methods: {
    getTags() {
      axios.get(this.route("getApiTags")).then((res) => {
        this.tags = res.data.data;
      });
    },
    submit() {
      this.isLoading = true;
      const fetchDataPromise = new Promise((resolve, reject) => {
        setTimeout(() => {
          this.$inertia.replace(this.route("broadcasts.listing"), {
            data: this.form,
            replace: true,
            preserveScroll: true,
          });
          this.$emit("getBroadcasts", this.form);
          resolve();
        }, 1000);
      });
      fetchDataPromise
        .then((data) => {})
        .catch((error) => {})
        .finally(() => {
          this.isLoading = false;
        });
    },
  },
});
</script>
