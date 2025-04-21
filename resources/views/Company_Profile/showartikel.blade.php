@extends('Company_Profile.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-3xl font-bold">{{ $article->title }}</h1>
            <p class="text-sm text-gray-500 mt-2">
                Oleh: {{ $article->user->name }} | {{ $article->created_at->format('d M Y H:i') }}
            </p>
        </div>

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
