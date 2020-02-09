<template>
  <div class="l-form-container">
    <form class="c-form" accept=”image/*” @submit.prevent="profEdit">
      <h2 class="c-form__title">プロフィール編集</h2>
      <label for="icon" class="c-form__label">アイコン画像</label>
      <!-- <div class="c-form__area-drop"> -->
        <input type="file" class="c-form__input-file" id="icon" @change="onFileChange">
        <output class="c-form__output" v-if="preview">
          <img :src="preview" alt="アイコン" class="c-form__preview">
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
      preview: '', // ライブプレビュー用（データURLが入る）
      profEditForm: {
        icon: '',
        name: '',
        email: '',
        introduction: '',
      }
    }
  },
  computed: {
    userID: function(){
      const userData = this.$store.getters['auth/getUser'];
      return userData.id;
    }
  },
  methods: {
    // ライブプレビュー機能
    onFileChange: function(event){
      // 何も選択されていなかったら、処理中断
      if(event.target.files.length === 0){
        this.resetFile();
        return false;
      }
      // ファイルが画像ではなかったら、処理中断
      if(! event.target.files[0].type.match('image.*')){
        this.resetFile();
        return false;
      }
      // FileReaderクラスのインスタンスを取得
      const reader = new FileReader();
      // ファイルを読み込み後のタイミングで実行する処理
      reader.onload = e => {
        // ロード時の各種情報はonloadの引数に格納される
        // ロードされた画像ファイルのデータURLはe.target.resultに格納される
        // previewに読み込み結果（データURL）を代入する
        this.preview = e.target.result;
        // previewに値が入ると<output>につけたv-ifがtrueと判定される
        // また<output>内部の<img>のsrc属性はpreviewの値を参照しているので結果として画像が表示される
      }
      // ファイルを読み込む
      // 読み込まれたファイルはデータURL形式で受け取れる（上記onload参照）
      reader.readAsDataURL(event.target.files[0]);
      // ユーザーのアップロードデータをiconにいれる
      this.profEditForm.icon = event.target.files[0];
    },
    // 画像データリセット（画像データキャンセル時）
    resetFile: function(){
      this.preview = '',
      this.$el.querySelector('input[type="file"]').value = null;
    },
    // 入力データリセット
    reset: function(){
      this.resetFile();
      this.profEditForm.name = '',
      this.profEditForm.email = '',
      this.profEditForm.introduction = ''
    },
    // プロフィール編集
    profEdit: function(){
      // フォームの入力内容をコンソールに出力
      console.log('profEditForm：', this.profEditForm);
      console.log('userID：', this.userID);

      const formData = new FormData();

      // フォームへの入力データを追加する
      formData.append('icon', this.profEditForm.icon);
      formData.append('name', this.profEditForm.name);
      formData.append('email', this.profEditForm.email);
      formData.append('introduction', this.profEditForm.introduction);
      formData.append('id', this.userID);

      console.log('formData：', formData);
      
      axios.post('/api/prof_edit', formData).then((res) => {
        if(res.data.result_flg === true){
          console.log('通信成功');
        // 送信完了後に入力値をクリアする
          this.reset();
          this.$router.push('/mypage');
        }
      }).catch(err => {
        console.log('err：', err);
      });

    }
  },
}
</script>