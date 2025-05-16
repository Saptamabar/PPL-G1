@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl font-semibold mb-6">Edit Data Anggrek</h2>

        <form action="{{ route('anggrek.update', $anggrek->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_anggrek" class="block text-gray-700 text-sm font-bold mb-2">Nama Anggrek</label>
                <input type="text" name="nama_anggrek" id="nama_anggrek" value="{{ old('nama_anggrek', $anggrek->nama_anggrek) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="nama_latin" class="block text-gray-700 text-sm font-bold mb-2">Nama Latin</label>
                <input type="text" name="nama_latin" id="nama_latin" value="{{ old('nama_latin', $anggrek->nama_latin) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('deskripsi', $anggrek->deskripsi) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="foto" class="block text-gray-700 text-sm font-bold mb-2">Foto</label>
                @if($anggrek->foto)
                    <div class="mb-2">
                        <x-cloudinary::image public-id="{{ $anggrek->foto }}" alt="{{ $anggrek->nama_anggrek }}" class="h-20 w-20 object-cover rounded"/>
                    </div>
                @endif
                <input type="file" name="foto" id="foto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <p class="text-gray-600 text-xs italic">Biarkan kosong jika tidak ingin mengubah foto</p>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update
                </button>
                <a href="{{ route('anggrek.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
