{{-- <nav x-data="{ open: false }"  class="bg-gray-800 shadow-md">
  <div class="container mx-auto px-6 md:px-3 ">
    <div class="relative flex items-center justify-between h-16">
      
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex-shrink-0 flex items-center">
          <img class="block lg:hidden h-8 w-auto" src="/assets/images/core/logo.svg" alt="Workflow">
          <img class="hidden lg:block h-8 w-auto" src="/assets/images/core/logo.svg" alt="Workflow">
        </div>
        <div class="hidden sm:block sm:ml-6">
          <div class="flex space-x-4">
            <a href="/" class="px-3 py-2 rounded-md text-md font-medium {{ Request::is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}" aria-current="page">Generate</a>

            <a href="/ass" class="px-3 py-2 rounded-md text-md font-medium {{ Request::is('ass') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}" aria-current="page">A$$word</a>

            <a href="/common" class="px-3 py-2 rounded-md text-md font-medium {{ Request::is('common') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}" aria-current="page">Common</a>

          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static hidden sm:block">
        @if (Auth::check())
          <x-dropdown align="right" width="48" class="sm:hidden">
            <x-slot name="trigger">
              <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                <div>{{ Auth::user()->name }}</div>
                <div class="ml-1">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </div>
              </button>
            </x-slot>
            <x-slot name="content">
              <!--Other links-->
              <x-dropdown-link href="/dashboard" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
              </x-dropdown-link>
              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                {{ __('Log out') }}
              </x-dropdown-link>
            </form>
          </x-slot>
          </x-dropdown>
        @else
          <a href="/login" class="px-3 py-2 text-md font-medium rounded-md {{ Request::is('login') ? 'bg-gray-900 text-white' : 'text-gray-500 hover:bg-green-100 hover:text-green-600' }}" aria-current="page">Login</a>
        @endif
      </div>

      <!-- Hamburger-->
      <div class="-mr-2 flex items-center sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Responsive Navigation Menu -->
  <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
      <x-responsive-nav-link href="/" :active="request()->routeIs('index')">
        {{ __('Generate') }}
      </x-responsive-nav-link>
      <x-responsive-nav-link href="/projects" :active="request()->routeIs('assword')">
        {{ __('A$$word') }}
      </x-responsive-nav-link>
      <x-responsive-nav-link href="/contact" :active="request()->routeIs('common')">
        {{ __('Common Passwords') }}
      </x-responsive-nav-link>
    </div>

    @if (Auth::check())
      <!-- Responsive Settings Options -->
      <div class="pt-4 pb-1 border-t border-gray-200">
        <div class="flex items-center px-4">
          <div class="flex-shrink-0">
            <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </div>

          
            <div class="ml-3">
              <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
              <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
        </div> 

        <div class="mt-3 space-y-1">
          <!--Other links-->
          <x-responsive-nav-link href="/dashboard" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
          </x-responsive-nav-link>

          <!-- Authentication -->
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
            onclick="event.preventDefault();
            this.closest('form').submit();">
            {{ __('Log out') }}
          </x-responsive-nav-link>
        </form>
      </div>
    @else
      <div class="pt-2 border-t border-gray-200">
        <!--Other links-->
        <x-responsive-nav-link href="/login" :active="request()->routeIs('login')">
          {{ __('Login') }}
        </x-responsive-nav-link>
      </div>
    @endif

  </div>
  </div>
</nav> --}}

<div class="navbar mb-2 shadow-lg bg-neutral-focus text-neutral-content">
  <div class="container mx-auto px-6 md:px-3 ">
    <div class="px-2 mx-2 navbar-start">
      <img class="block lg:hidden h-8 w-auto" src="/assets/images/core/logo.svg" alt="Workflow">
      <img class="hidden lg:block h-8 w-auto" src="/assets/images/core/logo.svg" alt="Workflow">
    </div> 
    <div class="hidden px-2 mx-2 navbar-center lg:flex">
      <div class="flex items-stretch space-x-1">
        <a {!! Request::is('/') ? '' : 'href="/"' !!} class="btn btn-sm rounded-btn {{ Request::is('/') ? 'btn-active bg-gray-500 hover:bg-gray-500' : 'btn-ghost hover:bg-gray-600'}}">
          Home
        </a>
        <a {!! Request::is('ass') ? '' : "href='/ass'" !!} class="btn btn-sm rounded-btn {{ Request::is('ass') ? 'btn-active bg-gray-500 hover:bg-gray-500' : 'btn-ghost hover:bg-gray-600'}}">
          A$$word
        </a>
        <a {!! Request::is('common') ? '' : 'href="/common"' !!} class="btn btn-sm rounded-btn {{ Request::is('common') ? 'btn-active bg-gray-500 hover:bg-gray-500' : ' btn-ghost hover:bg-gray-600'}}">
          Common
        </a>

      </div>
    </div> 
    <div class="navbar-end text-right">
      <button class="btn btn-square btn-ghost">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">     
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>                     
        </svg>
      </button> 
      <button class="btn btn-square btn-ghost">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">             
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>             
        </svg>
      </button>
    </div>
  </div>
</div>

