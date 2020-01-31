<template>
  <div class="l-form-container">
    <form class="c-form" @submit.prevent="withdraw">
      <h2 class="c-form__title">退会</h2>
      <div class="c-form__button">
        <button type="submit" class="c-button-submit">退会する</button>
      </div>
      <p>マイページに戻る</p>
    </form>
  </div>
</template>
<script>
export default {
  name: 'withdraw',
  methods: {
    withdraw: function(){

    }
  }
}
</script>