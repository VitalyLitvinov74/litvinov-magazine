<template>
  <div>
    <component v-bind:is="product">

    </component>
  </div>
</template>
<script>
  import MiocaProduct from "../../templates/mioca/MiocaProduct";

  export default {
    components: {
      MiocaProduct,
    },
    data: function () {
      return {
        product: this.productPage()
      }
    },
    methods: {
      productPage: function () {
        return MiocaProduct;
      }
    }
  }
</script>
