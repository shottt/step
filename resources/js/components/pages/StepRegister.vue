<template>
  <main>
    <div class="l-form-container">
      <form class="c-form" accept=”image/*” @submit.prevent="stepRegister">
        <div class="c-form-1" v-if="display">
          <h2 class="c-form__title">STEP登録（1/2）</h2>
          <label for="thumbnail" class="c-form__label">サムネイル</label>
          <!-- <div class="c-form__area-drop"> -->
            <input type="file" class="c-form__input-file" id="thumbnail" @change="onFileChange">
            <output class="c-form__output" v-if="preview">
              <img :src="preview" alt="サムネイル" class="c-form__preview">
            </output>
          <!-- </div> -->
          <label for="title" class="c-form__label">タイトル</label>
          <input type="text" class="c-form__input" id="title" v-model="stepRegisterForm.title">
          <label for="category" class="c-form__label">カテゴリ</label>
          <select v-model="stepRegisterForm.category_id" name="" id="category" class="c-form__select">
            <option disabled value="">選択してください</option>
            <option v-for="category in categories" v-bind:value="category.id">
              {{ category.name }}
            </option>
          </select>
          <label for="target_time" class="c-form__label">目安時間</label>
          <input type="text" class="c-form__input" id="target_time" v-model="stepRegisterForm.target_time">
          <label for="content" class="c-form__label">内容</label>
          <textarea class="c-form__textarea" id="content" v-model="stepRegisterForm.content"></textarea>
          <div class="c-form__button">
            <button class="c-button-right" @click="isDisplay">次へ</button>
          </div>
        </div>
        <div class="c-form-2" v-else>
          <h2 class="c-form__title">STEP登録（2/2）</h2>
          <label for="title" class="c-form__label">STEP1</label>
          <input type="text" class="c-form__input" id="title" v-model="stepRegisterForm.process1">
          <label for="title" class="c-form__label">STEP2</label>
          <input type="text" class="c-form__input" id="title" v-model="stepRegisterForm.process2">
          <label for="title" class="c-form__label">STEP3</label>
          <input type="text" class="c-form__input" id="title" v-model="stepRegisterForm.process3">
          <label for="title" class="c-form__label">STEP4</label>
          <input type="text" class="c-form__input" id="title" v-model="stepRegisterForm.process4">
          <label for="title" class="c-form__label">STEP5</label>
          <input type="text" class="c-form__input" id="title" v-model="stepRegisterForm.process5">
          <div class="c-form__button">
            <button type="submit" class="c-button-right">登録する</button>
          </div>
        </div>
      </form>
    </div>
  </main>
</template>
<script>
export default {
  name: 'stepregister',
  data: function(){
    return {
      preview: '', // ライブプレビュー用（データURLが入る）
      categories: '',
      display: true,
      stepRegisterForm: {
        thumbnail: '',
        title: '',
        target_time: '',
        content: '',
        category_id: '',
      },
    }
  },
  // カテゴリデータ取得
  mounted: function(){
    axios.get('/api/categories').then((res) => {
      console.log('res.data.categories：', res.data.categories);
      this.categories = res.data.categories;
    });
  },
  computed: {
    userID: function(){
      const userData = this.$store.getters['auth/getUser'];
      return userData.id;
    },
  },
  methods: {
    // 入力フォームの表示非表示
    isDisplay: function(){
      this.display = false;
    },
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
      this.stepRegisterForm.thumbnail = event.target.files[0];
    },
    // 画像データリセット（画像データキャンセル時）
    resetFile: function(){
      this.preview = '',
      this.$el.querySelector('input[type="file"]').value = null;
    },
    // 入力データリセット
    reset: function(){
      this.resetFile();
      this.stepRegisterForm.title = '',
      this.stepRegisterForm.target_time = '',
      this.stepRegisterForm.content = ''
    },
    // ステップ登録
    stepRegister: function(){
      // フォームの入力内容をコンソールに出力
      console.log('stepRegisterForm：', this.stepRegisterForm);
      console.log('userID：', this.userID);

      const formData = new FormData();

      // フォームへの入力データを追加する
      formData.append('thumbnail', this.stepRegisterForm.thumbnail);
      formData.append('title', this.stepRegisterForm.title);
      formData.append('target_time', this.stepRegisterForm.target_time);
      formData.append('content', this.stepRegisterForm.content);
      formData.append('category_id', this.stepRegisterForm.category_id);
      formData.append('user_id', this.userID);

      console.log('formData：', formData);

      axios.post('/api/step_register', formData).then((res) => {
        if(res.data.result_flag === true){
          console.log('通信成功');
          console.log('res：', res.data);
          
          // 送信完了後に入力値をクリアする
          this.reset();
          this.$router.push('/mypage');
        }
      }).catch(err => {
        console.log('err：', err);
      });
    },
  }
}
</script>