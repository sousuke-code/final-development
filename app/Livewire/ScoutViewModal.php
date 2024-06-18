<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Scout;
class ScoutViewModal extends Component
{
    public $showModal = false;
    public $scouts;

    public function mount()
    {
        // scoutテーブルからデータを取得
        $this->scouts = Scout::all();
    }

    public function render()
    {
        return view('livewire.scout-view-modal', [
            'scouts' => $this->scouts,

        ]);
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
