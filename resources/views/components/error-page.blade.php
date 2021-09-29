<div class="flex h-screen max-w-7xl px-4 sm:px-6 lg:px-8 ">
  <!--Middle of screen-->
  <div class="m-auto">
    <div class="flex flex-col md:flex-row md:space-x-6">
      <!--Left-->
      <div class="flex-initial">
        <h1 class="text-4xl tracking-tight font-extrabold sm:text-5xl md:text-6xl">
          <span class="block text-seagreen xl:inline">{{$code}}</span>
        </h1>
      </div>
      <!--Right-->
      <div class="flex-initial">
        <h1 class="text-4xl tracking-tight font-extrabold sm:text-5xl md:text-6xl">
          <span class="block xl:inline">{{$title}}</span>
        </h1>
        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">{{$subtitle}}</p>
        <div class="mt-5 bg-turtleorange">
          <a href="{{ url()->previous() }}" class="btn btn-turtleorange">Back</a>
          <a href="/" class="btn btn-accent">Home</a>
        </div>
      </div>
    </div>
  </div>
</div>