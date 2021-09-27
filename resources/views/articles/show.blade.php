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
          <livewire:article-comments :article="$article" />
        </div>
      </div>
    </div>
  </div>
</x-layout>
