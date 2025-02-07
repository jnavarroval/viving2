<template>
    <app-layout title="Dashboard">
        <div class="bg-primary">
            <pages-heading :dashboard="true" :textwhite="'true'" :heading="'Welcome As a Doctor'"
                :breadcrums="breadcrums">
            </pages-heading>
        </div>
        <div class="stats py-5">
            <div class="container">
                <div class="col-12">
                    <div class="card shadow mb-md-5 mb-4">
                        <div class="card-body py-4">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="d-flex align-items-center gap-4 ms-md-4 mt-2">
                                        <div class="position-relative">
                                            <img class="rounded-circle img-fluid" :src="image ? image : $page.props.auth.user.doctor.image
                                                " width="160" />

                                            <!-- <button
                        class="border-0 position-absolute bg-transparent"
                        style="right: 3px; top: 15px"
                        type="button"
                        :data-bs-target="'#profileuploadModal'"
                        data-bs-toggle="modal"
                      >
                        <img src="@/images/icons/Group1.svg" alt="" width="35" />
                      </button> -->
                                            <Modal :id="'profileuploadModal'"
                                                :aria-labelledby="'profileuploadModalLabel'" :maxWidth="'modal-sm'">
                                                <div class="modal-content p-4 radius-50">
                                                    <div class="modal-body border-upload">
                                                        <div
                                                            class="d-flex flex-column align-items-center justify-content-center gap-4">
                                                            <img width="100" src="@/images/icons/uploadfile.svg"
                                                                alt="upload-icon" />
                                                            <h6 class="fs-3 fw-normal text-black">
                                                                {{ __("Drag and drop files here") }}
                                                            </h6>
                                                            <button
                                                                class="btn btn-primary shadow-find rounded-4 fs-3 fw-bold py-2"
                                                                @click="triggerFileUpload" data-bs-dismiss="modal">
                                                                {{ __("Upload") }}
                                                                <img src="@/images/icons/up.svg" width="30"
                                                                    class="mb-1 ms-2" alt="up-icon"
                                                                    data-bs-dismiss="modal" />
                                                            </button>
                                                            <!-- Hidden file input -->
                                                            <input type="file" ref="fileInput" @change="onFileChange"
                                                                class="d-none" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </Modal>
                                        </div>
                                        <div class="d-flex flex-column ms-md-2">
                                            <a :href="route('doctor.my_profile')" class="nav-link" target="_blank">
                                                <h2 class="text-primary fw-bold mt-2 mb-1 fs-2">
                                                    {{ $page.props.doctor.name }}
                                                </h2>
                                                <h6 class="fs-4 text-paragraphcolor fw-normal mb-0">
                                                    {{ __($page.props.auth.logged_in_as) }}
                                                    <i class="bi bi-eye ms-2 fs-3"></i>
                                                </h6>
                                            </a>
                                            <div class="d-flex align-items-center gap-2 mb-2 mt-3">
                                                <div class="detail_icons">
                                                    <img src="@/images/icons/email.svg" alt="" />
                                                </div>
                                                <h6 class="fs-4 text-paragraphcolor fw-normal mb-0">
                                                    {{ $page.props.auth.user.doctor.email }}
                                                </h6>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="detail_icons">
                                                    <img src="@/images/icons/doctorcall.svg" alt="" />
                                                </div>
                                                <h6 class="fs-4 text-paragraphcolor fw-normal mb-0">
                                                    {{ $page.props.auth.user.doctor.cell_phone }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 border-status my-2">
                                    <div class="d-flex flex-md-column flex-row mt-3 ms-2">
                                        <div class="d-flex flex-column align-items-start mb-3">
                                            <label for="status" class="fw-normal mb-2 fs-4 text-paragraphcolor">{{
                                                __("status") }}</label>

                                            <span v-if="
                                                $page.props &&
                                                $page.props.doctor &&
                                                $page.props.doctor.is_active
                                            " class="badge bg-active rounded-pill px-4 py-2 fs-3">{{ __("active")
                                                }}</span>
                                            <span v-else class="badge bg-inactive px-4 rounded-pill py-2 fs-3">{{
                                                __("inactive") }}</span>
                                        </div>
                                        <div class="d-flex flex-column align-items-start ms-3 ms-md-0">
                                            <label for="subscription" class="mb-2 fs-4 fw-normal text-paragraphcolor">{{
                                                __("Package") }}</label>
                                            <Link :href="route('pricing', { type: 'doctor' })">
                                            <span style="background-color: #ffa928"
                                                class="badge rounded-pill px-3 py-2 fs-3 text-capitalize">{{
                                                    $page.props.doctor.pricing_plan_name ?? "N/A" }}
                                            </span>
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="card rounded-20 p-4 ms-md-3" style="background: #f0f7fa">
                                        <div class="d-flex gap-3 align-items-center about-modal">
                                            <h3 class="fw-bold text-primary fs-2 mb-0">About</h3>
                                            <!-- <button
                        class="border-0"
                        type="button"
                        data-bs-toggle="modal"
                        :data-bs-target="'#aboutModal'"
                      >
                        <img src="@/images/icons/Group1.svg" alt="" />
                      </button> -->
                                            <!-- Modal -->
                                            <Modal :id="'aboutModal'" :aria-labelledby="'aboutModalLabel'">
                                                <div class="modal-content p-4 radius-50">
                                                    <div class="modal-header border-0">
                                                        <h1 class="display-6 fw-bold text-primary mb-0"
                                                            id="exampleModalLabel">
                                                            {{ __("about") }}
                                                        </h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <textarea style="
                                border-radius: 20px;
                                min-height: 150px;
                                scrollbar-width: none;
                              " class="form-control border p-4" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <button type="button"
                                                            class="btn btn-secondary fs-2 shadow-find me-3"
                                                            data-bs-dismiss="modal">
                                                            {{ __("cancel") }}
                                                        </button>
                                                        <button type="button" class="btn btn-primary fs-2 shadow-find">
                                                            {{ __("save changes") }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </Modal>
                                        </div>

                                        <ImageCropperModal :show="showImportModal" id="archiveImageCropModal"
                                            :image_url="image_url" @cropImage="cropImage"></ImageCropperModal>
                                        <p class="mb-0 lineclamp-4 mt-2 text-paragraphcolor fs-4 fw-normal">
                                            {{ $page.props.doctor.description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow px-4 py-4 bg-white rounded-20 mb-4 mb-md-0">
                            <ul class="nav flex-column nav-pills account-tabs my-5" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" :class="{ active: active_tab == 'notifications' }"
                                        @click="changeTab('notifications')" id="pills-notifications-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-notifications" type="button"
                                        role="tab" aria-controls="pills-notifications" aria-selected="true">
                                        <div class="icon-background ms-2">
                                            <i class="bi bi-bell"></i>
                                        </div>
                                        {{ __n("Notification") }}
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-appointments-tab" data-bs-toggle="pill"
                                        :class="{ active: active_tab == 'appointments' }"
                                        @click="changeTab('appointments')" data-bs-target="#pills-appointments"
                                        type="button" role="tab" aria-controls="pills-appointments"
                                        aria-selected="true">
                                        <div class="icon-background ms-2">
                                            <i class="bi bi-calendar-date"></i>
                                        </div>
                                        {{ __n("appointment") }}
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-wallet-tab" data-bs-toggle="pill"
                                        :class="{ active: active_tab == 'wallet-transactions' }"
                                        @click="changeTab('wallet-transactions')" data-bs-target="#pills-wallet"
                                        type="button" role="tab" aria-controls="pills-wallet" aria-selected="true">
                                        <div class="icon-background ms-2">
                                            <i class="bi bi-wallet2"></i>
                                        </div>
                                        {{ __n("Wallet Transaction") }}
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-plan-tab" data-bs-toggle="pill"
                                        :class="{ active: active_tab == 'subscription-plan' }"
                                        @click="changeTab('subscription-plan')" data-bs-target="#pills-plan"
                                        type="button" role="tab" aria-controls="pills-plan" aria-selected="true">
                                        <div class="icon-background ms-2">
                                            <i class="bi bi-cash"></i>
                                        </div>
                                        {{ __n("Subscription Plan") }}
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-message-tab" data-bs-toggle="pill"
                                        :class="{ active: active_tab == 'messages' }" @click="changeTab('messages')"
                                        data-bs-target="#pills-message" type="button" role="tab"
                                        aria-controls="pills-message" aria-selected="true">
                                        <div class="icon-background ms-2">
                                            <i class="bi bi-cash"></i>
                                        </div>
                                        {{ __n("Messages") }}
                                    </button>
                                </li>
                            </ul>
                            <!-- <ul
                  class="nav flex-column nav-pills account-tabs my-5"
                  id="v-pills-tab"
                  role="tablist"
                  aria-orientation="vertical"
                >
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link"
                      id="notification-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#notifications"
                      type="button"
                      role="tab"
                      aria-controls="notifications"
                      aria-selected="true"
                    >
                      <div class="icon-background ms-2">
                        <i class="bi bi-bell-fill"></i>
                      </div>
                      {{ __("Notifications") }}
                    </button>
                  </li>
                </ul> -->
                        </div>
                    </div>
                    <div class="col-md-8 pe-md-0">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade" id="pills-notifications" role="tabpanel"
                                aria-labelledby="pills-notifications-tab"
                                :class="{ 'active show': active_tab == 'notifications' }">
                                <dashboard-notification v-if="active_tab == 'notifications'"
                                    :active="active_tab == 'notifications'"></dashboard-notification>
                            </div>
                            <div :class="{ 'active show': active_tab == 'appointments' }" class="tab-pane fade"
                                id="pills-appointments" role="tabpanel" aria-labelledby="pills-appointments-tab">
                                <dashboard-appointment v-if="active_tab == 'appointments'"
                                    :active="active_tab == 'appointments'"></dashboard-appointment>
                            </div>
                            <div class="tab-pane fade" :class="{ 'active show': active_tab == 'wallet-transactions' }" id="pills-wallet" role="tabpanel"
                                aria-labelledby="pills-wallet-tab">
                                <wallet-transaction v-if="active_tab == 'wallet-transactions'"

                                    :active="active_tab == 'wallet-transactions'">
                                </wallet-transaction>
                            </div>
                            <div class="tab-pane fade"  :class="{ 'active show': active_tab == 'messages' }" id="pills-message" role="tabpanel"
                                aria-labelledby="pills-message-tab">
                                <dashboard-message v-if="active_tab == 'messages'"

                                    :active="active_tab == 'messages'"></dashboard-message>
                            </div>
                            <div class="tab-pane fade scrollbar-custom" id="pills-plan" role="tabpanel"
                                aria-labelledby="pills-plan-tab"
                                :class="{ 'active show': active_tab == 'subscription-plan' }">
                                <pricing-plans v-if="active_tab == 'subscription-plan'"
                                    :active="active_tab == 'subscription-plan'"></pricing-plans>
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
import PagesHeading from "@/Components/PagesHeading.vue";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import Checkbox from "@/Components/Checkbox.vue";
import Label from "@/Components/Label.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Modal from "@/Components/Modal.vue";
import DashboardNotification from "@/Components/Doctors/Dashboard/DashboardNotification.vue";
import DashboardAppointment from "@/Components/Doctors/Dashboard/DashboardAppointment.vue";
import WalletTransaction from "@/Components/Doctors/Dashboard/WalletTransaction.vue";
import PricingPlans from "@/Components/Doctors/Dashboard/PricingPlans.vue";
import DashboardMessage from "@/Components/Doctors/Dashboard/DashboardMessage.vue";
import ImageCropperModal from "../Shared/ImageCropperModal.vue";

export default defineComponent({
    components: {
        AppLayout,
        Navbar,
        PagesHeading,
        AuthenticationCard,
        AuthenticationCardLogo,
        DashboardMessage,
        DashboardAppointment,
        WalletTransaction,
        Button,
        Input,
        Modal,
        Checkbox,
        Label,
        AppLayout,
        ValidationErrors,
        Link,
        PagesHeading,
        DashboardNotification,
        PricingPlans,
        ImageCropperModal,
    },
    data() {
        return {
            props: ["pricing_plans", "modules", "appointments"],
            breadcrums: [
                {
                    id: 1,
                    name: this.__("CareConnect"),
                    link: "/",
                },
            ],
            active_tab: route().params.active_tab ?? "notifications",

            image_url: null,
            activeTab: 0,
            image: null,
            showImportModal: false,
            croppedImageSrc: null,
        };
    },

    methods: {
        triggerFileUpload() {
            // Trigger the hidden file input
            this.$refs.fileInput.click();
        },
        changeTab(tab) {
            this.active_tab = tab;
            this.$inertia.replace(route("dashboard"), {
                data: { active_tab: this.active_tab },
                preserveScroll: true,
            });
        },

        onFileChange(e) {
            this.image_url = null;
            const file = e.target.files[0];
            this.image_url = URL.createObjectURL(file);
            this.croppedImageSrc = null;
            this.showImportModal = true;
        },

        cropImage(image) {
            this.croppedImageSrc = image;
            this.image = image;

            this.image_url = null;
            this.showImportModal = false;
        },
        goToNextTab() {
            this.$inertia.visit(route("dashboard"), {
                data: { active_tab: "notifications" },
            });
        },
    },

    mounted() { },
});
</script>
