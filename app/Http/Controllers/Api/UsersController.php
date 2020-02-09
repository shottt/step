<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    // ユーザー情報の編集
    public function prof_edit(ProfileRequest $request){

        // post値を変数に格納
        $icon = $request->icon;
        $name = $request->name;
        $introduction = $request->introduction;
        $id = $request->id;

        Log::debug('icon：' . $icon);
        Log::debug('id：' . $id);
        Log::debug('name：' . $name);
        Log::debug('introduction：' . $introduction);

        // 編集するユーザー情報を取得する
        $user = User::Where('id', $id)->where('delete_flg', 0)->first();
        Log::debug($user);

        // 画像がアップロードできているか確認
        if($icon->isValid()){
          // storage/app/public配下に画像を保存し、パスを変数に格納
            $filePath = $icon->store('public');
            // str_replace関数で$filePathからファイル名を取り出し、変数に格納
            $fileName = str_replace('public/', 'storage/', $filePath);
        }
        Log::debug($filePath);
        Log::debug($fileName);

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
            $user = User::Where('id', $id)->where('delete_flg', 0)->select('icon', 'name', 'introduction')->first();
            return response()->json(['user' => $user, 'result_flg' => true]);
        }

    }
}
