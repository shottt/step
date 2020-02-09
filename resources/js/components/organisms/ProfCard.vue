<template>
  <div class="p-prof-card">
    <div class="p-prof-card__left">
      <img :src="userData.icon" alt="アイコン画像" class="p-prof-card__icon">
    </div>
    <div class="p-prof-card__right">
      <h2 class="p-prof-card__name">{{ userData.name }}</h2>
      <p class="p-prof-card__introduction">{{ userData.introduction }}</p>
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
  computed: {
    isLogin: function(){
      return this.$store.getters['auth/check'];
    },
    userData: function(){
      return this.$store.getters['auth/getUser'];
    }
  }
}
</script>