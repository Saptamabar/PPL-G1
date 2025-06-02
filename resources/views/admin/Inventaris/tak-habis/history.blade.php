@extends('layouts.admin')

@section('title', 'History Inventaris Tak Habis')

@section('content')

<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">History Inventaris Tak Habis</h2>
            <a href="{{ route('inventaris.takhabis') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Kembali
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Barang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Peminjaman</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Pengembalian</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengguna</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($historyTakHabis as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->inventarisTakHabis->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->inventarisTakHabis->kode }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->waktu_peminjaman->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $item->waktu_pengembalian ? $item->waktu_pengembalian->format('d M Y') : 'Belum Dikembalikan' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->user->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4">
            {{ $historyTakHabis->links() }}
        </div>
    </div>
</div>
@endsection
