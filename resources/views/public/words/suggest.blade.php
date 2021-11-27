@section('title', 'Words')
<x-app-layout>
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:my-16 lg:my-20 lg:px-8 xl:my-25">
    <!--Title-->
    <div class="sm:text-center lg:text-left">
      <x-text.page-title title="Suggest" subtitle="Suggest a new word to be used in the A$$word generator"/>
    </div>
    <!--Middle-->
    <div>
      <!--Form-->
      <div class="max-w-xl mt-10 sm:mx-auto lg:mx-0">
          <form method="POST" action="{{{ route('words.suggestSave') }}}">
              @csrf
              <!--Word type select-->
              <div class="relative inline-block w-full text-gray-700 mb-6">
                <label class="block mb-1" for="wordType">Type of word</label>
                <select required id="wordType" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Regular input" name="wordType">
                  @foreach($types as $type)
                    <option>{{$type->name}}</option>
                    @endforeach
                </select>
              </div>

              <!--Word-->
              <div class="mb-6">
                <label class="block mb-1" for="wordInput">Your word</label>
                <input required class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="wordInput" name="word" autocomplete="off"/>
              </div>


              <!--Submit button-->
              <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
          </form>
      </div>

      <div class="my-20">
        <!--Examples-->
        <h2 class="text-xl tracking-tight font-extrabold text-gray-800 sm:text-2xl md:text-4xl">
          <span class="block xl:inline">Words explained</span>
        </h2>

        <!--Types-->
        <div class="overflow-x-auto mt-10">
          <table class="table w-full">
            <thead>
              <tr>
                <th>Word type</th> 
                <th>Definition</th> 
                <th>Example</th>
              </tr>
            </thead> 
            <tbody>
              @foreach($types as $type)
                <tr>
                  <td>{{$type->name}}</td> 
                  <td>{{$type->description}}</td> 
                  <td><b>{{$type->randomWord()}}</b></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>


      </div>

    </div>
        
  </div>
</x-app-layout>
