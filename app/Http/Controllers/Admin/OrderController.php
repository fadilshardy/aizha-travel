<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Order;

class OrderController extends Controller
{

    public function index()
    {

        $this->authorize('viewAny', Order::class);

        $orders = Order::orderBy('id', 'desc')->paginate(10);


        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }


    public function orderStatus(Order $order)
    {

        // dd($order->status);

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

    public function destroy(Order $order)
    {
        $order->delete();

        toast('Order has been successfully deleted', 'success');

        return redirect(route('order.index'));
    }
}
