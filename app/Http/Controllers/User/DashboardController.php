<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;



class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {

        $orders = Order::orderBy('id', 'desc')->paginate(10);
        $userCount = User::all()->count();
        $totalOrderAmount = Order::sum('total_amount');
        $newOrderCount = Order::where('created_at', '>=', Carbon::now()->subdays(30))->count();
        $totalPendingOrderAmount = Order::where('status', 'pending')->count();

        return view('user.dashboard.index', [
            'orders' => $orders,
            'userCount' => $userCount,
            'totalOrderAmount' => $totalOrderAmount,
            'newOrderCount' => $newOrderCount,
            'totalPendingOrderAmount' => $totalPendingOrderAmount,
        ]);
    }
}
