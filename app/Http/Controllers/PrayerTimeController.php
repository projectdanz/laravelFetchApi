<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PrayerTimeService;

class PrayerTimeController extends Controller
{
     protected $prayerTimeService;

    public function __construct(PrayerTimeService $prayerTimeService)
    {
        $this->prayerTimeService = $prayerTimeService;
    }

// yang dibawah ini sudah otomatis pengisian tanggal hari ini secara otomatis

public function index($location)
    {
        // Dapatkan ID kota berdasarkan nama lokasi
        $cityId = $this->prayerTimeService->getCityId($location);

        if (!$cityId) {
            return response()->json(['error' => 'City not found'], 404);
        }

        // Ambil jadwal sholat berdasarkan ID kota dan tanggal sekarang
        $prayerTimes = $this->prayerTimeService->getPrayerTimes($cityId, now()->toDateString());

        return response()->json($prayerTimes);
    }


// yang dibawah ini cara pengambilan tanggal secara manual

    //     public function index($location, $date)
    // {
    //     // Dapatkan ID kota berdasarkan lokasi
    //     $cityId = $this->prayerTimeService->getCityId($location);
    //     if (!$cityId) {
    //         return response()->json(['error' => 'City not found'], 404);
    //     }

    //     // Dapatkan jadwal sholat berdasarkan ID kota dan tanggal
    //     $prayerTimes = $this->prayerTimeService->getPrayerTimes($cityId, $date);

    //     return response()->json($prayerTimes);
    // }

}
