<template>
  <div>
    <MainVisual />
    <Feature />
  </div>
</template>

<script>
import MainVisual from '../organisms/MainVisual';
import Feature from '../organisms/Feature';

export default {
  name: 'top',
  components: {
    'MainVisual': MainVisual,
    'Feature': Feature,
  }
}
</script>