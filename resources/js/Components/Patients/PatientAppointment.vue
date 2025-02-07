<template>
    <section>
        <div class="bg-primary">
            <pages-heading :textwhite="'true'" :heading="'my appointments'" :breadcrums="breadcrums"></pages-heading>
        </div>
        <div class="stats p-6">
            <div class="container mt-md-5 p-md-0">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="nav nav-pills appoint-navs gap-2 gap-md-3 fs-4 fw-bold" id="v-pills-tab"
                            role="tablist" aria-orientation="vertical">
                            <li class="nav-item" role="presentation" @click="() => (currentTab = appIndex)"
                                v-for="(status, appIndex) in appointment_status" :key="appIndex">
                                <button class="nav-link text-dark" :class="{
                                    active: currentTab === appIndex,
                                }" :id="'pills-appointment-tab-' + appIndex" data-bs-toggle="pill"
                                    :data-bs-target="'#pills-home-' + appIndex" type="button" role="tab"
                                    aria-controls="pills-pending" aria-selected="true"
                                    @click="getPaginatedData(false, status.status_code)">
                                    <div>{{ __(status.display_name) }}</div>
                                </button>
                            </li>
                        </div>
                    </div>
                    <div class="col-md-5 right-side-bars p-md-0">
                        <div class="d-flex mt-3 mt-md-0 gap-3 align-items-md-center flex-column flex-md-row">
                            <select v-model="filter.column"
                                class="form-select shadow-none rounded-4 fs-3 text-black border-primary border"
                                aria-label="Select Filter">
                                <option value selected>
                                    {{ __("select") }}
                                    {{ __("filter") }}
                                </option>
                                <option v-for="col in this.columns" :key="col.id" :value="col.value">
                                    {{ col.name }}
                                </option>
                            </select>
                            <div v-if="filter.column == 'date'" class="form-group me-md-2">
                                <input type="date" v-model="filter.search"
                                    class="w-100 shadow-none rounded-4 border border-primary form-control px-3" />
                            </div>
                            <div v-else-if="filter.column == 'start_time'" class="form-group me-md-2">
                                <input type="time" v-model="filter.search"
                                    class="w-100 shadow-none rounded-4 border border-primary form-control px-3" />
                            </div>
                            <div v-else-if="filter.column == 'end_time'" class="form-group me-md-2">
                                <input type="time" v-model="filter.search"
                                    class="w-100 shadow-none rounded-4 border border-primary form-control px-3" />
                            </div>

                            <div v-else class="form-group me-md-1">
                                <input v-model="filter.search"
                                    class="w-100 fs-3 shadow-none form-control rounded-4 px-3 border-primary border"
                                    style="width: 300px" :placeholder="__('search')" type="text" />
                            </div>

                            <div>
                                <button type="button" class="btn btn-primary d-flex px-4 rounded-4 me-2 w-100 fs-3"
                                    @click="getPaginatedData(false)">
                                    {{ __("search") }}
                                    <img src="@/images/icons/loginbtnicon.png" width="30" class="ms-3" alt="" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container mt-5" v-if="fetching">
                    <SideTabsPageSkeleton></SideTabsPageSkeleton>
                </div>
                <div class="container py-4" v-else>
                    <patient-appointment-list-card :appointments="appointments"></patient-appointment-list-card>
                    <div class="col-12 mt-4">
                        <TablePagination @onPageChange="onPageChange" :meta="appointments.meta">
                        </TablePagination>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Table from "@/Components/Shared/DataTable/Table.vue";
import TableTHead from "@/Components/Shared/DataTable/TableTHead.vue";
import TablePagination from "@/Components/Shared/DataTable/TablePagination.vue";
import PaginationMixin from "@/Mixins/PaginationMixin.vue";
import TableSkeleton from "@/Components/Skeleton/TableSkeleton.vue";
import SideTabsPageSkeleton from "@/Components/Skeleton/SideTabsPageSkeleton.vue";
import PatientAppointmentListCard from "@/Components/Patients/PatientAppointmentListCard.vue";
import Breadcrums from "../../Components/Shared/Breadcrums.vue";
import PagesHeading from "../../Components/PagesHeading.vue";

export default defineComponent({
    components: {
        Head,
        AppLayout,
        ValidationErrors,
        Link,
        Table,
        TableTHead,
        TablePagination,
        TableSkeleton,
        PatientAppointmentListCard,
        PagesHeading,
        SideTabsPageSkeleton,
        Breadcrums,
    },
    mixins: [PaginationMixin],
    props: ["appointment_status"],
    data() {
        return {
            appointments: {},
            currentTab: 0,
            status_code: 1,
            fetching: false,
            key: 1,
            columns: [
                {
                    id: 1,
                    name: this.__("doctor"),
                    value: "doctor.first_name",
                    searchable: false,
                    sortable: false,
                },
                {
                    id: 2,
                    name: this.__("Date"),
                    value: "date",
                    searchable: true,
                    sortable: true,
                },
                {
                    id: 3,
                    name: this.__("start time"),
                    value: "start_time",
                    searchable: false,
                    sortable: true,
                },
                {
                    id: 4,
                    name: this.__("end time"),
                    value: "end_time",
                    searchable: false,
                    sortable: true,
                },
                {
                    id: 5,
                    name: this.__("paid"),
                    value: "is_paid",
                    searchable: false,
                    sortable: false,
                },
            ],
            breadcrums: [
                {
                    id: 1,
                    name: this.__("Home"),
                    link: "/",
                },
                {
                    id: 2,
                    name: this.__("my appointments"),
                    link: "",
                },
            ],
        };
    },
    async created() {
        this.filter.status_code = this.status_code;
        await this.getAppointmentFilterData(false);
    },
    methods: {
        async getPaginatedData(loading_more = false, status_code) {
            if (status_code) {
                this.status_code = status_code;
            }
            this.filter.status_code = this.status_code;
            await this.getAppointmentFilterData(loading_more);
        },
        getAppointmentFilterData(loading_more) {
            this.fetching = true;
            axios
                .post(this.route("getApiFilterAppointmentLogs"), this.filter)
                .then((res) => {
                    const data = res.data.data;

                    if (loading_more) {
                        this.appointments.data = this.appointments.data.concat(data.data);
                    } else {
                        this.appointments.data = data.data;
                    }
                    this.appointments.links = data.links;
                    this.appointments.meta = data.meta;
                    this.fetching = false;
                });
        },
    },
});
</script>
