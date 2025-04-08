@extends('Company_Profile.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative text-white py-20 overflow-hidden px-10">
        <!-- Background Image -->
        <img src="{{ asset('storage/images/hero-orchid.jpg') }}" alt="Background Anggrek" class="absolute inset-0 w-full h-full object-cover">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Content -->
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-2xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Keindahan Alam dalam Setiap Kelopak</h1>
                <p class="text-xl mb-8">Spesialis anggrek berkualitas dengan berbagai jenis dan layanan perawatan profesional.</p>
                <div class="flex space-x-4">
                    <a href="/products" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-6 rounded-lg transition duration-300">Lihat Produk</a>
                    <a href="/services" class="bg-transparent hover:bg-white hover:text-primary-800 text-white font-bold py-3 px-6 border-2 border-white rounded-lg transition duration-300">Layanan Kami</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Produk Unggulan -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Produk Unggulan Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featuredProducts as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['name'] }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $product['name'] }}</h3>
                        <p class="text-gray-600 mb-4">{{ $product['description'] }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary-700 font-bold">Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                            <a href="/products/{{ $product['id'] }}" class="text-primary-600 hover:text-primary-800 font-medium">Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-10">
                <a href="/products" class="inline-block bg-primary-600 hover:bg-primary-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300">Lihat Semua Produk</a>
            </div>
        </div>
    </section>

    <!-- Layanan Kami -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Layanan Perawatan Anggrek</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="bg-primary-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Perawatan Rutin</h3>
                    <p class="text-gray-600">Layanan perawatan berkala untuk menjaga kesehatan anggrek Anda.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="bg-primary-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Perbaikan Anggrek</h3>
                    <p class="text-gray-600">Revitalisasi anggrek yang sakit atau kurang subur.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="bg-primary-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Konsultasi</h3>
                    <p class="text-gray-600">Konsultasi dengan ahli anggrek untuk solusi terbaik.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="bg-primary-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Workshop</h3>
                    <p class="text-gray-600">Pelatihan merawat dan membudidayakan anggrek.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Apa Kata Pelanggan Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 mr-2">★★★★★</div>
                    </div>
                    <p class="text-gray-600 mb-4">"Anggrek dari sini selalu segar dan tahan lama. Layanan perawatannya juga sangat profesional."</p>
                    <div class="flex items-center">
                        <img src="{{ asset('images/avatar-1.jpg') }}" alt="Pelanggan" class="w-10 h-10 rounded-full mr-3">
                        <div>
                            <h4 class="font-bold">Budi Santoso</h4>
                            <p class="text-sm text-gray-500">Pemilik Kebun Anggrek</p>
                        </div>
                    </div>
                </div>
                <!-- Testimoni lainnya -->
            </div>
        </div>
    </section>
@endsection
