<template>
  <main>
  <div class="p-step-detail">
    <div class="p-step-area">
      <h2 class="p-step-detail__title">{{ step.title }}</h2>
      <span class="p-step-area__category">{{ step.category.name }}</span><br>
      <img :src="step.thumbnail" alt="サムネイル" class="p-step-area__thumbnail">
      <p class="p-step-area__overview">{{ step.overview }}</p>
      <div class="p-step-area__date">{{ step.created_at }}</div>
    </div>
    <div class="p-process-area">
      <div v-for="(process, index) in step.processes" class="p-process-area__process">
        <router-link class="p-process-area__link" :to="{ name: 'process_detail', params: {p_id: process.id}}">
          <h2 class="p-process-area__item">【STEP.{{ index + 1 }}】{{ process.item }}</h2>
          <p class="p-process-area__detail">{{ process.detail }}</p>
        </router-link>
      </div>
    </div>
  </div>
  </main>
</template>

<script>
export default {
  nama: 'stepdetail',
  data: function(){
    return {
      step: '',
    }
  },
  mounted: function(){
    console.log('id：', this.$route.params['s_id']);
    axios.get('/api/step_detail', {
      params: {
        // クエリパラメータ付与
        s_id: this.$route.params['s_id']
      }
    }).then((res) => {
      console.log('res.data.step：', res.data.step);
      this.step = res.data.step;
    });
  }
}
</script>