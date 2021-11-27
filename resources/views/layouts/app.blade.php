<x-master-layout>
  @include('includes.navbar')
  <!--Main content-->
  <main class="text-gray-600 body-font overflow-hidden min-h-screen">
    {{ $slot }}
  </main>
  @include('includes.footer')
</x-master-layout>
