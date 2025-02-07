<template>
  <section>
    <h5 class="text-black mb-4 fw-bold fs-2">
      {{ __("Choose Your Plans") }}
    </h5>
    <div class="d-flex align-items-center overflow-x-scroll pb-5">
      <div
        v-for="pricing_plan in pricing_plans.pricing_plans"
        :key="pricing_plan.id"
      >
        <div class="card pricing-card rounded-20 shadow">
          <div class="card-body">
            <h3 class="text-primary fs-2 fw-bold mt-3">
              {{ pricing_plan.name }}
            </h3>
            <h5 class="fs-4 text-paragraphcolor fw-normal">
              {{ __("Everything") }}
            </h5>
            <h5 class="fs-3 fw-bold text-black">
              {{ getDisplayAmount(pricing_plan.price)
              }}<span class="text-paragraphcolor fs-4">{{ __("/month") }}</span
              ><br />
            </h5>
            <Link
              v-if="
                $page.props.auth &&
                ($page.props.auth.logged_in_as == 'doctor' ||
                  $page.props.auth.logged_in_as == 'clinic') &&
                $page.props.auth.user[pricing_plan.type].pricing_plan_id ==
                  pricing_plan.id
              "
              :href="
                route('pricing.show', {
                  type: pricing_plan.type,
                  slug: pricing_plan.slug,
                })
              "
              class="btn btn-outline-primary fs-3 py-2 fw-bold my-2 w-100 rounded-4"
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
              class="btn btn-primary fs-3 py-2 fw-bold my-2 w-100 rounded-4"
              >{{ __("Get This Plan") }}</Link
            >
            <ul class="ps-0 mb-0">
              <li
                v-for="module in pricing_plans[1]"
                :key="module.id"
                class="py-2 d-flex justify-content-between align-items-center fs-4 text-paragraphcolor"
              >
                <div class="d-flex align-items-center">
                  <i
                    v-if="pricing_plan.modules.includes(module.module_code)"
                    class="bi fs-2 bi-check"
                  ></i>
                  <i v-else class="bi fs-2 bi-x"></i>
                  <span class="ms-2 pe-4">{{ module.display_name }}</span>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

import axios from "axios";
export default defineComponent({
  components: {
    Link,
  },

  mounted() {},
  data() {
    return {
      pricing_plans: [],
      type: route().params.type,
    };
  },
  created() {
    this.getPricingPlans();
  },
  methods: {
    getPricingPlans() {
      axios.get(this.route("getApiAllPricingPlans")).then((res) => {
        this.pricing_plans = res.data.data;
      });
    },
  },
});
</script>

<style scoped>
::-webkit-scrollbar-track {
  border-radius: 10px;
  background-color: #e9ecef;
}

::-webkit-scrollbar {
  border-radius: 10px;
  width: 12px;
  background-color: #e9ecef;
}

::-webkit-scrollbar-thumb {
  border-radius: 10px;
  background-color: #a2c2d2;
}
</style>
