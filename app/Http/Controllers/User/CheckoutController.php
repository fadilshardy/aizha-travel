<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Services\DateService;
use App\Services\OrderService;

class CheckoutController extends Controller
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

        return redirect()->route('user.checkout.show', compact('destination_id', 'date', 'quantity'));
    }


    public function show(Request $request)
    {

        $destination = Destination::find($request->destination_id);

        $user = Auth::user();

        $data =  [
            'date' => $request->date,
            'quantity' => $request->quantity,
            'invoice_id' => $this->orderService->generateInvoiceId(),
            'end_date' => $this->orderService->getEndDate($request->date, $destination->total_days)
        ];

        $data['total_amount'] = $this->orderService->getTotalAmount($destination->price, $data['quantity']);

        return view('user.checkouts.show', compact('user', 'destination', 'data', 'request'));
    }
}
