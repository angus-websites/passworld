@section('title', 'A$$word')
<x-app-layout>
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:my-16 lg:my-20 lg:px-8 xl:my-25">
    <div class="sm:text-center lg:text-left">
      <x-text.page-title title="A$$word" subtitle="Generate a strong and memorable rude password"/>
      <!--View password-->
      <div class="flex flex-row items-center mt-20 space-x-4 bg-gray-200 overflow-hidden rounded-lg px-4 py-5 sm:px-6 flex-col md:flex-row space-y-5 md:space-y-0 ">
        <!--Password view-->
        <div class="flex-1">
          <div class="">
            <p id="assLabel" class="md:text-5xl text-2xl sm:text-3xl monoFont text-center">
              {{$assword}}
            </p>
          </div>
        </div>
      </div>
    </div>
    <!--Buttons-->
    <div class="mt-5 sm:mt-10 flex flex-col justify-center flex-grow xs:flex-row space-y-2 xs:space-y-0 xs:space-x-2">
      <!--Left button-->
      <button class="btn btn-primary btn-lg space-x-1">
        <!--Refresh Icon-->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
          <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
        </svg>
        <span>Copy</span>
      </button>
      <!--Right button-->
      <button class="btn btn-secondary btn-lg space-x-1 mt-5" id="generate">
        <!--Generate icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 animate-reverse-spin" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
        </svg>
        <span>Generate</span>
      </button>
    </div>
  </div>

  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
      function runSearch(){
        $.ajax({
          type:"GET",
          url: '/quick_ass',
          success: function(data) {
            console.log(data);
            $("#assLabel").text(data)
          },
          error: function (){
             console.log("Error during ajax request")
          }
        })
      }

      $("#generate").click(function(){
        runSearch();
      });
    });
  </script>
</x-app-layout>
