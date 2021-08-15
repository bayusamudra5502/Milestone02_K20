import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: () => import("../views/Home/Home.vue"),
  },
  {
    path: "/login",
    name: "login",
    component: () => import("../views/Login/Login.vue"),
  },
  {
    path: "/register",
    name: "register",
    component: () => import("../views/Register/Register.vue"),
  },
  {
    path: "/profile/:username",
    name: "profile",
    component: () => import("../views/Profile/Profile.vue"),
  },
  {
    path: "/profile/",
    name: "profile",
    component: () => import("../views/Profile/Profile.vue"),
  },
  {
    path: "/feeds/add",
    name: "Add feeds",
    component: () => import("../views/Feeds/Feeds.vue"),
  },
  {
    path: "/feeds",
    redirect: "/",
  },
  {
    path: "/friends",
    name: "Friends",
    component: () => import("../views/Friends/Friends.vue"),
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
