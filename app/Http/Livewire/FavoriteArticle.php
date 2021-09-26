<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class FavoriteArticle extends Component
{
    public $articleId;

    protected $listeners = ['favoriteToggled' => '$refresh'];

    public function getArticleProperty()
    {
        return Article::withCount('favorites')
            ->withFavorited()
            ->find($this->articleId);
    }

    public function favorite()
    {
        if (! auth()->check()) {
            return redirect()->route('login.create');
        }

        $this->article->toggleFavorite();

        $this->emit('favoriteToggled');
    }

    public function render()
    {
        return view('livewire.favorite-article');
    }
}
