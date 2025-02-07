<template>
    <div class="stats">

        <div class="bg-primary">
            <pages-heading :textwhite="'true'" :heading="'Service Log Detail'" :breadcrums="breadcrums">
            </pages-heading>
        </div>


        <div class="section py-5">
            <div class="container">
                <div class="px-4  rounded-4 mb-4 mb-0 rounded py-3">
                    <div class="row align-items-center" v-if="service.service_status_code == 1">
                        <div class="col-md-6">
                            <p class="mb-0">
                                {{ __("Please accept the service from patient") }}
                            </p>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end flex-wrap">
                            <button type="updatenStatus" @click="updateServiceStatus(2)"
                                class="btn btn-primary rounded-4 me-lg-3 me-0 px-5">
                                {{ __("accept") }}
                            </button>
                            <button type="button" @click="updateServiceStatus(3)" class="btn btn-danger rounded-4 px-5">
                                {{ __("reject") }}
                            </button>
                        </div>
                    </div>
                    <div class="row" v-if="service.service_status_code == 5">
                        <div class="col-md-6">
                            <p class="mb-0">{{ __("Service has been completed") }}</p>
                        </div>
                    </div>
                    <div class="mb-0 rounded" style="background-color: #fff3db">
                        <div v-if="service.service_status_code == 5 && userRating">
                            <div class="col-md-4 d-flex">
                                <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <h5 class="mb-0 text-capitalize">
                                            {{ __("your feedback") }}
                                        </h5>
                                        <b>{{ __("rating") }}: </b>
                                        <star-rating :rating="userRating.rating" :star-size="20" :read-only="true"
                                            :increment="0.01" :show-rating="false"></star-rating>
                                        <b>{{ __("comment") }}: </b> {{ userRating.comment }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-4">
                    <div class="card px-2 pb-4 d-flex flex-column mt-3 mt-md-0">
                        <div class="card-body">
                            <div class="d-flex border-info py-3 align-items-center justify-content-between">
                                <h4 class="text-primary fw-bolder fs-2">{{ __("your service summary") }}</h4>
                                <h4 class="badge"
                                    :style="{ backgroundColor: getBadgeBackgroundColor(service.service_status_name) }">
                                    {{ service.service_status_name }} </h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <div
                                            class="d-flex flex-column rounded-4 p-3 stats">
                                            <h6 class="fs-5 mb-2 fw-bolder text-black">{{ __('booking date') }}</h6>
                                            <span class="fs-5 text-black">{{ service.date }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3" v-if="service.doctor_name">
                                        <div
                                            class="d-flex flex-column rounded-4 p-3 stats">
                                            <h5 class="fs-5 text-black mb-2 fw-bolder">{{ __('selected patient') }}
                                            </h5>
                                            <span class="fs-5 text-black">{{ service.patient_name }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3" v-if="service.clinic_name">
                                        <div
                                            class="d-flex flex-column rounded-4 p-3 stats">
                                            <h5 class="mb-2 fs-5 fw-bolder text-black">{{ __('clinic') }}</h5>
                                            <span class="fs-5 text-black">{{ service.clinic_name }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div
                                            class="d-flex flex-column rounded-4 p-3 stats">
                                            <h5 class="mb-2 fs-5 text-black fw-bolder">{{ __('Service status') }}
                                            </h5>
                                            <span class="fs-5 text-black">{{ service.service_status_name }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3" v-if="service.service_status_code == 5 && userRating">
                                        <div
                                            class="d-flex flex-column rounded-4 p-3 stats">
                                            <h5 class="mb-2 text-black fs-5 fw-bolder text-capitalize">
                                        {{ __("your feedback") }}
                                    </h5>
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <b class="fs-5 text-black">{{ __("rating") }}: </b>
                                        <star-rating :rating="userRating.rating" :star-size="20" :read-only="true"
                                            :increment="0.01" :show-rating="false" class="mb-1"></star-rating>
                                    </div>
                                    <b class="fs-5">{{ __("comment") }}: </b> {{ userRating.comment }}                              </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div
                                            class="d-flex flex-column rounded-4 p-3 stats">
                                            <h5 class="mb-2 text-black fw-bolder fs-5">
                                                {{ __("payment status") }}
                                            </h5>
                                            <span class="fs-5 text-black">{{
                                                service.is_paid ? __("paid") : __("unpaid")
                                            }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div
                                            class="d-flex flex-column rounded-4 p-3 stats">
                                            <h5 class="mb-2 fs-5 text-black fw-bolder">
                                            {{ __("payment method") }}
                                        </h5>
                                        <span class="fs-5 text-black">{{
                                            gateway?.name ?? 'wallet'
                                            }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div
                                            class="d-flex flex-column rounded-4 p-3 stats">
                                            <h5 class="mb-2 fs-5 fw-bolder text-black">{{ __('fee') }}</h5>
                                            <span class="fs-5 text-black"> {{ getDisplayAmount(service.price)
                                                }}</span>                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div
                                            class="d-flex flex-column rounded-4 p-3 stats">
                                            <h5 class="mb-2 fs-5 fw-bolder text-black">{{ __('question') }}</h5>
                                            <span class="fs-5 text-black">{{ service.question }}</span>                                </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <div
                                            class="d-flex flex-column rounded-4 p-3 stats">
                                            <h5 class="mb-2 text-black fs-5 fw-bolder">{{ __('attachment') }}</h5>
                                            <img :src="service.attachment_url" height="100" width="100"
                                                v-if="service.attachment_url" alt="">
                                            <span class="fs-5 text-black" v-else>{{ __('N/A') }}</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                    <div class="mt-5" v-if="service.service_status_code == 2">
                        <chat-component @showCompletedButton="() => (this.showMarkedAsCompletedButton = true)
                            " :service="service"></chat-component>
                    </div>

                    <div class="row justify-content-end" v-if="showMarkedAsCompletedButton">
                        <div class="col-md-6 d-flex justify-content-end flex-wrap">
                            <div class="mt-4" v-if="service.service_status_code == 2">
                                <button type="updatenStatus" @click="updateServiceStatus(5)"
                                    class="btn btn-primary px-5 rounded-4">
                                    {{ __("mark as complete") }}
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- <div
                  class="d-flex border-bottom border-info py-3 align-items-center justify-content-between"
                >
                  <h4 class="text-primary fw-bolder fs-4">
                    {{ __("your service summary") }}
                  </h4>
                  <h4
                    class="badge"
                    :style="{
                      backgroundColor: getBadgeBackgroundColor(
                        service.service_status_name
                      ),
                    }"
                  >
                    {{ __(service.service_status_name) }}
                  </h4>
                </div> -->

                <Modal class="modal fade" id="ratingModel" tabindex="-1" aria-labelledby="ratingModelLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ratingModelLabel">
                                    {{ __("rate now") }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label for="rating">{{ __("rating") }}:</label>
                                <div class="rating text-center fs-3 text-warning">
                                    <star-rating v-model="form.rating" @update:rating="setRating"
                                        :star-size="25"></star-rating>
                                </div>
                                <div class="form-group">
                                    <label for="comment">{{ __("comment") }}:</label>
                                    <textarea v-model="form.comment" class="form-control" id="" cols="30"
                                        rows="3"></textarea>
                                    <span v-if="form.errors.comment">
                                        {{ form.errors.comment }}
                                    </span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">
                                    {{ __("close") }}
                                </button>
                                <button type="button" @click="submit" class="btn btn-primary">
                                    {{ __("submit") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </Modal>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import ChatComponent from "@/Components/Shared/Service/ChatComponent.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Breadcrums from "@/Components/Shared/Breadcrums.vue";
import Modal from "@/Components/Modal.vue";
import PagesHeading from "@/Components/PagesHeading.vue";

export default defineComponent({
    components: {
        Head,
        AppLayout,
        ChatComponent,
        ValidationErrors,
        PagesHeading,
        Link,
        Breadcrums,
        Modal,
    },
    props: ["service", "gateway"],
    computed: {
        userRating() {
            var variable =
                this.service.reviews &&
                this.service.reviews.find(
                    (rating) =>
                        rating.doctor_id ==
                        this.$page.props.auth.user[this.$page.props.auth.logged_in_as].id
                );
            return variable;
        },
    },
    data() {
        return {
            serviceStatusForm: this.$inertia.form({
                service_id: this.service.id,
                status_code: "",
            }),
            form: this.$inertia.form({
                comment: "",
                rating: 0,
                doctor_id: this.service.doctor_id,
                booked_service_id: this.service.id,
            }),
            showMarkedAsCompletedButton: false,
            breadcrums: [
                {
                    id: 1,
                    name: this.__("home"),
                    link: "/",
                },
                {
                    id: 2,
                    name: "My Services",
                    link: "/service_log",
                },
                {
                    id: 3,
                    name: "Service Detail",
                    link: "",
                },
            ],
        };
    },
    async created() {
        // if (this.service.is_started) {
        this.showMarkedAsCompletedButton = true;
        // }
    },
    methods: {
        getBadgeBackgroundColor(statusName) {
            switch (statusName) {
                case "Pending":
                    return "#ffc107"; // Yellow background color for Pending
                case "Accepted":
                    return "#28a745"; // Green background color for Accepted
                case "Rejected":
                    return "#dc3545"; // Red background color for Rejected
                case "Cancelled":
                    return "#6c757d"; // Grey background color for Cancelled
                case "Completed":
                    return "#007bff"; // Blue background color for Completed
                default:
                    return ""; // Default background color or class if status name doesn't match
            }
        },
        close() {
            document.getElementById("close").click();
        },
        resetForm() {
            this.form = this.$inertia.form({
                comment: "",
                rating: 0,
            });
        },
        setRating(rating) {
            this.form.rating = rating;
        },
        updateServiceStatus(status_code) {
            this.serviceStatusForm.status_code = status_code;
            this.serviceStatusForm
                .transform((data) => ({
                    ...data,
                }))
                .post(this.route("service_detail.updateStatus"), {
                    onSuccess: () => {
                        if (status_code == 5) {
                            document.getElementById("rate_now_button").click();
                        }
                    },
                });
        },
        submit() {
            this.form.post(this.route("add_service_rating"), {
                preserveState: true,
                preserveScroll: true,
                onSuccess: () => {
                    const modalBackdrop = document.querySelector(".modal-backdrop");
                    if (modalBackdrop) {
                        modalBackdrop.classList.remove("modal-backdrop");
                    }
                    this.resetForm();
                },
            });
        },
    },
});
</script>
