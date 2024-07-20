@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center mb-4">Form Pemesanan Kamar</h2>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Terjadi Kesalahan!</strong> Silakan periksa kembali form Anda.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <section class="booking-form">
                    <form id="bookingForm" method="POST" action="{{ route('bookings.store') }}">
                        @csrf
                        <div class="mb-3 row">
                            <label for="nama_pemesan" class="col-sm-3 col-form-label">Nama Pemesan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan"
                                    value="{{ old('nama_pemesan') }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="jenis_kelamin_laki"
                                        name="jenis_kelamin" value="Laki-laki"
                                        {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="jenis_kelamin_laki">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="jenis_kelamin_perempuan"
                                        name="jenis_kelamin" value="perempuan"
                                        {{ old('jenis_kelamin') == 'perempuan' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="jenis_kelamin_perempuan">Perempuan</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nomor_identitas" class="col-sm-3 col-form-label">Nomor Identitas</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nomor_identitas" name="nomor_identitas"
                                    value="{{ old('nomor_identitas') }}" required>
                                <div class="invalid-feedback">
                                    Isian salah.. data harus 16 digit
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tipe_kamar" class="col-sm-3 col-form-label">Tipe Kamar</label>
                            <div class="col-sm-9">
                                <select id="tipe_kamar" class="form-select" name="tipe_kamar" required>
                                    <option value="">Pilih Tipe Kamar</option>
                                    <option value="Standar" {{ old('tipe_kamar') == 'Standar' ? 'selected' : '' }}>Standar
                                    </option>
                                    <option value="Deluxe" {{ old('tipe_kamar') == 'Deluxe' ? 'selected' : '' }}>Deluxe
                                    </option>
                                    <option value="Family" {{ old('tipe_kamar') == 'Family' ? 'selected' : '' }}>Family
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="harga_kamar" class="col-sm-3 col-form-label">Harga Kamar</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="harga_kamar" name="harga_kamar" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tanggal_pesan" class="col-sm-3 col-form-label">Tanggal Pesan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tanggal_pesan" name="tanggal_pesan"
                                    placeholder="dd/mm/yyyy" value="{{ old('tanggal_pesan') }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="durasi_menginap" class="col-sm-3 col-form-label">Durasi Menginap (Hari)</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="durasi_menginap" name="durasi_menginap"
                                    value="{{ old('durasi_menginap') }}" required>
                                <div class="invalid-feedback">
                                    Harus isi angka
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Termasuk Breakfast</label>
                            <div class="col-sm-9">
                                <input type="checkbox" id="termasuk_breakfast" name="termasuk_breakfast" value="1"
                                    {{ old('termasuk_breakfast') ? 'checked' : '' }}>
                                <label for="termasuk_breakfast" class="ms-2">Ya</label>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="total_bayar" class="col-sm-3 col-form-label">Total Bayar</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="total_bayar" name="total_bayar" readonly>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="button" class="btn btn-primary" onclick="calculateTotal()">Hitung Total
                                Bayar</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-danger" onclick="clearForm()">Cancel</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('tipe_kamar').addEventListener('change', function() {
            const hargaKamar = {
                'Standar': 100000,
                'Deluxe': 500000,
                'Family': 1000000
            };
            const tipeKamar = this.value;
            const hargaElement = document.getElementById('harga_kamar');

            if (hargaKamar[tipeKamar]) {
                hargaElement.value = `Rp. ${hargaKamar[tipeKamar].toLocaleString()}`;
            } else {
                hargaElement.value = '';
            }
        });

        function calculateTotal() {
            const hargaKamar = {
                'Standar': 100000,
                'Deluxe': 500000,
                'Family': 1000000
            };
            const tipeKamar = document.getElementById('tipe_kamar').value;
            const durasiMenginap = parseInt(document.getElementById('durasi_menginap').value);
            const breakfast = document.getElementById('termasuk_breakfast').checked;

            if (!tipeKamar || isNaN(durasiMenginap)) {
                alert('Silakan pilih tipe kamar dan durasi menginap.');
                return;
            }

            let totalBayar = hargaKamar[tipeKamar] * durasiMenginap;

            if (durasiMenginap > 3) {
                totalBayar *= 0.9; // Diskon 10%
            }

            if (breakfast) {
                totalBayar += 80000 * durasiMenginap; // Tambahan breakfast
            }

            document.getElementById('total_bayar').value = `Rp. ${totalBayar.toLocaleString()}`;
        }

        function clearForm() {
            document.getElementById('bookingForm').reset();
            document.getElementById('total_bayar').value = '';
            document.getElementById('nomor_identitas').classList.remove('is-invalid');
        }

        // Validate Nomor Identitas
        document.getElementById('nomor_identitas').addEventListener('input', function() {
            const nomorIdentitas = this.value;
            if (nomorIdentitas.length !== 16) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });
    </script>
@endsection
