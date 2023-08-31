<x-guest-layout>

  <x-slot name="pageTitle">
    Météœil | Inscription
  </x-slot>

  <form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div>
      <x-forms.input-label for="name" :value="__('Nom d\'utilisateur')" />
      <x-forms.text-input id="name" class="mt-1 block w-full" type="text"
        name="name" :value="old('name')" required autofocus autocomplete="name" />
      <x-forms.input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
      <x-forms.input-label for="email" :value="__('Email')" />
      <x-forms.text-input id="email" class="mt-1 block w-full"
        type="email" name="email" :value="old('email')" required
        autocomplete="username" />
      <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-forms.input-label for="password" :value="__('Mot de passe')" />

      <x-forms.text-input id="password" class="mt-1 block w-full"
        type="password" name="password" required autocomplete="new-password" />

      <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
      <x-forms.input-label for="password_confirmation" :value="__('Confirmez le mot de passe')" />

      <x-forms.text-input id="password_confirmation" class="mt-1 block w-full"
        type="password" name="password_confirmation" required
        autocomplete="new-password" />

      <x-forms.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="mt-4 flex items-center justify-end">
      <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        href="{{ route('login') }}">
        {{ __('Déjà inscrit ?') }}
      </a>

      <x-buttons.primary-button class="ml-4">
        {{ __('Inscription') }}
      </x-buttons.primary-button>
    </div>
  </form>
</x-guest-layout>
