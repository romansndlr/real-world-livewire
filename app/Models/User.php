<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function following()
    {
        return $this->belongsToMany(self::class, 'user_follower', 'user_id', 'follower_id');
    }

    public function followers()
    {
        return $this->belongsToMany(self::class, 'user_follower', 'follower_id', 'user_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id');
    }

    public function favorites()
    {
        return $this->belongsToMany(Article::class, 'article_favorite');
    }
}
