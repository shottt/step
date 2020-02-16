<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    // ユーザー情報の更新
    public function prof_edit(ProfileRequest $request){
        // post値を変数に格納
        $icon = $request->icon;
        $name = $request->name;
        $introduction = $request->introduction;
        $id = $request->id;

        // 編集するユーザー情報を取得する
        $user = User::Where('id', $id)->where('delete_flag', 0)->first();

        // 異常判定
        if(empty($user)){
          return response()->json(['result_flag' => false]);
        }

        // 画像がアップロードできているか確認
        if($icon->isValid()){
          // storage/app/public配下に画像を保存し、パスを変数に格納
            $filePath = $icon->store('public');
            // str_replace関数で$filePathからファイル名を取り出し、変数に格納
            $fileName = str_replace('public/', 'storage/', $filePath);
        }

        // 値をセットする
        if(!empty($fileName)){
          $user->icon = $fileName;
        }
        if(!empty($name)){
          $user->name = $name;
        }
        if(!empty($introduction)){
          $user->introduction = $introduction;
        }
        // DBに保存する
        $result = $user->save();
        
        if($result){
            // 編集したユーザーデータを取得（更新後の画面を表示するため）
            $user = User::Where('id', $id)->where('delete_flag', 0)->select('icon', 'name', 'introduction')->first();
            return response()->json(['user' => $user, 'result_flag' => true]);
        }
    }
    // ユーザーの退会
    public function withdraw(Request $request){
      // ユーザーIDを変数に格納
      $id = Auth::id();
      Log::debug('id：' . $id);

      // 異常判定
      if(empty($id)){
        return response()->json(['result_flag' => false]);
      }

      // 退会するユーザーの情報を取得
      $user = User::find($id);
      Log::debug('user：' . $user);
      // ユーザー情報更新
      $user->delete_flag = 1;

      // DBに保存する
      $result = $user->save();

      if($result){
        return response()->json(['result_flag' => true]);
      }
    }
}
