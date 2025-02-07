<template>
    <div class="container spotlight-carousel px-0" v-if=" serviceCategories.length > 0" >
        <Carousel
          :wrapAround="true"
          :breakpoints="breakpoints"
          ref="carousel"
          v-model="currentSlide"
        >
          <Slide v-for="(category ,index) in serviceCategories" :key="index">
            <div  class="card border-0 mx-2 mb-3 mb-md-0">
              <div
                class="rounded-5 overflow-hidden image-container"
                style="width: 100%; height: 280px"
              >
                <img
                  v-if="category.image"
                  class="image"
                  :src="category.image"
                  alt="categoryimg"
                />
                <img
                  v-else
                  class="image"
                  src="@/images/cardlaw.jpg"
                  alt="categoryimg"
                />
              </div>
              <div class="card-body">
                <div class="d-flex flex-column align-items-start">
                  <h3 class="fs-2 fw-bolder text-primary mb-0">
                    {{ category.name }}
                  </h3>
                  <h6 class="text-white fw-normal fs-3 mt-2 mb-4">
                    Starting from
                    <span class="text-primary fs-3 fw-bold">$15</span>/per 30
                    minute
                  </h6>
                  <!-- <star-rating
                            :rating="category.rating"
                            :star-size="18"
                            :read-only="true"
                            :increment="0.01"
                            :show-rating="false"
                        ></star-rating> -->
                </div>
                <!-- <p class="fs-4 mt-3 fw-regular text-black lineclamp-2" v-html="category.description"></p> -->
                <Link
                  :href="
                    route('services.listing', {
                      service_category: category.slug,
                    })
                  "
                  class="btn btn-primary fs-3 fw-bold rounded-4 fw-bolder custom-padding"
                  >{{ __("Consult Now") }}</Link
                >
              </div>
            </div>
          </Slide>
          <template #addons>
            <navigation />
          </template>
        </Carousel>
      </div>
</template>
