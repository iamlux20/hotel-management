<?php

namespace App\Livewire;

use App\Models\Reservation as ModelsReservation;
use App\Models\Room;
use Livewire\Component;

class Reservation extends Component
{
    public $firstName, $lastName, $email, $selectedRoom, $from, $to;
    public $availableRooms;

    public function render()
    {
        $rooms = Room::select(['name'])->get();
        return view('livewire.reservation', compact('rooms'));
    }

    public function search()
    {
        $this->availableRooms = Room::with('reservations')->get();
    }

    public function reserve($selectedRoom)
    {
        $this->reset([
            'firstName',
            'lastName',
            'email'
        ]);
        $this->selectedRoom = Room::find($selectedRoom);
        $this->dispatch('show-info-modal');
    }

    public function store()
    {
        $validated = $this->validate([
            'firstName' => ['required'],
            'lastName' => ['required'],
            'email' => ['required', 'email'],
            'selectedRoom' => ['required'],
            'from' => ['required'],
            'to' => ['required'],
        ]);

        $checkIfEventInBetween = ModelsReservation::where('id', $this->selectedRoom)->where(function ($query) {
            $query->whereBetween('from', [$this->from, $this->to])
                ->orWhereBetween('to', [$this->from, $this->to]);
        })->count();

        if ($checkIfEventInBetween > 0) {
            $this->addError('from', 'Date is reserved for other guest. Select another date');
            $this->addError('to', 'Date is reserved for other guest. Select another date');
        } else {
            ModelsReservation::create([
                'room_id' => $this->selectedRoom->id,
                'first_name' => $this->firstName,
                'last_name' => $this->lastName,
                'email' => $this->email,
                'from' => $this->from,
                'to' => $this->to
            ]);
            $this->dispatch('close-info-modal');
        }
    }
}
