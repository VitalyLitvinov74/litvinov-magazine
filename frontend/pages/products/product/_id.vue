<template>
  <div>
    <component v-bind:is="product">

    </component>
  </div>
</template>
<script>
  import MiocaProduct from "../../../templates/mioca/MiocaProduct";

  export default {
    components: {
      MiocaProduct,
    },
    created() {
      switch (this.$store.getters['layout/name']) {
        default:
        case "mioca":
          this.product = MiocaProduct;
          break;
          //сюда и дальше добавлять новые страницы шаблонов.
      }
    },
    data: function () {
      return {
        product: null
      };
    }
  }
</script>
