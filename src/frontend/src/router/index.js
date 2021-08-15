import Vue from "vue";
import VueRouter from "vue-router";
import store from "../store";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: () => import("../views/Home/Home.vue"),
    meta: {
      isAuthRequired: true,
    },
  },
  {
    path: "/login",
    name: "login",
    component: () => import("../views/Login/Login.vue"),
    meta: {
      isAuthDisallowed: true,
    },
  },
  {
    path: "/register",
    name: "register",
    component: () => import("../views/Register/Register.vue"),
    meta: {
      isAuthDisallowed: true,
    },
  },
  {
    path: "/profile/:username",
    name: "profile by username",
    component: () => import("../views/Profile/Profile.vue"),
  },
  {
    path: "/profile/",
    name: "profile",
    component: () => import("../views/Profile/Profile.vue"),
    meta: {
      isAuthRequired: true,
    },
  },
  {
    path: "/feeds/add",
    name: "Add feeds",
    component: () => import("../views/Feeds/Feeds.vue"),
    meta: {
      isAuthRequired: true,
    },
  },
  {
    path: "/feeds",
    redirect: "/",
  },
  {
    path: "/friends",
    name: "Friends",
    component: () => import("../views/Friends/Friends.vue"),
    meta: {
      isAuthRequired: true,
    },
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

router.beforeEach((to, _, next) => {
  if (to.matched.some((record) => record.meta.isAuthDisallowed)) {
    if (isLogged()) {
      next("/");
    } else {
      next();
    }
  } else if (to.matched.some((record) => record.meta.isAuthRequired)) {
    if (isLogged()) {
      next();
    } else {
      next("/login");
    }
  } else {
    next();
  }
});

function isLogged() {
  return store.getters["auth/isLogged"];
}

export default router;
