<template>
  <div v-if="featured_clinics.length > 0" class="section py-5 bg-light spotlight">
    <div class="container">

      <div class="row">
        <div class="col-12">
          <div class="position-relative">
            <h2 class="text-center">{{ __('Featured Clinic') }}</h2>
            <p class="text-center mb-4">Discover who is Featured Clinic this week. We are a community of knowledgeable, established, Global Clinics, Conscious Event Facilitators and Holistic Clinics from around the world. Connect with some of our most highly recommended and well established clinics in the GHCN.</p>
            <!-- <div class="position-absolute top-0" style="right: 15%;">

              <button @click="prev" class="btn">
                <i class="bi bi-chevron-left"></i>
              </button>
              <button @click="next" class="btn">
                <i class="bi bi-chevron-right"></i>
              </button>
            </div> -->
          </div>
        </div>
      </div>

    <div class="container-fluid spotlight-carousel px-0">
      <Carousel :items-to-show="1" :wrap-around="true" ref="carousel" v-model="currentSlide">
        <Slide v-for="clinic in featured_clinics" :key="clinic.id">
          <!-- <clinic-spotlight-card :clinic="clinic"></clinic-spotlight-card> -->
        <clinic-card :clinic="clinic"></clinic-card>

        </Slide>
        <template #addons>
            <Navigation />
        </template>
      </Carousel>
    </div>
      <!-- <div class="row pt-4 justify-content-center">
        <div class="col-md-3 d-flex justify-content-center">
          <Link :href="route('clinics.listing')" class="btn rounded-5 border-0 px-4 text-white btn-primary">{{ __('view all clinics') }}</Link>
        </div>
      </div> -->
    </div>
  </div>
  <div v-else>

  </div>
</template>
<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import ClinicSpotlightCard from "@/Components/Clinics/ClinicSpotlightCard.vue";
import ClinicCard from "@/Components/Clinics/ClinicCard.vue";
import axios from "axios";
import { Carousel, Navigation, Pagination, Slide } from 'vue3-carousel';

export default defineComponent({
  components: {
    ClinicSpotlightCard,
    ClinicCard,
    Link,
    Carousel,
    Slide,
    Pagination,
    Navigation
  },
  created() {
    this.getFeaturedClinics()
  },
  data() {
    return {
      form: this.$inertia.form({
      }),
      featured_clinics: [],
      settings: {
        itemsToShow:1,
        snapAlign: 'start',
      },
      // breakpoints are mobile first
      // any settings not specified will fallback to the carousel settings
      breakpoints: {
        // 700px and up
        700: {
          itemsToShow: 1,
          snapAlign: 'start',
        },
        // 1024 and up
        1024: {
          itemsToShow: 1,
          snapAlign: 'start',
        },
      },
    };
  },
  methods: {
    getFeaturedClinics() {
      axios.get(this.route('getApiFeaturedClinics')).then(res => {
        this.featured_clinics = res.data.data
      });
    },
    submit() {
    },

    next() {
      this.$refs.carousel.next()
    },
    prev() {
      this.$refs.carousel.prev()
    },
  },
});
</script>

