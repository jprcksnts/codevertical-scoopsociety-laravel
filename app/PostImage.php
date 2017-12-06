<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $fillable = [
        'post_id', 'image_link',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
