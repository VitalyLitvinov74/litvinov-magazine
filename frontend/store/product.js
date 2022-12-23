export const state = function () {
  return {
    product: null,
  }
};

export const mutations = {
  load(state, product) {
    state.product = product;
  },
};

export const actions = {
};


export const getters = {};
