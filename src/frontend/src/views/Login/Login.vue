<template>
  <div class="body">
    <form class="auth">
      <div class="mb-3">
        <img src="./assets/logo.png" alt="Logo" />
      </div>
      <div class="mb-3 title">
        <strong>Login Page</strong>
      </div>
      <div class="mb-3">
        <label for="uname" class="form-label">Username</label>
        <input
          type="text"
          class="form-control"
          name="username"
          id="uname"
          placeholder="Input Username"
        />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input
          type="password"
          class="form-control"
          id="password"
          placeholder="Input your password"
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
export default {};
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