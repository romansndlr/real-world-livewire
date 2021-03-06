<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserArticles extends Component
{
    use WithPagination;

    public const MY_ARTICLES_TAB = 1;

    public const FAVORITED_ARTICLES_TAB = 2;

    protected $paginationTheme = 'bootstrap';

    public $activeTab = self::MY_ARTICLES_TAB;

    public $userId = null;

    public function render()
    {
        $user = User::find($this->userId);

        if ($this->activeTab === self::MY_ARTICLES_TAB) {
            $query = $user->articles();
        }

        if ($this->activeTab === self::FAVORITED_ARTICLES_TAB) {
            $userIds = $user->favorites()->pluck('article_id')->toArray();

            $query = Article::whereIn('id', $userIds);
        }

        $articles = $query
            ->withExists(['favorites as favorited' => function ($query) {
                $query->where('user_id', auth()->id());
            }])
            ->with('tags:text')
            ->withCount('favorites')
            ->paginate(10);

        return view('livewire.user-articles', ['articles' => $articles]);
    }
}
