@section('title', 'Portal')
<x-app-layout>
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:my-16 lg:my-20 lg:px-8 xl:my-25">
    <div class="sm:text-center lg:text-left">
      <x-text.page-title title="Dashboard" subtitle="Welcome to the Passworld dashboard"/>
    </div>

    <div class="w-full shadow stats mt-10">
      <div class="stat place-items-center place-content-center">
        <div class="stat-title">Number of words</div> 
        <div class="stat-value">{{$wordCount}}</div> 
      </div> 
      <div class="stat place-items-center place-content-center">
        <div class="stat-title">A$$word's generated</div> 
        <div class="stat-value text-success">N/A</div> 
      </div> 
      <div class="stat place-items-center place-content-center">
        <div class="stat-title">Pending suggestions</div> 
        <div class="stat-value text-error">{{$suggestionCount}}</div> 
      </div>
    </div>

  </div>
</x-app-layout>