<header
  class="z-50 flex w-full flex-wrap border-b border-gray-100 bg-white py-4 text-sm dark:bg-gray-800 sm:flex-nowrap sm:justify-start">
  <nav
    class="mx-auto flex w-full max-w-[85rem] justify-between px-2 sm:items-center"
    aria-label="Global">
    <!-- Logo & tagline -->
    <div class="flex items-center justify-between">
      <a class="inline-flex items-center gap-x-2 text-xl font-semibold dark:text-white"
        href="{{ route('index') }}">
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
        class="mt-5 flex flex-col gap-5 sm:mt-0 sm:flex-row sm:items-center sm:justify-end sm:px-5">
        <a class="font-medium text-blue-500" href="{{ route('index') }}"
          aria-current="page">Accueil</a>
        <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500"
          href="{{ route('observations.create') }}">Poster une observation</a>
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
          <a href="{{ route('profile.edit') }}">
            <div class="-m-2 rounded-t-lg bg-gray-100 px-5 py-3 dark:bg-gray-700">
              <p class="text-sm text-gray-500 dark:text-gray-400">Connecté en tant
                que</p>
              <p class="text-sm font-medium text-gray-800 dark:text-gray-300">
                james@site.com</p>
            </div>
          </a>
        @endauth
        <div class="mt-2 py-2 first:pt-0 last:pb-0">
          <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 sm:hidden"
            href="{{ route('index') }}">
            Accueil
          </a>
          <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 sm:hidden"
            href="{{ route('observations.create') }}">
            Poster une observation
          </a>
          @auth
            <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
              href="{{ route('dashboard') }}">
              Vos observations
            </a>
            @if (Auth::user()->is_admin)
              <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                href="{{ route('admin.dashboard') }}">
                Dashboard admin
              </a>
            @endif
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                href="{{ route('logout') }}">
                Déconnexion
              </a>
            </form>
          @endauth

          @guest
            <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
              href="{{ route('login') }}">
              Connexion
            </a>
            <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
              href="{{ route('register') }}">
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
