<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];




    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarUrl()
    {
        if ($this->getMedia('avatar')->isEmpty()) {
            $imageUrl = "http://127.0.0.1:3000/storage/16/1080x1920.jpeg";
        } else {
            $imageUrl = $this->getMedia('avatar')[0]->getUrl();
        }

        return $imageUrl;
    }

    public function getThumbnailUrl()
    {
        if ($this->getMedia('avatar')->isEmpty()) {
            $imageUrl = "http://127.0.0.1:3000/storage/16/1080x1920.jpeg";
        } else {
            $imageUrl = $this->getMedia('avatar')[0]->getUrl('avatar-thumbnails');
        }

        return $imageUrl;
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function getTotalOrderCount()
    {
        return $this->orders()->where('user_id', $this->id)->count();
    }



    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile();

        $this->addMediaConversion('avatar-thumbnails')
            ->width(150)
            ->height(150);
    }
}
