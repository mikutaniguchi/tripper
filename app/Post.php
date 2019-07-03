<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable = ['photo', 'month', 'prefecture','category', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
