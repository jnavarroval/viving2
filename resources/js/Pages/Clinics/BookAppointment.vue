<template>
  <app-layout title="My Profile">
    <div class="bg-primary">
      <pages-heading
        :textwhite="'true'"
        :heading="this.appointment_type_name"
        :breadcrums="breadcrums"
      ></pages-heading>
    </div>
    <div class="stats">
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
                                      :class="{
                                        'btn-active':
                                          selected_slot_index === index &&
                                          appointment_time == 'evenning_slot',

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

                    <div class="col-md-12 mb-5">
                      <div class="d-flex justify-content-end gap-4 pt-6">
                        <Link
                          type="button"
                          class="btn btn-secondary fs-2 rounded-4 shadow-find px-4 fw-bold"
                          :href="
                            route('clinic.profile', {
                              user_name: clinic.user_name,
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
                            " Discover a wide range of online doctors, specialized in various fields, offering diverse treatments and services. Explore doctor reviews and effortlessly schedule appointments online"
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
                                  {{ __("date") }}:
                                </h3>
                                <h3 class="fw-bold fs-2 text-white ms-4 mb-0">
                                  {{ formatDate(this.selected_date) ?? " " }}
                                </h3>
                              </div>
                            </div>
                            <div class="d-flex align-items-center">
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

                    <div class="col-md-12 mb-5">
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
                                {{ __("Your Video call Starts") }}
                              </h4>
                              <h1
                                style="font-size: 50px"
                                class="text-black fw-bold"
                              >
                                00:05
                              </h1>
                              <div class="mt-5 mb-3 text-center">
                                <Link
                                  :href="route('appointment_log')"
                                  class="btn btn-primary rounded-4 px-3 fs-2 fw-bold shadow-find"
                                >
                                  {{ __("Connect Again") }}
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

    <!-- <div class="row">
          <div class="col-12">
            <div class="d-flex justify-content-center align-items-center">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 position-relative pt-7">
                      <div class="progress" style="background-color: #daeaf0">
                        <div class="progress-bar bg-primary rounded-pill" role="progressbar"
                          :style="{ width: progress + '%' }" aria-valuenow="progress" aria-valuemin="0"
                          aria-valuemax="100"></div>
                        <div class="progress-circle position-absolute shadow" v-for="(active, index) in activeSteps"
                          :key="index" :class="{ active: active }" :style="{
          bottom: '-13px',
          left: `${15 + index * 20}%`,
        }">
                          <i class="bi bi-check text-white"></i>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex align-items-center position-relative mt-5" style="margin-bottom: 7rem">
                      <h3 class="fs-3 fw-normal position-absolute" style="left: 10%">
                        {{ __("Schedule Appointment") }}
                      </h3>
                      <h3 class="fs-3 fw-normal position-absolute" style="left: 32%">
                        {{ __("Make Payment") }}
                      </h3>
                      <h3 class="fs-3 fw-normal position-absolute" style="left: 54%">
                        {{ __("Video Call") }}
                      </h3>
                      <h3 class="fs-3 fw-normal position-absolute" style="left: 77%">
                        {{ __("Rating & Review") }}
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

    <!-- <h2 class="fs-2 text-center">
              <span class="fw-normal"
                >{{ __("Hello") }} {{ $page.props.auth.user.name }} |
              </span>
              <span class="fw-bold">{{ __("make an appointment") }}</span>
            </h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item">
                  <a href="#" class="text-dark text-decoration-none">Home</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  Make An Appointment
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <div class="section pt-0">
        <div class="container pb-5">
        <div class="row">
          <div class="col-md-12">
            <div class="d-flex justify-content-center align-items-center">
                <ul
              class="nav justify-content-center mb-4"
              id="appointmentTab"
              role="tablist"
            >
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link px-4"
                  disabled
                  id="info-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#info-tab-pane"
                  type="button"
                  role="tab"
                  aria-controls="info-tab-pane"
                  aria-selected="true"
                >
                  <div class="d-flex flex-column">
                    <span
                      class="rounded-circle border border-primary d-flex align-items-center text-black justify-content-center  m-auto"
                      style="width: 80px; height: 80px"
                      :class="{ 'bg-primary text-white': currentTabIndex == 0 || currentTabIndex == 1 || currentTabIndex == 2 }"
                    >
                    <i class="bi bi-calendar2-day-fill display-6"></i>
                    </span>

                    <span class="text-primary mt-1 fw-bold fs-1">{{
                      __("Schedule Appointment")
                    }}</span>
                    <p class="fs-6 text-black mt-1">
                      Our team of highly skilled attorneys <br />comprises
                      seasoned professionals
                    </p>
                  </div>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link px-4"
                  disabled
                  id="payment-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#payment-tab-pane"
                  type="button"
                  role="tab"
                  aria-controls="payment-tab-pane"
                  aria-selected="false"
                >
                  <div class="d-flex flex-column">
                    <span
                      class="rounded-circle border border-primary d-flex justify-content-center text-black align-items-center  m-auto"
                      style="width: 80px; height: 80px"
                      :class="{ 'bg-primary text-white':  currentTabIndex == 1 || currentTabIndex == 2 }"
                    >
                    <i class="bi bi-credit-card-fill display-6 "></i>
                    </span>

                    <span class="text-primary mt-1 fs-1 fw-bold">{{
                      __("Make a Payment")
                    }}</span>
                    <p class="fs-6 mt-1 text-black">
                      Our team of highly skilled attorneys<br />comprises
                      seasoned professionals.
                    </p>
                  </div>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link px-4"

                  disabled
                  id="final-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#final-tab-pane"
                  type="button"
                  role="tab"
                  aria-controls="final-tab-pane"
                  aria-selected="false"
                >
                  <div class="d-flex flex-column">
                    <span
                      class="rounded-circle border border-primary d-flex align-items-center text-black justify-content-center  m-auto"
                      style="width: 80px; height: 80px"
                      :class="{ 'bg-primary text-white': currentTabIndex == 2 }"
                      >
                      <i class="bi bi-check-lg display-6"></i>
                </span>
                    <span class="fs-1 mt-1 fw-bold text-primary">{{
                      __("Booking Confirmation")
                    }}</span>
                    <p class="fs-6 mt-1 text-black">
                      Our team of highly skilled attorneys<br />comprises
                      seasoned professionals.
                    </p>
                  </div>
                </button>
              </li>
            </ul>
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
                        <div
                          class="card shadow p-3 border-0"
                          style="max-width: initial"
                        >
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

                <div class="row" v-if="!paymentScreen">
                  <div class="col-md-4 mb-4" v-if="is_schedule_required">
                    <div class="card h-100">
                      <div class="card-body">
                        <h3 class="fw-bold ms-md-5 ms-2 text-primary fs-4 mb-3 py-2">
                          {{ __("Select the Date") }}
                        </h3>
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
                  </div>
                  <div class="col-md-8 mb-4"  v-if="is_schedule_required">
                    <div class="card shadow-sm h-100">
                      <div class="card-body ms-3">
                        <h3 class="fw-bold text-primary fs-4 mb-3 py-2">
                          {{ __("Book a time slots") }}
                        </h3>
                        <div class="position-relative h-100 pt-3">
        <div v-if="fetchedSchedule" style="margin: -8px">
            <div v-if="Object.keys(morningSlots).length > 0">
          <h4>{{ __("Morning Slots") }}</h4>
          <ul class="list-unstyled mb-0 lists">
            <li
              class="d-inline-block me-3 li"
              v-for="(slot, index) in morningSlots"
              :key="index"
            >
              <button
                type="button"
                class="btn shadow-sm rounded-3 px-2"
                :class="{
                  'btn-primary': selected_slot_index === index && appointment_time=='morning_slot',
                  'bg-danger text-white pe-none': slot.is_disabled,
                }"
                :disabled="slot.is_disabled"
                @click="selectSlot(index, slot,'morning_slot')"
              >
              <td>{{ formatTimeWithoutAMPM(slot.start_time) }} to {{ formatTimeWithoutAMPM(slot.end_time) }}</td>
              </button>
            </li>
          </ul>
        </div>
        <div v-if="Object.keys(afternoonSlots).length > 0">
          <h4>{{ __("Afternoon Slots") }}</h4>
          <ul class="list-unstyled mb-0 lists">
            <li
              class="d-inline-block me-3 li"
              v-for="(slot, index) in afternoonSlots"
              :key="index"
            >
              <button
                type="button"
                class="btn shadow-sm rounded-3 px-2"
                :class="{
                  'btn-primary': selected_slot_index === index && appointment_time=='afternoon_slot',
                  'bg-danger text-white pe-none': slot.is_disabled,
                }"
                :disabled="slot.is_disabled"
                @click="selectSlot(index, slot ,'afternoon_slot')"
              >
              <td>{{ formatTimeWithoutAMPM(slot.start_time) }} to {{ formatTimeWithoutAMPM(slot.end_time) }}</td>
              </button>
            </li>
          </ul>
        </div>
        <div v-if="Object.keys(eveningSlots).length > 0">
          <h4>{{ __("Evening Slots") }}</h4>
          <ul class="list-unstyled mb-0 lists">
            <li
              class="d-inline-block me-3 li"
              v-for="(slot, index) in eveningSlots"
              :key="index"
            >
              <button
                type="button"
                class="btn shadow-sm rounded-3 px-2"
                :class="{
                  'btn-primary': selected_slot_index === index && appointment_time=='evening_slot',
                  'bg-danger text-white pe-none': slot.is_disabled,
                }"
                :disabled="slot.is_disabled"
                @click="selectSlot(index, slot ,'evening_slot')"
              >

                <td>{{ formatTimeWithoutAMPM(slot.start_time ) }} to {{ formatTimeWithoutAMPM(slot.end_time) }}</td>
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
            <i class="bi bi-exclamation-circle-fill fs-1 text-primary"></i>
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
                        <div

                          class="position-relative h-100 pt-3"
                        >
                          <div v-if="fetchedSchedule" style="margin: -8px">
                            <ul
                              class="list-unstyled mb-0 lists"

                            >
                              <li
                                class="d-inline-block me-3 li "
                                v-for="(
                                  slot, index
                                ) in fetchedSchedule.schedule_slots"
                                :key="index"
                              >
                                <button
                                  type="button"
                                  class="btn shadow-sm rounded-3 px-2"
                                  :class="{
                                    'btn-primary':
                                      selected_slot_index === index,
                                    'bg-danger text-white pe-none':
                                      slot.is_disabled,
                                  }"
                                  :disabled="slot.is_disabled"
                                  @click="selectSlot(index, slot)"
                                >
                                  {{ slot.start_time }} - {{ slot.end_time }}
                                </button>
                              </li>
                            </ul>
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
                        <h3 class="fw-bold text-primary fs-4 my-3 ms-0 ms-md-4">
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
                        <label for="form-group" class="mb-3 ms-0 ms-md-4 fw-bold text-primary">{{   __("attachment") }}</label>
                        <div class="form-group file-select ms-0 py-1 ms-md-4 me-md-5 d-flex align-items-center mb-0">
                        <div class="d-flex align-items-center">
                        <label for="attachment_file" class="btn btn-secondary text-white px-5 ms-0 ms-md-2">{{ __("Select a File") }}</label>
                        <input
                            class="custom-file-input"
                            placeholder="Please Enter"
                            type="file"
                            id="attachment_file"
                            ref="attachment_file"
                            @change="processFile($event)"
                            name="attachment_file"
                            style="display: none;"
                          />
                          <img
                            v-if="attachment_view"
                            :src="attachment_view"
                            height="70"
                            width="70"
                            class="ms-3 rounded-4"
                          />
                        </div>
                          <label class="me-2" style="font-size: 14px;" for="info">{{__('certificate file validation')}}</label>
                        </div>
                        </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="card shadow-sm">
                      <div class="card-body px-md-5">
                        <div class="row align-items-center">
                          <div
                            class="col-md-3 border-end"
                          >
                            <div class="d-flex ms-0 ms-md-2 gap-4 align-items-center">
                                <img v-if="clinic.image" class="profile rounded-4" :src="clinic.image" alt="clinic img">
                                <img v-else class="clinic-pic rounded-4" src="@/images/account/default_avatar_men.png"/>
                               <i class="bg-primary rounded-3 p-4"></i>
                              <div
                                class="d-flex py-2 mb-2 flex-column"
                                style="width: fit-content"
                              >
                                <div >
                                    <span class="fs-4 text-primary fw-bold"
                                      >{{ clinic.first_name ?? "" }}
                                      {{ clinic.last_name ?? "" }}</span
                                    >
                                </div>
                                <span class="fw-semibold text-black fs-5">{{ clinic.experience }} Year Experience</span>
                              </div>

                            </div>
                          </div>
                          <div
                            class="col-md-3 border-end "
                          >
                            <div class="d-flex py-2 justify-content-start justify-content-md-center">
                              <div
                                class="d-flex flex-column"
                                style="width: fit-content"
                              >
                                <div class="fs-5 text-primary">
                                  <span class="fw-bold text-black"
                                    >{{ __("Appointment Type") }}: &nbsp;</span
                                  >
                                  {{
                                    fetchedSchedule
                                      ? getDisplayAmount(fetchedSchedule.fee)
                                      : ""
                                  }}
                                </div>
                                <div class="fs-5 mt-2 text-primary">
                                  <span class="fw-bold text-black"
                                    >{{ __("fee") }}: &nbsp;</span
                                  >
                                  {{
                                    fetchedSchedule
                                      ? getDisplayAmount(fetchedSchedule.fee)
                                      : ""
                                  }}
                                </div>
                              </div>
                            </div>
                          </div>

                          <div
                            class="col-md-3"
                          >
                            <div class="d-flex justify-content-start justify-content-md-center">
                              <div
                                class="d-flex flex-column"
                                style="width: fit-content"
                              >
                                <div class="fs-5 text-primary">
                                  <span class="fw-bold text-black"
                                    >{{ __("Date") }}: &nbsp;</span
                                  >
                                  {{ getFormattedDate(selected_date) }}
                                </div>
                                <div v-if="selected_start_time" class="fs-5 mt-2 text-primary">
                                  <span class="fw-bold text-black"
                                    >{{ __("Time") }}: &nbsp;</span
                                  >
                                  {{ selected_start_time }} -
                                  {{ selected_end_time }}
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="d-flex justify-content-end pe-0 pe-md-4 mt-3 mt-md-0">
                              <div
                                class="d-flex flex-column continue"

                              >
                                <button

                                  type="button"
                                  class="btn btn-primary rounded-pill px-5 fw-bold"
                                  :disabled="
                                    !form.selected_schedule_id &&
                                    is_schedule_required
                                  "
                                  @click="
                                    continuePaymentScreen(),
                                      onChangeCurrentTab(1)
                                  "
                                >
                                  {{ __("Continue") }}
                                </button>
                              </div>
                            </div>
                          </div>
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
                <div class="row">
                  <div class="col-md-6">
                    <div class="card border border-1 shadow-sm border-info bg-transparent">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-content-center">
                            <h3 class="fw-bold text-primary fs-1 mb-3"> {{ __("Select Payment Methods") }} </h3>
                            <div class="d-flex gap-2 ">
                            <button class= "btn btn-info btn-sm  rounded-5" @click=prev>Prev</button>
                            <button class="btn btn-primary btn-sm  rounded-5" @click=next>Next</button>

               </div>


 </div>


                   </div>

                    </div>
                  </div>
                  <div class="col-md-7">
                    <div
                      class="card bg-transparent border border-info border-1 p-3"
                    >
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12">
                            <span class="fw-bold fs-2 ps-3 py-3 text-primary">{{
                              __("Select Payment Methods")
                            }}</span>

                            <span class="fs-5">{{ doctor.first_name ?? "" }} {{ doctor.last_name ?? ""}}</span>
                          </div>
                          <div class="col-12 mt-4">
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
                                    'border border-1 border-primary rounded-3':
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
                                  <h6 class="fs-6 mt-2 text-center fw-bold">
                                    {{ gateway.name }}
                                  </h6>
                                </div>
                              </Slide>

                              <template #addons>
                                <Navigation />
                              </template>


                            </Carousel>

                            <hr />
                          </div>

                          <div class="col-12">

                            <div class="d-flex justify-content-between mb-2">
                             <input class="fs-4 border-0 py-2 rounded-3 ps-3 shadow-lg" type="text" placeholder="Card Details" style="width: 210px;"/>
                             <input class="fs-4 border-0 py-2 rounded-3 ps-3 shadow-lg" type="text" placeholder="Cvv" style="width: 140px;"/>
                             <input class="fs-4 border-0 py-2 rounded-3 ps-3 shadow-lg" type="text" placeholder="Expiry Date" style="width: 140px;"/>
                            </div>



                            </div>

                          <div
                            class="col-12 mt-2 mb-5 text-center align-content-center"
                            v-if="parseInt($page.props.settings.enable_wallet_system)"
                          >
                            <button
                             @click="this.form.gateway = 'wallet'"
                              class="btn rounded-3 text-primary fw-bold fs-4 btn-sm btn-white"
                            >
                              <span class="mx-2"
                                ><img
                                  src="@/images/icons/wallet.png"
                                  width="20"
                                  height="20"
                              /></span>
                              {{  __("complete your transaction using your wallet") }}
                            </button>
                          </div>

                          <div class="d-grid mb-2">
                            <button
                            @click="addFundRequest" :disabled="form.processing || !form.gateway"
                              class="btn btn-primary rounded-pill fw-bold fs-5"
                            >
                             {{ __("Pay Now") }}
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-5">
                    <div class="card mt-4 mt-md-0 p-md-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12">
                            <span class="fw-bold fs-2 ps-2 py-3 text-primary">{{
                              __("Your Appointment Summary")
                            }}</span>

                            <span class="fs-5">{{ doctor.first_name ?? "" }} {{ doctor.last_name ?? ""}}</span>

                            <hr />
                            <div class="col-12 px-2">
                              <div
                                class="d-flex justify-content-between align-content-center py-2"
                              >
                                <div>
                                  <span
                                    class="fw-bolder text-black fs-5 d-block mb-1"
                                    >{{ __("Selected Clinic") }}</span
                                  >
                                  <span class="fs-5 text-black d-block">{{ clinic.first_name ?? "" }} {{ clinic.last_name ?? "" }}</span>
                                </div>
                                <div>
                                  <img class="img-fluid" src="@/images/icons/User.png" />
                                </div>
                              </div>
                            </div>
                            <hr />
                            <div class="col-12 px-2">
                              <div
                                class="d-flex justify-content-between align-content-center py-2"
                              >
                                <div>
                                  <span
                                    class="fw-bolder text-black fs-5 d-block mb-1"
                                    >{{ __("Date and Time") }}</span
                                  >
                                  <span class="fs-5 text-black d-block"> {{ getFormattedDate(selected_date) }} </span>
                                </div>

                                <div>
                                  <img class="img-fluid" src="@/images/icons/calendar.png" />
                                </div>
                              </div>
                            </div>
                            <hr />

                            <div class="col-12 px-2">
                              <div
                                class="d-flex justify-content-between align-content-center py-2"
                              >
                                <div>
                                  <span
                                    class="fw-bolder text-black  fs-5 d-block mb-1"
                                    >{{ __("Selected Payment Method") }}</span
                                  >
                                  <span v-if="form.gateway"
                                    class="fs-5 text-black d-block"
                                    >{{ form.gateway.toUpperCase() }}</span
                                  >
                                </div>

                                <div>
                                  <img class="img-fluid" src="@/images/icons/payment.png" />
                                </div>
                              </div>
                            </div>
                            <hr />
                            <div class="col-12 py-2">
                              <span
                                class="fw-bold px-2 d-block text-black fs-5"
                                >{{ __("Total Fees") }}</span
                              >
                              <span
                                class="fs-2 px-2 fw-bold d-block text-primary"
                                >{{
                                  fetchedSchedule
                                    ? getDisplayAmount(fetchedSchedule.fee)
                                    : ""
                                }}</span
                              >
                            </div>
                          </div>
                           <span class="fs-5">{{ getFormattedDate(selected_date)}}</span>
                          <div class="col-12  px-3 d-flex flex-row justify-content-between align-content-center">

                                <div class="d-flex flex-column ">
                                    <span class="fw-bold me-3">{{ __("Date and Time") }}</span>
                                <span class="fw-bold me-3">{{ __("16th January 2024") }}</span>
                                </div>
                          <span class="fs-5">{{ selected_start_time }} to {{ selected_end_time }}</span>
                          </div>

                          <div class="col-12">
                                <span class="fw-bold me-3">{{ __("fee") }}</span>
                                <span class="fs-5">{{fetchedSchedule ? getDisplayAmount(fetchedSchedule.fee) : '' }}</span>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                      <button type="button" class="btn btn-primary" @click="onChangeCurrentTab(0),  this.paymentScreen = false;">{{ __("back") }}</button>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-primary"  @click="addFundRequest" :disabled="form.processing || !form.gateway">
                                {{ __("make payment") }}
                    </button>
                  </div>
                  <div class="col-md-2">
                    <button type="button" @click="this.form.gateway = 'wallet'" class="btn btn-info ms-3">
                                {{ __("Pay Using Wallet") }}
                    </button>
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
                    <div
                      class="row justify-content-center align-content-center"
                    >
                      <div class="col-md-7">
                        <div
                          class="card bg-transparent border border-info border-1"
                        >
                          <div class="card-body">
                            <div class="row">
                              <div class="col-12 p-4 text-center">
                                <img
                                  src="@/images/icons/thankyou.png"
                                  width="160"
                                  height="160"
                                />
                                <p class="fs-1 mb-1 fw-bold">
                                  {{ __("Thank You") }}
                                </p>
                                <p class="fs-5 mb-0">
                                  {{ __('Your payment has been completed.') }}<br />
                                  {{ __("Click the button below to view your appointment log.") }}
                                </p>
                                {{ __("For Your Payment") }} {{ fetchedSchedule ? getDisplayAmount(fetchedSchedule.fee) : '' }}
                                <p class="fs-4 mb-0">
                                {{ __("Appointment No") }} {{ bookedAppointmentDetail.id }}
                                </p>
                                <p class="fs-4 mb-0">
                                {{ __("Payment Status") }}: Paid
                                </p>

                                <div class="d-grid mt-5 mb-3 text-center">
                                  <Link
                                    :href="route('appointment_log')"
                                    class="btn btn-sm px-2 btn-primary"
                                  >
                                    <span class="circle" aria-hidden="true">
                                      <span class="icon arrow"></span>
                                    </span>
                                    <span class="button-text fs-5">{{
                                      __("View Appointment Log")
                                    }}</span>
                                  </Link>
                                </div>
                              </div>

                              <div class="col-12 mt-5 text-center">
                                   <button @click="
                                    continuePaymentScreen(), onChangeCurrentTab()" class="btn rounded-pill w-100 btn-sm btn-primary fw-bold fs-4" >View Appointment Log</button>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-12">
                                <span class="fw-bold fs-2 ps-2 text-primary">{{
                                  __("Your Appointment Summary")
                                }}</span>
                                <span class="fs-5">{{ doctor.first_name ?? "" }} {{ doctor.last_name ?? ""}}</span>
                                <hr />

                                <div class="col-12 px-2">
                                  <div
                                    class="d-flex justify-content-between align-content-center"
                                  >
                                    <div>
                                      <span
                                        class="fw-bolder text-black fs-5 d-block"
                                        >{{ __("Selected Doctor") }}</span
                                      >
                                      <span
                                        class="fs-5 text-black d-block"
                                        >{{ clinic.first_name ?? "" }} {{ clinic.last_name ?? "" }}</span
                                      >
                                    </div>
                                    <div>
                                      <img src="@/images/icons/User.png" />
                                    </div>
                                  </div>
                                </div>

                                <hr />
                                <div class="col-12 px-2">
                                  <div
                                    class="d-flex justify-content-between align-content-center"
                                  >
                                    <div>
                                      <span
                                        class="fw-bolder text-black fs-5 d-block"
                                        >{{ __("Date and Time") }}</span
                                      >
                                      <span
                                        class="fs-5 text-black d-block"
                                        >{{ getFormattedDate(selected_date) }}</span
                                      >
                                    </div>

                                    <div>
                                      <img src="@/images/icons/calendar.png" />
                                    </div>
                                  </div>
                                </div>
                                <hr />

                                <div class="col-12 px-2">
                                  <div
                                    class="d-flex justify-content-between align-content-center"
                                  >
                                    <div>
                                      <span
                                        class="fw-bolder text-black  fs-5 d-block"
                                        >{{
                                          __("Selected Payment Method")
                                        }}</span
                                      >
                                      <span v-if="form.gateway"
                                        class="fs-5 text-black  d-block"
                                        >{{ form.gateway.toUpperCase() }}</span
                                      >
                                    </div>

                                    <div>
                                      <img src="@/images/icons/payment.png" />
                                    </div>
                                  </div>
                                </div>
                                <hr />
                                <div class="col-12">
                                  <span
                                    class="fw-bold px-2 d-block text-black fs-5"
                                    >{{ __("Total Fees") }}</span
                                  >
                                  <span
                                    class="fs-2 px-2 fw-bold d-block text-primary"
                                    >{{
                                      fetchedSchedule
                                        ? getDisplayAmount(fetchedSchedule.fee)
                                        : ""
                                    }}</span
                                  >
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
      </div>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <Wizard
                @change="onChangeCurrentTab"
                :verticalTabs="isMobileScreen"
                scrollable-tabs
                hideButtons
                :custom-tabs="[
                  {
                    title: 'Schedule Appointment',
                  },
                  {
                    title: 'Add Payment Details',
                  },
                  {
                    title: 'Thanks for Booking',
                  },
                ]"
              >
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
                          <div
                            class="card shadow p-3 border-0"
                            style="max-width: initial"
                          >
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
                  <div class="row" v-else-if="!paymentScreen">
                    <div class="col-12" v-if="is_schedule_required">
                      <div class="d-md-flex justify-content-between mb-4">
                        <label for="starts_at" class="fs-4">{{__("please select date and time")}}</label>
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#exampleModal"
                        >
                          <i class="bi bi-calendar-date me-2"></i> {{__("Select Date")}}
                        </button>
                      </div>
                    </div>
                    <div class="col-12 time-slots-list">
                      <div class="card p-3 mb-4">
                        <div v-if="is_schedule_required">
                          <div v-if="fetchedSchedule">
                            <ul class="list-unstyled d-flex flex-wrap mb-0">
                              <li
                                style="cursor: pointer"
                                class="my-1 p-2 me-2 rounded border border-primary"
                                v-for="(
                                  slot, index
                                ) in fetchedSchedule.schedule_slots"
                                :key="index"
                                :class="{ 'bg-primary bg-opacity-50':selected_slot_index === index, 'bg-danger pe-none': slot.is_disabled}"
                                @click="selectSlot(index, slot)"
                              >
                                <button type="button" class="btn p-0" style="font-size: 12px;"
                                  >{{ slot.start_time }}
                                  --
                                  {{ slot.end_time }}</button
                                >
                              </li>
                            </ul>
                          </div>
                          <div class="p-5 text-center" v-else>
                            <i
                              class="bi bi-exclamation-circle-fill fs-1 text-primary"
                            ></i>
                            <br />
                            <h4 class="fw-normal">
                              {{
                                __("schedule is not available against this date")
                              }}
                            </h4>
                          </div>
                        </div>
                        <div v-else>
                          <div v-if="fetchedSchedule">
                            <div>
                              <div
                                class="d-flex align-items-center justify-content-center py-4"
                              >
                                <div class="d-flex">
                                  <h3 class="mb-0 text-capitalize me-3 fw-bold">
                                    {{ __("fee") }}:
                                  </h3>
                                  <span class="fs-4">
                                      {{ fetchedSchedule ? getDisplayAmount(fetchedSchedule.fee) : '' }}</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="p-5 text-center" v-else>
                            <i
                              class="bi bi-exclamation-circle-fill fs-1 text-primary"
                            ></i>
                            <br />
                            <h4 class="fw-normal">
                              {{
                                __("schedule is not available against this date")
                              }}
                            </h4>
                          </div>
                        </div>
                      </div>
                      <div class="p-3 card">
                        <div class="row align-items-center">
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-4">
                                <div
                                  class="border-end border-2 border-primary pe-4"
                                  style="width: fit-content"
                                >
                                  <label
                                    class="fs-6 d-block fw-bold text-capitalize"
                                  >
                                    {{ __("law firm name") }}</label
                                  >
                                  <span class="small fw-normal"
                                    >{{ clinic.first_name ?? "" }}
                                    {{ clinic.last_name ?? "" }}</span
                                  >
                                </div>
                              </div>
                              <div class="col-md-2">
                                <label class="fs-6 fw-bold text-capitalize">
                                  {{ __("fee") }}</label
                                >
                                <br />
                                <span class="small fw-normal"> {{fetchedSchedule ? getDisplayAmount(fetchedSchedule.fee) : ''}}</span>

                              </div>

                              <div class="col-md-3">
                                <label class="fs-6 fw-bold text-capitalize">
                                  {{ __("date") }}</label
                                >
                                <br />
                                <span class="small fw-normal">{{
                                  getFormattedDate(selected_date)
                                }}</span>
                              </div>
                              <div class="col-md-3" v-if="is_schedule_required">
                                <label class="fs-6 fw-bold text-capitalize">
                                  {{ __("slot") }}</label
                                >
                                <br />
                                <span class="small fw-normal"
                                  >{{ selected_start_time }} --
                                  {{ selected_end_time }}</span
                                >
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12 mt-5" >
                      <h5 class="mb-4 text-capitalize">
                        {{ __("ask your question") }}
                      </h5>
                      <div class="card rounded p-3">
                        <div class="ps-0">
                          <label for="question" class="text-capitalize mb-3">{{
                            __("question")
                          }}</label>
                          <textarea
                            class="w-100 form-control px-3"
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
                              class="btn btn-primary"
                              :disabled="!form.selected_schedule_id && is_schedule_required"
                              @click="
                                continuePaymentScreen(), onChangeCurrentTab(1)
                              "
                            >
                              {{ __("continue") }}
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div v-if="currentTabIndex === 1">
                  <div class="p-3 card">
                        <div class="row align-items-center">
                          <div class="col-md-10">
                            <div class="row">
                              <div class="col-md-4">
                                <div
                                  class="border-end border-2 border-primary pe-4"
                                  style="width: fit-content"
                                >
                                  <label
                                    class="fs-6 d-block fw-bold text-capitalize"
                                  >
                                    {{ __("law firm name") }}</label
                                  >
                                  <span class="small fw-normal"
                                    >{{ clinic.first_name ?? "" }}
                                    {{ clinic.last_name ?? "" }}</span
                                  >
                                </div>
                              </div>
                              <div class="col-md-2">
                                <label class="fs-6 fw-bold text-capitalize">
                                  {{ __("fee") }}</label
                                >
                                <br />
                                <span class="small fw-normal"> {{fetchedSchedule ? getDisplayAmount(fetchedSchedule.fee) : ''}}</span>
                              </div>

                              <div class="col-md-3">
                                <label class="fs-6 fw-bold text-capitalize">
                                  {{ __("date") }}</label
                                >
                                <br />
                                <span class="small fw-normal">{{
                                  getFormattedDate(selected_date)
                                }}</span>
                              </div>
                              <div class="col-md-3" v-if="is_schedule_required">
                                <label class="fs-6 fw-bold text-capitalize">
                                  {{ __("slot") }}</label
                                >
                                <br />
                                <span class="small fw-normal"
                                  >{{ selected_start_time }} --
                                  {{ selected_end_time }}</span
                                >
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <h3>{{ __("Select Payment Gateway") }}</h3>

                      <div style="width: 840px;" class="px-4">
                          <Carousel :key="key"  :settings="settings" :breakpoints="breakpoints">
                              <Slide v-for="(gateway,index) in gateways" :key="index">
                                 <div :class="{'border border-5 border-warning': form.gateway == gateway.code}" @click="this.form.gateway = gateway.code">
                                  <img class="" :src="gateway.image" :alt="gateway.name">
                                  <h5 class="">{{ gateway.name }}</h5>
                                 </div>
                              </Slide>
                              <template #addons>
                                  <Navigation />
                              </template>
                          </Carousel>
                      </div>
                      <div class="pe-3 ps-3 mb-3" >
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <button
                                type="button"
                                class="btn btn-primary"
                                data-secret="{{ $intent->client_secret }}"
                                @click="addFundRequest"
                                :disabled="form.processing || !form.gateway"
                            >
                                {{ __("make payment") }}
                            </button>
                            <button v-if="parseInt($page.props.settings.enable_wallet_system)" type="button" @click="this.form.gateway = 'wallet'" class="btn btn-info ms-3">
                                {{ __("Pay Using Wallet") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="currentTabIndex === 3">
                  <div v-if="paymentDone" class="thank-you-section mt-5">
                    <div class="p-3 mb-4 rounded-lg bg-primary-light">
                      <div class="row align-items-center">
                        <div class="col-12 p-4 text-center">
                          <i class="bi bi-envelope fs-1"></i>
                          <p class="fs-4 mb-0 fw-bold"> {{ __("Thank You") }}</p>
                          <p class="fs-4 mb-0">
                            {{ __("For Your Payment") }} {{ fetchedSchedule ? getDisplayAmount(fetchedSchedule.fee) : '' }}
                          </p>
                          <p class="fs-4 mb-0">
                              {{ __("Appointment No") }} {{ bookedAppointmentDetail.id }}
                          </p>
                          <p class="fs-4 mb-0">
                            {{ __("Payment Status") }}
                            {{
                              bookedAppointmentDetail.is_paid ? "Paid" : "UnPaid"
                            }}
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="mt-5 text-center">
                      <Link
                        :href="route('appointment_log')"
                        class="btn btn-primary"
                      >
                        <span class="circle" aria-hidden="true">
                          <span class="icon arrow"></span>
                        </span>
                        <span class="button-text">{{
                          __("View Appointment Log")
                        }}</span>
                      </Link>
                    </div>
                  </div>
                </div>
              </Wizard>
            </div>
          </div>
        </div>

         Modal
         <div
          class="modal fade"
          id="exampleModal"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content bg-transparent border-0">
              <div class="modal-body">
                <div class="form-group mb-3">
                  <div class="card shadow d-flex align-items-center p-3">
                    <VueDatePicker
                      inline
                      auto-apply
                      v-model="selected_date"
                      @update:model-value="fetchAvailableSlots"
                    ></VueDatePicker>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
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
  },
  props: [
    "schedule",
    "clinic_id",
    "appointment_type_id",
    "is_schedule_required",
    "clinic",
    "appointment_type_name",
    "gateways",
  ],
  created() {
    this.selected_date = ref(new Date());
    this.fetchedSchedule = this.schedule;
    if (route().params.paymentSuccess) {
      this.bookedAppointmentDetail.id = route().params.appointmentId;
      this.onChangeCurrentTab(2);
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
          link: `/doctors/${window.location.pathname.split("/")[3]}`,
        },
        {
          id: 3,
          name: `${window.location.href.split("type=")[1]}`,
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
        clinic_id: this.clinic_id,
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
            this.onChangeCurrentTab(3);
            this.paymentDone = true;
          } else {
            window.location.replace(
              this.route("user.addFund.confirm", {
                transaction: resp.props.response_data.fund.transaction,
              })
            );
            this.bookedAppointmentDetail = resp.props.response_data.appointment;
            this.onChangeCurrentTab(3);
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
            clinic_id: this.clinic_id,
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
