@section('title', 'Edit')
<x-app-layout>
  @include('includes.flash')
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:my-16 lg:my-20 lg:px-8 xl:my-25">
    <div class="sm:text-center lg:text-left">

      <a href="{{{ route("suggestions.index")}}}" class="btn btn-ghost btn-sm my-5">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Suggestions
      </a> 

      <x-text.page-title title="{{$suggestion->content}}" subtitle="Edit this suggestion and change details before approving it"/>
      <form method="POST" action="{{{ route("suggestions.update", ["suggestion" => $suggestion] )}}}">
        @method("PUT")
        @csrf
        <div class="form-control mt-10 sm:max-w-sm">
          <!--Content-->
          <label class="label">
            <span class="label-text">Content</span>
          </label> 
          <input required type="text" name="content" class="input input-bordered" value="{{$suggestion->content}}">

          <!--Word type-->
          <label class="label mt-5">
            <span class="label-text">Word type</span>
          </label>
          <select required class="select select-bordered w-full" name="wordtype_id">
            <option disabled="disabled">Select a wordtype</option> 
            @foreach($types as $type)
              <option @if($suggestion->wordtype_id == $type->id) selected="selected" @endif value="{{$type->id}}">
                {{$type->name}}
              </option>
            @endforeach
          </select>

          <!-- Contains profanity -->
          <label class="cursor-pointer block justify-start space-x-3 mt-8">
              <input id="profanity" @if($suggestion->profanity) checked="checked" @endif type="checkbox" class="checkbox checkbox-sm" name="profanity" value="1">
              <span class="label-text">Profanity</span> 
          </label>

        </div>

        <!--Submit-->
        <x-button-group class="mt-10">
          <button type="submit" class="btn btn-primary ">Save</button> 
        </x-button-group>
      </form>

      {{-- <form method="POST" class="mt-10" method="POST" action="{{{ route("words.destroy", ["word" => $word] )}}}">
        @csrf
        @method("delete")
        <button class="btn btn-error btn-sm">Delete this word</button>
      </form> --}}

    </div>
  </div>
</x-app-layout>
