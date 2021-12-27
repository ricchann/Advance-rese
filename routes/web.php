<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReserveController;


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

/* 会員登録ページ */
Route::get('/register', [AuthController::class, 'getRegister'])->name('getRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

/* サンクスページ */
Route::get('/thanks', [AuthController::class, 'thanks'])->name('thanks');

/* ログインページ */
Route::group(['middleware' => ['guest']], function(){
    Route::get('/login', [AuthController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

/* マイページ */
Route::group(['middleware' => ['auth']], function(){
    Route::get('/mypage', [UserController::class, 'index'])->name('mypage');
    Route::get('/mypage/like_off/{id}', [LikeController::class, 'mypage_like_off'])->name('mypage_like_off');
    /* ログアウト */
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    /* 飲食店予約 */
    Route::post('/done', [ReserveController::class, 'create'])->name('create');

    Route::post('/mypage', [ReserveController::class, 'delete'])->name('delete');

    /* お気に入り機能 */
    Route::get('/like_on/{id}', [LikeController::class, 'like_on'])->name('like_on');
    Route::get('/like_off/{id}', [LikeController::class, 'like_off'])->name('like_off');
});

/* 飲食店一覧ページ */
Route::get('/', [StoreController::class, 'index'])->name('home');

Route::post('/', [StoreController::class, 'search'])->name('search');

/* 飲食店詳細ページ */
Route::get('/detail/{store_id}', [StoreController::class, 'show'])->name('detail');
