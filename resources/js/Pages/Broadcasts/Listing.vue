<template>
  <app-layout title="My Profile">
    <div class="bg-primary">
      <pages-heading
        :heading="'broadcast'"
        :breadcrums="breadcrums"
        :textwhite="'true'"
      ></pages-heading>
    </div>
    <div class="stats py-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="text-center display-2 text-black fw-bold mb-2">
              {{ __("navigate media") }}
            </h2>
            <div
              v-if="getPageContentType('media_page_description') == 'textarea'"
            >
              <div v-html="getPageContent('media_page_description')"></div>
            </div>
            <div
              v-else-if="getPageContentType('media_page_description') == 'text'"
            >
              <p>{{ getPageContent("media_page_description") ?? "-" }}</p>
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
      </div>

      <div class="section pb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <find-broadcast-bar
                @getBroadcasts="onSearch"
                :is_redirect="false"
              ></find-broadcast-bar>
            </div>

            <div class="col-md-12">
              <div class="row mx-0 mt-4">
                <div class="col-12" v-if="fetching">
                  <div class="row media-skeleton-cards">
                    <div class="col-md-4 mb-4">
                      <card-skeleton></card-skeleton>
                    </div>
                    <div class="col-md-4 mb-4">
                      <card-skeleton></card-skeleton>
                    </div>
                    <div class="col-md-4 mb-4">
                      <card-skeleton></card-skeleton>
                    </div>
                    <div class="col-md-4 mb-4">
                      <card-skeleton></card-skeleton>
                    </div>
                    <div class="col-md-4 mb-4">
                      <card-skeleton></card-skeleton>
                    </div>
                    <div class="col-md-4 mb-4">
                      <card-skeleton></card-skeleton>
                    </div>
                  </div>
                </div>
                <div class="col-12" v-if="!fetching">
                  <div v-if="broadcasts.data.length > 0" class="row">
                    <broadcast-card
                      :add_col="true"
                      v-for="broadcast in broadcasts.data"
                      :key="broadcast.id"
                      :broadcast="broadcast"
                    ></broadcast-card>
                  </div>
                  <div v-else class="row">
                    <div class="col-12 text-center mb-3">
                      <record-not-found></record-not-found>
                    </div>
                  </div>
                  <div
                    class="row my-4"
                    v-if="broadcasts.meta.last_page != this.filter.page"
                  >
                    <div
                      class="col-md-12 d-flex align-items-center justify-content-center"
                    >
                      <button
                        @click="loadMore()"
                        class="btn btn-primary position-relative rounded-4 px-5 mb-5"
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
import FindBroadcastBar from "@/Components/Broadcasts/FindBroadcastBar.vue";
import BroadcastCard from "@/Components/Broadcasts/BroadcastCard.vue";
import RecordNotFound from "../../Components/Shared/RecordNotFound.vue";
import Breadcrums from "../../Components/Shared/Breadcrums.vue";
import CardSkeleton from "@/Components/Skeleton/CardSkeleton.vue";
import PagesHeading from "../../Components/PagesHeading.vue";

export default defineComponent({
  mixins: [PaginationMixin],
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    BroadcastCard,
    FindBroadcastBar,
    RecordNotFound,
    Breadcrums,
    CardSkeleton,
    PagesHeading,
  },
  created() {},
  data() {
    return {
      broadcasts: {},
      doctor: route().params.doctor ?? "",
      clinic: route().params.clinic ?? "",
      breadcrums: [
        {
          id: 1,
          name: this.__("Home"),
          link: "/",
        },
        {
          id: 2,
          name: this.__("broadcast"),
          link: "",
        },
      ],
    };
  },
  methods: {
    async getPaginatedData(loading_more = false) {
      await this.getBroadcasts(loading_more);
    },
    getBroadcasts(loading_more) {
      // if(Object.keys(route().params).length > 0){
      //     this.$inertia.replace(route('broadcasts.listing'))
      // }
      this.filter.doctor = this.doctor;
      this.filter.clinic = this.clinic;
      axios.post(this.route("getApiBroadcasts"), this.filter).then((res) => {
        const data = res.data.data;
        if (loading_more) {
          this.broadcasts.data = this.broadcasts.data.concat(data.data);
        } else {
          this.broadcasts.data = data.data;
        }
        this.broadcasts.links = data.links;
        this.broadcasts.meta = data.meta;
        this.fetching = false;
      });
    },
  },
});
</script>
