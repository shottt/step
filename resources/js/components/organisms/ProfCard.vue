<template>
  <div class="p-prof-card">
    <div class="p-prof-card__left">
      <img src="img/78982111.jpeg" alt="アイコン画像" class="p-prof-card__icon">
    </div>
    <div class="p-prof-card__right">
      <h2 class="p-prof-card__name">{{ name }}</h2>
      <p class="p-prof-card__introduction">{{ introduction }}</p>
      <div class="p-prof-card__button">
        <button class="c-button">プロフィール編集</button>
        <button class="c-button">パスワード変更</button>
        <button class="c-button">退会</button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'profcard',
  data: function(){
    return {
      name: '山田太郎',
      introduction: '自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介',
    }
  }
}
</script>