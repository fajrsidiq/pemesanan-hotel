# Aplikasi Pemesanan Kamar

## Deskripsi Proyek
Aplikasi Pemesanan Kamar adalah sebuah aplikasi web yang dirancang untuk mengelola pemesanan kamar pada sebuah hotel. Aplikasi ini menyediakan fitur untuk menampilkan daftar kamar, membuat pemesanan, melihat detail pemesanan, dan menampilkan statistik pemesanan dalam bentuk grafik.

## Fitur Utama
- Melihat daftar kamar yang tersedia
- Membuat pemesanan kamar
- Melihat detail pemesanan
- Menampilkan jumlah pemesanan per tipe kamar dalam bentuk grafik

## Struktur Folder
Berikut adalah struktur folder dan penjelasan singkat mengenai masing-masing folder:
```plaintext
pemesanan-hotel/
│
├── app/
│ ├── Charts/
│ │ └── JenisKamarChart.php # Kelas untuk grafik pie chart berdasarkan jenis kamar
│ ├── Http/
│ │ └── Controllers/
│ │  ├── BookingController.php # Controller untuk mengelola pemesanan
│ │  └── RoomController.php # Controller untuk menampilkan daftar kamar
│ ├── Models/
│ │ └── Booking.php # Model untuk tabel bookings
│
├── config/
│ ├── app.php # Konfigurasi utama aplikasi
│ ├── database.php # Konfigurasi database
│
├── database/
│ ├── migrations/
│ │ └── 2024_07_20_022902_create_bookings_table.php # Migrasi untuk tabel bookings
│
├── public/
│ ├── index.php # Front controller untuk aplikasi web
│ └── images/                     # Folder untuk menyimpan gambar
│   ├── banner.jpg              # Gambar banner
│   ├── deluxe.jpg              # Gambar kamar deluxe
│   ├── family.jpg              # Gambar kamar family
│   ├── logo.png                # Gambar logo
│   └── standar.jpg             # Gambar kamar standar
│
├── resources/
│ ├── js/
│ │ └── bootstrap.js # File JavaScript untuk interaktivitas aplikasi
│ ├── views/
│ │ ├── bookings/
│   │ ├── index.blade.php # Tampilan untuk daftar pemesanan
│   │ ├── show.blade.php # Tampilan untuk detail pemesanan
│   ├── layouts/
│   │ └── app.blade.php # Template layout utama aplikasi
├── rooms/
│   │ ├── deluxe.blade.php # Tampilan halaman detail kamar deluxe
│   │ ├── family.blade.php # Tampilan halaman detail kamar family
│   │ └── standar.blade.php # Tampilan halaman detail kamar standar
|   ├── about.blade.php # Tampila nhalaman tentang
│   ├── home.blade.php  # Tampilan halaman utama
│   ├── rooms.blade.php  # Tampilan halaman kamar
│   ├── price.blade.php  # Tampilan halaman harga
│   
├── routes/
│ └── web.php # Rute web untuk aplikasi
│
├── .env # File konfigurasi lingkungan
├── composer.json # File konfigurasi Composer untuk dependensi PHP
├── readme.md # Dokumentasi proyek
└── artisan # CLI untuk berbagai perintah Artisan Laravel
