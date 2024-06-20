<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;


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

<<<<<<< Updated upstream
=======

// 1.開始日時を設定
$startnow = new Carbon('');

// 2.終了日時を設定
$endnow = new Carbon('');

// 3.差分の秒数を計算
$diffInSeconds = $startnow->diffInSeconds($endnow);

// 4.秒数から時間、分、秒を計算
$hours = floor($diffInSeconds / 3600);
$minutes = floor(($diffInSeconds % 3600) / 60);

// 5.結果を表示
echo "" . $hours . "時間" . $minutes . "分" ;

>>>>>>> Stashed changes
