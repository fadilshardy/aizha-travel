<?php

namespace App\Services;

use App\Models\Destination;
use App\Models\Tag;

class TagService
{
    public function store($tags, $destination_id)
    {
        $tags = explode(',', strtolower($tags));

        foreach ($tags as $tag) {
            $tag_id = Tag::firstOrCreate(['name' => $tag]);
            Destination::find($destination_id)->tags()->attach($tag_id);
        }
    }
}
