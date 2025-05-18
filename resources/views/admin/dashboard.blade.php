@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
         
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-700">Total Karyawan</h3>
                        <p class="text-2xl font-bold">{{ $totalKaryawan }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-700">Total Anggrek</h3>
                        <p class="text-2xl font-bold">{{ $totalAnggrek }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-700">Total Inventaris</h3>
                        <p class="text-2xl font-bold">{{ $totalInventaris }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Terbaru -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Inventaris Terbaru -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Inventaris Terbaru</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-2">Nama</th>
                                <th class="text-left py-2">Jenis</th>
                                <th class="text-left py-2">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentInventaris as $item)
                            <tr class="border-b">
                                <td class="py-2">{{ $item->nama }}</td>
                                <td class="py-2">{{ $item->jenis ?? '-' }}</td>
                                <td class="py-2">{{ $item->jumlah ?? '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Penggunaan Inventaris Terbaru -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Penggunaan Inventaris Terbaru</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-2">Nama</th>
                                <th class="text-left py-2">Jumlah</th>
                                <th class="text-left py-2">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentPenggunaan as $item)
                            <tr class="border-b">
                                <td class="py-2">{{ $item->inventarisHabis->nama ?? $item->inventarisTakHabis->nama }}</td>
                                <td class="py-2">{{ $item->jumlah ?? '-' }}</td>
                                <td class="py-2">{{ $item->waktu_penggunaan ?? $item->waktu_peminjaman }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
