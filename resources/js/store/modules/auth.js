const state = {
  user: null,
  message: '',
}

const getters = {
  check: function(state){
    if(state.user){
      return true;
    }else{
      return false;
    }
  }
}

const mutations = {
  setUser: function(state, user){
    state.user = user
  }
}

const actions = {
  // ユーザー登録機能
  register: function(context, data){
    console.log('data：', data);
    axios.post('/api/register', data).then((res) => {
      // DBからのレスポンスをログに出力
      console.log('res.data：', res.data);

      context.commit('setUser', res.data);
    }).catch((error) => {
      this.message = 'ERROR';
    });
  },
  // ログイン機能
  login: function(context, data){
    console.log('data：', data);
    axios.post('/api/login', data).then((res) => {
      // DBからのレスポンスをログに出力
      console.log('res.data：', res.data);

      context.commit('setUser', res.data);
    }).catch((error) => {
      this.message = 'ERROR';
    });
  },
  // ログアウト機能
  logout: function(context){
    axios.post('/api/logout').then((res) => {
      console.log('res：', res);

      context.commit('setUser', null);
    }).catch((error) => {
      this.message = 'ERROR';
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