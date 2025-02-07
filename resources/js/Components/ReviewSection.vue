<template>
  <div class="p-6">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-5 text-center">
          <div class="text-center">
            <h1
              data-aos="fade-down"
              data-aos-duration="1500"
              class="heading-fs"
              v-html="getPageContent('review_section_title')"
            ></h1>
            <p
              v-html="getPageContent('review_section_description')"
              class="subheading-fs"
            ></p>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div
              class="col-md-4 mb-3 review-card"
              v-for="review in reviews.slice(0, 6)"
              :key="review.id"
            >
              <div class="card h-100 p-3">
                <div class="card-body">
                  <div class="d-flex align-items-start gap-3">
                    <div class="rounded-circle overflow-hidden"  style="width: 76px; height: 76px">
                      <img
                      v-if="review.doctor_image || review.clinic_image"
                      :src="review.doctor_image || review.clinic_image"
                      class="img-fluid object-fit-cover"
                     
                      alt=""
                    />
                    <img
                      v-else
                      src="@/images/icons/user.png"
                      style="width: 76px; height: 76px"
                      alt=""
                    />
                    </div>
                   
                    <div class="d-flex flex-column">
                      <h2 class="fs-2">
                        {{ review.doctor_name ?? review.clinic_name }}
                      </h2>
                      <h6 class="fs-5">
                        {{ getCategoryNames(review.main_categories) }}
                      </h6>
                    </div>
                  </div>
                  <p class="paragraph lineclamp-2">{{ review.comment }}</p>
                  <star-rating
                    :rating="review.rating"
                    :star-size="20"
                    :read-only="true"
                    :increment="0.01"
                    :show-rating="false"
                  ></star-rating>
                  <div class="d-flex align-items-center gap-3 mt-4">
                    <img
                      v-if="review.patient.image"
                      :src="review.patient.image"
                      class="rounded-circle"
                      style="width: 40px; height: 40px"
                      alt=""
                    />
                    <img
                      v-else
                      src="@/images/icons/user.png"
                      style="width: 40px; height: 40px"
                      alt=""
                    />
                    <h2 class="fs-4 mb-0">
                      {{ review.patient.name }}
                    </h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import axios from "axios";

export default defineComponent({
  components: {
    Link,
  },
  data() {
    return {
      reviews: [],
    };
  },
  created() {
    this.getAllReviews();
  },
  methods: {
    getAllReviews() {
      axios.get(this.route("getApiAllReviews")).then((res) => {
        this.reviews = res.data.data;
      });
    },
    getCategoryNames(main_categories) {
      return main_categories
        .slice(0, 3)
        .map((category) => category.name)
        .join(" | ");
    },
  },
});
</script>
