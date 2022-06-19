<x-master-layout>
  @include('includes.navbar-naked')
  <main class="body-font overflow-hidden min-h-screen">
    {{ $slot }}
  </main>
  @include('includes.footer')
</x-master-layout>
