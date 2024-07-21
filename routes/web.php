<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/price', function () {
    return view('price');
});
Route::get('/rooms', [App\Http\Controllers\RoomController::class, 'index']);
Route::view('/room/standar', 'rooms.standar')->name('room.standar');
Route::view('/room/deluxe', 'rooms.deluxe')->name('room.deluxe');
Route::view('/room/family', 'rooms.family')->name('room.family');
Route::get('/bookings/create', [App\Http\Controllers\BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [App\Http\Controllers\BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings', [App\Http\Controllers\BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/{id}', [App\Http\Controllers\BookingController::class, 'show'])->name('bookings.show');

