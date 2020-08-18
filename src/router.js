import Vue from "vue";
import Router from "vue-router";
import Home from "./views/Home.vue";
import store from './store'

Vue.use(Router);


const ifNotAuthenticated = (to, from, next) => {
  if (!store.getters.isAuthenticated) {
    next()
    return
  }
  next('/')
}

const ifAuthenticated = (to, from, next) => {
  if (store.getters.isAuthenticated) {
    next()
    return
  }
  next('/login')
}

export default new Router({
  mode: "history",
  base: process.env.BASE_URL,
  routes: [
    {
      path: "/",
      name: "home",
      component: Home
    },
    {
      path: "/about",
      name: "about",
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () =>
        import(/* webpackChunkName: "about" */ "./views/About.vue")
    },
    {
      path: "/category",
      name: "category",
      component: () => import("./views/Category.vue")
    },
    {
      path: "/editor",
      name: "editor",
      component: () => import("./views/Editor.vue"),
      beforeEnter: ifAuthenticated,
    },
    {
      path: "/user",
      name: "user",
      component: () => import("./views/User.vue"),
      beforeEnter: ifAuthenticated,
    },
    {
      path: "/login",
      name: "login",
      component: () => import("./views/Auth.vue"),
      beforeEnter: ifNotAuthenticated,
    }
  ]
});
