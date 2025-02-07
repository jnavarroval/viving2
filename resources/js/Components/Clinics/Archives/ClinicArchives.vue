<template>
  <div
    class="tab-pane"
    :class="{ active: active }"
    id="archives"
    role="tabpanel"
    aria-labelledby="archives-tab"
    tabindex="0"
  >
    <Table v-if="!this.fetching">
      <template #TableHeaderTitle
        >{{ __("all") }} {{ __n("archive") }}</template
      >
      <template #TableHeaderButtons>
        <div
          class="d-flex flex-column justify-content-md-end justify-content-start flex-md-row align-items-md-center mt-3 mt-md-0"
        >
          <!-- <div class="form-group border rounded me-md-2 me-0 mb-2 mb-md-0">
            <select v-model="filter.column" class="form-select"
                aria-label="column">
                <option v-for="col in this.columns" :key="col.id" :value="col.value">{{
                    col.name
                }}</option>
            </select>
        </div>
        <div class="form-group border rounded me-0 me-md-2 mb-2 mb-md-0 position-relative">
            <input v-model="filter.search"
            class=" form-control  px-4"
            :placeholder="__('Search')" type="text" />
            <span class="position-absolute" style="top: 2px;
           right: 20px;"><button type="button" class="btn px-0 border-0 shadow-none " @click="getPaginatedData(false)">
            <i class="bi bi-search"></i>
          </button></span>
          </div> -->
          <button
            type="button"
            id="addEditArchiveModalButton"
            class="border-0 fs-3 fw-bold bg-transparent text-primary"
            data-bs-toggle="modal"
            @click="modal_archive = null"
            data-bs-target="#addEditArchiveModal"
          >
            <img
              src="@/images/icons/plus.svg"
              width="25"
              class="mb-1 me-2"
              alt=""
            />
            {{ __("add") }} {{ __("archive") }}
          </button>
          <add-edit-archive-modal
            :key="key"
            @refreshData="refreshData()"
            @clearModalData="clearModalData()"
            :modalData="modal_archive"
            id="addEditArchiveModal"
          ></add-edit-archive-modal>
        </div>
      </template>
      <template #TableTheadRow>
        <tr>
          <TableTHead
            v-for="col in this.columns"
            :key="col.id"
            :sortable="col.sortable"
            @onSortChange="onSortChange"
            :sort="filter.sort"
            :name="col.value"
            >{{ col.name }}
          </TableTHead>
        </tr>
      </template>
      <template #TableBody>
        <tr v-if="clinic_archives.data.length == 0">
          <td class="align-middle" :colspan="columns.length">
            {{ __("no record found") }}
          </td>
        </tr>
        <tr v-for="archive in clinic_archives.data" :key="archive.id">
          <td class="align-middle text-paragraphcolor fs-4 fw-normal">
            {{ archive.name }}
          </td>
          <td class="align-middle">
            <img
              v-if="archive.image"
              :src="archive.image"
              width="75"
              height="75"
              class="rounded-4"
              :alt="archive.image"
            />
            <span v-else>-</span>
          </td>
          <td class="align-middle text-paragraphcolor fs-4 fw-normal">
            {{ archive.created_at }}
          </td>

          <td class="align-middle">
            <span v-if="archive.is_active" class="text-success fs-4 fw-bold">{{
              __("active")
            }}</span>
            <span class="text-danger fs-4 fw-bold" v-else>
              {{ __("inactive") }}
            </span>
          </td>
          <td class="align-middle">
            <div class="d-flex justify-content-center">
              <button
                type="button"
                class="bg-transparent fs-3 border-0 text-primary p-1 lh-1 me-2"
                data-bs-toggle="modal"
                @click="modal_archive = archive"
                data-bs-target="#viewArchiveModal"
              >
                <i class="bi bi-eye-fill"></i>
              </button>
              <button
                type="button"
                class="bg-transparent fs-3 border-0 p-1 lh-1 me-2"
                style="color: #e2ae28"
                data-bs-toggle="modal"
                @click="modal_archive = archive"
                data-bs-target="#addEditArchiveModal"
              >
                <img src="@/images/icons/edit.svg" width="18" alt="" />
              </button>
              <button
                type="button"
                class="bg-transparent fs-3 border-0 p-1 lh-1"
                style="color: #fa6b6b"
                data-bs-toggle="modal"
                @click="modal_archive = archive"
                data-bs-target="#deleteArchiveModal"
              >
                <img src="@/images/icons/del.svg" width="18" alt="" />
              </button>
            </div>

            <view-archive-modal
              :modalData="modal_archive"
              id="viewArchiveModal"
            ></view-archive-modal>
            <delete-archive-modal
              @refreshData="refreshData()"
              :modalData="modal_archive"
              id="deleteArchiveModal"
            ></delete-archive-modal>
          </td>
          <!-- Button trigger modal -->
        </tr>
      </template>
      <template #Pagination>
        <TablePagination
          @onPageChange="onPageChange"
          :meta="clinic_archives.meta"
        ></TablePagination>
      </template>
    </Table>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import AddEditArchiveModal from "@/Components/Clinics/Archives/AddEditArchiveModal.vue";
import ViewArchiveModal from "@/Components/Clinics/Archives/ViewArchiveModal.vue";
import DeleteArchiveModal from "@/Components/Clinics/Archives/DeleteArchiveModal.vue";
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
    AddEditArchiveModal,
    Table,
    TableTHead,
    TablePagination,
    ViewArchiveModal,
    DeleteArchiveModal,
  },
  props: ["active"],
  mixins: [PaginationMixin],
  data() {
    return {
      clinic_archives: {},
      modal_archive: null,
      key: 1,
      columns: [
        {
          id: 1,
          name: this.__("name"),
          value: "name",
          searchable: true,
          sortable: true,
        },

        {
          id: 3,
          name: this.__("image"),
          value: "image",
          searchable: false,
          sortable: false,
        },
        {
          id: 4,
          name: this.__("created at"),
          value: "created_at",
          searchable: false,
          sortable: false,
        },
        {
          id: 5,
          name: this.__("status"),
          value: "status",
          searchable: false,
          sortable: false,
        },
        {
          id: 6,
          name: this.__("action"),
          value: "action",
          searchable: false,
          sortable: false,
        },
      ],
      editorConfig: {
        toolbar: {
          items: ["bold", "italic", "link", "undo", "redo"],
        },
      },
    };
  },
  mounted() {
    if (this.filter.column == "") {
      this.filter.column = "name";
    }
    this.getPaginatedData();
  },
  methods: {
    async getPaginatedData(loading_more = false) {
      await this.getClinicArchives(loading_more);
    },
    clearModalData() {
      this.modal_archive = null;
      this.key++;
    },
    getClinicArchives(loading_more) {
      axios
        .post(this.route("clinics.clinic_archives.filter"), this.filter)
        .then((res) => {
          const data = res.data.data;
          if (loading_more) {
            this.clinic_archives.data = this.clinic_archives.data.concat(
              data.data
            );
          } else {
            this.clinic_archives.data = data.data;
          }
          this.clinic_archives.links = data.links;
          this.clinic_archives.meta = data.meta;
          this.fetching = false;
        });
    },
  },
});
</script>
