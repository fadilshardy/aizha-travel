<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



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

        $userId = Auth::id();

        $orders = Order::where('user_id', $userId)->orderBy('id', 'desc')->paginate(10);

        $orderCount = Order::where('user_id', $userId)->count();


        $totalOrderAmount = Order::where('user_id', $userId)->sum('total_amount');

        $paidOrderCount = Order::where('user_id', $userId)->where('status', 'paid')->count();
        $totalPendingOrderAmount = Order::where('user_id', $userId)->where('status', 'pending')->count();

        return view('user.dashboard.index', [
            'orders' => $orders,
            'orderCount' => $orderCount,
            'totalOrderAmount' => $totalOrderAmount,
            'paidOrderCount' => $paidOrderCount,
            'totalPendingOrderAmount' => $totalPendingOrderAmount,
        ]);
    }
}
