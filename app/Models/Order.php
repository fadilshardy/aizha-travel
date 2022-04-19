<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Order extends Model  implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['status', 'start_date', 'end_date'];

    protected $dates = ['start_date', 'end_date'];

    use HasFactory;

    public function getRouteKeyName()
    {
        return 'invoice_id';
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }


    public function getRecieptUrl()
    {
        if ($this->getMedia('reciept')->isEmpty()) {
            $imageUrl = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
        } else {
            $imageUrl = $this->getMedia('reciept')[0]->getUrl();
        }

        return $imageUrl;
    }
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('reciept')
            ->singleFile();

        $this->addMediaConversion('thumbnails')
            ->width(150)
            ->height(150);
    }
}
