import Vue from 'vue'
import VueRouter from 'vue-router'


// ページコンポーネントをインポートする
import login from '../components/pages/login';
import top from '../components/pages/top';
import mypage from '../components/pages/mypage';

// コンポーネントをインポート
import header from '../components/organisms/header';
import footer from '../components/organisms/footer';

// VueRouterプラグインの使用
Vue.use(VueRouter)

// パスとコンポーネントのマッチング
const routes = [
  {
    path: '/login',
    component: login
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