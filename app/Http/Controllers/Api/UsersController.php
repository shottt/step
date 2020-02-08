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
    public function prof_edit(Request $request){

        // バリデーション
        // $this->validate($request, );

        // post値を変数に格納
        $icon = $request->icon;
        $name = $request->name;
        $introduction = $request->introduction;
        $id = $request->id;

        // Log::debug('uploadImg：' . $uploadImg);
        Log::debug('id：' . $id);
        Log::debug('name：' . $name);
        Log::debug('introduction：' . $introduction);

        // 編集するユーザー情報を取得する
        $user = User::Where('id', $id)->where('delete_flg', 0)->first();
        Log::debug($user);

        // 画像がアップロードできているか確認し、ファイル名をUserインスタンスのプロパティにセット
        // if($icon->isValid()){
        //     $filePath = $icon->store('public');
        //     // str_replace関数で$filePathからファイル名を取り出し、変数に格納
        //     $fileName = str_replace('public/', '', $filePath);
        // }
        // Log::debug($filePath);
        // Log::debug($fileName);

        // DBに保存する
        // $user->icon->$fileName;
        $user->name = $name;
        $user->introduction = $introduction;
        $user->save();


        // return response()->json([]);
    }
}
