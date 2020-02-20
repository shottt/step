<?php

namespace App\Http\Controllers\Api;

use App\Step;
use Illuminate\Http\Request;
use App\Http\Requests\StepRegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class StepsController extends Controller
{
    // STEP一覧取得
    public function steps(){
        
    }

    // STEP登録
    public function step_register(StepRegisterRequest $request){
        // post値を変数に格納
        $thumbnail = $request->thumbnail;
        $title = $request->title;
        $target_time = $request->target_time;
        $content = $request->content;
        $category_id = $request->category_id;
        $user_id = $request->user_id;

        // 異常判定
        if(empty($title)){
            return response()->json(['result_flag' => false]);
        }
        // モデルを作成して、post値を代入
        $step = new Step;
        $step->user_id = $user_id;
        $step->thumbnail = $thumbnail;
        $step->title = $title;
        $step->target_time = $target_time;
        $step->content = $content;
        $step->category_id = $category_id;

        Log::debug('process1：' .$request->process1);
        Log::debug('process2：' .$request->process2);
        Log::debug('process3：' .$request->process3);
        Log::debug('process4：' .$request->process4);
        Log::debug('process5：' .$request->process5);

        // レコードを作成する
        $result = $step->save();

        if($result){
            return response()->json(['result_flag' => true]);
        }
    }
}
