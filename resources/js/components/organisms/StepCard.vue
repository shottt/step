<template>
  <div class="p-step-card">
    <router-link class="p-step-card__link" to="">
      <h2 class="p-step-card__title">{{ step.title }}</h2>
      <img :src="step.thumbnail" alt="" class="p-step-card__thumbnail">
      <p class="p-step-card__overview">{{ step.overview }}</p>
      <div class="p-step-card__date">{{ step.created_at }}</div>
      <span class="p-step-card__favorites">{{ step.favorites_count }}</span>
      <!-- <span class="p-step-card__challenges">{{ challenges }}</span> -->
    </router-link>
  </div>
</template>

<script>
export default {
  name: 'stepcard',
  props: {
    step: '',
  },
  data: function(){
    return {
      
    }
  }
}
</script>