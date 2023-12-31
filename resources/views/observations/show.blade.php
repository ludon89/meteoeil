<x-app-layout>

  <x-slot name="pageTitle">
    Météœil | Détails de l'observation n° {{ $observation->id }}
  </x-slot>

  <section>
    <div>
      <h1 class="text-center text-2xl font-bold text-sky-800">
        {{ $observation->title }}
      </h1>
      <p class="text-center">
        Observation n° {{ $observation->id }}
      </p>
    </div>
    <div class="mx-auto my-2 max-w-7xl">
      <a
        href="{{ $observation->picture ? asset('storage/' . $observation->picture) : '#' }}">
        <img
          src="{{ $observation->picture ? asset('storage/' . $observation->picture) : asset('images/placeholders/1200X800.png') }}"
          alt="Observation n° {{ $observation->id }}"
          class="mx-auto max-h-screen rounded-md">
      </a>
    </div>
    <div class="mb-6 max-w-6xl rounded-md bg-black/70 p-4 text-white">
      <div class="flex justify-between">
        <div class="pb-4"> <!-- Lieu et emplacement -->
          <p class="py-2 text-lg">
            {{ $observation->location }} ({{ $observation->departement }})
          </p>
        </div>
        <div class="flex">
          @isset($observation->weather)
            <p class="max-w-[200px] p-2">
              <x-observations.weather-icon :observation="$observation" />
            </p>
          @endisset
          @isset($observation->temperature)
            <p class="p-2">{{ $observation->temperature }}&nbsp;°C</p>
          @endisset
        </div>
      </div>
      <p class="pb-6">
        {{ $observation->description }}
      </p>
      <div class="flex flex-row justify-between">
        <p class="pb-2">
          Par {{ $observation->user->name }} <br>
          Le {{ $observation->date }} à {{ $observation->time }}
        </p>
        <!-- modif et suppr observations -->
        <div class="flex pb-4">
          @can('update', $observation)
            <a href="{{ route('observations.edit', $observation) }}"
              class="mx-2 inline-flex h-12 items-center justify-center gap-2 rounded-md border border-transparent bg-sky-800 px-3 py-2 text-sm font-semibold text-white transition-all hover:bg-sky-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
              <span class="hidden sm:inline">Modifier</span>
              <i class="bi bi-pencil-square text-2xl sm:hidden"></i>
              <span class="sr-only sm:hidden">Modifier</span>
            </a>
          @endcan
          @can('delete', $observation)
            <form method="POST"
              action="{{ route('observations.destroy', $observation) }}">
              @csrf
              @method('DELETE')
              <button
                class="mx-2 inline-flex h-12 items-center justify-center gap-2 rounded-md border border-transparent bg-red-700 px-3 py-2 text-sm font-semibold text-white transition-all hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                <span class="hidden sm:inline">Supprimer</span>
                <i class="bi bi-x-square-fill text-2xl sm:hidden"></i>
                <span class="sr-only sm:hidden">Supprimer</span>
              </button>
            </form>
          @endcan
        </div>
      </div>
    </div>
  </section>

  @if ($observation->comments->count())
    <!-- affichage commentaires -->
    <section class="pb-4">
      <h2 class="pb-4 text-xl font-semibold leading-tight text-gray-800">
        Commentaires
      </h2>
      <div class="pb-2">
        @foreach ($observation->comments as $comment)
          <article class="pb-6">
            <h2 class="sr-only">Commentaire n° {{ $comment->id }}</h2>
            <p class="pb-2">{{ $comment->content }}</p>
            <p class="pb-2 text-sm">Par {{ $comment->user->name }} le
              {{ $comment->created_at }}</p>
            <!-- modif & suppr commentaires -->
            <div class="flex">
              @can('update', $comment)
                <a href="{{ route('comments.edit', $comment) }}"
                  class="mx-2 inline-flex h-12 items-center justify-center gap-2 rounded-md border border-transparent bg-sky-800 px-3 py-2 text-sm font-semibold text-white transition-all hover:bg-sky-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                  <span class="hidden sm:inline">Modifier</span>
                  <i class="bi bi-pencil-square text-lg sm:hidden"></i>
                  <span class="sr-only sm:hidden">Modifier</span>
                </a>
              @endcan
              @can('delete', $comment)
                <form method="POST"
                  action="{{ route('comments.destroy', $comment) }}">
                  @csrf
                  @method('DELETE')
                  <button
                    class="mx-2 inline-flex h-12 items-center justify-center gap-2 rounded-md border border-transparent bg-red-700 px-3 py-2 text-sm font-semibold text-white transition-all hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    <span class="hidden sm:inline">Supprimer</span>
                    <i class="bi bi-x-square-fill text-lg sm:hidden"></i>
                    <span class="sr-only sm:hidden">Supprimer</span>
                  </button>
                </form>
              @endcan
            </div>
          </article>
        @endforeach
      </div>
    </section>
  @endif

  @if (Auth::check())
    <!-- ajout commentaire -->
    <section class="mx-auto max-w-3xl p-4 sm:p-6 lg:p-8">
      <h2 class="font-bold">Écrire un commentaire</h2>
      <form method="POST"
        action="{{ route('comments.store', ['observation' => $observation->id]) }}">
        @csrf
        <textarea name="content" rows="3"
          class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
        <x-forms.input-error :messages="$errors->all()" class="mt-2" /><br>
        <x-buttons.primary-button
          class="mt-4">Publier</x-buttons.primary-button>
      </form>
    </section>
    <hr>
  @endif
  <a href="{{ route('index') }}">Retour</a>

</x-app-layout>
