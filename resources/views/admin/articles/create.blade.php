@extends('layouts.admin')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-3xl font-bold">Buat Artikel Baru</h1>
            </div>
            <div>
                <a href="{{ route('articles.index') }}"
                   class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                    Kembali
                </a>
            </div>
        </div>

        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-1/2 space-y-6">
                    <div>
                        <label for="title" class="block text-gray-700 font-medium mb-2">Judul</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                               required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="image" class="block text-gray-700 font-medium mb-2">Gambar (Opsional)</label>
                        <div class="relative">
                            <input type="file" name="image" id="image" accept="image/*"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                   onchange="previewImage(event)">
                            <div id="imageUploadArea" class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-gray-400 transition">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="mt-2 text-sm text-gray-600">Klik untuk mengunggah gambar</p>
                                <p class="text-xs text-gray-500">PNG, JPG, JPEG (Max. 5MB)</p>
                            </div>
                        </div>
                        <div id="imagePreviewContainer" class="mt-4 hidden">
                            <div class="relative">
                                <img id="preview" class="w-full h-auto max-h-[400px] object-contain rounded-lg border border-gray-200">
                                <button type="button" onclick="removeImage()" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-2 hover:bg-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="lg:w-1/2">
                    <div class="h-full flex flex-col">
                        <label for="content" class="block text-gray-700 font-medium mb-2">Konten</label>
                        <textarea name="content" id="content" rows="12"
                                  class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 flex-grow"
                                  required>{{ old('content') }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
                <button type="submit"
                        class="px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    Simpan Artikel
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            const imageUploadArea = document.getElementById('imageUploadArea');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    imagePreviewContainer.classList.remove('hidden');
                    imageUploadArea.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            const input = document.getElementById('image');
            const previewContainer = document.getElementById('imagePreviewContainer');
            const uploadArea = document.getElementById('imageUploadArea');

            input.value = '';
            previewContainer.classList.add('hidden');
            uploadArea.classList.remove('hidden');
        }

        // Allow clicking on the preview to select a new image
        document.getElementById('preview').addEventListener('click', function() {
            document.getElementById('image').click();
        });
    </script>
@endsection
