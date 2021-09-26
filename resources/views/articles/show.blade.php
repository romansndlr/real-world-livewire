<x-layout>
  <div class="article-page">
    <div class="banner">
      <div class="container">
        <h1>{{ $article->title }}</h1>
        <x-article-meta :article="$article" />
      </div>
    </div>
    <div class="container page">
      <div class="row article-content">
        <div class="col-md-12">
          <p>
            {{ $article->description }}
          </p>
          <h2 id="introducing-ionic">{{ $article->title }}</h2>
          <p>{{ $article->body }}</p>
        </div>
      </div>
      <hr />
      <div class="article-actions">
        <x-article-meta :article="$article" />
      </div>
      <div class="row">
        <div class="col-xs-12 col-md-8 offset-md-2">
          @auth
            <form class="card comment-form">
              <div class="card-block">
                <textarea class="form-control" placeholder="Write a comment..." rows="3"></textarea>
              </div>
              <div class="card-footer">
                <img src="{{ auth()->user()->image }}" class="comment-author-img" />
                <button class="btn btn-sm btn-primary">
                  Post Comment
                </button>
              </div>
            </form>
          @endauth
          @foreach ($article->comments as $comment)
            <div class="card">
              <div class="card-block">
                <p class="card-text">{{ $comment->body }}</p>
              </div>
              @isset($comment->author)
                <div class="card-footer">
                  <a href="{{ $comment->author->image }}" class="comment-author">
                    <img src="{{ route('users.show', $comment->author->username) }}" class="comment-author-img" />
                  </a>
                  &nbsp;
                  <a href="{{ route('users.show', $comment->author->username) }}"
                    class="comment-author">{{ $comment->author->username }}</a>
                  <span class="date-posted">{{ $comment->created_at->format('F jS') }}</span>
                </div>
              @endisset
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</x-layout>
