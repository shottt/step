<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
// パスワードリセットメール送信フォーム表示
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// パスワードリセットフォーム処理
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');



// API以外のリクエストに対してはindexテンプレートを返す
// 画面遷移はフロントエンドのVueRouterが制御する
Route::get('/{any}', function(){
    return view('index');
})->where('any', '.*');

// Route::get('/home', 'HomeController@index')->name('home');
