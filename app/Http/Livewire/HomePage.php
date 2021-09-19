<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Tag;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class HomePage extends Component
{
    use WithPagination;

    public $feed;

    public $tag = null;

    protected $paginationTheme = 'bootstrap';

    public function handleTagSelect($tag)
    {
        $this->resetPage();

        $this->tag = $tag;

        $this->feed = false;
    }

    public function handleUserFeedSelect()
    {
        $this->resetPage();

        $this->tag = null;

        $this->feed = true;
    }

    public function handleGlobalFeedSelect()
    {
        $this->resetPage();

        $this->tag = null;

        $this->feed = false;
    }

    public function favorite(Article $article)
    {
        $article->favorites()->toggle(auth()->id());
    }

    public function mount()
    {
        $this->feed = auth()->check();
    }

    public function render()
    {
        $query = Article::query();

        $query->when($this->tag, function ($query) {
            $query->whereRelation('tags', 'text', $this->tag);
        });

        $query->when($this->feed, function ($query) {
            $userIds = Auth::user()->following()->pluck('follower_id')->toArray();

            return $query->whereIn('author_id', $userIds);
        });

        $articles = $query
            ->withExists(['favorites as favorited' => function ($query) {
                $query->where('user_id', auth()->id());
            }])
            ->with('tags:text')
            ->withCount('favorites')
            ->paginate(10);

        return view('livewire.home-page', ['tags' => Tag::all(), 'articles' => $articles]);
    }
}
