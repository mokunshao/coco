<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gravatar($size = '100')
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));

        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->activation_token = Str::random(10);
        });
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function feed()
    {
        $user_ids = $this->followings->pluck('id')->toArray();
        array_push($user_ids, $this->id);

        return Article::whereIn('user_id', $user_ids)->with('user')->orderBy('created_at', 'desc');
    }

    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'user_id', 'follower_id');
    }

    public function followings()
    {
        return $this->belongsToMany(self::class, 'followers', 'follower_id', 'user_id');
    }

    public function follow(self $user)
    {
        $this->followings()->sync($user, false);
    }

    public function unfollow(self $user)
    {
        $this->followings()->detach($user);
    }

    public function isFollowing(self $user)
    {
        return $this->followings->contains($user->id);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
