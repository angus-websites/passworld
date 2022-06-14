<div>
    <!-- Alerts -->
    <x-alerts.all />

    <!-- Toolbar -->
    <div class="flex flex-col md:flex-row md:gap-x-4 gap-y-4">
        <!-- Search -->
        <div x-data="{ term: @entangle('search_term') }" class="flex flex-col gap-y-4 flex-1">
            <!-- Search input -->
            <div class="form-control w-full">
              <label class="label" for="searchBar">
                <span class="label-text">Search for common words</span>
              </label>
              <input  wire:model="search_term" id="searchBar" type="text" placeholder="Search" class="input input-bordered" />
            </div>
            @if($this->search_term)
                <!-- Clear button -->
                <div>
                    <x-button x-on:click="term = ''" class="btn-block btn-sm">Clear</x-button>
                </div>
            @endif
        </div>

        <!-- Sort -->
        <div>
            <div class="form-control w-full">
              <label for="sort" class="label">
                <span class="label-text">Sort</span>
              </label>
              <select wire:model="sort_by" id="sort" class="select select-bordered">
                <option disabled selected>Sort by</option>
                <option value="pos">Popularity</option>
                <option value="content">Name</option>
              </select>
            </div>
        </div>
    </div>


    <!-- Table -->
    <div class="overflow-x-auto mt-10">
      <table class="table w-full">
        <!-- head -->
        <thead>
          <tr>
            <th>Rank</th>
            <th colspan="2">Password</th>
          </tr>
        </thead>
        <tbody>
            @forelse($common_passwords as $password)
              <tr>
                <th>{{$password->pos}}</th>
                <td>{{$password->content}}</td>
              </tr>
            @empty
                <tr>
                  <th colspan="3">No passwords found</th>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    {{ $common_passwords->links() }}
                </td>
            </tr>
        </tfoot>
      </table>
    </div>

</div>
