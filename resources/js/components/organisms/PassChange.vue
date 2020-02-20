<template>
  <div class="l-form-container">
    <form class="c-form" @submit.prevent="passchange">
      <h2 class="c-form__title">パスワード変更</h2>
      <label for="old-password" class="c-form__label">古いパスワード</label>
      <input type="password" class="c-form__input" id="old-password" v-model="passchangeForm.old_password">
      <label for="new-password" class="c-form__label">新しいパスワード</label>
      <input type="password" class="c-form__input" id="new-password" v-model="passchangeForm.new_password">
      <label for="new-password-confirmation" class="c-form__label">新しいパスワード（再入力）</label>
      <input type="password" class="c-form__input" id="new-password-confirmation" v-model="passchangeForm.new_password_confirmation">
      <div class="c-form__button">
        <button type="submit" class="c-button-right">変更する</button>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  name: 'passchange',
  data: function(){
    return {
      passchangeForm: {
        old_password: '',
        new_password: '',
        new_password_confirmation: '',
      }
    }
  },
  methods: {
    passchange: function(){
      // フォームの入力内容をコンソールに出力
      console.log('passchangeForm：', this.passchangeForm);
      // authストアのpasschangeアクションを呼び出す
      this.$store.dispatch('auth/passchange', this.passchangeForm);
      // マイページに遷移する
      this.$router.push('/mypage');
    }
  }
}
</script>