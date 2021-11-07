@section('title', 'Words')
<x-app-layout>
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:my-16 lg:my-20 lg:px-8 xl:my-25">
    <div class="sm:text-center lg:text-left">
      <h1 class="text-4xl tracking-tight font-extrabold text-gray-800 sm:text-5xl md:text-6xl">
        <span class="block xl:inline">All words</span>
      </h1>
      <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">The random phrase is <b>{{$phrase}}</b></p>  

      <!--Grammars-->
      @foreach($grammars as $grammar)
        <div class="mt-8">
          <h4 class="font-bold text-gray-800 text-l">New Grammar: {{$grammar->id}}</h4>
          <p class="mt-3">{{$grammar->displayLanguage()}}</p>
          <p class="mt-3">{{$grammar->randomPhrase()}}</p>

        </div>
      @endforeach

      <!--Types-->
      @foreach($types as $type)
        <div class="mt-10">
          <h3 class="font-bold text-gray-800 text-xl">{{$type->name}}</h3>
          <p class="mt-3 text-base text-md">{{$type->description}}</p>  
          <ul class="mt-2">
            @foreach($type->words()->get() as $word)
              <li>{{$word->content}}</li>
            @endforeach
          </ul>
        </div>
      @endforeach

    </div>
  </div>
</x-app-layout>
