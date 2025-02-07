<template>
  <div>
    <!-- Modal -->
    <Modal maxWidth="lg" :id="id">
      <div class="modal-content rounded-50">
        <div class="modal-header py-4 px-5 border-0">
          <h5 class="modal-title text-primary fs-1 fw-bold" id="exampleModalLabel">
            {{ modalData ? __("update") : __("create") }} {{ __("event") }}
          </h5>
          <button
            :id="id + 'close'"
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <ul
              class="nav modal-tabs nav-tabs gap-3 px-3 border-bottom border-primary border-2 border-opacity-25 my-2"
              id="myTab"
              role="tablist"
            >
              <li
                v-for="(lang, index) in $page.props.translation_languages"
                :key="lang.id"
                class="nav-item nav-tab"
                role="presentation"
              >
                <button
                  :class="{ active: index == 0 }"
                  class="nav-link mr-1 fw-bold"
                  :id="`events-nav-${lang.code}-tab`"
                  data-bs-toggle="tab"
                  :data-bs-target="`#events-nav-${lang.code}`"
                  type="button"
                  role="tab"
                  :aria-controls="`events-nav-${lang.code}`"
                  aria-selected="true"
                >
                  {{ lang.name }}
                </button>
              </li>
            </ul>
            <div
              v-for="(lang, secondIndex) in $page.props.translation_languages"
              :key="lang.id"
              class="tab-content mt-1"
              id="myTabContent"
            >
              <div
                :class="{ 'show active': secondIndex == 0 }"
                class="tab-pane fade mb-2"
                :id="`events-nav-${lang.code}`"
                role="tabpanel"
                :aria-labelledby="`events-nav-${lang.code}-tab`"
              >
                <div class="col-md-12">
                  <div class="form-group mb-3">
                    <label class="mb-2 fs-4" for="name"
                      >{{ __("event name") }} ({{ lang.code }})</label
                    >
                    <input
                      v-model="form.name[lang.code]"
                      class="w-100 form-control px-3"
                      :class="{
                        'is-invalid': form.errors[`name.${lang.code}`],
                      }"
                      :placeholder="__('please enter')"
                      type="text"
                    />
                    <span class="text-danger" v-if="form.errors[`name.${lang.code}`]">
                      {{ form.errors[`name.${lang.code}`] }}
                    </span>
                  </div>
                  <div class="form-group mb-3">
                    <label class="mb-2 fs-4" for="description"
                      >{{ __("description") }} ({{ lang.code }})</label
                    >
                    <textarea
                      :class="{
                        'is-invalid': form.errors[`description.${lang.code}`],
                      }"
                      v-model="form.description[lang.code]"
                      class="form-control"
                    ></textarea>
                    <!-- <ckeditor :editor="editor" v-model="form.description" :config="editorConfig"></ckeditor> -->
                    <span
                      class="text-danger"
                      v-if="form.errors[`description.${lang.code}`]"
                    >
                      {{ form.errors[`description.${lang.code}`] }}
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="mb-2 fs-4" for="category"
                  >{{ __("choose") }} {{ __("category") }}</label
                >
                <select
                  v-model="form.event_category_id"
                  class="form-select"
                  aria-label="category"
                >
                  <option value="">{{ __("select") }}</option>
                  <option
                    v-for="cat in this.event_categories"
                    :key="cat.id"
                    :value="cat.id"
                  >
                    {{ cat.name }}
                  </option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="mb-2 fs-4" for="tag"
                  >{{ __("choose") }} {{ __("tag") }}</label
                >
                <Multiselect
                  v-model="form.tag_ids"
                  valueProp="id"
                  label="name"
                  mode="tags"
                  class="rounded-3 h-auto"
                  :close-on-select="false"
                  :searchable="false"
                  :create-option="true"
                  :options="this.tags"
                />
              </div>
            </div>

            <!-- <div> -->
            <!-- Cropped image previewer -->

            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="mb-2 fs-4" for="starts_at">{{ __("start date") }}</label>
                <VueDatePicker :is24="false" v-model="form.starts_at"></VueDatePicker>
                <span class="text-danger" v-if="form.errors.starts_at">
                  {{ form.errors.starts_at }}
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="mb-2 fs-4" for="ends_at">{{ __("end date") }}</label>
                <VueDatePicker :is24="false" v-model="form.ends_at"></VueDatePicker>
                <span class="text-danger" v-if="form.errors.ends_at">
                  {{ form.errors.ends_at }}
                </span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="mb-2 fs-4" for="address_line_1">{{
                  __("Address line 1")
                }}</label>
                <input
                  v-model="form.address_line_1"
                  class="w-100 form-control px-3"
                  :class="{ 'is-invalid': form.errors.address_line_1 }"
                  :placeholder="__('please enter')"
                  type="text"
                />
                <span class="text-danger" v-if="form.errors.address_line_1">
                  {{ form.errors.address_line_1 }}
                </span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="mb-2 fs-4" for="address_line_2">{{
                  __("Address line 2")
                }}</label>
                <input
                  v-model="form.address_line_2"
                  class="w-100 form-control px-3"
                  :class="{ 'is-invalid': form.errors.address_line_2 }"
                  :placeholder="__('please enter')"
                  type="text"
                />
                <span class="text-danger" v-if="form.errors.address_line_2">
                  {{ form.errors.address_line_2 }}
                </span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="d-flex align-items-center justify-content-between">
                <label class="text-black fw-bold fs-2" for="sponsor">{{
                  __("sponsors")
                }}</label>
                <button
                  type="button"
                  class="border-0 fs-3 fw-bold bg-transparent text-primary"
                  @click="addSponser"
                >
                  <img
                    src="@/images/icons/plus.svg"
                    width="25"
                    class="mb-1 me-2"
                    alt=""
                  />{{ __("add") }}
                </button>
              </div>

              <div
                class="row my-3 align-items-center"
                v-for="(sponser, index) in form.sponsers"
                :key="index"
              >
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="mb-2 fs-4" for="">{{ __("sponsor name") }}</label>
                    <input
                      class="form-control px-3"
                      v-model="form.sponsers[index].name"
                      :placeholder="__('please enter')"
                      type="text"
                    />
                  </div>
                </div>
                <div class="col-md-6" id="form">
                  <label for="form" class="mb-2 fs-4">{{ __("select logo") }}</label>
                  <div
                    class="d-flex align-items-center justify-content-between file-select px-2 py-1"
                  >
                    <div class="form-group">
                      <label
                        for="doctor-image"
                        class="btn btn-secondary text-white fs-3 opacity-50 px-5 mb-0"
                        >{{ __("Select a File") }}</label
                      >
                      <input
                        id="doctor-image"
                        style="display: none"
                        ref="formImage"
                        type="file"
                        @change="onSponserFileChange($event, index)"
                      />
                      <!-- <input type="file" @change="onSponserFileChange($event,index)"
                          class="custom-file-input px-3 w-100 border form-control" name="" id="" /> -->
                    </div>
                    <img
                      v-if="sponser.previous_image"
                      :src="sponser.previous_image"
                      width="75"
                      height="75"
                    />
                    <div class="">
                      <div
                        class="form-group ms-2"
                        @click="() => this.form.sponsers.splice(index, 1)"
                      >
                        <i class="bi bi-trash3-fill text-danger me-2"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div v-if="modalData && modalData.image" class="form-group mb-3">
            <label for="previous_image">{{ __("previous image") }}</label>
            <img
              width="250"
              height="250"
              v-if="modalData && modalData.image"
              class="img-fluid"
              :src="modalData.image"
              alt="logo"
            />
            <span class="text-danger" v-if="form.errors.image">
              {{ form.errors.image }}
            </span>
          </div>
          <div class="file-select">
            <div class="form-group mb-0">
              <label
                for="events-image"
                class="text-black d-flex align-items-center px-5 mb-0"
              >
                <img src="@/images/icons/uploadfile.svg" class="me-2" width="30" alt="" />
                <span class="text-primary me-2">{{ __("Upload") }}</span
                >{{ __("your image here") }}</label
              >
              <input
                id="events-image"
                style="display: none"
                ref="formImage"
                type="file"
                @change="onFileChange"
              />
              <!-- <label for="image">{{__('Select a File')}}</label>
                      <input id="clinic-image" ref="formImage" class="w-100 custom-file-input shadow-none"  @change="onFileChange" type="file"/> -->
            </div>
          </div>

          <!-- <div class="form-group mb-3">
            <label for="image">{{ __("image") }}</label>
            <input
              id="doctor-image"
              ref="formImage"
              class="w-100 custom-file-input"
              @change="onFileChange"
              type="file"
            />
          </div> -->
          <div>
            <ImageCropperModal
              :show="showImportModal"
              id="eventImageCropModal"
              :image_url="image_url"
              @cropImage="cropImage"
            ></ImageCropperModal>
            <img
              v-if="croppedImageSrc"
              style="width: 120px; height: 120px"
              class="m-3 rounded-4 bg-light"
              :src="croppedImageSrc"
            />
          </div>
        </div>
        <div class="modal-footer border-0 d-flex justify-content-between mx-4 pb-4">
          <div class="form-check form-switch mt-2">
            <input
              class="form-check-input"
              v-model="form.is_active"
              type="checkbox"
              role="switch"
              id="flexSwitchCheckDefault"
            />
            <label class="form-check-label text-primary" for="flexSwitchCheckDefault"
              >{{ __("active") }}?</label
            >
          </div>
          <div class="d-flex gap-3">
            <button
              type="button"
              class="btn btn-dark shadow-find fs-3"
              data-bs-dismiss="modal"
            >
              {{ __("Cancel") }}
            </button>
            <button
              :class="{ 'text-white-50': form.processing }"
              :disabled="form.processing"
              type="button"
              class="btn btn-primary shadow-find px-5 fs-3"
              @click="modalData ? update() : create()"
            >
              <div v-show="form.processing" class="spinner-border spinner-border-sm">
                <span class="visually-hidden">{{ __("loading") }}...</span>
              </div>
              <span v-if="modalData">
                {{ __("save changes") }}
              </span>
              <span v-else>
                {{ __("create") }}
              </span>
            </button>
          </div>
        </div>
      </div>
    </Modal>
  </div>
</template>
<script>
import Modal from "@/Components/Modal.vue";
import { defineComponent } from "vue";
// import CKEditor from '@ckeditor/ckeditor5-vue';
// import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';
import ImageCropperModal from "@/Components//Shared/ImageCropperModal.vue";
import Multiselect from "@vueform/multiselect";

export default defineComponent({
  components: {
    Modal,
    // ckeditor: CKEditor.component,
    // ClassicEditor,
    ImageCropperModal,
    Multiselect,
  },
  data() {
    return {
      form: this.$inertia.form({
        name: {},
        description: {},
        sponsor: "",
        starts_at: "",
        ends_at: "",
        address_line_1: "",
        address_line_2: "",
        is_active: false,
        image: null,
        tag_ids: [],
        sponsers: [],
        event_category_id: "",
      }),
      event_categories: this.$page.props.event_categories,
      tags: this.$page.props.tags,
      showImportModal: false,
      image_url: null,
      croppedImageSrc: null,
      // editor:ClassicEditor,
      editorConfig: {
        toolbar: {
          items: [
            "heading",
            "bold",
            "italic",
            "link",
            "numberedList",
            "bulletedList",
            "undo",
            "redo",
          ],
        },
      },
    };
  },
  props: {
    id: {
      type: String,
      required: true,
    },
    modalData: {},
  },
  mounted() {},
  methods: {
    onFileChange(e) {
      this.image_url = null;
      const file = e.target.files[0];
      this.image_url = URL.createObjectURL(file);
      this.croppedImageSrc = null;
      this.showImportModal = true;
    },

    cropImage(image) {
      this.croppedImageSrc = image;
      this.form.image = image;
      this.image_url = null;
      this.showImportModal = false;
    },
    close() {
      document.getElementById(this.id + "close").click();
    },
    addSponser() {
      this.form.sponsers.push({
        name: "",
        image: "",
      });
    },
    onSponserFileChange(e, index) {
      const file = e.target.files[0];
      this.form.sponsers[index].image = file;
    },
    create() {
      this.form.post(this.route("doctors.doctor_events.store"), {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
          this.$toast.show("Created Successfully");
          this.$emit("refreshData");
          this.$emit("clearModalData");
          this.close();
        },
      });
    },
    update() {
      this.form
        .transform((data) => ({
          ...data,
          _method: "PUT",
        }))
        .post(
          this.route("doctors.doctor_events.update", {
            doctor_event: this.modalData.id,
          }),
          {
            preserveState: true,
            preserveScroll: true,
            onSuccess: () => {
              this.$toast.show("Updated Successfully");
              this.$emit("refreshData");
              this.$emit("clearModalData");
              this.close();
            },
          }
        );
    },
  },
  watch: {
    modalData: {
      handler() {
        this.form = null;
        this.croppedImageSrc = null;
        this.$refs.formImage.value = null;

        if (!this.modalData) {
          // set defaults
          this.form = this.$inertia.form({
            name: {},
            description: {},
            is_active: false,
            image: null,
            sponsor: "",
            starts_at: "",
            ends_at: "",
            address_line_1: "",
            address_line_2: "",
            tag_ids: [],
            sponsers: [],
          });
          this.image_url = null;
        } else {
          // set modal editable data
          this.form = this.$inertia.form(this.modalData);
          this.form.image = null;
          this.form.name = this.modalData.name_translations;
          this.form.description = this.modalData.description_translations;
          if (this.form.is_active) {
            this.form.is_active = true;
          } else {
            this.form.is_active = false;
          }
          this.image_url = null;
        }
      },
      deep: true,
    },
  },
});
</script>
