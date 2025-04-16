{{-- select --}}
{{-- dynamic properties with default values --}}
@props(['id', 'name', 'label' => null, 'options' => [], 'value' => ''])

<div class="mb-4">
  @if ($label)
    <label class="block text-gray-700" for="{{ $id }}">{{ $label }}</label>
  @endif
  <select id="{{ $id }}" name="{{ $name }}"
    class="@error($name) border-red-500 @enderror w-full rounded border px-4 py-2 focus:outline-none">
    @foreach ($options as $optionValue => $optionLabel)
      <option value="{{ $optionValue }}" {{ old($name, $value) == $optionValue ? 'selected' : '' }}>
        {{ $optionLabel }}
      </option>
    @endforeach
  </select>
  @error($name)
    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
  @enderror
</div>
