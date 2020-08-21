import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store/";
import axios from "axios";
import Vue2TouchEvents from 'vue2-touch-events'

import "./registerServiceWorker";

const token = localStorage.getItem("user-token");
const user = localStorage.getItem("user-token");
if (token && user) {
  axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
  store.commit("AUTH_SUCCESS", token);
  store.commit('SET_USER_DETAIL', user);
  store.dispatch('USER_REQUEST');
}
Vue.config.productionTip = false;
Vue.use(Vue2TouchEvents)
store.dispatch('loadDataApi', {});

Vue.prototype.$isMobile = false
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || window.innerWidth < 768) {
  Vue.prototype.$isMobile = true
}

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");
