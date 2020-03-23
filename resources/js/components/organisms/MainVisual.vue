<template>
  <div class="p-main-visual">
    <h2 class="p-main-visual__title">あなたの人生のSTEPを<br>共有しよう！</h2>
    <p class="p-main-visual__text">プログラミングや英語などを学ぶのにも人それぞれ「これが良かった」という「順番」と「内容」がある。<br>
       人それぞれの「この順番でこういったものを学んでいったのが良かった」という「STEP」を投稿し、<br>
       他の人はそれを見ながらその「STEP」を元に学習を進めていけるサービス。
    </p>
    <div class="p-main-visual__button">
      <button class="c-button">
        <router-link class="c-button__link" to="/stepindex">STEPを見る</router-link>
      </button>
      <button class="c-button">
        <router-link class="c-button__link" to="/register">登録する</router-link>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'mainvisual',
}
</script>