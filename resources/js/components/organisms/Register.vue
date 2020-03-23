<template>
  <main>
    <div class="l-form-container">
      <form class="c-form" @submit.prevent="register">
        <h2 class="c-form__title">ユーザー登録</h2>
        <label for="register-email" class="c-form__label">メールアドレス</label>
        <input type="email" class="c-form__input" id="register-email" v-model="registerForm.email">
        <label for="register-password" class="c-form__label">パスワード（6文字以上12文字以内）</label>
        <input type="password" class="c-form__input" id="register-password" v-model="registerForm.password">
        <label for="register-password-confirmation" class="c-form__label">パスワード（再入力）</label>
        <input type="password" class="c-form__input" id="register-password-confirmation" v-model="registerForm.password_confirmation">
        <div class="c-form__button">
          <button type="submit" class="c-button-right">登録する</button>
        </div>
      </form>
    </div>
  </main>
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