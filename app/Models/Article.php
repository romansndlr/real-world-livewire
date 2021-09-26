<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $with = ['author'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->using(ArticleTag::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'article_favorite');
    }

    public function getTagListAttribute()
    {
        return $this->tags->map->text;
    }

    public function scopeWithFavorited($query)
    {
        $query->withExists(['favorites as favorited' => function ($query) {
            $query->where('user_id', auth()->id());
        }]);
    }

    public function toggleFavorite()
    {
        $this->favorites()->toggle(auth()->id());
    }
}
