<template>
  <main>
    <ProfCard />
    <MyStepIndex />
  </main>
</template>

<script>
import ProfCard from '../organisms/ProfCard';
import MyStepIndex from '../organisms/MyStepIndex';

export default {
  name: 'mypage',
  components: {
    'ProfCard': ProfCard,
    'MyStepIndex': MyStepIndex,
  }
}
</script>