<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <title>Conduit</title>
  <link href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
  <link
    href="//fonts.googleapis.com/css?family=Titillium+Web:700|Source+Serif+Pro:400,700|Merriweather+Sans:400,700|Source+Sans+Pro:400,300,600,700,300italic,400italic,600italic,700italic"
    rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="//demo.productionready.io/main.css">
  <script src="//unpkg.com/alpinejs" defer></script>
  @livewireStyles
</head>

<body>
  <nav class="navbar navbar-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">conduit</a>
      <ul class="nav navbar-nav pull-xs-right">
        <li class="nav-item">
          <x-nav-link route-name="home">Home</x-nav-link>
        </li>
        @auth
          <li class="nav-item">
            <x-nav-link route-name="articles.create">
              <i class="ion-compose"></i>&nbsp;New Post
            </x-nav-link>
          </li>
          <li class="nav-item">
            <x-nav-link route-name="users.edit" :route-params="auth()->id()">
              <i class="ion-gear-a"></i>&nbsp;Settings
            </x-nav-link>
          </li>
          <li class="nav-item">
            <x-nav-link route-name="users.show" :route-params="auth()->id()">
              <img class="user-pic" src="{{ auth()->user()->image }}">
              {{ auth()->user()->username }}
            </x-nav-link>
          </li>
        @endauth
        @guest
          <li class="nav-item">
            <x-nav-link route-name="register.create">Sign up</x-nav-link>
          </li>
          <li class="nav-item">
            <x-nav-link route-name="login.create">Sign in</x-nav-link>
          </li>
        @endguest
      </ul>
    </div>
  </nav>
  <main>
    {{ $slot }}
  </main>
  <footer>
    <div class="container">
      <a href="{{ route('home') }}" class="logo-font">conduit</a>
      <span class="attribution">
        An interactive learning project from <a href="https://thinkster.io">Thinkster</a>. Code &amp; design
        licensed under MIT.
      </span>
    </div>
  </footer>
  @livewireScripts
</body>

</html>
