<div>

    <x-alerts.all/>
    <!--Form-->
    <div class="sm:mx-auto lg:mx-0">
        <form wire:submit.prevent="submitWord">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-5">

                <!--Word type select-->
                <div class="col-span-1">
                    <label class="label" for="wordType">Type of word</label>
                    <x-select
                        wire:model="wordtype_id"
                        required
                        id="wordType"
                        error="wordtype_id"
                        class="select select-bordered w-full">

                        <option disabled="disabled" value="">Select a wordtype</option> 
                        @foreach($word_types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </x-select>
                    <label class="label">
                        <p class="label-text-alt">See <a class="link" href="#types_of_words">below</a> for help choosing word type</p> 
                    </label>
                </div>

                <!--Word-->
                <div class="col-span-full">
                    <div class="flex flex-col gap-y-5">

                        @if($this->user_word_preview_valid)
                            <!-- Preview -->
                            <div class="flex-1">
                                
                                    <div class="flex flex-col gap-y-2">
                                        <div class="flex-1">
                                            <div class="text-center">
                                                <b>{{$user_word_preview}}</b>
                                            </div>
                                        </div>
                                        <x-button type="button" wire:click="refreshPreview" class="btn-sm">Refresh</x-button>
                                    </div>
                            </div>
                        @endif


                        <!-- Word input -->
                        <div class="flex-1">
                            <label class="label" for="wordInput">Your word</label>
                            <x-input
                                    wire:model.debounce.250ms="user_word"
                                    id="wordInput"
                                    class="w-full"
                                    type="text"
                                    error="user_word*"
                                    name="content"
                                    required 
                                    autofocus
                                    autocomplete="off" />
                        </div>
                    </div>
                </div>

                <!-- Contains profanity -->
                <div class="py-2">
                    <label class="cursor-pointer block justify-start space-x-3">
                        <input wire:model="is_profanity" id="profanity" type="checkbox" class="checkbox checkbox-sm" name="profanity">
                        <span class="label-text">Is your word a profanity?</span> 
                    </label>
                </div>

                <!--Submit button-->
                <div class="col-start-1">
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
