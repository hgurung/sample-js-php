<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('layouts.header')
  <body>
    @include('layouts.navbar')
    @yield('content')
    @include('layouts.footer')
    <script src="{{asset('js/app.js')}}" defer></script>
    @yield('scripts')
  </body>
</html>