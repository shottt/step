<template>
  <div class="l-form-container">
    <div class="c-form" @submit.prevent="passremindesend">
      <p class="c-form__text">ご指定のメールアドレス宛にパスワード再発行用のURLと認証キーをお送りします。</p>
      <label for="passremindesend-email">メールアドレス</label>
      <input type="email" class="c-form__item" id="passremindesend-email" v-model="passremindesendForm.email">
      <div class="c-form__button">
        <button type="submit" class="c-button">送信する</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'passremindesend',
  data: function(){
    return {
      passremindesendForm: {
        email: '',
      }
    }
  },
  methods: {
    passremindesend: function(){
      // フォームの入力内容をコンソールに出力
      console.log('passremindesendForm：', this.passremindesendForm);
    }
  }
}
</script>