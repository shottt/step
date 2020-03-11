<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// ユーザー登録
Route::post('/register', 'Auth\RegisterController@register')->name('register');
// ログイン
Route::post('/login', 'Auth\LoginController@login')->name('login');
// ログアウト
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
// 退会
Route::post('/withdraw', 'Api\UsersController@withdraw');
// パスワード変更
Route::post('/pass_change', 'Api\UsersController@pass_change');
// プロフィール編集
Route::post('/prof_edit', 'Api\UsersController@prof_edit');

// ログインユーザー取得
Route::get('/user', function(){
    return Auth::user();
})->name('user');


// STEP登録
Route::post('/step_register', 'Api\StepsController@step_register')->name('step_register');
// STEP一覧取得
Route::get('/steplist', 'Api\StepsController@steplist')->name('steplist');
// STEP検索
Route::post('/step_search', 'Api\StepsController@step_search')->name('step_search');
// STEP詳細取得
Route::get('/step_detail', 'Api\StepsController@step_detail')->name('step_detail');
// process詳細取得
Route::get('/process_detail', 'Api\ProcessesController@process_detail')->name('process_detail');

// 登録したSTEP一覧取得
Route::get('/registered_step', 'Api\StepsController@registered_step')->name('registered_step');


// チャレンジ中のSTEP一覧取得
Route::get('/challenged_step', 'Api\ChallengesController@challenged_step')->name('challenged_step');

// カテゴリー取得
Route::get('/categories', 'Api\CategoriesController@index')->name('categories');


