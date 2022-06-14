@props(['bg' => 'bg-base-300'])

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
  <body {!! $attributes->merge(['class' => "font-sans antialiased $bg"]) !!}>
    {{ $slot }}

    <footer>
      @stack('scripts')
      @yield("footer")
    </footer>
  @stack('modals')
  </body>
</html>

