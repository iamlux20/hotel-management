<?php

use App\Livewire\Reservation;
use App\Livewire\Room;
use App\Livewire\RoomReservations;
use Illuminate\Support\Facades\Route;

Route::get('', Room::class)->name('rooms.index');

Route::get('reservation', Reservation::class)->name('reservations.index');
Route::get('reservation-listing', RoomReservations::class)->name('reservations.list');
