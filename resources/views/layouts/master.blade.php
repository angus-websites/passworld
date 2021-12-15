<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="passworld">
  <!--Angus was here 2k21-->
  <head>
    <title>
        @if(View::hasSection('title'))
            @yield('title') | Passworld
        @else
            Passworld
        @endif
    </title>
    <meta name="description" content="@yield('description', 'Passworld is a website for generating strong, rude passwords and learning about cyber security')">
    <meta name="keywords" content="@yield('keywords', 'Password, Generate, Passworld, Cyber Security')">

    @include('includes.static-tags')

  </head>
  <body class="font-sans antialiased bg-base-300">
    {{ $slot }}
  </body>
</html>
