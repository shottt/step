const state = {
  user: null,
  message: '',
}

const getters = {}

const mutations = {
  setUser: function(state, user){
    state.user = user
  }
}

const actions = {
  register: function(context, data){
    console.log('data：', data);
    axios.post('/api/register', data).then((res) => {
      // DBからのレスポンスをログで確認
      console.log('res.data：', res.data);
      
      context.commit('setUser', res.data);
    }).catch((error) => {
      this.message = 'ERROR';
    });

  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}