<template>
  <div class="bg-white">
    <div class="container layer-slider">
      <div class="row">
        <div class="col-md-12">
          <swiper
            ref="swiperRef"
            :slides-per-view="1"
            @slideChangeTransitionStart="onSlideChange"
            :modules="[Navigation]"
            navigation
          >
            <swiper-slide v-for="(slide, index) in slides" :key="index">
              <div class="slide-content">
                <div class="row align-items-center pt-3">
                  <div class="col-md-5 heading-slide">
                    <div
                      class="slide-text"
                      :class="{ 'animate-text': activeSlide === index }"
                    >
                      <div
                        v-if="
                          getPageContentType('main_heading_slide_1') ==
                          'textarea'
                        "
                        class="text-start"
                      >
                        <div
                          class="text-dark"
                          v-html="getPageContent('main_heading_slide_1')"
                        ></div>
                      </div>

                      <div
                        v-else-if="
                          getPageContentType('main_heading_slide_1') == 'text'
                        "
                      >
                        <p>
                          {{ getPageContent("main_heading_slide_1") ?? "-" }}
                        </p>
                      </div>
                      <div v-else>
                        <h1 class="text-white display-6">
                          <small
                            class="d-block fs-2 text-capitalize fw-bold text-black"
                            >{{
                              __("Your Legal Solution Just A Click Away")
                            }}</small
                          >
                          {{ __("Online Consultation") }}
                        </h1>
                        <p class="text-white py-3 fs-6">
                          <span class="fw-bold">
                            <span class="text-primary"
                              >{{ __("27/7 Video") }}
                            </span>
                            {{ __("Consultations, ") }}
                            <span class="text-primary">{{ __("Audio") }} </span>

                            {{ __("Calls + ") }}

                            <span class="text-primary">{{ __("Chat") }} </span>

                            {{ __("Consultation") }}
                          </span>
                        </p>
                      </div>

                      <div
                        v-if="
                          getPageContentType('header_content_slide_1') ==
                          'textarea'
                        "
                      >
                        <div
                          class="text-white"
                          v-html="getPageContent('header_content_slide_1')"
                        ></div>
                      </div>
                      <div
                        v-else-if="
                          getPageContentType('header_content_slide_1') == 'text'
                        "
                      >
                        <p>
                          {{ getPageContent("header_content_slide_1") ?? "-" }}
                        </p>
                      </div>
                      <p v-else class="mb-0 text-primary mt-3 pe-md-4">
                        Get professional legal advice from the comfort of your
                        home with our virtual consultations. Connect with
                        experienced doctors online and find the answers you need
                        for your legal matters. Convenient, confidential, and
                        just a click away
                      </p>
                      <span class="d-flex justify-content-start mt-5">
                        <Link
                          :href="route('doctors.listing')"
                          data-aos-duration="1500"
                          class="fw-bold btn btn-secondary fs-2 shadow-find rounded-4 text-white text-decoration-none"
                          >{{ __("Find The Doctors") }}
                          <img
                            class="ms-4"
                            src="@/images/icons/loginbtnicon.png"
                            style="width: 30px"
                            alt="icon-login"
                        /></Link>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="d-flex flex-column">
                      <div class="slide-svg position-relative">
                        <div
                          class="svg1"
                          :class="{ 'animate-svg1': activeSlide === index }"
                        >
                          <img :src="slide.svg[0]" alt="Slide SVG 1" />
                        </div>
                        <div
                          class="svg2 position-absolute"
                          :class="{ 'animate-svg2': activeSlide === index }"
                        >
                          <img :src="slide.svg[1]" alt="Slide SVG 2" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </swiper-slide>
          </swiper>
        </div>
      </div>
    </div>
  </div>
</template>


    <script>
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation } from "swiper/modules";
import "swiper/swiper-bundle.css";
import cardSvg from "@/images/home/card.svg";
import headerSvg from "@/images/home/headerimg.svg";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Swiper,
    SwiperSlide,
    Link,
  },
  data() {
    return {
      activeSlide: 0,
      slides: [
        {
          title: "Slide 1",
          description: "This is the first slide.",
          svg: [headerSvg, cardSvg],
        },
        {
          title: "Slide 2",
          description: "This is the second slide.",
          svg: [headerSvg, cardSvg],
        },
      ],
    };
  },
  setup() {
    return {
      Navigation,
    };
  },
  methods: {
    onSlideChange(swiper) {
      this.activeSlide = swiper.activeIndex;
    },
  },
};
</script>


  <style scoped>
.custom-nav {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
}

.prev-btn,
.next-btn {
  background-color: #333;
  color: #fff;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}

.prev-btn:hover,
.next-btn:hover {
  background-color: #444;
}

.slide-content {
  display: flex;
  width: 100%;
}

.slide-text {
  flex: 1;
  opacity: 0;
  transform: translateY(-200px); /* Start text off the top */
  transition: transform 1s cubic-bezier(0.77, 0, 0.175, 1), opacity 0.8s ease;
  backface-visibility: hidden;
  will-change: transform, opacity;
}

.slide-svg {
  display: flex;
  justify-content: space-around;
  flex: 1;
}

.svg1,
.svg2 {
  opacity: 0;
  transform: translateY(200px); /* Start SVGs off the bottom */
  transition: transform 1s cubic-bezier(0.77, 0, 0.175, 1), opacity 0.8s ease;
  backface-visibility: hidden;
  will-change: transform, opacity;
}

.svg1 {
  width: 700px;
}

.svg2 {
  right: 11px;
  top: 103px;
}

.animate-text {
  opacity: 1;
  transform: translateY(0); /* Move text to original position */
}

.animate-svg1 {
  opacity: 1;
  transform: translateY(0); /* Move SVG1 to original position */
}

.animate-svg2 {
  opacity: 1;
  transform: translateY(0); /* Move SVG2 to original position */
  transition-delay: 0.3s; /* Delayed animation for second SVG */
}

.swiper-button-prev,
.swiper-button-next {
  display: none !important;
}

.svg2 > img {
  width: 200px;
}

@media screen and (max-width: 768px) {
  .svg1 > img {
    width: 350px;
    margin-top: 35px;
  }

  .svg2 {
    right: 0px;
    top: 50px;
  }

  .svg2 > img {
    width: 158px;
  }
}
</style>
