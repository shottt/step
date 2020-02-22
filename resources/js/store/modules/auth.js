import { OK } from '../../util';

const state = {
  user: null,
  apiStatus: '', // API呼び出しの成功有無
  message: '',
}

const getters = {
  check: function(state){
    if(state.user){
      return true;
    }else{
      return false;
    }
  },
  getUserID: function(state){
    return state.user.id;
  },
  getUser: function(state){
    return state.user;
  }
}

const mutations = {
  setUser: function(state, user){
    state.user = user
  },
  setApiStatus: function(statu, status){
    state.apiStatus = status;
  },
  editUser: function(state, user){
    if(user.icon){
      state.user.icon = user.icon;
    }
    if(user.name){
      state.user.name = user.name;
    }
    if(user.introduction){
      state.user.introduction = user.introduction;
    }
  }
}

const actions = {
  // ユーザー登録機能
  register: function(context, data){
    console.log('data：', data);
    axios.post('/api/register', data).then((res) => {
      // DBからのレスポンスをログに出力
      console.log('res.data：', res.data);
      // ミューテーション実行
      context.commit('setUser', res.data);
    }).catch((error) => {
      this.message = 'ERROR';
    });
  },
  // ログイン機能
  login: function(context, data){
    console.log('data：', data);
    context.commit('setApiStatus', null);
    axios.post('/api/login', data).then((res) => {
      // DBからのレスポンスをログに出力
      console.log('res.data：', res.data);
      // ミューテーション実行
      context.commit('setApiStatus', true);
      context.commit('setUser', res.data);
    }).catch((error) => {
      error.response || error;
    });
  },
  // パスワードリマインダー送信機能
  passremindsend: function(context, data){
    console.log('data：', data);
    axios.post('/api/password/email', data).then((res) => {
      // DBからのレスポンスをログに出力
      console.log('res.data：', res.data);
      // ミューテーション実行
    }).catch((error) => {
      this.message = 'ERROR';
    });
  },
  // ログアウト機能
  logout: function(context){
    axios.post('/api/logout').then((res) => {
      console.log('res：', res);
      // ミューテーション実行
      context.commit('setUser', null);
    }).catch((error) => {
      this.message = 'ERROR';
    });
  },
  // ログインユーザー取得機能
  currentUser: function(context){
    axios.get('/api/user').then((res) => {
      console.log('res：', res);
      // ログインしていなければ、初期値のnullにする
      const user = res.data || null;
      // ミューテーション実行
      context.commit('setUser', user);
    })
  },
  // プロフィール編集機能
  profEdit: function(context, data){
    context.commit('editUser', data);
  },
  // 退会機能
  withdraw: function(context){
    // ゲッターにアクセスし、ユーザー情報を取得（うまくデータが渡せないため、サーバー側で取得する）
    // const id = context.getters['getUserID'];
    axios.post('/api/withdraw').then((res) => {
      if(res.data.result_flag === true){
        console.log('res：', res);
        // ミューテーション実行
        context.commit('setUser', null);

      }
    }).catch((error) => {
      this.message = "ERROR";
    });
  },
  // パスワード変更機能
  passchange: function(context, data){
    console.log('data：', data);
    axios.post('/api/pass_change', data).then((res) => {
      if(res.data.result_flag === true){
        console.log('res：', res);

      }
    })
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}