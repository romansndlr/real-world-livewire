<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Article $article)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Article $article)
    {
        return $user->id === $article->author->id;
    }

    public function favorite(User $user, Article $article)
    {
        return $user->id !== $article->author->id;
    }

    public function delete(User $user, Article $article)
    {
        //
    }

    public function restore(User $user, Article $article)
    {
        //
    }

    public function forceDelete(User $user, Article $article)
    {
        //
    }
}
