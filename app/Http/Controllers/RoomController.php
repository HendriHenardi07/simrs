<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        // Filter kamar yang tersedia
        $rooms = Room::all()->filter(function ($room) {
            return $room->isAvailable();
        });

        return view('room.index', compact('rooms'));
    }
}

