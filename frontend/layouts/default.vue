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
    data: function(){
      return {
        template: this.userSelectedTemplate()
      }
    },
    methods: {
      userSelectedTemplate: function () {
        //здесь получать от бека выбранный пользователем шаблон.
        // this.$store.commit('layout', 'mioca');
        return "mioca";
      }
    }
  }
</script>

