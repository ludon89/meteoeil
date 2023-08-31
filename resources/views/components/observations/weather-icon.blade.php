@switch($observation)
  @case($observation->weather == 'Ensoleillé')
    <i class="bi bi-sun-fill text-3xl" aria-label="Ensoleillé"></i>
  @break

  @case($observation->weather == 'Nuageux')
    <i class="bi bi-cloud-sun-fill text-3xl" aria-label="Nuageux"></i>
  @break

  @case($observation->weather == 'Couvert')
    <i class="bi bi-cloudy-fill text-3xl" aria-label="Couvert"></i>
  @break

  @case($observation->weather == 'Pluie faible')
    <i class="bi bi-cloud-drizzle-fill text-3xl" aria-label="Pluie faible"></i>
  @break

  @case($observation->weather == 'Pluie forte')
    <i class="bi bi-cloud-rain-heavy-fill text-3xl" aria-label="Pluie forte"></i>
  @break

  @case($observation->weather == 'Neige')
    <i class="bi bi-cloud-snow-fill text-3xl" aria-label="Neige"></i>
  @break

  @case($observation->weather == 'Pluie et neige mêlées')
    <i class="bi bi-cloud-sleet-fill text-3xl"
      aria-label="Pluie et neige mêlées"></i>
  @break

  @case($observation->weather == 'Orage')
    <i class="bi bi-cloud-lightning-fill text-3xl" aria-label="Orage"></i>
  @break

  @case($observation->weather == 'Brouillard')
    <i class="bi bi-cloud-haze-fill text-3xl" aria-label="Brouillard"></i>
  @break

  @default
    {{ $observation->weather }}
@endswitch
