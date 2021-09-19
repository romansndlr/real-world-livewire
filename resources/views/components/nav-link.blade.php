@props(['routeParams' => null])

<a class="nav-link {{ request()->routeIs($routeName) ? 'active' : '' }}"
  href="{{ route($routeName, $routeParams) }}">
  {{ $slot }}
</a>
