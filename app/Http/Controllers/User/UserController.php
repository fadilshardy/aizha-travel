<?php

namespace App\Http\Controllers\user;

use App\Http\Requests\UpdatePasswordRequest;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Services\ImageService;

class UserController extends Controller
{

    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function edit(User $user)
    {
        $this->authorize('edit', User::class);

        return view('users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $this->authorize('update', User::class);


        if ($request->hasFile('avatar')) {
            $this->imageService->updateAvatar($request->avatar, $user);
        }

        $user->update($request->all());

        toast('Your Profile is successfully changed', 'success');


        return Redirect::back();
    }


    public function destroy(User $user)
    {
        //
    }



    public function changePassword(updatePasswordRequest $request)
    {
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        toast('Password is successfully changed', 'success');

        return Redirect::back();
    }
}
