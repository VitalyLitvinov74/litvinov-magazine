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
};

export const actions = {};


export const getters = {};
