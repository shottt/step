<?php

namespace App\Http\Controllers\Api;

use App\Step;
use Illuminate\Http\Request;
use App\Http\Requests\StepRegisterRequest;
use App\Http\Controllers\Controller;
use App\Process;
use Illuminate\Support\Facades\Log;

class StepsController extends Controller
{
    // STEP一覧取得
    public function steplist(){
        
        // STEP一覧取得
        $steplist = Step::withCount('favorites')->withCount('challenges')->get();
        

        Log::debug('steplist：' . $steplist);

        if($steplist){
            return response()->json(['steplist' => $steplist, 'result_flag' => true]);
        }
    }

    // STEP検索
    public function step_search(Request $request){

        $category_id = $request->category_id;
        $sort = $request->sort;

        Log::debug('category_id：' . $category_id);
        Log::debug('sort：' . $sort);

        // レコードを検索する(withCount使う)
        if($sort == 0){
            $steplist = Step::withCount('favorites')->withCount('challenges')->Where('category_id', $category_id)
                            ->orderBy('created_at', 'desc')->get();
        }else{
            $steplist = Step::withCount('favorites')->withCount('challenges')->Where('category_id', $category_id)
                            ->orderBy('created_at', 'asc')->get();
        }

        Log::debug('steplist：' . $steplist);
        if($steplist){
            return response()->json(['steplist' => $steplist, 'result_flag' => true]);
        }
    }

    // STEP登録
    public function step_register(StepRegisterRequest $request){
        // post値を変数に格納
        $thumbnail = $request->thumbnail;
        $title = $request->title;
        $target_time = $request->target_time;
        $overview = $request->overview;
        $category_id = $request->category_id;
        $user_id = $request->user_id;

        $item1 = $request->item1;
        $item2 = $request->item2;
        $item3 = $request->item3;
        $item4 = $request->item4;
        $item5 = $request->item5;
        $detail1 = $request->detail1;
        $detail2 = $request->detail2;
        $detail3 = $request->detail3;
        $detail4 = $request->detail4;
        $detail5 = $request->detail5;

        Log::debug('item1：' .$item1);

        // 異常判定
        if(empty($title)){
            return response()->json(['result_flag' => false]);
        }

        // 画像がアップロードできているか確認
        if($thumbnail->isValid()){
            // storage/app/public配下に画像を保存し、パスを変数に格納
            $filePath = $thumbnail->store('public');
            // str_replace関数で$filePathからファイル名を取り出し、変数に格納
            $fileName = str_replace('public/', 'storage/', $filePath);
        }
        Log::debug('item2：' .$item2);
        Log::debug('detail5：' .$detail5);

        // STEPデータをstepsテーブルに保存
        $step = new Step;
        $step->user_id = $user_id;
        $step->thumbnail = $fileName;
        $step->title = $title;
        $step->target_time = $target_time;
        $step->overview = $overview;
        $step->category_id = $category_id;
        $result1 = $step->save();
        $step_id = $step->id;

        Log::debug('step_id：' .$step_id);

        // 子STEPデータをprocessesテーブルに保存
        $process1 = new Process;
        $process1->step_id = $step_id;
        $process1->item = $item1;
        $process1->detail = $detail1;
        $process2 = new Process;
        $process2->step_id = $step_id;
        $process2->item = $item2;
        $process2->detail = $detail2;
        $process3 = new Process;
        $process3->step_id = $step_id;
        $process3->item = $item3;
        $process3->detail = $detail3;
        $process4 = new Process;
        $process4->step_id = $step_id;
        $process4->item = $item4;
        $process4->detail = $detail4;
        $process5 = new Process;
        $process5->step_id = $step_id;
        $process5->item = $item5;
        $process5->detail = $detail5;

        // レコードを作成する
        $result2 = $process1->save();
        $result3 = $process2->save();
        $result4 = $process3->save();
        $result5 = $process4->save();
        $result6 = $process5->save();

        if($result1 && $result2 && $result3 && $result4 && $result5 && $result6){
            return response()->json(['result_flag' => true]);
        }
    }
}
