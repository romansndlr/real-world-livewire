<x-layout>
  <div class="auth-page">
    <div class="container page">
      <div class="row">
        <div class="col-md-6 offset-md-3 col-xs-12">
          <h1 class="text-xs-center">Sign up</h1>
          <p class="text-xs-center">
            <a href="{{ route('login.create') }}">Have an account?</a>
          </p>
          <x-validation-errors />
          <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <fieldset class="form-group">
              <input name="username" class="form-control form-control-lg" type="text" placeholder="Your Name"
                value="{{ old('username') }}">
            </fieldset>
            <fieldset class="form-group">
              <input name="email" class="form-control form-control-lg" type="text" placeholder="Email"
                value="{{ old('email') }}">
            </fieldset>
            <fieldset class="form-group">
              <input name="password" class="form-control form-control-lg" type="password" placeholder="Password">
            </fieldset>
            <button class="btn btn-lg btn-primary pull-xs-right">
              Sign up
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>
