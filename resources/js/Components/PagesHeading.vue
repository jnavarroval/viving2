<template>
  <div class="container">
    <div class="row pt-4 pt-md-0">
      <div class="col-12">
        <div
          class="d-flex flex-md-row flex-column align-items-center justify-content-between"
        >
          <div class="d-flex flex-column align-items-start">
            <h2
              :class="textwhite ? 'text-white' : 'text-black'"
              class="text-center display-6"
            >
              {{ __(heading) }}
            </h2>
            <breadcrums
              :white="textwhite"
              :breadcrums="breadcrums"
            ></breadcrums>
          </div>
          <div class="position-relative">
            <img
              class="heading-symbol"
              src="@/images/icons/headingsymbol.png"
              alt=""
            />
            <Link
              v-if="account"
              :href="route('dashboard')"
              class="btn bg-white d-flex align-items-center fs-3 fw-bold gap-2 px-md-4 rounded-4 text-primary position-absolute top-50 start-75 translate-middle"
            >
              <div class="icon-dashboard rounded-circle">
                <img src="@/images/icons/dashboard.svg" alt="" />
              </div>
              {{ __("dashboard") }}
            </Link>
            <Link
              v-if="dashboard"
              :href="route('account')"
              class="btn bg-white d-flex align-items-center fs-3 fw-bold gap-2 px-md-4 rounded-4 text-primary position-absolute top-50 start-75 translate-middle"
            >
              <div class="icon-dashboard rounded-circle">
                <img src="@/images/icons/dashboard.svg" alt="" />
              </div>
              {{ __("Profile") }}
            </Link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import Breadcrums from "./Shared/Breadcrums.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default defineComponent({
  data() {
    return {
      //   breadcrums: [
      //     {
      //       id: 1,
      //       name: this.__("home"),
      //       link: "/",
      //     },
      //     {
      //       id: 2,
      //       name: this.__(`${window.location.pathname.split("/")[1]}`),
      //       link: "",
      //     },
      //   ],
    };
  },
  components: {
    Breadcrums,
    Link,
  },
  props: ["heading", "textwhite", "breadcrums", "account", "dashboard"],
});
</script>
