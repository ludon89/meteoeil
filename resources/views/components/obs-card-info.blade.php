<div>
  <p
    {{ $attributes->merge(['class' => 'absolute rounded-md bg-black/60 p-2']) }}>
    {{ $slot }}
  </p>
</div>
