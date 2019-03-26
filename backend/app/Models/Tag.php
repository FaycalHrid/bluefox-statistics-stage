<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'status',
        'views_counter',
        'user_id',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
