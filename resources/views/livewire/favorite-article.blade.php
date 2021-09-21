<button @class([ 'btn btn-sm' , 'btn-outline-primary'=> !$favorited,
  'btn-primary'=> $favorited]) wire:click.debounce.150ms="favorite">
  <i class="ion-heart"></i>
  &nbsp;
  Favorite Post <span class="counter">({{ $favoritesCount }})</span>
</button>
