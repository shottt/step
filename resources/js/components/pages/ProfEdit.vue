<template>
  <div class="l-form-container">
    <form class="c-form">
      <h2 class="c-form__title">プロフィール編集</h2>
      <label for="icon" class="c-form__label">アイコン画像</label>
      <!-- <div class="c-form__area-drop"> -->
        <input type="file" accept="image/*" class="c-form__input-file" id="icon" @change="onFileChange">
        <output class="c-form__output" v-if="profEditForm.icon">
          <img :src="profEditForm.icon" alt="アイコン" class="c-form__preview">
        </output>
      <!-- </div> -->
      <label for="name" class="c-form__label">名前</label>
      <input type="text" class="c-form__input" id="name" v-model="profEditForm.name">
      <label for="email" class="c-form__label">メールアドレス</label>
      <input type="email" class="c-form__input" id="email" v-model="profEditForm.email">
      <label for="introduction" class="c-form__label">自己紹介文</label>
      <textarea class="c-form__textarea" id="introduction" v-model="profEditForm.introduction"></textarea>
      <div class="c-form__button">
        <button type="submit" class="c-button-right">編集する</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: 'profedit',
  data: function(){
    return {
      profEditForm: {
        icon: '',
        name: '',
        email: '',
        introduction: '',
      }
    }
  },
  methods: {
    // フォームでファイルが選択されたら実行される
    onFileChange: function(event){
      // 何も選択されていなかったら、処理中断
      if(event.target.files.length === 0){
        this.reset();
        return false;
      }
      // ファイルが画像ではなかったら、処理中断
      if(! event.target.files[0].type.match('image.*')){
        this.reset();
        return false;
      }
      // FileReaderクラスのインスタンスを取得
      const reader = new FileReader();
      // ファイルを読み込み終わったタイミングで実行する処理
      reader.onload = e => {
        // iconに読み込み結果（データURL）を代入する
        // iconに値が入ると<output>につけたv-ifがtrueと判定される
        // また<output>内部の<img>のsrc属性はiconの値を参照しているので結果として画像が表示される
        this.profEditForm.icon = e.target.result;
      }

      // ファイルを読み込む
      // 読み込まれたファイルはデータURL形式で受け取れる（上記onload参照）
      reader.readAsDataURL(event.target.files[0]);
    },
    reset: function(){
      this.profEditForm.icon = '',
      this.$el.querySelector('input[type="file"]').value = null;
    },
    profEdit: function(){
      // フォームの入力内容をコンソールに出力
      console.log('profEditForm：', this.profEditForm);
      // ストアのメソッドの操作を呼び出す
    }
  },
}
</script>