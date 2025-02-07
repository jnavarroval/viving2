<template>
  <app-layout title="Pricing Plan">
    <template #header> </template>
    <template #default>
      <div class="container-fluid bg-primary py-5">
        <div class="row">
          <div
            class="col-12 d-flex flex-column align-content-center justify-content-center"
          >
            <h2 class="fw-bolder text-center text-white display-1">
              {{ __("subscription plans") }}
            </h2>
            <p class="fs-4 text-center text-white">
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

      <div class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table table-striped table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">
                        <h5
                          class="text-primary pb-4 pb-md-5 fw-bold"
                          style="font-size: 25px"
                        >
                          {{ __("choose your") }} <br />
                          {{ __("plan")
                          }}<span class="text-black fw-semibold fs-5 ms-1"
                            >/{{ __("month") }}</span
                          >
                        </h5>
                      </th>
                      <th
                        v-for="pricing_plan in pricing_plans"
                        :key="pricing_plan.id"
                        scope="col"
                        class="text-center"
                      >
                        <h5 class="fs-3 fw-bolder text-black my-1">
                          {{ pricing_plan.name }}
                        </h5>
                        <h5 class="fs-3 fw-bold text-primary mb-2">
                          {{ getDisplayAmount(pricing_plan.price)
                          }}<span class="text-black">{{
                            __("/month")
                          }}</span
                          ><br />
                          <span v-if="!pricing_plan.is_paid">
                            ({{ __("free") }})</span
                          >
                        </h5>
                        <Link
                          v-if="
                            $page.props.auth &&
                            ($page.props.auth.logged_in_as == 'doctor' ||
                              $page.props.auth.logged_in_as == 'clinic') &&
                            $page.props.auth.user[pricing_plan.type]
                              .pricing_plan_id == pricing_plan.id
                          "
                          :href="
                            route('pricing.show', {
                              type: pricing_plan.type,
                              slug: pricing_plan.slug,
                            })
                          "
                          class="btn btn-primary fs-6 my-2 rounded-pill"
                          >{{ __("Subscribed") }}
                        </Link>
                        <Link
                          v-else
                          :href="
                            route('pricing.show', {
                              type: pricing_plan.type,
                              slug: pricing_plan.slug,
                            })
                          "
                          class="btn btn-primary fs-6 my-2 rounded-pill"
                          >{{ __("Get This Plan") }}</Link
                        >
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="module in modules" :key="module.id">
                      <th scope="row" class="py-2">
                        {{ __(module.display_name) }}
                      </th>
                      <td
                        v-for="pricing_plan in pricing_plans"
                        :key="pricing_plan.id"
                        class="py-2"
                      >
                        <i
                          v-if="
                            pricing_plan.modules.includes(module.module_code)
                          "
                          class="bi fs-2 bi-check text-success d-flex justify-content-center"
                        ></i>
                        <i
                          v-else
                          class="bi fs-2 bi-x d-flex text-danger justify-content-center"
                        ></i>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Navbar from "@/Layouts/AppIncludes/Navbar.vue";
import PageHeader from "@/Components/PageHeader.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default defineComponent({
  components: {
    AppLayout,
    Navbar,
    PageHeader,
    Link,
  },
  props: ["pricing_plans", "modules"],
  mounted() {},
  data() {
    return {
      type: route().params.type,
    };
  },
  created() {},
});
</script>

<style scoped>
.nav-pills-c {
  background-color: #f3f3f3 !important;
  width: fit-content !important;
}
.nav-link-c.active {
  box-shadow: 2px 3px 7px #b5b5b5 !important;
}

.categories {
  list-style: none;
  color: #535353;
  font-size: 16px;
  margin-bottom: 20px;
  font-weight: 600;
}

.liststyle {
  margin-top: 91px;
  margin-left: -25px;
}

.btn-sm {
  height: 32px;
  width: 140px;
  padding-top: 7px;
}
.list-group {
  margin-top: 24px;
}
.list-group li {
  border: none;
  margin-bottom: 6px;
  width: 180px;
  margin-left: -16px;
}
</style>
