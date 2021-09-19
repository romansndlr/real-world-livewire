<x-layout>
  <div class="settings-page">
    <div class="container page">
      <div class="row">
        <div class="col-md-6 offset-md-3 col-xs-12">
          <h1 class="text-xs-center">Your Settings</h1>
          <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PATCH')
            <fieldset>
              <fieldset class="form-group">
                <input name="image" class="form-control" type="text" placeholder="URL of profile picture"
                  value="{{ $user->image }}">
              </fieldset>
              <fieldset class=" form-group">
                <input name="username" class="form-control form-control-lg" type="text" placeholder="Your Name"
                  value="{{ $user->username }}">
              </fieldset>
              <fieldset class=" form-group">
                <textarea name="bio" class="form-control form-control-lg" rows="8"
                  placeholder="Short bio about you">{{ $user->bio }}</textarea>
              </fieldset>
              <fieldset class="form-group">
                <input name="email" class="form-control form-control-lg" type="text" placeholder="Email"
                  value="{{ $user->email }}">
              </fieldset>
              <fieldset class="form-group">
                <input name="password" class="form-control form-control-lg" type="password" placeholder="Password">
              </fieldset>
              <button class="btn btn-lg btn-primary pull-xs-right">
                Update Settings
              </button>
            </fieldset>
          </form>
          <hr />
          <form method="POST" action="{{ route('login.destroy') }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger">
              Or click here to logout.
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>
