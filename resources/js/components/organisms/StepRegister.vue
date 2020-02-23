<template>
  <main>
    <div class="l-form-container">
      <form class="c-form" accept=”image/*” @submit.prevent="stepRegister">
        <div v-if="display" class="c-form-1">
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
          <label for="overview" class="c-form__label">概要（191文字以下）</label>
          <textarea class="c-form__textarea" id="overview" v-model="stepRegisterForm.overview"></textarea>
          <div class="c-form__button">
            <button type="button" class="c-button-right" @click="isDisplay">次へ</button>
          </div>
        </div>
        <div v-else class="c-form-2">
          <h2 class="c-form__title">STEP登録（2/2）</h2>
          <label for="item1" class="c-form__label">STEP1</label>
          <input type="text" class="c-form__input" id="item1" v-model="stepRegisterForm.item1">
          <label for="detail1" class="c-form__label">STEP1詳細（191文字以下）</label>
          <textarea class="c-form__textarea" id="detail1" v-model="stepRegisterForm.detail1"></textarea>
          <label for="item2" class="c-form__label">STEP2</label>
          <input type="text" class="c-form__input" id="item2" v-model="stepRegisterForm.item2">
          <label for="detail2" class="c-form__label">STEP2詳細（191文字以下）</label>
          <textarea class="c-form__textarea" id="detail2" v-model="stepRegisterForm.detail2"></textarea>
          <label for="item3" class="c-form__label">STEP3</label>
          <input type="text" class="c-form__input" id="item3" v-model="stepRegisterForm.item3">
          <label for="detail3" class="c-form__label">STEP3詳細（191文字以下）</label>
          <textarea class="c-form__textarea" id="detail3" v-model="stepRegisterForm.detail3"></textarea>
          <label for="item4" class="c-form__label">STEP4</label>
          <input type="text" class="c-form__input" id="item4" v-model="stepRegisterForm.item4">
          <label for="detail4" class="c-form__label">STEP4詳細（191文字以下）</label>
          <textarea class="c-form__textarea" id="detail4" v-model="stepRegisterForm.detail4"></textarea>
          <label for="item5" class="c-form__label">STEP5</label>
          <input type="text" class="c-form__input" id="item5" v-model="stepRegisterForm.item5">
          <label for="detail5" class="c-form__label">STEP5詳細（191文字以下）</label>
          <textarea class="c-form__textarea" id="detail5" v-model="stepRegisterForm.detail5"></textarea>
          <div class="c-form__button">
            <button type="button" class="c-button-left" @click="isDisplay">前へ</button>
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
        overview: '',
        category_id: '',
        // 以下は子STEPのパラメータ
        item1: '',
        item2: '',
        item3: '',
        item4: '',
        item5: '',
        detail1: '',
        detail2: '',
        detail3: '',
        detail4: '',
        detail5: '',
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
    // 入力フォームの表示エリア切替
    isDisplay: function(){
      if(this.display === true){
        return this.display = false;
      }else{
        return this.display = true;
      }
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
      this.stepRegisterForm.overview = '',
      this.stepRegisterForm.item1 = '',
      this.stepRegisterForm.item2 = '',
      this.stepRegisterForm.item3 = '',
      this.stepRegisterForm.item4 = '',
      this.stepRegisterForm.item5 = ''
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
      formData.append('overview', this.stepRegisterForm.overview);
      formData.append('category_id', this.stepRegisterForm.category_id);
      formData.append('item1', this.stepRegisterForm.item1);
      formData.append('item2', this.stepRegisterForm.item2);
      formData.append('item3', this.stepRegisterForm.item3);
      formData.append('item4', this.stepRegisterForm.item4);
      formData.append('item5', this.stepRegisterForm.item5);
      formData.append('detail1', this.stepRegisterForm.detail1);
      formData.append('detail2', this.stepRegisterForm.detail2);
      formData.append('detail3', this.stepRegisterForm.detail3);
      formData.append('detail4', this.stepRegisterForm.detail4);
      formData.append('detail5', this.stepRegisterForm.detail5);
      formData.append('user_id', this.userID);

      console.log('item1：', formData.get('item1'));
      console.log('detail1：', formData.get('detail1'));

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