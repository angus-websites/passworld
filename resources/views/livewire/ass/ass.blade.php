<div x-data="{text_to_copy: '{{$assword}}', text_copied: false}">

    <div class="grid grid-cols-1 space-y-8 mt-20">
        <!--Password view-->
        <div class="bg-white overflow-x-auto rounded-lg px-4 py-5 sm:px-6">
          <p id="assLabel" class="md:text-4xl text-2xl sm:text-3xl monoFont text-center">
            {{$assword}}
          </p>
        </div>

        <!--Buttons-->
        <x-button-group class="mt-5 sm:mt-10 justify-center">
          <!--Left button-->
          <x-button @click.prevent="window.navigator.clipboard.writeText(text_to_copy);text_copied=true;setTimeout(() => text_copied = false, 2000)" class="md:btn-lg">
            <!--Refresh Icon-->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
              <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
            </svg>
            <span>Copy</span>
          </x-button>
          <!--Right button-->
          <x-button wire:click="refreshAss" class="btn-secondary md:btn-lg space-x-1 mt-5" id="generate">
            <!--Generate icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
            </svg>
            <span>Generate</span>
          </x-button>
        </x-button-group>

        <!-- Copied [jit] -->
        <div :class="text_copied ? '' : 'invisible'" class="p-2 text-center my-10"> 
            Copied to clipboard!
        </div>

        <!-- Suggest new word -->
        <div>
            <x-link-button href="{{{ route('suggestions.create') }}}" class="btn-link text-info">Suggest a new word</x-link-button>
        </div>
    </div>
</div>
