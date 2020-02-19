<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index(){
        // DBからカテゴリーデータを取得する
        $categories = Category::get(); // nameとidだけ取得してセットする

        return response()->json(['categories' => $categories]);
    }
}
