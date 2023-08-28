<x-guest-layout>

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div>
      <x-input-label for="email" :value="__('E-mail')" />
      <x-text-input id="email" class="mt-1 block w-full" type="email"
        name="email" :value="old('email')" required autofocus
        autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Mot de passe')" />

      <x-text-input id="password" class="mt-1 block w-full" type="password"
        name="password" required autocomplete="current-password" />

      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="mt-4 block">
      <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox"
          class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
          name="remember">
        <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
      </label>
    </div>

    <div class="mt-4 flex items-center justify-end">
      <div class="flex flex-col">
        @if (Route::has('password.request'))
          <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            href="{{ route('password.request') }}">
            Mot de passe oublié ?
          </a>
        @endif
        @if (Route::has('register'))
          <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            href="{{ route('register') }}">
            Pas encore inscrit ?
          </a>
        @endif
      </div>

      <x-primary-button class="ml-3">
        Connexion
      </x-primary-button>
    </div>
  </form>
</x-guest-layout>
