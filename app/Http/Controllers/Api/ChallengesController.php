<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Challenge;

use Illuminate\Support\Facades\Log;


class ChallengesController extends Controller
{
    //チャレンジ中のSTEP一覧を取得する
    public function challenged_step(Request $request){
        
    }

    // チャレンジ情報を登録する
    public function challenge(Request $request){
        // post値を変数に格納
        $step_id = $request->step_id;
        $user_id = $request->user_id;

        Log::debug('step_id：' . $step_id);
        Log::debug('user_id：' . $user_id);

        // 異常判定
        if(empty($step_id || $user_id)){
            return response()->json(['result_flag' => false]);
        }

        $challenge = new Challenge;
        $challenge->step_id = $step_id;
        $challenge->user_id = $user_id;
        $result = $challenge->save();
        $challenge_id = $challenge->id;
        Log::debug('challenge_id：' . $challenge_id);

        if($result){
            return response()->json(['challenge_id' =>$challenge_id, 'result_flag' => true]);
        }



    }
}
