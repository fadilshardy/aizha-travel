<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\StoreRecieptRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {

        $userId = Auth::id();

        $orders = Order::where('user_id', $userId)->orderBy('id', 'desc')->paginate(10);


        return view('user.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('user.orders.show', compact('order'));
    }

    public function store(StoreOrderRequest $request)
    {
        $validated = $request->except('start_date', 'end_date');

        $order = $this->orderService->store($validated, $request->start_date, $request->end_date);

        toast('Your order has been successfully saved', 'success');

        return redirect()->route('user.order.show', $order->invoice_id);
    }

    public function payment(Order $order, StoreRecieptRequest $request)
    {
        $order->addMedia($request->reciept)->toMediaCollection('reciept');

        $order->update([
            'status' => 'pending'
        ]);


        toast('Your reciept has been successfully saved, wait for admin to confirm your payment', 'success');

        return redirect()->route('user.order.show', $order->invoice_id);
    }
}
