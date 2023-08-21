<div {{ $attributes->merge(['class' => 'absolute']) }}>
  <span
    {{ $attributes->merge(['class' => 'absolute rounded-md bg-black/50 p-2 text-white']) }}>
    {{ $slot }}
  </span>
</div>
