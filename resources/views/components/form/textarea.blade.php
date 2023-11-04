@props([
    'name',
])

<div class="mb-6">
    <label for="{{ $name }}" class="block mb-2 uppercase font-bold text-xs text-gray-700">
        {{ ucwords($name) }}
    </label>
    <textarea
        class="border border-gray-400 p-2 w-full"
        name="{{ $name }}"
        id="{{ $name }}"
        required
    >{{ old($name) }}
    </textarea>
    @error($name)
        <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
    @enderror
</div>
