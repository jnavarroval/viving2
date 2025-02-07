<template>
  <div class="static-cards stats p-6">
    <div class="container">
      <div class="row">
        <div
          class="col-12"
          v-if="
            getPageContentType('category_section_description') == 'textarea'
          "
        >
          <div v-html="getPageContent('category_section_description')"></div>
        </div>
        <div
          class="col-12"
          v-else-if="
            getPageContentType('category_section_description') == 'text'
          "
        >
          <p>{{ getPageContent("category_section_description") ?? "-" }}</p>
        </div>

        <div v-else class="col-12">
          <h2
            class="display-6 text-center text-primary"
            data-aos="fade-down"
            data-aos-once="false"
            data-aos-duration="1500"
            data-aos-delay="200"
          >
            {{ __("Law Categories") }}
          </h2>
          <p class="mb-5 text-center">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem,
            quasi explicabo, animi, molestias cumque porro vel facere nostrum
            numquam aperiam ex harum non. Ullam, rem. Reprehenderit, tenetur
            eveniet. Molestias, culpa.
          </p>
        </div>
      </div>
    </div>
    <div class="container" v-if="fetching">
      <div class="row align-items-center">
        <div class="col-md-2 col-6">
          <categories-skeleton></categories-skeleton>
        </div>
        <div class="col-md-2 col-6">
          <categories-skeleton></categories-skeleton>
        </div>
        <div class="col-md-2 col-6">
          <categories-skeleton></categories-skeleton>
        </div>
        <div class="col-md-2 col-6">
          <categories-skeleton></categories-skeleton>
        </div>
        <div class="col-md-2 col-6">
          <categories-skeleton></categories-skeleton>
        </div>
        <div class="col-md-2 col-6">
          <categories-skeleton></categories-skeleton>
        </div>
      </div>
    </div>
    <div class="container" v-if="!fetching">
      <div class="row align-items-center">
        <div
          class="col-md-2 col-6 hvr-float d-md-block d-flex align-items-center justify-content-center"
          v-for="(category, index) in doctor_main_categories"
          :key="index"
        >
          <Link
            v-if="index <= 11"
            class="text-decoration-none text-center"
            :href="`${route('doctors.listing')}?doctor_category_slug=${
              category.slug
            }`"
          >
            <div class="card mb-3 py-2 text-center rounded-5">
              <span class="d-flex justify-content-center mt-2">
                <div
                  class="rounded-circle icon-back d-flex align-items-center justify-content-center"
                  style="width: 90px; height: 90px"
                >
                  <img
                    style="width: 50px"
                    :src="category.image"
                    class="img-fluid"
                    alt="cardtopimg"
                  />
                </div>
              </span>

              <div class="card-body">
                <h4 class="text-black mb-2" style="font-size: 22px">
                  {{ category.name }}
                </h4>
                <p class="card-subheading-fs mb-0">
                  {{ __("Treatment perfectly match your goals.") }}
                </p>
              </div>
            </div>
          </Link>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-12 text-center">
        <Link
          :href="route('categories')"
          class="btn btn-outline-primary fw-bold fs-3 px-md-5 px-3 rounded-4"
          >{{ __("Explore More") }}</Link
        >
      </div>
    </div>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import CategoriesSkeleton from "@/Components/Skeleton/CategoriesSkeleton.vue";
export default defineComponent({
  components: {
    Link,
    CategoriesSkeleton,
  },
  created() {
    this.getDoctorMainCategories();
  },
  data() {
    return {
      doctor_main_categories: [],
      fetching: true,
    };
  },
  methods: {
    getDoctorMainCategories() {
      axios.get(this.route("getApiDoctorMainCategories")).then((res) => {
        this.doctor_main_categories = res.data.data;
        this.fetching = false;
      });
    },
  },
});
</script>
