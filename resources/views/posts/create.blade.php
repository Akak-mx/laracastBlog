<x-layout>
    <section class="px-6 py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Submit new Post
        </h1>
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf

            <x-panel>
                <x-form.input name="title" />

                <x-form.input name="slug" />

                <x-form.textarea name="excerpt" />

                <x-form.textarea name="body" />

                <x-form.input name="thumbnail" type="file" />

                <x-form.field name="category_id">
                    <x-form.label name="category" />
                    <select name="category_id" id="category_id">
                        @php
                            $categories = App\Models\Category::all();
                        @endphp
                        @foreach ($categories as $category)
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
            </x-panel>
        </form>
    </section>
</x-layout>
