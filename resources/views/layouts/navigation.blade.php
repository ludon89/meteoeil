<div
  class="z-50 flex w-full flex-wrap border-b border-gray-100 bg-white py-4 text-sm dark:bg-gray-800 sm:flex-nowrap sm:justify-start">
  <nav class="mx-auto flex w-full justify-between px-2 sm:items-center"
    aria-label="Global">
    <div class="flex w-full items-center justify-between">
      <!-- Logo & tagline -->
      <a class="inline-flex items-center gap-x-2 text-xl font-semibold dark:text-white"
        href="{{ route('index') }}">
        <img src="{{ asset('images/logo-meteoeil-cropped-removebg.png') }}"
          alt="Logo du site Météœil" class="h-20">
        <div class="">
          <p class="text-xl text-sky-800">
            Météœil
          </p>
          <p class="text-sm font-light italic text-sky-800">Votre regard sur la
            météo</p>
        </div>
      </a>
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
          class="hs-dropdown-toggle inline-flex h-10 w-10 items-center justify-center gap-2 rounded-md border bg-white p-3 align-middle text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-700 dark:bg-slate-900 dark:text-gray-400 dark:hover:bg-slate-800 dark:hover:text-white dark:focus:ring-offset-gray-800">
          <svg class="h-4 w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg"
            width="16" height="16" fill="currentColor"
            viewBox="0 0 16 16">
            <path
              d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
          </svg>
        </button>
        <div
          class="hs-dropdown-menu duration z-50 mt-2 hidden min-w-[15rem] rounded-lg bg-white p-2 opacity-0 shadow-md transition-[opacity,margin] hs-dropdown-open:opacity-100 dark:border dark:border-gray-700 dark:bg-gray-800"
          aria-labelledby="hs-dropdown-with-header">
          @auth
            <a href="{{ route('profile.edit') }}">
              <div
                class="-m-2 rounded-t-lg bg-gray-100 px-5 py-3 dark:bg-gray-700">
                <p class="text-sm text-gray-500 dark:text-gray-400">Connecté en
                  tant
                  que</p>
                <p class="text-sm font-medium text-gray-800 dark:text-gray-300">
                  {{ Auth::user()->name }}</p>
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
                  href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                             this.closest('form').submit();">
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
    </div>
  </nav>
</div>
