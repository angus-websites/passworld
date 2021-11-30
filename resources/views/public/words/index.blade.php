@section('title', 'Words')
<x-app-layout>
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:my-16 lg:my-20 lg:px-8 xl:my-25">
    <div class="sm:text-center lg:text-left">
      <x-text.page-title title="All words" subtitle="View all the words for the A$$word generator"/>

      <!--View all words-->
      <a href="{{{ route('suggestions.create') }}}" class="mt-8 btn btn-link text-info px-0">Suggest a new word</a>

      <!--Word table-->
      <div class="overflow-x-auto mt-2">
        <table class="table w-full table-zebra">
          <thead>
            <tr>
              <th></th> 
              <th>Word</th> 
              <th>Type</th> 
              @can("delete", App\Models\Word::class)
                <th>Select</th>    
                <th></th>           
              @endcan
            </tr>
          </thead> 
          <tbody>
            @foreach($words as $counter=>$word)
              <tr>
                <td>{{$counter+1}}</td> 
                <th>{{$word->content}}</th> 
                <td><span class="tableTag badge {{$word->wordType()->name}}BG">{{$word->wordType()->name}}</span></td>
                @can("delete", App\Models\Word::class)
                  <td><input type="checkbox" class="checkbox" name="words[]" value="{{$word->id}}"></td>
                  <td><a href="" class="btn btn-xs btn-ghost">Edit</a></td>
                @endcan 
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      @can("delete", App\Models\Word::class)
        <!--Button bar (admins)-->
        <div class="sticky bottom-0 py-5  mt-10">
          <div class="flex flex-col sm:flex-row sm:space-x-5 space-y-5 sm:space-y-0 justify-center max-w-xs mx-auto">
            <button name="action" value="delete" type="submit" class="btn btn-error btn-block">Delete</button>
          </div>
        </div>
      @endcan
    </div>
  </div>
</x-app-layout>
