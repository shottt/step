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
  name: 'challengedstep',
  components: {
    'StepCard': StepCard,
  },
  computed: {
    userID: function(){
      const userData = this.$store.getters['auth/getUser'];
      return userData.id;
    },
  },
  data: function(){
    return {
      steplist: '',
    }
  },
  // チャレンジ中のSTEP一覧を取得
  mounted: function(){
    const user_id = this.userID;
    axios.get('api/challenged_step', user_id).then((res) => {
      console.log('res.data.steplist：', res.data.steplist);
      this.steplist = res.data.steplist;
    })
  },
}
</script>