import Vue from 'vue'
import VueRouter from 'vue-router'


// ページコンポーネントをインポートする
import Login from '../components/pages/Login';
import Register from '../components/pages/Register';
import Pass_reminder from '../components/pages/PassReminder';
import Top from '../components/pages/Top';
import Mypage from '../components/pages/Mypage';

// コンポーネントをインポート
import Header from '../components/organisms/Header';
import Footer from '../components/organisms/Footer';

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
    component: Login
  },
  {
    path: '/register',
    component: Register
  },
  {
    path: '/mypage',
    component: Mypage
  },
  // {
  //   path: '/passreminder',
  //   component: PassReminder
  // },
]

// VueRouterインスタンスを作る
const router =  new VueRouter({
  mode: 'history',
  routes
})

// VueRouterインスタンスをエクスポートする（app.jsでインポートするため）
export default router