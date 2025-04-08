@extends('Company_Profile.app')

@section('content')
<!-- Detection Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="bg-gray-50 rounded-lg shadow-md p-8">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <strong>{{ $errors->first() }}</strong>
                </div>
            @endif

            <form action="{{ route('detect.orchid') }}" method="POST" enctype="multipart/form-data" class="mb-8">
                @csrf
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="image">
                        Unggah Foto Anggrek
                    </label>
                    <input type="file" name="image" accept="image/*" required
                        class="block w-full text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                </div>
                <button type="submit"
                    class="bg-primary-600 hover:bg-primary-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                    Deteksi Sekarang
                </button>
            </form>

            @if (session('result'))
                <script>
                    window.addEventListener('load', () => {
                        const imagePath = @json(session('result.image_path'));

                        // Kirim DELETE request untuk menghapus gambar setelah ditampilkan
                        fetch("{{ route('detect.deleteImage') }}", {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({ image_path: imagePath })
                        })
                        .then(res => res.json())
                        .then(data => {
                            console.log("Image deleted:", data.message);
                        })
                        .catch(err => console.error("Delete error:", err));
                    });
                </script>
                <div class="border-t pt-8">
                    <h3 class="text-2xl font-bold mb-6 text-gray-800">Hasil Deteksi</h3>

                    <div class="flex flex-col md:flex-row gap-8 items-start">
                        <!-- Gambar dan Bounding Box -->
                        <div class="relative w-full md:w-2/3">
                            <h4 class="font-bold mb-2 text-gray-700">Hasil Deteksi Penyakit:</h4>
                            <div class="relative w-full">
                                <img src="{{ asset('storage/' . session('result.image_path')) }}"
                                    alt="Detected Orchid"
                                    id="detectionImage"
                                    class="w-full h-auto rounded-lg shadow-md">

                                <div id="boundingBoxes" class="absolute inset-0 z-10"></div>
                            </div>
                        </div>

                        <!-- Keterangan Deteksi -->
                        <div class="w-full md:w-1/3">
                            <h4 class="font-bold mb-2 text-gray-700">Detail Identifikasi:</h4>
                            <div class="bg-white p-4 rounded-lg shadow-inner w-full">
                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <p class="font-semibold">Jenis Penyakit:</p>
                                        <p>{{ session('result.predictions.0.class') }}</p>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Tingkat Kepercayaan:</p>
                                        <p>{{ round(session('result.predictions.0.confidence') * 100, 2) }}%</p>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Ukuran Area:</p>
                                        <p>{{ session('result.predictions.0.width') }}px × {{ session('result.predictions.0.height') }}px</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const boundingBoxes = document.getElementById('boundingBoxes');
                        const image = document.getElementById('detectionImage');

                        const originalWidth = {{ session('result.original_width') }};
                        const originalHeight = {{ session('result.original_height') }};

                        @foreach (session('result.predictions') as $prediction)
                            const box = document.createElement('div');
                            box.classList.add('absolute');
                            box.style.border = '2px solid red';
                            box.style.boxSizing = 'border-box';
                            box.style.zIndex = 20;

                            // Hitung dalam persentase
                            const xPercent = ({{ $prediction['x'] }} - {{ $prediction['width'] }} / 2) / originalWidth * 100;
                            const yPercent = ({{ $prediction['y'] }} - {{ $prediction['height'] }} / 2) / originalHeight * 100;
                            const widthPercent = {{ $prediction['width'] }} / originalWidth * 100;
                            const heightPercent = {{ $prediction['height'] }} / originalHeight * 100;

                            box.style.left = `${xPercent}%`;
                            box.style.top = `${yPercent}%`;
                            box.style.width = `${widthPercent}%`;
                            box.style.height = `${heightPercent}%`;

                            const label = document.createElement('div');
                            label.style.position = 'absolute';
                            label.style.top = '-20px';
                            label.style.left = '0';
                            label.style.backgroundColor = 'rgba(255, 0, 0, 0.7)';
                            label.style.color = 'white';
                            label.style.padding = '2px 6px';
                            label.style.fontSize = '12px';
                            label.style.borderRadius = '4px';
                            label.style.fontWeight = 'bold';
                            label.innerText = '{{ $prediction['class'] }} ({{ round($prediction['confidence'] * 100, 1) }}%)';

                            box.appendChild(label);
                            boundingBoxes.appendChild(box);
                        @endforeach
                    });
                </script>
            @endif
        </div>
    </div>
</section>
@endsection
