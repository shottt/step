<template>
  <div class="form-container">
    <form class="form" @submit.prevent="login">
      <label for="login-email">メールアドレス</label>
      <input type="email" class="form__item" id="login-email" v-model="loginForm.email">
      <label for="login-password">パスワード</label>
      <input type="password" class="form__item" id="login-password" v-model="loginForm.password">
      <input type="checkbox">次回ログインを省略する
      <div class="form__button">
        <button type="submit" class="login-button">ログイン</button>
      </div>
      <p class="">パスワードを忘れた方は<router-link class="" to="/pass_reminder">こちら</router-link></p>
    </form>
  </div>
</template>

<script>
export default {
  name: 'login',
  data: function(){
    return {
      loginForm: {
        email: '',
        password: '',
      }
    }
  },
  methods: {
    login: function(){
      // フォームの入力内容をコンソールに出力
      console.log('loginForm：', this.loginForm);
      // authストアのloginアクションを呼び出す
      this.$store.dispatch('auth/login', this.loginForm);

      // マイページに移動する
      this.$router.push('/mypage');
    }
  }
}
</script>