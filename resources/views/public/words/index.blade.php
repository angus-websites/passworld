@section('title', 'Words')
<x-app-layout>
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:my-16 lg:my-20 lg:px-8 xl:my-25">
    <div class="sm:text-center lg:text-left">
      <x-text.page-title title="All words" subtitle="View all the words for the A$$word generator"/>

      <!--Word table-->
      <div class="overflow-x-auto mt-10">
        <table class="table w-full table-zebra">
          <thead>
            <tr>
              <th></th> 
              <th>Word</th> 
              <th>Type</th> 
            </tr>
          </thead> 
          <tbody>
            @foreach($words as $counter=>$word)
              <tr>
                <td>{{$counter+1}}</td> 
                <th>{{$word->content}}</th> 
                <td><span class="tableTag badge {{$word->wordType()->name}}BG">{{$word->wordType()->name}}</span></td> 
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    
    </div>
  </div>
</x-app-layout>
