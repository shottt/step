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

// パスワードリマインダー
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

// ログインユーザー取得
Route::get('/user', function(){
    return Auth::user();
})->name('user');

// プロフィール編集
Route::post('/prof_edit', 'Api\UsersController@prof_edit');

// STEP一覧取得
Route::get('/steps', 'Api\StepsController@index')->name('steps');


