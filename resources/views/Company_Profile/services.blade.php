@extends('Company_Profile.app')

@section('content')
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Layanan Perawatan Anggrek</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <div class="bg-green-50 rounded-lg p-8">
                    <h2 class="text-2xl font-bold mb-4 text-gray-800">Perawatan Rutin</h2>
                    <p class="text-gray-600 mb-6">Kami menyediakan layanan perawatan anggrek berkala untuk memastikan tanaman Anda tetap sehat dan berbunga indah.</p>
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-600 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                            <span>Penyiraman dan pemupukan rutin</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-600 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                            <span>Pemeriksaan kesehatan tanaman</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-600 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                            <span>Pengendalian hama dan penyakit</span>
                        </li>
                    </ul>
                    <div class="bg-white p-4 rounded-lg shadow-inner">
                        <h3 class="font-bold mb-2">Paket Perawatan</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span>1 bulan</span>
                                <span class="font-bold">Rp 250.000</span>
                            </div>
                            <div class="flex justify-between">
                                <span>3 bulan</span>
                                <span class="font-bold">Rp 650.000</span>
                            </div>
                            <div class="flex justify-between">
                                <span>6 bulan</span>
                                <span class="font-bold">Rp 1.200.000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-green-50 rounded-lg p-8">
                    <h2 class="text-2xl font-bold mb-4 text-gray-800">Perbaikan Anggrek</h2>
                    <p class="text-gray-600 mb-6">Tim ahli kami dapat merevitalisasi anggrek Anda yang mengalami masalah pertumbuhan atau kesehatan.</p>
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-600 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                            <span>Diagnosis masalah tanaman</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-600 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                            <span>Perawatan intensif</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-600 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                            <span>Repotting dan media tanam baru</span>
                        </li>
                    </ul>
                    <div class="bg-white p-4 rounded-lg shadow-inner">
                        <h3 class="font-bold mb-2">Harga Perbaikan</h3>
                        <p class="text-gray-600">Mulai dari Rp 150.000 per tanaman tergantung kondisi dan perawatan yang dibutuhkan.</p>
                    </div>
                </div>
            </div>

            <div class="bg-green-800 text-white rounded-lg p-8 mb-12">
                <h2 class="text-2xl font-bold mb-4">Konsultasi Gratis</h2>
                <p class="mb-6">Dapatkan konsultasi gratis dengan ahli anggrek kami untuk masalah tanaman Anda.</p>
                <a href="/contact" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-6 rounded-lg transition duration-300">Jadwalkan Konsultasi</a>
            </div>

            <div>
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Pertanyaan Umum</h2>
                <div class="space-y-4">
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none">
                            <span class="font-medium">Berapa lama waktu yang dibutuhkan untuk memperbaiki anggrek yang sakit?</span>
                            <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                        </button>
                        <div class="p-4 bg-white hidden">
                            <p class="text-gray-600">Waktu pemulihan tergantung pada kondisi anggrek. Rata-rata membutuhkan 2-4 minggu perawatan intensif sebelum menunjukkan tanda-tanda perbaikan.</p>
                        </div>
                    </div>
                    <!-- FAQ lainnya -->
                </div>
            </div>
        </div>
    </section>
@endsection
