<div>
    <!--Table-->
    <div class="overflow-x-auto">
      <table class="table w-full">
        <thead>
          <tr>
            <th>Suggestion</th>
            <th>Type</th> 
            <th colspan="3">Profanity</th> 
          </tr>
        </thead> 
        <tbody>
          @foreach($suggestions as $suggestion)
            <tr>
              <td>{{$suggestion->content}}</td> 
              <td>{{$suggestion->wordType()->name}}</td>
              <td>{{$suggestion->profanity ? "Yes" : "No"}}</td> 
              @can("update",$suggestion)
                <td>
                  <a href="{{{ route('suggestions.edit', ['suggestion' => $suggestion]) }}}" class="btn btn-xs btn-ghost">Edit</a>
                </td>
              @endcan
              @can("approve", App\Models\Suggestion::class)
                <td>
                    <x-button-group>
                        <x-button class="btn-xs btn-error">Deny</x-button>
                        <x-button class="btn-xs btn-success">Approve</x-button>
                    </x-button-group>
                </td>
              @endcan
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
