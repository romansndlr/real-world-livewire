<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class ArticleComments extends Component
{
    public $article;

    public $comment;

    public $listeners = [
        'updated' => '$refresh',
    ];

    public function getCommentsProperty()
    {
        return $this->article->comments;
    }

    public function submit()
    {
        $comment = $this->article->comments()->make(['body' => $this->comment]);

        $comment->author()->associate(auth()->id());

        $comment->save();

        $this->comment = '';

        $this->emit('updated');
    }

    public function delete(Comment $comment)
    {
        $comment->delete();

        $this->emit('updated');
    }

    public function render()
    {
        return view('livewire.article-comments');
    }
}
