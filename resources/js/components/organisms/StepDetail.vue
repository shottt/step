<template>
  <main>
  <div class="p-step-detail">
    <div class="p-step-area">
      <h2 class="p-step-area__title">{{ step.title }}</h2>
      <span class="p-step-area__category">{{ step.category.name }}</span><br>
      <img :src="step.thumbnail" alt="サムネイル" class="p-step-area__thumbnail">
      <p class="p-step-area__overview">{{ step.overview }}</p>
      <div class="p-step-area__date">{{ step.created_at }}</div>
      <form v-if="isLogin" class="c-form" @submit.prevent="challenge">
        <div class="c-form__button">
          <button type="submit" class="c-button-right">チャレンジする</button>
        </div>
      </form>
    </div>
    <div v-if="isLogin" class="p-process-area">
      <div v-for="(process, index) in step.processes" class="p-process-area__process">
        <router-link class="p-process-area__link" :to="{ name: 'process_detail', params: {p_id: process.id}}">
          <h2 class="p-process-area__item">【STEP.{{ index + 1 }}】{{ process.item }}</h2>
          <p class="p-process-area__detail">{{ process.detail }}</p>
        </router-link>
      </div>
    </div>
    <div v-else class="p-process-area">
      <p class="p-process-area__text">このSTEPの内容を見たい方は<router-link to="/register">こちら</router-link></p>
    </div>
    <router-link class="p-step-detail__link" to="/stepindex"><span>&lt;STEP一覧に戻る</span></router-link>
  </div>
  </main>
</template>　

<script>
export default {
  nama: 'stepdetail',
  data: function(){
    return {
      step: '',
      challenge_id: '',
    }
  },
  computed: {
    isLogin: function(){
      return this.$store.getters['auth/check']
    },
    userID: function(){
      return this.$store.getters['auth/getUserID']
    },
  },
  mounted: function(){
    console.log('s_id：', this.$route.params['s_id']);
    axios.get('/api/step_detail', {
      params: {
        // クエリパラメータ付与
        s_id: this.$route.params['s_id']
      }
    }).then((res) => {
      console.log('res.data.step：', res.data.step);
      this.step = res.data.step;
    });
  },
  methods: {
    challenge: function(){
      const challenge_info = {
        step_id: this.step.id, 
        user_id: this.userID,
      };
      console.log('challeng_info：', challenge_info);
      // user_idとstep_idを送る
      axios.post('/api/challenge', challenge_info).then((res) => {
        if(res.data.result_flag === true){
          console.log('通信成功');
          console.log('res.data.challenge_id：', res.data.challenge_id);

          this.challenge_id = res.data.challenge_id;
        }
       


      });
    }
  }
}
</script>