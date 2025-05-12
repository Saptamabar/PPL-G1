@extends('layouts.karyawan')

@section('title', 'Penggunaan Barang Habis Pakai')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Form Penggunaan Barang</h2>
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

        <form action="{{ route('inventariskaryawan-habis.process-usage') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="inventaris_habis_id" class="block text-gray-700 font-medium mb-2">Pilih Barang</label>
                <select name="inventaris_habis_id" id="inventaris_habis_id"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($inventarisHabis as $item)
                    <option value="{{ $item->id }}" data-stock="{{ $item->jumlah }}">
                        {{ $item->nama }} ({{ $item->jenis }}) - Stok: {{ $item->jumlah }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="jumlah" class="block text-gray-700 font-medium mb-2">Jumlah Digunakan</label>
                <input type="number" name="jumlah" id="jumlah" min="1"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
                <p id="stock-warning" class="text-red-500 text-sm mt-1 hidden">Jumlah melebihi stok tersedia!</p>
            </div>

            <div class="mb-6">
                <label for="keterangan" class="block text-gray-700 font-medium mb-2">Keterangan Penggunaan</label>
                <textarea name="keterangan" id="keterangan" rows="3"
                          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                          placeholder="Contoh: Untuk acara rapat bulanan" required></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors">
                    Catat Penggunaan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const itemSelect = document.getElementById('inventaris_habis_id');
        const jumlahInput = document.getElementById('jumlah');
        const stockWarning = document.getElementById('stock-warning');

        itemSelect.addEventListener('change', function() {
            const selectedOption = itemSelect.options[itemSelect.selectedIndex];
            const maxStock = selectedOption.dataset.stock || 0;
            jumlahInput.max = maxStock;
        });

        jumlahInput.addEventListener('input', function() {
            const selectedOption = itemSelect.options[itemSelect.selectedIndex];
            const maxStock = selectedOption.dataset.stock || 0;

            if (parseInt(jumlahInput.value) > parseInt(maxStock)) {
                stockWarning.classList.remove('hidden');
            } else {
                stockWarning.classList.add('hidden');
            }
        });
    });
</script>
@endsection
