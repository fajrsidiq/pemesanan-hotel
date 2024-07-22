<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Charts\JenisKamarChart;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        // Ambil data list pemesanan
        $bookings = Booking::paginate(100);
        $chart = (new JenisKamarChart())->build();
        return view('bookings.index', compact('bookings', 'chart'));
    }
    public function create()
    {
        return view('bookings.create');
    }
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return response()->json($booking);
    }

    public function store(Request $request)
    {
        //validasi data dari input
        $validatedData = $request->validate([
            'nama_pemesan' => 'required|string|max:255|regex:/^[A-Za-z\s]+$/',
            'jenis_kelamin' => 'required|in:Laki-laki,perempuan',
            'nomor_identitas' => 'required|digits:16',
            'tipe_kamar' => 'required|in:Standar,Deluxe,Family',
            'tanggal_pesan' => 'required|date_format:d/m/Y',
            'durasi_menginap' => 'required|integer|min:1',
            'termasuk_breakfast' => 'nullable|boolean',
        ]);

        // Menghitung total bayar
        $hargaKamar = [
            'Standar' => 100000,
            'Deluxe' => 500000,
            'Family' => 1000000
        ];

        //deklarasi variabel
        $tipeKamar = $validatedData['tipe_kamar'];
        $durasiMenginap = $validatedData['durasi_menginap'];
        $breakfast = $validatedData['termasuk_breakfast'] ?? false;

        $totalBayar = $hargaKamar[$tipeKamar] * $durasiMenginap;

        //Menghitung discount
        $discount = '0%';
        if ($durasiMenginap > 3) {
            $totalBayar *= 0.9; 
            $discount = '10%';
        }

        //Pengecekan kondisi percabangan breakfast
        if ($breakfast) {
            $totalBayar += 80000 * $durasiMenginap; // Tambahan breakfast
        }

        $durasiMenginap = $request->durasi_menginap . ' hari';

        // Save booking
        Booking::create([
            'nama_pemesan' => $validatedData['nama_pemesan'],
            'nomor_identitas' => $validatedData['nomor_identitas'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],            
            'tipe_kamar' => $validatedData['tipe_kamar'],
            'tanggal_pesan' => \DateTime::createFromFormat('d/m/Y', $validatedData['tanggal_pesan'])->format('Y-m-d'),
            'durasi_menginap' =>$durasiMenginap,
            'discount' => $discount,
            'total_bayar' => $totalBayar,
        ]);

        return redirect()->route('bookings.create')->with('success', 'Pemesanan berhasil!');
    }
}
