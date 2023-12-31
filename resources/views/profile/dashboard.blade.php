<x-app-layout>

  <x-slot name="pageTitle">
    Météœil | Vos observations
  </x-slot>

  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1 class="text-xl font-semibold leading-tight text-gray-800">
      Vos observations
    </h1>
  </div>

  <div class="mx-auto mb-10 grid max-w-3xl grid-cols-1 gap-12 text-gray-100">
    @foreach ($observations as $observation)
      <a href="{{ route('observations.show', $observation) }}">
        <div class="aspect-h-3 aspect-w-4 relative">
          <img
            src="{{ $observation->picture ? asset('storage/' . $observation->picture) : asset('images/placeholders/1200X800.png') }}"
            alt=""
            class="absolute left-0 top-0 h-full w-full rounded-md object-cover">
          <x-observations.obs-card-info class="left-0 top-0">
            {{ $observation->location }}
          </x-observations.obs-card-info>
          <x-observations.obs-card-info class="bottom-0 left-0">
            <x-observations.weather-icon :observation="$observation" />
          </x-observations.obs-card-info>
          <x-observations.obs-card-info class="bottom-0 right-0">
            {{ $observation->temperature }} °C
          </x-observations.obs-card-info>
        </div>
      </a>
    @endforeach
  </div>

</x-app-layout>
