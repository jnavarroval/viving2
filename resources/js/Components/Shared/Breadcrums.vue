<template>
  <div class="container-fluid px-0">
    <nav v-if="white" aria-label="breadcrumb">
      <ol
        class="breadcrumb justify-content-start my-0 text-white fw-normal fs-3"
      >
        <li
          class="breadcrumb-item mt-1"
          v-for="(breadcrum, index) in breadcrums"
          :key="index"
        >
          <Link
            v-if="breadcrum.link"
            class="text-decoration-none text-white"
            :href="breadcrum.link"
            >{{ breadcrum.name }}</Link
          >
          <span class="text-white" v-else> {{ breadcrum.name }}</span>
        </li>
      </ol>
    </nav>
    <nav v-else aria-label="breadcrumb">
      <ol
        class="breadcrumb justify-content-start my-0 text-grey fw-normal fs-3"
      >
        <li
          class="breadcrumb-item mt-1"
          v-for="(breadcrum, index) in breadcrums"
          :key="index"
        >
          <Link
            v-if="breadcrum.link"
            class="text-decoration-none text-grey"
            :href="breadcrum.link"
            >{{ breadcrum.name }}</Link
          >
          <span class="text-grey" v-else> {{ breadcrum.name }}</span>
        </li>
      </ol>
    </nav>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Link,
  },
  props: ["breadcrums", "white"],

  data() {
    return {};
  },
  async mounted() {},
  methods: {},
});
</script>


<style scoped>
.text-grey {
  color: #696868;
}
</style>


