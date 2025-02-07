<template>
  <div class="card rounded-20 shadow">
    <div class="card-body px-0">
      <div
        class="d-flex align-items-center justify-content-between px-5 border-bottom border-primary pb-4 pt-2"
      >
        <h3 class="text-black fs-3 mb-0 fw-bold">
          {{ __("Messages") }}
        </h3>
        <!-- <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            value=""
            id="flexCheckChecked"
            checked
          />
          <label class="form-check-label" for="flexCheckChecked">
            {{ __("Mark as all read") }}
          </label>
        </div> -->
      </div>
      <div class="row p-4">
        <div class="col-md-12" v-if="this.$page.props.messages.length">
          <div
            v-for="(message, index) in this.$page.props.messages"
            :key="index"
            class="card hvr-effect rounded-20 px-3 py-custom mb-3"
            style="background-color: #f4f9fd"
          >
            <div class="d-flex align-items-center gap-4 justify-content-between">
              <div class="d-flex align-items-center gap-4">
                <div
                  class="img-tag d-flex justify-content-center align-items-center rounded-4"
                  style="background-color: #dfecf3"
                >
                  <i class="bi bi-envelope fs-1"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="fw-normal fs-3">
                    {{ message.messages[0].sender.first_name }}
                    {{ message.messages[0].sender.last_name }}
                  </h6>
                  <h6 class="fw-normal fs-4 text-paragraphcolor mb-0">
                    {{ message.messages[0].message }}
                  </h6>
                </div>
              </div>
              <div class="dropdown bg-transparent">
                <button
                  class="btn btn-secondary border-0 dropdown-toggle bg-transparent"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="bi icon-color bi-three-dots display-6"></i>
                </button>

                <ul class="dropdown-menu border border-primary rounded-4">
                  <!-- <li class="w-100">
                    <a class="dropdown-item rounded-pill fs-5 pb-0"
                      ><img class="" src="@/images/icons/msg.svg" alt="" />{{
                        __("mark as read")
                      }}</a
                    >
                  </li> -->
                  <li class="w-100">
                    <a
                      :href="
                        this.route(
                          'doctor.appointment_log.detail',
                          message.messages[0].appointment_id
                        )
                      "
                      class="dropdown-item rounded-pill d-flex gap-2 ms-2 my-2 fs-5"
                      ><img class="" src="@/images/icons/eye2.svg" alt="" />{{
                        __("view")
                      }}</a
                    >
                  </li>
                  <!-- <li class="w-100">
                    <a class="dropdown-item d-flex gap-2 rounded-pill ms-2 fs-5" href="#"
                      ><img class="" src="@/images/icons/del.svg" alt="" />Delete</a
                    >
                  </li> -->
                </ul>
              </div>
            </div>
          </div>
          <!-- <div
            class="card hvr-effect rounded-20 px-3 py-custom mb-3"
            style="background-color: #f4f9fd"
          >
            <div class="d-flex align-items-center gap-4 justify-content-between">
              <div class="d-flex align-items-center gap-4">
                <div
                  class="img-tag d-flex justify-content-center align-items-center rounded-4"
                  style="background-color: #dfecf3"
                >
                  <i class="bi bi-envelope fs-1"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="fw-normal fs-3">Linda John</h6>
                  <h6 class="fw-normal fs-4 text-paragraphcolor mb-0">
                    Lorum Ipsum dollar seite emit
                  </h6>
                </div>
              </div>
              <div class="dropdown bg-transparent">
                <button
                  class="btn btn-secondary border-0 dropdown-toggle bg-transparent"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="bi icon-color bi-three-dots display-6"></i>
                </button>

                <ul class="dropdown-menu border border-primary rounded-4">
                  <li class="w-100">
                    <a class="dropdown-item rounded-pill fs-5 pb-0" href="#"
                      ><img class="" src="@/images/icons/msg.svg" alt="" />Mark as a
                      Unread</a
                    >
                  </li>
                  <li class="w-100">
                    <a
                      class="dropdown-item rounded-pill d-flex gap-2 ms-2 my-2 fs-5"
                      href="#"
                      ><img class="" src="@/images/icons/eye2.svg" alt="" />View</a
                    >
                  </li>
                  <li class="w-100">
                    <a class="dropdown-item d-flex gap-2 rounded-pill ms-2 fs-5" href="#"
                      ><img class="" src="@/images/icons/del.svg" alt="" />Delete</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div
            class="card hvr-effect rounded-20 px-3 py-custom mb-3"
            style="background-color: #f4f9fd"
          >
            <div class="d-flex align-items-center gap-4 justify-content-between">
              <div class="d-flex align-items-center gap-4">
                <div
                  class="img-tag d-flex justify-content-center align-items-center rounded-4"
                  style="background-color: #dfecf3"
                >
                  <i class="bi bi-envelope fs-1"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="fw-normal fs-3">Linda John</h6>
                  <h6 class="fw-normal fs-4 text-paragraphcolor mb-0">
                    Lorum Ipsum dollar seite emit
                  </h6>
                </div>
              </div>
              <div class="dropdown bg-transparent">
                <button
                  class="btn btn-secondary border-0 dropdown-toggle bg-transparent"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="bi icon-color bi-three-dots display-6"></i>
                </button>

                <ul class="dropdown-menu border border-primary rounded-4">
                  <li class="w-100">
                    <a class="dropdown-item rounded-pill fs-5 pb-0" href="#"
                      ><img class="" src="@/images/icons/msg.svg" alt="" />Mark as a
                      Unread</a
                    >
                  </li>
                  <li class="w-100">
                    <a
                      class="dropdown-item rounded-pill d-flex gap-2 ms-2 my-2 fs-5"
                      href="#"
                      ><img class="" src="@/images/icons/eye2.svg" alt="" />View</a
                    >
                  </li>
                  <li class="w-100">
                    <a class="dropdown-item d-flex gap-2 rounded-pill ms-2 fs-5" href="#"
                      ><img class="" src="@/images/icons/del.svg" alt="" />Delete</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div
            class="card hvr-effect rounded-20 px-3 py-custom mb-3"
            style="background-color: #f4f9fd"
          >
            <div class="d-flex align-items-center gap-4 justify-content-between">
              <div class="d-flex align-items-center gap-4">
                <div
                  class="img-tag d-flex justify-content-center align-items-center rounded-4"
                  style="background-color: #dfecf3"
                >
                  <i class="bi bi-envelope fs-1"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="fw-normal fs-3">Linda John</h6>
                  <h6 class="fw-normal fs-4 text-paragraphcolor mb-0">
                    Lorum Ipsum dollar seite emit
                  </h6>
                </div>
              </div>
              <div class="dropdown bg-transparent">
                <button
                  class="btn btn-secondary border-0 dropdown-toggle bg-transparent"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="bi icon-color bi-three-dots display-6"></i>
                </button>

                <ul class="dropdown-menu border border-primary rounded-4">
                  <li class="w-100">
                    <a class="dropdown-item rounded-pill fs-5 pb-0" href="#"
                      ><img class="" src="@/images/icons/msg.svg" alt="" />Mark as a
                      Unread</a
                    >
                  </li>
                  <li class="w-100">
                    <a
                      class="dropdown-item rounded-pill d-flex gap-2 ms-2 my-2 fs-5"
                      href="#"
                      ><img class="" src="@/images/icons/eye2.svg" alt="" />View</a
                    >
                  </li>
                  <li class="w-100">
                    <a class="dropdown-item d-flex gap-2 rounded-pill ms-2 fs-5" href="#"
                      ><img class="" src="@/images/icons/del.svg" alt="" />Delete</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div> -->
        </div>

        <div class="col-md-12 fs-2 text-center" v-else>
          {{ __("message not found") }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: "DashboardNotification",

  methods: {
    markAsRead(notification) {
      axios
        .post(this.route("notifications.read", { id: notification.id }))
        .then((res) => {
          // Update the notifications list
        });

      this.$inertia.replace(notification.data.url);
    },
  },
});
</script>

<style scoped>
.dropdown-toggle::after {
  content: "";
  display: none;
}

.dropdown-item:hover {
  background-color: #e2f6ff;
}
</style>
