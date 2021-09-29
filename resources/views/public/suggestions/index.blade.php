@section('title', 'Suggestions')
<x-app-layout>
  @include('includes.flash')
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:my-16 lg:my-20 lg:px-8 xl:my-25">
    <div class="sm:text-center lg:text-left">
      <x-text.page-title title="Suggestions" subtitle="View all the current suggested words by users"/>
    </div>

    @if (count($suggestions) > 0)
      <form method="POST"  action="{{{ route('suggestions.process') }}}">
        @csrf
        <!--Table-->
        <div class="overflow-x-auto mt-10">
          <table class="table w-full">
            <thead>
              <tr>
                <th>Suggestion</th> 
                <th>Type</th> 
                <th colspan="2">Edit</th>
              </tr>
            </thead> 
            <tbody>
              @foreach($suggestions as $suggestion)
                <tr>
                  <td>{{$suggestion->content}}</td> 
                  <td>{{$suggestion->wordType()->name}}</td> 
                  <td>
                    <input type="checkbox" class="checkbox" name="suggestions[]" value="{{$suggestion->id}}">
                  </td>
                  @can("update",$suggestion)
                    <td>
                      <a href="{{{ route('suggestions.edit', ['suggestion' => $suggestion]) }}}" class="btn btn-xs btn-ghost">Edit</a>
                    </td>
                  @endcan
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!--Buttons-->
        <div class="flex flex-col sm:flex-row sm:space-x-5 space-y-5 sm:space-y-0 mt-10 justify-center max-w-xs mx-auto">
          @can('delete', App\Models\Suggestion::class)
            <button name="action" value="delete" type="submit" class="btn btn-error btn-block">Delete</button>
          @endcan
          @can("approve", App\Models\Suggestion::class)
            <button name="action" value="approve" type="submit" class="btn btn-success btn-block">Approve</button> 
          @endcan
        </div>
      </form>
    @else
      <p class="mt-5">No suggestions to review</p>
    @endif

  </div>
</x-app-layout>