<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $hoteltypes = $response = Http::get('https://roomstatus.uk/api/v1/frontend/ZCHS241/category')['room_categories'];

    return view('homepage', compact(['hoteltypes']));
});

Route::get('/rooms/{id}', function ($id) {
    $rooms = $response = Http::get('https://roomstatus.uk/api/v1/frontend/hotel/categories/' . $id)['rooms'];

    return view('rooms', compact(['rooms']));
})->name('room.categories');

Route::get('/rooms', function () {
    $response = $response = Http::get('https://roomstatus.uk/api/v1/frontend/ZCHS241/rooms');
    $rooms = $response->json();
    return view('rooms', compact(['rooms']));
})->name('rooms');

Route::get('/room/{id}', function ($id) {
    $room = $response = Http::get('https://roomstatus.uk/api/v1/frontend/room/' . $id);

    return view('reservation', compact(['room']));
})->name('room');

Route::post('/room/{id}/reserve', [ReservationController::class, 'bookRoom'])->name('book');