<template>
  <div class="p-prof-card">
    <div class="p-prof-card__left">
      <img src="img/78982111.jpeg" alt="アイコン画像" class="p-prof-card__icon">
    </div>
    <div class="p-prof-card__right">
      <h2 class="p-prof-card__name">{{ name }}</h2>
      <p class="p-prof-card__introduction">{{ introduction }}</p>
      <div v-if="isLogin" class="p-prof-card__button">
        <button class="c-button"><router-link class="p-prof-card__link" to="/prof_edit">プロフィール編集</router-link></button>
        <button class="c-button"><router-link class="p-prof-card__link" to="/pass_change">パスワード変更</router-link></button>
        <button class="c-button"><router-link class="p-prof-card__link" to="/withdraw">退会</router-link></button>
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
  },
  computed: {
    isLogin: function(){
      return this.$store.getters['auth/check'];
    }
  }
}
</script>