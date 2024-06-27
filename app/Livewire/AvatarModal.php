<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AvatarModal extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $image;
    public $profileImage;

    protected $rules = [
        'image' => 'image|max:1024', // 1MB Max
    ];

    public function mount()
    {
        $user = Auth::user();
        $this->profileImage = $user->photo ? asset('storage/' . $user->photo) : 'https://tailus.io/sources/blocks/stats-cards/preview/images/second_user.webp';
    }

    public function save()
    {
        $this->validate();

        $user = Auth::user();
        
        if($user->photo){
            Storage::delete($user->photo);
        }

        $path = $this->image->store('photo', 'public');

        $user->photo = $path;
        $user->save();

        // Save the image or perform other actions
        // Example: $this->image->store('photos');

        $this->showModal = false;
        $this->reset('image');
        session()->flash('message', 'Image successfully uploaded.');
    }

    public function render()
    {
        return view('livewire.avatar-modal');
    }
}
