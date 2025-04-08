<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggrek Vespa Endut - {{ $title ?? '' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-primary-800 text-white shadow-lg">
        <div class="container mx-auto px-10 py-3 flex justify-between items-center ">
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('storage/images/logo.jpeg') }}" alt="Anggrek Vespa Endut" class="h-10">
                <span class="text-xl font-bold">Anggrek Vespa Endut</span>
            </a>
            <div class="hidden md:flex space-x-6">
                <a href="/" class="hover:text-yellow-300 py-2">Beranda</a>
                <a href="/products" class="hover:text-yellow-300 py-2">Produk</a>
                <a href="/services" class="hover:text-yellow-300 py-2">Layanan</a>
                <a href="/contact" class="hover:text-yellow-300 py-2">Kontak</a>
                <a href="/detect-orchid" class="hover:text-yellow-300 py-2">Deteksi Penyakit</a>
                <a href="/login" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-2 px-6 rounded-lg transition duration-300">Login</a>
            </div>
            <button class="md:hidden focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="md:hidden bg-primary-700 hidden" id="mobileMenu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/" class="block px-3 py-2 text-white hover:bg-primary-600">Beranda</a>
            <a href="/about" class="block px-3 py-2 text-white hover:bg-primary-600">Tentang Kami</a>
            <a href="/products" class="block px-3 py-2 text-white hover:bg-primary-600">Produk</a>
            <a href="/services" class="block px-3 py-2 text-white hover:bg-primary-600">Layanan</a>
            <a href="/detect-orchid" class="block px-3 py-2 text-white hover:bg-primary-600">Deteksi Penyakit</a>
            <a href="/contact" class="block px-3 py-2 text-white hover:bg-primary-600">Kontak</a>
        </div>
    </div>

    <!-- Konten Halaman -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">Anggrek Vespa Endut</h3>
                    <p>Spesialis anggrek berkualitas dengan pengalaman lebih dari 10 tahun dalam budidaya dan perawatan anggrek.</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="hover:text-yellow-300">Beranda</a></li>
                        <li><a href="/products" class="hover:text-yellow-300">Produk Anggrek</a></li>
                        <li><a href="/services" class="hover:text-yellow-300">Layanan Perawatan</a></li>
                        <li><a href="/contact" class="hover:text-yellow-300">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Kontak</h3>
                    <p>Jl. Anggrek No. 123, Jakarta</p>
                    <p>info@anggrekindah.com</p>
                    <p>+62 123 4567 890</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Media Sosial</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-yellow-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">...</svg>
                        </a>
                        <a href="#" class="hover:text-yellow-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">...</svg>
                        </a>
                        <a href="#" class="hover:text-yellow-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">...</svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-6 text-center">
                <p>&copy; 2023 Anggrek Vespa Endut. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.querySelector('nav button').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
