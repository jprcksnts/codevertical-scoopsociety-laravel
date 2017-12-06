<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'id', 'name', 'description',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
