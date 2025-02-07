<template>
  <app-layout title="My Profile">
    <template #header> </template>
    <div class="stats">
      <div class="bg-primary">
        <pages-heading
          :textwhite="'true'"
          :heading="'book a service'"
          :breadcrums="breadcrums"
        ></pages-heading>
      </div>
      <div class="section book-services">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-center align-items-center">
                <div class="container">
                  <div class="row d-md-block d-none">
                    <div class="col-md-12 position-relative pt-7">
                      <div class="progress" style="background-color: #daeaf0">
                        <div
                          class="progress-bar bg-primary rounded-pill"
                          role="progressbar"
                          :style="{ width: progress + '%' }"
                          aria-valuenow="progress"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                        <div
                          class="progress-circle position-absolute shadow"
                          v-for="(active, index) in activeSteps"
                          :key="index"
                          :class="{ active: active }"
                          :style="{
                            bottom: '-13px',
                            left: `${index === 0 ? 23 : 25 + index * 25}%`,
                          }"
                        >
                          <i class="bi bi-check text-white"></i>
                        </div>
                      </div>
                    </div>
                    <div
                      class="d-flex align-items-center position-relative mt-5"
                      style="margin-bottom: 7rem"
                    >
                      <h3
                        class="fs-3 fw-normal position-absolute"
                        style="left: 19%"
                      >
                        {{ __("Schedule Appointment") }}
                      </h3>
                      <h3
                        class="fs-3 fw-normal position-absolute"
                        style="left: 47%"
                      >
                        {{ __("Make Payment") }}
                      </h3>
                      <h3
                        class="fs-3 fw-normal position-absolute"
                        style="left: 74%"
                      >
                        {{ __('Thank You') }}
                      </h3>
                    </div>
                  </div>
                </div>
              </div>


              <div class="tab-content" id="appointmentTabContent">
                <div
                  class="tab-pane fade"
                  :class="{ 'show active': currentTabIndex == 0 }"
                  id="info-tab-pane"
                  role="tabpanel"
                  aria-labelledby="info-tab"
                  tabindex="0"
                >
                <div class="row mb-5" v-if="!paymentScreen">
                  <div class="col-12 time-slots-list">
                    <div class="">
                      <div class="row align-items-center">
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-8">
                              <div class="d-flex align-items-center gap-4">
                                <div class="d-flex align-items-center gap-3">
                                  <label
                                    class="fs-3 text-primary d-block fw-bold text-capitalize"
                                  >
                                    {{ __("service name") }}</label
                                  >
                                  <span class="fw-normal">{{ service.name ?? "" }}</span>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                  <label
                                    class="fs-3 text-primary fw-bold text-capitalize"
                                  >
                                    {{ __("fee") }}</label
                                  >
                                  <span class="fw-normal">
                                    {{
                                      service ? getDisplayAmount(service.price) : ""
                                    }}</span
                                  >
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12 mt-4">
                          <h5 class="mb-4 text-capitalize">
                            {{ __("ask your question") }}
                          </h5>
                          <div class="card rounded-4 p-3">
                            <div class="ps-0">
                              <label for="question" class="text-capitalize mb-3">{{
                                __("question")
                              }}</label>
                              <textarea
                                class="w-100 form-control border px-3"
                                v-model="form.question"
                                cols="50"
                                rows="6"
                              ></textarea>
                            </div>
                            <div class="ps-0 mb-3 mt-4">
                              <label for="attachment" class="text-capitalize mb-3">{{
                                __("attachment")
                              }}</label>

                              <input
                                class="w-100 custom-file-input"
                                placeholder="Please Enter"
                                type="file"
                                id="attachment_file"
                                ref="attachment_file"
                                @change="processFile($event)"
                                name="attachment_file"
                              />
                              <img
                                v-if="attachment_view"
                                :src="attachment_view"
                                height="100"
                                width="100"
                                class="mt-2"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2 mt-3">
                          <button
                            type="button"
                            class="btn btn-primary rounded-4 fw-bold fs-3 px-4"
                            @click="continuePaymentScreen(), onChangeCurrentTab(1)"
                          >
                            {{ __("continue") }}
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                <div
                  class="tab-pane"
                  :class="{ 'show active': currentTabIndex == 1 }"
                  id="payment-tab-pane"
                  role="tabpanel"
                  aria-labelledby="payment-tab"
                  tabindex="0"
                >

                <div class="p-3">
                  <div class="row align-items-center">
                    <div class="col-md-10">
                      <div class="d-flex align-items-center gap-3">
                        <div class="d-flex flex-column">
                          <label
                            class="fs-3 text-primary d-block fw-bold text-capitalize"
                          >
                            {{ __("service name") }}</label
                          >
                          <span class="fw-normal">{{ service.name ?? "" }}</span>
                        </div>
                        <div class="d-flex flex-column">
                          <label class="fs-3 text-primary fw-bold text-capitalize">
                            {{ __("fee") }}</label
                          >
                          <span class="fw-normal">
                            {{ service ? getDisplayAmount(service.price) : "" }}</span
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card mb-5">
                  <div class="card-body">
                    <h3 class="ms-3 mb-5">
                      {{ __("Select Payment Gateway") }}
                    </h3>

                    <div style="width: 100%" class="px-4 mb-5">
                      <Carousel
                        :key="key"
                        :settings="settings"
                        :breakpoints="breakpoints"
                      >
                        <Slide v-for="(gateway, index) in gateways" :key="index">
                          <div
                            :class="{
                              'border border-5 border-warning':
                                form.gateway == gateway.code,
                            }"
                            @click="this.form.gateway = gateway.code"
                          >
                            <img class="" :src="gateway.image" :alt="gateway.name" />
                            <h5 class="">{{ gateway.name }}</h5>
                          </div>
                        </Slide>
                        <template #addons>
                          <Navigation />
                        </template>
                      </Carousel>
                      <div class="ps-0" v-if="this.form.gateway == 'paytm'">
                        <label for="phone" class="text-capitalize mb-3">{{
                          __("phone")
                        }}</label>
                        <input
                          type="text"
                          class="w-100 form-control px-3"
                          v-model="form.phone"
                        />
                      </div>
                    </div>
                    <div class="pe-3 ps-3 mb-3 mt-3">
                      <div class="row align-items-center">
                        <div class="col-md-8">
                            <Button
                          type="button"
                          class="btn btn-secondary px-3 rounded-4 fs-3 fw-bold"
                          @click="
                            onChangeCurrentTab(0, 'back'),
                              (this.paymentScreen = false)
                          "
                        >

                          {{ __("Back") }}
                        </Button>
                          <button
                            type="button"
                            class="btn btn-primary rounded-4 fs-3 fw-bold ms-3"
                            data-secret="{{ $intent->client_secret }}"
                            @click="addFundRequest"
                            :disabled="
                              form.processing || !form.gateway || form.gateway == 'wallet'
                            "
                          >
                            {{ __("make payment") }}
                          </button>
                          <button
                            v-if="
                              parseInt(this.$page.props.settings.enable_wallet_system)
                            "
                            type="button"
                            @click="payUsingWallet"
                            class="btn btn-dark ms-3 rounded-4 fs-3 fw-bold"
                          >
                            {{ __("Pay Using Wallet") }}
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                </div>
                <div
                  class="tab-pane"
                  :class="{ 'show active': currentTabIndex == 2 }"
                  id="final-tab-pane"
                  role="tabpanel"
                  aria-labelledby="final-tab"
                  tabindex="0"
                >
                <div v-if="paymentDone" class="thank-you-section mt-5">
                  <div class="p-3 mb-4 rounded-lg bg-primary-light">
                    <div class="row align-items-center">
                      <div class="col-12 p-4 text-center">
                        <i class="bi bi-envelope fs-1"></i>
                        <p class="fs-4 mb-0 fw-bold">{{ __("Thank You") }}</p>
                        <p class="fs-4 mb-0">
                          {{ __("For Your Payment") }}
                          {{ service ? getDisplayAmount(service.price) : "" }}
                        </p>
                        <p class="fs-4 mb-0">
                          {{ __("Service No") }} {{ bookedServiceDetail.id }}
                        </p>
                        <p class="fs-4 mb-0">
                          {{ __("Payment Status") }}
                          {{ bookedServiceDetail.is_paid ? "Paid" : "UnPaid" }}
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="mt-5 text-center">
                    <Link :href="route('service_log')" class="btn btn-primary">
                      <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                      </span>
                      <span class="button-text">{{ __("View Service Log") }}</span>
                    </Link>
                  </div>
                </div>
                </div>
              </div>
              <!-- <Wizard
                @change="onChangeCurrentTab"
                navigable-tabs
                hideButtons
                :custom-tabs="[
                  {
                    title: 'Book Service',
                  },
                  {
                    title: 'Add Payment Details',
                  },
                  {
                    title: 'Thanks for Booking',
                  },
                ]"
              >
              </Wizard> -->
              <div v-if="currentTabIndex === 0">
                <div class="row" v-if="fetching">
                  <div class="col-md-12">
                    <div class="skeleton-structure">
                      <div class="row mb-3">
                        <div class="col-12 d-flex justify-content-end">
                          <div
                            style="width: 160px; height: 40px"
                            class="bg-skeleton mb-2 p-3 rounded-5"
                          ></div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="card shadow p-3 border-0" style="max-width: initial">
                          <div
                            style="width: 180px; height: 20px"
                            class="bg-skeleton mb-2 p-3 me-2 rounded-2 mb-4"
                          ></div>

                          <div>
                            <ul class="list-unstyled d-flex flex-wrap">
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                              <li
                                style="width: 160px; height: 50px"
                                class="bg-skeleton mb-2 p-3 me-2 rounded-5"
                              ></li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 d-flex justify-content-end">
                          <div
                            style="width: 160px; height: 40px"
                            class="bg-skeleton mb-2 p-3 rounded-5"
                          ></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import CalenderSkeleton from "@/Components/Skeleton/CalenderSkeleton.vue";
import Wizard from "form-wizard-vue3";
import { ref } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Carousel, Navigation, Pagination, Slide } from "vue3-carousel";
import PagesHeading from "../../Components/PagesHeading.vue";

export default defineComponent({
  components: {
    AppLayout,
    Navbar,
    PagesHeading,
    PageHeader,
    ValidationErrors,
    CalenderSkeleton,
    Wizard,
    Link,
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },
  props: ["service", "gateways"],
  created() {
    this.selected_date = ref(new Date());
  },
  data() {
    return {
      breadcrums: [
        {
          id: 1,
          name: this.__("home"),
          link: "/",
        },
        {
          id: 2,
          name: this.__("services"),
          link: "/services",
        },
        {
          id: 3,
          name: this.__("book a service"),
          link: "",
        },
      ],
      transaction: null,
      cardElement: {},
      currentTabIndex: 0,
      selected_date: "",
      paymentScreen: false,
      fetching: false,
      attachment_view: "",
      form: this.$inertia.form({
        service_id: this.service.id,
        date: this.selected_date,
        question: "",
        attachment: "",
        gateway: null,
        phone: null,
      }),
      windowWidth: window.innerWidth,
      isMobileScreen: true,
      paymentDone: false,
      bookedServiceDetail: "",
      settings: {
        itemsToShow: 1,
        snapAlign: "start",
        autoplay: false,
      },
      progress: 25,
      activeSteps: [true, false, false],
      // breakpoints are mobile firstTop Featured Doctors
      // any settings not specified will fallback to the carousel settings
      breakpoints: {
        // 700px and up
        700: {
          itemsToShow: 2,
          snapAlign: "start",
        },
        // 1024 and up
        1024: {
          itemsToShow: 2,
          snapAlign: "start",
        },
        1240: {
          itemsToShow: 4,
          snapAlign: "start",
        },
      },
      key: 1,
    };
  },
  methods: {
    payUsingWallet() {
      this.form.gateway = "wallet";
      this.addFundRequest();

    },
    addFundRequest() {
      this.form.date = this.selected_date;
      this.form.post(this.route("patients.book_service"), {
        onSuccess: (resp) => {
          if (this.form.gateway == "wallet") {
            this.bookedServiceDetail = resp.props.response_data.service;
            this.onChangeCurrentTab(3),'continue';
            this.paymentDone = true;
            window.location.replace(
              this.route("service_log")
            );
          } else {
            window.location.replace(
              this.route("user.addFund.confirm", {
                transaction: resp.props.response_data.fund.transaction,
              })
            );
            this.bookedServiceDetail = resp.props.response_data.service;
            this.onChangeCurrentTab(3,'continue');
            this.paymentDone = true;
          }
        },
      });
    },
    onChangeCurrentTab(index, name) {
      this.currentTabIndex = index;
      //   this.progress = ((index + 1) / this.activeSteps.length) * 100;
      if (name == "continue") {
        this.progress = this.progress + 27;
      }
      if (name == "back") {
        this.progress = this.progress - 27;
      }
      if (name == "success") {
        this.progress = this.progress + 50;
      }

      this.activeSteps = this.activeSteps.map((_, i) => i <= index);
      this.key++;
    },
    processFile(event) {
      this.form.attachment = event.target.files[0];
      if (event.target.files[0].type.includes("image")) {
        this.attachment_view = URL.createObjectURL(event.target.files[0]);
      } else {
        this.attachment_view = "";
      }
    },
    async continuePaymentScreen() {
      this.paymentScreen = true;
    },
    onResize() {
      this.windowWidth = window.innerWidth;
      if (this.windowWidth < 768) {
        this.isMobileScreen = false;
      }
    },
  },

  mounted() {
    this.key++;
    this.$nextTick(() => {
      window.addEventListener("resize", this.onResize);
    });
  },
  beforeDestroy() {
    window.removeEventListener("resize", this.onResize);
  },
});
</script>

<style lang="scss" scoped>
.time-slots-list ul li {
  width: 155px;
  text-align: center;
}

.time-slots-list ul li span {
  font-size: 12px;
}
.progress-circle {
  width: 47px;
  height: 47px;
  background-color: #daeaf0;
  border-radius: 50%;
  border: 6px solid #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
}

.progress-circle.active {
  background-color: #294481;
}
</style>
