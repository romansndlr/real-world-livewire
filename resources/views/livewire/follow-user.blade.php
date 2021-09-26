<button @class([ 'btn btn-sm action-btn' , 'btn-secondary'=> $this->user->followed,
    'btn-outline-secondary'=> !$this->user->followed]) wire:click="follow">
    <i class="ion-plus-round"></i>
    &nbsp;
    Follow {{$this->user->username}} <span class="counter">({{$this->user->followers_count}})</span>
</button>
