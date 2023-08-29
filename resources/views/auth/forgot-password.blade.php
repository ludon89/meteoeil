<x-guest-layout>
  <div class="mb-4 text-sm text-gray-600">
    Si vous avez oublié votre mot de passe, veuillez entrer l'adresse e-mail
    avec laquelle vous vous êtes inscrit pour réinitialiser votre mot de passe.
  </div>

  <form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div>
      <x-forms.input-label for="email" :value="__('E-mail')" />
      <x-forms.text-input id="email" class="mt-1 block w-full" type="email"
        name="email" :value="old('email')" required autofocus />
      <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="mt-4 flex items-center justify-end">
      <x-primary-button>
        Envoyer un e-mail
      </x-primary-button>
    </div>
  </form>
</x-guest-layout>
