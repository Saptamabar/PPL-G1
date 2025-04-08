@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Artikel</h1>
        @auth
            <a href="{{ route('articles.create') }}" class="px-4 py-2 bg-primary-600 text-white rounded hover:bg-primary-700">
                Buat Artikel Baru
            </a>
        @endauth
    </div>

    @if($articles->isEmpty())
        <div class="bg-white shadow rounded-lg p-6 text-center text-gray-500">
            Belum ada artikel yang tersedia.
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($articles as $article)
                <div class="bg-white shadow rounded-lg overflow-hidden h-full flex flex-col">
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                             class="w-full h-48 object-cover">
                    @endif

                    <div class="p-6 flex-grow">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-xl font-semibold mb-2">
                                    <a href="{{ route('articles.show', $article) }}" class="hover:text-primary-600">
                                        {{ $article->title }}
                                    </a>
                                </h2>
                                <p class="text-sm text-gray-500">
                                    Oleh: {{ $article->user->name }} | {{ $article->created_at->format('d M Y') }}
                                </p>
                            </div>
                            @can('update', $article)
                                <div class="flex space-x-2">
                                    <a href="{{ route('articles.edit', $article) }}" class="text-yellow-600 hover:text-yellow-800">
                                        Edit
                                    </a>
                                    <form action="{{ route('articles.destroy', $article) }}" method="POST"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @endcan
                        </div>

                        <p class="mt-4 text-gray-700 line-clamp-3">
                            {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 150) }}
                        </p>
                    </div>

                    <div class="px-6 pb-4">
                        <a href="{{ route('articles.show', $article) }}"
                           class="text-primary-600 hover:text-primary-800 font-medium">
                            Baca selengkapnya...
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif


@endsection
