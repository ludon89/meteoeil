<x-app-layout>

  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold">
      Modifier un commentaire
    </h1>
    <div class="mx-auto max-w-5xl p-4 sm:p-6 lg:p-8">
      <form method="POST" action="{{ route('comments.update', $comment) }}"
        class="pb-4">
        @csrf
        @method('PUT')
        <label for="content">Commentaire :</label>
        <textarea name="content" id="content" rows=10
          class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('content', $comment->content) }}</textarea>
        <x-forms.input-error :messages="$errors->all()" class="mt-2" /><br>
        <x-buttons.primary-button
          class="mt-4">{{ __('Publier') }}</x-buttons.primary-button>
        <a href="{{ route('index') }}">Retour</a>
      </form>
    </div>

  </div>

</x-app-layout>
