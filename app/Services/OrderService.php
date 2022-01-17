<?php

namespace App\Services;

use App\Models\Order;
use App\Services\DateService;
use Carbon\Carbon;

class OrderService
{

    public function __construct(DateService $dateService)
    {
        $this->dateService = $dateService;
    }

    public function store($validated, $start_date, $end_date)
    {
        $validated['start_date'] = $this->dateService->convertToDate($start_date);

        $validated['end_date'] = $this->dateService->convertToDate($end_date);

        $validated['invoice_id'] = $this->generateInvoiceId();


        Order::create($validated);
    }

    public function generateInvoiceId()
    {
        $now = Carbon::now()->format('dmY');

        $latestOrder = Order::latest()->first();

        if ($latestOrder) {
            $orderId = $latestOrder->id + 1;
        } else {
            $orderId = 1;
        }

        return $now . $orderId;
    }

    public function getEndDate($date, $total_days)
    {
        $date = $this->dateService->parse($date)->addDays($total_days)->format('d F Y');

        return $date;
    }
}
