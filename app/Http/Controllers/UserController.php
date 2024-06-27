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
use App\Models\Company;



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

        return view('users.mypage', compact('languages','activeLog', 'user'));
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
        $user =  Auth::user();
        $userId = auth()->user()->id;
        $portfolios = Portfolios::where('user_id', $userId)->get();
        

        // dd($portfolios);
        return view('users.profileedit',['portfolios'=>$portfolios, 'user'=> $user]);
    }


        public function companiesshow($id) 
        {
            $company = Company::findOrFail($id);
            return view('users.companydetail',['company'=>$company]);
        }   
    
// スカウトの拒否d
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
        $user -> save();

        return view('users.profileshow',['portfolios'=>$portfolios, 'user'=> $user]);
    }

 

    public function destroy($id){
    // 現在ログインしているユーザーを取得
    $user = Auth::user();

    // ユーザー情報を空にして保存
    $user->name = null;
    $user->email = null;
    $user->bio = null;
    $user->career = null;
    $user->save();

    // プロフィール表示ページにリダイレクト
    return redirect()->route('users.show',$user->id);
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

// 検索機能
public function search(Request $request)
{
    $languageId = $request->input('language');
    $languages = ProgrammingLanguage::all();
    
    $query = User::query();

    if (!empty($languageId)) {
        $query->whereHas('userLanguages', function($q) use ($languageId) {
            $q->whereHas('programmingLanguage', function($q) use ($languageId) {
                $q->where('id', $languageId);
            });
        });
    }

    $users = $query->get();
    return view('users.search', compact('languages', 'users'));


}

// ユーザコントローラー
public function showMatchList()
{
    // ログイン中のユーザーを取得
    $user = Auth::user();

    // 条件に一致するscoutデータを取得し、関連するcompaniesテーブルのデータを取得
    $matches = Scout::where('user_id', $user->id)
                    ->where('condition', true)
                    ->with('company') // Scoutモデルのcompanyリレーションを事前にロード
                    ->get();

    // ビューにデータを渡す
    return view('users.match_list', compact('matches'));
}

}