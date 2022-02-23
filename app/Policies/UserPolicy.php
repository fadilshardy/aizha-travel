<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->is_admin;
    }

    public function view(User $user)
    {
        return $user->is_admin || (auth()->check() && $user->id == auth()->id());
    }

    public function edit(User $user)
    {
        return $user->is_admin || (auth()->check() && $user->id == auth()->id());
    }

    public function update(User $user)
    {
        return $user->is_admin || (auth()->check() && $user->id == auth()->id());
    }

    public function delete(User $user)
    {
        return $user->is_admin;
    }
}
