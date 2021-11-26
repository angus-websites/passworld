
<!--New Navbar-->
<div x-data="{ open: false }" class="bg-neutral-focus">
  <nav class="navbar shadow-lg  text-neutral-content">

    <!--Top navbar-->
    <div class="container mx-auto px-6 md:px-3 border-green-500">
      <!--Logo on navbar-->
      <div class="px-2 mx-2 navbar-start">
        <img class="block lg:hidden h-8 w-auto" src="/assets/images/core/logo.svg" alt="Workflow">
        <img class="hidden lg:block h-8 w-auto" src="/assets/images/core/logo.svg" alt="Workflow">
      </div> 

      <!--Middle of navbar-->
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

      <!--End of navbar-->
      <div class="navbar-end flex">

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
          <a {!! Request::is('login') ? '' : 'href="/login"' !!} class="btn btn-sm rounded-btn hidden lg:flex flex-grow-0 {{ Request::is('login') ? 'btn-active bg-gray-500 hover:bg-gray-500' : 'btn-ghost hover:bg-gray-600'}}">Login</a>
        @endif

        <!--Hamburger-->
        <button @click="open = ! open" class="lg:hidden btn btn-square btn-ghost hover:bg-gray-100 hover:text-gray-500 drawer-button" for="my-drawer">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>

  </nav>

  <!-- Responsive Navigation Menu -->
  <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden w-full">
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

