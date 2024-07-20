@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <section class="price-list">
            <h2 class="text-center mb-4">Daftar Harga Kamar</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Tipe Kamar</th>
                        <th>Harga per Malam</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Standar</td>
                        <td>Rp. 100.000</td>
                    </tr>
                    <tr>
                        <td>Deluxe</td>
                        <td>Rp. 500.000</td>
                    </tr>
                    <tr>
                        <td>Family</td>
                        <td>Rp. 1.000.000</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Tambahan Layanan</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Breakfast</td>
                        <td>Rp. 80.000</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
    <style>
        .tables-wrapper {
            display: flex;
            justify-content: space-between;
            gap: 20px; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; 
        }

        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #dee2e6; 
        }
    </style>
@endsection
