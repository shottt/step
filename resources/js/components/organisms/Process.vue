<template>
  <main>
    <div class="p-process">
      <h2 class="p-process__title"></h2>

    </div>
  </main>
</template>

<script>
export default {
  name: 'process',
  data: function(){
    return {
      process: '',
    }
  },
  mounted: function(){
    console.log('p_id：', this.$route.params['p_id']);
    axios.get('/api/process_detail', {
      params: {
        // クエリパラメータ付与
        p_id: this.$route.params['p_id']
      }
    }).then((res) => {
      console.log('res.data.process：', res.data.process);
      this.process = res.data.process;
    });

  }
}
</script>