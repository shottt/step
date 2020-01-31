<template>
  <div class="l-form-container">
    <div class="c-form" @submit.prevent="passreminderecieve">
      <p class="c-form__text">ご指定のメールアドレス宛にお送りした【パスワード再発行認証メール内にある「認証キー」をご入力ください。</p>
      <label for="passreminderecieve-authkey">認証キー</label>
      <input type="text" class="c-form__item" id="passreminderecieve-authkey" v-model="passreminderecieveForm.email">
      <div class="c-form__button">
        <button type="submit" class="c-button">送信する</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'passreminderecieve',
  data: function(){
    return {
      passreminderecieveForm: {
        authkey: '',
      }
    }
  },
  methods: {
    passremindesend: function(){
      // フォームの入力内容をコンソールに出力
      console.log('passreminderecieveForm：', this.passreminderecieveForm);
    }
  }
}
</script>