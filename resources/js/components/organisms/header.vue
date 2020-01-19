<template>
  <header class="l-header">
    <h1 class="title">STEP</h1>
    <nav class="nav-menu js-toggle-sp-menu-target">
      <ul class="c-menu">
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
}
</script>