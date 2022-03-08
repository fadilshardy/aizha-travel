<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Destination;

class Tag extends Model
{
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'name';
    }

    protected $fillable = ['name'];

    public function destinations()
    {
        return $this->belongsToMany(Destination::class, 'destination_tag', 'tag_id', 'destination_id');
    }

    use HasFactory;
}
