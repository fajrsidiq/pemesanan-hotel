@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <section class="about text-center mb-4">
            <h2>Tentang Kami</h2>
            <img src="{{ asset('image/logo.png') }}" alt="About Us" class="img-fluid about-image mb-3" style="max-width: 250px; height: auto;">
            <p class="lead">Hotel XYZ adalah destinasi ideal untuk perjalanan Anda. Terletak di pusat kota dengan akses mudah ke berbagai
                destinasi wisata, kami menawarkan kenyamanan dan pelayanan terbaik. Dengan tim yang profesional dan fasilitas lengkap,
                kami berkomitmen untuk membuat pengalaman menginap Anda menjadi luar biasa.</p>
            <address>
                <strong>Alamat:</strong> Jl. Contoh No. 123, Jakarta<br>
                <strong>Telepon:</strong> (+62)82115817247<br>
                <strong>Email:</strong> fajarsidiqm55@gmail.com
            </address>
        </section>
    </div>
@endsection
