<template>
  <div class="body">
    <form class="auth" @submit.prevent="onSubmit" ref="form">
      <div class="mb-3">
        <img src="./assets/logo.png" alt="Logo" />
      </div>
      <div class="mb-3 title">
        <strong>Register Page</strong>
      </div>
      <div class="mb-3" v-if="error.isError">
        <div class="alert alert-danger" role="alert">
          {{ error.errMsg }}
        </div>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input
          type="text"
          class="form-control"
          name="name"
          id="name"
          placeholder="Input Name"
          v-model="input.name"
          required
        />
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input
          type="email"
          class="form-control"
          name="email"
          id="email"
          placeholder="Input Email"
          v-model="input.email"
          required
        />
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
        <label for="verify" class="form-label">Verify Password</label>
        <input
          type="password"
          class="form-control"
          id="verify"
          placeholder="Input your password"
          v-model="input.verify"
          ref="verify"
          required
        />
      </div>
      <div class="mb-3">
        <label for="interest" class="form-label">Interest</label>
        <select
          class="form-select"
          id="interest"
          name="interest"
          v-model="input.interest"
          required
        >
          <option selected disabled value="">Select Your Interest</option>
          <option value="Olahraga">Olahraga</option>
          <option value="Otomotif">Otomotif</option>
          <option value="Kuliner">Kuliner</option>
          <option value="Games">Games</option>
          <option value="Musik">Musik</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="interest" class="form-label">Profile Picture</label>
        <input
          class="form-control"
          type="file"
          name="profile"
          id="formFile"
          ref="file"
          required
        />
      </div>
      <div class="mb-3" v-if="upload.isUploading">
        <div class="progress">
          <div
            class="
              progress-bar progress-bar-striped progress-bar-animated
              bg-success
            "
            role="progressbar"
            :style="progressStyle"
          ></div>
        </div>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-dark" :disabled="isSubmitting">
          Register
        </button>
        <router-link class="btn btn-link mx-1" to="/login"
          >Sudah Punya Akun</router-link
        >
      </div>
    </form>
  </div>
</template>

<script>
import { API_URL } from "../../constant";
import axios from "axios";

export default {
  data: () => ({
    isSubmitting: false,
    upload: {
      isUploading: false,
      upload: 0,
    },
    error: {
      isError: false,
      errMsg: "",
    },
    input: {
      name: "",
      email: "",
      username: "",
      password: "",
      verify: "",
      interest: "",
    },
  }),
  computed: {
    progressStyle() {
      return `width: ${this.upload.upload}%`;
    },
  },
  methods: {
    async onSubmit() {
      this.isSubmitting = true;
      this.error.isError = false;

      try {
        if (this.input.password === this.input.verify) {
          this.isUploading = true;
          const fd = new FormData();
          fd.append("file", this.$refs.file.files[0]);

          const { data } = await axios.post(`${API_URL}/upload.php`, fd, {
            headers: {
              "Access-Control-Allow-Origin": "*",
            },
            params: {
              action: "profile",
            },
            onUploadProgress: (e) => {
              this.upload.upload = (e.loaded * 100) / e.total;
            },
          });

          console.dir(data);
        } else {
          this.error.isError = true;
          this.error.errMsg = "Password tidak sama";
        }
      } catch (err) {
        console.dir(err);
        this.error.isError = true;
        this.error.errMsg = "Terjadi kesalahan saat mendaftar";
      }

      this.isSubmitting = false;
      this.isUploading = false;
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