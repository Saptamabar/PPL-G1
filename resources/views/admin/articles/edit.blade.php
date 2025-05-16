@extends('layouts.admin')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-3xl font-bold">Edit Artikel</h1>
                <p class="text-sm text-gray-500 mt-2">
                    Terakhir diupdate: {{ $article->updated_at->format('d M Y H:i') }}
                </p>
            </div>
            <div>
                <a href="{{ route('articles.index') }}"
                   class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                    Kembali
                </a>
            </div>
        </div>

        <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-1/2 space-y-6">
                    <div>
                        <label for="title" class="block text-gray-700 font-medium mb-2">Judul</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}"
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                               required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="image" class="block text-gray-700 font-medium mb-2">Gambar</label>

                        @if($article->image)
                            <div id="currentImageContainer" class="mb-4">
                                <div class="relative">
                                    <x-cloudinary::image public-id="{{ $article->image }}" alt="Current image"
                                         class="w-full h-auto max-h-[400px] object-contain rounded-lg border border-gray-200"/>
                                    <button type="button" onclick="removeCurrentImage()" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-2 hover:bg-red-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="mt-2">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="remove_image" id="removeImageCheckbox"
                                               class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50">
                                        <span class="ml-2">Hapus gambar saat disimpan</span>
                                    </label>
                                </div>
                            </div>
                        @endif

                        <div class="relative">
                            <input type="file" name="image" id="image" accept="image/*"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                   onchange="previewNewImage(event)">
                            <div id="imageUploadArea" class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-gray-400 transition {{ $article->image ? 'hidden' : '' }}">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="mt-2 text-sm text-gray-600">Klik untuk mengunggah gambar baru</p>
                                <p class="text-xs text-gray-500">PNG, JPG, JPEG (Max. 5MB)</p>
                            </div>
                        </div>
                        <div id="newImagePreviewContainer" class="mt-4 hidden">
                            <div class="relative">
                                <img id="newImagePreview" class="w-full h-auto max-h-[400px] object-contain rounded-lg border border-gray-200">
                                <button type="button" onclick="removeNewImage()" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-2 hover:bg-red-600">
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
                                  required>{{ old('content', $article->content) }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-4">
                <a href="{{ route('articles.index') }}"
                   class="px-6 py-3 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    Perbarui Artikel
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewNewImage(event) {
            const preview = document.getElementById('newImagePreview');
            const previewContainer = document.getElementById('newImagePreviewContainer');
            const uploadArea = document.getElementById('imageUploadArea');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    uploadArea.classList.add('hidden');

                    // Hide current image container if exists
                    const currentImageContainer = document.getElementById('currentImageContainer');
                    if (currentImageContainer) {
                        currentImageContainer.classList.add('hidden');
                    }
                }
                reader.readAsDataURL(file);
            }
        }

        function removeNewImage() {
            const input = document.getElementById('image');
            const previewContainer = document.getElementById('newImagePreviewContainer');
            const uploadArea = document.getElementById('imageUploadArea');

            input.value = '';
            previewContainer.classList.add('hidden');
            uploadArea.classList.remove('hidden');

            // Show current image container if exists
            const currentImageContainer = document.getElementById('currentImageContainer');
            if (currentImageContainer) {
                currentImageContainer.classList.remove('hidden');
            }
        }

        function removeCurrentImage() {
            const currentImageContainer = document.getElementById('currentImageContainer');
            const uploadArea = document.getElementById('imageUploadArea');
            const removeCheckbox = document.getElementById('removeImageCheckbox');

            currentImageContainer.classList.add('hidden');
            uploadArea.classList.remove('hidden');
            removeCheckbox.checked = true;
        }

        // Allow clicking on preview to select new image
        document.getElementById('newImagePreview')?.addEventListener('click', function() {
            document.getElementById('image').click();
        });
    </script>
@endsection
