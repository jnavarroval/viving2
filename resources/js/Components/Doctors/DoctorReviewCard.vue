<template>
  <div class="col-md-12 mb-3">
    <div
      class="card w-100 bg-white d-flex align-items-center justify-content-center overflow-hidden shadow-sm rounded-md"
      style="min-height: 200px"
    >
      <div
        class="card-body d-flex flex-column justify-content-center align-items-center"
      >
        <div
          class="d-flex align-items-center flex-column justify-content-between mb-3"
        >
          <div
            class="d-flex align-items-center overflow-hidden bg-light rounded-circle mb-2"
            style="width: 90px; height: 90px"
          >
            <img class="img-fluid" :src="review.patient.image" alt="image" />
          </div>
          <h5 class="fs-4 fw-bold text-black text-capitalize">
            {{ review.patient.name }}
          </h5>
        </div>

        <p class="text-center mb-2 px-3" style="color: #c5c4c7">
          {{ review.comment }}
        </p>

        <div class="d-flex align-items-center justify-content-center">
          <span class="rating text-warning">
            <star-rating
              :rating="review.rating"
              :star-size="18"
              :read-only="true"
              :increment="0.01"
              :show-rating="false"
            ></star-rating>
          </span>
          <span class="ms-3 fw-medium mt-1">{{
            getFormattedDateOnly(review.created_at)
          }}</span>
        </div>
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
  props: ["review", "add_col"],
  created() {},
  data() {
    return {};
  },
  methods: {},
});
</script>
