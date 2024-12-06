<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Inpatient;
use Illuminate\Http\Request;

class BedOccupancyRateController extends Controller
{
    // Menampilkan BOR berdasarkan kapasitas kamar
    public function index()
    {
        // Ambil semua kamar yang ada
        $rooms = Room::all();
        $occupancyRates = [];

        // Loop untuk menghitung BOR untuk setiap kamar
        foreach ($rooms as $room) {
            // Hitung jumlah pasien yang dirawat di kamar ini
            $occupiedBeds = Inpatient::where('room_id', $room->id)
                                     ->where('status', 'Masih dirawat')
                                     ->count();

            // Ambil kapasitas total tempat tidur di kamar ini
            $totalBeds = $room->capacity;

            // Hitung BOR (persentase tempat tidur yang terisi)
            $occupancyRate = ($totalBeds > 0) ? ($occupiedBeds / $totalBeds) * 100 : 0;

            // Menyimpan informasi BOR untuk setiap kamar
            $occupancyRates[] = [
                'room' => $room->name,
                'occupied_beds' => $occupiedBeds,
                'total_beds' => $totalBeds,
                'occupancy_rate' => number_format($occupancyRate, 2)
            ];
        }

        // Kirim data BOR ke tampilan
        return view('bed_occupancy_rate.index', compact('occupancyRates'));
    }
}
