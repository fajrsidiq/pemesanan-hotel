@extends('layouts.app')

@section('content')
    <div class="container mt-4">
                <section class="intro text-center mb-4">
            <h2 class="display-4 mb-3">Kenyamanan dan Pelayanan Terbaik</h2>
            <img src="{{ asset('image/banner.jpg') }}" alt="Hotel Image" class="img-fluid intro-image mb-3">
            <p>Hotel XYZ terletak di pusat kota dengan akses mudah ke berbagai destinasi wisata. Kami menawarkan kenyamanan
                dan pelayanan terbaik untuk Anda.</p>
        </section>
        <section class="menu-card mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-2">
                            <a href="/rooms" class="btn btn-primary w-100">Kamar</a>
                        </div>
                        <div class="col-6 mb-2">
                            <a href="/price" class="btn btn-primary w-100">Daftar Harga</a>
                        </div>
                        <div class="col-6 mb-2">
                            <a href="/about" class="btn btn-primary w-100">Tentang Kami</a>
                        </div>
                        <div class="col-6 mb-2">
                            <a href="/bookings/create" class="btn btn-primary w-100">Pemesanan</a>
                        </div>                       
                    </div>
                </div>
            </div>
        </section>
        <section class="features text-center mb-4">
            <h2 class="display-4 mb-3">Fitur Utama</h2>
            <ul class="list-group">
                <li class="list-group-item">Kamar nyaman dengan fasilitas lengkap</li>
                <li class="list-group-item">Lokasi strategis di pusat kota</li>
                <li class="list-group-item">Pelayanan ramah dan profesional</li>
            </ul>
        </section>
        
    </div>
@endsection
