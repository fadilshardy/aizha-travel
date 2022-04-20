<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{

    public function __invoke()
    {
        if (!Auth::user()->is_admin) {
            abort(403);
        }

        $orders = Order::orderBy('updated_at', 'desc')->paginate(10);
        $userCount = User::all()->count();
        $totalOrderAmount = Order::sum('total_amount');
        $newOrderCount = Order::where('created_at', '>=', Carbon::now()->subdays(30))->count();
        $totalPendingOrderAmount = Order::where('status', 'pending')->count();

        return view('admin.dashboard.index', [
            'orders' => $orders,
            'userCount' => $userCount,
            'totalOrderAmount' => $totalOrderAmount,
            'newOrderCount' => $newOrderCount,
            'totalPendingOrderAmount' => $totalPendingOrderAmount,
        ]);
    }
}
