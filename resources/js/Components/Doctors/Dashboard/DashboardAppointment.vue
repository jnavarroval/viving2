<template>
  <section>
    <div class="card rounded-20 shadow">
      <div class="card-body px-0">
        <div
          class="d-flex dashboard-status flex-md-row flex-column align-items-center justify-content-between px-md-5 border-bottom border-primary pb-3 pt-2"
        >
          <h3 class="text-black fs-3 mb-0 fw-bold">
            {{ __("Appointments") }}
          </h3>
          <ul class="nav nav-pills mb-0 mt-3 mt-md-0" id="pills-tab" role="tablist">
            <li  class="nav-item" role="presentation">
              <button
              style="color: #DFAC28;"
                class="nav-link active fs-3"
                id="pills-pending-tab"
                data-bs-toggle="pill"
                data-bs-target="#pills-pending"
                type="button"
                role="tab"
                aria-controls="pills-pending"
                aria-selected="true"
              >
                {{ __("Pending") }}
              </button>
            </li>
            <li class="nav-item " role="presentation">
              <button
                class="nav-link text-success fs-3"
                id="pills-active-tab"
                data-bs-toggle="pill"
                data-bs-target="#pills-active"
                type="button"
                role="tab"
                aria-controls="pills-active"
                aria-selected="false"
              >
                {{ __("Accepted") }}
              </button>
            </li>
            <li class="nav-item " role="presentation">
              <button
                class="nav-link text-danger fs-3"
                id="pills-cancelled-tab"
                data-bs-toggle="pill"
                data-bs-target="#pills-cancelled"
                type="button"
                role="tab"
                aria-controls="pills-cancelled"
                aria-selected="false"
              >
                {{ __("Cancelled") }}
              </button>
            </li>
          </ul>
        </div>
        <div class="tab-content p-3" id="pills-tabContent">
          <div
            class="tab-pane fade show active"
            id="pills-pending"
            role="tabpanel"
            aria-labelledby="pills-pending-tab"
          >
            <table
              class="table table-borderless"
              v-if="this.$page.props.appointments.pending.length > 0"
            >
              <!-- :href="route('doctor.appointment_log.detail', { type: 'clinic' })" -->
              <thead class="bg-primary text-white">
                <tr class="border-0">
                  <th class="bg-primary text-white" scope="col">Name</th>
                  <th class="bg-primary text-white" scope="col">Date & Time</th>
                  <th class="bg-primary text-white" scope="col">Fee</th>
                  <th class="bg-primary text-white" scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(ele, index) in this.$page.props.appointments.pending"
                  :key="index"
                >
                  <th
                    style="color: #696868 !important"
                    scope="row"
                    class="fs-4 bg-transparent border-bottom"
                  >
                    {{ ele.patient_name }}
                  </th>
                  <td
                    style="color: #696868"
                    class="fs-4 border-bottom"
                    v-if="ele.start_time"
                  >
                    {{ this.getFormattedCurrentDate(ele.date) }}
                    {{ this.formatTimeWithAMPM(ele.start_time) }}
                  </td>
                  <td style="color: #696868" class="fs-4 border-bottom" v-else>-</td>
                  <td style="color: #696868" class="fs-4 border-bottom">
                    {{ this.getDisplayAmount(ele.fee) }}
                  </td>

                  <!-- <button class="bg-transparent border-0">
                        <img src="@/images/icons/del.svg" width="20" alt="" />
                      </button> -->

                  <td class="border-bottom">
                    <a
                      :href="route('doctor.appointment_log.detail', { id: ele.id })"
                      class="bg-transparent border-0"
                    >
                      <img src="@/images/icons/eye2.svg" width="25" alt="" />
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>

            <div v-else>
              <div class="text-center fs-2">
                {{ __("no appointments found") }}
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="pills-active"
            role="tabpanel"
            aria-labelledby="pills-active-tab"
          >
            <table
              class="table tabel-borderless"
              v-if="this.$page.props.appointments.accept.length > 0"
            >
              <thead class="bg-primary text-white">
                <tr class="border-0">
                  <th class="bg-primary text-white" scope="col">Name</th>
                  <th class="bg-primary text-white" scope="col">Date & Time</th>
                  <th class="bg-primary text-white" scope="col">Start Date & Time</th>
                  <th class="bg-primary text-white" scope="col">Fee</th>
                  <th class="bg-primary text-white" scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(ele, index) in this.$page.props.appointments.accept"
                  :key="index"
                >
                  <th
                    style="color: #696868 !important"
                    scope="row"
                    class="bg-transparent fs-4"
                  >
                    {{ ele.patient_name }}
                  </th>
                  <td style="color: #696868" class="fs-4" v-if="ele.date">
                    {{ this.getFormattedCurrentDate(ele.date) }} {{}}
                  </td>

                  <td style="color: #696868" class="fs-4" v-if="ele.start_time">
                    {{ this.getFormattedCurrentDate(ele.start_time) }} {{}}
                  </td>
                  <td style="color: #696868" class="fs-4">
                    <!-- <img src="@/images/icons/PdfFile.svg" alt="" /> -->
                    {{ this.getDisplayAmount(ele.fee) }}
                  </td>
                  <td class="border-bottom">
                    <a
                      :href="route('doctor.appointment_log.detail', { id: ele.id })"
                      class="bg-transparent border-0"
                    >
                      <img src="@/images/icons/eye2.svg" width="25" alt="" />
                    </a>
                    <!-- <button class="bg-transparent border-0">
                        <img src="@/images/icons/del.svg" width="20" alt="" />
                      </button> -->
                  </td>
                </tr>
              </tbody>
            </table>

            <div v-else>
              <div class="text-center fs-2">
                {{ __("no appointments found") }}
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="pills-cancelled"
            role="tabpanel"
            aria-labelledby="pills-cancelled-tab"
          >
            <table
              class="table tabel-borderless"
              v-if="this.$page.props.appointments.reject.length > 0"
            >
              <thead class="bg-primary text-white">
                <tr class="border-0">
                  <th class="bg-primary text-white" scope="col">Name</th>
                  <th class="bg-primary text-white" scope="col">Date & Time</th>

                  <th class="bg-primary text-white" scope="col">Fee</th>
                  <th class="bg-primary text-white" scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(ele, index) in this.$page.props.appointments.reject"
                  :key="index"
                >
                  <th scope="row" class="text-black bg-transparent opacity-25 fs-4">
                    {{ ele.patient_name }}
                  </th>
                  <td class="text-black opacity-25 fs-4" v-if="ele.start_time">
                    {{ this.getFormattedCurrentDate(ele.date) }} {{}}
                  </td>
                  <td>
                    {{ this.getDisplayAmount(ele.fee) }}
                  </td>
                  <td class="text-black opacity-25 fs-4">
                    <a
                      :href="route('doctor.appointment_log.detail', { id: ele.id })"
                      class="bg-transparent border-0"
                    >
                      <img src="@/images/icons/eye2.svg" width="25" alt="" />
                    </a>
                    <!-- <button class="bg-transparent border-0">
                        <img src="@/images/icons/del.svg" width="20" alt="" />
                      </button> -->
                  </td>
                </tr>
              </tbody>
            </table>

            <div v-else>
              <div class="text-center fs-2">
                {{ __("no appointments found") }}
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-end">
            <Link
              :href="route('appointment_log')"
              class="btn btn-primary rounded-4 px-3 fw-bold shadow-find"
            >
              {{ __("view all") }}
            </Link>
          </div>
        </div>
      </div>
    </div>
    <div class="card shadow mt-4">
      <div class="d-flex align-items-center justify-content-between p-4">
        <div class="d-flex align-items-center gap-3">
          <h3 class="fs-3 fw-bold text-black mb-0">
            {{ __("Appointment Status") }}
          </h3>
          <h3 class="fs-3 fw-bold text-muted mb-0">{{ __("Last Week") }}</h3>
        </div>

        <input
          type="date"
          id="date"
          v-model="selectedDate"
          @change="handleDateChange"
          style="
            background: transparent;
            border: 0;
            box-shadow: none;
            width: 121px;
            color: #294481;
          "
        />
      </div>
      <div class="card-body" v-if="loaded">
        <Bar ref="chart" :options="chartOptions" :data="chartData" />
      </div>
    </div>
  </section>
</template>

<script>
import { defineComponent } from "vue";
import { Bar } from "vue-chartjs";
import { Link } from "@inertiajs/inertia-vue3";

import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale,
} from "chart.js";
import axios from "axios";

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

export default defineComponent({
  name: "DashboardAppointments",
  props: [""],
  components: {
    Bar,
    Link,
  },

  created() {
    this.getLastWeekAppointment();
  },

  data() {
    return {
      week_days: [],
      selectedDate: this.getTodayDate(), // Holds the selected date value
      appointment_count: [],
      loaded: false,
      chartData: {
        labels: [], // Dynamically filled
        datasets: [
          {
            label: "Appointments", // General label for dataset
            backgroundColor: "rgba(55, 132, 166)",
            borderColor: "rgba(55, 132, 166)",
            pointBackgroundColor: "rgba(75,192,192,1)",
            pointBorderColor: "#fff",
            borderRadius: {
              topLeft: 10,
              topRight: 10,
              bottomLeft: 50,
              bottomRight: 50,
            },
            barThickness: 25,
            data: [0, 0, 0, 0, 0, 0, 18], // Dynamically filled
          },
        ],
      },
      chartOptions: {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
          padding: {
            bottom: 20,
          },
        },
        scales: {
          y: {
            beginAtZero: true,
          },
          x: {
            grid: {
              display: false,
            },
          },
        },
      },
      last_7_days_appointment: [],
    };
  },

  methods: {
    getLastWeekAppointment() {
      const date = this.selectedDate || new Date().toISOString().split("T")[0];

      axios
        .post(this.route("dashboard.last_week.appointment"), { date })
        .then((res) => {
          const appointmentData = res.data.data;

          // Extract the days and appointment counts
          const days = appointmentData.map((item) => item.day);
          const counts = appointmentData.map((item) => item.count);
          this.chartData.labels = days;
          this.chartData.datasets[0].data = counts;
          this.$nextTick(() => {
            if (this.$refs.chart && this.$refs.chart.chart) {
              this.$refs.chart.chart.update();
            } else {
              console.error("Chart instance not found.");
            }
          });
          this.loaded = true;
        })

        .catch((error) => {
          console.error("Error fetching appointment data:", error);
        });
    },
    handleDateChange(event) {
      this.loaded = false;
      this.getLastWeekAppointment(event.target.value);
    },
    getTodayDate() {
      const today = new Date();
      const year = today.getFullYear();
      const month = String(today.getMonth() + 1).padStart(2, "0");
      const day = String(today.getDate()).padStart(2, "0");
      return `${year}-${month}-${day}`;
    },
  },
});
</script>

<style scoped>
.table > :not(caption) > * > * {
  padding: 1rem 0.6rem !important;
}

table {
  text-align: center;
}

table th:first-child {
  border-radius: 10px 0 0 10px;
}

table th:last-child {
  border-radius: 0px 10px 10px 0px;
}
.nav-link.active {
  color: #fff !important;
  background-color: #DFAC28;
}

.nav-link.active.fs-3[style*="color: yellow"] {
  background-color: #DFAC28!important;
  color: white !important;
}

.nav-link.active.fs-3.text-success {
  background-color: #198754 !important;
}

.nav-link.active.fs-3.text-danger {
  background-color: #dc3545 !important;
}
</style>
