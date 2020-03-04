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
  // data: function(){
  //   return {
  //     steplist: ''
  //   }
  // },
  props: {
    steplist: '',
  },
}
</script>