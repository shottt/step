<template>
  <div class="p-step-myindex">
    <ul class="p-step-myindex__tab">
      <li class="p-step-myindex__menu" @click="isRegistered">登録したSTEP一覧</li>
      <li class="p-step-myindex__menu" @click="isChallenged">チャレンジしたSTEP一覧</li>
    </ul>
    <div class="p-step-list">
      <div v-if="display">
        <RegisteredStep />
      </div>
      <div v-else>
        <!-- <ChallengedStep /> -->
      </div>
    </div>
  </div>
</template>

<script>
import RegisteredStep from './RegisteredStep';
// import ChallengedStep from './ChallengedStep';

export default {
  name: 'mystepindex',
  components: {
    'RegisteredStep': RegisteredStep,
    // 'ChallengedStep': ChallengedStep,
  },
  data: function(){
    return{
      display: true,
    }
  },
  methods: {
    isRegistered: function(){
      this.display = true;
    },
    isChallenged: function(){
      this.display = false;
    }
  }

}
</script>