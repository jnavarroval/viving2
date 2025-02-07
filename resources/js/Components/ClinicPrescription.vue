<template>
  <div class="card p-3 shadow">
    <div class="custom2">
      <button
        type="button"
        class="btn-close rounded-circle"
        data-bs-dismiss="offcanvas"
        aria-label="Close"
        @click.prevent="hidePrescription"
      ></button>
    </div>
    <h3 class="fw-bold fs-2 border-bottprimaryom border- mt-2 ms-1">
      {{ __("add prescription") }}
    </h3>
    <hr class="mt-1 border-bottom border-2" />
    <div class="card-body p-0 prescription-input">
      <div class="col-md-10 ms-3">
        <Label class="fs-3 text-black fw-normal my-3 ms-md-4">{{
          __("select disease")
        }}</Label>
        <div class="col-md-12 py-2">
          <!-- <Multiselect class="py-3 px-3 shadow-none border-0 bg-transparent" placeholder="Fever Dieases"
                          :options="options" :group-options="categories" /> -->
          <Multiselect
            class="shadow-none border-0 bg-transparent h-100"
            v-model="disease_ids"
            valueProp="id"
            label="name"
            mode="tags"
            :close-on-select="false"
            :searchable="true"
            :options="this.options"
          />
        </div>

        <div
          class="d-flex align-items-center gap-4 mt-3 col-md-12"
          v-for="(element, index) in patient_healths"
          :key="index"
        >
          <div class="col-md-6">
            <Label class="fs-3 text-black fw-normal mb-3 ms-md-4">{{
              __("patient health")
            }}</Label>

            <Multiselect
              class="shadow-none border-0 bg-transparent h-100"
              valueProp="id"
              label="name"
              v-model="patient_healths[index].id"
              :close-on-select="false"
              :searchable="true"
              :options="this.health"
            />
          </div>

          <div class="col-md-6">
            <div>
              <Label class="fs-3 text-black fw-normal mb-3 ms-md-4">{{
                __("values")
              }}</Label>
              <input
                class="radius py-3 ps-4 w-100"
                v-model="patient_healths[index].value"
                type="text"
                placeholder="90 - 120"
              />
            </div>
          </div>
        </div>

        <div class="d-flex align-items-center mt-4">
          <div class="col-md-2">
            <button
              @click="addPatientHealth"
              type="button"
              class="border-0 bg-transparent w-100"
            >
              <img src="@/images/icons/plus.svg" alt="" width="40" />
            </button>
          </div>
          <div class="col-md-2" v-if="patient_healths.length > 1">
            <button
              style="padding: 6px"
              @click="removePatientHealth"
              type="button"
              class="bg-primary rounded-circle border-0 d-flex justify-content-center align-items-center"
            >
              <i class="bi bi-dash text-white fs-1"></i>
            </button>
          </div>
        </div>
        <div class="col-md-12">
          <Label class="fs-3 text-black fw-normal my-3 ms-md-4">{{
            __("test required")
          }}</Label>

          <Multiselect
            class="shadow-none border-0 bg-transparent h-100 p-2"
            v-model="test_ids"
            mode="tags"
            valueProp="id"
            label="name"
            :close-on-select="false"
            :searchable="true"
            :options="this.test"
          />
        </div>
      </div>
      <div class="col-md-10">
        <Label class="fs-3 text-black fw-normal my-3 ms-md-5">{{
          __("prescription")
        }}</Label>
        <div>
          <textarea
            v-model="prescription"
            class="radius w-100 p-3 ms-md-3"
            name=""
            id=""
            cols="30"
            rows="5"
            placeholder="Write"
          >
          </textarea>
        </div>
      </div>
      <div class="d-flex justify-content-start">
        <button
          @click="createRecordPrescription()"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
          class="btn btn-primary rounded-4 fs-3 shadow-find mx-0 m-3 ms-4"
        >
          {{ __("save") }}
          <img class="ms-2" src="@/images/icons/group.svg" alt="" width="30" />
        </button>
      </div>
    </div>
  </div>
  <!-- </div> -->

  <!-- </div> -->
</template>
<script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Multiselect from "@vueform/multiselect";
import Modal from "@/Components/Modal.vue";
import axios from "axios";
export default defineComponent({
  components: {
    Head,
    Link,
    AppLayout,
    Modal,
    Multiselect,
  },

  props: ["patient_id", "booked_appointment_id", "prescription"],
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

      test_ids: [],
      select_health: [{ name: "", value: 0 }],
      patient_healths: [{ id: 0, value: 0 }],
      select_value: "",
      prescription: "",
      disease_ids: [],
      test: [],
      health: [],
      health: [],
      options: [],
    };
  },

  //   mounted() {
  //     this.getRecordPrescription();
  //   },
  created() {
    if (!parseInt(this.$page.props.settings.enable_wallet_system)) {
      this.$toast.error("Access Denied");
      this.$inertia.visit(route("home"));
    }
    // this.GetAllAppointmentDetail();

    this.GetAllDisease();
    this.GetAllMedicalTest();
    this.GetAllRecordHealth();
    this.getRecordPrescription();
  },
  methods: {
    GetAllDisease() {
      axios.get(route("patients.record.disease")).then((response) => {
        if (response.data.success) {
          this.options = response.data.data;
        }
      });
    },
    GetAllMedicalTest() {
      axios.get(route("patients.medical.test")).then((response) => {
        if (response.data.success) {
          this.test = response.data.data;
        }
      });
    },
    GetAllRecordHealth() {
      axios.get(route("patients.record.health")).then((response) => {
        if (response.data.success) {
          this.health = response.data.data;
        }
      });
    },
    getRecordPrescription() {
      axios
        .get(
          route("clinic.appointment_get_detail.prescription", {
            booked_appointment_id: this.booked_appointment_id,
          })
        )
        .then((response) => {
          if (response.data.success) {
            const {
              prescription,
              patient_healths,
              test_ids,
              disease_ids,
            } = response.data.data;

            this.prescription = prescription;
            this.patient_healths = patient_healths.map((patient_health) => {
              const healthOption = this.health.find((h) => h.id === patient_health.id);
              return {
                ...patient_health,
                id: healthOption ? healthOption.id : "",
              };
            });

            // if (patient_healths.length == 0) {
            //   this.patient_healths = { id: 0, value: 0 };
            // }
            this.test_ids = test_ids;
            this.disease_ids = disease_ids;
          }
        });
    },

    // GetAllAppointmentDetail() {
    //   axios
    //     .all([
    //       axios.get(route("patients.record.disease")),
    //       axios.get(route("patients.medical.test")),
    //       axios.get(route("patients.record.health")),
    //       axios.get(
    //         route("appointment_get_detail.prescription", {
    //           booked_appointment_id: this.booked_appointment_id,
    //         })
    //       ),
    //     ])
    //     .then(
    //       axios.spread(
    //         (diseaseResponse, testResponse, healthResponse, prescriptionResponse) => {
    //           if (diseaseResponse.data.success) {
    //             this.options = diseaseResponse.data.data;
    //           }

    //           if (testResponse.data.success) {
    //             this.test = testResponse.data.data;
    //           }

    //           if (healthResponse.data.success) {
    //             this.health = healthResponse.data.data;
    //           }

    //           if (prescriptionResponse.data.success) {
    //             const {
    //               prescription,
    //               patient_healths,
    //               test_ids,
    //               disease_ids,
    //             } = prescriptionResponse.data.data;

    //             this.prescription = prescription;

    //             if (patient_healths.length > 0) {
    //               this.patient_healths = patient_healths;
    //             }
    //             this.test_ids = test_ids;
    //             this.disease_ids = disease_ids;
    //           }
    //         }
    //       )
    //     )
    //     .catch((error) => {
    //       console.error("Error fetching data", error);
    //     });
    // },

    hidePrescription() {
      this.$emit("hidePrescription");
    },

    createRecordPrescription() {
      const form = {
        prescription: this.prescription,
        patient_id: this.patient_id,
        disease_ids: this.disease_ids,
        patient_healths: this.patient_healths,
        booked_appointment_id: this.booked_appointment_id,
        test_ids: this.test_ids,
      };

      if (!this.prescription) {
        this.$toast.error("prescription is required");
        return;
      }

      axios
        .post(route("clinic.appointment_detail.prescription"), form)
        .then((response) => {
          if (response.data.success) {
            this.$toast.show(response.data.message);
          }
        });
    },

    addPatientHealth() {
      this.patient_healths.push({ id: 0, value: 0 });
    },
    removePatientHealth() {
      this.patient_healths.pop();
    },
  },
});
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
