@extends('Company_Profile.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative text-white py-30 overflow-hidden px-20">
        <!-- Background Image -->
        <img src="{{ asset('asset/Hero.jpg') }}" alt="Background Anggrek" class="absolute inset-0 w-full h-full object-cover">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Content -->
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-2xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Keindahan Alam dalam Setiap Kelopak</h1>
                <p class="text-xl mb-8">Spesialis budidaya dan perawataan anggrek profesional</p>
                <a href="/products" class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Hubungi kami</a>
            </div>
        </div>
    </section>
    <!-- Produk Unggulan -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Produk Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 px-20">
                @foreach($featuredProducts as $product)
                <div class="bg-white rounded-lg shadow-md border border-gray-200 hover:shadow-xl transition duration-300">
                    <div class="pt-4 px-4">
                    <img src="{{ asset($product['foto']) }}" alt="{{ $product['nama_anggrek'] }}" class="w-full h-48 object-cover rounded-lg">
                    </div>
                        <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-grey-900">{{ $product['nama_anggrek'] }}</h3>
                        <p class="text-grey-900 mb-4 text-1xl">{{ $product['nama_latin'] }}</p>
                        <div class="flex justify-center items-center">
                            <a href="/whatsap" class="bg-primary-600 text-white font-bold w-full text-center mx-4.5 py-2.5 rounded-lg hover:bg-primary-700">Pesan</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-10">
                <a href="/products" class="inline-block bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-lg transition duration-300">Lihat Semua Produk</a>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white px-20">
        <div class="container mx-auto px-6">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 px-4">
                <div class="mb-4 md:mb-0">
                    <h2 class="text-2xl font-bold text-gray-800">Artikel Terkini</h2>
                    <p class="text-lg text-gray-600">Kumpulan artikel menarik tentang anggrek setiap harinya</p>
                </div>
                <a href="/artikel" class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2.5 px-6 rounded-lg transition duration-300 shadow-md hover:shadow-lg">
                    Lihat Semua Artikel
                </a>
            </div>

            <!-- Articles Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
                @foreach($featuredarticles as $artikel)
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden border border-gray-200">
                    <!-- Article Image -->
                    <div class="p-4">
                        <img src="{{ asset($artikel['image']) }}" alt="{{ $artikel['title'] }}"
                             class="w-full h-48 object-cover rounded-lg">
                    </div>

                    <!-- Article Content -->
                    <div class="px-5 pb-5">
                        <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2">{{ $artikel['title'] }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3 text-sm">{{ $artikel['content'] }}</p>

                        <!-- Read More Button -->
                        <div class="mt-4">
                            <a href="{{ route('articles.show', $artikel['id']) }}"
                               class="block w-full text-center bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section class="py-16 px-4 sm:px-20 lg:px-20 bg-white">
        <div class="container mx-auto">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12">
                <div class="mb-4 md:mb-0">
                    <h2 class="text-2xl font-bold text-gray-800">AI Deteksi Penyakit Anggrek</h2>
                    <p class="text-lg text-gray-600">Bantu kamu identifikasi penyakit anggrek dengan AI untuk penanganan yang tepat</p>
                </div>
                <a href="/deteksi" class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2.5 px-6 rounded-lg transition duration-300 shadow-md hover:shadow-lg">
                    Coba fitur
                </a>
            </div>

            <!-- Result Box -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden max-w-3xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Image Section -->
                    <div class="p-6 border-r border-gray-200">
                        <div class="relative">
                            <img src="{{ asset('asset/Contoh_deteksi.png') }}" alt="Anggrek yang dideteksi" class="w-full h-auto rounded-lg">
                        </div>
                    </div>

                    <!-- Result Section -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Hasil Deteksi</h3>

                        <div class="space-y-4">

                            <div>
                                <p class="text-sm font-medium text-gray-500">Jenis Penyakit</p>
                                <p class="text-red-600 font-semibold">Brown Spot Disease</p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-500">Tingkat Kepercayaan</p>

                                <p class="text-gray-800">95.57%</p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-500">Ukuran Area Terinfeksi</p>
                                <p class="text-gray-800">57px × 303px</p>
                            </div>

                            <div class="pt-4">
                                <a href="/deteksi" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2.5 px-6 rounded-lg transition duration-300 shadow-md hover:shadow-lg">
                                    Deteksi Gambar Lain
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
