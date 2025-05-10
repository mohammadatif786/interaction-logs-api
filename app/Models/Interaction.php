<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    protected $fillable = [
        'user_id',
        'page_url',
        'event_type',
        'event_data',
        'user_agent',
        'ip_address',
    ];

    protected $casts = [
        'event_data' => 'array',
    ];
}
