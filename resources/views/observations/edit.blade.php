<x-app-layout>

  <x-slot name="pageTitle">
    Météœil | Modifier l'observation n° {{ $observation->id }}
  </x-slot>

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

        <div class="mb-2 block">
          <label for="title">Titre :</label><x-required-fields /><br>
          <input type="text" name="title" id="title" required
            value="{{ old('title', $observation->title) }}"
            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div class="mb-2 block">
          <label for="location">Lieu :</label><x-required-fields /><br>
          <input type="text" name="location" id="location" required
            value="{{ old('location', $observation->location) }}"
            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div class="mb-2 inline-block">
          <x-forms.departement-select :observation="$observation" />
        </div>

        <div class="flex flex-row"> <!-- Date & heure -->
          <div class="mr-2">
            <label for="date">Date :</label><x-required-fields /><br>
            <input type="date" name="date" id="date" required
              max="{{ date('Y-m-d') }}"
              value="{{ old('date', $observation->date) }}"
              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
          <div class="mr-2">
            <label for="time">Heure :</label><x-required-fields /><br>
            <input type="time" name="time" id="time" required
              value="{{ old('time', $observation->time) }}"
              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
        </div>

        <div class="flex flex-row"> <!-- Temps & température -->
          <div class="mr-2">
            <x-forms.weather-select :observation="$observation" />
          </div>
          <div class="mr-2">
            <label for="temperature">Température :</label><br>
            <input type="text" inputmode="numeric" pattern="-?[0-9]+"
              name="temperature" id="temperature"
              value="{{ old('temperature', $observation->temperature) }}"
              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
        </div>

        <div class="mb-2 block">
          <label for="description">Description :</label><br>
          <textarea name="description" id="description" rows=6
            value="{{ old('description', $observation->description) }}"
            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $observation->description) }}</textarea>
        </div>

        <div>
          <p class="text-xs text-red-600">
            Les champs marqués d'un * sont obligatoires
          </p>
        </div>

        <x-forms.input-error :messages="$errors->all()" class="mt-2" /><br />
        <x-buttons.primary-button class="mt-4">Publier
        </x-buttons.primary-button>
      </form>
      <a href="{{ route('observations.show', $observation) }}">Retour</a>
    </div>
  </div>

</x-app-layout>
