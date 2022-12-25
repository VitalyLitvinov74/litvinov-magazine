export const state = function () {
  return {
    product: null,
    selectedEquipment: null
  }
};

export const mutations = {
  load(state, product) {
    state.product = product;
  },

  selectEquipment(state, equipment){
    state.selectedEquipment = equipment;
  }
};

export const actions = {
};


export const getters = {};
