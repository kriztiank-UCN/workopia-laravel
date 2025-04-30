    {{-- file input --}}
    {{-- dynamic properties with default values --}}
    @props(['id', 'name', 'label' => null, 'required' => false])

    <div class="mb-4">
      @if ($label)
        <label class="block text-gray-700" for="{{ $id }}">{{ $label }}</label>
      @endif
      <input 
        id="{{ $id }}" 
        name="{{ $name }}"
        type="file" 
        {{$required ? 'required' : '' }}
        class="@error($name) border-red-500 @enderror w-full rounded border px-4 py-2 file:cursor-pointer file:rounded file:bg-green-500 file:px-4 file:py-2 file:text-white focus:outline-none" 
      />
      @error($name)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
      @enderror
    </div>
