<template>
  <div class="form-container">
    <form class="form" @submit.prevent="register">
      <label for="register-email">メールアドレス</label>
      <input type="email" class="form__item" id="register-email" v-model="registerForm.email">
      <label for="register-password">パスワード（6文字以上12文字以内）</label>
      <input type="password" class="form__item" id="register-password" v-model="registerForm.password">
      <label for="register-password-confirmation">パスワード（再入力）</label>
      <input type="password" class="form__item" id="register-password-confirmation" v-model="registerForm.password_confirmation">
      <div class="form__button">
        <button type="submit" class="register-button">登録する</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: 'register',
  data: function(){
    return {
      registerForm: {
        email: '',
        password: '',
        password_confirmation: '',
      }
    }
  },
  methods: {
    register: function() {
      // フォームの入力内容をコンソールに出力
      console.log('registerForm：', this.registerForm);
      // authストアのregisterアクションを呼び出す
      this.$store.dispatch('auth/register', this.registerForm);

      // マイページに遷移する
      this.$router.push('/mypage');
    }
  }
}
</script>