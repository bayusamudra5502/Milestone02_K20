<template>
  <div class="body">
    <form class="auth" @submit.prevent="onSubmit">
      <div class="mb-3">
        <img src="./assets/logo.png" alt="Logo" />
      </div>
      <div class="mb-3 title">
        <strong>Login Page</strong>
      </div>
      <div class="mb-3">
        <div class="alert alert-danger" role="alert" v-if="isError">
          Pasangan username dan Password tidak ditemukan
        </div>
      </div>
      <div class="mb-3">
        <label for="uname" class="form-label">Username</label>
        <input
          type="text"
          class="form-control"
          name="username"
          id="uname"
          placeholder="Input Username"
          v-model="input.username"
          required
        />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input
          type="password"
          class="form-control"
          id="password"
          placeholder="Input your password"
          v-model="input.password"
          required
        />
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-dark">Login</button>
        <router-link class="btn btn-link mx-1" to="../register"
          >Register</router-link
        >
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import { API_URL } from "../../constant";
import { mapActions } from "vuex";

export default {
  data: () => ({
    isError: false,
    input: {
      username: "",
      password: "",
    },
  }),
  methods: {
    ...mapActions({
      setUser: "auth/setUser",
    }),
    async onSubmit() {
      try {
        const { data } = await axios.post(`${API_URL}/auth.php`, this.input, {
          params: {
            action: "login",
          },
        });

        if (data.status === "success") {
          const {
            data: {
              data: [profile],
            },
          } = await axios.get(`${API_URL}/profile.php`, {
            params: {
              username: this.input.username,
            },
          });
          const token = data.data.token;

          this.setUser({ token, data: profile });
          localStorage.setItem("login", token);
          this.$router.push("/");
        } else {
          this.isError = true;
        }
      } catch (err) {
        console.dir(err);
        this.isError = true;
      }
    },
  },
};
</script>

<style scoped>
.auth {
  max-width: 350px;
  width: 100%;
  background-color: white;
  padding: 15px;
}

.body {
  background-color: rgb(236, 236, 236);
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100vw;
  height: 100vh;
}

.title {
  text-align: center;
  font-size: 1.3em;
}

.auth img {
  width: 70%;
  margin: 20px auto;
  display: block;
}
</style>