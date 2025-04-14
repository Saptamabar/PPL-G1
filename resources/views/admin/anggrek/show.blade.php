@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Detail Anggrek</h2>
            <div class="flex space-x-2">
                <a href="{{ route('anggrek.edit', $anggrek->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">Edit</a>
                <a href="{{ route('anggrek.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-sm">Kembali</a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                @if($anggrek->foto)
                    <img src="{{ asset($anggrek->foto) }}" alt="{{ $anggrek->nama_anggrek }}" class="w-full h-auto rounded-lg shadow">
                @else
                    <div class="bg-gray-200 w-full h-64 flex items-center justify-center rounded-lg">
                        <span class="text-gray-500">Tidak ada gambar</span>
                    </div>
                @endif
            </div>

            <div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Informasi Dasar</h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-600"><span class="font-medium">Nama Anggrek:</span> {{ $anggrek->nama_anggrek }}</p>
                        <p class="text-sm text-gray-600"><span class="font-medium">Nama Latin:</span> {{ $anggrek->nama_latin }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Informasi Tambahan</h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-600"><span class="font-medium">Dibuat pada:</span> {{ $anggrek->created_at->format('d M Y H:i') }}</p>
                        <p class="text-sm text-gray-600"><span class="font-medium">Terakhir diupdate:</span> {{ $anggrek->updated_at->format('d M Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
