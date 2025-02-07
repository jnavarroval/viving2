<template>
  <div class="card rounded-20 shadow">
    <div class="card-body px-0">
      <div
        class="d-flex align-items-center justify-content-between px-5 border-bottom border-primary pb-4 pt-2"
      >
        <h3 class="text-black fs-3 mb-0 fw-bold">
          {{ __("Notifications") }}
        </h3>
        <div class="form-check">
          <!-- <input
            class="form-check-input"
            type="checkbox"
            value=""
            id="flexCheckChecked"
            checked
          />
          <label class="form-check-label" for="flexCheckChecked">
            {{ __("Mark as all read") }}
          </label> -->

          <button
            @click="markAllAsRead"
            v-if="this.unread"
            class="btn btn-primary rounded-4 fs-4"
          >
            {{ __("mark all read") }}
          </button>
        </div>
      </div>
      <div class="row p-4">
        <div class="col-md-12" v-if="this.$page.props.notifications.length">
          <div
            v-for="(notification, index) in this.$page.props.notifications"
            :key="index"
          >
            <div
              class="card rounded-20 px-3 py-custom mb-3"
              :class="notification.read_at == null ? 'bg-primary' : ''"
              :style="{
                backgroundColor: notification.read_at ? '#f4f9fd' : '',
              }"
            >
              <!-- {{ notification.read_at }} -->
              <div
                v-if="notification.read_at == null"
                class="d-flex align-items-center gap-4 justify-content-between"
              >
                <div class="d-flex align-items-center gap-4">
                  <div
                    class="img-tag d-flex justify-content-center align-items-center rounded-4"
                  >
                    <img class="w5-icon" src="@/images/icons/Bell.svg" alt="" />
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="fw-normal fs-3 text-white">
                      {{ notification.data.notification_type }}
                    </h6>
                    <h6 class="fw-normal fs-4 text-white mb-0">
                      {{ notification.data.message }}
                    </h6>
                  </div>
                </div>
                <button
                  @click.prevent="markAsRead(notification)"
                  class="bg-transparent border-0 text-white"
                >
                  {{ __("mark as read") }}
                  <!-- <i class="bi bi-x-circle"></i> -->
                </button>
                <button
                  @click.prevent="goToAppointment(notification)"
                  class="bg-transparent border-0 text-white"
                >
                  {{ __("Follow Up") }}
                </button>
              </div>

              <div v-else class="d-flex align-items-center gap-4 justify-content-between">
                <div class="d-flex align-items-center gap-4">
                  <div
                    class="img-tag d-flex justify-content-center align-items-center rounded-4"
                    style="background-color: #dfecf3"
                  >
                    <img class="w5-icon" src="@/images/icons/msg.svg" alt="" />
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="fw-normal fs-3">
                      {{ notification.data.notification_type }}
                    </h6>
                    <h6 class="fw-normal fs-4 text-paragraphcolor mb-0">
                      {{ notification.data.message }}
                    </h6>
                  </div>
                </div>
                <button
                  @click.prevent="goToAppointment(notification)"
                  class="bg-transparent border-0 text-muted"
                >
                  {{ __("Follow Up") }}
                </button>
              </div>
            </div>
          </div>
          <!-- <div
              class="card rounded-20 px-3 py-custom mb-3"
              style="background-color: #f4f9fd"
            >
              <div class="d-flex align-items-center gap-4 justify-content-between">
                <div class="d-flex align-items-center gap-4">
                  <div
                    class="img-tag d-flex justify-content-center align-items-center rounded-4"
                    style="background-color: #dfecf3"
                  >
                    <img class="w5-icon" src="@/images/icons/msg.svg" alt="" />
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="fw-normal fs-3">Linda John</h6>
                    <h6 class="fw-normal fs-4 text-paragraphcolor mb-0">
                      Lorum Ipsum dollar seite emit
                    </h6>
                  </div>
                </div>
                <button class="bg-transparent border-0 fs-2 text-muted">
                  <i class="bi bi-x-circle"></i>
                </button>
              </div>
            </div> -->
          <!-- <div
              class="card rounded-20 px-3 py-custom mb-3"
              style="background-color: #e3fde9"
            >
              <div class="d-flex align-items-center gap-4 justify-content-between">
                <div class="d-flex gap-4 align-items-center">
                  <div
                    class="img-tag d-flex justify-content-center align-items-center rounded-4"
                    style="background-color: #d0f3df"
                  >
                    <img class="" src="@/images/icons/1.svg" alt="" />
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="fw-normal fs-3">Documents deleted</h6>
                    <h6 class="fw-normal fs-4 text-paragraphcolor mb-0">
                      Lorum Ipsum dollar seite emit
                    </h6>
                  </div>
                </div>
                <button class="bg-transparent border-0 fs-2 text-muted">
                  <i class="bi bi-x-circle"></i>
                </button>
              </div>
            </div>
            <div
              class="card rounded-20 px-3 py-custom mb-3"
              style="background-color: #fff0f3"
            >
              <div class="d-flex align-items-center gap-4 justify-content-between">
                <div class="d-flex align-items-center gap-4">
                  <div
                    class="img-tag d-flex justify-content-center align-items-center rounded-4"
                    style="background-color: #f5dcde"
                  >
                    <img class="w5-icons" src="@/images/icons/2.svg" alt="" />
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="fw-normal fs-3">Documents deleted</h6>
                    <h6 class="fw-normal fs-4 text-paragraphcolor mb-0">
                      Lorum Ipsum dollar seite emit
                    </h6>
                  </div>
                </div>
                <button class="bg-transparent border-0 fs-2 text-muted">
                  <i class="bi bi-x-circle"></i>
                </button>
              </div>
            </div>
            <div
              class="card rounded-20 px-3 py-custom mb-3"
              style="background-color: #f4f9fd"
            >
              <div class="d-flex align-items-center gap-4 justify-content-between">
                <div class="d-flex align-items-center gap-4">
                  <div
                    class="img-tag d-flex justify-content-center align-items-center rounded-4"
                    style="background-color: #dfecf3"
                  >
                    <img class="w5-icon" src="@/images/icons/Bell_pin.svg" alt="" />
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="fw-normal fs-3">Linda John</h6>
                    <h6 class="fw-normal fs-4 text-paragraphcolor mb-0">
                      Lorum Ipsum dollar seite emit
                    </h6>
                  </div>
                </div>
                <button class="bg-transparent border-0 fs-2 text-muted">
                  <i class="bi bi-x-circle"></i>
                </button>
              </div>
            </div> -->
        </div>

        <div v-else class="col-md-12 fs-2 text-center">
          {{ __("notification is not found") }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import axios from "axios";

export default defineComponent({
  name: "DashboardNotification",
  data() {
    return {
      unread: false,
    };
  },
  watch: {
    "$page.props.notifications": {
      handler(newNotifications) {
        this.checkUnreadNotifications(newNotifications);
      },
      deep: true,
    },
  },
  methods: {
    markAsRead(notification) {
      axios.post(this.route("notifications.read", { id: notification.id })).then(() => {
        window.location.reload();
      });
    },
    markAllAsRead() {
      axios.get(this.route("notifications.read_all")).then(() => {
        window.location.reload();
      });
    },
    goToAppointment(notification) {
      this.$inertia.replace(notification.data.url);
    },
    checkUnreadNotifications(notifications) {
      const hasUnreadNotifications = notifications.some(
        (notification) => notification.read_at == null
      );

      this.unread = hasUnreadNotifications;
    },
  },
  mounted() {
    this.checkUnreadNotifications(this.$page.props.notifications);
  },
});
</script>

<style></style>
