<?php

namespace App\Livewire;

use App\Models\Room as ModelRoom;
use Livewire\Component;

class Room extends Component
{
    public function render()
    {
        $rooms = ModelRoom::get();
        return view('livewire.room', compact('rooms'));
    }
}
