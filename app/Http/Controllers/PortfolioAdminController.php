<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolios;

class PortfolioAdminController extends Controller
{

    public function edit($portfolioId)
    {
        // データベースからポートフォリオレコードを取得
        $portfolio = Portfolios::findOrFail($portfolioId);
    
        // 編集フォームを表示するビューを返す
        return view('users.portfiloadmin', compact('portfolio'));
    }
    


    public function update(Request $request, $id)
{

    // 既存のポートフォリオレコードを取得
    $portfolio = Portfolios::findOrFail($id);

    // ファイルがアップロードされた場合は新しい画像を保存
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $path = $file->store('img', 'public');
        // 古い画像を削除するなどの処理が必要であれば、ここに追加します
        $portfolio->photo = $path;
    }

    // ポートフォリオの他のフィールドを更新
    $portfolio->title = $request->title;
    $portfolio->url = $request->url;
    $portfolio->description = $request->description;

    // ポートフォリオを保存
    $portfolio->save();

    // 更新後、ユーザーのプロフィール表示ページにリダイレクト
    $userId = auth()->user()->id;
    return redirect()->route('users.show', ['id' => $userId]);
}

}
