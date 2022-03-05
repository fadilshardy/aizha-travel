<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use App\Models\Tag;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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
        return $this->hasMany(Review::class, 'destination_id')->latest();
    }

    public function userReview()
    {
        $user_id = Auth::id();

        return $this->reviews()->where('user_id', $user_id);
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
            $imageUrl = "https://images.unsplash.com/photo-1646415372927-2d294966af15?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80";
        } else {
            $imageUrl = $this->getMedia()[0]->getUrl();
        }
        return $imageUrl;
    }


    public function similiar_destinations()
    {
        return $this->inRandomOrder()->limit(3)->get();
    }

    public function getReviewsPaginatedAttribute()
    {
        return $this->reviews()->paginate(5);
    }
}
