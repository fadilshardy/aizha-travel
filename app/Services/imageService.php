<?php

namespace App\Services;

class imageService
{
    public function upload($request, $destination)
    {
        $destination
            ->addMultipleMediaFromRequest(['images'])
            ->each(function ($image) {
                $image->toMediaCollection();
            });
    }
}
