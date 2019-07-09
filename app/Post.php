<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable = [ 'file', 'month', 'prefecture', 'category', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     public function like_users()
    {
         return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id')->withTimestamps();
   
    }
}
