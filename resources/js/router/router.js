import Vue from 'vue';
import VueRouter from 'vue-router';
import store from '../store';


// ページコンポーネントをインポートする
import Top from '../components/pages/Top';
import Register from '../components/pages/Register';
import Login from '../components/pages/Login';
import PassRemindSend from '../components/pages/PassRemindSend';
import PassRemindRecive from '../components/pages/PassRemindRecieve';
import User from '../components/pages/User';
import Mypage from '../components/pages/Mypage';
import ProfEdit from '../components/pages/ProfEdit';
import PassChange from '../components/pages/PassChange';
import Withdraw from '../components/pages/Withdraw';
import StepRegister from '../components/pages/StepRegister';
import StepEdit from '../components/pages/StepEdit';
import Process from '../components/pages/Process';
import StepList from '../components/pages/StepList';
import Step from '../components/pages/Step';


// コンポーネントをインポート


// VueRouterプラグインの使用
Vue.use(VueRouter)

// ルーティング
const routes = [
  // ログイン前のルーティング
  // トップページ
  {
    path: '/',
    component: Top
  },
  // ユーザー登録ページ
  {
    path: '/register',
    component: Register
  },
  // ログインページ
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
  // パスワードリマインダー送信ページ
  {
    path: '/pass_remind_send',
    component: PassRemindSend,
  },
  // パスワードリマインダー入力ページ
  {
    path: '/pass_remind_recieve',
    component: PassRemindRecive,
  },
  // 他のユーザーページ
  {
    path: '/user',
    component: User,
  },
  // ログイン後のルーティング
  // マイページ
  {
    path: '/mypage',
    component: Mypage,
  },
  // プロフィール編集ページ
  {
    path: '/prof_edit',
    component: ProfEdit,
  },
  // パスワード変更ページ
  {
    path: '/pass_change',
    component: PassChange,
  },
  // 退会ページ
  {
    path: '/withdraw',
    component: Withdraw,
  },
  // ステップ登録ページ（子ステップは子コンポーネントを使う）
  {
    path: '/step_register',
    component: StepRegister,
  },
  // ステップ編集ページ（子ステップは子コンポーネントを使う）
  {
    path: '/step_edit',
    component: StepEdit,
  },
  // 子ステップ詳細ページ
  {
    path: '/steplist/:id/process:id', // パスは検討要
    component: Process,
  },
  // ログイン未ログインどちらでもアクセス可
  // ステップ一覧ページ
  {
    path: '/steplist',
    component: StepList,
  },
  // ステップ詳細ページ
  {
    path: '/steplist/:id',
    component: Step,
  },
]

// VueRouterインスタンスを作る
const router =  new VueRouter({
  mode: 'history',
  routes
})

// VueRouterインスタンスをエクスポートする（app.jsでインポートするため）
export default router