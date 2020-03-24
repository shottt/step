<template>
  <header>
    <h1 class="l-header__logo">
      <router-link class="l-header__logo-link" to="/">STEP</router-link>
    </h1>
    <div class="c-sp-menu" @click="isActive=!isActive" v-bind:class="{active:isActive}">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <nav class="l-header__nav-menu" v-bind:class="{active:isActive}">
      <ul v-if="islogin" class="c-menu">
        <li class="c-menu__item">
          <router-link class="c-menu__link" to="/stepindex">STEP一覧</router-link>
        </li>
        <li class="c-menu__item">
          <router-link class="c-menu__link" to="/step_register">STEP登録</router-link>
        </li>
        <li class="c-menu__item">
          <router-link class="c-menu__link" to="/mypage">マイページ</router-link>
        </li>
        <li class="c-menu__item">
          <button class="c-menu__button" @click="logout">ログアウト</button>
        </li>
      </ul>
      <ul v-else class="c-menu">
        <li class="c-menu__item">
          <router-link class="c-menu__link" to="/login">ログイン</router-link>
        </li>
        <li class="c-menu__item">
          <router-link class="c-menu__link" to="/register">ユーザー登録</router-link>
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  name: 'header',
  data: function(){
    return {
      isActive: false,
    }
  },
  computed: {
    islogin: function(){
      return this.$store.getters['auth/check']
    }
  },
  methods: {
    logout: function(){
      // authストアのlogoutアクションを呼び出す
      this.$store.dispatch('auth/logout');

      // ログインページに遷移する
      this.$router.push('/login');
    },
  }
}
</script>