<?php

namespace App\Services;

use Carbon\Carbon;

class DateService
{
    public function parse($date)
    {
        return Carbon::Parse($date);
    }

    public function getTotalDays($start, $end)
    {
        $count = $this->parse($start)->diffInDays($this->parse($end));
        if ($count === 0) {
            $count++;
        };
        return $count;
    }


    public function getDayMonthString($date)
    {
        return $this->parse($date)->format('d F Y');
    }

    public function convertToDate($date)
    {
        return $this->parse($date)->format('Y-m-d');
    }
}
