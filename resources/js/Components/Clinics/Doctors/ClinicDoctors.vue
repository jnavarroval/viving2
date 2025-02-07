<template>
  <div
    class="tab-pane"
    :class="{ active: active }"
    id="doctors"
    role="tabpanel"
    aria-labelledby="doctors-tab"
    tabindex="0"
  >
    <Table v-if="!this.fetching">
      <template #TableHeaderTitle>{{__('all')}} {{ __n('doctor') }}</template>
      <template #TableHeaderButtons>
        <div class="d-flex align-items-center">

        <div class="form-group me-2">
            <select v-model="filter.column" class="form-select h-auto"
                aria-label="column">
                <option v-for="col in this.columns" :key="col.id" :value="col.value">{{
                    col.name
                }}</option>
            </select>
        </div>
        <div class="from-group me-2 position-relative">
            <input v-model="filter.search"
            class=" form-control  px-3"
            placeholder="Search" type="text" />
           <span class="position-absolute" style="top: 4px;
           right: 0px;"><button type="button" class="btn border-0 me-2" @click="getPaginatedData(false)">
            <i class="bi bi-search"></i>
          </button></span>
          </div>
        <button type="button" id="addEditDoctorModalButton"   class="btn btn-primary" data-bs-toggle="modal" @click="modal_doctor = null" data-bs-target="#addEditDoctorModal">
            {{__('add')}}
        </button>
        <add-edit-doctor-modal :key="key" @refreshData="refreshData()" @clearModalData="clearModalData()" :modalData="modal_doctor" id="addEditDoctorModal"></add-edit-doctor-modal>
      </div>
      </template>
      <template #TableTheadRow>
        <tr>
          <TableTHead v-for="col in this.columns" :key="col.id" :sortable="col.sortable" @onSortChange="onSortChange" :sort="filter.sort" :name="col.value">{{ col.name }} </TableTHead>
        </tr>
      </template>
      <template #TableBody>
        <tr v-if="clinic_doctors.data.length == 0">
            <td class="align-middle" :colspan="columns.length">
                {{ __('no record found') }}
            </td>
        </tr>
        <tr v-for="doctor in clinic_doctors.data" :key="doctor.id">
          <td class="align-middle">{{ doctor.first_name }}</td>
          <td class="align-middle">{{ doctor.last_name }}</td>
          <td class="align-middle" v-html="doctor.user.email"></td>
          <td class="align-middle" v-html="doctor.speciality"></td>
          <td class="align-middle"><span v-if="doctor.is_active" class="badge bg-success">{{ __('active') }}</span> <span class="badge bg-danger" v-else> {{ __('inactive') }} </span></td>
          <td class="align-middle">
            <div class="d-flex">
            <button type="button" class="btn btn-link px-1 lh-1 py-1 me-2" data-bs-toggle="modal" @click="modal_doctor = doctor" data-bs-target="#viewDoctorModal">
              <i class="bi bi-eye-fill"></i>
            </button>
            <button type="button" class="btn btn-link px-1 lh-1 py-1 me-2" data-bs-toggle="modal" @click="modal_doctor = doctor;" data-bs-target="#addEditDoctorModal">
              <i class="bi bi-pencil-square"></i>
            </button>
            <button type="button" class="btn btn-link text-danger px-1 lh-1 py-1 " data-bs-toggle="modal" @click="modal_doctor = doctor" data-bs-target="#deleteDoctorModal">
              <i class="bi bi-trash3-fill"></i>
            </button>
            </div>
            <view-doctor-modal :modalData="modal_doctor" id="viewDoctorModal"></view-doctor-modal>
            <delete-doctor-modal @refreshData="refreshData()" :modalData="modal_doctor" id="deleteDoctorModal"></delete-doctor-modal>

         </td>
          <!-- Button trigger modal -->
        </tr>
      </template>
      <template #Pagination>
        <TablePagination @onPageChange="onPageChange" :meta="clinic_doctors.meta"></TablePagination>
      </template>
    </Table>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import AddEditDoctorModal from "@/Components/Clinics/Doctors/AddEditDoctorModal.vue";
import ViewDoctorModal from "@/Components/Clinics/Doctors/ViewDoctorModal.vue";
import DeleteDoctorModal from "@/Components/Clinics/Doctors/DeleteDoctorModal.vue";
import Table from "@/Components/Shared/DataTable/Table.vue";
import TableTHead from "@/Components/Shared/DataTable/TableTHead.vue";
import TablePagination from "@/Components/Shared/DataTable/TablePagination.vue";
import PaginationMixin from "@/Mixins/PaginationMixin.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import axios from "axios";

export default defineComponent({
  components: {
    Head,
    Link,
    AddEditDoctorModal,
    Table,
    TableTHead,
    TablePagination,
    ViewDoctorModal,
    DeleteDoctorModal
  },
  props: ["active"],
  mixins: [PaginationMixin],
  data() {
    return {
        clinic_doctors:{},
        modal_doctor:null,
        key:1,
        columns:[
            {
                "id":1,
                'name': this.__('first name') ,
                'value':"first_name",
                'searchable':true,
                'sortable':true
            },
            {
                "id":2,
                'name':this.__('last name'),
                'value':"last_name",
                'searchable':true,
                'sortable':true
            },
            {
                "id":3,
                'name':this.__('email'),
                'value':"email",
                'searchable':true,
                'sortable':true
            },

            {
                "id":4,
                'name':this.__('experience'),
                'value':"experience",
                'searchable':false,
                'sortable':false
            },
            {
                "id":5,
                'name':this.__('status'),
                'value':"status",
                'searchable':false,
                'sortable':false
            },
            {
                "id":6,
                'name':this.__('action'),
                'value':"action",
                'searchable':false,
                'sortable':false
            }
        ],
        editorConfig: {
                    toolbar: {
                        items: [
                            'bold',
                            'italic',
                            'link',
                            'undo',
                            'redo'
                        ]
                    }
                }
    };
  },
  mounted(){
    this.filter.search = ''
    this.getPaginatedData()
  },
  methods: {
    async getPaginatedData(loading_more = false){
        await this.getClinicDoctors(loading_more)
     },
     clearModalData(){
        this.filter.search = ''
        this.modal_doctor = null
        this.key++
     },
    getClinicDoctors(loading_more){
    axios.post(this.route('clinics.clinic_doctors.filter'),this.filter).then(res => {
        const data = res.data.data
        if(loading_more){
            this.clinic_doctors.data = this.clinic_doctors.data.concat(data.data);
        }else{
            this.clinic_doctors.data = data.data;
        }
        this.clinic_doctors.links = data.links
        this.clinic_doctors.meta = data.meta
        this.fetching = false
    });
    },
  }
});
</script>
