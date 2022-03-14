export const state = function () {
  return {
    name: null,
  }
};

export const mutations = {
  changeName(state, name) {
    state.name = name
  }
};

export const actions = {
  async load({commit}) {
    const mioca = 'mioca'; //заменить запрос на гет с сервера
    commit('changeName', mioca);
  },
};

export const getters = {
  name: function (state) {
    return state.name
  }
};
