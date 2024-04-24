<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
// use Alert;

class ReservationController extends Controller
{
    public function bookRoom($id, Request $request)
    {
        $data = $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'checked_in' => ['required', 'date'],
            'checked_out' => ['required', 'date'],
        ]);

        $response = $response = Http::post('https://roomstatus.uk/api/v1/frontend/' . $id . '/reserve/', $data);

        if ($response->ok()) {
            Alert::success('Room Booked', 'Your reservations is successfully');
        }
    }
}
