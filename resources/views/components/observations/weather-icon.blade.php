@switch($observation)
  @case($observation->weather == 'Ensoleillé')
    <i class="bi bi-sun-fill text-3xl"></i>
    <span class="sr-only">Ensoleillé</span>
  @break

  @case($observation->weather == 'Nuageux')
    <i class="bi bi-cloud-sun-fill text-3xl"></i>
    <span class="sr-only">Nuageux</span>
  @break

  @case($observation->weather == 'Couvert')
    <i class="bi bi-cloudy-fill text-3xl"></i>
    <span class="sr-only">Couvert</span>
  @break

  @case($observation->weather == 'Pluie faible')
    <i class="bi bi-cloud-drizzle-fill text-3xl"></i>
    <span class="sr-only">Pluie faible</span>
  @break

  @case($observation->weather == 'Pluie forte')
    <i class="bi bi-cloud-rain-heavy-fill text-3xl"></i>
    <span class="sr-only">Pluie forte</span>
  @break

  @case($observation->weather == 'Neige')
    <i class="bi bi-cloud-snow-fill text-3xl"></i>
    <span class="sr-only">Neige</span>
  @break

  @case($observation->weather == 'Pluie et neige mêlées')
    <i class="bi bi-cloud-sleet-fill text-3xl"></i>
    <span class="sr-only">Pluie et neige mêlées</span>
  @break

  @case($observation->weather == 'Orage')
    <i class="bi bi-cloud-lightning-fill text-3xl"></i>
    <span class="sr-only">Orage</span>
  @break

  @case($observation->weather == 'Brouillard')
    <i class="bi bi-cloud-haze-fill text-3xl"></i>
    <span class="sr-only">Brouillard</span>
  @break

  @default
    <span>{{ $observation->weather }}</span>
@endswitch
