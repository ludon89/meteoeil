@props(['observation'])

<label for="weather">Météo :</label><br>
<select name="weather" id="weather">
  @isset($observation)
    {{-- Modif d'une observation existante --}}
    <option value="" disabled {{ old('weather') ? '' : 'selected' }}>
      Quel temps fait-il ?
    </option>
    @foreach (config('weather') as $item)
      <option value="{{ $item }}"
        {{ old('weather', $observation->weather) == $item ? 'selected' : '' }}>
        {{ $item }}
      </option>
    @endforeach
  @else
    {{-- Création d'une nouvelle observation --}}
    <option value="" disabled {{ old('weather') ? '' : 'selected' }}>
      Quel temps fait-il ?
    </option>
    @foreach (config('weather') as $item)
      <option value="{{ $item }}"
        {{ old('weather') == $item ? 'selected' : '' }}>
        {{ $item }}
      </option>
    @endforeach
  @endisset
</select>
