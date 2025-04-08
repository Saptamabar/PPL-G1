@extends('Company_Profile.app')

@section('content')
    <section class="py-12 bg-primary-50">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Koleksi Anggrek Kami</h1>

            <div class="mb-8 flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <label for="filter" class="mr-2 text-gray-700">Filter:</label>
                    <select id="filter" class="border border-gray-300 rounded px-3 py-2">
                        <option>Semua Jenis</option>
                        <option>Anggrek Bulan</option>
                        <option>Anggrek Dendrobium</option>
                        <option>Anggrek Vanda</option>
                    </select>
                </div>
                <div class="relative">
                    <input type="text" placeholder="Cari anggrek..." class="border border-gray-300 rounded px-4 py-2 pl-10 w-full md:w-64">
                    <svg class="absolute left-3 top-3 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative">
                        <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['name'] }}" class="w-full h-48 object-cover">
                        @if($product['is_new'])
                        <span class="absolute top-2 right-2 bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded">Baru</span>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-1 text-gray-800">{{ $product['name'] }}</h3>
                        <p class="text-sm text-gray-600 mb-3">{{ $product['species'] }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary-700 font-bold">Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                            <a href="/products/{{ $product['id'] }}" class="text-primary-600 hover:text-primary-800 font-medium">Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-10 flex justify-center">
                <nav class="inline-flex rounded-md shadow">
                    <a href="#" class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">Previous</a>
                    <a href="#" class="px-3 py-2 border-t border-b border-gray-300 bg-white text-primary-600 font-medium">1</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">2</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">3</a>
                    <a href="#" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">Next</a>
                </nav>
            </div>
        </div>
    </section>
@endsection
