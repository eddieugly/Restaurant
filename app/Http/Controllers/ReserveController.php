<?php

namespace App\Http\Controllers;

use App\Mail\Reservation;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReserveController extends Controller
{
    
    public function index()
    {
        $page_title = "Reservations";
        $reservations = Reserve::all();

        return view('reserve.index', compact('page_title', 'reservations'));
    }
    
    public function confirmation($type, Reserve $reserve)
    {
        if ($type === 'accept') {
            $reserve->status = 1;
            $reserve->update();

            $data = [
                'title' => 'HotFood.com',
                'message' => 'Hi '. $reserve->name .', Your reservation has been confirmed. See you soon!'
            ];

            Mail::to($reserve->email)->send(new Reservation($data));

            return back()->with('toast_success', 'Reservation Confirmed');
        }

        $reserve->status = 2;
        $reserve->update();

        $data = [
            'title' => 'HotFood.com',
            'message' => 'Hi '. $reserve->name .', Your reservation has been cancelled. Sorry for the inconveniences!'
        ];

        Mail::to($reserve->email)->send(new Reservation($data));

        return back()->with('toast_success', 'Reservation Cancelled');
    }
    
    public function delete(Reserve $reserve)
    {
        $reserve->delete();

        return back()->with('toast_success', 'Reservation Deleted');
    }
}
