<template>
    <div class="stats">
        <div class="bg-primary">
            <pages-heading :textwhite="'true'" :heading="'appointment detail'" :breadcrums="breadcrums"></pages-heading>
        </div>
        <div class="container">
           <div class="row">
            <div class="col-md-12 px-0">
                <div class="card bg-white px-2 pb-4 d-flex flex-column mt-3 mt-md-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex py-3 align-items-center justify-content-between">
                                <h4 class="text-primary fw-bolder fs-2">
                                    {{ __("your appointment summary") }}
                                </h4>
                                <h4 class="badge" :style="{
                                    backgroundColor: getBadgeBackgroundColor(
                                        appointment.appointment_status_name
                                    ),
                                }">
                                    {{ __(appointment.appointment_status_name) }}
                                </h4>
                            </div>

                            <div class="d-flex gap-2 px-4">
                                <div class="d-flex col-md-3 p-3 flex-column mb-3 align-content-start rounded-4 stats">
                                    <h6 class="fs-5 mb-2 fw-bolder text-black">
                                        {{ __("booking date") }}
                                    </h6>
                                    <span class="fs-5 text-black">{{ appointment.date }}</span>
                                </div>
                                <div class="d-flex col-md-3 p-3 rounded-4 stats flex-column mb-3 align-content-start"
                                    v-if="appointment.is_schedule_required">
                                    <h5 class="mb-2 fs-5 fw-bolder text-black">
                                        {{ __("start and end time") }}
                                    </h5>
                                    <span class="fs-5 text-black">{{ appointment.start_time }} -
                                        {{ appointment.end_time }}
                                    </span>
                                </div>
                                <div class="d-flex col-md-3 flex-column p-3 rounded-4 mb-3 stats align-content-start"
                                    v-if="appointment.doctor_name">
                                    <h5 class="fs-5 text-black mb-2 fw-bolder">
                                        {{ __("selected doctor") }}
                                    </h5>
                                    <span class="fs-5 text-black">{{
                                        appointment.doctor_name
                                        }}</span>
                                </div>
                                <div class="d-flex col-md-3 flex-column p-3 rounded-4 mb-3 stats align-content-start"
                                    v-if="appointment.clinic_name">
                                    <h5 class="mb-2 fs-5 fw-bolder text-black">
                                        {{ __("clinic") }}
                                    </h5>
                                    <span class="fs-5 text-black">{{
                                        appointment.clinic_name
                                        }}</span>
                                </div>
                                <div class="d-flex col-md-3 flex-column align-content-start mb-3 p-3 rounded-4 stats">
                                    <h5 class="mb-2 fs-5 fw-bolder text-black">
                                        {{ __("fee") }}
                                    </h5>
                                    <span class="fs-5 text-black">
                                        {{ getDisplayAmount(appointment.fee) }}</span>
                                </div>
                            </div>
                            <div class="d-flex gap-2  px-4">
                                <div class="d-flex col-md-3 flex-column align-content-start p-3 mb-3 rounded-4 stats">
                                    <h5 class="mb-2 fs-5 fw-bolder text-black">
                                        {{ __("question") }}
                                    </h5>
                                    <span class="fs-5 text-black">{{
                                        appointment.question
                                        }}</span>
                                </div>
                                <div class="d-flex col-md-3 flex-column p-3 rounded-4 stats mb-3 align-content-start">
                                    <h5 class="mb-2 text-black fs-5 fw-bolder">
                                        {{ __("attachment") }}
                                    </h5>
                                    <img :src="appointment.attachment_url" height="100" width="100"
                                        v-if="appointment.attachment_url" alt="" />
                                    <span class="fs-5 text-black" v-else>{{ __("N/A") }}</span>
                                </div>


                                <div class="d-flex col-md-3 flex-column align-content-start p-3 mb-3 rounded-4 stats">
                                    <h5 class="mb-2 fs-5 text-black fw-bolder">
                                        {{ __("appointment status") }}
                                    </h5>
                                    <span class="fs-5 text-black">{{
                                        __(appointment.appointment_status_name)
                                        }}</span>
                                </div>
                                <div class="d-flex col-md-3 flex-column align-content-start p-3 mb-3 rounded-4 stats">
                                    <h5 class="mb-2 fs-5 text-black fw-bolder">
                                        {{ __("appointment type") }}
                                    </h5>
                                    <span class="fs-5 text-black">{{
                                        __(appointment.appointment_type_name)
                                        }}</span>
                                </div>

                            </div>
                            <div class="d-flex gap-2 px-4">
                                <div
                                    class="d-flex  col-md-3 justify-content-between stats align-items-center p-3 mb-3 rounded-4 stats">
                                    <div class="d-flex flex-column align-content-start">
                                        <h5 class="mb-2 text-black fw-bolder fs-5">
                                            {{ __("payment status") }}
                                        </h5>
                                        <span class="fs-5 text-black">{{
                                            appointment.is_paid ? __("paid") : __("unpaid")
                                            }}</span>
                                    </div>
                                    <Link v-if="!appointment.is_paid"
                                        :href="route('user.addFund.confirm', { 'transaction': appointment.fund.transaction, 'appointment_id': appointment.id })"
                                        class="btn btn-secondary rounded-4 fs-4 btn-sm px-3"> {{
                                            __('pay')
                                        }}
                                    </Link>
                                </div>
                                <div class="d-flex col-md-3 flex-column align-content-start p-3 mb-3 rounded-4 stats">
                                    <h5 class="mb-2 fs-5 text-black fw-bolder">
                                        {{ __("payment method") }}
                                    </h5>
                                    <span class="fs-5 text-black">{{
                                        gateway?.name ?? 'wallet'
                                        }}</span>
                                </div>
                            </div>


                        </div>

                        <div v-if="
                            appointment.appointment_status_code == 5 ||
                            appointment.appointment_status_code == 2
                        ">
                            <Link class="btn btn-primary rounded-4" :href="route('patients.ehr.listing ', {
                                appointment: appointment.id,
                            })
                                ">{{ __("show prescription") }}</Link>
                        </div>

                        <div v-if="appointment.appointment_status_code == 5 && userRating">
                            <div class="d-flex flex-column align-content-start p-3 rounded-4 stats">
                                <h5 class="mb-2 text-black fs-5 fw-bolder text-capitalize">
                                    {{ __("your feedback") }}
                                </h5>
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <b class="fs-5 text-black">{{ __("rating") }}: </b>
                                    <star-rating :rating="userRating.rating" :star-size="20" :read-only="true"
                                        :increment="0.01" :show-rating="false" class="mb-1"></star-rating>
                                </div>
                                <b class="fs-5">{{ __("comment") }}: </b>
                                {{ userRating.comment }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           </div>
        </div>

        <div class="container">
            <div class="section py-5">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-12">

                                        <div v-if="
                                            appointment.appointment_type_id == 1 &&
                                            appointment.appointment_status_code != 5
                                        ">
                                            <video-call-component :appointment="appointment"></video-call-component>
                                        </div>
                                        <div v-if="
                                            appointment.appointment_type_id == 2 &&
                                            appointment.appointment_status_code != 5
                                        ">
                                            <audio-call-component :appointment="appointment"></audio-call-component>
                                        </div>
                                        <div v-if="
                                            appointment.appointment_type_id == 3 &&
                                            appointment.appointment_status_code != 5
                                        ">
                                            <div class="py-3 col-12 text-center rounded-4"
                                                v-if="appointment.appointment_status_code == 1"
                                                style="background-color: #e7f3fa">
                                                <p class="fw-bold fs-3 text-black">
                                                    {{ __("waiting for appointment acceptance") }}
                                                </p>
                                            </div>

                                            <div v-if="appointment.appointment_status_code == 2">
                                                <chat-component :appointment="appointment"></chat-component>
                                            </div>
                                        </div>


                            </div>

                            <div class="row mt-5" v-if="appointment.appointment_status_code == 5 && !userRating">
                                <div class="col-md-6"></div>
                                <div class="col-md-6 d-flex justify-content-end">
                                    <button type="updatenStatus" class="btn btn-primary rounded-4 px-5"
                                        data-bs-toggle="modal" data-bs-target="#ratingModel">
                                        {{ __("rate now") }}
                                    </button>
                                </div>
                                <!-- Modal -->
                                <Modal :id="'ratingModel'" tabindex="-1" :aria-labelledby="'ratingModelLabel'">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ratingModelLabel">Rate Now</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="rating">{{ __("rating") }}:</label>
                                            <div class="rating text-center fs-3 text-black">
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
                                            <button type="button" class="btn btn-secondary" id="close"
                                                data-bs-dismiss="modal">
                                                {{ __("close") }}
                                            </button>
                                            <button type="button" @click="submit" class="btn btn-primary">
                                                {{ __("submit") }}
                                            </button>
                                        </div>
                                    </div>
                                </Modal>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>




</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import ChatComponent from "@/Components/Shared/Appointment/ChatComponent.vue";
import VideoCallComponent from "@/Components/Shared/Appointment/VideoCallComponent.vue";
import AudioCallComponent from "@/Components/Shared/Appointment/AudioCallComponent.vue";
import Breadcrums from "../../Components/Shared/Breadcrums.vue";
import PagesHeading from "../PagesHeading.vue";
import Modal from "../Modal.vue";
import Prescription from "../Prescription.vue";

export default defineComponent({
    components: {
        Head,
        AppLayout,
        ValidationErrors,
        ChatComponent,
        AudioCallComponent,
        VideoCallComponent,
        Modal,
        PagesHeading,
        Link,
        Breadcrums,
        Prescription,
    },
    props: ["appointment", "gateway"],
    data() {
        return {
            form: this.$inertia.form({
                comment: "",
                rating: 0,
                doctor_id: this.appointment.doctor_id,
                booked_appointment_id: this.appointment.id,
            }),
            breadcrums: [
                {
                    id: 1,
                    name: this.__("Home"),
                    link: "/",
                },
                {
                    id: 2,
                    name: this.__("my appointments"),
                    link: "/appointment_log",
                },
                {
                    id: 3,
                    name: this.__("appointment detail"),
                    link: "",
                },
            ],
        };
    },
    async created() { },
    mounted() { },
    computed: {
        userRating() {
            var variable = this.appointment.ratings.find(
                (rating) =>
                    rating.fromable_type == this.$page.props.auth.logged_in_as &&
                    rating.fromable_id ==
                    this.$page.props.auth.user[this.$page.props.auth.logged_in_as].id
            );
            return variable;
        },
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
        submit() {
            this.form.post(this.route("add_appointment_rating"), {
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
