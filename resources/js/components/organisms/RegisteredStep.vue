<template>
  <div class="p-step-list">
    <div v-for="step in steplist">
      <StepCard v-bind:step ="step" />
    </div>
  </div>
</template>

<script>
import StepCard from './StepCard';

export default {
  name: 'Registeredstep',
  components: {
    'StepCard': StepCard,
  },
  computed: {
    userID: function(){
      const userID = this.$store.getters['auth/getUserID'];
      return userID;
    },
  },
  data: function(){
    return {
      steplist: '',
    }
  },
  // 登録したSTEP一覧を取得
  mounted: function(){
    console.log('mounted');
    console.log('user_id：', this.$store.getters['auth/getUserID']);

    // const user_id = this.userID;
    axios.get('/api/registered_step').then((res) => {
      // console.log('res.data.steplist：', res.data.steplist);
      // this.steplist = res.data.steplist;
    });
  }
}
</script>