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

        Log::debug('s_id：' . $request->input('p_id'));
        $process_id = (int)$request->input('p_id');



    }
}
