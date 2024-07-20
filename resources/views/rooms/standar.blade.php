@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Standar</h2>
        <div class="row">
            <div class="col-md-6">
                <div id="carouselExampleControls" class="carousel slide" style="width: 100%; height: 400px;">
                    <div class="carousel-inner" style="height: 100%;">
                        <!-- Gambar Kamar -->
                        <div class="carousel-item active" style="height: 100%;">
                            <img src="{{ asset('image/standar.jpg') }}" class="d-block w-100" style="height: 100%; object-fit: cover;" alt="Standar">
                        </div>
                        <!-- Video YouTube -->
                        <div class="carousel-item" style="height: 100%;">
                            <iframe class="d-block w-100" height="400" src="https://www.youtube.com/embed/4K6Sh1tsAW4" 
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen style="height: 100%;"></iframe>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mt-4">
                    <h4>Deskripsi</h4>
                    <p>Kamar Standar dengan fasilitas dasar.</p>
                    <p><strong>Harga:</strong> Rp. 100.000</p>
                </div>
            </div>
        </div>
    </div>
@endsection