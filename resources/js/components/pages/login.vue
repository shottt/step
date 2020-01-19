<template>
  <div>
    <Header />
    <Footer />
  </div>
</template>

<script>
import Header from '../organisms/Header';
import Footer from '../organisms/Footer';

export default {
  name: 'login',
  components: {
    Header,
    Footer,
  }
}
</script>