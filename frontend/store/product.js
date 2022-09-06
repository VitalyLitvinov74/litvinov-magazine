export const state = function () {
  return {
    product: null,
  }
};

export const mutations = {
  changeName(state, name) {
    state.product = name
  }
};

export const actions = {

};

export const getters = {
  product: function (state) {
    return state.product
  }
};
