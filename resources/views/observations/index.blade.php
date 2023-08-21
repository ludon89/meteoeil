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
          @switch($observation)
            @case($observation->weather == 'Ensoleillé')
              <i class="bi bi-sun-fill text-3xl"></i>
            @break

            @case($observation->weather == 'Nuageux')
              <i class="bi bi-cloud-sun-fill text-3xl"></i>
            @break

            @case($observation->weather == 'Couvert')
              <i class="bi bi-cloudy-fill text-3xl"></i>
            @break

            @case($observation->weather == 'Pluie faible')
              <i class="bi bi-cloud-drizzle-fill text-3xl"></i>
            @break

            @case($observation->weather == 'Pluie forte')
              <i class="bi bi-cloud-rain-heavy-fill text-3xl"></i>
            @break

            @case($observation->weather == 'Neige')
              <i class="bi bi-cloud-snow-fill text-3xl"></i>
            @break

            @case($observation->weather == 'Pluie et neige mêlées')
              <i class="bi bi-cloud-sleet-fill text-3xl"></i>
            @break

            @case($observation->weather == 'Orage')
              <i class="bi bi-cloud-lightning-fill text-3xl"></i>
            @break

            @case($observation->weather == 'Brouillard')
              <i class="bi bi-cloud-haze-fill text-3xl"></i>
            @break

            @default
              {{ $observation->weather }}
          @endswitch
        </x-obs-card-info>
        <x-obs-card-info class="bottom-0 right-0">
          {{ $observation->temperature }} °C
        </x-obs-card-info>
      </a>
    @endforeach
  </div>

</x-app-layout>
