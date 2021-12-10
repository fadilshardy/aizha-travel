<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\User;



class Destination extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'destination_tag', 'destination_id', 'tag_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'destination_id');
    }

    public function UserComment()
    {
        return $this->hasOneThrough(User::class, Comment::class);
    }
}
