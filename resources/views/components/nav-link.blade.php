@props(['url' => '/', 'active' => false, 'icon' => null])

<a href="{{ $url }}" class="{{ $active ? 'text-yellow-500 font-bold' : '' }} py-2 text-white hover:underline">
  @if ($icon)
  <i class="fa fa-gauge mr-1"></i>
  @endif
  {{ $slot }}
</a>
