<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    protected $fillable = [
        'user_id', 'status',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
