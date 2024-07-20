@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Jenis Kamar</h2>
        <div class="row">
            @foreach ($rooms as $room)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $room['image'] }}" class="card-img-top" alt="{{ $room['type'] }}">
                        <div class="card-body">
                            <h5 class="card-title" >{{ $room['type'] }}</h5>
                            <p class="card-text">{{ $room['description'] }}</p>
                            <p class="card-text"><strong>Harga:</strong> Rp. {{ number_format($room['price'], 0, ',', '.') }}</p>
                            <a href="/room/{{ strtolower($room['type']) }}" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
