<?php
namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Chat;

class Modal extends Component
{
    public $showModal = false;
    public function render()
    {
        $companyId = Auth::guard('company')->id();

        // 条件に合致するチャットデータを取得（新しい順）
        $chats = Chat::where('company_id', $companyId)
                     ->where('receiver_type', 'company')
                     ->orderBy('created_at', 'desc')
                     ->with('user')  // ユーザーリレーションシップをロード
                     ->take(5) 
                     ->get();

        // 取得したチャットデータをビューに渡す
        return view('livewire.modal', ['chats' => $chats]);
    }
    public function openModal()
    {
        $this->showModal = true;
    }
 
    public function closeModal()
    {
        $this->showModal = false;
    }
}
