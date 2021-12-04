@section('title', 'A$$word')
<x-app-layout>
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:my-16 lg:my-20 lg:px-8 xl:my-25">
    <div class="sm:text-center lg:text-left">
      <x-text.page-title title="Common Passwords" subtitle="View the most common passwords in use today"/>
      
      <div class="flex flex-col mt-10">

        <!--SEARCH BAR-->
        <div class="form-control my-10 flex-row space-x-3">
          <input id="searchInput" type="text" placeholder="Search" class="input input-bordered flex-1" targetTable="commonTable">
          <button class="btn btn-square btn-outline" id="clearButton">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">   
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>                       
            </svg>
          </button>
        </div>
        <div class="overflow-x-auto">
          <table class="table w-full table-zebra table-fixed" id="commonTable">
            <thead>
              <tr>
                <th></th> 
                <th>Password</th> 
                <th>Time to crack</th>
                {{-- @can("delete", App\Models\commonPassword::class)
                  <th></th>           
                @endcan --}}
              </tr>
            </thead> 
            <tbody>
              @foreach($commonPasswords as $password)
                <tr>
                  <td>
                    {{$password->pos}}
                  </td>
                  <td>
                    {{$password->content}}
                  </td>
                  <td>
                    Dunno
                  </td>
                  @can("delete", $password)
                    <th>
                      <form method="POST" action="{{{ route("common.destroy", ["common" => $password]) }}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-xs btn-error">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        </button>
                      </form>
                    </th>           
                  @endcan
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/searchTable.js') }}" defer></script>
</x-app-layout>
