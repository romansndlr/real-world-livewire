@props(['article' => null])

<div class="article-meta">
  <a href="{{ route('users.show', $article->author->username) }}"><img src="{{ $article->author->image }}" /></a>
  <div class="info">
    <a href="{{ route('users.show', $article->author->username) }}"
      class="author">{{ $article->author->username }}</a>
    <span class="date">{{ $article->created_at->format('F jS') }}</span>
  </div>
  @can('update', $article)
    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-outline-secondary btn-sm">
      <i class="ion-edit"></i> Edit Article
    </a>
    <button class="btn btn-outline-danger btn-sm">
      <i class="ion-trash-a"></i> Delete Article
    </button>
  @else
    <button class="btn btn-sm btn-outline-secondary">
      <i class="ion-plus-round"></i>
      &nbsp;
      Follow Eric Simons <span class="counter">(10)</span>
    </button>
    <livewire:favorite-article :articleId="$article->id" />
  @endcan
</div>
