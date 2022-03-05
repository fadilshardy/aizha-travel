<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);

        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function destroy(User $user)
    {
        //
    }
}
