<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.header')
<body>
  <!-- <div class="container"> -->
      @include('layouts.navbar')
      @yield('content')
      @include('layouts.footer')
  <!-- </div> -->
  <script src="{{asset('js/app.js')}}"></script>
  @yield('scripts')
</body>
</html>