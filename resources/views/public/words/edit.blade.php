@section('title', 'Words')
<x-app-layout>
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:my-16 lg:my-20 lg:px-8 xl:my-25">
    <div class="sm:text-center lg:text-left">

      <a href="{{{ route("words.index")}}}" class="btn btn-ghost btn-sm my-5">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Words
      </a> 

      <x-text.page-title title="{{$word->content}}" subtitle="Edit this word"/>
      <form>
        <div class="form-control mt-10 sm:max-w-sm">
          <!--Content-->
          <label class="label">
            <span class="label-text">Content</span>
          </label> 
          <input type="text" placeholder="username" class="input input-bordered" value="{{$word->content}}">

          <!--Word type-->
          <label class="label mt-5">
            <span class="label-text">Word type</span>
          </label>
          <select class="select select-bordered w-full">
            <option disabled="disabled">Select a wordtype</option> 
            @foreach($types as $type)
              <option @if($word->wordtype_id == $type->id) selected="selected" @endif>
                {{$type->name}}
              </option>
            @endforeach
          </select>
        </div>

        <!--Submit-->
        <button class="btn btn-primary mt-10">Save</button> 
      </form>


    </div>
  </div>
</x-app-layout>
