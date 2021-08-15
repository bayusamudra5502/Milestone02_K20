<template>
  <div class="body">
    <form class="auth">
      <div class="mb-3">
        <img src="./assets/logo.png" alt="Logo" />
      </div>
      <div class="mb-3 title">
        <strong>Register Page</strong>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input
          type="text"
          class="form-control"
          name="name"
          id="name"
          placeholder="Input Name"
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
        <label for="verify" class="form-label">Verify Password</label>
        <input
          type="password"
          class="form-control"
          id="verify"
          placeholder="Input your password"
        />
      </div>
      <div class="mb-3">
        <label for="interest" class="form-label">Interest</label>
        <select class="form-select" id="interest" name="interest">
          <option selected disabled>Select Your Interest</option>
          <option value="Olahraga">Olahraga</option>
          <option value="Otomotif">Otomotif</option>
          <option value="Kuliner">Kuliner</option>
          <option value="Games">Games</option>
          <option value="Musik">Musik</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="interest" class="form-label">Profile Picture</label>
        <input class="form-control" type="file" name="profile" id="formFile" />
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-dark">Login</button>
        <router-link class="btn btn-link mx-1" to="/login"
          >Sudah Punya Akun</router-link
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