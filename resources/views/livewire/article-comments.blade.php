<div>
  @auth
    <form class="card comment-form" wire:submit.prevent="submit">
      <div class="card-block">
        <textarea wire:model="comment" class="form-control" placeholder="Write a comment..." rows="3"></textarea>
      </div>
      <div class="card-footer">
        <img src="{{ auth()->user()->image }}" class="comment-author-img" />
        <button type="submit" class="btn btn-sm btn-primary">
          Post Comment
        </button>
      </div>
    </form>
  @endauth
  @foreach ($this->comments as $comment)
    <div class="card" wire:key="{{ $loop->index }}">
      <div class="card-block">
        <p class="card-text">{{ $comment->body }}</p>
      </div>
      @isset($comment->author)
        <div class="card-footer">
          <a href="{{ route('users.show', $comment->author->username) }}" class="comment-author">
            <img src="{{ $comment->author->image }}" class="comment-author-img" />
          </a>
          &nbsp;
          <a href="{{ route('users.show', $comment->author->username) }}"
            class="comment-author">{{ $comment->author->username }}</a>
          <span class="date-posted">{{ $comment->created_at->format('F jS') }}</span>
          @can('delete', $comment)
            <span class="mod-options" wire:click="delete({{ $comment }})">
              <i class="ion-trash-a"></i>
            </span>
          @endcan
        </div>
      @endisset
    </div>
  @endforeach
</div>
