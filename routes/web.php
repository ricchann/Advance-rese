<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;


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

Route::get('/register', [AuthController::class, 'getRegister'])->name('getRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/thanks', [AuthController::class, 'thanks'])->name('thanks');

Route::group(['middleware' => ['guest']], function(){
    Route::get('/login', [AuthController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/mypage', [UserController::class, 'index'])->name('mypage');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', [StoreController::class, 'index'])->name('home');
Route::get('/detail/{store_id}', [StoreController::class, 'show']);
