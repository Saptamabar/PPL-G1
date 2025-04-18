@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Edit Data Karyawan</h1>

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('karyawan.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('karyawan.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">
                    Batal
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Update
                </button>
            </div>
        </form>

        <hr class="my-6">

        <h2 class="text-xl font-semibold mb-4">Reset Password</h2>
        <form action="{{ route('karyawan.reset-password', $user) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password Baru</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
