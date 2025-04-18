@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-6">Detail Inventaris Habis Pakai</h2>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nama Barang</label>
            <p class="text-gray-900">{{ $inventarisHabi->nama }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Jenis Barang</label>
            <p class="text-gray-900">{{ $inventarisHabi->jenis }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Jumlah</label>
            <p class="text-gray-900">{{ $inventarisHabi->jumlah }}</p>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('inventaris-habis.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
