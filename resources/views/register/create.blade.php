<x-layout>
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded">
        <h1 class="text-center text-xl font-bold">Register</h1>
        <form action="/register" method="POST" class="mt-10">
            @csrf
            <x-form.input name="name" />

            <x-form.input name="username" />

            <x-form.input name="email" type="email" />

            <x-form.input name="password" type="password" />

            <div class="mb-6">
                <button class="bg-blue-400 text-white rounded py-2 px-4 hovering:bg-blue-500">
                    Submit
                </button>
            </div>
        </form>
    </main>
</x-layout>
