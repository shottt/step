import Vue from 'vue';
import VueRouter from 'vue-router';
import store from '../store';


// ページコンポーネントをインポートする
import Login from '../components/pages/Login';
import Register from '../components/pages/Register';
import PassRemindeSend from '../components/pages/PassRemindeSend';
import PassRemindeRecive from '../components/pages/PassRemindRecieve';
import Top from '../components/pages/Top';
import Mypage from '../components/pages/Mypage';
import Withdraw from '../components/pages/Withdraw';
import PassChange from '../components/pages/PassChange';

// コンポーネントをインポート


// VueRouterプラグインの使用
Vue.use(VueRouter)

// パスとコンポーネントのマッチング
const routes = [
  {
    path: '/',
    component: Top
  },
  {
    path: '/login',
    component: Login,
    // ナビゲーションガード
    beforeEnter(to, from, next){
      if(store.getters['auth/check']){
        next('/mypage');
      }else{
        next();
      }
    }
  },
  {
    path: '/register',
    component: Register
  },
  {
    path: '/mypage',
    component: Mypage
  },
  {
    path: '/pass_reminde_send',
    component: PassRemindeSend
  },
  {
    path: '/pass_reminde_recieve',
    component: PassRemindeRecive,
  },
  {
    path: '/withdraw',
    component: Withdraw,
  },
  {
    path: '/pass_change',
    component: PassChange
  },
]

// VueRouterインスタンスを作る
const router =  new VueRouter({
  mode: 'history',
  routes
})

// VueRouterインスタンスをエクスポートする（app.jsでインポートするため）
export default router