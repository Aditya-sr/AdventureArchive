<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Welcome extends Component
{   
    public $openModal = false;

    public function render()
    {
        return view('livewire.welcome');
    }

    public function openModal()
    {
     $this->openModal = true;
    }
}
