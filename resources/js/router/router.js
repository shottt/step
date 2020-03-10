import Vue from 'vue';
import VueRouter from 'vue-router';
import store from '../store';


// ページコンポーネントをインポートする
import Top from '../components/organisms/Top';
import Register from '../components/organisms/Register';
import Login from '../components/organisms/Login';
import User from '../components/organisms/User';
import Mypage from '../components/organisms/Mypage';
import ProfEdit from '../components/organisms/ProfEdit';
import PassChange from '../components/organisms/PassChange';
import Withdraw from '../components/organisms/Withdraw';
import StepRegister from '../components/organisms/StepRegister';
import StepEdit from '../components/organisms/StepEdit';
import Process from '../components/organisms/Process';
import StepIndex from '../components/organisms/StepIndex';
import StepDetail from '../components/organisms/StepDetail';
import SystemError from '../components/organisms/SystemError';


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
  // 他のユーザーページ
  // {
  //   path: '/user',
  //   components: {
  //     header: Header,
  //     main: User,
  //     footer: Footer,
  //   }
  // },
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
  // // 子ステップ詳細ページ
  // {
  //   path: '/stepindex/:id(\\d+)/process/:id(\\d+)', // パスは検討要
  //   name: 'process_detail',
  //   components: {
  //     header: Header,
  //     main: Process,
  //     footer: Footer,
  //   }
  // },
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
    path: '/stepindex/:s_id(\\d+)', 
    name: 'step_detail',
    components: {
      header: Header,
      main: StepDetail,
      footer: Footer,
    },
    // 子ステップ詳細ページ
    children: [
      {
        path: 'process/:p_id(\\d+)',
        name: 'process_detail',
        components: {
          header: Header,
          main: Process,
          footer: Footer,
        }
      }
    ]
  },
]

// VueRouterインスタンスを作る
const router =  new VueRouter({
  mode: 'history',
  routes
})

// VueRouterインスタンスをエクスポートする（app.jsでインポートするため）
export default router