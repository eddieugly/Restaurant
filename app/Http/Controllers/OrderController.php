<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout($user)
    {
        $page_title = 'Carts';
        
        $carts = Cart::where('user_id', $user)->get();
        $subtotal = 0;

        foreach ($carts as $cart) {
           $subtotal += $cart->quantity * $cart->menu->price;
        }

        return view('frontend.checkout', compact('page_title', 'carts', 'subtotal'));
    }
}
