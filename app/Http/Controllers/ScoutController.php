<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scout;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\User;

class ScoutController extends Controller
{
    public function index()
    {
        $id = Auth::guard('company')->id();
        $lists = Scout::where('condition', '=', 1)->where('company_id', $id)->get();
        // dd($lists);
        $users = [];
        foreach ($lists as $list) {
            $user = User::find($list->user_id); // find()を使用してユーザーを取得
            if ($user) {
                $users[] = $user; // ユーザーを配列に追加
            }
        }

        // $user_id = User::where('id', $users);



        return view('company.list', compact('users'));
    }
}
