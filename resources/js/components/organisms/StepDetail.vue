<template>
  <div class="p-step-detail">
    <h2 class="p-step-detail__title">{{ step.title }}</h2>
    <span class="p-step-datail__category">{{ step.category.name }}</span><br>
    <img :src="step.thumbnail" alt="" class="p-step-detail__thumbnail">
    <p class="p-step-detail__overview">{{ step.overview }}</p>
    <div class="p-step-detail__date">{{ step.created_at }}</div>
  </div>
  
</template>

<script>
export default {
  nama: 'stepdetail',
  data: function(){
    return{
      step: '',
    }
  },
  mounted: function(){
    console.log('id：', this.$route.params['id']);
    axios.get('/api/step_detail', {
      params: {
        // クエリパラメータ付与
        s: this.$route.params['id']
      }
    }).then((res) => {
      console.log('res.data：', res.data);
      this.step = res.data.step;
    });
  }
}
</script>