<?php

namespace App\Http\Controllers;

use App\Models\Portfolios;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Scout;




class UserController extends Controller
{
    //
    function index()
    {
        return view('users.mypage');
    }


    function edit($id)
    {
        // $user = User::all();

        $user =  Auth::user();
        $userId = auth()->user()->id;
        $portfolios = Portfolios::where('user_id', $userId)->get();
        // $portfolio = Portfolios::all();

        // ポートフォリオのIDを指定します
        // $portfolioId = 1; // ここにポートフォリオのIDを指定してください
        // $portfolioId = $id;
        // find()メソッドを使用してポートフォリオのレコードを取得します
        // $portfolio = Portfolios::find($portfolioId);

        // 取得したポートフォリオの情報を確認します
        // if ($portfolio) {
        //     echo "ポートフォリオのタイトル: " . $portfolio->title . "<br>";
        //     echo "ポートフォリオのURL: " . $portfolio->url . "<br>";
        //     echo "ポートフォリオの写真: " . $portfolio->photo . "<br>";
        //     echo "ポートフォリオの説明: " . $portfolio->description . "<br>";
        //     echo "作成日時: " . $portfolio->created_at . "<br>";
        //     echo "更新日時: " . $portfolio->updated_at . "<br>";
        // } else {
        //     echo "指定したIDのポートフォリオが見つかりませんでした。";
        // }
        
        // dd($portfolio);
        // dd($user);
        // return view('users.profileedit',['user'=>$user]);

        // dd($portfolios);
        return view('users.profileedit',['portfolios'=>$portfolios, 'user'=> $user]);
    }

// スカウトの拒否
public function erase(Scout $scout)
{
    $scout->delete();

    return redirect()->back()->with('success', 'スカウトを削除しました。');
}
}

