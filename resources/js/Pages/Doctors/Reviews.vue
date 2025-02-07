<template>
    <app-layout title="My Profile">
        <div class="bg-primary">
            <pages-heading :textwhite="'true'" :heading="`${doctor.name} ${__n('Review')}`"
                :breadcrums="breadcrums"></pages-heading>
        </div>
        <div class="stats">
            <div class="section pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-5"></div>
                        <div class="col-12" v-if="fetching">
                            <div class="row">
                                {{ __("fetching") }}
                            </div>
                        </div>
                        <div class="col-12" v-if="!fetching">
                            <div v-if="reviews.data.length > 0" class="row mb-5 mx-0">
                                <div v-for="review in reviews.data" class="col-md-4">
                                    <doctor-review-card :add_col="true" :key="review.id"
                                        :review="review"></doctor-review-card>
                                </div>
                            </div>
                            <div v-else class="row mb-5 mx-0">
                                <div class="col-12 text-center mb-3">
                                    <record-not-found></record-not-found>
                                </div>
                            </div>
                            <div class="row" v-if="reviews.meta.last_page != this.filter.page">
                                <div class="col-md-12 d-flex align-items-center justify-content-center">
                                    <button @click="loadMore()" class="btn btn-primary position-relative"
                                        :disabled="loading_more">
                                        <span :class="{
                                            loader: loading_more,
                                        }" class="position-absolute"></span>
                                        {{ __("load more") }}
                                    </button>
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
import PaginationMixin from "@/Mixins/PaginationMixin.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import DoctorReviewCard from "@/Components/Doctors/DoctorReviewCard.vue";
import RecordNotFound from "../../Components/Shared/RecordNotFound.vue";
import PagesHeading from "../../Components/PagesHeading.vue";

export default defineComponent({
    mixins: [PaginationMixin],
    components: {
        AppLayout,
        Navbar,
        PageHeader,
        DoctorReviewCard,
        RecordNotFound,
        PagesHeading,
    },
    props: ["doctor"],
    created() { },
    mounted() {
        this.onSearch();
    },
    data() {
        return {
            reviews: {},
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

            ],
        };
    },
    methods: {
        async getPaginatedData(loading_more = false) {
            await this.getDoctorReviews(loading_more);
        },
        getDoctorReviews(loading_more) {
            axios
                .post(
                    this.route("getApiDoctorReviews", {
                        user_name: this.doctor.user_name,
                    }),
                    this.filter
                )
                .then((res) => {
                    const data = res.data.data;
                    if (loading_more) {
                        this.reviews.data = this.reviews.data.concat(data.data);
                    } else {
                        this.reviews.data = data.data;
                    }
                    this.reviews.links = data.links;
                    this.reviews.meta = data.meta;
                    this.fetching = false;
                });
        },
    },
});
</script>
