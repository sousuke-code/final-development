<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolios;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function edit()
    {
        return view('users.portfolio-register');

    }
    
    public function update(Request $request)
    {
        $dir = 'img';
        $user = Auth::user();
        $userId = auth()->user()->id;
        $file = $request->file('file');
        $path = $file->store('img', 'public');
        Portfolios::create([
            'user_id' => $userId,
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
            'photo' => $path
        ]);

        $portfolios = Portfolios::where('user_id', $userId)->get();

        return redirect()->route('users.show', ['user' => $userId]);

    }
}
