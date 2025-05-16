@extends('Company_Profile.app')

@section('content')
    <section class="py-7 px-20 bg-primary-50">
            <h2 class="text-3xl font-bold text-center mb-7 text-gray-800">Daftar produk </h2>
            <div class="mb-8 max-w-2xl mx-auto">
                <form action="{{ route('Product.index') }}" method="GET" class="flex items-center">
                    <input type="text" name="query" placeholder="Cari produk..." class="flex-grow px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                        value="{{ request('query') ?? '' }}">
                    <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-2 rounded-r-lg transition duration-200">
                        Cari
                    </button>
                </form>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($anggreks as $anggrek)
                <div class="bg-white rounded-lg shadow-md border border-gray-200 hover:shadow-xl transition duration-300">
                    <div class="pt-4 px-4">
                    <x-cloudinary::image public-id="{{ $anggrek->foto }}" alt="{{ $anggrek['nama_anggrek'] }}" class="w-full h-48 object-cover rounded-lg"/>
                    </div>
                        <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-grey-900">{{ $anggrek['nama_anggrek'] }}</h3>
                        <p class="text-grey-900 mb-4 text-1xl">{{ $anggrek['nama_latin'] }}</p>
                        <div class="flex justify-center items-center">
                            <a href="/whatsap" class="bg-primary-600 text-white font-bold w-full text-center mx-4.5 py-2.5 rounded-lg hover:bg-primary-700">Pesan</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if($anggreks->hasPages())
            <div class="mt-10">
                {{ $anggreks->links() }}
            </div>
            @endif
    </section>
@endsection
