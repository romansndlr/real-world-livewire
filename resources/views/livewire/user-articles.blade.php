<?php
use App\Http\Livewire\UserArticles;
?>

<div>
  <div class="articles-toggle">
    <ul class="nav nav-pills outline-active">
      <li class="nav-item">
        <a class="nav-link {{ $activeTab === UserArticles::MY_ARTICLES_TAB ? 'active' : '' }}" href=""
          wire:click.prevent="$set('activeTab', {{ UserArticles::MY_ARTICLES_TAB }})">My Articles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $activeTab === UserArticles::FAVORITED_ARTICLES_TAB ? 'active' : '' }}" href=""
          wire:click.prevent="$set('activeTab', {{ UserArticles::FAVORITED_ARTICLES_TAB }})">Favorited Articles</a>
      </li>
    </ul>
  </div>
  <div>
    @foreach ($articles as $article)
      <div class="article-preview">
        <div class="article-meta">
          <a href="{{ route('users.show', $article->author->id) }}"><img src="{{ $article->author->image }}" /></a>
          <div class="info">
            <a href="{{ route('users.show', $article->author->id) }}"
              class="author">{{ $article->author->username }}</a>
            <span class="date">{{ $article->created_at->format('F jS') }}</span>
          </div>
          @unless($article->authored_by_auth_user)
            <button @class([ 'btn btn-sm pull-xs-right' , 'btn-outline-primary'=> !$article->favorited,
              'btn-primary'=> $article->favorited])
              wire:click="favorite({{ $article }})">
              <i class="ion-heart"></i>
              <span class="counter">
                {{ $article->favorites_count }}
              </span>
            </button>
          @endunless
        </div>
        <a href="{{ route('articles.show', $article->id) }}" class="preview-link">
          <h1>{{ $article->title }}</h1>
          <p>{{ $article->description }}</p>
          <span>Read more...</span>
          <ul class="tag-list">
            @foreach ($article->tags as $tag)
              <li class="tag-default tag-pill tag-outline">
                {{ $tag->text }}
              </li>
            @endforeach
          </ul>
        </a>
      </div>
    @endforeach
    {{ $articles?->links() }}
  </div>
</div>
