<template>
    <section>
      <div class="col-12 text-center mb-3" v-if="services.data.length == 0">
        <record-not-found></record-not-found>
      </div>

      <div class="row mt-5">

        <div
          v-for="(group, dateIndex) in groupedServices"
          :key="dateIndex"
          class="col-lg-12 mb-3"
        >

          <div class="fs-3 fw-bold mb-4 ms-5">
            {{ dateIndex === 0 && isTodayMatched(group[0].date) ? 'Latest' : formatDate(group[0].date) }}
          </div>


          <div
            v-for="(service, index) in group"
            :key="index"
            class="card rounded-6 shadow-none px-4 py-2 border-primary border mb-4"
          >
            <div class="card-body p-0">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <div class="d-flex flex-md-row flex-column justify-content-between">
                    <div class="d-flex align-items-center mb-3 mb-md-0">

                      <div
                        class="rounded-circle ms-1 overflow-hidden"
                        style="width: 105px; height: 105px"
                      >
                        <img
                          v-if="service.doctor_image"
                          class="img-fluid"
                          :src="service.doctor_image"
                          alt="doctor"
                        />
                        <img
                          v-else
                          class="img-fluid"
                          src="@/images/account/default_avatar_men.png"
                          alt="doctor"
                        />
                      </div>

                      <div class="d-flex flex-column ms-4">
                        <h5 v-if="service.doctor_first_name" class="fw-normal text-black fs-2 mb-0">
                          {{ service.doctor_first_name  }}
                        </h5>
                        <h5 v-else class="fw-normal text-black fs-2 mb-0">
                          {{ service.clinic_first_name  }}
                        </h5>
                      </div>
                    </div>

                    <div
                      class="d-flex align-items-center justify-content-md-around px-md-2"
                    >
                      <img src="@/images/icons/Date_range.svg" alt="" />
                      <h4
                        style="font-size: 20px"
                        class="mb-0 text-black opacity-75 fw-normal ms-2"
                      >
                        {{ formatDate(service.date) }}
                      </h4>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 my-2 my-md-0">
                  <div
                    class="d-flex align-items-start align-items-md-center flex-column flex-md-row justify-content-around"
                  >
                  <span class="badge p-2 fs-6 rounded-3 bg-opacity-50" :class="service.is_paid ? 'bg-success' : 'bg-danger'">{{ service.is_paid  ? __("paid") : __("unpaid") }}</span>
                    <Link
                      :href="
                        route('patient.service_log.detail', {
                          id: service.id,
                        })
                      "
                    >
                      <img src="@/images/icons/eye.svg" alt="" />
                    </Link>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>

  <script>
  import { defineComponent } from "vue";
  import { Head, Link } from "@inertiajs/inertia-vue3";


  export default defineComponent({
    components: {
      Head,
      Link,

    },
    props: ["services"],
    data() {
      return {
        latest: true,
      };
    },
    computed: {
      groupedServices() {

        const groups = {};
        this.services.data.forEach((service) => {
          const date = service.date;
          if (!groups[date]) {
            groups[date] = [];
          }
          groups[date].push(service);
        });
        return Object.values(groups);
      },
    },
    methods: {
      isTodayMatched(date) {
        const today = new Date().toISOString().slice(0, 10);
        return today === date;
      },
      formatDate(date) {
        const options = { year: "numeric", month: "short", day: "numeric" };
        return new Date(date).toLocaleDateString(undefined, options);
      },
    },
  });
  </script>

  <style>
  .bg-stats {
    background-color: #e5f0f9;
  }
  </style>
