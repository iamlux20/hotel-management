<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
