@extends('Company_Profile.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-primary-700 text-white py-20">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl text-center mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Tentang Anggre Vespa Endut</h1>
                <p class="text-xl">Dedikasi kami terhadap keindahan dan keunikan anggrek sejak 2010</p>
            </div>
        </div>
    </section>

    <!-- Sejarah Perusahaan -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800">Sejarah Kami</h2>
                    <p class="text-gray-600 mb-4">Tentang Anggre Vespa Endut didirikan pada tahun 2010 oleh Ibu Siti Nurhayati, seorang ahli anggrek dengan pengalaman lebih dari 20 tahun di bidang hortikultura.</p>
                    <p class="text-gray-600 mb-4">Awalnya hanya sebuah kebun kecil di belakang rumah, kini kami telah berkembang menjadi salah satu pusat anggrek terkemuka di Indonesia dengan lebih dari 50 varietas anggrek lokal dan impor.</p>
                    <p class="text-gray-600">Kami bangga telah melayani lebih dari 10.000 pelanggan, mulai dari pecinta anggrek rumahan hingga hotel dan perusahaan besar.</p>
                </div>
                <div class="md:w-1/2">
                    <img src="{{ asset('images/history.jpg') }}" alt="Sejarah Anggrek Indah" class="rounded-lg shadow-xl w-full">
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Misi -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Visi & Misi</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="bg-primary-100 p-3 rounded-full mr-4">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Visi</h3>
                    </div>
                    <p class="text-gray-600">Menjadi pusat anggrek terdepan di Indonesia yang mempromosikan keindahan dan pelestarian anggrek nusantara sambil mengembangkan varietas baru yang unggul.</p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="bg-primary-100 p-3 rounded-full mr-4">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Misi</h3>
                    </div>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-primary-600 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                            <span>Menyediakan anggrek berkualitas tinggi dengan varietas lengkap</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-primary-600 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                            <span>Mengembangkan teknik budidaya anggrek yang ramah lingkungan</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-primary-600 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                            <span>Mendidik masyarakat tentang pentingnya pelestarian anggrek</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Tim Kami -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Tim Ahli Kami</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <img src="{{ asset('images/team-1.jpg') }}" alt="Direktur Utama" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-bold mb-1">Siti Nurhayati</h3>
                    <p class="text-primary-600 font-medium mb-2">Direktur Utama</p>
                    <p class="text-gray-600 text-sm">Ahli anggrek dengan pengalaman 25 tahun, spesialis anggrek spesies Indonesia.</p>
                </div>

                <div class="text-center">
                    <img src="{{ asset('images/team-2.jpg') }}" alt="Manajer Produksi" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-bold mb-1">Budi Santoso</h3>
                    <p class="text-primary-600 font-medium mb-2">Manajer Produksi</p>
                    <p class="text-gray-600 text-sm">Spesialis budidaya anggrek modern dan pengendalian hama terpadu.</p>
                </div>

                <div class="text-center">
                    <img src="{{ asset('images/team-3.jpg') }}" alt="Ahli Perawatan" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-bold mb-1">Dewi Lestari</h3>
                    <p class="text-primary-600 font-medium mb-2">Ahli Perawatan</p>
                    <p class="text-gray-600 text-sm">Pakar perawatan anggrek rumahan dan revitalisasi anggrek sakit.</p>
                </div>

                <div class="text-center">
                    <img src="{{ asset('images/team-4.jpg') }}" alt="Customer Service" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-bold mb-1">Rina Wijaya</h3>
                    <p class="text-primary-600 font-medium mb-2">Customer Service</p>
                    <p class="text-gray-600 text-sm">Melayani konsultasi dan pemesanan dengan ramah dan profesional.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Prestasi -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Prestasi & Sertifikasi</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="text-4xl font-bold text-primary-600 mb-2">10+</div>
                    <div class="text-gray-600">Tahun Pengalaman</div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="text-4xl font-bold text-primary-600 mb-2">50+</div>
                    <div class="text-gray-600">Varietas Anggrek</div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="text-4xl font-bold text-primary-600 mb-2">5</div>
                    <div class="text-gray-600">Penghargaan Nasional</div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="text-4xl font-bold text-primary-600 mb-2">100%</div>
                    <div class="text-gray-600">Kepuasan Pelanggan</div>
                </div>
            </div>

            <div class="mt-12 grid grid-cols-2 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
                    <img src="{{ asset('images/certificate-1.png') }}" alt="Sertifikat" class="h-16 mr-4">
                    <div>
                        <h3 class="font-bold mb-1">Sertifikat Anggrek Sehat</h3>
                        <p class="text-sm text-gray-600">Kementerian Pertanian RI</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
                    <img src="{{ asset('images/certificate-2.png') }}" alt="Sertifikat" class="h-16 mr-4">
                    <div>
                        <h3 class="font-bold mb-1">primary Business Award</h3>
                        <p class="text-sm text-gray-600">Kementerian Lingkungan Hidup</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
                    <img src="{{ asset('images/certificate-3.png') }}" alt="Sertifikat" class="h-16 mr-4">
                    <div>
                        <h3 class="font-bold mb-1">Best Orchid Nursery</h3>
                        <p class="text-sm text-gray-600">Asosiasi Anggrek Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
