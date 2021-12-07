<?php

namespace App\Services;

use App\Models\Order;
use App\Services\DateService;

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

        Order::create($validated);
    }
}
