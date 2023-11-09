<x-layout>
    <x-setting heading="Edit Post: {{ $post->title }}">
        <form action="/admin/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
            @csrf()
            @method('PATCH')
            <x-form.input name="title" value="{{ old('title', $post->title) }}" 
                {{-- :value="$post->title" funciona igual, pero lo dejo por convención de esta forma   --}} />

            <x-form.input name="slug" value="{{ old('slug', $post->slug) }}" />

            <x-form.textarea name="excerpt" >{{ old('excerpt', $post->excerpt) }}</x-form.textarea>

            <x-form.textarea name="body" >{{ old('body', $post->body) }}</x-form.textarea>

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" />
                </div>

                <img src="{{ asset($post->thumbnail) }}" class="rounded-xl ml-6" width="100">
            </div>

            <x-form.field name="category_id">
                <x-form.label name="category" />
                <select name="category_id" id="category_id">
                        <option
                            value="{{ $post->category->id }}"
                            selected
                        >
                            {{ ucwords($post->category->name) }}
                        </option>
                    @foreach (\App\Models\Category::all()->except($post->category->id) as $category)
                        <option
                            value="{{ $category->id}}"
                            {{ old('category_id') === $category->id ? 'selected' : '' }}
                        >
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>
            </x-form.field>

            <x-form.button>Update</x-form>
        </form>
    </x-setting>
</x-layout>
