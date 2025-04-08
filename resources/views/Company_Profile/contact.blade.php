@extends('Company_Profile.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-primary-700 text-white py-20">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl text-center mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Hubungi Kami</h1>
                <p class="text-xl">Tim kami siap membantu semua kebutuhan anggrek Anda</p>
            </div>
        </div>
    </section>

    <!-- Kontak & Form -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12">
                <!-- Info Kontak -->
                <div class="lg:w-1/3">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Informasi Kontak</h2>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-primary-100 p-3 rounded-full mr-4">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Alamat</h3>
                                <p class="text-gray-600">Jl. Anggrek No. 123, Kebayoran Baru<br>Jakarta Selatan 12120</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-primary-100 p-3 rounded-full mr-4">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Email</h3>
                                <p class="text-gray-600">info@anggrekindah.com<br>marketing@anggrekindah.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-primary-100 p-3 rounded-full mr-4">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Telepon</h3>
                                <p class="text-gray-600">+62 21 1234 5678 (Office)<br>+62 812 3456 7890 (WhatsApp)</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-primary-100 p-3 rounded-full mr-4">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Jam Operasional</h3>
                                <p class="text-gray-600">Senin - Jumat: 08.00 - 17.00 WIB<br>Sabtu: 08.00 - 15.00 WIB<br>Minggu & Hari Libur: Tutup</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="font-bold mb-4 text-gray-800">Media Sosial</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="bg-primary-100 hover:bg-primary-200 p-3 rounded-full text-primary-600 transition duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">...</svg>
                            </a>
                            <a href="#" class="bg-primary-100 hover:bg-primary-200 p-3 rounded-full text-primary-600 transition duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">...</svg>
                            </a>
                            <a href="#" class="bg-primary-100 hover:bg-primary-200 p-3 rounded-full text-primary-600 transition duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">...</svg>
                            </a>
                            <a href="#" class="bg-primary-100 hover:bg-primary-200 p-3 rounded-full text-primary-600 transition duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">...</svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Form Kontak -->
                <div class="lg:w-2/3">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Kirim Pesan</h2>
                    <form action="/contact" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                                <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" required>
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" required>
                            </div>
                        </div>

                        <div>
                            <label for="phone" class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                        </div>

                        <div>
                            <label for="subject" class="block text-gray-700 font-medium mb-2">Subjek</label>
                            <select id="subject" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                <option value="product">Pertanyaan tentang Produk</option>
                                <option value="service">Pertanyaan tentang Layanan</option>
                                <option value="consultation">Konsultasi Anggrek</option>
                                <option value="complaint">Keluhan</option>
                                <option value="other">Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-gray-700 font-medium mb-2">Pesan</label>
                            <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" required></textarea>
                        </div>

                        <div>
                            <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Peta Lokasi -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Lokasi Kami</h2>

            <div class="rounded-lg overflow-hidden shadow-lg">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613507824!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTEnNDEuMSJTIDEwNsKwNDknMTMuMyJF!5e0!3m2!1sen!2sid!4v1621491234567!5m2!1sen!2sid"
                        width="100%"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        class="w-full h-96">
                </iframe>
            </div>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="bg-primary-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Kunjungi Showroom</h3>
                    <p class="text-gray-600">Lihat langsung koleksi anggrek kami di showroom Jakarta Selatan</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="bg-primary-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Hubungi Kami</h3>
                    <p class="text-gray-600">Tim customer service kami siap membantu via telepon, email, atau media sosial</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="bg-primary-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Janji Temu</h3>
                    <p class="text-gray-600">Untuk konsultasi dengan ahli anggrek kami, silakan buat janji temu terlebih dahulu</p>
                </div>
            </div>
        </div>
    </section>
@endsection
