<template>
  <div class="p-step-card">
    <router-link class="p-step-card__link" to="">
      <h2 class="p-step-card__title">{{ title }}</h2>
      <img src="img/sunrise-kindle.jpg" alt="" class="p-step-card__thumbnail">
      <p class="p-step-card__content">{{ content }}</p>
      <div class="p-step-card__date">{{ created_at }}</div>
      <span class="p-step-card__favorites">{{ favorites }}</span>
      <span class="p-step-card__challenges">{{ challenges }}</span>
    </router-link>
  </div>
</template>

<script>
export default {
  name: 'stepcard',
  data: function(){
    return {
      title: 'プログラミング',
      content: '紹介紹介紹介紹介紹介紹介紹介紹介紹介紹介紹介紹介紹介紹介紹介紹介紹介紹介',
      created_at : '2020-2-2',
      favorites: '300',
      challenges: '300',
    }
  }
}
</script>