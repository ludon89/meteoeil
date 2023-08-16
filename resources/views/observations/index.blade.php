<x-app-layout>

  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      Dernières observations
    </h2>
  </div>
  <div class="mx-auto max-w-7xl p-4 sm:p-6 lg:p-8">
    @foreach ($observations as $observation)
      <div class="pb-6">
        <h2 class="font-bold">
          <a href="{{ route('observations.show', $observation) }}">
            {{ $observation->location }}
          </a>
        </h2>
        <div class="max-w-xl">
          <img
            src="{{ $observation->picture ? asset('storage/' . $observation->picture) : asset('images/placeholders/1200X800.png') }}"
            alt="">
          <div class="flex justify-between">
            <div>
              <p>{{ $observation->weather }}</p>
            </div>
            <div>
              {{-- @if ($observation->user->is(auth()->user()))
                  <a href="{{ route('observations.edit', $observation) }}">Modifier</a>
                  <form method="POST"
                    action="{{ route('observations.destroy', $observation) }}">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('observations.destroy', $observation) }}"
                      onclick="event.preventDefault(); this.closest('form').submit();">Supprimer</a>
                  </form>
                @endif --}}
            </div>
            <div>
              <p>{{ $observation->temperature }}</p>
            </div>
          </div>
        </div>
      </div>
      <hr>
    @endforeach
  </div>

</x-app-layout>
