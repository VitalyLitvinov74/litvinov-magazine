export const state = function () {
  return {
    product: null,
    ip: null
  }
};

export const mutations = {
  loadProduct(product) {
    this.product = product;
  },
  loadIp(ip) {
    this.ip = ip
  }
};

export const actions = {
  async loadFromApi(context, productId) {
    const product = await this.$axios.$get('/product/by-id', {
      params: {
        id: productId
      }
    }).then(function (product) {
      context.commit('loadProduct', product)
      console.log(product)
    })

  },

  async getIP({commit}) {
    const ip = await this.$axios.$get('http://icanhazip.com')
    commit('loadIp', ip);
  }
};

export const getters = {};
