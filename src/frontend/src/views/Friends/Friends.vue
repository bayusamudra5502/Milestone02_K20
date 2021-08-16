<template>
  <div id="body">
    <!-- HEADER -->
    <div class="header d-none d-lg-block">
      <div class="container">
        <div class="row custom-row-header align-items-center">
          <div class="col-3">
            <img
              src="./assets/Dekat.In.png"
              class="img-fluid dekatin"
              alt="Image"
            />
          </div>
          <div class="col-9">
            <router-link to="/friends">
              <img
                src="./assets/Users.png"
                class="img-fluid mini-icon"
                alt="Image"
              />
            </router-link>
            <a
              ><img
                src="./assets/Chat.png"
                class="img-fluid mini-icon"
                alt="Image"
              />
            </a>
            <router-link to="/profile">
              <img
                :src="photoProfile"
                style="width: 30px"
                class="img-fluid mini-icon"
                alt="Image"
              />
            </router-link>
          </div>
        </div>
      </div>
    </div>

    <!-- BODY -->
    <div class="body">
      <div class="container custom-container">
        <!-- LEFT -->
        <div class="row custom-left">
          <div class="col-3 left d-none d-lg-block">
            <div class="rectangle-Add-Feeds">
              <router-link to="/feeds/add">
                <div class="text-Add-Feeds">Add Feeds</div>
                <img
                  src="./assets/Add_Feeds_icon.png"
                  class="img-fluid icon-Add-Feeds"
                  alt="Add Feeds"
              /></router-link>
            </div>

            <div class="rectangle-Home">
              <router-link to="/">
                <div class="text-Home">Home</div>
                <img
                  src="./assets/Home_icon.png"
                  class="img-fluid icon-Home"
                  alt="Home"
              /></router-link>
            </div>

            <div class="rectangle-Find">
              <div class="text-Find">Find</div>
              <img
                src="./assets/Find_icon.png"
                class="img-fluid icon-Find"
                alt="Find"
              />
            </div>

            <div class="rectangle-Games">
              <div class="text-Games">Games</div>
              <img
                src="./assets/Games_icon.png"
                class="img-fluid icon-Games"
                alt="Games"
              />
            </div>

            <div class="rectangle-Community">
              <div class="text-Community">Community</div>
              <img
                src="./assets/Community_icon.png"
                class="img-fluid icon-Community"
                alt="Community"
              />
            </div>

            <div class="rectangle-TrendingBox">
              <div class="rectangle-Trending">
                <div class="text-Trending">Trending</div>
              </div>
              <div class="line-left"></div>

              <div class="rectangle-Trend1">
                <div class="text-Trends1">Trend1</div>
              </div>
              <div class="rectangle-Trend2">
                <div class="text-Trends2">Trend2</div>
              </div>
              <div class="rectangle-Trend3">
                <div class="text-Trends3">Trend3</div>
              </div>
              <div class="rectangle-Trend4">
                <div class="text-Trends4">Trend4</div>
              </div>
              <div class="rectangle-Trend5">
                <div class="text-Trends5">Trend5</div>
              </div>
              <div class="rectangle-Trend6">
                <div class="text-Trends6">Trend6</div>
              </div>
              <div class="rectangle-Trend7">
                <div class="text-Trends7">Trend7</div>
              </div>
              <div class="rectangle-Trend8">
                <div class="text-Trends8">Trend8</div>
              </div>
            </div>
          </div>

          <!-- MIDDLE -->
          <div class="col-12 col-sm-12 col-md-12 col-lg-6 middle">
            <div class="row custom-row-middle border">
              <div class="fixed-on-mobile">
                <div class="col-12 custom-col-mid">
                  <router-link to="/">
                    <img
                      src="./assets/icon_back.png"
                      class="img-fluid icon-back d-block d-lg-none"
                      alt="hi"
                    />
                  </router-link>
                  <div class="text-Friends-mobile d-block d-lg-none">
                    Friends
                  </div>

                  <div class="text-Friends d-none d-lg-block">Friends</div>
                </div>
                <div class="line-middle d-none d-lg-block"></div>

                <div class="col-12">
                  <div class="search-box">
                    <form>
                      <input
                        class="custom-search"
                        type="text"
                        placeholder="Keyword"
                        aria-label="Keyword"
                      />
                    </form>
                    <img
                      src="./assets/Search_icon.png"
                      class="img-fluid icon-search"
                      alt="hi"
                    />
                  </div>
                </div>

                <div class="col-12">
                  <div class="text-recommended-mobile d-block d-lg-none">
                    Recommended For You
                  </div>

                  <div class="rectangle-recommended-mobile d-block d-lg-none">
                    <div class="frame-profile-mobile">
                      <div
                        class="rectangle-reccomended-profile-mobile clickable"
                        v-for="rec of recommends"
                        :key="rec.id"
                        @click="addFriend(rec.username)"
                      >
                        <div
                          class="m-profpic1"
                          :style="`background-image: url('${picture(
                            rec.photo
                          )}');`"
                        ></div>
                        <div class="m-profname1">{{ rec.nama }}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="friendlist-box">
                <div
                  class="rectangle-friendlist1"
                  v-for="friend of friends"
                  :key="friend.id"
                >
                  <div
                    class="friendlist-profile1"
                    :style="`background-image: url('${picture(
                      friend.photo
                    )}');`"
                  ></div>
                  <div class="text-friend1">{{ friend.nama }}</div>
                  <img
                    src="./assets/DM_icon.png"
                    class="img-fluid icon-DM1"
                    alt="hi"
                  />
                </div>
              </div>
            </div>
          </div>

          <!-- RIGHT -->
          <div class="col-3 right d-none d-lg-block">
            <div class="row custom-row-right">
              <div class="col-12">
                <div class="rectangle-right">
                  <span class="text-recommended"> Recommended For You </span>
                  <div class="line-right"></div>

                  <div
                    class="rectangle-addfriend1 clickable"
                    v-for="rec of recommends"
                    :key="rec.id"
                    @click="addFriend(rec.username)"
                  >
                    <div
                      class="addfriend-profile1"
                      :style="`background-image: url('${picture(rec.photo)}');`"
                    ></div>
                    <div class="text-addfriend1">{{ rec.nama }}</div>
                  </div>

                  <div class="text-ShowMore">Show More</div>
                </div>
              </div>
            </div>
          </div>
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

export default {
  data: () => ({
    recommends: [],
    friends: [],
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
        const { data } = await axios.post(
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

        console.dir(data);
      }
    },
  },
  async mounted() {
    await this.getRecommends();
    await this.getFriends();
  },
};
</script>

<style scoped>
/* html {zoom: 0.8;} */

.clickable {
  cursor: pointer;
}
.header {
  position: fixed;
  z-index: 2;
  width: 100%;
  height: 87px;
  left: 0px;
  top: 0px;
  background: #ffffff;
  box-shadow: 0px 22.3363px 24px rgba(0, 0, 0, 0.0417275),
    0px 12.5216px 10.0172px rgba(0, 0, 0, 0.035),
    0px 6.6501px 5.32008px rgba(0, 0, 0, 0.0282725);
}
.dekatin {
  cursor: pointer;
}
.custom-row-header {
  width: 100%;
  height: 87px;
}
.mini-icon {
  float: right;
  margin-right: 32px;
}

.body {
  margin-top: 87px;
}

.text-Friends {
  margin-top: 20px;
  margin-bottom: 10px;
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 28px;
  color: black;
}
.text-Friends-mobile {
  margin-top: 10px;
  font-weight: bold;
  font-size: 20px;
  line-height: 23px;
  text-align: center;
  color: black;
}

.line-middle {
  border: 1px solid #aeaeae;
  height: 0px;
  width: 100%;
  margin-bottom: 10px;
  padding: 0px;
}

.middle {
  position: relative;
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
  left: 61px;
  transform: translate(0, -50%);
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 28px;
}
.text-Home,
.text-Find,
.text-Games,
.text-Community {
  color: black;
  position: absolute;
  top: 50%;
  left: 61px;
  transform: translate(0, -50%);
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 28px;
}

.icon-Add-Feeds,
.icon-Home,
.icon-Find,
.icon-Games,
.icon-Community {
  position: absolute;
  top: 50%;
  transform: translate(0, -50%);
  left: 18px;
}
.custom-row-left-r1 {
  height: 300px;
}

.rectangle-TrendingBox {
  width: 238px;
  height: 475px;
  margin-top: 24px;
  border-radius: 22px;
}

.text-Trending {
  position: absolute;
  top: 50%;
  transform: translate(0, -50%);
  left: 18px;
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 28px;
  color: #1e1f20;
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
  cursor: pointer;
  top: 50%;
  transform: translate(0, -50%);
  left: 11px;
  font-style: normal;
  font-weight: normal;
  font-size: 18px;
  line-height: 21px;

  color: #000000;
}

.custom-search {
  width: 100%;
  padding-left: 50px;
  position: relative;
  height: 38px;
  background-color: #eaeaea;
  border-radius: 10px;
  border: 0px;
  font-style: normal;
  font-weight: 500;
  font-size: 17px;
  line-height: 20px;
  /* identical to box height */
  color: #a2a2a2;
}
.custom-row-middle {
  padding: 50px;
}
.icon-search {
  position: absolute;
  top: 50%;
  transform: translate(0, -50%);
  left: 18px;
}
.search-box {
  position: relative;
  margin-top: 14px;
  height: 38px;
  width: 100%;
  background-color: white;
}
.rectangle-friendlist1 {
  position: relative;
  width: 100%;
  height: 69px;
  background: white;
  border-radius: 26px;
  /* Inside Auto Layout */
  flex: none;
  order: 1;
  flex-grow: 0;
  margin: 5px 0px;
}

.friendlist-profile1 {
  position: absolute;
  width: 51px;
  height: 51px;
  left: 30px;
  top: 9px;
  background: url(./assets/profile_dummy1.png);
  border-radius: 50px;
  cursor: pointer;
  background-position: center;
  background-size: cover;
}
.text-friend1 {
  position: absolute;
  top: 50%;
  transform: translate(0, -50%);
  left: 103px;
  font-style: normal;
  font-weight: 500;
  font-size: 17px;
  line-height: 20px;
  /* identical to box height */
  color: #000000;
  cursor: pointer;
}
.icon-DM1 {
  position: absolute;
  right: 52px;
  top: 50%;
  transform: translate(0, -50%);
  cursor: pointer;
}
.custom-row-right {
  position: relative;
  padding: 29px;
  padding-top: 25px;
}
.rectangle-right {
  position: absolute;
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
  font-size: 19px;
  line-height: 28px;
  color: #000000;
}
.line-right {
  width: 208px;
  height: 0px;
  border: 1px solid #aeaeae;
  margin-bottom: 30px;
}
.rectangle-addfriend1 {
  cursor: pointer;
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
  background: url(./assets/profile_dummy1.png);
  border-radius: 50px;
  background-size: cover;
}
.icon-addfriend1 {
  cursor: pointer;
  position: absolute;
  width: 24px;
  height: 24px;
  right: 11px;
  top: 50%;
  transform: translate(0, -50%);
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

.text-ShowMore {
  cursor: pointer;
  text-align: right;
  font-style: normal;
  font-weight: 500;
  font-size: 12px;
  line-height: 14px;
  /* identical to box height */
  color: #0099be;
}
.text-community-right {
  font-style: normal;
  font-weight: bold;
  font-size: 12px;
  line-height: 14px;
  /* identical to box height */
  color: #000000;
  margin-top: 17px;
  margin-bottom: 13px;
}
.icon-back {
  float: left;
  margin-top: 5px;
  cursor: pointer;
  margin-right: 15px;
}

.text-recommended-mobile {
  font-style: normal;
  font-weight: 500;
  font-size: 16px;
  line-height: 19px;
  /* identical to box height */
  color: #000000;
  margin-top: 20px;
}

.rectangle-recommended-mobile {
  position: relative;
  width: 100%;
  max-height: 100%;
  height: 150px;
  width: 100%;
  overflow-x: scroll;
  /* Inside Auto Layout */
  flex: none;
  order: 4;
  flex-grow: 0;
  margin: 6px 0px;
}

.frame-profile-mobile {
  height: 100%;
  position: absolute;
  min-width: max-content;
}
.rectangle-reccomended-profile-mobile {
  height: 110px;
  width: 99px;
  float: left;
  margin: 20px;
  margin-right: 35px;
}

.fixed-pos {
  position: fixed;
}

.m-profpic1 {
  margin-left: 17px;
  width: 65px;
  height: 65px;
  background: url(./assets/profile_dummy1.png);
  background-size: cover;
  border-radius: 30px;
}
.m-profname1 {
  margin-left: 15px;
  margin-top: 13px;
  width: 69px;
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 15px;
  text-align: center;
  color: #000000;
}

@media (max-width: 576px) {
  ::-webkit-scrollbar {
    display: none;
  }
  .fixed-on-mobile {
    position: fixed;
    width: 100vh;
    left: 0px;
  }
  .friendlist-box {
    position: fixed;
    width: 100vh;
    left: 0px;
    top: 350px;
    overflow: scroll;
  }
  .friendlist-box {
    height: calc(100vh - 160px);
    margin-bottom: 0px;
  }
}
</style>