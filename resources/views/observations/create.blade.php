<x-app-layout>

  <div class="mx-auto max-w-5xl px-4 py-6 sm:px-6 lg:px-8">
    <h1 class="text-xl font-semibold leading-tight text-gray-800">
      Nouvelle observation
    </h1>
    <div class="mx-auto max-w-5xl p-4 sm:p-6 lg:p-8">
      <form method="POST" enctype="multipart/form-data"
        action="{{ route('observations.store') }}" class="pb-4">
        @csrf
        @method('POST')

        <label for="title">Titre :</label><br>
        <input type="text" name="title" id="title"
          value="{{ old('title') }}"
          class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <label for="location">Lieu :</label><br>
        <input type="text" name="location" id="location"
          value="{{ old('location') }}"
          class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <label for="departement">Département :</label><br>
        <input type="text" name="departement" id="departement"
          value="{{ old('departement') }}"
          class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

        <div class="flex flex-row"> <!-- Date & heure -->
          <div class="pr-2">
            <label for="date">Date :</label><br>
            <input type="date" name="date" id="date"
              value="{{ old('date') }}"
              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
          <div class="pr-2">
            <label for="time">Heure :</label><br>
            <input type="time" name="time" id="time"
              value="{{ old('time') }}"
              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
        </div>

        <div class="flex flex-row"> <!-- Temps & température -->
          <div class="pr-2">
            <label for="weather">Météo :</label><br>
            <select name="weather" id="weather">
              <option value="" disabled
                {{ old('weather') ? '' : 'selected' }}>
                Quel temps fait-il ?
              </option>
              <option value="Ensoleillé"
                {{ old('weather') == 'Ensoleillé' ? 'selected' : '' }}>
                Ensoleillé
              </option>
              <option value="Nuageux"
                {{ old('weather') == 'Nuageux' ? 'selected' : '' }}>
                Nuageux
              </option>
              <option value="Couvert"
                {{ old('weather') == 'Couvert' ? 'selected' : '' }}>
                Couvert
              </option>
              <option value="Pluie faible"
                {{ old('weather') == 'Pluie faible' ? 'selected' : '' }}>
                Pluie faible
              </option>
              <option value="Pluie forte"
                {{ old('weather') == 'Pluie forte' ? 'selected' : '' }}>
                Pluie forte
              </option>
              <option value="Neige"
                {{ old('weather') == 'Neige' ? 'selected' : '' }}>
                Neige
              </option>
              <option value="Pluie et neige mêlées"
                {{ old('weather') == 'Pluie et neige mêlées' ? 'selected' : '' }}>
                Pluie et neige mêlées
              </option>
              <option value="Orage"
                {{ old('weather') == 'Orage' ? 'selected' : '' }}>
                Orage
              </option>
              <option value="Brouillard"
                {{ old('weather') == 'Brouillard' ? 'selected' : '' }}>
                Brouillard
              </option>
            </select>
          </div>
          <div class="pr-2">
            <label for="temperature">Température :</label><br>
            <input type="text" inputmode="numeric" pattern="[0-9]+"
              name="temperature" id="temperature"
              value="{{ old('temperature') }}"
              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
        </div>

        <label for="description">Description :</label><br>
        <textarea name="description" id="description" rows=6
          value="{{ old('description') }}"
          class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
        <label for="picture">Image :</label><br>
        <input type="file" name="picture" id="picture">

        <x-forms.input-error :messages="$errors->all()" class="mt-2" /><br />
        <x-buttons.primary-button class="mt-4">Publier
        </x-buttons.primary-button>
      </form>
      <a href="{{ url()->previous() }}">Retour</a>
    </div>
  </div>

</x-app-layout>
