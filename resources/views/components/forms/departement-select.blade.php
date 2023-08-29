<label for="departement">Département :</label><br>
<select name="departement" id="departement">
  <option value="" disabled selected>
    Veuillez sélectionner un département
  </option>
  @foreach (config('departements') as $code => $name)
    <option value="{{ $code }}"
      {{ old('departement') == $code ? 'selected' : '' }}>
      {{ $code }} - {{ $name }}
    </option>
  @endforeach
</select>
