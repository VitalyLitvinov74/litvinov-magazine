<template>
  <div>
    <component v-bind:is="template"></component>
  </div>
</template>
<script>
  import mioca from "../templates/mioca";

  export default {
    components: {
      mioca
    },
    created() {
      this.template = this.$store.getters['layout/name'];
    },
    data: function () {
      return {
        template: null
      }
    }
  }
</script>

