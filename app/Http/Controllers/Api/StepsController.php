<?php

namespace App\Http\Controllers\Api;

use App\Step;
use Illuminate\Http\Request;
use App\Http\Requests\StepRegisterRequest;
use App\Http\Controllers\Controller;

class StepsController extends Controller
{
    // STEP一覧取得
    public function steps(){
        
    }

    // STEP登録
    public function step_register(StepRegisterRequest $request){
        // post値を変数に格納
        $thumnail = $request->thumnail;
        $title = $request->title;
        $target_time = $request->target_time;
        $content = $request->content;
        $id = $request->id;

        // 異常判定
        if(empty($title)){
            return response()->json(['result_flag' => false]);
        }
        // モデルを作成して、post値を代入
        $step = new Step;
        $step->user_id = $id;
        $step->thumnail = $thumnail;
        $step->title = $title;
        $step->target_time = $target_time;
        $step->content = $content;

        // レコードを作成する
        $result = $step->save();

        if($result){
            return response()->json(['result_flag' => true]);
        }
    }
}
