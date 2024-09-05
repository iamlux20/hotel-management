<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'Junior 1',
            'Junior 2',
            'Queen 1',
            'Queen 2',
            'King'
        ];

        $descriptions = [
            'A basic room with a double-sized bed, T&B, and entertainment system.',
            'A basic room with a double-sized bed, T&B, and entertainment system.',
            'A basic room with a queen-sized bed, T&B, and entertainment system. Free breakfast is included.',
            'A basic room with a queen-sized bed, T&B, and entertainment system. Free breakfast is included.',
            'A basic room with a double-sized bed, T&B, 2 sofas, and an entertainment system. Free breakfast and gym access is included.',
        ];

        $images = [
            'New folder/junior-1.jpg',
            'New folder/junior-2.jpg',
            'New folder/room-queen-1.png',
            'New folder/room-queen-2.png',
            'New folder/room-king.png',
        ];

        for ($x = 0; $x < 5; $x++) {
            Room::create([
                'name' => $names[$x],
                'description' => $descriptions[$x],
                'image_link' => $images[$x]
            ]);
        }
    }
}
