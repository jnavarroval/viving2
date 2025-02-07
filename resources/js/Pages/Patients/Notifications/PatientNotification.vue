<template>
  <app-layout title="Notification">
    <template #default>
      <div class="bg-primary">
        <pages-heading
          :textwhite="'true'"
          :heading="'Notification'"
          :breadcrums="breadcrums"
        ></pages-heading>
      </div>
      <div class="stats py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-3">
              <h1
                v-if="this.$page.props.notifications.length > 0"
                class="fs-2 fw-bold mt-5 ms-5"
              >
                {{ __("Notifications") }}
              </h1>
              <div class="col-md-12 mt-5">
                <div
                  v-for="(notification, index) in this.$page.props
                    .notifications"
                  :key="index"
                >
                  <div
                    class="card rounded-20 px-3 hvr-effect py-custom mb-3"
                    :class="notification.read_at == null ? '' : ''"
                    style="background-color: #f4f9fd !important"
                    :style="{
                      backgroundColor: notification.read_at ? '#F4F9FD' : '',
                    }"
                  >
                    <div
                      v-if="notification.read_at == null"
                      class="d-flex align-items-center gap-4 justify-content-between"
                    >
                      <div class="d-flex align-items-center gap-4">
                        <div
                          class="img-tag d-flex justify-content-center align-items-center rounded-4"
                        >
                          <img
                            class="w5-icon"
                            src="@/images/icons/Bell.svg"
                            alt=""
                          />
                        </div>
                        <div class="d-flex flex-column">
                          <h6 class="fw-normal fs-3 text-black">
                            {{ notification.data.notification_type }}
                            {{
                              this.getFormattedCurrentDate(notification.date)
                            }}
                          </h6>
                          <h6
                            style="color: #696868"
                            class="fw-normal fs-4 mb-0"
                          >
                            {{ notification.data.message }}
                          </h6>
                        </div>
                      </div>
                      <button
                        @click.prevent="markAsRead(notification)"
                        class="bg-transparent border-0 fs-2 me-3 text-black"
                      >
                        <i class="bi bi-eye"></i>
                      </button>
                    </div>

                    <div
                      v-else
                      class="d-flex align-items-center gap-4 justify-content-between"
                    >
                      <div class="d-flex align-items-center gap-4">
                        <div
                          class="img-tag d-flex justify-content-center align-items-center rounded-4"
                          style="background-color: #dfecf3"
                        >
                          <img
                            class="w5-icon"
                            src="@/images/icons/msg.svg"
                            alt=""
                          />
                        </div>
                        <div class="d-flex flex-column">
                          <h6 class="fw-normal fs-3">
                            {{ notification.data.notification_type }}
                          </h6>
                          <h6 class="fw-normal fs-4 text-paragraphcolor mb-0">
                            {{ notification.data.message }}
                          </h6>
                        </div>
                      </div>
                      <button
                        @click.prevent="markAsRead(notification)"
                        class="bg-transparent border-0 fs-2 text-muted"
                      >
                        View
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div
                v-if="this.$page.props.notifications.length === 0"
                class="col-md-12 mt-5"
              >
                <record-not-found></record-not-found>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>
  </app-layout>
</template>
  <script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import TablePagination from "@/Components/Shared/DataTable/TablePagination.vue";
import RoutePaginationMixin from "@/Mixins/RoutePaginationMixin.vue";
import { Carousel, Navigation, Pagination, Slide } from "vue3-carousel";
import PagesHeading from "@/Components/PagesHeading.vue";
import Modal from "@/Components/Modal.vue";
import RecordNotFound from "../../../Components/Shared/RecordNotFound.vue";

export default defineComponent({
  components: {
    Head,
    Link,
    AppLayout,
    TablePagination,
    Carousel,
    Slide,
    Modal,
    Pagination,
    Navigation,
    PagesHeading,
    RecordNotFound,
  },
  props: {
    readNotifications: {
      type: Array,
      default: () => [],
    },
    unreadNotifications: {
      type: Array,
      default: () => [],
    },
  },
  mixins: [RoutePaginationMixin],
  data() {
    return {
      form: this.$inertia.form({
        amount: null,
        gateway: null,
      }),
      withdraw: this.$inertia.form({
        amount: null,
        account_holder: "",
        account_number: "",
        bank: "",
        additional_note: "",
      }),
      currentTabIndex: 0,
      active_tab: "transaction_tab",
      settings: {
        itemsToShow: 1,
        snapAlign: "start",
        autoplay: false,
      },
      breadcrums: [
        {
          id: 1,
          name: this.__("Home"),
          link: "/",
        },
        {
          id: 2,
          name: this.__("Notification"),
        },
      ],
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
          itemsToShow: 2,
          snapAlign: "start",
        },
        1240: {
          itemsToShow: 4,
          snapAlign: "start",
        },
      },
      key: 1,
    };
  },
  created() {
    if (!parseInt(this.$page.props.settings.enable_wallet_system)) {
      this.$toast.error("Access Denied");
      this.$inertia.visit(route("home"));
    }
  },
  methods: {
    AddAmountToWallet() {
      if (!this.form.amount || this.form.amount <= 0) {
        this.$toast.error("Please enter amount greater than 0");
        return;
      }
      if (!this.form.gateway) {
        this.$toast.error("Please select a gateway");
        return;
      }
      this.form.post(this.route("wallet.addAmount"), {
        onSuccess: (resp) => {
          document.getElementById("close").click();
          window.location.replace(
            this.route("user.addFund.confirm", {
              transaction: resp.props.response_data.fund.transaction,
            })
          );
        },
      });
    },
    withdrawAmount() {
      if (!this.withdraw.amount || this.withdraw.amount <= 0) {
        this.$toast.error("Please enter amount greater than 0");
        return;
      }
      this.withdraw.post(this.route("wallet.withdraw"), {
        onSuccess: () => {
          document.getElementById("withdraw_close").click();
        },
      });
    },
    onChangeCurrentTab(index) {
      this.currentTabIndex = index;
    },
    getPaginatedData() {
      this.$inertia.replace(this.route("wallet"), { data: this.filter });
    },
    changeTab() {
      this.$inertia.replace(this.route("wallet"));
    },
    getTransactionDetails(jsonString) {
      if (jsonString) {
        const jsonObject = jsonString;
        return jsonObject.details;
      } else {
        return null;
      }
    },
    renderCarousal() {
      var myModalEl = document.getElementById("walletAddModal");
      let self = this;
      myModalEl.addEventListener("shown.bs.modal", function (event) {
        self.key++;
      });
    },
  },
  mounted() {
    this.key++;
  },
});
</script>
