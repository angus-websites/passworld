<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <!--Angus was here 2k21-->
  <head>
    <title>
        @if(View::hasSection('title'))
            @yield('title') | Passworld
        @else
            Passworld
        @endif
    </title>
    @include('includes.static-tags')
  </head>
  <body class="font-sans antialiased">
    {{ $slot }}
  </body>
</html>
