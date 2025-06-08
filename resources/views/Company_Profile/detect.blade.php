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
                        Unggah Foto Daun Anggrek
                    </label>
                    <input type="file" name="image" accept="image/*" required
                        class="block w-full text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                </div>
                <input type="time" id="time" name="time" hidden value="{{ now()->format('H:i:s') }}">
                <button type="submit"
                    class="bg-primary-600 hover:bg-primary-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                    Deteksi Sekarang
                </button>
            </form>

            @if (session('result'))
                <script>
                    window.addEventListener('load', () => {
                        const imagePath = @json(session('result.image_path'));
                        console.log(@json(session('result')));

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
                            console.log("Image deleted:", data);
                        })
                        .catch(err => console.error("Delete error:", err));
                    });
                </script>
                <div class="border-t pt-8">
                    <h3 class="text-2xl font-bold mb-6 text-gray-800">Hasil Deteksi</h3>

                    <div class="flex flex-col md:flex-row gap-8 items-start">
                        <!-- Gambar Hasil Deteksi -->
                        <div class="relative w-full md:w-2/3">
                            <h4 class="font-bold mb-2 text-gray-700">Gambar yang Diperiksa:</h4>
                            <div class="relative w-full">
                                <img src="{{ asset('storage/' . session('result.result.image_path')) }}"
                                    alt="Detected Orchid"
                                    class="w-full h-auto rounded-lg shadow-md">
                            </div>
                        </div>

                        <!-- Keterangan Deteksi -->
                        <div class="w-full md:w-1/3">
                            <h4 class="font-bold mb-2 text-gray-700">Detail Identifikasi:</h4>
                            <div class="bg-white p-4 rounded-lg shadow-inner w-full">
                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <p class="font-semibold">Jenis Penyakit:</p>
                                        <p>{{ session('result.result.outputs.0.predictions.predictions.0.class') }}</p>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Tingkat Akurasi:</p>
                                        <p>{{ round(session('result.result.outputs.0.predictions.predictions.0.confidence') * 100, 2) }}%</p>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Waktu Proses:</p>
                                        <p>{{ session('result.waktu') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
