const BASE_URL = "http://localhost/";
const USER_DEFAULT_ICON = "http://localhost/milestone/static/default.png";

export default {
  namespaced: true,
  state: () => ({
    userToken: null,
    user: {},
  }),
  getters: {
    name: (state) => state.user?.nama ?? null,
    username: (state) => state.user?.username ?? null,
    photoProfile: (state) =>
      state.user?.photo ? `${BASE_URL}${state.user.photo}` : USER_DEFAULT_ICON,
    isLogged: (state) => !!state.userToken,
    getToken: (state) => state.userToken,
  },
  mutations: {
    setUserToken(state, newToken) {
      state.userToken = newToken;
    },
    setUserObject(state, newObject) {
      state.user = newObject;
    },
  },
  actions: {
    setUser({ commit }, { token, data }) {
      commit("setUserToken", token);
      commit("setUserObject", data);
    },
    resetUser({ commit }) {
      commit("setUserToken", null);
      commit("setUserObject", {});
    },
  },
};
