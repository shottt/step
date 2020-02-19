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
import StepIndex from '../components/pages/StepIndex';
import StepDetail from '../components/pages/StepDeatil';
import SystemError from '../components/pages/SystemError';


// コンポーネントをインポート
import Header from '../components/organisms/Header';
import Footer from '../components/organisms/Footer';

// VueRouterプラグインの使用
Vue.use(VueRouter)

// ルーティング（beforeEnterはルート毎の記載で肥大化しているのでリファクタリング要）
const routes = [
  // ログイン前のルーティング
  // トップページ
  {
    path: '/',
    components: {
      header: Header,
      main: Top,
      footer: Footer,
    },
    // ナビゲーションガード
    beforeEnter(to, from, next){
      if(store.getters['auth/check']){
        next('/mypage');
      }else{
        next();
      }
    }
  },
  // ユーザー登録ページ
  {
    path: '/register',
    components: {
      header: Header,
      main: Register,
      footer: Footer,
    },
    beforeEnter(to, from, next){
      if(store.getters['auth/check']){
        next('/mypage');
      }else{
        next();
      }
    }
  },
  // ログインページ
  {
    path: '/login',
    components: {
      header: Header,
      main: Login,
      footer: Footer,
    },
    // beforeEnter(to, from, next){
    //   if(store.getters['auth/check']){
    //     next('/mypage');
    //   }else{
    //     next();
    //   }
    // }
  },
  // パスワードリマインダー送信ページ
  {
    path: '/pass_remind_send',
    components: {
      header: Header,
      main: PassRemindSend,
      footer: Footer,
    },
    beforeEnter(to, from, next){
      if(store.getters['auth/check']){
        next('/mypage');
      }else{
        next();
      }
    }
  },
  // パスワードリマインダー入力ページ
  {
    path: '/pass_remind_recieve',
    components: {
      header: Header,
      main: PassRemindRecive,
      footer: Footer,
    },
    // beforeEnter(to, from, next){
    //   if(store.getters['auth/check']){
    //     next('/mypage');
    //   }else{
    //     next();
    //   }
    // }
  },
  // 他のユーザーページ
  {
    path: '/user',
    components: {
      header: Header,
      main: User,
      footer: Footer,
    }
  },
  // システムエラーページ
  {
    path: '/500',
    component: SystemError
  },
  // ログイン後のルーティング
  // マイページ
  {
    path: '/mypage',
    components: {
      header: Header,
      main: Mypage,
      footer: Footer,
    },
    // beforeEnter(to, from, next){
    //   if(!store.getters['auth/check']){
    //     next('/login');
    //   }else{
    //     next();
    //   }
    // }
  },
  // プロフィール編集ページ
  {
    path: '/prof_edit',
    components: {
      header: Header,
      main: ProfEdit,
      footer: Footer,
    },
    beforeEnter(to, from, next){
      if(!store.getters['auth/check']){
        next('/login');
      }else{
        next();
      }
    }
  },
  // パスワード変更ページ
  {
    path: '/pass_change',
    components: {
      header: Header,
      main: PassChange,
      footer: Footer,
    },
    beforeEnter(to, from, next){
      if(!store.getters['auth/check']){
        next('/login');
      }else{
        next();
      }
    }
  },
  // 退会ページ
  {
    path: '/withdraw',
    components: {
      header: Header,
      main: Withdraw,
      footer: Footer,
    },
    beforeEnter(to, from, next){
      if(!store.getters['auth/check']){
        next('/login');
      }else{
        next();
      }
    }
  },
  // ステップ登録ページ（子ステップは子コンポーネントを使う）
  {
    path: '/step_register',
    components: {
      header: Header,
      main: StepRegister,
      footer: Footer,
    },
    beforeEnter(to, from, next){
      if(!store.getters['auth/check']){
        next('/login');
      }else{
        next();
      }
    }
  },
  // ステップ編集ページ（子ステップは子コンポーネントを使う）
  {
    path: '/step_edit',
    components: {
      header: Header,
      main: StepEdit,
      footer: Footer,
    },
    beforeEnter(to, from, next){
      if(!store.getters['auth/check']){
        next('/login');
      }else{
        next();
      }
    }
  },
  // 子ステップ詳細ページ
  {
    path: '/steplist/:id/process:id', // パスは検討要
    components: {
      header: Header,
      main: Process,
      footer: Footer,
    }
  },
  // ログイン未ログインどちらでもアクセス可
  // ステップ一覧ページ
  {
    path: '/stepindex',
    components: {
      header: Header,
      main: StepIndex,
      footer: Footer,
    }
  },
  // ステップ詳細ページ
  {
    path: '/steplist/:id',
    components: {
      header: Header,
      main: StepDetail,
      footer: Footer,
    }
  },
]

// VueRouterインスタンスを作る
const router =  new VueRouter({
  mode: 'history',
  routes
})

// VueRouterインスタンスをエクスポートする（app.jsでインポートするため）
export default router