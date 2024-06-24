<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{


    public function loadUserChats(){
        $userId = Auth::id();
        $companyId = 1;

        $chats = Chat::where('user_id', $userId)
                     ->where('company_id', $companyId)
                     ->get();
        return view('user-chat-page', compact('chats', 'companyId', 'userId'));

    }


    public function Userstore(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required|string|max:255',
            'company_id' => 'required|integer',
        ]);

        $message = Chat::create([
            'message' => $validatedData['message'],
            'user_id' => Auth::id(),
            'company_id' => $validatedData['company_id'],
            'sender_type' => 'user',
            'receiver_type' => 'company',
        ]);

        return response()->json(['status' => 'メッセージが正常に保存されました！']);
    }

    public function loadCompanyChats(Request $request){
        // リクエストからidパラメータを取得
        $userId = $request->input('id');
        
        // ユーザー情報を取得
        $user = User::find($userId);
        
        // 認証された会社のIDを取得
        $companyId = Auth::guard('company')->id();
    
        // チャットメッセージを取得
        $chats = Chat::where('user_id', $userId)
                     ->where('company_id', $companyId)
                     ->get();
    
        // ビューにデータを渡して表示
        return view('company-chat-page', compact('chats', 'userId', 'companyId', 'user'));
    }
    


    public function Companystore(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required|string|max:255',
            'user_id' => 'required|integer',
            
        ]);

        $message = Chat::create([
            'message' => $validatedData['message'],
            'user_id' => $validatedData['user_id'],
            'company_id' =>Auth::guard('company')->id(),
            'sender_type' => 'company',
            'receiver_type' => 'user',
        ]);

        return response()->json(['status' => 'メッセージが正常に保存されました！']);
    }



}
