<template>
  <div class="l-form-container">
    <form class="c-form" @submit.prevent="passremindsend">
      <p class="c-form__text">ご指定のメールアドレス宛にパスワード再発行用のURLと認証キーをお送りします。</p>
      <label for="passremindsend-email">メールアドレス</label>
      <input type="email" class="c-form__input" id="passremindsend-email" v-model="passremindsendForm.email">
      <div class="c-form__button">
        <button type="submit" class="c-button-right">送信する</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: 'passremindsend',
  data: function(){
    return {
      passremindsendForm: {
        email: '',
      }
    }
  },
  methods: {
    passremindsend: function(){
      // フォームの入力内容をコンソールに出力
      console.log('passremindsendForm：', this.passremindsendForm);
      // authストアのpassremindsendアクションを呼び出す
      this.$store.dispatch('auth/passremindsend', this.passremindsendForm);

      // パスワードリマインダー入力画面に移動する
      this.$router.push('/pass_remind_recieve');
    }
  }
}
</script>