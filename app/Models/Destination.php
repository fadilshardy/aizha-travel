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
            $imageUrl = "http://127.0.0.1:3000/storage/16/1080x1920.jpeg";
        } else {
            $imageUrl = $this->getMedia()[0]->getUrl();
        }

        return $imageUrl;
    }

    public function getThumbnailUrl()
    {
        if ($this->getMedia()->isEmpty()) {
            $imageUrl = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
        } else {
            $imageUrl = $this->getMedia()[0]->getUrl('thumbnail');
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



    public function registerMediaCollections(): void
    {
        $this->addMediaConversion('thumbnail')
            ->width(480)
            ->height(480);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'destination_id');
    }
}
