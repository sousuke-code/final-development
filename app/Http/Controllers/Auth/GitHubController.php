<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;

class GitHubController extends Controller
{
    public function redirect()
    {

      session()->invalidate();
      session()->regenerateToken();

        // セッション情報のクリア
        session()->forget('github_user');

        return Socialite::driver('github')->stateless()->redirect();
    }

    public function callback()
    {
        $githubUser = Socialite::driver('github')->stateless()->user();

        $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ],[
            'name' => $githubUser->name ?? 'GitHub User',
            'email' => $githubUser->email,
            'password' => Str::random(40),
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);

        Auth::login($user);
        return redirect('/users');
    }
}