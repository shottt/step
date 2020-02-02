<template>
  <div class="p-step-index">
    <h2 class="p-step-index__title">STEP一覧</h2>
    <div class="p-step-index__area">
      <StepList />
      <Search />
    </div>
  </div>
</template>

<script>
import StepList from '../organisms/StepList';
import Search from '../molecule/Search';

export default {
  name: 'stepindex',
  components: {
    'StepList': StepList,
    'Search': Search,
  }
}
</script>