<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Process;
use Illuminate\Support\Facades\Log;


class ProcessesController extends Controller
{
    // Process詳細取得
    public function process_detail(Request $request){

        Log::debug('p_id：' . $request->input('p_id'));
        // クエリパラメータ（process_idをintにキャストして変数に格納）
        $process_id = (int)$request->input('p_id');

        // process詳細情報を取得
        $process = Process::find($process_id)->select('item', 'detail', 'step_id')->first();

        // 異常判定
        if(empty($process)){
            return response()->json(['result_flag' => false]);
        }

        return response()->json(['process' => $process, 'result_flag' => true]);

    }
}
