import { createApp } from "vue";
import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import App from "./App.vue";
import Home from "./pages/Home.vue";
import Inquiry from "./pages/Inquiry.vue";
import Profile from "./pages/Profile.vue";
import Fee from "./pages/Fee.vue";
import Data from "./pages/Data.vue";
import News from "./pages/News.vue";
import NewsDetail from "./components/NewsDetail.vue";
import Login from "./login/Login.vue";
import * as VueRouter from 'vue-router';
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'

const vuetify = createVuetify({
  components,
  directives,
  display: {
    mobileBreakpoint: 'sm',
    thresholds: {
      xs: 0,
      sm: 340,
      md: 540,
      lg: 800,
      xl: 1280,
    },
  },

});


const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/inquiry', name: 'Inquiry', component: Inquiry },
  { path: '/profile', name: 'Profile', component: Profile },
  { path: '/news', name: 'News', component: News },
  { path: '/news/:id', name: 'NewsDetail', component: NewsDetail },
  { path: '/data', name: 'Data', component: Data },
  { path: '/fee', name: 'Fee', component: Fee },
  { path: '/:pathMatch(.*)*', redirect: '/' },
  { path: '/user/login', name: 'login', component: Login, },
];


const router = VueRouter.createRouter({
  history: VueRouter.createWebHistory(), // HTML5 History モード
  routes,
});

const store = createStore({
  state: {
    isLogin: false,
    count: 0
  },
  mutations: {
    login(state) {
      state.isLogin = true
      console.log("statusmethod", state.isLogin);
    },
    logout(state) {
      console.log("statusmethod", state.isLogin);
      state.isLogin = false
    },
    checkLoginStatus(state) {
      // console.log(state.isLogin);
      if (state.isLogin === false) {
        console.log("checkLoginStatus");
        router.push('/user/login')
      }
    },
    increment(state) {
      state.count++
      state.count++
    }
  },
  actions: {
    // loginAction({ commit }) {
    //   commit('login')
    // },
    // logoutAction({ commit }) {
    //   commit('logout')
    // },
    // checkLoginStatusAction({ commit }) {
    //   commit('checkLoginStatus')
    // },
    // incrementAction({ commit }) {
    //   commit('increment')
    // },
    // addCountAction({ commit }, payload) {
    //   commit('addCount', payload)
    // }
  },
  plugins: [createPersistedState(
    { // ストレージのキーを指定。デフォルトではvuex
      // key: 'anyGreatApp',

      // 管理対象のステートを指定。pathsを書かない時は`modules`に書いたモジュールに含まれるステート全て。`[]`の時はどれも保存されない
      paths: [
        'isLogin'
      ],

      // ストレージの種類を指定する。デフォルトではローカルストレージ
      storage: window.sessionStorage
    }
  )]
})

const app = createApp(App)
  // .provide("$store", store)
  .use(router)
  .use(vuetify)
  .use(store)
  .component('app', App)
  .mount("#app");

