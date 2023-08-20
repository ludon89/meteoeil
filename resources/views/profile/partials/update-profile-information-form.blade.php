<section>
  <header>
    <h2 class="text-lg font-medium text-gray-900">
      {{ __('Profile Information') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600">
      {{ __("Update your account's profile information and email address.") }}
    </p>
  </header>

  <form id="send-verification" method="post"
    action="{{ route('verification.send') }}">
    @csrf
  </form>

  <form method="post" action="{{ route('profile.update') }}"
    enctype="multipart/form-data" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <div>
      <x-input-label for="name" :value="__('Name')" />
      <x-text-input id="name" name="name" type="text"
        class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus
        autocomplete="name" />
      <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" name="email" type="email"
        class="mt-1 block w-full" :value="old('email', $user->email)" required
        autocomplete="username" />
      <x-input-error class="mt-2" :messages="$errors->get('email')" />

      @if (
          $user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&
              !$user->hasVerifiedEmail())
        <div>
          <p class="mt-2 text-sm text-gray-800">
            {{ __('Your email address is unverified.') }}

            <button form="send-verification"
              class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              {{ __('Click here to re-send the verification email.') }}
            </button>
          </p>

          @if (session('status') === 'verification-link-sent')
            <p class="mt-2 text-sm font-medium text-green-600">
              {{ __('A new verification link has been sent to your email address.') }}
            </p>
          @endif
        </div>
      @endif
    </div>

    <div>
      <label for="avatar" class="block">Avatar :</label>
      <input type="file" id="avatar" name="avatar"
        class="block w-full text-sm text-gray-500 file:mr-4 file:rounded-md file:border-0 file:bg-blue-500 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-600" />
      <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
    </div>


    <div class="flex items-center gap-4">
      <x-primary-button>Enregistrer</x-primary-button>

      @if (session('status') === 'profile-updated')
        <p x-data="{ show: true }" x-show="show" x-transition
          x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
          {{ __('Saved.') }}</p>
      @endif
    </div>
  </form>

  @if (!is_null(auth()->user()->avatar))
    <form method="POST" action="{{ route('profile.avatar.destroy') }}"
      class="mt-6 space-y-2">
      @csrf
      @method('DELETE')
      <p>Photo actuelle:</p>
      <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar"
        class="h-20">
      <button type="submit">Supprimer</button>
    </form>
  @endif
</section>
