<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservation;

class RoomReservations extends Component
{
    public function render()
    {
        $reservations = Reservation::where(function ($query) {
            $query->where('from', '>=', today())
                ->orWhere('to', '>=', today());
        })
            ->orderBy('from')->get();
        return view('livewire.room-reservations', compact('reservations'));
    }
}
