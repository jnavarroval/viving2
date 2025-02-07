<template>
  <app-layout title="My Profile">
    <div class="bg-primary">
      <pages-heading
        :heading="'events'"
        :breadcrums="breadcrums"
        :textwhite="'true'"
      ></pages-heading>
    </div>
    <div class="stats">
      <div class="row mx-0 py-5">
        <div class="col-md-12">
          <h2 class="text-center display-2 text-black fw-bold mb-2">
            {{ __("navigate events") }}
          </h2>
          <div
            v-if="getPageContentType('events_page_description') == 'textarea'"
          >
            <div
              class="fs-4 text-center text-black"
              v-html="getPageContent('events_page_description')"
            ></div>
          </div>
          <div
            v-else-if="getPageContentType('events_page_description') == 'text'"
          >
            <p>{{ getPageContent("events_page_description") ?? "-" }}</p>
          </div>
          <div v-else>
            <p class="fs-4 text-center text-black">
              Our team of highly skilled attorneys comprises seasoned
              professionals with extensive experience in their respective
              fields. We pride ourselves<br />
              on recruiting top legal talent, ensuring that you receive the
              highest standard of representation. From complex litigation to
              intricate.
            </p>
          </div>
        </div>
      </div>

      <div class="section p-0">
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
                      <div class="offcanvas-body">
                        <find-event-bar
                          @getEvents="onSearch"
                          :is_redirect="false"
                        ></find-event-bar>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div
              class="row mb-5 h-100"
              :class="list_view ? 'ListView' : 'GridView'"
            >
              <div class="col-12 mt-5" v-if="fetching">
                <div class="row h-100">
                  <div class="col-6">
                    <event-skeleton></event-skeleton>
                  </div>
                  <div class="col-6">
                    <event-skeleton></event-skeleton>
                  </div>
                  <div class="col-6">
                    <event-skeleton></event-skeleton>
                  </div>
                  <div class="col-6">
                    <event-skeleton></event-skeleton>
                  </div>
                </div>
              </div>
              <div
                class="col-12 px-0"
                :class="list_view ? 'p-0' : ''"
                v-if="!fetching"
              >
                <div v-if="events.data.length > 0" class="row">
                  <div
                    :class="list_view ? 'col-md-6' : 'col-md-6 mt-4'"
                    v-for="(event, index) in events.data"
                    :key="index"
                  >
                    <event-card
                      v-if="grid_view"
                      :add_col="false"
                      :key="event.id"
                      :event="event"
                    ></event-card>
                    <event-listing-card
                      v-if="list_view"
                      :add_col="false"
                      :key="event.id"
                      :event="event"
                    ></event-listing-card>
                  </div>
                </div>

                <div v-else class="row h-100">
                  <div class="col-12 text-center mb-3">
                    <record-not-found></record-not-found>
                  </div>
                </div>
                <div
                  class="row mt-5"
                  v-if="events.meta.last_page != this.filter.page"
                >
                  <div
                    class="col-md-12 d-flex align-items-center justify-content-center"
                  >
                    <button
                      @click="loadMore()"
                      class="btn btn-primary position-relative rounded-4 px-5 fw-bold mt-3 mb-5"
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
  </app-layout>
</template>
<script>
import { defineComponent } from "vue";
import PaginationMixin from "@/Mixins/PaginationMixin.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import FindEventBar from "@/Components/Events/FindEventBar.vue";
import EventCard from "@/Components/Events/EventCard.vue";
import EventListingCard from "@/Components/Events/EventListingCard.vue";
import RecordNotFound from "../../Components/Shared/RecordNotFound.vue";
import EventSkeleton from "../../Components/Skeleton/EventSkeleton.vue";
import Breadcrums from "../../Components/Shared/Breadcrums.vue";
import PagesHeading from "../../Components/PagesHeading.vue";

export default defineComponent({
  mixins: [PaginationMixin],
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    EventSkeleton,
    EventCard,
    FindEventBar,
    EventListingCard,
    RecordNotFound,
    PagesHeading,
    Breadcrums,
  },
  created() {},
  data() {
    return {
      events: {},
      doctor: route().params.doctor ?? "",
      clinic: route().params.clinic ?? "",
      grid_view: false,
      list_view: true,
      breadcrums: [
        {
          id: 1,
          name: this.__("Home"),
          link: "/",
        },
        {
          id: 2,
          name: this.__("events"),
          link: "",
        },
      ],
    };
  },
  methods: {
    async getPaginatedData(loading_more = false) {
      await this.getEvents(loading_more);
    },
    getEvents(loading_more) {
      // if(Object.keys(route().params).length > 0){
      //     this.$inertia.replace(route('events.listing'))
      // }
      this.filter.clinic = this.clinic;
      axios.post(this.route("getApiEvents"), this.filter).then((res) => {
        const data = res.data.data;
        if (loading_more) {
          this.events.data = this.events.data.concat(data.data);
        } else {
          this.events.data = data.data;
        }
        this.events.links = data.links;
        this.events.meta = data.meta;
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
