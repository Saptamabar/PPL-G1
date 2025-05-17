@extends('layouts.karyawan')

@section('title', 'Profile')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Profile Picture Section -->
        <div class="md:w-1/3 flex flex-col items-center">
            <div class="relative mb-4">
                <x-cloudinary::image public-id="{{ Auth::user()->foto_profile }}" alt="Profile Picture" class="w-32 h-32 rounded-full object-cover border-4 border-primary-200"/>

            </div>
            <h2 class="text-2xl font-bold text-gray-800">{{ Auth::user()->name }}</h2>
            <p class="text-gray-600 mb-4">{{ Auth::user()->email }}</p>
        </div>
        <!-- Profile Information Section -->
        <div class="md:w-2/3">
            <h3 class="text-xl font-semibold text-gray-800 mb-6">Profile Information</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500" disabled>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500" disabled>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="tel" id="phone" name="phone" value="{{ Auth::user()->no_hp}}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500" disabled>
                    </div>

                    <div>
                        <label for="position" class="block text-sm font-medium text-gray-700 mb-1">Position</label>
                        <input type="text" id="position" name="position" value="{{ Auth::user()->role}}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500" disabled>
                    </div>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('profile.edit') }}" class="px-4 py-2 border bg-primary-600 border-gray-300 rounded-md text-white font-semibold hover:bg-primary-700 transition">
                        Edit
                    </a>
                </div>
            <!-- Change Password Section -->
            <div class="mt-10 pt-6 border-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-800 mb-6">Change Password</h3>

                <form action="{{--  --}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6 mb-6">
                        <div>
                            <label for="new_password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                            <input type="password" id="new_password" name="new_password"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500">
                        </div>

                        <div>
                            <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500">
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700 transition">
                            Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Success/Error Messages -->
@if(session('success'))
<div class="fixed bottom-4 right-4">
    <div class="bg-green-500 text-white px-4 py-2 rounded-md shadow-lg flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
        {{ session('success') }}
    </div>
</div>
@endif

@if($errors->any())
<div class="fixed bottom-4 right-4">
    <div class="bg-red-500 text-white px-4 py-2 rounded-md shadow-lg">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

<script>
    // Auto-hide success/error messages after 5 seconds
    setTimeout(() => {
        const messages = document.querySelectorAll('.fixed.bottom-4.right-4');
        messages.forEach(message => {
            message.style.display = 'none';
        });
    }, 5000);

</script>
@endsection
