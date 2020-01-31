<template>
  <div class="p-profile">
    <div class="p-profile__left">
      <img src="" alt="アイコン画像" class="p-profile__icon">
    </div>
    <div class="p-profile__right">
      <h2 class="p-profile__name">{{ name }}</h2>
      <p class="p-profile__introduction">{{ introduction }}</p>
      <div class="p-profile__button">
        <button class="c-botton">プロフィール編集</button>
        <button class="c-botton">パスワード変更</button>
        <button class="c-botton">退会</button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'profile',
  data: function(){
    return {
      name: '',
      introduction: '',
    }
  }
}
</script>