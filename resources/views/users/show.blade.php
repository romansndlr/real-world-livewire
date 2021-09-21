<x-layout>
  <div class="profile-page">
    <div class="user-info">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-10 offset-md-1">
            <img src="{{ $user->image }}" class="user-img" />
            <h4>{{ $user->username }}</h4>
            <p>{{ $user->bio }}</p>
            {{-- @if (auth()->id() != $user->id)
              <livewire:follow-user :user="$user" />
            @endif --}}
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-10 offset-md-1">
          <livewire:user-articles :userId="$user->id" />
        </div>
      </div>
    </div>
  </div>
</x-layout>
