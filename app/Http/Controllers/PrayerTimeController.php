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

    public function index($location, $date)
{
    // Dapatkan ID kota berdasarkan lokasi
    $cityId = $this->prayerTimeService->getCityId($location);
    if (!$cityId) {
        return response()->json(['error' => 'City not found'], 404);
    }

    // Dapatkan jadwal sholat berdasarkan ID kota dan tanggal
    $prayerTimes = $this->prayerTimeService->getPrayerTimes($cityId, $date);

    return response()->json($prayerTimes);
}

}
