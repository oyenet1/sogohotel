<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

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

Route::get('/rooms', function (Request $request) {

    $data = $request->validate([
        'checked_in' => 'required|date',
        'checked_out' => 'required|date'
    ]);

    $response = $response = Http::post('https://roomstatus.uk/api/v1/frontend/ZCHS241/rooms', [
        'checked_in' => $data['checkded_in'],
        'checked_out' => $data['checkded_out'],
    ]);
    $rooms = $response->json();
    return view('rooms', compact(['rooms']));
})->name('rooms');

Route::get('/room/{id}', function ($id) {
    $room = $response = Http::get('https://roomstatus.uk/api/v1/frontend/room/' . $id);

    return view('reservation', compact(['room']));
})->name('room');

Route::post('/room/{id}/reserve', [ReservationController::class, 'bookRoom'])->name('book');
