<x-app-layout>

  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1 class="text-xl font-semibold leading-tight text-gray-800">
      Dernières observations
    </h1>
  </div>

  <div class="columns-1 gap-6 px-2 text-gray-100 sm:columns-2 md:columns-3">
    @foreach ($observations as $observation)
      <a class="group relative mb-6 block overflow-hidden"
        href="{{ route('observations.show', $observation) }}">
        <img class="aspect-auto w-full rounded-md"
          src="{{ $observation->picture ? asset('storage/' . $observation->picture) : asset('images/placeholders/1200X800.png') }}" />
        <x-obs-card-info class="left-0 top-0">
          {{ $observation->location }}
        </x-obs-card-info>
        <x-obs-card-info class="bottom-0 left-0">
          {{ $observation->weather }}
        </x-obs-card-info>
        <x-obs-card-info class="bottom-0 right-0">
          {{ $observation->temperature }} °C
        </x-obs-card-info>
      </a>
    @endforeach
  </div>

  <div class="mx-auto max-w-7xl p-4 sm:p-6 lg:p-8">
    @foreach ($observations as $observation)
      <div class="pb-6">
        <h1 class="font-bold">
          <a href="{{ route('observations.show', $observation) }}">
            {{ $observation->location }}
          </a>
        </h1>
        <div class="max-w-xl">
          <img
            src="{{ $observation->picture ? asset('storage/' . $observation->picture) : asset('images/placeholders/1200X800.png') }}"
            alt="">
          <div class="flex justify-between">
            <div>
              <p>{{ $observation->weather }}</p>
            </div>
            <div>
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
