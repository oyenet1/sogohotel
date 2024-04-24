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
            'checked_in' => ['required', 'date', 'after:yesterday'],
            'checked_out' => ['required', 'date', 'after:checked_in'],
        ], []);

        $response = $response = Http::post('https://roomstatus.uk/api/v1/frontend/' . $id . '/reserve/', $data);

        if ($response->status() == 201) {
            Alert::success('Room Booked', 'Your reservations is successfully');
            return redirect()->back()->with('success', 'Your reservations is successfully');
        } else {
            Alert::error('Booking Error', 'Something went wrong with your booking');
        }
    }
}
