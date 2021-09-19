<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @mixin IdeHelperTag
 */
class Tag extends Model
{
    use HasFactory;

    public function articles()
    {
        return $this->belongsToMany(Article::class)->using(ArticleTag::class);
    }

    public static function fromText($texts = []): Collection
    {
        return collect($texts)
            ->unique()
            ->map(fn ($text) => self::firstOrCreate(['text' => $text]))
            ->map
            ->id;
    }
}
