<template>
  <header class="l-header">
    <h1 class="l-header__logo">
      <router-link to="l-header__logo-link">STEP</router-link>
    </h1>
    <nav class="l-header__nav-menu js-toggle-sp-menu-target">
      <ul v-if="islogin" class="c-menu">
        <li class="c-menu__item">
          <router-link class="c-menu__link" to="">STEP一覧</router-link>
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
    }
  }
}
</script>