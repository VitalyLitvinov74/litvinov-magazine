export const state = function () {
};

export const mutations = {
};

export const actions = {
  async nuxtServerInit({dispatch, getters}) {
    if(getters['layout/name'] == null){
      await dispatch('layout/load');
    }
  }
};

export const getters = {
};
