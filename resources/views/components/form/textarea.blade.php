@props([
    'name',
])

<div class="mb-6">
    <x-form.label name="{{ $name }}" />
    <textarea
        class="border border-gray-200 p-2 w-full rounded"
        name="{{ $name }}"
        id="{{ $name }}"
        required
    >{{ $slot }}
    </textarea>
    <x-form.error name="{{ $name }}" />
</div>
