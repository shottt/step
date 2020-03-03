<template>
  <div class="p-step-search">
    <form class="p-step-search__form" @submit.prevent="search">
      <h2 class="p-step-search__title">検索する</h2>
      <label for="category" class="p-step-search__label">カテゴリー</label>
      <select v-model="searchForm.category_id" name="" id="category" class="p-step-search__form">
        <option disabled value="">選択してください</option>
        <option v-for="category in categories" v-bind:value="category.id">
          {{ category.name }}
        </option>
      </select>
      <label for="sort" class="p-step-search__label">表示順</label>
      <select v-model="searchForm.sort" name="" id="sort" class="p-step-search__form">
        <option disabled value="">選択してください</option>
        <option value="0" selected>新着順</option>
        <option value="1">投稿順</option>
      </select>
      <div class="c-form__button">
        <button type="submit" class="c-button-right">登録する</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: 'search',
  data: function(){
    return {
      categories: '',
      searchForm: {
        category_id: '',
        sort: '',
      },
    }
  },
  mounted: function(){
    axios.get('/api/categories').then((res) => {
      console.log('res.data.categories：', res.data.categories);
      this.categories = res.data.categories;
    });
  },
  methods: {
    search:function(){
      // フォームの入力内容をコンソールに出力
      console.log('searchForm：', this.searchForm);

      axios.post('/api/step_search', this.searchForm).then((res) => {
        console.log('res.data.steplist：', res.data.steplist);

        
      });
    }
  }
}
</script>