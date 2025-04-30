    {{-- text input --}}
    {{-- dynamic properties with default values --}}
    @props(['id', 'name', 'label' => null, 'type' => 'text', 'value' => '',
    'placeholder' => '', 'required' => false])

    <div class="mb-4">
      @if($label)
      <label class="block text-gray-700" for="{{ $id }}">{{ $label }}</label>
      @endif
      <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="{{ $type }}"
        placeholder="{{ $placeholder }}"
        value="{{ old($name, $value) }}"
        {{$required ? 'required' : '' }}
        class="w-full px-4 py-2 border rounded focus:outline-none @error($name) border-red-500 @enderror"
      />
      @error($name)
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>
