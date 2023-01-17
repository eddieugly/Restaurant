<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class CartController extends Controller
{
    public function addCart($menu, $user)
    {
        
        $cart = Cart::where('user_id', $user)->where('menu_id', $menu)->first();

        if ($cart) {
           
            $cart->increment('quantity');

        } else {
            
            Cart::create([

                'user_id' => $user,
                'menu_id' => $menu,
                'quantity' => 1
            ]);

        }

        return back()->with('success', 'Item Added To Cart');
        
    }

    public function getCart($user)
    {
        $page_title = 'Carts';
        
        $carts = Cart::where('user_id', $user)->get();
        $subtotal = 0;

        foreach ($carts as $cart) {
            $subtotal += $cart->quantity * $cart->menu->price;
        }

        return view('frontend.cart', compact('page_title', 'carts', 'subtotal'));
    }

    public function updateCart(Request $request, $user)
    {
        $carts = Cart::where('user_id', $user)->get();

        foreach ($carts as $cart) {
            
            $quantity = 'item_'.$cart->menu_id;

            $cart->update([
                $cart->quantity = $request->$quantity
            ]);
        }

        return redirect(route('getcart', $user));
        
    }

    public function destroy(Cart $cart, $user)
    {
        $cart->delete();

        return redirect(route('getcart', $user));
    }
}
