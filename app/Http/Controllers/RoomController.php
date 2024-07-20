<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = [
            [
                'type' => 'Standar',
                'description' => 'Kamar standar dengan fasilitas dasar.',
                'price' => 100000,
                'image' => asset('image/standar.jpg'),
            ],
            [
                'type' => 'Deluxe',
                'description' => 'Kamar deluxe dengan fasilitas lebih lengkap.',
                'price' => 500000,
                'image' => asset('image/deluxe.jpg'),
            ],
            [
                'type' => 'Family',
                'description' => 'Kamar keluarga yang luas dan nyaman.',
                'price' => 1000000,
                'image' => asset('image/family.jpg'),
            ],
        ];
        return view('rooms', compact('rooms'));
    }
}
