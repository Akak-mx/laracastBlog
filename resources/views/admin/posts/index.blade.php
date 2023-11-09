<x-layout>
    <x-setting heading="Manage Posts" >
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <ul role="list" class="divide-y divide-gray-100">
                @foreach ($posts as $post)
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <a href="/posts/{{ $post->slug }}">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ $post->title }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <a href="/admin/posts/{{ $post->slug }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <form action="/admin/posts/{{ $post->slug }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-gray-500 hover:text-gray-600">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div>
                {{ $posts->links() }}
            </div>
        </main>
    </x-setting>
</x-layout>
