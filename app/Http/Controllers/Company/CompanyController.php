<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
// use App\Http\Controllers\Company\{image};


class CompanyController extends Controller
{
    public function index()
    {
        return view('company.profile');
    }

    // 編集画面の表示
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('company.edit', ['company' => $company]);
    }

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
            $company->image = 'images/'.$filename;
            // $inputs[‘image’]=request(‘image’)->storeAs('public/images',$filename);

            // $company->create($inputs);

        }
        // 保存
        $company->save();
        // 更新後にリダイレクト
        return redirect()->route('companies.index')->with('success', '更新が成功しました。');
    }
}
