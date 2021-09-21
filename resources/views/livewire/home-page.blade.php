<div class="home-page">
  <div class="banner">
    <div class="container">
      <h1 class="logo-font">conduit</h1>
      <p>A place to share your knowledge.</p>
    </div>
  </div>
  <div class="container page">
    <div class="row">
      <div class="col-md-9">
        <div class="feed-toggle">
          <ul class="nav nav-pills outline-active">
            @auth
              <li class="nav-item">
                <a class="nav-link {{ $feed && !$tag ? 'active' : '' }}" href=""
                  wire:click.prevent="handleUserFeedSelect">Your
                  Feed</a>
              </li>
            @endauth
            <li class="nav-item">
              <a class="nav-link {{ !$feed && !$tag ? 'active' : '' }}" href=""
                wire:click.prevent="handleGlobalFeedSelect">Global
                Feed</a>
            </li>
            @if ($tag)
              <li class="nav-item">
                <a class="nav-link active" href=""># {{ $tag }}</a>
              </li>
            @endif
          </ul>
        </div>
        <div>
          @foreach ($articles as $article)
            <div class="article-preview">
              <div class="article-meta">
                <a href="{{ route('users.show', $article->author->id) }}"><img
                    src="{{ $article->author->image }}" /></a>
                <div class="info">
                  <a href="{{ route('users.show', $article->author->id) }}"
                    class="author">{{ $article->author->username }}</a>
                  <span class="date">{{ $article->created_at->format('F jS') }}</span>
                </div>
                <button @class([ 'btn btn-sm pull-xs-right' , 'btn-outline-primary'=> !$article->favorited,
                  'btn-primary'=> $article->favorited])
                  wire:click="favorite({{ $article }})">
                  <i class="ion-heart"></i>
                  <span class="counter">
                    {{ $article->favorites_count }}
                  </span>
                </button>
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
      <div class="col-md-3">
        <div class="sidebar">
          <p>Popular Tags</p>
          <div class="tag-list">
            @foreach ($tags as $tag)
              <a href="" class="tag-pill tag-default"
                wire:click.prevent="handleTagSelect('{{ $tag->text }}')">{{ $tag->text }}</a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
