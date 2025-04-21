@extends('layouts.admin')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-3xl font-bold">{{ $article->title }}</h1>
                <p class="text-sm text-gray-500 mt-2">
                    Oleh: {{ $article->user->name }} | {{ $article->created_at->format('d M Y H:i') }}
                </p>
            </div>
            @can('update', $article)
                <div class="flex space-x-4">
                    <a href="{{ route('articles.edit', $article) }}"
                       class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                        Edit
                    </a>
                    <form action="{{ route('articles.destroy', $article) }}" method="POST"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                            Hapus
                        </button>
                    </form>
                </div>
            @endcan
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            @if($article->image)
                <div class="lg:w-1/2">
                    <img src="{{ asset($article->image) }}" alt="{{ $article->title }}"
                         class="w-full h-auto max-h-[500px] object-cover rounded-lg">
                </div>
            @endif

            <div class="lg:w-1/2">
                <div class="prose max-w-none break-words">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-200">
            <a href="{{ route('articles.index') }}"
               class="text-primary-600 hover:text-primary-800">
                &larr; Kembali ke daftar artikel
            </a>
        </div>
    </div>
@endsection
