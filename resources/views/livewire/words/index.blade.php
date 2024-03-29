<div>

    <!-- Alerts -->
    <x-alerts.all />

    <!--Buttons-->
    <div class="mt-8 mb-4">
      @can("create", App\Models\Word::class)
      <x-button-group class="sm:max-w-xs">
        <x-button wire:click="createWord" class="btn btn-primary">Create word</x-button>
        <a href="{{{ route('suggestions.create') }}}" class="btn btn-link text-info">Suggest a new word</a>
      </x-button-group>
      @else
        <a href="{{{ route('suggestions.create') }}}" class="btn btn-link text-info px-0">Suggest a new word</a>
      @endcan
    </div>


    <!-- Table -->
    <div class="overflow-x-auto mt-2">
      <table class="table w-full table-zebra">
        <thead>
          <tr>
            <th></th> 
            <th>Word</th> 
            <th>Type</th> 
            @can("delete", App\Models\Word::class)
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
              @can("update", $word)
                <td>
                  <x-button wire:click="edit({{$word}})" class="btn-ghost btn-xs" >Edit</x-button>
                </td>
              @endcan 
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @canany(["create", "update"], App\Models\Word::class)
      <!-- Edit Modal -->
      <x-modal-daisy id="editModal" wire:model.defer="edit_modal_open">
          <x-slot name="title">
              {{$is_create ? 'Create' : 'Edit'}} Word
          </x-slot>

          <x-slot name="content">
              <div class="grid md:grid-cols-2 gap-4 p-4">
                  <!-- Word content -->
                  <div class="form-control col-span-2">
                      <x-label :value="__('Word')" />
                      <x-input wire:model.defer="editing_word.content"
                                  class="input-bordered"
                                  type="text"
                                  error="editing_word.content"
                                  required />
                  </div>

                  <!--Word type-->
                  <div class="form-control col-span-2">
                    <x-label :value="__('Word type')" for="wordtype_id" />
                    <x-select wire:model="editing_word.wordtype_id"
                              error="editing_word.wordtype_id"
                              id="wordtype" 
                              name="wordtype_id" 
                              class="select-bordered w-full" 
                              required>
                      @foreach($wordtypes as $wordtype)
                        <option value="{{$wordtype->id}}">
                          {{$wordtype->name}}
                        </option>
                      @endforeach
                    </x-select>
                  </div>

                  <!-- Contains profanity -->
                  <div class="form-control col-span-2">
                    <label class="cursor-pointer block justify-start space-x-3 mt-4">
                        <input wire:model="editing_word.profanity" id="profanity" type="checkbox" class="checkbox checkbox-sm" name="profanity">
                        <span class="label-text">Profanity</span> 
                    </label>
                    @error("editing_word.profanity")
                      <label class="label">
                          <span class="label-text-alt">{{ $message }}</span>
                      </label>
                    @enderror
                  </div>


              </div>
          </x-slot>

          <x-slot name="footer">
              @if($this->editing_word->exists)
                  @can("delete", $this->editing_word)
                    <x-button wire:click="deleteWord" class="mr-auto btn-error">Delete</x-button>
                  @endcan
              @endif
              <label for="editModal" class="btn">Cancel</label>
              <x-button wire:click="saveWord" type="button" class="btn btn-primary">Save</x-button>
          </x-slot>
      </x-modal-daisy>
    @endcanany
</div>
