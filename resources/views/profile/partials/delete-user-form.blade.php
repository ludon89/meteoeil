<section class="space-y-6">
  <header>
    <h2 class="text-lg font-medium text-gray-900">
      {{ __('Supprimer votre compte') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600">
      {{ __('La suppression de votre compte entraînera la suppression de toutes les données qui lui sont associées.') }}
    </p>
  </header>

  <x-buttons.danger-button x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Supprimer votre compte') }}</x-buttons.danger-button>

  <x-modals.delete-user-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()"
    focusable>
    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
      @csrf
      @method('delete')

      <h2 class="text-lg font-medium text-gray-900">
        {{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}
      </h2>

      <p class="mt-1 text-sm text-gray-600">
        {{ __('La suppression de votre compte entraînera la suppression de toutes les données qui lui sont associées.') }}
      </p>

      <div class="mt-6">
        <x-forms.input-label for="password" value="{{ __('Password') }}"
          class="sr-only" />

        <x-forms.text-input id="password" name="password" type="password"
          class="mt-1 block w-3/4" placeholder="{{ __('Password') }}" />

        <x-forms.input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
      </div>

      <div class="mt-6 flex justify-end">
        <x-buttons.secondary-button x-on:click="$dispatch('close')">
          {{ __('Annuler') }}
        </x-buttons.secondary-button>

        <x-buttons.danger-button class="ml-3">
          {{ __('Supprimer votre compte') }}
        </x-buttons.danger-button>
      </div>
    </form>
  </x-modals.delete-user-modal>
</section>
