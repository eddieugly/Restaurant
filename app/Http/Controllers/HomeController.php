<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Slider;
use App\Models\Reserve;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $sliders = Slider::all();
        $menus = Menu::orderBy('id', 'DESC')->limit(8)->get();
        $general = '';

        return view('home', compact('sliders', 'menus', 'general'));
    }

    public function menu()
    {

        
        $starters = Menu::orderBy('price')->limit(4)->get();
        $menus = Menu::orderBy('id', 'DESC')->get();

        return view('frontend.menu', compact('menus', 'starters'));
    }

    public function reserve(Request $request)
    {

        Reserve::create([
            'date' => $request->date,
            'time' => $request->time,
            'people' => $request->people,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'status' => 0
        ]);

        return back()->with('toast_success', "Reservation Request Submitted!");

    }
}
