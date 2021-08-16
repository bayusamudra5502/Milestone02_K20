<template>
  <div>
    <header>
      <div class="upper_navbar">
        <div class="logo" @click="getAllPost(1)">
          <router-link to="/"
            ><img src="./assets/Dekat.In.svg" alt=""
          /></router-link>
        </div>
        <div class="friend-nav">
          <router-link to="/friends"
            ><img src="./assets/Friend.svg" alt=""
          /></router-link>
        </div>
        <div class="chat-nav">
          <router-link to="#"
            ><img src="./assets/Chat.svg" alt=""
          /></router-link>
        </div>
        <div class="profile-nav">
          <router-link to="/profile"
            ><img src="./assets/Profile.svg" alt=""
          /></router-link>
        </div>
      </div>
    </header>
    <div class="main">
      <div class="container">
        <div class="row">
          <div class="col-left">
            <div class="nav-left-container">
              <div class="nav-left">
                <router-link to="/feeds/add">
                  <div class="rectangle-Add-Feeds">
                    <div class="text-Add-Feeds">Add Feeds</div>
                    <img
                      src="./assets/White_add_feeds.svg"
                      class="img-fluid icon-Add-Feeds"
                      alt="Add Feeds"
                    />
                  </div>
                </router-link>

                <router-link to="/">
                  <div class="rectangle-Home">
                    <div class="text-Home">Home</div>
                    <img
                      src="./assets/blue_home.svg"
                      class="img-fluid icon-Home"
                      alt="Home"
                    />
                  </div>
                </router-link>

                <router-link to="/friends">
                  <div class="rectangle-Find">
                    <div class="text-Find">Find</div>
                    <img
                      src="./assets/Search.svg"
                      class="img-fluid icon-Find"
                      alt="Find"
                    />
                  </div>
                </router-link>

                <router-link to="">
                  <div class="rectangle-Games">
                    <div class="text-Games">Games</div>
                    <img
                      src="./assets/Game.svg"
                      class="img-fluid icon-Games"
                      alt="Games"
                    />
                  </div>
                </router-link>

                <router-link to="">
                  <div class="rectangle-Community">
                    <div class="text-Community">Community</div>
                    <img
                      src="./assets/Community.svg"
                      class="img-fluid icon-Community"
                      alt="Community"
                    />
                  </div>
                </router-link>
              </div>
              <div class="rectangle-TrendingBox">
                <div class="rectangle-Trending">
                  <div class="text-Trending">Trending</div>
                </div>
                <div class="line-left"></div>

                <div class="rectangle-Trend1">
                  <router-link to="" class="text-Trends1"
                    >Badminton</router-link
                  >
                </div>
                <div class="rectangle-Trend2">
                  <router-link to="" class="text-Trends2"
                    >#AmbisUTBK</router-link
                  >
                </div>
                <div class="rectangle-Trend3">
                  <router-link to="" class="text-Trends3"
                    >#AyoBersepeda</router-link
                  >
                </div>
                <div class="rectangle-Trend4">
                  <router-link to="" class="text-Trends4"
                    >Fotografi Kini</router-link
                  >
                </div>
                <div class="rectangle-Trend5">
                  <router-link to="" class="text-Trends5"
                    >Genshin Impact</router-link
                  >
                </div>
                <div class="rectangle-Trend6">
                  <router-link to="" class="text-Trends6">#Killjoy</router-link>
                </div>
                <div class="rectangle-Trend7">
                  <router-link to="" class="text-Trends7"
                    >Masak Hari Ini</router-link
                  >
                </div>
                <div class="rectangle-Trend8">
                  <router-link to="" class="text-Trends8">Sepatu</router-link>
                </div>
              </div>
            </div>
          </div>
          <div class="col-mid">
            <div class="midhead">
              <div class="container ini-tengah">Home</div>
            </div>
            <div class="feeds">
              <div class="photo_feed">
                <div
                  class="container ini-tengah"
                  v-for="post of posts"
                  :key="post.id"
                >
                  <div class="header">
                    <div class="rectangle-pp">
                      <router-link
                        :to="`/profile/${post.username}`"
                        class="link-pp"
                        ><img
                          :src="picture(post.profile.photo)"
                          alt=""
                          class="user-pp"
                      /></router-link>
                      <div class="name-user">
                        <router-link
                          :to="`/profile/${post.username}`"
                          class="link-pp"
                          >{{ post.profile.nama }}</router-link
                        >
                      </div>
                    </div>
                  </div>
                  <div class="post_content">
                    <img :src="post.media" alt="" class="post-image" />
                  </div>
                  <div class="post_icon">
                    <img src="./assets/Thumbs Up.svg" alt="" class="heart" />
                    <img
                      src="./assets/Comments.svg"
                      alt=""
                      class="comments"
                      @click="addComment(post.id)"
                    />
                  </div>
                  <div class="post-capt">
                    <div class="capt-content">
                      {{ post.posts }}
                    </div>
                  </div>
                  <div class="post_hour">
                    <div class="hour-content">
                      {{
                        new Intl.DateTimeFormat("id-id", {
                          dateStyle: "medium",
                        }).format(new Date(post.timepublish))
                      }}
                    </div>
                  </div>
                  <div
                    class="commentator"
                    v-for="comment of post.comments"
                    :key="comment.id"
                  >
                    <router-link
                      :to="`/profile/${comment.username}`"
                      class="link-commentator"
                      ><img
                        :src="picture(comment.profile.photo)"
                        alt=""
                        class="commentator-pp"
                    /></router-link>
                    <div class="commentator-name">
                      <router-link :to="``" class="link-commentator">{{
                        comment.profile.nama
                      }}</router-link>
                      <a href="" class="comment-text"
                        >• {{ comment.comment }}</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-right">
            <div class="container main">
              <div class="rectangle-right">
                <span class="text-recommended"> Recomended For You </span>
                <div class="line-right"></div>
                <div class="rectangle-addfriend1">
                  <router-link to="">
                    <div class="addfriend-profile1"></div>
                    <div class="text-addfriend1">Kristin Watson</div>
                    <img
                      src="./assets/profile friends.svg"
                      class="img-fluid icon-addfriend1"
                      alt="hi"
                    />
                    <img
                      src="./assets/Plus Sign.svg"
                      alt=""
                      class="plus-sign"
                    />
                  </router-link>
                </div>

                <div class="rectangle-addfriend1">
                  <router-link to="">
                    <div class="addfriend-profile1"></div>
                    <div class="text-addfriend1">Esther Howard</div>
                    <img
                      src="./assets/profile friends 2.svg"
                      class="img-fluid icon-addfriend1"
                      alt="hi"
                    />
                    <img
                      src="./assets/Plus Sign.svg"
                      alt=""
                      class="plus-sign"
                    />
                  </router-link>
                </div>

                <div class="rectangle-addfriend1">
                  <router-link to="">
                    <div class="addfriend-profile1"></div>
                    <div class="text-addfriend1">LesLie Alexander</div>
                    <img
                      src="./assets/profile friends 3.svg"
                      class="img-fluid icon-addfriend1"
                      alt="hi"
                    />
                    <img
                      src="./assets/Plus Sign.svg"
                      alt=""
                      class="plus-sign"
                    />
                  </router-link>
                </div>

                <div class="rectangle-addfriend1">
                  <router-link to="">
                    <div class="addfriend-profile1"></div>
                    <div class="text-addfriend1">Dianne Russel</div>
                    <img
                      src="./assets/profile friends 4.svg"
                      class="img-fluid icon-addfriend1"
                      alt="hi"
                    />
                    <img
                      src="./assets/Plus Sign.svg"
                      alt=""
                      class="plus-sign"
                    />
                  </router-link>
                </div>
                <div class="text-ShowMore">
                  <router-link to>Show More</router-link>
                </div>

                <div class="text-community-right">Community</div>

                <div class="rectangle-addfriend1">
                  <router-link to="">
                    <div class="addfriend-profile1"></div>
                    <div class="text-addfriend1">Pecinta Sepeda</div>
                    <img
                      src="./assets/profile community 1.svg"
                      class="img-fluid icon-addfriend1"
                      alt="hi"
                    />
                    <img
                      src="./assets/Plus Sign.svg"
                      alt=""
                      class="plus-sign"
                    />
                  </router-link>
                </div>

                <div class="rectangle-addfriend1">
                  <router-link to="">
                    <div class="addfriend-profile1"></div>
                    <div class="text-addfriend1">Pelihara kami yuk !</div>
                    <img
                      src="./assets/profile community 2.svg"
                      class="img-fluid icon-addfriend1"
                      alt="hi"
                    />
                    <img
                      src="./assets/Plus Sign.svg"
                      alt=""
                      class="plus-sign"
                    />
                  </router-link>
                </div>

                <div class="rectangle-addfriend1">
                  <router-link to="">
                    <div class="addfriend-profile1"></div>
                    <div class="text-addfriend1">Belajar Arsitektur</div>
                    <img
                      src="./assets/profile community 3.svg"
                      class="img-fluid icon-addfriend1"
                      alt="hi"
                    />
                    <img
                      src="./assets/Plus Sign.svg"
                      alt=""
                      class="plus-sign"
                    />
                  </router-link>
                </div>

                <div class="rectangle-addfriend1">
                  <router-link to="">
                    <div class="addfriend-profile1"></div>
                    <div class="text-addfriend1">Belajar Bangunan</div>
                    <img
                      src="./assets/profile community 4.svg"
                      class="img-fluid icon-addfriend1"
                      alt="hi"
                    />
                    <img
                      src="./assets/Plus Sign.svg"
                      alt=""
                      class="plus-sign"
                    />
                  </router-link>
                </div>

                <div class="text-ShowMore">
                  <router-link to="">Show More</router-link>
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
          <router-link to="."
            ><img src="./assets/Home.svg" alt=""
          /></router-link>
        </div>
        <div class="search">
          <router-link to="/friends"
            ><img src="./assets/Search.svg" alt=""
          /></router-link>
        </div>
        <div class="add-feeds">
          <router-link to="/feeds/add"
            ><img src="./assets/Add Feeds.svg" alt=""
          /></router-link>
        </div>
        <div class="game">
          <router-link to="#"
            ><img src="./assets/Game.svg" alt=""
          /></router-link>
        </div>
        <div class="community">
          <router-link to="#"
            ><img src="./assets/Community.svg" alt=""
          /></router-link>
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
  name: "Home",
  data: () => ({
    posts: [],
    page: 1,
  }),
  computed: {
    ...mapGetters({ username: "auth/username" }),
  },
  methods: {
    async getAllPost(page) {
      try {
        const { data } = await axios.get(`${API_URL}/feeds.php`, {
          params: {
            action: "feed",
            username: this.username,
            page,
          },
        });

        const posts = [];

        for (const i of data.data[0]) {
          const id = parseInt(i.id);
          const { data: comments } = await axios.get(`${API_URL}/feeds.php`, {
            params: {
              action: "comment",
              id,
            },
          });
          const { data: like } = await axios.get(`${API_URL}/feeds.php`, {
            params: {
              action: "like",
              id,
            },
          });

          const profile = await this.getProfile(i.username);

          const comments_parsed = [];

          for (const j of comments.data ?? []) {
            const profile = await this.getProfile(j.username);
            comments_parsed.push({
              ...j,
              profile,
            });
          }

          posts.push({
            ...i,
            comments: comments_parsed,
            like: like.data ?? 0,
            profile,
          });
        }

        this.posts = posts;
      } catch (err) {
        console.dir(err);
      }
    },
    async addComment(id) {
      const comment = prompt("Masukkan Komentar anda");
      const payload = { id, comment, username: this.username };

      try {
        const { data } = await axios.post(`${API_URL}/feeds.php`, payload, {
          params: {
            action: "comment",
          },
        });

        if (data.status === "success") {
          await this.getAllPost(this.page);
        } else {
          console.dir(data);
          alert("Gagal menambah komentar");
        }
      } catch (err) {
        console.dir(err);
        alert("Gagal menambah komentar");
      }
    },
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
  async created() {
    await this.getAllPost(this.page);
    console.dir(this.posts);
  },
};
</script>


<style scoped>
*::-webkit-scrollbar {
  width: 0px;
}

*::-webkit-scrollbar-thumb {
  background-color: gray;
  border-radius: 20px;
}

.container {
  width: fit-content;
}

.ini-tengah {
  width: 100% !important;
}

body {
  background: #fafafa;
  font-family: "Roboto", sans-serif;
  margin: 0;
  padding: 0;
}

body a {
  text-decoration: none;
  color: black;
}

body ul {
  list-style-type: none;
}

header {
  top: 0px;
  z-index: 100;
  background: white;
  height: 87px;
  -webkit-box-shadow: 0px 6.650102138519287px 5.32008171081543px 0px #00000007;
  box-shadow: 0px 6.650102138519287px 5.32008171081543px 0px #00000007;
  -webkit-box-shadow: 0px 12.521552085876465px 10.017241477966309px 0px
    #00000009;
  box-shadow: 0px 12.521552085876465px 10.017241477966309px 0px #00000009;
  -webkit-box-shadow: 0px 22.3363094329834px 24px 0px #0000000b;
  box-shadow: 0px 22.3363094329834px 24px 0px #0000000b;
  width: 100%;
}

.upper_navbar {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  background: white;
  height: auto;
  padding-top: 29px;
  margin-left: 8%;
}

.upper_navbar .logo {
  -webkit-box-flex: 10;
  -ms-flex: 10;
  flex: 10;
}

.upper_navbar .friend-nav,
.upper_navbar .chat-nav {
  -webkit-box-flex: 0;
  -ms-flex: 0 0 56px;
  flex: 0 0 56px;
}

.upper_navbar .profile-nav {
  -webkit-box-flex: 0;
  -ms-flex: 0 0 18%;
  flex: 0 0 18%;
}

.row {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}

.col-mid,
.col-right.container,
.nav-left-container {
  height: 100vh;
}

.col-mid::-webkit-scrollbar {
  width: 4px;
}

.col-mid::-webkit-scrollbar-thumb {
  background-color: gray;
  border-radius: 20px;
}

.col-left {
  -webkit-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
}

.col-left .nav-left-container {
  position: absolute;
  overflow-y: scroll;
  overflow-x: hidden;
  top: 112px;
  left: 31%;
  -webkit-transform: translate(-140%, 0);
  transform: translate(-140%, 0);
}

.col-left .nav-left-container::-webkit-scrollbar {
  width: 0;
}

.col-left .rectangle-Add-Feeds {
  position: relative;
  margin-top: 20px;
  height: 44px;
  width: 207px;
  background: #0099be;
  border-radius: 18px;
  cursor: pointer;
}

.col-left .rectangle-Home,
.col-left .rectangle-Find,
.col-left .rectangle-Games,
.col-left .rectangle-Community,
.col-left .rectangle-Trending {
  position: relative;
  margin-top: 20px;
  height: 44px;
  width: 207px;
  border-radius: 18px;
  cursor: pointer;
}

.col-left .text-Add-Feeds {
  color: white;
  position: absolute;
  top: 50%;
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 28px;
  margin-left: 60px;
}

.col-left .text-Find,
.col-left .text-Games,
.col-left .text-Community {
  color: black;
  position: absolute;
  top: 50%;
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 28px;
  margin-left: 60px;
}

.col-left .text-Home {
  color: #0099be;
  position: absolute;
  top: 50%;
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 28px;
  margin-left: 60px;
}

.col-left .icon-Add-Feeds,
.col-left .icon-Home,
.col-left .icon-Find,
.col-left .icon-Games,
.col-left .icon-Community {
  position: absolute;
  top: 50%;
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
  margin-left: 16px;
}

.col-left .rectangle-TrendingBox {
  width: 238px;
  height: 475px;
  margin-top: 24px;
  border-radius: 22px;
  background-color: #ffffff;
}

.col-left .text-Trending {
  position: absolute;
  top: 50%;
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 28px;
  color: #1e1f20;
  margin-left: 20px;
}

.col-left .line-left {
  margin-left: 13px;
  width: 206px;
  height: 0px;
  border-top: 1px solid #aeaeae;
}

.col-left .rectangle-Trend1,
.col-left .rectangle-Trend2,
.col-left .rectangle-Trend3,
.col-left .rectangle-Trend4,
.col-left .rectangle-Trend5,
.col-left .rectangle-Trend6,
.col-left .rectangle-Trend7,
.col-left .rectangle-Trend8 {
  position: relative;
  margin-left: 13px;
  margin-top: 17px;
  width: 206px;
  height: 29px;
  background: #fafafa;
  border-radius: 22px;
}

.col-left .text-Trends1,
.col-left .text-Trends2,
.col-left .text-Trends3,
.col-left .text-Trends4,
.col-left .text-Trends5,
.col-left .text-Trends6,
.col-left .text-Trends7,
.col-left .text-Trends8 {
  position: absolute;
  top: 50%;
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
  font-style: normal;
  font-weight: normal;
  font-size: 18px;
  line-height: 21px;
  color: #000000;
  text-decoration: none;
  margin-left: 10px;
}

.col-left .text-Trends1:hover,
.col-left .text-Trends2:hover,
.col-left .text-Trends3:hover,
.col-left .text-Trends4:hover,
.col-left .text-Trends5:hover,
.col-left .text-Trends6:hover,
.col-left .text-Trends7:hover,
.col-left .text-Trends8:hover {
  color: #0099be;
}

.col-right {
  -webkit-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
}

.col-right .container {
  position: absolute;
  overflow-y: scroll;
  overflow-x: hidden;
  top: 90px;
  right: 31%;
  -webkit-transform: translate(140%, 0);
  transform: translate(140%, 0);
}

.col-right .rectangle-right {
  height: 606px;
  width: 240px;
  background: white;
  border-radius: 22px;
  padding-left: 16px;
  padding-right: 16px;
  padding-top: 19px;
}

.col-right .text-recommended {
  position: relative;
  font-style: normal;
  font-weight: bold;
  font-size: 20px;
  line-height: 28px;
  color: #000000;
}

.col-right .line-right {
  width: 208px;
  height: 0px;
  border-top: 1px solid #aeaeae;
  margin-bottom: 30px;
}

.col-right .rectangle-addfriend1 {
  position: relative;
  width: 100%;
  height: 39px;
  background: #fafafa;
  border-radius: 9px;
  margin-bottom: 13px;
}

.col-right .icon-addfriend1 {
  position: absolute;
  top: 50%;
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
}

.col-right .text-addfriend1 {
  position: absolute;
  left: 57px;
  top: 50%;
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
  font-weight: 500;
  font-size: 12px;
  line-height: 14px;
  color: #000000;
}

.col-right .plus-sign {
  position: absolute;
  right: 12px;
  top: 50%;
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
}

.col-right .text-ShowMore a {
  float: right;
  font-style: normal;
  font-weight: 500;
  font-size: 12px;
  line-height: 14px;
  color: #0099be;
  text-decoration: none;
}

.col-right .text-community-right {
  font-style: normal;
  font-weight: bold;
  font-size: 12px;
  line-height: 14px;
  color: #000000;
  margin-top: 25px;
  margin-bottom: 13px;
}

.col-mid {
  -webkit-box-flex: 0;
  -ms-flex: 0 0 658px;
  flex: 0 0 658px;
  width: 658px;
  border-left: 1px solid #aeaeae;
  border-right: 1px solid #aeaeae;
  overflow-y: scroll;
}

.col-mid .midhead {
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 28px;
}

.col-mid .midhead .container {
  padding-top: 35px;
  padding-bottom: 16px;
  padding-left: 47px;
  border-bottom: 1px solid #aeaeae;
}

.col-mid .photo_feed .container {
  background: white;
  position: block;
  width: 482px;
  height: -webkit-max-content;
  height: -moz-max-content;
  height: max-content;
  padding-bottom: 20px;
  margin-left: 50%;
  margin-top: 21px;
  border-radius: 22px;
  -webkit-transform: translate(-50%, 0);
  transform: translate(-50%, 0);
}

.col-mid .photo_feed .container .rectangle-pp {
  position: relative;
  width: 100%;
  height: 74.95px;
  margin-bottom: 13px;
}

.col-mid .photo_feed .container .rectangle-pp .user-pp {
  position: absolute;
  left: 50.85px;
  border-radius: 60px;
  top: 68%;
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
}

.user-pp,
.commentator-pp {
  width: 40px;
}

.col-mid .photo_feed .container .rectangle-pp .name-user {
  position: absolute;
  left: 112px;
  top: 68%;
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
  font-style: normal;
  font-weight: 500;
  font-size: 15px;
  line-height: 18px;
  color: #000000;
}

.col-mid .photo_feed .container .rectangle-pp .name-user .add-text {
  color: #0099be;
}

.col-mid .photo_feed .container .post_content {
  position: relative;
  text-align: center;
}

.col-mid .photo_feed .container .post_icon {
  position: relative;
  height: 70px;
  width: 100%;
}

.col-mid .photo_feed .container .post_icon .heart {
  position: absolute;
  top: 50%;
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
  left: 40px;
}

.col-mid .photo_feed .container .post_icon .comments {
  position: absolute;
  top: 50%;
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
  left: 75px;
}

.col-mid .photo_feed .container .post-capt {
  position: relative;
  width: 84%;
  padding-left: 40px;
  text-align: justify;
}

.col-mid .photo_feed .container .post_hour {
  position: relative;
  width: 100%;
  height: -webkit-max-content;
  height: -moz-max-content;
  height: max-content;
  padding-top: 10px;
  padding-left: 40px;
}

.col-mid .photo_feed .container .post_hour .hour-content {
  font-weight: normal;
  font-size: 14px;
  line-height: 16px;
}

.col-mid .photo_feed .container .commentator {
  position: relative;
  width: 84%;
  height: -webkit-max-content;
  height: -moz-max-content;
  height: max-content;
  margin-bottom: 13px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  padding-left: 38px;
  margin-top: 10px;
  margin-bottom: 11px;
}

.col-mid .photo_feed .container .commentator .commentator-pp {
  -webkit-box-flex: 0;
  -ms-flex: 0 0 19px;
  flex: 0 0 19px;
  border-radius: 60px;
}

.col-mid .photo_feed .container .commentator .commentator-name {
  -webkit-box-flex: 1;
  -ms-flex: auto;
  flex: auto;
  padding-left: 21px;
  padding-top: 0.5em;
  padding-right: 20px;
  font-weight: 500;
  font-size: 15px;
  line-height: 18px;
  color: #000000;
  font-weight: bold;
  text-align: justify;
}

.col-mid .photo_feed .container .commentator .commentator-name .comment-text {
  font-weight: normal;
}

.bottom_nav {
  display: none;
}

@media screen and (max-width: 1237px) {
  .col-right .container {
    display: none;
  }
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
  .col-mid {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 576;
    flex: 0 0 576;
  }
}
/*# sourceMappingURL=style.css.map */
</style>