<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

// 書き換える
    public function loadUserChats(Request $request){
        $userId = Auth::id();
        $companyId = $request->input('id');
        $company = User::find($companyId);
        $chats = Chat::where('user_id', $userId)
                     ->where('company_id', $companyId)
                     ->get();
        return view('user-chat-page', compact('chats', 'companyId', 'userId', 'company'));

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
        $userId = $request->input('id');
        $user = User::find($userId);
        $companyId = Auth::guard('company')->id();
        $chats = Chat::where('user_id', $userId)
                     ->where('company_id', $companyId)
                     ->get();
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
