<x-layout>
    <x-setting heading="Submit new Post">
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title" />

            <x-form.input name="slug" />

            <x-form.textarea name="excerpt" />

            <x-form.textarea name="body" />

            <x-form.input name="thumbnail" type="file" />

            <x-form.field name="category_id">
                <x-form.label name="category" />
                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id}}"
                            {{ old('category_id') === $category->id ? 'selected' : '' }}
                        >
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>
            </x-form.field>

            <x-form.button>Publish</x-form>
        </form>
    </x-setting>
</x-layout>
