<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form @submit.prevent="submitForm" id="payment-form">
                    <div class="form-row">
                        <div class="col-xs-12 form-group card required">
                            <label class="control-label">Card Number</label>
                            <input v-model="form.cardNumber" autocomplete="off" class="form-control card-number" size="20"
                                type="text" name="card_no" required />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-xs-4 form-group cvc required">
                            <label class="control-label">CVV</label>
                            <input v-model="form.cvv" autocomplete="off" class="form-control card-cvc" placeholder="ex. 311"
                                size="4" type="text" name="cvvNumber" required />
                        </div>

                        <div class="col-xs-4 form-group expiration required">
                            <label class="control-label">Expiration Month</label>
                            <input v-model="form.expiryMonth" class="form-control card-expiry-month" placeholder="MM"
                                size="4" type="text" name="ccExpiryMonth" required />
                        </div>

                        <div class="col-xs-4 form-group expiration required">
                            <label class="control-label">Expiration Year</label>
                            <input v-model="form.expiryYear" class="form-control card-expiry-year" placeholder="YYYY"
                                size="4" type="text" name="ccExpiryYear" required />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12" style="margin-left:-10px;">
                            <div class="form-control total btn btn-primary">
                                Total:
                                <span class="amount">${{ amount }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 form-group">
                            <button class="form-control btn btn-success submit-button" type="submit">
                                Pay »
                            </button>
                        </div>
                    </div>

                    <div class="form-row" v-if="error">
                        <div class="col-md-12 error form-group">
                            <div class="alert alert-danger">
                                {{ errorMessage }}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</template>

<script>
import { defineComponent, ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";

export default defineComponent({
    components: {
        AppLayout,
        Navbar,
        ValidationErrors,
    },
    props: ["appointment", "fund"],
    data() {
        return {
            cardNumber: "",
            cvv: "",
            expiryMonth: "",
            expiryYear: "",
            amount: this.fund.amount || 0,
            error: false,
            errorMessage: "",
            form: this.$inertia.form({
                amount: this.fund.amount,
                cardNumber: '',
                cvv:'',
                appointment_id: this.appointment.id,
                expiryMonth: '',
                expiryYear: '',
            }),
        };
    },
    methods: {
        submitForm() {
    this.form.post(this.route("addmoney.stripe"), {
        onSuccess: (resp) => {
            // Optionally reset the form or redirect
            this.resetForm();
            // Redirect logic if needed
            this.$inertia.visit(this.route("appointment_log"));
        },
        onError: (errors) => {
            this.error = true;
            this.errorMessage = "There was an error processing your payment.";
        }
    });
},


        resetForm() {
            this.cardNumber = "";
            this.cvv = "";
            this.expiryMonth = "";
            this.expiryYear = "";
            this.error = false;
            this.errorMessage = "";
        },
    },
});
</script>

