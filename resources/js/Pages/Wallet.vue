<template>
    <app-layout title="Wallet">
        <template #default>
            <div class="bg-primary">
                <pages-heading :textwhite="'true'" :heading="'wallet'" :breadcrums="breadcrums">
                </pages-heading>
            </div>
            <div class="section stats p-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card bg-primary w-100 rounded-20 mt-5 position-relative">
                                <img src="@/images/icons/waves.svg" class="position-absolute"
                                    style="right: 0; top: 85px" alt="" />
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8 ps-md-4 py-md-3">
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
                                                        {{ getDefaultCurrencySymbol()
                                                        }}{{ current_balance }}
                                                    </h3>
                                                    <h6 class="fs-3 text-white fw-normal">
                                                        {{ __("Show account balance in") }}
                                                        <span style="color: #fec738">{{getDefaultCurrencyName() ?? ''}}</span>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="d-flex justify-content-center mt-md-4">
                                                <button v-if="
                                                    $page.props.auth.logged_in_as == 'doctor' ||
                                                    $page.props.auth.logged_in_as == 'clinic'
                                                " class="btn bg-white text-primary fs-3 rounded-4 shadow-find px-4 fw-bold btn1 d-flex align-items-center"
                                                    data-bs-toggle="modal" :data-bs-target="'#withdrawAmountModal'"
                                                    :disabled="current_balance == 0">
                                                    <img class="w2-icon me-2" src="@/images/icons/tick.svg"
                                                        alt="wallet-icon" />
                                                    {{ __("Withdraw") }}
                                                </button>
                                                <button v-if="$page.props.auth.logged_in_as == 'patient'"
                                                    class="btn bg-white text-primary fs-3 rounded-4 shadow-find px-4 fw-bold btn1 d-flex align-items-center"
                                                    @click="renderCarousal" data-bs-toggle="modal"
                                                    :data-bs-target="'#walletAddModal'">
                                                    <img class="w2-icon me-2" src="@/images/icons/tick.svg"
                                                        alt="wallet-icon" />
                                                    {{ __("Add top up") }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-6">
                    <div class="row">
                      <div class="col-lg-4 mb-2 mb-md-0">
                        <input
                          class="bg-white w-100 border-0 shadow-sm rounded-2 p-2"
                          type="date"
                          :placeholder="__('Search By Date')"
                        />
                      </div>
                      <div class="col-lg-4 mb-2 mb-md-0">
                        <div
                          class="bg-white rounded-2 px-4 d-flex shadow-sm align-items-center"
                        >
                          <input
                            class="bg-transparent border-0 w-100 shadow-none"
                            type="number"
                            :placeholder="__('Search By Amount')"
                            style="height: 40px"
                          />
                          <i class="bi bi-cash-stack mt-1"></i>
                        </div>
                      </div>

                      <div class="col-lg-3 mb-2 mb-md-0">
                        <button class="btn btn-primary w-100">
                          {{ __("search") }}
                        </button>
                      </div>
                    </div>
                  </div> -->
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row py-md-5">
                        <div class="col-12">
                            <div class="tab-pane" id="general-info" role="tabpanel" aria-labelledby="general-info-tab"
                                tabindex="0">
                                <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation" @click="() => {
                                        this.active_tab = 'transaction_tab';
                                        this.changeTab();
                                    }
                                        ">
                                        <button class="nav-link active fw-bold" id="wallet-transaction-info-tab"
                                            data-bs-toggle="pill" data-bs-target="#wallet-transaction-info"
                                            type="button" role="tab" aria-controls="wallet-transaction-info"
                                            aria-selected="false">
                                            {{ __("all transactions details") }}:
                                        </button>
                                    </li>
                                    <li class="nav-item ms-3" role="presentation" @click="() => {
                                        this.active_tab = 'withdraw_request_tab';
                                        this.changeTab();
                                    }
                                        " v-if="
                                            $page.props.auth.logged_in_as == 'teacher' ||
                                            $page.props.auth.logged_in_as == 'academy'
                                        ">
                                        <button class="nav-link fw-bold" id="wallet-withdraw-requests-info-tab"
                                            data-bs-toggle="pill" data-bs-target="#wallet-withdraw-requests-info"
                                            type="button" role="tab" aria-controls="wallet-withdraw-requests-info"
                                            aria-selected="false">
                                            {{ __("Withdraw Requests") }}:
                                        </button>
                                    </li>
                                </ul>
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div>
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" id="transactionTabs" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active rounded-3" id="transactions-tab"
                                                        data-bs-toggle="tab" data-bs-target="#transactions"
                                                        type="button" role="tab" aria-controls="transactions"
                                                        aria-selected="true">
                                                        {{ __("transactions") }}
                                                    </button>
                                                </li>
                                                <li class="nav-item ms-3" role="presentation">
                                                    <button class="nav-link rounded-3" id="pending-transactions-tab"
                                                        data-bs-toggle="tab" data-bs-target="#pending-transactions"
                                                        type="button" role="tab" aria-controls="pending-transactions"
                                                        aria-selected="false">
                                                        {{ __("Pending transactions") }}
                                                    </button>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content" id="transactionTabsContent">
                                                <div class="tab-pane fade show active" id="transactions" role="tabpanel"
                                                    aria-labelledby="transactions-tab">
                                                    <table class="table caption-top" v-if="transactions.data.length">
                                                        <tbody>
                                                            <tr style="line-height: 47px;" v-for="(
                                  transaction, index
                                ) in transactions.data" :key="index">
                                                                <th class="tb-color" scope="row">
                                                                    <div class="d-flex align-items-center gap-3">
                                                                        {{ transaction.type }}
                                                                    </div>
                                                                </th>
                                                                <td class="tb-color fs-5">
                                                                    {{
                                                                        getFormattedDateOnly(transaction.created_at)
                                                                    }}
                                                                </td>
                                                                <td class="tb-color fs-5">
                                                                    {{ getTransactionDetails(transaction.meta) }}
                                                                </td>
                                                                <td class="tb-color fs-5">
                                                                    {{ getFormattedTime(transaction.created_at) }}
                                                                </td>
                                                                <td>
                                                                    <span style="color: #ff0000">
                                                                        {{ getDefaultCurrencySymbol()
                                                                        }}{{ transaction.amount }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div v-else class="text-center text-muted fs-2 my-4 fw-bold">
                                                        <hr>
            {{ __("No transactions available") }}
        </div>
                                                </div>

                                                <div class="tab-pane fade" id="pending-transactions" role="tabpanel"
                                                    aria-labelledby="pending-transactions-tab">
                                                    <table class="table caption-top" v-if="fund_bank_transfers.length">
                                                        <tbody>
                                                            <tr v-if="
                                                                Object.keys(fund_bank_transfers).length < 0
                                                            ">
                                                                <td colspan="5" class="text-center text-muted fs-2 my-4 fw-bold">
                                                                    {{ __("No pending transactions") }}
                                                                </td>
                                                            </tr>
                                                            <tr v-for="(
                                  transaction, index
                                ) in fund_bank_transfers" :key="index">
                                                                <th class="tb-color" scope="row">
                                                                    <div class="d-flex align-items-center gap-3">
                                                                        {{ __("pending Deposit") }}
                                                                    </div>
                                                                </th>
                                                                <td class="tb-color fs-5">
                                                                    {{
                                                                        getFormattedDateOnly(transaction.created_at)
                                                                    }}
                                                                </td>
                                                                <td class="tb-color fs-5">
                                                                    {{ getTransactionDetails(transaction.meta) }}
                                                                </td>
                                                                <td class="tb-color fs-5">
                                                                    {{ getFormattedTime(transaction.created_at) }}
                                                                </td>
                                                                <td>
                                                                    <span style="color: #ff0000">
                                                                        {{ getDefaultCurrencySymbol()
                                                                        }}{{ transaction.fund.amount }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn bg-transparent border-0"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#viewpayment"
                                                                        @click="setSelectedTransaction(transaction)">
                                                                        <img class="w2-icon ms-2"
                                                                            src="@/images/icons/eye.svg"
                                                                            alt="wallet-icon" />
                                                                    </button>
                                                                    <Modal maxWidth="lg" id="viewpayment"
                                                                        aria-labelledby="walletAddModalLabel">
                                                                        <div class="modal-content add-wallet">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="walletAddModalLabel">
                                                                                    {{ __("Pending Deposit") }}
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <table class="table">
                                                                                        <tbody
                                                                                            v-if="selectedTransaction">
                                                                                            <tr>
                                                                                                <th>{{ __("Date") }}
                                                                                                </th>
                                                                                                <td>{{
                                                                                                    getFormattedDateOnly(selectedTransaction.created_at)
                                                                                                }}</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th>{{ __("Time") }}
                                                                                                </th>
                                                                                                <td>{{
                                                                                                    getFormattedTime(selectedTransaction.created_at)
                                                                                                }}</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th>{{ __("Amount") }}
                                                                                                </th>
                                                                                                <td>
                                                                                                    {{
                                                                                                        getDefaultCurrencySymbol()
                                                                                                    }}{{
                                                                                                        selectedTransaction.fund.amount
                                                                                                    }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th>{{ __("Image") }}
                                                                                                </th>
                                                                                                <td>
                                                                                                    <img height="350"
                                                                                                        width="350"
                                                                                                        :src="selectedTransaction.attachment"
                                                                                                        alt="Attachment" />
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>

                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal" id="close">
                                                                                    {{ __("Close") }}
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </Modal>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div v-else class="text-center text-muted fs-2 fw-bold my-4">
                                                        <hr>
            {{ __("No Pending transactions available") }}
        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add To Wallet Modal -->
                                <Modal maxWidth="lg" :id="'walletAddModal'" :aria-labelledby="'walletAddModalLabel'">
                                    <div class="modal-content add-wallet">
                                        <div class="modal-header">
                                            <h5 class="modal-title" :id="walletAddModalLabel">
                                                {{ __("Select Payment Method") }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group mb-4">
                                                    <input type="text" v-model="form.amount" class="form-control"
                                                        v-on:keypress="inputNumbersOnly()" placeholder="Enter Amount" />
                                                </div>
                                                <!-- <div v-for="gateway in gateways" :key="gateway.code" class="col-md-4 mb-2">
                                                              <button class="btn btn-primary" @click="this.form.gateway = gateway.code">{{ gateway.name }}</button>
                                                          </div> -->

                                                <Carousel :key="key" :settings="settings" :breakpoints="breakpoints">
                                                    <Slide v-for="(gateway, index) in gateways" :key="index">
                                                        <div :class="{
                                                            'border border-5 border-warning':
                                                                form.gateway == gateway.code,
                                                        }" @click="this.form.gateway = gateway.code">
                                                            <img class="" :src="gateway.image" :alt="gateway.name" />
                                                            <h5 class="">{{ gateway.name }}</h5>
                                                        </div>
                                                    </Slide>
                                                    <template #addons>
                                                        <Navigation />
                                                    </template>
                                                </Carousel>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                id="close">
                                                {{ __("close") }}
                                            </button>
                                            <button type="button" class="btn btn-primary"
                                                @click="AddAmountToWallet">
                                                {{ __("submit") }}
                                            </button>
                                        </div>
                                    </div>
                                </Modal>

                                <!-- Withdraw from Wallet Modal -->

                                <Modal maxWidth="lg" :id="'withdrawAmountModal'"
                                    :aria-labelledby="'withdrawAmountModalLabel'">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" :id="withdrawAmountModalLabel">
                                                {{ __("Withdraw Amount") }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group mb-4">
                                                <label for="">{{ __("Amount") }}:</label>
                                                <input type="text" v-model="withdraw.amount" class="form-control"
                                                    v-on:keypress="inputNumbersOnly()" placeholder="Enter Amount" />
                                                <span class="text-danger" v-if="withdraw.errors.amount">
                                                    {{ withdraw.errors.amount }}
                                                </span>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="">{{ __("Account Holder Name") }}:</label>
                                                <input type="text" v-model="withdraw.account_holder"
                                                    class="form-control" placeholder="Enter Account Holder Name" />
                                                <span class="text-danger" v-if="withdraw.errors.account_holder">
                                                    {{ withdraw.errors.account_holder }}
                                                </span>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="">{{ __("Account Number") }}:</label>
                                                <input type="text" v-model="withdraw.account_number"
                                                    class="form-control" placeholder="Enter Account Number" />
                                                <span class="text-danger" v-if="withdraw.errors.account_number">
                                                    {{ withdraw.errors.account_number }}
                                                </span>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="">{{ __("Bank Name") }}:</label>
                                                <input type="text" v-model="withdraw.bank" class="form-control"
                                                    placeholder="Enter Bank Name" />
                                                <span class="text-danger" v-if="withdraw.errors.bank">
                                                    {{ withdraw.errors.bank }}
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __("Additional Note") }}:</label>
                                                <textarea class="form-control" v-model="withdraw.additional_note"
                                                    cols="30" rows="10" placeholder="Enter Additional Notes"></textarea>
                                                <span class="text-danger" v-if="withdraw.errors.additional_note">
                                                    {{ withdraw.errors.additional_note }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                id="withdraw_close">
                                                {{ __("close") }}
                                            </button>
                                            <button type="button" class="btn btn-primary" @click="withdrawAmount">
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
    },
    props: [
        "current_balance",
        "transactions",
        "withdrawals",
        "gateways",
        "fund_bank_transfers",
    ],
    mixins: [RoutePaginationMixin],
    data() {
        return {
            form: this.$inertia.form({
                amount: null,
                gateway: null,
            }),
            selectedTransaction: null,
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
                    id: 3,
                    name: this.__("wallet"),
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
                    itemsToShow: 3,
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
        this.$toast.error("Please enter an amount greater than 0");
        return;
    }
    if (!this.form.gateway) {
        this.$toast.error("Please select a gateway");
        return;
    }
    this.form.post(this.route("wallet.addAmount"), {
        onSuccess: (resp) => {
            // Close the modal programmatically using Bootstrap's JavaScript API
            const walletAddModal = new bootstrap.Modal(document.getElementById('walletAddModal'));
            walletAddModal.hide();

            // Redirect after modal close
            window.location.replace(
                this.route("user.addFund.confirm", {
                    transaction: resp.props.response_data.fund.transaction,
                })
            );
        },
    });
},
        setSelectedTransaction(transaction) {
            this.selectedTransaction = transaction;
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
<style>
table td {
    vertical-align: middle;
}

table th {
    vertical-align: middle;
}
</style>
