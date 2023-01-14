<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Slider;
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

        
        
        $menues = Menu::orderBy('id', 'DESC')->limit(8)->get();

        return view('frontend.menu', compact('menus'));
    }
}
