<template>
  <app-layout title="Appointment">
    <div class="stats">
      <div class="bg-primary">
        <pages-heading
          :textwhite="'true'"
          :heading="this.appointment_type_name"
          :breadcrums="breadcrums"
        ></pages-heading>
      </div>
      <div class="py-5">
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
                        {{ __(this.appointment_type_name) }}
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
                  <div class="row" v-if="!paymentScreen">
                    <div class="col-md-5 mb-4" v-if="is_schedule_required">
                      <h3
                        class="fw-bold text-black fs-2 mb-md-5 mb-3 ms-md-3"
                      >
                        {{ __("Select Date for your schedule") }}
                      </h3>
                      <div class="card shadow p-3">
                        <div class="card-body">
                          <VueDatePicker
                            auto-apply
                            inline
                            :scroll="false"
                            v-model="selected_date"
                            :enable-time-picker="false"
                            :min-date="new Date()"
                            @update:model-value="fetchAvailableSlots"
                          >
                          </VueDatePicker>
                        </div>
                      </div>
                      <div
                        class="d-flex mt-5 px-5 py-4 rounded-3 flex-column stats shadow"
                      >
                        <div class="d-flex align-items-center mb-3">
                          <h2 class="fs-3 fw-bold text-black">
                            {{ __("Selected Date") }}:
                            <span class="fw-normal">{{
                              getFormattedDate(selected_date)
                            }}</span>
                          </h2>
                        </div>
                        <div class="d-flex align-items-center">
                          <h2 class="fs-3 fw-bold text-black">
                            {{ __("Selected Time") }}:
                            <span class="fw-normal">
                              {{ selected_start_time }} -
                              {{ selected_end_time }}</span
                            >
                          </h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-7 mb-4" v-if="is_schedule_required">
                      <h3
                        class="fw-bold text-black fs-2 mb-md-5 mb-3 ms-md-3"
                      >
                        {{ __("Select Available time slots") }}
                      </h3>
                      <!-- <prescription></prescription> -->
                      <div class="card shadow px-md-4 py-md-3">
                        <div class="card-body px-0">
                          <div class="position-relative h-100 pt-3">
                            <div v-if="fetchedSchedule">
                              <div v-if="Object.keys(morningSlots).length > 0">
                                <div
                                  class="d-flex align-items-center gap-4 mb-3 ps-3"
                                >
                                  <h4 class="fs-2 text-black mb-0">
                                    {{ __("Morning") }}
                                  </h4>
                                  <i
                                    class="bi bi-sun-fill text-primary display-6"
                                  ></i>
                                </div>
                                <ul class="list-unstyled mb-4 lists">
                                  <li
                                    class="d-inline-block mx-3 my-2 li"
                                    v-for="(slot, index) in morningSlots"
                                    :key="index"
                                  >
                                    <button
                                      type="button"
                                      class="btn-inactive rounded-4 px-2"
                                      :style="
                                        slot.is_disabled ? 'cursor:no-drop' : ''
                                      "
                                      :class="{
                                        'btn-active':
                                          selected_slot_index === index &&
                                          appointment_time == 'morning_slot',
                                        'btn-disabled': slot.is_disabled,
                                      }"
                                      :disabled="slot.is_disabled"
                                      @click="
                                        selectSlot(index, slot, 'morning_slot')
                                      "
                                    >
                                      <h6 class="text-center fw-bold mb-0">
                                        {{
                                          formatTimeWithoutAMPM(slot.start_time)
                                        }}
                                        to
                                        {{
                                          formatTimeWithoutAMPM(slot.end_time)
                                        }}
                                      </h6>
                                    </button>
                                  </li>
                                </ul>
                              </div>
                              <div
                                v-if="Object.keys(afternoonSlots).length > 0"
                              >
                                <div
                                  class="d-flex align-items-center gap-4 mb-3 ps-3"
                                >
                                  <h4 class="fs-2 text-black mb-0">
                                    {{ __("Afternoon") }}
                                  </h4>
                                  <i
                                    class="bi bi-cloud-moon-fill text-primary display-6"
                                  ></i>
                                </div>
                                <ul class="list-unstyled mb-4 lists">
                                  <li
                                    class="d-inline-block mx-3 my-2 li"
                                    v-for="(slot, index) in afternoonSlots"
                                    :key="index"
                                  >
                                    <button
                                      type="button"
                                      class="btn-inactive rounded-4 px-2"
                                      :style="
                                        slot.is_disabled ? 'cursor:no-drop' : ''
                                      "
                                      :class="{
                                        'btn-active':
                                          selected_slot_index === index &&
                                          appointment_time == 'afternoon_slot',

                                        'btn-disabled': slot.is_disabled,
                                      }"
                                      :disabled="slot.is_disabled"
                                      @click="
                                        selectSlot(
                                          index,
                                          slot,
                                          'afternoon_slot'
                                        )
                                      "
                                    >
                                      <h6 class="text-center fw-bold mb-0">
                                        {{
                                          formatTimeWithoutAMPM(slot.start_time)
                                        }}
                                        to
                                        {{
                                          formatTimeWithoutAMPM(slot.end_time)
                                        }}
                                      </h6>
                                    </button>
                                  </li>
                                </ul>
                              </div>
                              <div v-if="Object.keys(eveningSlots).length > 0">
                                <div
                                  class="d-flex align-items-center gap-4 mb-3 ps-3"
                                >
                                  <h4 class="fs-2 text-black mb-0">
                                    {{ __("Evening") }}
                                  </h4>
                                  <i
                                    class="bi bi-moon-fill text-primary display-6"
                                  ></i>
                                </div>

                                <ul class="list-unstyled mb-0 lists">
                                  <li
                                    class="d-inline-block mx-3 my-2 li"
                                    v-for="(slot, index) in eveningSlots"
                                    :key="index"
                                  >
                                    <button
                                      type="button"
                                      class="btn-inactive rounded-4 px-2"
                                      :style="
                                        slot.is_disabled ? 'cursor:no-drop' : ''
                                      "
                                      :class="{
                                        'btn-active':
                                          selected_slot_index === index &&
                                          appointment_time == 'evening_slot',

                                        'btn-disabled': slot.is_disabled,
                                      }"
                                      :disabled="slot.is_disabled"
                                      @click="
                                        selectSlot(index, slot, 'evening_slot')
                                      "
                                    >
                                      <h6 class="text-center fw-bold mb-0">
                                        {{
                                          formatTimeWithoutAMPM(slot.start_time)
                                        }}
                                        to
                                        {{
                                          formatTimeWithoutAMPM(slot.end_time)
                                        }}
                                      </h6>
                                    </button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div
                              v-else
                              class="position-absolute top-50 start-50 translate-middle"
                            >
                              <div class="text-center">
                                <i
                                  class="bi bi-exclamation-circle-fill fs-1 text-primary"
                                ></i>
                                <p class="fw-normal">
                                  {{
                                    __(
                                      "schedule is not available against this date"
                                    )
                                  }}
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <h3
                            class="fw-bold text-primary fs-4 my-3 ms-0 ms-md-4"
                          >
                            {{ __("ask your question") }}
                          </h3>
                          <div class="mb-3 ms-md-3 mx-md-5">
                            <textarea
                              id="question"
                              class="form-control bg-warning text-black"
                              v-model="form.question"
                              cols="50"
                              rows="6"
                            ></textarea>
                          </div>
                          <label
                            for="form-group"
                            class="mb-3 ms-0 ms-md-4 fw-bold text-primary"
                            >{{ __("attachment") }}</label
                          >
                          <div
                            class="form-group file-select ms-0 p-2 ms-md-4 me-md-5 d-flex flex-md-row flex-column align-items-start justify-content-between align-items-md-center mb-0"
                          >
                            <div class="d-flex align-items-center">
                              <label
                                for="attachment_file"
                                class="btn btn-primary rounded-4 text-white px-5 ms-0 ms-md-2"
                                >{{ __("Select a File") }}</label
                              >
                              <input
                                class="custom-file-input"
                                placeholder="Please Enter"
                                type="file"
                                id="attachment_file"
                                ref="attachment_file"
                                @change="processFile($event)"
                                name="attachment_file"
                                style="display: none"
                              />
                              <img
                                v-if="attachment_view"
                                :src="attachment_view"
                                height="70"
                                width="70"
                                class="ms-3 rounded-4"
                              />
                            </div>
                            <label
                              class="me-2 my-2 my-md-0"
                              style="font-size: 14px"
                              for="info"
                              >{{ __("certificate file validation") }}</label
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- new module2 -->
                    <div class="col-md-12 mb-5">
                      <div class="d-flex justify-content-end gap-4 pt-6">
                        <Link
                          type="button"
                          class="btn btn-secondary fs-2 rounded-4 shadow-find px-4 fw-bold"
                          :href="
                            route('doctor.profile', {
                              user_name: doctor.user_name,
                            })
                          "
                        >
                          <img
                            class="w-icon mb-1 me-2"
                            src="@/images/icons/backicon.png"
                            alt=""
                          />
                          {{ __("Back") }}
                        </Link>
                        <button
                          type="button"
                          class="btn btn-primary fs-2 rounded-4 shadow-find px-4 fw-bold"
                          :disabled="
                            !form.selected_schedule_id && is_schedule_required
                          "
                          @click="
                            continuePaymentScreen(),
                              onChangeCurrentTab(1, 'continue')
                          "
                        >
                          {{ __("Continue") }}

                          <img
                            class="w-icon ms-4"
                            src="@/images/icons/loginbtnicon.png"
                            alt=""
                          />
                        </button>
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
                  <div class="row">
                    <div class="col-md-12 text-center mt-5 mb-5">
                      <h1 class="heading-fs">
                        {{ __("Make Payment and Proceed your appointment") }}
                      </h1>
                      <p class="subheading-fs">
                        {{
                          __(
                            "Discover a wide range of online doctors, specialized in various fields, offering diverse treatments and services. Explore doctor reviews and effortlessly schedule appointments online"
                          )
                        }}
                      </p>
                      <div class="card bg-primary rounded-5 py-4 my-4">
                        <div class="card-body">
                          <div
                            class="d-flex align-items-center flex-md-row flex-column justify-content-between px-4"
                          >
                            <div
                              class="d-flex align-items-center flex-md-row flex-column gap-md-4 gap-3"
                            >
                              <div class="d-flex align-items-center">
                                <h3 class="fs-2 text-white fw-normal mb-0">
                                  {{ __("start time") }}:
                                </h3>
                                <h3 class="fw-bold fs-2 text-white ms-4 mb-0">
                                  {{ selected_start_time ?? "" }}
                                </h3>
                              </div>
                              <div class="d-flex align-items-center">
                                <h3 class="fs-2 text-white fw-normal mb-0">
                                  {{ __("end time") }}:
                                </h3>
                                <h3 class="fw-bold fs-2 text-white ms-4 mb-0">
                                  {{ selected_end_time ?? "" }}
                                </h3>
                              </div>
                              <div class="d-flex align-items-center">
                                <h3 class="fs-2 text-white fw-normal mb-0">
                                  {{ __("Date") }}:
                                </h3>
                                <h3 class="fw-bold fs-2 text-white ms-4 mb-0">
                                  {{ formatDate(this.selected_date) ?? " " }}
                                </h3>
                              </div>
                            </div>
                            <div class="d-flex align-items-center mt-3 mt-md-0">
                              <h3 class="fs-2 text-white fw-normal mb-0">
                                {{ __("total amount") }}:
                              </h3>
                              <h3 class="fw-bold fs-2 text-white ms-4 mb-0">
                                {{
                                  fetchedSchedule
                                    ? getDisplayAmount(fetchedSchedule.fee)
                                    : ""
                                }}
                              </h3>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-5">
                      <Carousel
                        ref="carousel"
                        v-model="currentSlide"
                        :key="key"
                        :settings="settings"
                        :breakpoints="breakpoints"
                      >
                        <Slide
                          v-for="(gateway, index) in gateways"
                          :key="index"
                        >
                          <div
                            :class="{
                              'border border-2 border-primary rounded-3':
                                form.gateway == gateway.code,
                            }"
                            @click="this.form.gateway = gateway.code"
                          >
                            <div
                              class="d-flex align-content-center justify-content-around bg-white py-2 rounded-3 payment-icons"
                            >
                              <img
                                class=""
                                :src="gateway.image"
                                :alt="gateway.name"
                              />
                            </div>
                            <!-- <h6 class="fs-6 mt-2 text-center fw-bold">
                                {{ gateway.name }}
                              </h6> -->
                          </div>
                        </Slide>
                        <template #addons>
                          <navigation />
                        </template>
                      </Carousel>
                    </div>
                    <!-- <div class="mb-3 col-md-12">
                        <label for="exampleFormControlInput1" class="form-label fs-3"
                          ><span class="text-danger">*</span>{{ __("Card Number") }}</label
                        >
                        <div
                          class="input-group bg-white mb-3 rounded-5 overflow-hidden border border-1"
                        >
                          <span class="input-group-text px-5 bg-white" id="basic-addon1"
                            ><img
                              style="
                                width: 75px;
                                height: 40px;
                                border: 1px solid #294481;
                                border-radius: 5px;
                              "
                              src="@/images/icons/razorpay.png"
                              alt=""
                          /></span>
                          <input
                            type="number"
                            class="form-control fs-3"
                            placeholder="Enter the 16 digits card number on the card"
                            aria-label="Username"
                            aria-describedby="basic-addon1"
                          />
                        </div>
                      </div>
                      <div class="mb-3 col-md-4">
                        <label for="exampleFormControlInput1" class="form-label fs-3"
                          ><span class="text-danger">*</span>{{ __("CVV Number") }}</label
                        >
                        <input
                          type="number"
                          class="form-control fs-3 rounded-5 p-3 border border-1"
                          placeholder="12345"
                          aria-label="Username"
                          aria-describedby="basic-addon1"
                        />
                      </div>
                      <div class="mb-3 col-md-4">
                        <label for="exampleFormControlInput1" class="form-label fs-3"
                          ><span class="text-danger">*</span>{{ __("Expiry Date") }}</label
                        >
                        <input
                          type="date"
                          class="form-control fs-3 p-3 rounded-5 border border-1"
                          placeholder="15/5/2025"
                          aria-label="Username"
                          aria-describedby="basic-addon1"
                        />
                      </div>
                      <div class="mb-3 col-md-4">
                        <label for="exampleFormControlInput1" class="form-label fs-3"
                          ><span class="text-danger">*</span>{{ __("Password") }}</label
                        >
                        <input
                          type="password"
                          class="form-control fs-3 p-3 rounded-5 border border-1"
                          placeholder="xxxxxxx"
                          aria-label=""
                          aria-describedby="basic-addon1"
                        />
                      </div> -->
                    <div class="col-md-12 mb-5 book-btn">
                      <div
                        class="d-flex flex-md-row flex-column justify-content-end gap-3 gap-md-4 pt-6"
                      >
                        <Button
                          type="button"
                          class="btn btn-secondary fs-2 rounded-4 shadow-find px-4 fw-bold"
                          @click="
                            onChangeCurrentTab(0, 'back'),
                              (this.paymentScreen = false)
                          "
                        >
                          <img
                            class="w-icon mb-1 me-2"
                            src="@/images/icons/backicon.png"
                            alt=""
                          />
                          {{ __("Back") }}
                        </Button>
                        <button
                          type="button"
                          class="btn btn-primary fs-2 rounded-4 shadow-find px-4 fw-bold"
                          @click="addFundRequest"
                          :disabled="
                            form.processing ||
                            !form.gateway ||
                            form.gateway == 'wallet'
                          "
                        >
                          {{ __("Pay and Proceed") }}

                          <img
                            class="w-icon ms-4"
                            src="@/images/icons/loginbtnicon.png"
                            alt=""
                          />
                        </button>
                        <button
                          v-if="
                            parseInt(
                              this.$page.props.settings.enable_wallet_system
                            )
                          "
                          type="button"
                          @click="payUsingWallet"
                          class="btn btn-secondary fs-2 rounded-4 shadow-find px-4 fw-bold"
                        >
                          {{ __("Pay Using Wallet") }}
                        </button>
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
                  <div v-if="paymentDone" class="thank-you-section my-5">
                    <div class="col-md-12">
                      <div class="card bg-white rounded-4">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12 p-4 text-center">
                              <img src="@/images/icons/done.svg" width="200" />
                              <h1
                                style="font-size: 50px"
                                class="text-black fw-bold mb-5"
                              >
                                {{ __("Thank you for make payment") }}
                              </h1>

                              <h4
                                class="fs-1 fw-normal mb-4"
                                style="color: #696868"
                              >
                                {{ __("Your Appointment Starts") }}
                              </h4>
                              <h1
                                style="font-size: 50px"
                                class="text-black fw-bold"
                              >
                                {{ selected_start_time ?? "" }}
                              </h1>
                              <div class="mt-5 mb-3 text-center">
                                <Link
                                  :href="route('appointment_log')"
                                  class="btn btn-primary rounded-4 px-3 fs-2 fw-bold shadow-find"
                                >
                                  {{ __("View Appointment Log") }}
                                  <img
                                    src="@/images/icons/loginbtnicon.png"
                                    class="w-icon ms-4"
                                    alt=""
                                  />
                                </Link>
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
import { ref } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Carousel, Navigation, Pagination, Slide } from "vue3-carousel";
import PagesHeading from "../../Components/PagesHeading.vue";
import Prescription from "../../Components/Prescription.vue";
import Modal from "@/Components/Modal.vue";

export default defineComponent({
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    ValidationErrors,
    CalenderSkeleton,
    Link,
    Carousel,
    Slide,
    Pagination,
    Navigation,
    PagesHeading,
    Prescription,
    Modal,
  },
  props: [
    "schedule",
    "doctor_id",
    "appointment_type_id",
    "is_schedule_required",
    "doctor",
    "appointment_type_name",
    "gateways",
  ],
  created() {
    this.selected_date = ref(new Date());

    this.fetchedSchedule = this.schedule;
    if (route().params.paymentSuccess) {
      this.bookedAppointmentDetail.id = route().params.appointmentId;
      this.onChangeCurrentTab(2, "success");
      this.paymentDone = true;
    }
  },
  data() {
    return {
      breadcrums: [
        {
          id: 1,
          name: this.__("Home"),
          link: "/",
        },
        {
          id: 2,
          name: this.__("doctor"),
          link: "/doctors",
        },
        {
          id: 3,
          name: `${window.location.pathname.split("/")[3]}`,
          link: `/doctor/profile/${window.location.pathname.split("/")[3]}`,
        },
        {
          id: 3,
          name: this.__(`${window.location.href.split("type=")[1]}`),
          link: `#`,
        },
      ],
      transaction: null,
      cardElement: {},
      currentTabIndex: 0,
      selected_date: "",
      paymentScreen: false,
      fetchedSchedule: "",
      fetching: false,
      selected_slot_index: "",
      selected_start_time: "",
      selected_end_time: "",
      attachment_view: "",
      appointment_time: "",
      form: this.$inertia.form({
        selected_schedule_id: "",
        doctor_id: this.doctor_id,
        date: this.selected_date,
        appointment_type_id: this.appointment_type_id,
        question: "",
        attachment: "",
        gateway: null,
      }),
      windowWidth: window.innerWidth,
      isMobileScreen: true,
      paymentDone: true,
      bookedAppointmentDetail: {},
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
          itemsToShow: 6,
          snapAlign: "start",
        },
        1240: {
          itemsToShow: 6,
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
    formatTimeWithoutAMPM(time) {
      const [hour, minute] = time.split(":");
      const hourInt = parseInt(hour);

      const hour12 = hourInt % 12 || 12;
      return `${hour12}:${minute}`;
    },
    addFundRequest() {
      this.form.date = this.selected_date;
      this.form.post(this.route("patients.book_appointment"), {
        onSuccess: (resp) => {
          if (this.form.gateway == "wallet") {
            this.bookedAppointmentDetail = resp.props.response_data.appointment;
            window.location.replace(
              this.route("appointment_log")
            );
            this.onChangeCurrentTab(3, "continue");
            this.paymentDone = true;
          } else {
            window.location.replace(
              this.route("user.addFund.confirm", {
                transaction: resp.props.response_data.fund.transaction,
              })
            );
            this.bookedAppointmentDetail = resp.props.response_data.appointment;
            this.onChangeCurrentTab(3, "continue");
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
    fetchAvailableSlots() {
      this.form.selected_schedule_id = "";
      this.selected_slot_index = "";
      this.selected_start_time = "";
      this.selected_end_time = "";
      this.appointment_time = "";
      this.fetching = true;
      axios
        .get(
          this.route("getApiAppointmentScheduleSlots", {
            selected_date: this.selected_date,
            doctor_id: this.doctor_id,
            appointment_type_id: this.appointment_type_id,
          })
        )
        .then((res) => {
          this.fetchedSchedule = res.data.data ?? "";
          this.fetching = false;
        });
    },
    selectSlot(index, slot, time) {
      if (
        this.form.selected_schedule_id &&
        this.form.selected_schedule_id == slot.id
      ) {
        this.form.selected_schedule_id = "";
        this.selected_slot_index = "";
        this.selected_start_time = "";
        this.selected_end_time = "";
        this.appointment_time = time;
      } else {
        this.appointment_time = time;
        this.form.selected_schedule_id = slot.id;
        this.selected_slot_index = index;
        this.selected_start_time = slot.start_time;
        this.selected_end_time = slot.end_time;
      }
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
      // this.onChangeCurrentTab(0);
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
  computed: {
    morningSlots() {
      return this.fetchedSchedule.schedule_slots.filter((slot) => {
        const startTime = parseInt(slot.start_time.split(":")[0]);
        return startTime >= 6 && startTime < 12;
      });
    },
    afternoonSlots() {
      return this.fetchedSchedule.schedule_slots.filter((slot) => {
        const startTime = parseInt(slot.start_time.split(":")[0]);
        return startTime >= 12 && startTime < 18;
      });
    },
    eveningSlots() {
      return this.fetchedSchedule.schedule_slots.filter((slot) => {
        const startTime = parseInt(slot.start_time.split(":")[0]);
        return startTime >= 18 && startTime < 24;
      });
    },
  },
});
</script>

<style scoped>
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

input[type="number"]::placeholder {
  font-size: 18px !important;
  color: #999999;
}

input::placeholder {
  font-weight: 400;
  font-size: 16px;
  color: #999999;
}

.progress-circle.active {
  background-color: #294481;
}

table {
  border-spacing: 0 10px;
  /* adjust the value to your liking */
  border-collapse: separate;
}

table tr {
  height: 61px;
  /* increase the height of the table rows */
}

table td {
  vertical-align: middle;
  /* center the text vertically */
}

.table > :not(caption) > * > * {
  padding: 0.5rem 3rem;
}

.btn-inactive {
  width: 178px;
  height: 50px;
  font-size: 16px;
  background-color: #e1eef5;
  color: black;
  outline: none;
  border: none;
  font-weight: 500;
}

.btn-active {
  width: 178px;
  height: 50px;
  font-size: 16px;
  border: 0;
  outline: none;
  background-color: #294481!important;
  color: white !important;
  transition: all 1ms ease-in !important;
}

.btn-disabled {
  background-color: #d3ffcc;
  width: 178px;
  height: 50px;
  font-size: 16px;

  color: black;
  outline: none;
  border: none;
  font-weight: 500;
}
</style>
