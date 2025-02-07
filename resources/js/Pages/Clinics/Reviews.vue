<template>

    <app-layout title="My Profile">
        <!-- <template #header>
            <page-header>
                {{__('clinic')}} {{ __n('review') }}
            </page-header>
        </template> -->
        <div class="bg-primary">
            <pages-heading :textwhite="'true'" :heading="`${clinic.name} ${__n('Review')}`"
                :breadcrums="breadcrums"></pages-heading>
        </div>

        <div class="section py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-5">
                        <h2 class="text-center">{{ clinic.name }} {{ __n('review') }}</h2>
                    </div>
                    <div class="col-12" v-if="fetching">
                        <div class="row">
                            {{ __('fetching') }}
                        </div>
                    </div>
                    <div class="col-12" v-if="!fetching">
                        <div v-if="reviews.data.length > 0" class="row mb-5 mx-0">
                            <clinic-review-card :add_col="true" v-for="review in reviews.data" :key="review.id"
                                :review="review"></clinic-review-card>

                        </div>
                        <div v-else class="row mb-5 mx-0">
                            <div class="col-12 text-center mb-3">
                                <record-not-found></record-not-found>
                            </div>
                        </div>
                        <div class="row" v-if="reviews.meta.last_page != this.filter.page">
                            <div class="col-md-12 d-flex align-items-center justify-content-center">
                                <button @click="loadMore()" class="btn btn-primary position-relative"
                                    :disabled="loading_more"><span :class="{
                                        'loader': loading_more
                                    }" class="position-absolute"></span> {{ __('load more') }}</button>
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
import ClinicReviewCard from "@/Components/Clinics/ClinicReviewCard.vue";
import RecordNotFound from "../../Components/Shared/RecordNotFound.vue";
import PagesHeading from "../../Components/PagesHeading.vue";

export default defineComponent({
    mixins: [PaginationMixin],
    components: {
        AppLayout,
        Navbar,
        PageHeader,
        ClinicReviewCard,
        RecordNotFound,
        PagesHeading,
    },
    props: ['clinic'],
    created() {
    },
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
                    name: this.__("clinic"),
                    link: "/clinics",
                },
                {
                    id: 3,
                    name: `${window.location.pathname.split("/")[3]}`,
                    link: `/clinic/profile/${window.location.pathname.split("/")[3]}`,
                },

            ],
        }
    },
    methods: {
        async getPaginatedData(loading_more = false) {
            await this.getClinicReviews(loading_more)
        },
        getClinicReviews(loading_more) {
            axios.post(this.route('getApiClinicReviews', { user_name: this.clinic.user_name }), this.filter).then(res => {
                const data = res.data.data
                if (loading_more) {
                    this.reviews.data = this.reviews.data.concat(data.data);
                } else {
                    this.reviews.data = data.data;
                }
                this.reviews.links = data.links
                this.reviews.meta = data.meta
                this.fetching = false
            });
        },

    },
});
</script>
