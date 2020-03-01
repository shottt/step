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
  name: 'steplist',
  components: {
    'StepCard': StepCard,
  },
  data: function(){
    return {
      steplist: ''
    }
  },
  // STEP一覧データ取得
  mounted: function(){
    axios.get('/api/steplist').then((res) => {
      console.log('res.data.steplist：', res.data.steplist);
      this.steplist = res.data.steplist;
    })
  },
}
</script>