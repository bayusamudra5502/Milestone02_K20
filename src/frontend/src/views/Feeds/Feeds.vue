<template>
  <div class="body">
    <form action="/" id="form">
      <nav class="navbar navbar-light">
        <div class="container">
          <router-link to = "/">
            <img src="./assets/Vector(1).png" />
          </router-link>
          <h2>Add Feeds</h2>
          <a class="navbar-brand2">
            <img
              src="./assets/Vector.png"
              onclick="document.getElementById('form').submit();"
            />
          </a>
        </div>
      </nav>
      <div class="text-box">
        <div class="location">
          <div class="add-location">📍 Add location</div>
          <input
            class="form-control"
            list="datalistOptions"
            id="exampleDataList"
            placeholder="Type to search..."
          />
          <datalist id="datalistOptions">
            <option value="Bali"></option>
            <option value="Banten"></option>
            <option value="Bengkulu"></option>
            <option value="DI Yogyakarta"></option>
            <option value="DKI Jakarta"></option>
            <option value="Gorontalo"></option>
            <option value="Jambi"></option>
            <option value="Jawa Barat"></option>
            <option value="Jawa Tengah"></option>
            <option value="Jawa Timur"></option>
            <option value="Kalimantan Barat"></option>
            <option value="Kalimantan Selatan"></option>
            <option value="Kalimantan Tengah"></option>
            <option value="Kalimantan Timur"></option>
            <option value="Kalimantan Utara"></option>
            <option value="Kepulauan Bangka Belitung"></option>
            <option value="Kepulauan Riau"></option>
            <option value="Lampung"></option>
            <option value="Maluku"></option>
            <option value="Maluku Utara"></option>
            <option value="Nanggroe Aceh Darussalam"></option>
            <option value="Nusa Tenggara Barat"></option>
            <option value="Nusa Tenggara Timur"></option>
            <option value="Papua"></option>
            <option value="Papua Barat"></option>
            <option value="Riau"></option>
            <option value="Sulawesi Barat"></option>
            <option value="Sulawesi Selatan"></option>
            <option value="Sulawesi Tengah"></option>
            <option value="Sulawesi Tenggara"></option>
            <option value="Sulawesi Utara"></option>
            <option value="Sumatera Barat"></option>
            <option value="Sumatera Selatan"></option>
            <option value="Sumatera Utara"></option>
          </datalist>
        </div>
        <div class="input-text">
          <textarea
            class="form-control1"
            id="exampleFormControlTextarea1"
            rows="7"
          >
Type here...</textarea
          >
        </div>
      </div>
      <div class="mb-3">
        <label for="formFile" class="label-input-file">File input</label>
        <input class="form-control2" type="file" id="formFile" />
      </div>
    </form>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
h2 {
  margin-left: auto;
  margin-right: auto;
  font-family: Roboto;
  padding-top: 10px;
}

.navbar-brand1 {
  left: 50px;
  position: absolute;
}

.navbar-brand2 {
  right: 50px;
  position: absolute;
}

.navbar-brand1:hover {
  background-color: whitesmoke;
  width: 30px;
  height: 30px;
  border-radius: 10px;
}

.navbar-brand2:hover {
  background-color: whitesmoke;
  width: 30px;
  height: 30px;
  border-radius: 10px;
}

.text-box {
  margin: 10px 50px;
  background-color: #f1f1f1;
  height: 300px;
  border-radius: 30px;
}

.add-location {
  text-align: right;
  margin: 0px 20px;
  padding-top: 25px;
  font-family: Roboto;
  width: 20%;
  float: left;
}

.form-control {
  margin: 20px 20px;
  float: left;
  width: 50%;
}

.form-control1 {
  width: 100%;
  right: 100px;
  left: 100px;
  border: gray;
  background-color: whitesmoke;
  padding-left: 20px;
  padding-top: 10px;
}

.form-control2 {
  left: 100px;
  margin-left: 50px;
  padding-top: 10px;
}

.label-input-file {
  left: 150px;
  margin-left: 75px;
  padding-top: 10px;
}
</style>