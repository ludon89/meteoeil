{{-- <div> --}}
<nav x-data="{ open: false }" class="border-b border-gray-100 bg-white">
  <!-- Primary Navigation Menu -->
  <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 justify-between">
      <div class="flex">
        <!-- Logo -->
        <div class="flex shrink-0 items-center">
          <a href="{{ route('index') }}">
            <x-application-logo
              class="block h-12 w-auto fill-current text-gray-800" />
          </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
          <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            Tableau de bord
          </x-nav-link>
          <!-- Accès dashboard admin -->
          @auth
            @if (Auth::user()->is_admin)
              <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                Tableau de bord admin
              </x-nav-link>
            @endif
          @endauth
          <x-nav-link :href="route('observations.create')" :active="request()->routeIs('observations.create')">
            Nouvelle observation
          </x-nav-link>
        </div>
      </div>

      <!-- Settings Dropdown -->
      <div class="hidden sm:ml-6 sm:flex sm:items-center">
        <x-dropdown align="right" width="48">
          <x-slot name="trigger">
            <button
              class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none">
              @auth
                <div>{{ Auth::user()->name }}</div>
              @else
                <div>Connexion</div>
              @endauth

              <div class="ml-1">
                <svg class="h-4 w-4 fill-current"
                  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
                </svg>
              </div>
            </button>
          </x-slot>

          <x-slot name="content">
            @auth
              <x-dropdown-link :href="route('profile.edit')">
                Profil
              </x-dropdown-link>

              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                  onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                  Déconnexion
                </x-dropdown-link>
              </form>
            @else
              <x-dropdown-link :href="route('login')">
                Connexion
              </x-dropdown-link>
              <x-dropdown-link :href="route('register')">
                Inscription
              </x-dropdown-link>
            @endauth
          </x-slot>
        </x-dropdown>
      </div>

      <!-- Hamburger -->
      <div class="-mr-2 flex items-center sm:hidden">
        <button @click="open = ! open"
          class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none">
          <svg class="h-6 w-6" stroke="currentColor" fill="none"
            viewBox="0 0 24 24">
            <path :class="{ 'hidden': open, 'inline-flex': !open }"
              class="inline-flex" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{ 'hidden': !open, 'inline-flex': open }"
              class="hidden" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Responsive Navigation Menu -->
  <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
    <div class="space-y-1 pb-3 pt-2">
      <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        Dashboard
      </x-responsive-nav-link>
      <!-- Accès dashboard admin -->
      @auth
        @if (Auth::user()->is_admin)
          <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
            Tableau de bord admin
          </x-responsive-nav-link>
        @endif
      @endauth
      <x-responsive-nav-link :href="route('observations.create')" :active="request()->routeIs('observations.create')">
        Nouvelle observation
      </x-responsive-nav-link>
    </div>

    <!-- Responsive Settings Options -->
    <div class="border-t border-gray-200 pb-1 pt-4">
      @auth
        <div class="px-4">
          <div class="text-base font-medium text-gray-800">
            {{ Auth::user()->name }}
          </div>
        </div>
      @endauth

      <div class="mt-3 space-y-1">
        @auth
          <x-responsive-nav-link :href="route('profile.edit')">
            Profil
          </x-responsive-nav-link>

          <!-- Authentication -->
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
              onclick="event.preventDefault();
                                          this.closest('form').submit();">
              Déconnexion
            </x-responsive-nav-link>
          </form>
        @else
          <x-responsive-nav-link :href="route('login')">
            Connexion
          </x-responsive-nav-link>
          <x-responsive-nav-link :href="route('register')">
            Inscription
          </x-responsive-nav-link>
        @endauth
      </div>
    </div>
  </div>
</nav>
{{-- </div> --}}


<header
  class="z-50 flex w-full flex-wrap bg-white py-4 text-sm dark:bg-gray-800 sm:flex-nowrap sm:justify-start">
  <nav
    class="mx-auto flex w-full max-w-[85rem] justify-between px-2 sm:items-center"
    aria-label="Global">
    <!-- Logo & tagline -->
    <div class="flex items-center justify-between">
      <a class="inline-flex items-center gap-x-2 text-xl font-semibold dark:text-white"
        href="#">
        <img src="{{ asset('images/logo-meteoeil-cropped-removebg.png') }}"
          alt="Logo du site Météœil" class="h-20">
        <div>
          <h1 class="text-xl text-sky-800">
            Météœil
          </h1>
          <p class="text-sm font-light italic text-sky-800">Votre
            regard sur la
            météo</p>
        </div>
      </a>
    </div>
    <!-- Nav links (hidden < sm) -->
    <div id="navbar-image-and-text-1"
      class="hs-collapse hidden grow basis-full overflow-hidden transition-all duration-300 sm:block">
      <div
        class="mt-5 flex flex-col gap-5 sm:mt-0 sm:flex-row sm:items-center sm:justify-end sm:pl-5">
        <a class="font-medium text-blue-500" href="#"
          aria-current="page">Accueil</a>
        <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500"
          href="#">Poster une observation</a>
      </div>
    </div>
    <!-- Dropdown -->
    <div class="hs-dropdown relative inline-flex">
      <button id="hs-dropdown-custom-icon-trigger" type="button"
        class="hs-dropdown-toggle inline-flex items-center justify-center gap-2 rounded-md border bg-white p-3 align-middle text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-700 dark:bg-slate-900 dark:text-gray-400 dark:hover:bg-slate-800 dark:hover:text-white dark:focus:ring-offset-gray-800">
        <svg class="h-4 w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg"
          width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path
            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
        </svg>
      </button>
      <div
        class="hs-dropdown-menu duration z-50 mt-2 hidden min-w-[15rem] rounded-lg bg-white p-2 opacity-0 shadow-md transition-[opacity,margin] hs-dropdown-open:opacity-100 dark:border dark:border-gray-700 dark:bg-gray-800"
        aria-labelledby="hs-dropdown-with-header">
        @auth
          <div class="-m-2 rounded-t-lg bg-gray-100 px-5 py-3 dark:bg-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">Connecté en tant
              que</p>
            <p class="text-sm font-medium text-gray-800 dark:text-gray-300">
              james@site.com</p>
          </div>
        @endauth
        <div class="mt-2 py-2 first:pt-0 last:pb-0">
          <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 sm:hidden"
            href="#">
            Accueil
          </a>
          <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 sm:hidden"
            href="#">
            Poster une observation
          </a>
          @auth
            <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
              href="#">
              Vos observations
            </a>
            @if (Auth::user()->is_admin)
              <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                href="#">
                Dashboard admin
              </a>
            @endif
            <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
              href="#">
              Déconnexion
            </a>
          @endauth

          @guest
            <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
              href="#">
              Connexion
            </a>
            <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
              href="#">
              Inscription
            </a>
          @endguest
        </div>
      </div>
    </div>
  </nav>
</header>


{{-- <div class="pr-1 sm:hidden">
  <button type="button"
    class="hs-collapse-toggle inline-flex items-center justify-center gap-2 rounded-md border bg-white p-2 align-middle text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-700 dark:bg-slate-900 dark:text-gray-400 dark:hover:bg-slate-800 dark:hover:text-white dark:focus:ring-offset-gray-800"
    data-hs-collapse="#navbar-image-and-text-1"
    aria-controls="navbar-image-and-text-1"
    aria-label="Toggle navigation">
    <svg class="h-4 w-4 hs-collapse-open:hidden" width="16"
      height="16" fill="currentColor" viewBox="0 0 16 16">
      <path fill-rule="evenodd"
        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
    </svg>
    <svg class="hidden h-4 w-4 hs-collapse-open:block" width="16"
      height="16" fill="currentColor" viewBox="0 0 16 16">
      <path
        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
    </svg>
  </button>
</div> --}}
