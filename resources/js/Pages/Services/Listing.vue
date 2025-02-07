<template>
  <app-layout title="My Profile">
    <div class="stats">
      <pages-heading
        :heading="'services'"
        :breadcrums="breadcrums"
        :white="true"
      ></pages-heading>
      <find-doctor-bar
        :title="'Search Related Doctors near by you'"
        :home="true"
      ></find-doctor-bar>

      <div class="section py-0">
        <div class="d-flex justify-content-center py-5">
          <div
            v-if="getPageContentType('services_page_description') == 'textarea'"
          >
            <div v-html="getPageContent('services_page_description')"></div>
          </div>
          <div
            v-else-if="
              getPageContentType('services_page_description') == 'text'
            "
          >
            <p>{{ getPageContent("services_page_description") ?? "-" }}</p>
          </div>
          <div v-else>
            <h2 class="fs-2 text-center">
              <span class="fw-normal">{{ __("explore") }}| </span>
              <span class="fw-bold">{{ __("all service") }}</span>
            </h2>
          </div>
        </div>
        <div class="container">
          <div class="row bg-white rounded-4 p-2">
            <div class="col-md-12">
              <div class="row align-items-center py-4 py-md-2">
                <div class="col-md-4">
                  <div class="d-flex gap-3">
                    <span class="pe-3" style="border-right: 1px solid #e5e5e5"
                      ><button
                        :class="
                          grid_view
                            ? 'btn fs-3 btn-primary rounded-custom px-4 border-0'
                            : 'btn fs-3 text-black btn-transparent rounded-custom px-4 border-0'
                        "
                        @click="GridView()"
                      >
                        <i
                          :class="grid_view ? 'text-white' : 'text-dark'"
                          class="bi bi-columns-gap me-2"
                        ></i>
                        {{
                          getPageContent("general_grid_btn_text") ?? "Grid View"
                        }}
                      </button></span
                    >
                    <button
                      :class="
                        list_view
                          ? 'btn fs-3 btn-primary rounded-custom px-4 border-0'
                          : 'btn fs-3 text-black btn-transparent rounded-custom px-4 border-0'
                      "
                      @click="listView()"
                    >
                      <i
                        :class="list_view ? 'text-white' : 'text-dark'"
                        class="bi bi-list me-2"
                      ></i>
                      {{
                        getPageContent("general_list_btn_text") ?? "List View"
                      }}
                    </button>
                  </div>
                </div>
                <div class="col-md-8">
                  <div
                    class="d-flex mt-3 mt-md-0 align-items-center justify-content-md-end"
                  >
                    <div class="d-flex align-items-center col-md-5 col-8">
                      <label
                        for="exampleFormControlInput1"
                        class="form-label text-black fs-3 fw-normal mb-0 pe-md-2"
                        >{{ __("Show Result") }}:</label
                      >
                      <div class="col-md-7 col-10">
                        <select
                          class="form-select fs-4 py-2 px-4 ms-3 text-black"
                          style="
                            border-radius: 12px;
                            border: 1px solid #294481 !important;
                          "
                          aria-label="Default select example"
                          v-model="show_results"
                          @change="getServices()"
                        >
                          <option>10</option>
                          <option>20</option>
                          <option>30</option>
                        </select>
                      </div>
                    </div>
                    <button
                      class="btn px-3 py-2 ms-5 ms-md-3 btn-primary rounded-4"
                      data-bs-toggle="offcanvas"
                      data-bs-target="#offcanvasRight"
                      aria-controls="offcanvasRight"
                    >
                      <img width="25" src="@/images/icons/Union.png" alt="" />
                    </button>

                    <div
                      class="offcanvas p-4 custom-offcanvas offcanvas-end"
                      tabindex="-1"
                      id="offcanvasRight"
                      aria-labelledby="offcanvasRightLabel"
                    >
                      <div
                        class="offcanvas-header align-items-start border-bottom border-2"
                      >
                        <div class="d-flex flex-column">
                          <h5 class="display-6 text-black">
                            {{ __("Filters") }}
                          </h5>
                          <p class="subheading-fs">
                            {{
                              __(
                                "Discover your ideal doctor effortlessly using these convenient filters"
                              )
                            }}
                          </p>
                        </div>
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="offcanvas"
                          aria-label="Close"
                        ></button>
                      </div>
                      <div class="offcanvas-body p-0">
                        <find-service-bar
                          @getServices="onSearch"
                          :is_redirect="false"
                        ></find-service-bar>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 px-md-0">
              <div class="row mx-0 my-5">
                <div class="col-12" v-if="fetching">
                  <div class="row">
                    <div class="col-md-12 mb-4">
                      <spotlight-card-skeleton></spotlight-card-skeleton>
                    </div>
                    <div class="col-md-12 mb-4">
                      <spotlight-card-skeleton></spotlight-card-skeleton>
                    </div>
                    <div class="col-md-12 mb-4">
                      <spotlight-card-skeleton></spotlight-card-skeleton>
                    </div>
                    <div class="col-md-12 mb-4">
                      <spotlight-card-skeleton></spotlight-card-skeleton>
                    </div>
                  </div>
                </div>
                <div class="col-12" v-if="!fetching">
                  <div v-if="services.data.length > 0" class="row">
                    <div
                      :class="list_view ? 'col-12 p-0' : 'col-md-4'"
                      v-for="service in services.data"
                      :key="service.id"
                    >
                      <div v-if="list_view">
                        <service-list-card
                          :add_col="true"
                          :list_card="true"
                          :key="service.id"
                          :service="service"
                        >
                        </service-list-card>
                      </div>

                      <div class="h-100" v-if="grid_view">
                        <service-card
                          :add_col="false"
                          :service="service"
                        ></service-card>
                      </div>
                    </div>
                  </div>

                  <div v-else class="row">
                    <div class="col-12 text-center mb-3">
                      <record-not-found></record-not-found>
                    </div>
                  </div>
                  <div
                    class="row my-4"
                    v-if="services.meta.last_page != this.filter.page"
                  >
                    <div
                      class="col-md-12 d-flex align-items-center justify-content-center"
                    >
                      <button
                        @click="loadMore()"
                        class="btn btn-primary position-relative"
                        :disabled="loading_more"
                      >
                        <span
                          :class="{
                            loader: loading_more,
                          }"
                          class="position-absolute"
                        ></span>
                        {{ __("load more") }}
                      </button>
                    </div>
                  </div>
                </div>
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
import PaginationMixin from "@/Mixins/PaginationMixin.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import FindServiceBar from "@/Components/Services/FindServiceBar.vue";
import ServiceCard from "@/Components/Services/ServiceCard.vue";
import ServiceListCard from "@/Components/Services/ServiceListCard.vue";
import RecordNotFound from "../../Components/Shared/RecordNotFound.vue";
import Breadcrums from "../../Components/Shared/Breadcrums.vue";
import SpotlightCardSkeleton from "@/Components/Skeleton/SpotLightCardSkeleton.vue";
import PagesHeading from "../../Components/PagesHeading.vue";
import FindDoctorBar from "../../Components/Doctors/FindDoctorBar.vue";
export default defineComponent({
  mixins: [PaginationMixin],
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    ServiceCard,
    ServiceListCard,
    FindServiceBar,
    FindDoctorBar,
    RecordNotFound,
    PagesHeading,
    Breadcrums,
    SpotlightCardSkeleton,
  },
  created() {
    this.getServices();
  },
  data() {
    return {
      services: {},
      grid_view: false,
      list_view: true,
      show_results: 10,
      filter: {
        perPage: 0,
      },
      breadcrums: [
        {
          id: 1,
          name: this.__("home"),
          link: "/",
        },
        {
          id: 2,
          name: this.__("services"),
          link: "",
        },
      ],
    };
  },
  methods: {
    async getPaginatedData(loading_more = false) {
      await this.getServices(loading_more);
    },
    getServices(loading_more) {
      this.filter.perPage = this.show_results;
      axios.post(this.route("getApiServices"), this.filter).then((res) => {
        const data = res.data.data;
        if (loading_more) {
          this.services.data = this.services.data.concat(data.data);
        } else {
          this.services.data = data.data;
        }
        this.services.links = data.links;
        this.services.meta = data.meta;
        this.fetching = false;
      });
    },
    listView() {
      this.list_view = true;
      this.grid_view = false;
    },

    GridView() {
      this.list_view = false;
      this.grid_view = true;
    },
  },
});
</script>

<style lang="scss">
.rounded-custom {
  border-radius: 15px;
}
</style>
