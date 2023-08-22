<x-app-layout>

  <div class="mx-auto max-w-5xl px-4 py-6 sm:px-6 lg:px-8">
    <h2 class="text-center text-xl font-semibold leading-tight text-gray-800">
      Modifier une observation
    </h2>

    <div class="mx-auto max-w-xs">
      <img
        src="{{ $observation->picture ? asset('storage/' . $observation->picture) : asset('images/placeholders/1200X800.png') }}"
        alt="">
    </div>

    <div class="mx-auto max-w-5xl p-4 sm:p-6 lg:p-8">
      <form method="POST" enctype="multipart/form-data"
        action="{{ route('observations.update', $observation) }}" class="pb-4">
        @csrf
        @method('PUT')

        <label for="title">Titre :</label><br>
        <input type="text" name="title" id="title"
          value="{{ old('title', $observation->title) }}"
          class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <label for="location">Lieu :</label><br>
        <input type="text" name="location" id="location"
          value="{{ old('location', $observation->location) }}"
          class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <label for="departement">Département :</label><br>
        <input type="text" name="departement" id="departement"
          value="{{ old('departement', $observation->departement) }}"
          class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

        {{-- <div class="flex flex-row"> <!-- Date & heure -->
          <div class="pr-2">
            <label for="date">Date :</label><br>
            <input type="date" name="date" id="date"
              value="{{ old('date', $observation->date) }}"
              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
          <div class="pr-2">
            <label for="time">Heure :</label><br>
            <input type="time" name="time" id="time"
              value="{{ old('time', $observation->time) }}"
              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
        </div> --}}

        <div class="flex flex-row"> <!-- Temps & température -->
          <div class="pr-2">
            <label for="weather">Temps :</label><br>
            <select name="weather" id="weather">
              <option value="{{ old('weather', $observation->weather) }}">
                {{ old('weather', $observation->weather) }}
              </option>
              <option value="Ensoleillé">Ensoleillé</option>
              <option value="Nuageux">Nuageux</option>
              <option value="Couvert">Couvert</option>
              <option value="Pluie faible">Pluie faible</option>
              <option value="Pluie forte">Pluie forte</option>
              <option value="Neige">Neige</option>
              <option value="Pluie et neige mêlées">Pluie et neige mêlées
              </option>
              <option value="Orage">Orage</option>
              <option value="Brouillard">Brouillard</option>
            </select>
          </div>
          <div class="pr-2">
            <label for="temperature">Température :</label><br>
            <input type="text" inputmode="numeric" pattern="[0-9]+"
              name="temperature" id="temperature"
              value="{{ old('temperature', $observation->temperature) }}"
              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
        </div>

        <label for="description">Description :</label><br>
        <textarea name="description" id="description" rows=6 value=""
          class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $observation->description) }}</textarea>

        <x-input-error :messages="$errors->all()" class="mt-2" /><br />
        <x-primary-button class="mt-4">Publier
        </x-primary-button>
      </form>
      <a href="{{ route('observations.show', $observation) }}">Retour</a>
    </div>
  </div>

</x-app-layout>
