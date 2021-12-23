<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use App\Models\Tag;
use App\Models\Review;
use App\Models\User;



class Destination extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'destination_tag', 'destination_id', 'tag_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'destination_id');
    }

    public function UserComment()
    {
        return $this->hasOneThrough(User::class, Comment::class);
    }

    public function getAvgRating()
    {
        $rating = round($this->reviews()->avg('rating'), 1);

        return $rating;
    }

    public function getTotalReviews()
    {
        return $this->reviews()->count();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getImageUrl()
    {
        if ($this->getMedia()->isEmpty()) {
            $imageUrl = "http://127.0.0.1:3000/storage/16/1080x1920.jpeg";
        } else {
            $imageUrl = $this->getMedia()[0]->getUrl();
        }

        return $imageUrl;
    }
}
