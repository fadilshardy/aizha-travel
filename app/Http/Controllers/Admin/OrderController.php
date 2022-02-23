<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Order;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(10);


        return view('orders.index', [
            'orders' => $orders
        ]);
    }




    public function orderStatus(Order $order)
    {
        if ($order->status === 'pending') {
            $status = 'paid';
        } else {
            $status = 'pending';
        }

        $order->update([
            'status' => $status
        ]);

        return back();
    }
}
