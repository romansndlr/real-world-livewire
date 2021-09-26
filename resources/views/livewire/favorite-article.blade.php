<button @class([ 'btn btn-sm' , 'btn-outline-primary'=> !$this->article->favorited,
  'btn-primary'=> $this->article->favorited]) wire:click.debounce.150ms="favorite">
  <i class="ion-heart"></i>
  &nbsp;
  Favorite Post <span class="counter">({{ $this->article->favorites_count }})</span>
</button>
