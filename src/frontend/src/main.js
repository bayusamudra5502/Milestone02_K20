import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import axios from "axios";
import { API_URL } from "./constant";
import { mapActions } from "vuex";

Vue.config.productionTip = false;

new Vue({
  router,
  render: (h) => h(App),
  store,
  methods: {
    ...mapActions({
      setUser: "auth/setUser",
    }),
    async getData(token) {
      const { data } = await axios.post(
        `${API_URL}/auth.php`,
        {
          token,
        },
        {
          params: {
            action: "session",
          },
        }
      );

      if (data.status === "success") {
        const username = data.data.username;
        const {
          data: {
            data: [profile],
          },
        } = await axios.get(`${API_URL}/profile.php`, {
          params: {
            username,
          },
        });

        this.setUser({ token, data: profile });
        console.dir(profile);
      }
    },
  },
  created() {
    const token = localStorage.getItem("login");
    if (token) {
      this.setUser({ token, data: null });
      this.getData(token);
    }
  },
}).$mount("#app");
