<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggrek AI - Login</title>
    <link rel="icon" href="{{ asset('asset/favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Removed Font Awesome dependency -->
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <div class="flex justify-center items-center gap-1.5">
                    <img class="h-17 w-auto" src="{{ asset('asset/Logo.svg') }}" alt="Anggrek Indah">
                    <h1 class="text-3xl font-bold">Anggrek AI</h1>
                </div>
                <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                    Masuk ke akun Anda
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf

                <div>
                    <label for="email" class="sr-only">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300
                        placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-primary-500
                        focus:border-primary-500 focus:z-10 sm:text-sm"
                        placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="relative">
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300
                        placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-primary-500
                        focus:border-primary-500 focus:z-10 sm:text-sm pr-10"
                        placeholder="Password">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700">

                            <img src="{{ asset('asset/eye-open.svg') }}" class="h-5 w-5 eye-open" alt="Show password">

                            <img src="{{ asset('asset/eye-closed.svg') }}" class="h-5 w-5 eye-closed hidden" alt="Hide password">
                        </button>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">
                            Ingat saya
                        </label>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent
                        text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            const eyeOpen = document.querySelector('.eye-open');
            const eyeClosed = document.querySelector('.eye-closed');

            togglePassword.addEventListener('click', function() {
                // Toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                // Toggle the eye icons
                eyeOpen.classList.toggle('hidden');
                eyeClosed.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>
