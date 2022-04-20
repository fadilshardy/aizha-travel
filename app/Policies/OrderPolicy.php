<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return $user->is_admin;
    }


    public function updateStatus(User $user)
    {
        return $user->is_admin;
    }


    public function view(User $user, Order $order)
    {
        return $user->id === $order->user_id;
    }


    public function update(User $user, Order $order)
    {
        return $user->id === $order->user_id;
    }


    public function delete(User $user, Order $order)
    {
        return $user->is_admin;
    }
}
