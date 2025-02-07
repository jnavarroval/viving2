<template>
  <div>
    <!-- Modal -->
    <Modal maxWidth="lg" :id="id">
      <div class="modal-content rounded-50">
        <div class="modal-header border-0">
          <h5
            class="modal-title ms-4 mt-2 text-primary fs-1 fw-bold"
            id="exampleModalLabel"
          >
            {{ modalData ? __("update") : __("create") }} {{ __("broadcast") }}
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
                class="nav-item"
                role="presentation"
              >
                <button
                  :class="{ active: index == 0 }"
                  class="nav-link mr-1 fw-bold"
                  :id="`broadcast-nav-${lang.code}-tab`"
                  data-bs-toggle="tab"
                  :data-bs-target="`#broadcast-nav-${lang.code}`"
                  type="button"
                  role="tab"
                  :aria-controls="`broadcast-nav-${lang.code}`"
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
                :id="`broadcast-nav-${lang.code}`"
                role="tabpanel"
                :aria-labelledby="`broadcast-nav-${lang.code}-tab`"
              >
                <div class="col-md-12">
                  <div class="form-group mb-3">
                    <label class="mb-2 fs-4" for="name"
                      >{{ __("name") }} ({{ lang.code }})</label
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
                    <span
                      class="text-danger"
                      v-if="form.errors[`name.${lang.code}`]"
                    >
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
                <label class="mb-2 fs-4" for="tag"
                  >{{ __("choose") }} {{ __("tag") }}</label
                >
                <Multiselect
                  v-model="form.tag_ids"
                  valueProp="id"
                  label="name"
                  mode="tags"
                  class="multiselect h-auto"
                  :close-on-select="false"
                  :searchable="true"
                  :create-option="true"
                  :options="this.tags"
                />
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="mb-2 fs-4" for="category"
                  >{{ __("choose") }} {{ __("file type") }}</label
                >
                <select
                  v-model="form.file_type"
                  class="form-select"
                  aria-label="category"
                >
                  <option value="">{{ __("select") }}</option>
                  <option value="audio">{{ __("audio") }}</option>
                  <option value="video">{{ __("video") }}</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="mb-2 fs-4" for="category"
                  >{{ __("choose") }} {{ __("link type") }}</label
                >
                <select
                  v-model="form.link_type"
                  class="form-select"
                  aria-label="category"
                >
                  <option value="">{{ __("select") }}</option>
                  <option value="internal">{{ __("internal") }}</option>
                  <option value="external">{{ __("external") }}</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div v-if="form.link_type == 'external'" class="form-group mb-3">
                <label class="mb-2 fs-4" for="name">{{
                  __("file link")
                }}</label>
                <input
                  v-model="form.file_url"
                  type="url"
                  class="w-100 form-control px-3"
                  :class="{ 'is-invalid': form.errors.file_url }"
                  :placeholder="__('please enter')"
                />
                <span class="text-danger" v-if="form.errors.file_url">
                  {{ form.errors.file_url }}
                </span>
              </div>
              <div
                v-if="form.link_type == 'internal' && form.file_type == 'audio'"
                class="form-group mb-3 mt-2"
              >
                <label class="mb-2 fs-4" for="file">{{ __("Audio") }}</label>
                <input
                  id="clinic-audio"
                  @change="onBroadcastFileChange($event, 'audio')"
                  type="file"
                />
                <span class="text-danger" v-if="form.errors.audio">
                  {{ form.errors.audio }}
                </span>
              </div>
              <div
                v-if="form.link_type == 'internal' && form.file_type == 'video'"
                class="form-group mb-3 mt-2"
              >
                <label class="mb-2 fs-4" for="file">{{ __("Video") }}</label>
                <input
                  id="clinic-video"
                  @change="onBroadcastFileChange($event, 'video')"
                  type="file"
                />
                <span class="text-danger" v-if="form.errors.video">
                  {{ form.errors.video }}
                </span>
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
                for="broadcast-image"
                class="text-black d-flex align-items-center px-5 mb-0"
              >
                <img
                  src="@/images/icons/uploadfile.svg"
                  class="me-2"
                  width="30"
                  alt=""
                />
                <span class="text-primary me-2">{{ __("Upload") }}</span
                >{{ __("your image here") }}</label
              >
              <input
                id="broadcast-image"
                style="display: none"
                ref="formImage"
                type="file"
                @change="onFileChange"
              />
              <!-- <label for="image">{{__('Select a File')}}</label>
                      <input id="clinic-image" ref="formImage" class="w-100 custom-file-input shadow-none"  @change="onFileChange" type="file"/> -->
            </div>
          </div>
          <div class="form-group me-3">
            <label style="font-size: 14px" class="text-muted mt-4" for="info">{{
              __("certificate file validation")
            }}</label>
          </div>
          <!-- <div class="form-group mb-3">
                    <label for="image">{{__('image')}}</label>
                    <input id="clinic-image" ref="formImage" class="custom-file-input w-100"  @change="onFileChange" type="file" />
                </div> -->
          <div>
            <!-- Cropped image previewer -->
            <ImageCropperModal
              :show="showImportModal"
              id="broadcastImageCropModal"
              :image_url="image_url"
              @cropImage="cropImage"
            ></ImageCropperModal>
            <img
              v-if="croppedImageSrc"
              style="width: 120px; height: 120px"
              class="mx-auto rounded-4 m-2 bg-light"
              :src="croppedImageSrc"
            />
          </div>

          <!-- <div class="form-check form-switch mt-2">
                  <input class="form-check-input" v-model="form.is_active" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                   <label class="form-check-label" for="flexSwitchCheckDefault">{{ __('active') }}?</label>
                </div> -->
        </div>
        <div
          class="modal-footer border-0 d-flex justify-content-between mx-4 pb-4"
        >
          <div class="form-check form-switch mt-2">
            <input
              class="form-check-input"
              v-model="form.is_active"
              type="checkbox"
              role="switch"
              id="flexSwitchCheckDefault"
            />
            <label
              class="form-check-label text-primary"
              for="flexSwitchCheckDefault"
              >{{ __("active") }}?</label
            >
          </div>
          <div class="d-flex gap-3">
            <button
              type="button"
              class="btn btn-dark shadow-find fs-3"
              data-bs-dismiss="modal"
            >
              {{ __("cancel") }}
            </button>
            <button
              :class="{ 'text-white-50': form.processing }"
              :disabled="form.processing"
              type="button"
              class="btn btn-primary shadow-find px-5 fs-3"
              @click="modalData ? update() : create()"
            >
              <div
                v-show="form.processing"
                class="spinner-border spinner-border-sm"
              >
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
// import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';
import ImageCropperModal from "@/Components//Shared/ImageCropperModal.vue";
import Multiselect from "@vueform/multiselect";

export default defineComponent({
  components: {
    Modal,
    // ClassicEditor,
    ImageCropperModal,
    Multiselect,
  },
  data() {
    return {
      form: this.$inertia.form({
        name: {},
        description: {},
        is_active: false,
        image: null,
        link_type: "external",
        file_type: "audio",
        audio: null,
        video: null,
        file_url: "",
        tag_ids: [],
      }),
      tags: this.$page.props.tags,
      showImportModal: false,
      image_url: null,
      croppedImageSrc: null,
      tags: [],
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
  mounted() {
    this.tags = this.$page.props.tags;
  },
  methods: {
    onFileChange(e) {
      this.image_url = null;
      const file = e.target.files[0];
      this.image_url = URL.createObjectURL(file);
      this.croppedImageSrc = null;
      this.showImportModal = true;
    },
    onBroadcastFileChange(e, type) {
      const file = e.target.files[0];
      this.form[type] = file;
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
    reset() {
      this.form.name = {};
      this.form.description = {};
      this.form.is_active = false;
      this.form.image = null;
      this.form.link_type = "external";
      this.form.file_type = "audio";
      this.form.audio = null;
      this.form.video = null;
      this.form.file_url = "";
      this.form.tag_ids = [];
    },
    computed: {},
    create() {
      this.form.post(this.route("clinics.clinic_broadcasts.store"), {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
          this.$toast.show("Created Successfully");
          this.$emit("refreshData");
          this.$emit("clearModalData");
          this.reset();
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
          this.route("clinics.clinic_broadcasts.update", {
            clinic_broadcast: this.modalData.id,
          }),
          {
            preserveState: true,
            preserveScroll: true,
            onSuccess: () => {
              this.$toast.show("Updated Successfully");
              this.$emit("refreshData");
              this.$emit("clearModalData");
              this.reset();
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
            link_type: "external",
            file_type: "audio",
            audio: null,
            video: null,
            file_url: "",
            tag_ids: [],
          });
          this.image_url = null;
        } else {
          // set modal editable data
          this.form = this.$inertia.form(this.modalData);
          this.form.image = null;
          this.form.audio = null;
          this.form.video = null;
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
