<div>
    @php 
    $wordT = $word_types[2]; 
    $myWord = "Football";
    $myDict =  [
        $wordT->id => $myWord
    ];
    @endphp
    <p>My word is {{$myWord}}</p>
    <p>An example of {{$wordT->name}} is {{$wordT->randomWord()}} </p>
    <p> Some grammars for {{$wordT->name}} are ... </p>
    <article class="prose">
        <ul>
        @foreach(App\Models\Grammar::getGrammarsByWordType($wordT) as $grammar)
            <li>{{$grammar->displayLanguage()}}</li>
            <ul>
                <li>{{ $grammar->phrase("_", $myDict, 1) }}</li>
            </ul>
        @endforeach
        </ul>
    </article>
    <!--Form-->
    <div class="max-w-xl sm:mx-auto lg:mx-0">
        <form>
            <div class="grid grid-cols-1 space-y-4">
                <!--Word type select-->
                <div class="relative inline-block w-full text-gray-700">
                  <label class="label" for="wordType">Type of word</label>
                  <select required id="wordType" class="select select-bordered w-full" name="wordtype_id">
                    <option disabled="disabled" selected="selected" value="">Select a wordtype</option> 
                    @foreach($word_types as $type)
                      <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                  </select>
                  <label class="label">
                    <p class="label-text-alt">See below for help choosing word type</p> 
                  </label>
                </div>

                <!--Word-->
                <div>
                  <label class="label" for="wordInput">Your word</label>
                  <x-input id="wordInput" class="w-full"
                                  type="text"
                                  name="content"
                                  required autocomplete="off" />
                  <label class="label">
                    <p class="label-text-alt">Submissions are anonymous</p> 
                  </label>
                </div>

                <!-- Contains profanity -->
                <label class="cursor-pointer block justify-start space-x-3">
                    <input id="profanity" type="checkbox" class="checkbox checkbox-sm" name="profanity" value="1">
                    <span class="label-text">Is this a profanity?</span> 
                </label>

                <!--Submit button-->
                <div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
