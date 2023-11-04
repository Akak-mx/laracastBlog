@props([
    'name',
])

@error($name)
    <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
@enderror
