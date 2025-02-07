<template>
  <div class="p-3">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Image</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-black">{{ experience.name }}</td>
          <td>
            <p class="mb-0 mt-3 line-clamp" v-html="experience.description"></p>
          </td>
          <td>
            <img width="70" class="rounded-4" :src="experience.image" alt="" />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- <div class="col-md-4">
    <div
      class="card bg-white item-h card-alt overflow-hidden border-0 rounded-ms shadow-sm mb-5"
    >
      <div
        class="d-flex justify-content-center overflow-hidden card-avatar rounded-2 position-relative"
        style="height: 240px"
      >
        <img
          v-if="experience.image"
          class="img-fluid card-img-top"
          :src="experience.image"
          alt="image"
        />

        <div class="item-overlay top"></div>
      </div>
      <div class="card-body bg-white">
        <h4 class="fixed-title mb-1 truncate fw-bold">
          <a class="text-decoration-none text-dark" href="#">{{ experience.name }}</a>
        </h4>
        <span v-if="experience.doctor_id" class="badge bg-primary fs-5">{{
          __("doctor")
        }}</span>
        <span v-else-if="experience.clinic_id" class="badge bg-primary fs-5">{{
          __("clinic")
        }}</span>
        <span v-else class="badge bg-primary fs-5">{{ __("admin") }}</span>
        <p class="mb-0 mt-3 line-clamp" v-html="experience.description"></p>
      </div>
    </div>
  </div> -->
</template>
<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Link,
  },
  props: {
    experience: {},
    add_col: {
      default: true,
    },
  },

  data() {
    return {};
  },
  methods: {},
});
</script>

