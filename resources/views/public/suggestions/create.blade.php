@section('title', 'Suggest')
<x-app-layout>
  <x-page-container>
    <x-text.page-title title="Suggest" subtitle="Suggest a new word to be used in the A$$word generator"/>

    <!-- Create component -->
    <div class="my-10">
      @livewire("suggestion.create")
    </div>

    <!--Examples-->
    <h2 class="text-xl tracking-tight font-extrabold text-gray-800 sm:text-2xl md:text-4xl">
      <span class="block xl:inline">Types of word explained</span>
    </h2>

    <!--Types-->
    <div class="overflow-x-auto mt-10">
      <table class="table w-full">
        <thead>
          <tr>
            <th>Word type</th> 
            <th>Definition</th> 
            <th>Example</th>
          </tr>
        </thead> 
        <tbody>
          @foreach($types as $type)
            <tr>
              <td>{{$type->name}}</td> 
              <td>{{$type->description}}</td> 
              <td><b>{{$type->randomWord()}}</b></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!--View all words-->
    <a href="{{{ route('words.index') }}}" class="my-2 btn btn-link text-info px-0">View more examples</a>

  </x-page-container>
</x-app-layout>
