<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\CompanyLoginController;
use App\Http\Controllers\Company\CompanyRegisterController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\GroupChatController;
use App\Http\Controllers\StudyLogsController;
use App\Http\Controllers\UserLanguages;





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

Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');


Route::get('/users', [UserController::class, 'index'])->name('users.index');

// 勉強記録編集画面
Route::get('/users/{user}/study_logs', [StudyLogsController::class, 'index'])
->name('study_logs.index');
// グループ一覧
Route::get('/groups', [GroupChatController::class, 'index'])
->name('groups.index');
// プロフィール編集画面
Route::get('/users/{user}/edit', [UserController::class, 'edit'])//多分グループでの括りがないからエラーになる
->name('users.edit');





Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');


// 企業側情報編集画面表示
Route::get('/companies/{company}/edit',[CompanyController::class,'edit'])->name('companies.edit');
// 企業側情報編集
// Route::put('/companies/{company}/update',[CompanyController::class,'update'])->name('companies.update');

Route::middleware('auth')->group(function () {
    Route::get('/study_logs', [StudyLogsController::class, 'index'])->name('study_logs.index');
    Route::post('/study_logs/start', [StudyLogsController::class, 'start'])->name('study_logs.start');
    Route::post('/study_logs/stop', [StudyLogsController::class, 'stop'])->name('study_logs.stop');
});


require __DIR__.'/auth.php';
