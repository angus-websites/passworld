@section('title', 'Create')
<x-app-layout>
  @include('includes.flash')
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:my-16 lg:my-20 lg:px-8 xl:my-25">
    <div class="sm:text-center lg:text-left">

      <x-text.page-title title="Create" subtitle="Create a new word"/>
      <form method="POST" action="{{{ route("words.store")}}}">
        @csrf
        <div class="form-control mt-10 sm:max-w-sm">
          <!--Content-->
          <label class="label">
            <span class="label-text">Content</span>
          </label> 
          <input required type="text" name="content" class="input input-bordered">

          <!--Word type-->
          <label class="label mt-5">
            <span class="label-text">Word type</span>
          </label>
          <select required class="select select-bordered w-full" name="wordtype_id">
            <option disabled="disabled">Select a wordtype</option> 
            @foreach($types as $type)
              <option value="{{$type->id}}">
                {{$type->name}}
              </option>
            @endforeach
          </select>
        </div>

        <!--Submit-->
        <x-button-group class="mt-10">
          <a href="{{{ route("words.index")}}}" class="btn btn">Cancel</a> 
          <button type="submit" class="btn btn-primary ">Save</button> 
        </x-button-group>
      </form>

    </div>
  </div>
</x-app-layout>
