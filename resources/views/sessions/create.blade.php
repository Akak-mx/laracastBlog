<x-layout>
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded">
        <h1 class="text-center text-xl font-bold">Log in</h1>
        <form action="/login" method="POST" class="mt-10">
            @csrf
            <div class="mb-6">
                <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Email
                </label>
                <input type="email" class="border border-gray-400 p-2 w-full" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Password
                </label>
                <input type="password" class="border border-gray-400 p-2 w-full" name="password" id="password" required>
                @error('password')
                    <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <button class="bg-blue-400 text-white rounded py-2 px-4 hovering:bg-blue-500">
                    Submit
                </button>
            </div>
        </form>
    </main>
</x-layout>
