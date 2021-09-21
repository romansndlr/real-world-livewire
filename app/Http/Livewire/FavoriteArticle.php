<?php

namespace App\Http\Livewire;

use App\Models\ArticleFavorite;
use Livewire\Component;

class FavoriteArticle extends Component
{
    public $articleId;

    public $favorited = false;

    protected $listeners = ['favoriteClicked' => '$refresh'];

    public function favorite()
    {
        if ($this->favorited) {
            ArticleFavorite::where([
                'user_id' => auth()->id(),
                'article_id' => $this->articleId,
            ])->delete();
        } else {
            ArticleFavorite::create([
                'user_id' => auth()->id(),
                'article_id' => $this->articleId,
            ]);
        }

        $this->emit('favoriteClicked');
    }

    public function render()
    {
        $favorites = ArticleFavorite::where('article_id', $this->articleId)->get();

        $this->favorited = $favorites->contains(function ($favorite) {
            return $favorite->user_id === auth()->id();
        });

        return view('livewire.favorite-article', [
            'favoritesCount' => $favorites->count(),
        ]);
    }
}
