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

        $date = $request->date;

        $quantity = $request->quantity;

        return redirect()->route('destination.checkout', compact('destination_id', 'date', 'quantity'));
    }

    public function checkout(Request $request)
    {

        $destination = Destination::find($request->destination_id);

        $user = Auth::user();


        $data =  [
            'date' => $request->date,
            'quantity' => $request->quantity,
            'invoice_id' => $this->orderService->generateInvoiceId(),
            'end_date' => $this->orderService->getEndDate($request->date, $destination->total_days)
        ];



        $data['total_amount'] = $destination->price * $data['quantity'];

        return view('orders.checkout', compact('user', 'destination', 'data', 'request'));
    }

    public function order(StoreOrderRequest $request)
    {

        $validated = $request->except('start_date', 'end_date');

        $this->orderService->store($validated, $request->start_date, $request->end_date);

        return redirect()->route('home');
    }
}
