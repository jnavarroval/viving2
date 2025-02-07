<template>
  <teleport to="body">
    <div
      class="modal fade"
      style="z-index: 1054"
      tabindex="-1"
      :id="id"
      :aria-labelledby="id"
      aria-hidden="true"
    >
      <div class="modal-dialog" :class="maxWidthClass">
        <slot></slot>
      </div>
    </div>
  </teleport>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  data() {
    return {
      key: 0,
    };
  },
  props: {
    id: {
      type: String,
      required: true,
    },
    maxWidth: {
      default: "lg",
    },
    backdrop: {
      default: null,
    },
  },

  created() {
    this.key++;
  },

  computed: {
    maxWidthClass() {
      return {
        sm: "modal-sm",
        md: null,
        lg: "modal-lg",
        xl: "modal-xl",
      }[this.maxWidth];
    },
  },
});
</script>
