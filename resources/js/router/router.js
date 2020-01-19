import Vue from 'vue'
import VueRouter from 'vue-router'


// ページコンポーネントをインポートする
import Login from '../components/pages/Login';
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
    path: '/login',
    component: Login
  },
]

// VueRouterインスタンスを作る
const router =  new VueRouter({
  mode: 'history',
  routes
})

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
export default router