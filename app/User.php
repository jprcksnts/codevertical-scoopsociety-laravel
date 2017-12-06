<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Allows displaying of non-incrementing ID.
     */
    public $incrementing = false;

    protected $fillable = [
        'id', 'email', 'username',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
