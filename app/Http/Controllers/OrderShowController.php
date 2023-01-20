<?php

namespace App\Http\Controllers;

use App\Mail\Reservation;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderShowController extends Controller
{
    
    public function index()
    {
        $page_title = "Order List";
        $orders = Order::all();

        return view('order.index', compact('page_title', 'orders'));
    }
    
    public function confirmation($type, Order $order)
    {
        if ($type === 'accept') {
            $order->order_status = 1;
            $order->update();

            $data = [
                'title' => 'HotFood.com',
                'message' => 'Hi '. $order->name .', Your order has been confirmed. See you soon!'
            ];

            Mail::to($order->email)->send(new Reservation($data));

            return back()->with('toast_success', 'Order Confirmed');
        }

        $order->order_status = 2;
        $order->update();

        $data = [
            'title' => 'HotFood.com',
            'message' => 'Hi '. $order->name .', Your order has been cancelled. Sorry for the inconveniences!'
        ];

        Mail::to($order->email)->send(new Reservation($data));

        return back()->with('toast_success', 'Reservation Cancelled');
    }
    
    public function delete(Order $order)
    {
        $order->details->each->delete();
        $order->delete();

        return back()->with('toast_success', 'Order Deleted');
    }
}
