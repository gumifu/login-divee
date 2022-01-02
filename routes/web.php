<?php

use Illuminate\Support\Facades\Route;

//Logコントローラーの読み込み
use App\Http\Controllers\LogController;
//Loginコントローラーの読み込み
use App\Http\Controllers\Auth\LoginController;
//Favoriteコントローラーの読み込み
use App\Http\Controllers\FavoriteController;
//Commentコントローラーの読み込み
use App\Http\Controllers\CommentController;
//Profileコントローラーの読み込み
use App\Http\Controllers\ProfileController;

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

//ユーザー認証されていないと表示されない設定
Route::group(['middleware' => 'auth'], function () {

    //logにfavorit追加のルート
    Route::post('log/{log}/favorites', [FavoriteController::class, 'store'])->name('favorites');
    //logのfavorit解除のルート
    Route::post('log/{log}/unfavorites', [FavoriteController::class, 'destroy'])->name('unfavorites');

    //my log のルート
    Route::get('/log/mypage', [LogController::class, 'mydata'])->name('log.mypage');
    //Logコントローラーのルート
    Route::resource('log', LogController::class);

    //comment storeへのルート
    Route::post('log/{log}/comment', [CommentController::class,'store'])
    ->name('comment.store');
    //comment destroyへのルート
    Route::delete('comment/{comment}', [CommentController::class,'destroy'])
    ->name('comment.destroy');

    //Profileコントローラーのルート
    Route::resource('profile', ProfileController::class);

});//ユーザー認証ここまで


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('login/{provider}', [LoginController::class, 'redirectToProvider']);

Route::get('login/{provider}/callback', [LoginController::class, 'handleProviderCallback']);


require __DIR__.'/auth.php';
