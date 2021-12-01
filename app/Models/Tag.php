<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Destination;

class Tag extends Model
{
    public $timestamps = false;


    protected $fillable = ['name'];

    public function Destinations()
    {
        return $this->belongsToMany(Destination::class, 'destination_tag', 'tag_id', 'destination_id');
    }

    use HasFactory;
}
