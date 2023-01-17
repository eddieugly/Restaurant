<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderMeta;
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

    public function order(Request $request, $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'total' => 'required'
        ]);

        

        $order = Order::create([
            'user_id' => $user,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'total' => $request->total,
            'payment_method' => $request->payment_method,
            'payment_status' => 0,
            'order_status' => 0,
            'total' => $request->total
        ]);

        for ($i=0; $i < count($request->menu_id); $i++) { 
            
            OrderMeta::create([

                'order_id' => $order->id,
                'menu_id' => $request->menu_id[$i],
                'quantity' => $request->quantity[$i],
                'price' => $request->price[$i],
            ]);
        }
        
        Cart::where('user_id', $user)->delete();

        return redirect(route('home'))->with('success', 'Order Sent Successfully!');
    }
}
