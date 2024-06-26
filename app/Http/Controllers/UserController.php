<?php

namespace App\Http\Controllers;

use App\Models\Portfolios;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
 

use Carbon\Carbon;
use App\Models\ProgrammingLanguage;
use App\Models\UserLanguages;
use App\Models\Scout;



class UserController extends Controller
{
    //
    function index()


    {


        $user = Auth::user();
        $activeLog = UserLanguages::where('user_id', $user->id)
        ->whereNull('end_time')
        ->first();


       $languages = ProgrammingLanguage::all();

        return view('users.mypage', compact('languages','activeLog'));
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
       
        
        

        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> bio = $request -> bio;
        $user -> career = $request -> career;

        
        $user -> save();
    

        return view('users.profileshow',['portfolios'=>$portfolios,'user'=>$user]);
    }


public function deleteSelected(Request $request, $id)
{
    // ユーザーを取得
    $user = User::findOrFail($id);

    // リクエストから削除対象の項目を取得し、それぞれ削除する
    if ($request->has('delete_name')) {
        $user->name = null;
    }
    if ($request->has('delete_email')) {
        $user->email = null;
    }
    if ($request->has('delete_bio')) {
        $user->bio = null;
    }
    if ($request->has('delete_career')) {
        $user->career = null;
    }

    // ユーザー情報を保存
    $user->save();

    // 削除後にリダイレクト
    return redirect()->route('users.show', $user->id)->with('success', '選択された項目を削除しました');
}





// スカウトの拒否
public function erase(Scout $scout)
{
    $scout->delete();

    return redirect()->back()->with('success', 'スカウトを削除しました。');
}

// スカウトの認証
public function approve($id)
{
    // $idに対応するScoutモデルを取得
    $scout = Scout::findOrFail($id);

    // conditionをfalseに設定
    $scout->condition = true;
    $scout->save();


    // 成功したらリダイレクトやレスポンスを返すなど適切な処理を行う
    return redirect()->back()->with('success', 'Scoutの承認が完了しました');
}


}

