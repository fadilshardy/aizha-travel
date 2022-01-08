<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class Review extends Model
{

    protected $guarded = [];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
