import Vue from 'vue';
import Vuex from 'vuex';

import auth from './modules/auth';
import error from './modules/error';

// Vuexプラグインの使用
Vue.use(Vuex);

const store = new Vuex.Store({
  modules: {
    auth,
    error,
  }
});
export default store