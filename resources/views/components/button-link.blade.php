@props([
    'url' => '/',
    'icon' => null,
    'bgClass' => 'bg-yellow-500',
    'hoverClass' => 'hover:bg-yellow-600',
    'textClass' => 'text-black',
])

<a href="{{ $url }}"
  class="{{ $bgClass }} {{ $hoverClass }} {{ $textClass }} rounded px-4 py-2 transition duration-300 hover:shadow-md">
  @if ($icon)
    <i class="fa fa-{{ $icon }} mr-1"></i>
  @endif
  {{ $slot }}
</a>
