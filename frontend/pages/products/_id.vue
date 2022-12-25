<template>
  <div>
    <component v-bind:is="productPage">

    </component>
  </div>
</template>
<script>
  import MiocaProduct from "../../templates/mioca/MiocaProduct";

  export default {
    components: {
      MiocaProduct,
    },
    created() {
      switch (this.$store.getters['layout/name']) {
        default:
        case "mioca":
          this.productPage = MiocaProduct;
          break;
        //сюда и дальше добавлять новые страницы шаблонов.
      }
    },
    data: function () {
      return {
        productPage: null
      };
    },

    async asyncData({$axios, route, error, store}) {
      await $axios.$get('/product/by-id', {
        params: {
          id: route.params.id
        }
      })
        .then(function (result) {
          store.commit('product/load', result);
          store.commit('product/selectEquipment', result.equipments[0])
        })
        .catch(function (err) {
          if (err.response) {
            let data = err.response.data;
            error({
              statusCode: data.status,
              message: data.detail[0]
            })
          }
        });
    }
  }
</script>
