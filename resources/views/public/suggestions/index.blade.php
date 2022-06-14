@section('title', 'Suggestions')
<x-app-layout>
  <x-page-container>
    <x-text.page-title title="Suggestions" subtitle="View all the current suggested words by users"/>

    <div class="py-10">
      @livewire("suggestion.index")
    </div>

  </x-page-container>
</x-app-layout>