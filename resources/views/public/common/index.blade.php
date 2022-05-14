@section('title', 'Common words')
<x-app-layout>
  <x-page-container>
    <x-text.page-title title="Common Passwords" subtitle="View the most common passwords in use today"/>
    <div class="my-10">
      @livewire("common.show")
    </div>
  </x-page-container>
</x-app-layout>
