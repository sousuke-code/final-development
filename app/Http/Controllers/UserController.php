<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    //
    function index()
    {
        return view('users.mypage');
    }

    function edit($id)
    {
        $user =  User::find($id);

        return view('users.profileedit',['user'=>$user]);
    }
}
