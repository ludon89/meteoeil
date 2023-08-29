@props(['observation'])

<label for="weather">Météo :</label><br>
<select name="weather" id="weather">
  @isset($observation)
    <option value="Ensoleillé"
      {{ old('weather', $observation->weather) == 'Ensoleillé' ? 'selected' : '' }}>
      Ensoleillé
    </option>
    <option value="Nuageux"
      {{ old('weather', $observation->weather) == 'Nuageux' ? 'selected' : '' }}>
      Nuageux
    </option>
    <option value="Couvert"
      {{ old('weather', $observation->weather) == 'Couvert' ? 'selected' : '' }}>
      Couvert
    </option>
    <option value="Pluie faible"
      {{ old('weather', $observation->weather) == 'Pluie faible' ? 'selected' : '' }}>
      Pluie faible
    </option>
    <option value="Pluie forte"
      {{ old('weather', $observation->weather) == 'Pluie forte' ? 'selected' : '' }}>
      Pluie forte
    </option>
    <option value="Neige"
      {{ old('weather', $observation->weather) == 'Neige' ? 'selected' : '' }}>
      Neige
    </option>
    <option value="Pluie et neige mêlées"
      {{ old('weather', $observation->weather) == 'Pluie et neige mêlées' ? 'selected' : '' }}>
      Pluie et neige mêlées
    </option>
    <option value="Orage"
      {{ old('weather', $observation->weather) == 'Orage' ? 'selected' : '' }}>
      Orage
    </option>
    <option value="Brouillard"
      {{ old('weather', $observation->weather) == 'Brouillard' ? 'selected' : '' }}>
      Brouillard
    </option>
  @else
    <option value="" disabled {{ old('weather') ? '' : 'selected' }}>
      Quel temps fait-il ?
    </option>
    <option value="Ensoleillé"
      {{ old('weather') == 'Ensoleillé' ? 'selected' : '' }}>
      Ensoleillé
    </option>
    <option value="Nuageux" {{ old('weather') == 'Nuageux' ? 'selected' : '' }}>
      Nuageux
    </option>
    <option value="Couvert" {{ old('weather') == 'Couvert' ? 'selected' : '' }}>
      Couvert
    </option>
    <option value="Pluie faible"
      {{ old('weather') == 'Pluie faible' ? 'selected' : '' }}>
      Pluie faible
    </option>
    <option value="Pluie forte"
      {{ old('weather') == 'Pluie forte' ? 'selected' : '' }}>
      Pluie forte
    </option>
    <option value="Neige" {{ old('weather') == 'Neige' ? 'selected' : '' }}>
      Neige
    </option>
    <option value="Pluie et neige mêlées"
      {{ old('weather') == 'Pluie et neige mêlées' ? 'selected' : '' }}>
      Pluie et neige mêlées
    </option>
    <option value="Orage" {{ old('weather') == 'Orage' ? 'selected' : '' }}>
      Orage
    </option>
    <option value="Brouillard"
      {{ old('weather') == 'Brouillard' ? 'selected' : '' }}>
      Brouillard
    </option>
  @endisset
</select>
