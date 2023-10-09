<x-layout>
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded">
        <h1 class="text-center text-xl font-bold">Register</h1>
        <form action="/register" method="POST" class="mt-10">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Name
                </label>
                <input type="text" class="border border-gray-400 p-2 w-full" name="name" id="name" value="{{ old('name') }}" required>
                @error('name')
                    <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Username
                </label>
                <input type="text" class="border border-gray-400 p-2 w-full" name="username" id="username" value="{{ old('username') }}" required>
                @error('username')
                    <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Email
                </label>
                <input type="email" class="border border-gray-400 p-2 w-full" name="email" id="email" value="{{ old('email') }}" required>
            </div>
            @error('email')
                <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
            @enderror
            <div class="mb-6">
                <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Passowrd
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
