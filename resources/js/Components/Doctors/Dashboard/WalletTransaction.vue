<template>
    <div class="container">
        <div class="col-md-12">
            <div class="card bg-primary w-100 rounded-20 position-relative">
                <img src="@/images/icons/waves.svg" class="position-absolute right-50" alt=""
                    style="right: 0px; top: 64px; width: 390px" />
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center gap-3">
                                <div class="img-card rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 110px;height: 102px;">

                                                    <h1 class="display-5" style="color: #ffb703;">{{ getDefaultCurrencySymbol()}}</h1>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="fs-3 text-white fw-normal">
                                        {{ __("My Balance") }}
                                    </h6>
                                    <h3 class="fs-1 text-white fw-bold">
                                        {{ getDefaultCurrencySymbol() }}
                                        {{ this.$page.props.balance }}
                                    </h3>
                                    <!-- <h6 class="fs-3 text-white fw-normal">
                    Show account balance in
                    <span style="color: #fec738">USD</span>
                  </h6> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button
                                class="btn bg-white text-primary fs-3 rounded-4 shadow-find px-4 fw-bold btn1 d-flex align-items-center"
                                data-bs-toggle="modal" :data-bs-target="'#withdrawAmountModal'"
                                :disabled="current_balance == 0" @click="walletPage">
                                <img class="w2-icon me-2" src="@/images/icons/tick.svg" alt="wallet-icon" />
                                {{ __("Withdraw") }}
                            </button>
                            <button v-if="$page.props.auth.logged_in_as == 'student'"
                                class="btn bg-white text-primary fs-3 rounded-4 shadow-find px-4 fw-bold btn1 d-flex align-items-center"
                                @click="renderCarousal" data-bs-toggle="modal" :data-bs-target="'#walletAddModal'">
                                <img class="w2-icon me-2" src="@/images/icons/tick.svg" alt="wallet-icon" />
                                {{ __("Add top up") }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-7">
                <div class="card h-100 shadow">
                    <div
                        class="d-flex align-items-center justify-content-between px-4 border-bottom border-opacity-50 border-primary py-3">
                        <div class="d-flex align-items-center gap-3">
                            <h3 class="fs-3 fw-bold text-black mb-0">
                                {{ __("revenue stats") }}
                            </h3>
                        </div>

                        <input type="date" id="date" v-model="selectedDate" @change="handleDateChange" style="
                background: transparent;
                border: 0;
                box-shadow: none;
                width: 121px;
                color: #294481;
              " />
                    </div>
                    <div class="card-body" v-if="loaded">
                        <Bar ref="chart" :options="chartOptions" :data="chartData" />
                    </div>
                    <div class="text-center" v-else>
                        {{ __("no transaction found") }}
                    </div>
                </div>
            </div>
            <div class="col-md-5 ps-md-2">
                <div class="card shadow mt-3 mt-md-0">
                    <div class="card-body p-0" v-if="this.$page.props.transactions.data.length > 0">
                        <div class="px-4 py-2 border-bottom border-primary border-black mb-3">
                            <h3 class="fw-bold fs-3 mt-2">{{ __("transactions") }}</h3>
                        </div>
                        <div class="d-flex align-items-center mb-4 justify-content-between mx-3"
                            v-for="(element, index) in this.$page.props.transactions.data" :key="index">
                            <div class="d-flex flex-column">
                                <div class="d-flex">
                                    <h3 style="color: rgb(105, 104, 104); max-width: 150px"
                                        class="fw-bold d-inline-block text-truncate fs-4 mb-0">
                                        {{ element.meta.details }}
                                    </h3>
                                </div>
                                <p style="color: #696868" class="fs-4 fw-normal mb-0 mt-1">
                                    {{ element.type }} -
                                    {{ getFormattedDateOnly(element.created_at) }}
                                </p>
                            </div>
                            <div class="mb-4 me-2">
                                <h3 style="color: #268f3d" class="fs-4 fw-bold">
                                    <span :class="element.confirmed ? 'text-success' : 'text-danger'">
                                        {{ getDefaultCurrencySymbol() }}{{ element.amount }}
                                    </span>
                                </h3>
                            </div>
                        </div>

                        <!-- <div class="d-flex align-items-center justify-content-between px-3 mb-3">
                  <div class="d-flex align-items-center">
                    <span
                      style="background-color: #f2786b"
                      class="name-tag d-flex justify-content-center align-items-center fw-bold fs-3"
                    >
                      j
                    </span>
                    <div class="d-flex flex-column ms-3">
                      <h3 style="color: #696868" class="fw-bold fs-3 mb-0">John Doe</h3>
                      <p style="color: #696868" class="fs-5 fw-normal mb-0">
                        Lorum Ipsum ...
                      </p>
                    </div>
                  </div>
                  <div>
                    <h3 style="color: #268f3d" class="fs-4 fw-bold">$50</h3>
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-between px-3 mb-3">
                  <div class="d-flex align-items-center">
                    <span
                      style="background-color: #bf6bf2"
                      class="name-tag d-flex justify-content-center align-items-center fw-bold fs-3"
                    >
                      j
                    </span>
                    <div class="d-flex flex-column ms-3">
                      <h3 style="color: #696868" class="fw-bold fs-3 mb-0">John Doe</h3>
                      <p style="color: #696868" class="fs-5 fw-normal mb-0">
                        Lorum Ipsum ...
                      </p>
                    </div>
                  </div>
                  <div>
                    <h3 style="color: #268f3d" class="fs-4 fw-bold">$50</h3>
                  </div>
                </div> -->

                        <div class="d-flex justify-content-center">
                            <Button @click="walletPage" style="background-color: #f4f9fd"
                                class="rounded-pill fs-4 fw-bold text-paragraphcolor py-2 border border-primary w-100 m-3">
                                {{ __("show all") }}
                            </Button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { Bar } from "vue-chartjs";
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
} from "chart.js";

ChartJS.register(
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
);

export default defineComponent({
    name: "wallettransaction",
    components: {
        Bar,
    },
    data() {
        return {
            week_days: [],
            selectedDate: this.getTodayDate(),
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

    mounted() {
        this.getLastWeekTransaction();
    },

    methods: {
        walletPage() {
            this.$inertia.replace(this.route("wallet"));
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

        getLastWeekTransaction() {
            const date = this.selectedDate || new Date().toISOString().split("T")[0];

            axios
                .post(this.route("dashboard.last_week.transaction"), { date })
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
    },
});
</script>

<style></style>
