@extends('layouts.karyawan')

@section('title', 'Penggunaan Cepat '.$inventarisHabis->nama)

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Penggunaan Cepat {{ $inventarisHabis->nama }}</h2>
            <a href="{{ route('inventariskaryawan-habis.index') }}" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>

        <div class="mb-6 bg-gray-50 p-4 rounded-lg">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600">Jenis Barang:</p>
                    <p class="font-medium">{{ $inventarisHabis->jenis }}</p>
                </div>
                <div>
                    <p class="text-gray-600">Stok Tersedia:</p>
                    <p class="font-medium">
                        <span class="px-2 py-1 rounded-full text-xs {{ $inventarisHabis->jumlah > 5 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $inventarisHabis->jumlah }} pcs
                        </span>
                    </p>
                </div>
            </div>
        </div>

        @if($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('inventariskaryawan-habis.process-quick-usage', $inventarisHabis) }}" method="POST">
            @csrf
            <input type="number" name='id' id="id" value="{{ $inventarisHabis->id }}" hidden >
            <div class="mb-4">
                <label for="jumlah" class="block text-gray-700 font-medium mb-2">Jumlah Digunakan</label>
                <input type="number" name="jumlah" id="jumlah" min="1" max="{{ $inventarisHabis->jumlah }}"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>

            <div class="mb-6">
                <label for="keterangan" class="block text-gray-700 font-medium mb-2">Keterangan Penggunaan</label>
                <textarea name="keterangan" id="keterangan" rows="3"
                          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                          placeholder="Contoh: Untuk rapat tim marketing" required></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition-colors">
                    Catat Penggunaan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
