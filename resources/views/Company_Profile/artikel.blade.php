@extends('Company_Profile.app')

@section('content')
    <section class="py-7 px-20 bg-white">
       <h2 class="text-3xl font-bold text-center mb-7 text-gray-800">Daftar Artikel </h2>
        <div class="mb-8 max-w-2xl mx-auto">
            <form action="{{ route('Artikel.index') }}" method="GET" class="flex items-center">
                <input type="text" name="query" placeholder="Cari artikel..." class="flex-grow px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                    value="{{ request('query') ?? '' }}">
                <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-2 rounded-r-lg transition duration-200">
                    Cari
                </button>
            </form>
        </div>

        @if ($articles->isEmpty())
            <div class="bg-white shadow rounded-lg p-6 text-center text-gray-500">
                Belum ada artikel yang tersedia.
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($articles as $article)
                    <div class="bg-white shadow rounded-lg overflow-hidden h-full flex flex-col">
                        @if ($article->image)
                            <x-cloudinary::image public-id="{{ $article->image }}" alt="{{ $article->title }}"
                                class="w-full h-48 object-cover"/>
                        @endif

                        <div class="p-6 flex-grow">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h2 class="text-xl font-semibold mb-2">
                                        <a href="{{ route('Artikel.show', $article) }}" class="hover:text-primary-600">
                                            {{ $article->title }}
                                        </a>
                                    </h2>
                                    <p class="text-sm text-gray-500">
                                        Oleh: {{ $article->user->name }} | {{ $article->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </div>

                            <p class="mt-4 text-gray-700 line-clamp-3">
                                {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 150) }}
                            </p>
                        </div>

                        <div class="px-6 pb-4">
                            <a href="{{ route('Artikel.show', $article->id) }}"
                                class="text-primary-600 hover:text-primary-800 font-medium">
                                Baca selengkapnya...
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if($articles->hasPages())
        <div class="mt-10 flex flex-col">
            {{ $articles->links() }}
        </div>
        @endif

    </section>
@endsection
