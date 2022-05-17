<!--Navbar-->
<nav x-data="{ open: false }" class="bg-background">
  <nav class="navbar shadow-lg  text-neutral-content">
    <!--Top navbar-->
    <div class="container mx-auto px-6 md:px-3">
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
          <!--Desktop dropdown--->
          <div class="dropdown dropdown-end hidden lg:block">
            <!--Trigger-->
            <div tabindex="0" class="btn btn-ghost btn-xs text-gray-500">
                <span>{{ Auth::user()->name }}</span>
                <svg class="fill-current h-4 w-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div> 

            <ul tabindex="0" class="p-2 shadow menu dropdown-content bg-base-100 text-neutral rounded-box w-52">
              <li>
                <a href="/dashboard">Dashboard</a>
              </li>
              <li>
                <a href="/account">Account</a>
              </li> 
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                  <li>
                    <a onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                  </li> 
              </form>

            </ul>
          </div>

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
  <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden w-full bg-gray-50 text-base-content">
    <ul class="menu p-4 overflow-y-auto">
      <x-responsive-nav-link href="/" :active="Request::is('/')">
        {{ __('Generate') }}
      </x-responsive-nav-link>
      <x-responsive-nav-link href="/ass" :active="Request::is('ass')">
        {{ __('A$$word') }}
      </x-responsive-nav-link>
      <x-responsive-nav-link href="/common" :active="Request::is('common')">
        {{ __('Common passwords') }}
      </x-responsive-nav-link>
    </ul>

    @if (Auth::check())
      <!--User info-->
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
      </div>

      <ul class="menu p-4 overflow-y-auto">
        <!--Dashboard link-->
        <x-responsive-nav-link href="/dashboard" :active="Request::is('dashboard')">
          {{ __('Dashboard') }}
        </x-responsive-nav-link>
        <!--Logout link-->
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Log out') }}
          </x-responsive-nav-link>
        </form>
      </ul>
    @else
      <ul class="menu p-4 overflow-y-auto border-t border-gray-200">
        <x-responsive-nav-link href="/login" :active="Request::is('login')">
          {{ __('Login') }}
        </x-responsive-nav-link>
      </ul>
    @endif
  </div>
</nav>

