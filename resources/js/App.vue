<template>
  <div class="l-container">
    <router-view name="header" class="l-header"></router-view>
    <router-view name="main" class="l-main"></router-view>
    <router-view name="footer" class="l-footer"></router-view>
  </div>
</template>

<script>
import Header from './components/organisms/Header';
import Footer from './components/organisms/Footer';

export default {
  name: 'app',
  components: {
    'Header': Header, // <Header />はimportしたHeaderを使用する設定。これがHeaderだけだと描画されなかった。
    'Footer': Footer,
  }
}
</script>