@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl font-semibold mb-6">Tambah Anggrek Baru</h2>

        <form action="{{ route('anggrek.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="nama_anggrek" class="block text-gray-700 text-sm font-bold mb-2">Nama Anggrek</label>
                <input type="text" name="nama_anggrek" id="nama_anggrek" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="nama_latin" class="block text-gray-700 text-sm font-bold mb-2">Nama Latin</label>
                <input type="text" name="nama_latin" id="nama_latin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>

            <div class="mb-4">
                <label for="foto" class="block text-gray-700 text-sm font-bold mb-2">Foto</label>
                <input type="file" name="foto" id="foto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <p class="text-gray-600 text-xs italic">Format: jpeg, png, jpg, gif (max: 2MB)</p>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Simpan
                </button>
                <a href="{{ route('anggrek.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
