@section('title', 'Common words')
<x-app-layout>
  @include('includes.flash')
  <x-page-container>
    <div class="sm:text-center lg:text-left">
      <x-text.page-title title="Common Passwords" subtitle="View the most common passwords in use today"/>
    </div>
    <div class="my-20">
      @livewire("common.show")
    </div>
  </x-page-container>
</x-app-layout>
