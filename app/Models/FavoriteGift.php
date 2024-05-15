<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteGift extends Model
{
    use HasFactory;

    protected $table = 'favorite_gift';

    protected $fillable = [
        'alias', 
        'gif_id',
        'user_id',
    ];

}
