<template>
  <div class="l-form-container">
    <form class="c-form" @submit.prevent="withdraw">
      <h2 class="c-form__title">退会</h2>
      <div class="c-form__button">
        <button type="submit" class="c-button-right" @click="withdraw">退会する</button>
      </div>
      <p>
        <router-link to="/mypage">マイページに戻る</router-link>
      </p>
    </form>
  </div>
</template>
<script>
export default {
  name: 'withdraw',
  methods: {
    withdraw: function(){
      if(confirm('本当に退会しますか？')){
        // authストアのwithdrawアクションを呼び出す
        this.$store.dispatch('auth/withdraw');
        // ユーザー登録ページに遷移する
        this.$router.push('/register');
      }else{
        alert('退会をやめました。');
      }
    }
  }
}
</script>