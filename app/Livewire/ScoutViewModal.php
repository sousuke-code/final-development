<?php

namespace App\Livewire;

use Livewire\Component;

class ScoutViewModal extends Component
{
    public $showModal = false;
 
    public function render()
    {
        return view('livewire.scout-view-modal');
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
