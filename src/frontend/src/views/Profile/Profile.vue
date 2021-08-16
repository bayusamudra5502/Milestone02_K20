<template>
  <div class="body">
    <!-- Header -->
    <div class="header">
      <div class="container">
        <div class="row custom-row-header align-item-center">
          <div class="col-3">
            <img
              src="./assets/Dekat.In.png"
              class="img-fluid logo"
              alt="Image"
            />
          </div>
          <div class="col-9">
            <a href=""
              ><img
                :src="photoProfile"
                class="img-fluid mini-icon"
                alt="Image"
                style="width: 30px"
            /></a>
            <a href=""
              ><img
                src="./assets/chat.png"
                class="img-fluid mini-icon"
                alt="Image"
            /></a>
            <a href=""
              ><img
                src="./assets/friend.png"
                class="img-fluid mini-icon"
                alt="Image"
            /></a>
          </div>
        </div>
      </div>
    </div>

    <!-- Main-->
    <div class="main">
      <div class="container">
        <div class="row">
          <!-- Left-->
          <div class="col-lg-4 col-xl-3 left">
            <!-- Nav Left-->
            <div class="nav-left-container">
              <div class="nav-left">
                <router-link to="/feeds/add">
                  <div class="rectangle-Add-Feeds">
                    <div class="text-Add-Feeds">Add Feeds</div>
                    <img
                      src="./assets/add-feeds.svg"
                      class="img-fluid icon-Add-Feeds"
                      alt="Add Feeds"
                    />
                  </div>
                </router-link>

                <router-link to="/">
                  <div class="rectangle-Home">
                    <div class="text-Home">Home</div>
                    <img
                      src="./assets/home-icon.svg"
                      class="img-fluid icon-Home"
                      alt="Home"
                    />
                  </div>
                </router-link>

                <router-link to="/friends">
                  <div class="rectangle-Find">
                    <div class="text-Find">Find</div>
                    <img
                      src="./assets/find-icon.svg"
                      class="img-fluid icon-Find"
                      alt="Find"
                    />
                  </div>
                </router-link>

                <a href="">
                  <div class="rectangle-Games">
                    <div class="text-Games">Games</div>
                    <img
                      src="./assets/games-icon.svg"
                      class="img-fluid icon-Games"
                      alt="Games"
                    />
                  </div>
                </a>

                <a>
                  <div class="rectangle-Community">
                    <div class="text-Community">Community</div>
                    <img
                      src="./assets/community-icon.svg"
                      class="img-fluid icon-Community"
                      alt="Community"
                    />
                  </div>
                </a>
              </div>
              <!-- Trending-->
              <div class="rectangle-TrendingBox">
                <div class="rectangle-Trending">
                  <div class="text-Trending">Trending</div>
                </div>
                <div class="line-left"></div>

                <div class="rectangle-Trend1">
                  <a href="" class="text-Trends1">Badminton</a>
                </div>
                <div class="rectangle-Trend2">
                  <a href="" class="text-Trends2">#AmbisUTBK</a>
                </div>
                <div class="rectangle-Trend3">
                  <a href="" class="text-Trends3">#AyoBersepeda</a>
                </div>
                <div class="rectangle-Trend4">
                  <a href="" class="text-Trends4">Fotografi Kini</a>
                </div>
                <div class="rectangle-Trend5">
                  <a href="" class="text-Trends5">Genshin Impact</a>
                </div>
                <div class="rectangle-Trend6">
                  <a href="" class="text-Trends6">#Killjoy</a>
                </div>
                <div class="rectangle-Trend7">
                  <a href="" class="text-Trends7">Masak Hari Ini</a>
                </div>
                <div class="rectangle-Trend8">
                  <a class="text-Trends8">Sepatu</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Main-->
          <div class="col-12 col-md-12 col-lg-8 col-xl-6 profile border">
            <div class="atas">
              <img src="./assets/homescreen.svg" class="homescreen" />
              <img src="./assets/blackbox.svg" class="blendbox" />
              <img
                src="./assets/edit.svg"
                class="edit"
                v-if="username === profile.username"
              />
            </div>
            <div class="image-container">
              <img :src="picture(profile.photo)" class="foto-profile" />
            </div>
            <div class="rectangle-nama">
              <div class="text-nama" v-if="profile.nama">
                {{ profile.nama }}
              </div>
            </div>
            <div class="sosmed-container">
              <a :href="profile.facebook_url" v-if="profile.facebook_url">
                <img src="./assets/facebook.svg" class="facebook" />
              </a>
              <a :href="profile.facebook_url" v-if="profile.facebook_url">
                <img src="./assets/instagram.svg" class="instagram" />
              </a>
              <a :href="profile.facebook_url" v-if="profile.facebook_url">
                <img src="./assets/linkedin.svg" class="linkedin" />
              </a>
            </div>

            <!--Bio-->
            <div class="bio-container">
              <div class="birthdate">
                {{
                  new Intl.DateTimeFormat("id-ID", {
                    dateStyle: "long",
                  }).format(new Date(profile.birthday))
                }}
              </div>
              <div class="education" v-if="profile.education">
                <h4>Education</h4>
                <p>{{ profile.education }}</p>
              </div>
              <div class="interest">
                <h4>Interest</h4>
                <p>{{ profile.interest }}</p>
              </div>
              <div class="bio" v-if="profile.bio">
                <h4>Bio</h4>
                <p>
                  {{ profile.bio }}
                </p>
              </div>
            </div>

            <!--Photos and Videos-->
            <div class="photosvideos-container">
              <h4>Photos & Videos</h4>
              <div class="media-container">
                <div class="row-1">
                  <img src="./assets/Square Post 1.png" class="media" />
                  <img src="./assets/Square Post 2.png" class="media" />
                  <img src="./assets/Square Post 3.png" class="media" />
                </div>
                <div class="row-2">
                  <img src="./assets/Square Post 4.png" class="media" />
                  <img src="./assets/Square Post 5.png" class="media" />
                  <img src="./assets/Square Post 6.png" class="media" />
                </div>
                <div class="row-3">
                  <img src="./assets/Square Post 7.png" class="media" />
                  <img src="./assets/Square Post 8.png" class="media" />
                  <img src="./assets/Square Post 9.png" class="media" />
                </div>
              </div>
              <div class="showmore-media">
                <a href=""> Show More </a>
              </div>
            </div>
          </div>

          <!-- Right-->
          <div class="col-3 right">
            <div class="row custom-row-right">
              <div class="col-12">
                <div class="rectangle-right">
                  <span class="text-recommended"> Recomended For You </span>
                  <div class="line-right"></div>
                  <div
                    class="rectangle-addfriend1"
                    v-for="rec of recommends"
                    :key="rec.id"
                    style="cursor: pointer"
                    @click="addFriend(rec.username)"
                  >
                    <div class="addfriend-profile1"></div>
                    <div class="text-addfriend1">{{ rec.nama }}</div>
                    <img
                      :src="picture(rec.photo)"
                      class="img-fluid icon-addfriend1"
                      alt="hi"
                    />

                    <img src="./assets/plus.svg" alt="" class="plus-sign" />
                  </div>

                  <div class="text-ShowMore">
                    <a href>Show More</a>
                  </div>

                  <div class="text-community-right">Community</div>

                  <div class="rectangle-addfriend1">
                    <a href="">
                      <div class="addfriend-profile1"></div>
                      <div class="text-addfriend1">Pecinta Sepeda</div>
                      <img
                        src="./assets/profile community 1.svg"
                        class="img-fluid icon-addfriend1"
                        alt="hi"
                      />
                    </a>
                    <a href="">
                      <img src="./assets/plus.svg" alt="" class="plus-sign" />
                    </a>
                  </div>

                  <div class="rectangle-addfriend1">
                    <a href="">
                      <div class="addfriend-profile1"></div>
                      <div class="text-addfriend1">Pelihara kami yuk !</div>
                      <img
                        src="./assets/profile community 2.svg"
                        class="img-fluid icon-addfriend1"
                        alt="hi"
                      />
                    </a>
                    <a href="">
                      <img src="./assets/plus.svg" alt="" class="plus-sign" />
                    </a>
                  </div>

                  <div class="rectangle-addfriend1">
                    <a href="">
                      <div class="addfriend-profile1"></div>
                      <div class="text-addfriend1">Belajar Arsitektur</div>
                      <img
                        src="./assets/profile community 3.svg"
                        class="img-fluid icon-addfriend1"
                        alt="hi"
                      />
                    </a>
                    <a href="">
                      <img src="./assets/plus.svg" alt="" class="plus-sign" />
                    </a>
                  </div>

                  <div class="rectangle-addfriend1">
                    <a>
                      <div class="addfriend-profile1"></div>
                      <div class="text-addfriend1">Belajar Bangunan</div>
                      <img
                        src="./assets/profile community 4.svg"
                        class="img-fluid icon-addfriend1"
                        alt="hi"
                      />
                    </a>
                    <a href="">
                      <img src="./assets/plus.svg" alt="" class="plus-sign" />
                    </a>
                  </div>

                  <div class="text-ShowMore">
                    <a href="">Show More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom_navbar">
      <div class="bottom_nav">
        <div class="kosong"></div>
        <div class="home">
          <router-link to="/"
            ><img src="./assets/home-icon.svg" alt=""
          /></router-link>
        </div>
        <div class="search">
          <router-link to="/friends"
            ><img src="./assets/find-icon.svg" alt=""
          /></router-link>
        </div>
        <div class="add-feeds">
          <router-link to="/feeds/add"
            ><img src="./assets/add feeds hitam.svg" alt=""
          /></router-link>
        </div>
        <div class="game">
          <a href="#"><img src="./assets/games-icon.svg" alt="" /></a>
        </div>
        <div class="community">
          <a href="#"><img src="./assets/community-icon.svg" alt="" /></a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { API_URL } from "../../constant";
import { mapGetters } from "vuex";
import { BASE_URL, USER_DEFAULT_ICON } from "../../constant";

async function getProfile(username) {
  const {
    data: {
      data: [profile],
    },
  } = await axios.get(`${API_URL}/profile.php`, {
    params: {
      username,
    },
  });
  return profile;
}

export default {
  data: () => ({
    profile: {},
    recommends: [],
  }),
  computed: {
    ...mapGetters({
      username: "auth/username",
      photoProfile: "auth/photoProfile",
    }),
  },
  methods: {
    picture(src) {
      return src ? `${BASE_URL}${src}` : USER_DEFAULT_ICON;
    },
    async getProfile(username) {
      const {
        data: {
          data: [profile],
        },
      } = await axios.get(`${API_URL}/profile.php`, {
        params: {
          username,
        },
      });
      return profile;
    },
    async getRecommends() {
      const { data } = await axios.get(`${API_URL}/friends.php`, {
        params: {
          action: "recomendation",
          username: this.username,
        },
      });

      if (data.status === "success") {
        const recommend = [];

        for (const i of data.data) {
          const profile = await this.getProfile(i);
          recommend.push(profile);
        }

        this.recommends = recommend;
      }
    },
    async getFriends() {
      const { data } = await axios.get(`${API_URL}/friends.php`, {
        params: {
          action: "friends",
          username: this.username,
        },
      });

      const friends = [];
      for (const { userfriend } of data.data) {
        const profile = await this.getProfile(userfriend);
        friends.push(profile);
      }

      this.friends = friends;
    },
    async addFriend(username) {
      if (confirm("Apakah anda yakin akan menambahkannya sebagai teman?")) {
        await axios.post(
          `${API_URL}/friends.php`,
          {
            username,
          },
          {
            params: {
              username: this.username,
            },
          }
        );
      }
    },
  },
  async mounted() {
    await this.getRecommends();

    const username = this.$route.params.username ?? this.username;
    const profile = await getProfile(username);

    this.profile = profile;
    console.dir(profile);
  },
};
</script>

<style scoped>
.header {
  width: 100%;
  height: 87px;
  left: 0px;
  top: 0px;
  background: #ffffff;
  box-shadow: 0px 22.3363px 24px rgba(0, 0, 0, 0.0417275),
    0px 12.5216px 10.0172px rgba(0, 0, 0, 0.035),
    0px 6.6501px 5.32008px rgba(0, 0, 0, 0.0282725);
  position: sticky;
  z-index: 2;
}

.custom-row-header {
  width: 100%;
  height: 87px;
}
.logo {
  margin-top: 32px;
  margin-left: 32px;
}

.mini-icon {
  float: right;
  margin-right: 32px;
  margin-top: 32px;
}

/* Main*/
.main {
  width: 100%;
}

/* Nav Left*/
.nav-left-container {
  position: sticky;
  top: 105px;
}

.rectangle-Add-Feeds {
  position: relative;
  margin-top: 20px;
  height: 44px;
  width: 207px;
  background: #0099be;
  border-radius: 18px;
  cursor: pointer;
}

.rectangle-Add-Feeds:hover {
  background-color: #097893;
}

.rectangle-Home,
.rectangle-Find,
.rectangle-Games,
.rectangle-Community,
.rectangle-Trending {
  position: relative;
  margin-top: 20px;
  height: 44px;
  width: 207px;
  border-radius: 18px;
  cursor: pointer;
}

.text-Add-Feeds {
  color: white;
  position: absolute;
  top: 50%;
  transform: translate(0, -50%);
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 28px;
  margin-left: 60px;
}
.text-Home,
.text-Find,
.text-Games,
.text-Community {
  color: black;
  position: absolute;
  top: 50%;
  transform: translate(0, -50%);
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 28px;
  margin-left: 60px;
}

.icon-Add-Feeds,
.icon-Home,
.icon-Find,
.icon-Games,
.icon-Community {
  position: absolute;
  top: 50%;
  transform: translate(0, -50%);
  margin-left: 16px;
}

.rectangle-TrendingBox {
  width: 238px;
  height: 475px;
  margin-top: 24px;
  border-radius: 22px;
  background-color: #ffffff;
}

.text-Trending {
  position: absolute;
  top: 50%;
  transform: translate(0, -50%);
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 28px;
  color: #1e1f20;
  margin-left: 20px;
}

.line-left {
  margin-left: 13px;
  width: 206px;
  height: 0px;
  border: 1px solid #aeaeae;
}

.rectangle-Trend1,
.rectangle-Trend2,
.rectangle-Trend3,
.rectangle-Trend4,
.rectangle-Trend5,
.rectangle-Trend6,
.rectangle-Trend7,
.rectangle-Trend8 {
  position: relative;
  margin-left: 13px;
  margin-top: 17px;
  width: 206px;
  height: 29px;
  background: #fafafa;
  border-radius: 22px;
}
.text-Trends1,
.text-Trends2,
.text-Trends3,
.text-Trends4,
.text-Trends5,
.text-Trends6,
.text-Trends7,
.text-Trends8 {
  position: absolute;
  top: 50%;
  transform: translate(0, -50%);
  font-style: normal;
  font-weight: normal;
  font-size: 18px;
  line-height: 21px;
  color: #000000;
  text-decoration: none;
  margin-left: 10px;
}

/*Main*/

.homescreen,
.blendbox {
  width: 104%;
  margin-left: -2%;
  background-blend-mode: darken;
}

.foto-profile {
  position: static;
  margin-top: -75px;
  width: 100px;
}

.edit {
  float: right;
  margin-top: -42%;
  position: relative;
}

.image-container {
  display: flex;
  align-items: center;
  justify-content: center;
}

.blendbox {
  margin-top: -45.4%;
  margin-left: -2%;
}
.text-nama {
  position: static;
  font-style: normal;
  margin: 10px;
  font-weight: bold;
  font-size: 24px;
  line-height: 28px;
  color: #1e1f20;
  text-align: center;
}

.sosmed-container {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 10px;
}

.facebook,
.instagram,
.linkedin,
.youtube,
.snapchat {
  margin: 5px;
}

.dm {
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #0099be;
  color: white;
  text-decoration: none;
  font-weight: bold;
  border-radius: 15px;
  height: 41px;
}

.dm:hover {
  color: white;
  background-color: #097893;
}

.dm-logo,
.dm-teks {
  position: static;
  display: flex;
  align-items: center;
  justify-content: center;
  transform: translate(-40%);
}

.bio-container {
  padding-left: 15px;
  padding-right: 15px;
}

.birthdate {
  font-style: normal;
  font-weight: 500;
  font-size: 14px;
}

h4 {
  padding-top: 15px;
}

.photosvideos-container {
  padding-left: 15px;
  padding-right: 15px;
}

.media-container {
  display: flex;
  align-items: center;
  justify-content: center;
}

.media {
  margin: 20px;
  width: 150px;
}

.showmore-media a {
  justify-content: center;
  display: flex;
  align-items: center;
  margin: 20px;
  transform: translate(0, -50%);
  font-weight: bold;
  color: #0099be;
  text-decoration: none;
}

/* Recomended */
.custom-row-right {
  position: sticky;
  top: 105px;
  padding: 29px;
  padding-top: 25px;
}
.rectangle-right {
  height: 606px;
  width: 240px;
  background: white;
  border-radius: 22px;
  padding-left: 16px;
  padding-right: 16px;
  padding-top: 19px;
}
.text-recommended {
  position: relative;
  font-style: normal;
  font-weight: bold;
  font-size: 20px;
  line-height: 28px;
  color: #000000;
}
.line-right {
  width: 208px;
  height: 0px;
  border: 1px solid #aeaeae;
  margin-bottom: 30px;
}

.plus-sign {
  float: right;
  position: relative;
  padding-right: 10px;
  padding-top: 8px;
}

.rectangle-addfriend1 {
  position: relative;
  width: 100%;
  height: 39px;
  background: #fafafa;
  border-radius: 9px;
  margin-bottom: 13px;
}
.addfriend-profile1 {
  position: absolute;
  width: 30px;
  height: 30px;
  left: 19px;
  top: 4px;
  border-radius: 50px;
  background-size: cover;
}
.icon-addfriend1 {
  position: absolute;
  width: 24px;
  height: 24px;
  top: 50%;
  transform: translate(50%, -50%);
}
.text-addfriend1 {
  position: absolute;
  left: 57px;
  top: 50%;
  transform: translate(0, -50%);
  font-style: normal;
  font-weight: 500;
  font-size: 12px;
  line-height: 14px;
  /* identical to box height */
  color: #000000;
}

.text-ShowMore a {
  float: right;
  font-style: normal;
  font-weight: 500;
  font-size: 12px;
  line-height: 14px;
  color: #0099be;
  text-decoration: none;
}

.text-community-right {
  font-style: normal;
  font-weight: bold;
  font-size: 12px;
  line-height: 14px;
  /* identical to box height */
  color: #000000;
  margin-top: 25px;
  margin-bottom: 13px;
}
@media screen and (min-width: 992px) {
  .bottom_navbar {
    display: none;
  }
}

@media screen and (max-width: 1200px) {
  .right {
    display: none;
  }
}

@media screen and (max-width: 992px) {
  .nav-left-container {
    display: none;
  }
  .bottom_navbar {
    position: -webkit-sticky;
    position: sticky;
    bottom: 0;
    background: white;
  }
  .bottom_nav {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    padding-top: 21px;
    padding-bottom: 21px;
  }
  .bottom_nav .kosong,
  .bottom_nav .community {
    -webkit-box-flex: 10;
    -ms-flex: 10;
    flex: 10;
  }
  .bottom_nav .home,
  .bottom_nav .search,
  .bottom_nav .game,
  .bottom_nav .add-feeds {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 18%;
    flex: 0 0 18%;
  }
  .profile {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 576;
    flex: 0 0 576;
  }
}
</style>