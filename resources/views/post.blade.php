<x-layout>
    <article>
        <h1>
            {{ $post->title }}
        </h1>
        <div>
            {!! $post->body !!}
        </d>
    </article>
    <a href="/">Go Back</a>
</x-layout>
