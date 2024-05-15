<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudienceLog extends Model
{
    use HasFactory;

    protected $table = 'audience_log';

    protected $fillable = [
        'service', 
        'http_status_code',
        'request_body',
        'response_body',
        'user_id',
    ];
}
