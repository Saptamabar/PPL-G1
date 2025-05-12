@extends('layouts.karyawan')

@section('title', 'Peminjaman Barang Tidak Habis Pakai')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Form Peminjaman Barang</h2>
            <a href="{{ route('inventariskaryawan.index') }}" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
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

        <form action="{{ route('inventariskaryawan-tak-habis.process-borrow') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="inventaris_tak_habis_id" class="block text-gray-700 font-medium mb-2">Pilih Barang</label>
                <select name="inventaris_tak_habis_id" id="inventaris_tak_habis_id"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($inventarisTakHabis as $item)
                    <option value="{{ $item->id }}" data-status="{{ $item->status }}">
                        {{ $item->nama }} ({{ $item->kode }}) - Status: {{ ucfirst($item->status) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="tanggal_pinjam" class="block text-gray-700 font-medium mb-2">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           value="{{ date('Y-m-d') }}" required>
                </div>
                <div>
                    <label for="tanggal_kembali" class="block text-gray-700 font-medium mb-2">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" id="tanggal_kembali"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                </div>
            </div>

            <div class="mb-6">
                <label for="keterangan" class="block text-gray-700 font-medium mb-2">Keterangan Peminjaman</label>
                <textarea name="keterangan" id="keterangan" rows="3"
                          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                          placeholder="Contoh: Untuk presentasi klien" required></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg transition-colors">
                    Ajukan Peminjaman
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const itemSelect = document.getElementById('inventaris_tak_habis_id');
        const tanggalKembali = document.getElementById('tanggal_kembali');

        // Set minimum return date based on borrow date
        document.getElementById('tanggal_pinjam').addEventListener('change', function() {
            tanggalKembali.min = this.value;
        });
    });
</script>
@endsection
