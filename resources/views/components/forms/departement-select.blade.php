@props(['observation'])

<label for="departement">Département :</label><x-required-fields /><br>
<select name="departement" id="departement">
  @isset($observation)
    {{-- Modif d'une observation existante --}}
    @foreach (config('departements') as $code => $name)
      <option value="{{ $code }}"
        {{ old('departement', $observation->departement) == $code ? 'selected' : '' }}>
        {{ $code }} - {{ $name }}
      </option>
    @endforeach
  @else
    {{-- Création d'une nouvelle observation --}}
    <option value="" disabled {{ old('departement') ? '' : 'selected' }}>
      Veuillez sélectionner un département
    </option>
    @foreach (config('departements') as $code => $name)
      <option value="{{ $code }}"
        {{ old('departement') == $code ? 'selected' : '' }}>
        {{ $code }} - {{ $name }}
      </option>
    @endforeach
  @endisset
</select>
