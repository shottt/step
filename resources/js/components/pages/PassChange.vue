<template>
  <div class="l-form-container">
    <form class="c-form" >
      <h2 class="c-form__title">パスワード変更</h2>
      <label for="old-password" class="c-form__label">古いパスワード</label>
      <input type="password" class="c-form__item" id="old-password" v-model="passchangeForm.old_password">
      <label for="new-password" class="c-form__label">新しいパスワード</label>
      <input type="password" class="c-form__item" id="new-password" v-model="passchangeForm.new_password">
      <label for="new-password-confirmation" class="c-form__label">新しいパスワード（再入力）</label>
      <input type="password" class="c-form__item" id="new-password-confirmation" v-model="passchangeForm.new_password_confirmation">
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
  }
}
</script>