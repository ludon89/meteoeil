<x-app-layout>

  <div class="mx-auto max-w-5xl px-4 py-6 sm:px-6 lg:px-8">
    <h1 class="text-xl font-semibold leading-tight text-gray-800">
      Nouvelle observation
    </h1>
    <div class="mx-auto max-w-5xl p-4 sm:p-6 lg:p-8">
      <form method="POST" enctype="multipart/form-data" action=""
        class="pb-4">
        @csrf
        <label for="title">Titre :</label><br>
        <input type="text" name="title" id="title"
          class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <label for="location">Lieu :</label>
        <input type="text" name="location" id="location"
          class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <label for="departement">Département :</label>
        <input type="text" name="departement" id="departement"
          class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <label for="datetime">Date et heure :</label>
        {{-- <input type="datetime-local" name="datetime" id="datetime"
          class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"> --}}

        <label for="content">Description :</label>
        <textarea name="content" id="content" rows=10
          class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
        <label for="picture">Image :</label><br />
        <input type="file" name="picture" id="picture">

        <x-input-error :messages="$errors->all()" class="mt-2" /><br />
        <x-primary-button class="mt-4">{{ __('Publier') }}
        </x-primary-button>
      </form>
      <a href="{{ url()->previous() }}">Retour</a>
    </div>
  </div>

</x-app-layout>
