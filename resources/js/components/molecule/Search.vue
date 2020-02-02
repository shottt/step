<template>
  <div class="p-step-search">
    <form class="p-step-search__form">
      <h2 class="p-step-search__title">検索する</h2>
      <label for="category-search" class="p-step-search__label">カテゴリー</label>
      <select name="category" id="category-search">
        <option value="0" selected>プログラミング</option>
        <option value="1">英語</option>
      </select>
      <label for="display-order" class="p-step-search__label">表示順</label>
      <select name="order" id="display-order">
        <option value="0" selected>新着順</option>
        <option value="1">投稿順</option>
      </select>
    </form>
  </div>
</template>

<script>
export default {
  name: 'search',
}
</script>