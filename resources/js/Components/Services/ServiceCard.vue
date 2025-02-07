<template>
  <div :class="{ 'col-md-4': add_col, 'col-md-12': !add_col }">
    <div class="card overflow-hidden border-0 rounded-20 shadow mb-4">
      <div
        class="d-flex justify-content-center overflow-hidden card-avatar rounded-2 position-relative"
        style="height: 250px"
      >
        <img
          v-if="service.image"
          class="img-fluid"
          :src="service.image"
          alt="image"
        />
        <!-- <img
          v-else
          class="img-fluid m-3"
          src="@/images/common/service.png"
          alt="image"
        /> -->

        <!-- <div class="block--text text-center">
          <Link
            :href="route('services.detail', { slug: services.slug })" class="btn btn-primary"
            >{{ __("view detail") }}</Link
          >
        </div> -->
      </div>
      <div class="card-body">
        <h5 class="fixed-title mb-0">
          <a
            class="text-decoration-none text-dark"
            :href="route('services.detail', { slug: service.slug })"
            >{{ service.name }}</a
          >
        </h5>
        <span v-if="service.doctor" class="badge bg-secondary">{{ __('doctor') }}</span>
        <span v-else-if="service.clinic" class="badge bg-secondary"
          >{{ __('clinic') }}</span
        >
        <span v-else class="badge bg-secondary">{{ __('admin') }}</span>
        <p class="mb-0 mt-3 lineclamp-2" v-html="service.description"></p>
        <Link
          :href="route('services.detail', { slug: service.slug })"
          class="btn btn-primary rounded-4 fs-4 fw-bold my-3 shadow-find"
          >{{
            getPageContent("general_book_btn_1_text") ?? __("book appointment")
          }}
          <img
            src="@/images/icons/loginbtnicon.png"
            width="25"
            class="ms-2"
            alt=""
          />
        </Link>
      </div>
    </div>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Link,
  },
  props: {
    service: {},
    add_col: {
      default: true,
    },
  },
  created() {},
  data() {
    return {};
  },
  methods: {},
});
</script>
