<template>
  <div class="p-6 bg-white">
    <div class="container">
      <!-- :href="`${route('doctors.listing')}?doctor_category_slug=${doctor_category.slug}&country_id=39`"> -->
      <div class="row">
        <div class="col">
          <h2 class="fs-2 mb-4">{{ __("Doctors in USA") }}</h2>
          <ul
            class="list-unstyled filter-doctors"
            v-for="(doctor_category, index) in doctor_categories"
            :key="doctor_category.id"
          >
            <Link :href="computedHref(doctor_category.slug, 233)">
              <li v-if="index <= 4">{{ doctor_category.name }}</li>
            </Link>
          </ul>
        </div>
        <div class="col">
          <h2 class="fs-2 mb-4">{{ __("Doctors in London") }}</h2>
          <ul
            class="list-unstyled filter-doctors"
            v-for="(doctor_category, index) in doctor_categories"
            :key="doctor_category.id"
          >
            <Link :href="computedHref(doctor_category.slug, 232)">
              <li v-if="index <= 4">{{ doctor_category.name }}</li>
            </Link>
          </ul>
        </div>
        <div class="col">
          <h2 class="fs-2 mb-4">{{ __("Doctors in Canada") }}</h2>
          <ul
            class="list-unstyled filter-doctors"
            v-for="(doctor_category, index) in doctor_categories"
            :key="doctor_category.id"
          >
            <Link :href="computedHref(doctor_category.slug, 39)">
              <li v-if="index <= 4">{{ doctor_category.name }}</li>
            </Link>
          </ul>
        </div>
        <div class="col">
          <h2 class="fs-2 mb-4">{{ __("Doctors in Asia") }}</h2>
          <ul
            class="list-unstyled filter-doctors"
            v-for="(doctor_category, index) in doctor_categories"
            :key="doctor_category.id"
          >
            <Link :href="computedHref(doctor_category.slug, null, 'Asia')">
              <li v-if="index <= 4">{{ doctor_category.name }}</li>
            </Link>
          </ul>
        </div>
        <div class="col">
          <h2 class="fs-2 mb-4">{{ __("Doctors in UK") }}</h2>
          <ul
            class="list-unstyled filter-doctors"
            v-for="(doctor_category, index) in doctor_categories"
            :key="doctor_category.id"
          >
            <Link :href="computedHref(doctor_category.slug, 232)">
              <li v-if="index <= 4">{{ doctor_category.name }}</li>
            </Link>
          </ul>
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
  data() {
    return {
      doctor_categories: [],
    };
  },
  created() {
    this.getDoctorCategories();
  },

  methods: {
    getDoctorCategories() {
      axios.get(this.route("getApiTopRatedDoctorCategories")).then((res) => {
        this.doctor_categories = res.data.data;
      });
    },
    computedHref(doctor_category, country_id = null, region = null) {
      let url =
        this.route("doctors.listing") +
        "?doctor_category_slug=" +
        encodeURIComponent(doctor_category);

      if (country_id) {
        url += "&country_id=" + encodeURIComponent(country_id);
      }

      if (region) {
        url += "&region=" + encodeURIComponent(region);
      }

      return url;
    },
  },
});
</script>
