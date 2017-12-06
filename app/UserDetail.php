<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'user_id', 'school_id', 'firstname', 'middlename', 'lastname', 'gender', 'birthdate',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
