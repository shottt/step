<template>
  <div class="l-form-container">
    <div class="c-form" @submit.prevent="passremindrecieve">
      <p class="c-form__text">ご指定のメールアドレス宛にお送りした【パスワード再発行認証】メール内にある「認証キー」をご入力ください。</p>
      <label for="passremindrecieve-authkey">認証キー</label>
      <input type="text" class="c-form__input" id="passremindrecieve-authkey" v-model="passremindrecieveForm.email">
      <div class="c-form__button">
        <button type="submit" class="c-button-right">送信する</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'passremindrecieve',
  data: function(){
    return {
      passremindrecieveForm: {
        authkey: '',
      }
    }
  },
  methods: {
    passremindsend: function(){
      // フォームの入力内容をコンソールに出力
      console.log('passremindrecieveForm：', this.passremindrecieveForm);
    }
  }
}
</script>