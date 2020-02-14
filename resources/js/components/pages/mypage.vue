<template>
  <main>
    <ProfCard />
  </main>
</template>

<script>
import ProfCard from '../organisms/ProfCard';
export default {
  name: 'mypage',
  components: {
    'ProfCard': ProfCard,
  }
}
</script>