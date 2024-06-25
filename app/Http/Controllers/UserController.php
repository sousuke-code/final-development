<?php

namespace App\Http\Controllers;

use App\Models\Portfolios;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
 

use Carbon\Carbon;



class UserController extends Controller
{
    //
    function index()
    {
        return view('users.mypage');
    }


    function show($id)
    {
        // $user = User::all();

        $user =  Auth::user();
        $userId = auth()->user()->id;
        $portfolios = Portfolios::where('user_id', $userId)->get();
        

        // dd($portfolios);
        return view('users.profileshow',['portfolios'=>$portfolios, 'user'=> $user]);
    }

    function edit($id)
    {
        // $user = User::all();

        $user =  Auth::user();
        $userId = auth()->user()->id;
        $portfolios = Portfolios::where('user_id', $userId)->get();
        

        // dd($portfolios);
        return view('users.profileedit',['portfolios'=>$portfolios, 'user'=> $user]);
    }

    function update(Request $request, $id)
    {

        $user =  Auth::user();
        $userId = auth()->user()->id;
        $portfolios = Portfolios::where('user_id', $userId)->get();
       
        
        // $user -> name = auth()->user()-> name;
        // $user -> email = $request -> email;
        // $user -> save();

        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> bio = $request -> bio;
        $user -> career = $request -> career;

        
        $user -> save();
        

        // $portfolios -> name = $request -> name;
        // $portfolios -> email = $request -> email;
        // $portfolios -> bio = $request -> bio;
        // $portfolios -> languages = $request -> languages;
        // $portfolios -> learning_languages = $request -> learning_languages;
        // $portfolios -> career = $request -> career;
        // $portfolios -> save();
        

        // dd($portfolios);

        return view('users.profileshow',['portfolios'=>$portfolios,'user'=>$user]);
    }


}

