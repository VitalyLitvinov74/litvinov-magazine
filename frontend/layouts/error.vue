<template>
  <div>
    <component v-bind:is="templateError"></component>
  </div>
</template>
<script>
import miocaError from "../templates/miocaError.vue";

export default {
  components: {
    miocaError
  },
  created() {
    this.templateError = this.$store.getters['layout/name'] + "Error";
  },
  data: function () {
    return {
      templateError: null
    }
  }
}
</script>
