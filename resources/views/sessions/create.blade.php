<x-layout>
    <main class="max-w-lg mx-auto mt-10 bg-gray-100">
        <x-panel>
            <h1 class="text-center text-xl font-bold">Log in</h1>
            <form action="/login" method="POST" class="mt-10">
                @csrf
                <x-form.input name="email" type="email" autocomplete="username" />

                <x-form.input name="password" type="password" autocomplete="current-password" />

                <x-form.button>Submit</x-form.button>
            </form>
        </x-panel>
    </main>
</x-layout>
