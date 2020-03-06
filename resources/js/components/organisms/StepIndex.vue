<template>
  <main>
    <div class="p-step-index">
      <h2 class="p-step-index__title">STEP一覧</h2>
      <div class="p-step-index__area">
        <StepList v-bind:steplist="searchresult"/>
        <Search @search-event="resultSet"/>
      </div>
    </div>
  </main>
</template>

<script>
import StepList from '../organisms/StepList';
import Search from '../molecule/Search';

export default {
  name: 'stepindex',
  components: {
    'StepList': StepList,
    'Search': Search,
  },
  data: function(){
    return {
      searchresult: '',
    }
  },
  // STEP一覧データ取得
  mounted: function(){
    axios.get('/api/steplist').then((res) => {
      console.log('res.data.steplist：', res.data.steplist);
      this.searchresult = res.data.steplist;
    });
  },
  // 検索結果をセット
  methods: {
    resultSet: function(result){
      console.log('result：', result);
      this.searchresult = result;
    }
  }
}
</script>