<?php

namespace App\Services;

use App\Models\Order;
use App\Services\DateService;
use Carbon\Carbon;

class OrderService
{



    public function store($validated, $start_date, $end_date)
    {

        $dateService = new DateService();

        $validated['start_date'] = $dateService->convertToDate($start_date);

        $validated['end_date'] = $dateService->convertToDate($end_date);

        $validated['invoice_id'] = $this->generateInvoiceId();


        Order::create($validated);
    }

    public function generateInvoiceId()
    {
        $now = Carbon::now()->format('dmY');

        $latest_order = Order::latest()->first();

        if ($latest_order) {
            $order_id = $latest_order->id + 1;
        } else {
            $order_id = 1;
        }

        return $now . 00000 + $order_id;
    }

    public function getEndDate($date, $total_days)
    {
        $dateService = new DateService();

        $date = $dateService->parse($date)->addDays($total_days)->format('d F Y');

        return $date;
    }

    public function getTotalAmount($price, $qty)
    {
        $total_amount = $price * $qty;

        return $total_amount;
    }
}
