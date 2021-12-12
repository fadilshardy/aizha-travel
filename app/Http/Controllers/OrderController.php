<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Destination;
use App\Models\Order;
use App\Services\DateService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct(DateService $dateService, OrderService $orderService)
    {
        $this->dateService = $dateService;
        $this->orderService = $orderService;
    }

    public function redirectToCheckout(Request $request)
    {
        $destination_id = $request->destination_id;
        $start = $request->start;
        $end = $request->end;
        $quantity = $request->quantity;

        return redirect()->route('destination.checkout', compact('destination_id', 'start', 'end', 'quantity'));
    }

    public function checkout(Request $request)
    {
        $destination = Destination::findOrFail($request->destination_id);

        $user = Auth::user();

        $data = (object) [
            'start_date' => $this->dateService->getDayMonthString($request->start),
            'end_date' => $this->dateService->getDayMonthString($request->end),
            'quantity' => $request->quantity,
            'total_days' => $this->dateService->getTotalDays($request->start, $request->end),
        ];

        $data2 =  [
            'start_date' => $this->dateService->getDayMonthString($request->start),
            'end_date' => $this->dateService->getDayMonthString($request->end),
            'quantity' => $request->quantity,
            'total_days' => $this->dateService->getTotalDays($request->start, $request->end),
        ];



        $data->total_amount = $destination->price * $data->quantity * $data->total_days;

        return view('orders.checkout', compact('user', 'destination', 'data', 'request', 'data2'));
    }

    public function order(StoreOrderRequest $request)
    {

        $validated = $request->except('start_date', 'end_date');

        $this->orderService->store($validated, $request->start_date, $request->end_date);

        return redirect()->route('home');
    }
}