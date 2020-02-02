<template>
  <div class="p-step-list">
    <StepCard />
    <StepCard />
    <StepCard />
    <StepCard />
  </div>
</template>
<script>
import StepCard from './StepCard';

export default {
  name: 'steplist',
  components: {
    'StepCard': StepCard,
  }
}
</script>