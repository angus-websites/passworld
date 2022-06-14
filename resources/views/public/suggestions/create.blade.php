@section('title', 'Suggest')
<x-app-layout>
  <x-page-container>
    <x-text.page-title title="Suggest" subtitle="Suggest a new word to be used in the A$$word generator"/>

    <!-- Create component -->
    <div class="mt-10 mb-20">
      @livewire("suggestion.create")
    </div>

    <!--Examples-->
    <article class="prose">
      <h2 id="types_of_words">Types of words explained</h2>
      @foreach($types as $type)
        <hr>
        <h3 cl>{{$type->name}}</h3>
        <p>{{$type->description}}</p>
        <p>Example: <b>{{$type->randomWord()}}</b></p>
      @endforeach
      <hr>
    </article>

    <br>
    <!--View all words-->
    <a href="{{{ route('words.index') }}}" class="my-2 btn btn-link text-info px-0">View more examples</a>

  </x-page-container>
</x-app-layout>
