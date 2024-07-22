@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="card mt-4">
            <div class="card-header">
                <h2 class="text-center mb-4">Daftar dan Grafik Pemesanan</h2>
            </div>
            <div class="card-body">
                <!-- code untuk menampilkan chart -->
                {!! $chart->container() !!}

                <!-- code untuk menampilkan daftar pemesanan -->
                @if ($bookings->isEmpty())
                    <div class="alert alert-info">
                        Tidak ada pemesanan untuk ditampilkan.
                    </div>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pemesan</th>
                                <th>Nomor Identitas</th>
                                <th>Jenis Kelamin</th>
                                <th>Tipe Kamar</th>
                                <th>Tanggal Pesan</th>
                                <th>Durasi Menginap</th>
                                <th>Diskon</th>
                                <th>Total Bayar</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->nama_pemesan }}</td>
                                    <td>{{ $booking->nomor_identitas }}</td>
                                    <td>{{ $booking->jenis_kelamin }}</td>
                                    <td>{{ $booking->tipe_kamar }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->tanggal_pesan)->format('d/m/Y') }}</td>
                                    <td>{{ $booking->durasi_menginap }}</td>
                                    <td>{{ $booking->discount }}</td>
                                    <td>Rp. {{ number_format($booking->total_bayar, 2, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('bookings.show', $booking->id) }}"
                                            class="btn btn-info btn-sm">Lihat</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Paginasi -->
                    <div class="d-flex justify-content-between">
                        <div>
                            Showing {{ $bookings->firstItem() }} to {{ $bookings->lastItem() }} of
                            {{ $bookings->total() }} entries
                        </div>
                        <div>
                            {{ $bookings->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Scripts untuk chart -->
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
@endsection
