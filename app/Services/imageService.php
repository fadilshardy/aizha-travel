<?php

namespace App\Services;

use App\Models\Destination;

class ImageService
{

    public function upload($request, $destination)
    {
        $destination
            ->addMultipleMediaFromRequest(['images'])
            ->each(function ($image) {
                $image->toMediaCollection();
            });
    }

    public function updateAvatar($img, $user)
    {
        $user->media()->delete();
        $user->addMedia($img)->toMediaCollection('avatar');
    }
}
