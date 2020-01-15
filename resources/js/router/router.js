import Vue from 'vue'
import VueRouter from 'vue-router'

// VueRouterプラグインの使用
Vue.use(VueRouter)

// トップページ
import top from '../components/pages/top';

// マイページ
import mypage from '../components/pages/mypage';

// コンポーネントをインポート
import header from '../components/organisms/header';
import footer from '../components/organisms/footer';

// パスとコンポーネントのマッチング
const routes = [
  {
    path: '/',
    components: {

    },
  }
]

// VueRouterインスタンスを作る
const router =  new VueRouter({
  mode: 'history',
  routes
})

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
export default router