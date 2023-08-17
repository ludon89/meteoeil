<x-app-layout>

  <!-- main content -->
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p class="text-xl font-semibold leading-tight text-gray-800">
      Observation n° {{ $observation->id }}
    </p>

    <h1 class="text-3xl font-bold">
      {{ $observation->title }}
    </h1>
    <div class="max-w-6xl">
      <img
        src="{{ $observation->picture ? asset('storage/' . $observation->picture) : asset('images/placeholders/1200X800.png') }}"
        alt="">
    </div>
    <div class="mb-6 max-w-6xl bg-gray-800 p-4 text-white">
      <div class="flex justify-between">
        <div class="pb-4"> <!-- Lieu et emplacement -->
          <p class="text-2xl">
            {{ $observation->location }} ({{ $observation->departement }})
          </p>
          <p>
            {{ $observation->datetime }}
          </p>
        </div>
        <div class="flex">
          <p class="p-2">{{ $observation->weather }}</p>
          <p class="p-2">{{ $observation->temperature }}</p>
        </div>

      </div>
      <p class="pb-6">
        {{ $observation->description }}
      </p>
      <div class="flex flex-row justify-between">
        <p class="pb-2">
          Par {{ $observation->user->name }}
        </p>
        <!-- modif et suppr observations -->
        @if ($observation->user->is(auth()->user()))
          <div class="pb-4">
            <a
              href="{{ route('observations.edit', $observation) }}">Modifier</a>
            <form method="POST"
              action="{{ route('observations.destroy', $observation) }}">
              @csrf
              @method('DELETE')
              <a href="{{ route('observations.destroy', $observation) }}"
                onclick="event.preventDefault(); this.closest('form').submit();">Supprimer</a>
            </form>
          </div>
        @endif
      </div>
    </div>


    <hr>
    <!-- affichage commentaires -->
    <div class="pb-4">
      <h2 class="pb-4 text-xl font-semibold leading-tight text-gray-800">
        Commentaires
      </h2>
      <div class="pb-2">
        @foreach ($observation->comments as $comment)
          <div class="pb-4">
            <p>{{ $comment->content }}</p>
            <p class="text-sm">Par {{ $comment->user->name }} le
              {{ $comment->created_at }}</p>
            {{-- @if ($comment->user->is(auth()->user()))
              <!-- modif & suppr commentaires -->
              <a href="{{ route('comments.edit', $comment) }}">
                <x-primary-button>Modifier</x-primary-button>
              </a>
              <form method="POST"
                action="{{ route('comments.destroy', $comment) }}">
                @csrf
                @method('DELETE')
                <a href="{{ route('comments.destroy', $comment) }}"
                  onclick="event.preventDefault(); this.closest('form').submit();">
                  <x-danger-button>Supprimer</x-danger-button>
                </a>
              </form>
            @endif --}}
          </div>
        @endforeach
      </div>
    </div>
    <hr>
    @if (Auth::check())
      <!-- ajout commentaire -->
      <div class="mx-auto max-w-2xl p-4 sm:p-6 lg:p-8">
        <h2 class="font-bold">Ajout d'un commentaire</h2>
        <form method="POST"
          action="{{ route('comments.store', ['post' => $observation->id]) }}">
          @csrf
          <textarea name="content"
            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('message') }}</textarea>
          <x-input-error :messages="$errors->all()" class="mt-2" /><br>
          <x-primary-button class="mt-4">Publier</x-primary-button>
        </form>
      </div>
      <hr>
    @endif
    <a href="{{ route('index') }}">Retour</a>
  </div>

</x-app-layout>
