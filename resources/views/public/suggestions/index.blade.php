@section('title', 'Portal')
<x-app-layout>
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:my-16 lg:my-20 lg:px-8 xl:my-25">
    <div class="sm:text-center lg:text-left">
      <x-text.page-title title="Suggestions" subtitle="View all the current suggested words by users"/>
    </div>

    <!--Table-->
    <div class="overflow-x-auto mt-10">
      <table class="table w-full">
        <thead>
          <tr>
            <th>Suggestion</th> 
            <th>Type</th> 
            <th></th>
          </tr>
        </thead> 
        <tbody>
          @foreach($suggestions as $suggestion)
            <tr>
              <td>{{$suggestion->content}}</td> 
              <td>{{$suggestion->wordType()->name}}</td> 
              <td>
                <div class="btn-group">
                  <button class="btn btn-error btn-sm">Delete</button> 
                  <button class="btn btn-sm">Edit</button> 
                  <button class="btn btn-success btn-sm">Approve</button> 
                </div> 
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</x-app-layout>