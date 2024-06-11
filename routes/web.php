<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\CompanyLoginController;
use App\Http\Controllers\Company\CompanyRegisterController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['prefix' => 'company'], function () {
    // 登録
    Route::get('register', [CompanyRegisterController::class, 'create'])
        ->name('company.register');

    Route::post('register', [CompanyRegisterController::class, 'store']);

    // ログイン
    Route::get('login', [CompanyLoginController::class, 'showLoginPage'])
        ->name('company.login');

    Route::post('login', [CompanyLoginController::class, 'login']);

    // 以下の中は認証必須のエンドポイントとなる
    Route::middleware(['auth:company'])->group(function () {
        // ダッシュボード
        Route::get('dashboard', fn() => view('company.dashboard'))
            ->name('company.dashboard');
    });
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');


require __DIR__.'/auth.php';
