@section('title', 'Words')
<x-app-layout>
  @include('includes.flash')
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:my-16 lg:my-20 lg:px-8 xl:my-25">
    <div class="sm:text-center lg:text-left">
      <x-text.page-title title="All words" subtitle="View all the words for the A$$word generator"/>

      <div class="py-10">
        @livewire("words.index")
      </div>


    </div>
  </div>
</x-app-layout>
