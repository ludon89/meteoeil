<div {{ $attributes->merge(['class' => 'absolute']) }}>
  <span
    {{ $attributes->merge(['class' => 'absolute rounded-md bg-black/50 p-2 text-white max-w-[200px] truncate']) }}>
    {{ $slot }}
  </span>
</div>
