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
  name: 'top',
  components: {
    Header,
    Footer,
  }
}
</script>