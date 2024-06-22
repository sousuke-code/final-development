<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;

use App\Models\User;
use App\Models\UserLanguages;
use App\Models\ProgrammingLanguage;

// use App\Http\Controllers\Company\{image};



class CompanyController extends Controller
{
    public function index(Request $request)
    {
        return view('company.profile');
    }

    // 編集画面の表示
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('company.edit', ['company' => $company]);
    }
    public function search(Request $request)
    {
        $language = $request->input('language');


        $query = User::query();

        if ($language !== 'All') {
            $query->whereHas('userLanguages', function($q) use ($language) {
                $q->where('programming_language', $language);
            });
        }

      


        $users = $query->get();

        return view('company.search_results', ['users' => $users]);

      
    public function update(Request $request, $id)
    {
        // バリデーションルール
        $request->validate([
            'name' => 'max:50',
            'address' => 'max:255',
            'email' => 'max:255',
            'body' => 'max:500',
            'image' => 'image|max:1024', 
            'employees' => 'max:255',
            'age' => 'max:50',
            'year' => 'max:50',
            'capital' => 'max:255',
            'salary' => 'max:255',
            'working' => 'max:255',
            'holiday' => 'max:255',
            'welfare' => 'max:255',
            'access' => 'max:255',
        ]);



        // 該当する会社を取得
        $company = Company::findOrFail($id);


        // フォームのデータを会社モデルに適用
        $company->update($request->all());

        // 画像ファイルの保存処理
        if (request('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $filename);
            $company->image = 'images/'.$filename;// 画像の場所を保存
        }
        
        // 保存
        $company->save();
        // 更新後にリダイレクト
        return redirect()->route('companies.index')->with('success', '更新が成功しました。');

    }
}

    

