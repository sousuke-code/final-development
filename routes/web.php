<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\CompanyLoginController;
use App\Http\Controllers\Company\CompanyRegisterController;
use App\Http\Controllers\Company\CompanyController;

use Illuminate\Http\Request;

use App\Http\Controllers\GroupChatController;
use App\Http\Controllers\StudyLogsController;
use App\Http\Controllers\UserLanguages;
use App\Http\Controllers\Auth\GitHubController;
use App\Http\Controllers\GitHubProfileController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ScoutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioAdminController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\UserViewController;
use App\Models\Portfolios;

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
    return view('top');
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


// スカウト送信機能
Route::post('/companies/send-scout/{userId}', [CompanyController::class, 'sendScout'])->name('companies.sendScout');

Route::get('/users/portfolio/edit',[PortfolioController::class, 'edit'])->name('portofolio.edit');

Route::put('/users/portfolio/store', [PortfolioController::class, 'update'])
->name('portofolio.store');


Route::get('/users', [UserController::class, 'index'])->name('users.index');

// 勉強記録編集画面
Route::get('/users/{user}/study_logs', [StudyLogsController::class, 'index'])
->name('study_logs.index');
// グループ一覧
Route::get('/groups', [GroupChatController::class, 'index'])
->name('groups.index');

// プロフィール詳細画面
Route::get('/users/show/{id}', [UserController::class, 'show'])
->name('users.show');

// プロフィール編集画面
Route::get('/users/{user}/edit', [UserController::class, 'edit'])
->name('users.edit');

// プロフィール更新
Route::put('/users/{user}', [UserController::class, 'update'])
->name('users.update');

// プロフィール削除
// Route::delete('/users/{user}', [UserController::class, 'destroy'])
// ->name('users.destroy');


// ポートフォリオ編集画面
Route::get('/portfolios/{id}/edit', [PortfolioAdminController::class, 'edit'])
->name('portfolios.edit');

// ポートフォリオ更新
Route::put('/portfolios/update/{id}', [PortfolioAdminController::class, 'update'])
->name('portfolios.update');


// スカウト認証
Route::post('/scouts/{id}', [UserController::class, 'approve'])->name('scout.approve');
// スカウト拒否
Route::delete('/scouts/{scout}', [UserController::class, 'erase'])
->name('scouts.destroy');
//企業詳細
Route::get('/companies/show/{id}',[UserController::class,'companiesshow'])
->name('companies.show');



 // 検索機能
 Route::get('/users/search', [UserController::class, 'search'])->name('users.search.for.user');

// プロフィール更新
Route::put('/users/{user}', [UserController::class, 'update'])
->name('users.update');






// 企業側情報編集画面表示
Route::get('/companies/edit/{id}',[CompanyController::class,'edit'])->name('companies.edit');

// 企業側情報編集
// Route::put('/companies/{company}/update',[CompanyController::class,'update'])->name('companies.update');

Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');

// ユーザー側ユーザー検索

Route::get('/users.search', [UserController::class, 'search'])->name('users.search');








Route::middleware('auth')->group(function () {

    Route::post('/study_logs/toggle', [StudyLogsController::class, 'toggle'])->name('study_logs.toggle');
    Route::get('/study_logs/chart', [StudyLogsController::class, 'getStudyTimes'])->name('study_logs.study_times');
    Route::post('/study_logs/daily_study', [StudyLogsController::class, 'getDailyStudyData'])->name('study_logs.daily_study');
      
});



//ユーザー詳細（他企業、他ユーザーから）
Route::get('/profile/{id}/show', [UserViewController::class,'show'])->name('profile.show');

//指定ユーザーの勉強勉強記録グラフ化
Route::get('profile/{user_id}/chart', [UserViewController::class, 'getStudyTimes'])->name('study_logs.user');



//GitHub認証連携
Route::get('/oauth/github/redirect', [GitHubController::class, 'redirect'])->name('oauth.github.redirect');

Route::get('/oauth/github/callback', [GitHubController::class, 'callback']);




Route::get('/users/github', [GitHubProfileController::class, 'index'])->name('users.github');

Route::middleware(['auth'])->group(function() { 
    Route::get('/users/chat', [ChatController::class,'loadUserChats'])->name('users.chat');
    Route::post('/users/chat/messages', [ChatController::class, 'Userstore']);
});
Route::middleware(['auth:company'])->group(function () {

    Route::get('/companies/chat/', [ChatController::class,'loadCompanyChats'])->name('companies.chat');
    Route::post('/companies/chat/messages', [ChatController::class, 'Companystore']);

      // 企業側情報編集画面表示
      Route::get('/companies/{id}/edit',[CompanyController::class,'edit'])->name('companies.edit');
      // 企業側情報編集
      Route::put('/companies/{id}/update',[CompanyController::class,'update'])->name('companies.update');
      Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
      // 検索機能
      Route::get('/companies/search', [CompanyController::class, 'search'])->name('companies.search');
      
      Route::get('/companies/list', [ScoutController::class, 'index'])->name('companies.list');
});

    // ユーザーから送られてきたメッセージ企業側から通知
// Route::get('/companies', [ChatController::class, 'index'])->name('chats.index');
Route::get('/match-list', [UserController::class, 'showMatchList'])->name('match.list');
require __DIR__.'/auth.php';

