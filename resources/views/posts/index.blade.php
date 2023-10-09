<x-layout>
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if ($posts->count())
            <x-posts-grid :posts="$posts" />
            <div>
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-center">No posts yet. Come back later.</p>
        @endif

    </main>
</x-layout>
