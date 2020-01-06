<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    protected $fillable = [
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLike()
    {
        if (!Auth::check()) {
            return false;
        }
        if ($this->likes->count() > 0) {
            foreach ($this->likes as $like) {
                if ($like->user_id === Auth::user()->id) {
                    return true;
                }
            }
        }

        return false;
    }
}
