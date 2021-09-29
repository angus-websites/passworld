@section('title', 'Welcome')
<x-app-layout>
  <div class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
    <div class="sm:text-center lg:text-left">
      <h1 class="text-4xl tracking-tight font-extrabold text-gray-800 sm:text-5xl md:text-6xl">
        <span class="block xl:inline">Generate a</span>
        <span class="block text-seagreen xl:inline">password</span>
      </h1>
      <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">Use one of our randomly generated passwords to keep your accounts safe and secure.</p>

      <!--Password view-->
      <div class="flex flex-row items-center mt-12 space-x-4 bg-gray-200 overflow-hidden sm:rounded-t-lg px-4 py-5 sm:px-6">
        <!--Copy and Refresh buttons-->
        <div class="flex-initial">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
        </div>
        <!--Password view-->
        <div class="flex-1">
          <div class="">
            <p class="sm:text-3xl monoFont">
              adashdgasdnjnj1232'
            </p>
          </div>
        </div>
        <!--Copy and Refresh buttons-->
        <div class="inline-flex flex-initial">
          <button class="hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
              <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
            </svg>
          </button>
          <button class="hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      </div>
      <!--Strength & Time section-->
      <div class="bg-gray-300 px-4 py-1 sm:px-6 sm:rounded-b-lg">
        <p class="text-base text-center">It would take <b>15 years</b> to crack this password</p>
      </div>

      <div class="shadow-ps overflow-hidden sm:rounded-lg mt-8 px-4 py-5 sm:px-6">
        <!--Length Slider-->
        <div class="">
          <!--Length label-->
          <label for="lengthSlider" id="lengthLabel" class="text-lg">Length: 25</label>
          <input id="lengthSlider" type="range" min="3" aria-valuemin="3" max="35" aria-valuemax="35" value="10" aria-valuenow="10" class="slider mt-2" style="width: 100%">
        </div>
        <!--Checkboxes-->
        <div class="mt-7 flex">
          <!--Numbers-->
          <div class="flex-1 text-center">
            <label class="inline-flex items-center">
              <input type="checkbox" class="form-checkbox h-7 w-7 rounded-lg text-mainorange bg-gray-300 border-0">
              <span class="ml-4 text-lg">Numbers</span>
            </label>
          </div>
          <!--Letters-->
          <div class="flex-1 text-center">
            <label class="inline-flex items-center">
              <input type="checkbox" class="form-checkbox h-7 w-7 rounded-lg text-mainorange bg-gray-300 border-0">
              <span class="ml-4 text-lg">Letters</span>
            </label>
          </div>
          <!--Symbols-->
          <div class="flex-1 text-center">
            <label class="inline-flex items-center">
              <input type="checkbox" class="form-checkbox h-7 w-7 rounded-lg text-mainorange bg-gray-300 border-0">
              <span class="ml-4 text-lg">Symbols</span>
            </label>
          </div>
          <!--Rude-->
          <div class="flex-1 text-center">
            <label class="inline-flex items-center">
              <input type="checkbox" class="form-checkbox h-7 w-7 rounded-lg text-mainorange bg-gray-300 border-0">
              <span class="ml-4 text-lg">Rude</span>
            </label>
          </div>
        </div>
      </div>

      
      
    </div>
  </div>
</x-app-layout>
