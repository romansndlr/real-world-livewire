<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class FavoriteArticle extends Component
{
    public $articleId;

    public $favorited = false;

    protected $listeners = ['favoriteClicked' => '$refresh'];

    public function getArticleProperty()
    {
        return Article::withCount('favorites')
            ->withExists(['favorites as favorited' => function ($query) {
                $query->where('user_id', auth()->id());
            }])
            ->find($this->articleId);
    }

    public function favorite()
    {
        if (! auth()->check()) {
            return redirect()->route('login.create');
        }

        $this->article->favorites()->toggle(auth()->id());

        $this->emit('favoriteClicked');
    }

    public function render()
    {
        return view('livewire.favorite-article');
    }
}
