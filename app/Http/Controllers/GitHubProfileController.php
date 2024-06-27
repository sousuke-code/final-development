<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;




class GitHubProfileController extends Controller
{
    public function index()
    {
        $githubToken = auth()->user()->github_token;
        $githubUser = Socialite::driver('github')->userFromToken($githubToken);

        $response = Http::withToken($githubToken)->get('https://api.github.com/user/repos');

        $respositories = $response->json();

        $languages = [];

        foreach ($respositories as $repo) {
            $repoLanguagesResponse = Http::withToken($githubToken)->get($repo['languages_url']);
            $repoLanguages = $repoLanguagesResponse->json();

            foreach ($repoLanguages as $language => $bytes){
                if (isset($languages[$language])){
                    $languages[$language] += $bytes;
                }else {
                    $languages[$language] = $bytes;
                }
            }
        }

        $totalBytes = array_sum($languages);

        $languagePercentages = [];
        foreach ($languages as $language => $bytes) {
            $languagePercentages[$language] = ($bytes / $totalBytes) * 100;
        }

        return view('users.github', [
            'user' => auth()->user(),
            'github_user' => $githubUser,
            'repositories' => $respositories,
            'languagePercentages' => $languagePercentages,
            ]);
    }

    public function show($id)
    {
        $user =  User::findOrFail($id);
        $githubToken =  $user->github_token;
        $githubUser = Socialite::driver('github')->userFromToken($githubToken);

        $response = Http::withToken($githubToken)->get('https://api.github.com/user/repos');


        $respositories = $response->json();

        $languages = [];

        foreach ($respositories as $repo) {
            $repoLanguagesResponse = Http::withToken($githubToken)->get($repo['languages_url']);
            $repoLanguages = $repoLanguagesResponse->json();

            foreach ($repoLanguages as $language => $bytes){
                if (isset($languages[$language])){
                    $languages[$language] += $bytes;
                }else {
                    $languages[$language] = $bytes;
                }
            }
        }

        $totalBytes = array_sum($languages);

        $languagePercentages = [];
        foreach ($languages as $language => $bytes) {
            $languagePercentages[$language] = ($bytes / $totalBytes) * 100;
        }

        return view('users.user-github', [
            'user' => $user,
            'github_user' => $githubUser,
            'repositories' => $respositories,
            'languagePercentages' => $languagePercentages,
            ]);
    }
    
}
