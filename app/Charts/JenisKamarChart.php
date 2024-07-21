<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Booking;

class JenisKamarChart
{
    protected $chart;

    public function __construct()
    {
        $this->chart = new LarapexChart();
    }

    public function build()
    {
        // Menghitung jumlah pemesanan per jenis kamar
        $bookings = Booking::select('tipe_kamar', \DB::raw('count(*) as total'))
            ->groupBy('tipe_kamar')
            ->pluck('total', 'tipe_kamar')->toArray();

        // Membuat grafik
        return $this->chart->pieChart()
            ->setTitle('Jumlah Pemesanan per Tipe Kamar')
            ->addData(array_values($bookings))
            ->setLabels(array_keys($bookings));
    }
}
