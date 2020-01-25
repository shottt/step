<template>
  <div>
    <Header />
    <main><router-view></router-view></main>
    <Footer />
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