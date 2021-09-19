<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Tag;

class ArticleController extends Controller
{
    public function create()
    {
        return view('articles.create', ['article' => new Article]);
    }

    public function store(ArticleRequest $request)
    {
        $validated = $request->safe();

        $article = Article::make(
            $validated->only(['title', 'description', 'body'])
        );

        $article->author()->associate(auth()->user());

        $article->save();

        $tags = Tag::fromText($validated->tags);

        $article->tags()->sync($tags);

        return redirect()->route('articles.show', ['article' => $article]);
    }

    public function edit(Article $article)
    {
        $article->load('tags');

        return view('articles.edit', ['article' => $article]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $validated = $request->safe();

        $article->update($validated->only(['title', 'description', 'body']));

        $tags = Tag::fromText($validated->tags);

        $article->tags()->sync($tags);

        return back()->with('article', $article);
    }

    public function destroy(Article $article)
    {
        //
    }
}
