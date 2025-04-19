<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggrek Vespa Endut - {{ $title ?? '' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-gray-50">
    <nav class="bg-primary-600 text-white shadow-lg">
        <div class="container mx-auto md:px-20 px-10 py-3 flex justify-between items-center ">
            <a href="/" class="flex items-center justify-center gap-2.5">
                <img src="{{ asset('asset/Logo_PPL.png') }}" alt="Anggrek Vespa Endut" class="h-10 align-middle">
                <span class="text-xl font-bold leading-none">Anggrek Vespa Endut</span>
            </a>
            <div class="hidden md:flex space-x-6">
                <a href="/" class="hover:text-yellow-300 py-2 font-bold">Beranda</a>
                <a href="/products" class="hover:text-yellow-300 py-2 font-bold">Produk</a>
                <a href="/services" class="hover:text-yellow-300 py-2 font-bold">Artikel</a>
                <a href="/detect-orchid" class="hover:text-yellow-300 py-2 font-bold">Deteksi Penyakit</a>
            </div>
            <div class="hidden md:flex">
                <a href="/login" class="items-center justify-center bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded-lg transition duration-300">Login</a>
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
            <a href="/products" class="block px-3 py-2 text-white hover:bg-primary-600">Produk</a>
            <a href="/services" class="block px-3 py-2 text-white hover:bg-primary-600">Artikel</a>
            <a href="/detect-orchid" class="block px-3 py-2 text-white hover:bg-primary-600">Deteksi Penyakit</a>
            <a href="/login" class="block px-3 py-2 text-white hover:bg-yellow-600 bg-yellow-400 rounded-md">login</a>
        </div>
    </div>

    <!-- Konten Halaman -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Anggrek Vespa Endut</h3>
                    <p class="text-gray-300">Spesialis anggrek berkualitas dengan pengalaman lebih dari 10 tahun dalam budidaya dan perawatan anggrek.</p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-300 hover:text-yellow-300 transition">Beranda</a></li>
                        <li><a href="/products" class="text-gray-300 hover:text-yellow-300 transition">Produk Anggrek</a></li>
                        <li><a href="/services" class="text-gray-300 hover:text-yellow-300 transition">Layanan Perawatan</a></li>
                        <li><a href="/contact" class="text-gray-300 hover:text-yellow-300 transition">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Kontak</h3>
                    <div class="space-y-2 text-gray-300">
                        <p>Jl. Anggrek No. 123, Jakarta</p>
                        <p>info@anggrekvespaendut.com</p>
                        <p>+62 123 4567 890</p>
                    </div>
                </div>

                <!-- Social Media -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Media Sosial</h3>
                    <div class="space-y-3">
                        <!-- Instagram -->
                        <div class="flex items-center space-x-3">
                            <a href="https://instagram.com/anggrekvespaendut" target="_blank" class="text-gray-300 hover:text-pink-500 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                                </svg>
                            </a>
                            <a href="https://instagram.com/anggrekvespaendut" target="_blank" class="text-gray-300 hover:text-yellow-300 text-sm transition">@anggrekvespaendut</a>
                        </div>

                        <!-- Facebook -->
                        <div class="flex items-center space-x-3">
                            <a href="https://facebook.com/anggrekvespaendut" target="_blank" class="text-gray-300 hover:text-blue-500 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                                </svg>
                            </a>
                            <a href="https://facebook.com/anggrekvespaendut" target="_blank" class="text-gray-300 hover:text-yellow-300 text-sm transition">Anggrek Vespa Endut</a>
                        </div>

                        <!-- YouTube -->
                        <div class="flex items-center space-x-3">
                            <a href="https://youtube.com/c/anggrekvespaendut" target="_blank" class="text-gray-300 hover:text-red-500 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                </svg>
                            </a>
                            <a href="https://youtube.com/c/anggrekvespaendut" target="_blank" class="text-gray-300 hover:text-yellow-300 text-sm transition">Anggrek Vespa Endut</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
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
