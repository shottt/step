<template>
  <main>
    <div class="l-form-container">
      <form class="c-form" @submit.prevent="login">
        <h2 class="c-form__title">ログイン</h2>
        <label for="login-email" class="c-form__label">メールアドレス</label>
        <input type="email" class="c-form__input" id="login-email" v-model="loginForm.email">
        <label for="login-password" class="c-form__label">パスワード</label>
        <input type="password" class="c-form__input" id="login-password" v-model="loginForm.password">
        <!-- <input type="checkbox">次回ログインを省略する -->
        <div class="c-form__button">
          <button type="submit" class="c-button-right">ログイン</button>
        </div>
        <!-- <router-link class="c-form__text">パスワードを忘れた方は<router-link class="c-form__link" to="/pass_remind_send">こちら</router-link></p> -->
        <p class="c-form__text">パスワードを忘れた方は<a class="c-form__link" href="/password/reset">こちら</a></p>
      </form>
    </div>
  </main>
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
      this.$store.dispatch('auth/login', this.loginForm).then(() => {
        // マイページに移動する
        this.$router.push('/mypage');
      });
    },
  }
}
</script>