@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-2 sm:px-6">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <h2 class="text-xl sm:text-2xl font-semibold">Daftar Anggrek</h2>
        <a href="{{route('anggrek.create')}}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded text-sm sm:text-base w-full sm:w-auto text-center">
            Tambah Anggrek Baru
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ $message }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-xs sm:text-sm leading-normal">
                    <th class="py-3 px-2 sm:px-6 text-left">ID</th>
                    <th class="py-3 px-2 sm:px-6 text-left">Nama Anggrek</th>
                    <th class="py-3 px-2 sm:px-6 text-left">Nama Latin</th>
                    <th class="py-3 px-2 sm:px-6 text-left">Foto</th>
                    <th class="py-3 px-2 sm:px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-xs sm:text-sm">
                @foreach ($anggreks as $anggrek)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-2 sm:px-6 text-left">{{ $anggrek->id }}</td>
                    <td class="py-3 px-2 sm:px-6 text-left">{{ $anggrek->nama_anggrek }}</td>
                    <td class="py-3 px-2 sm:px-6 text-left">{{ $anggrek->nama_latin }}</td>
                    <td class="py-3 px-2 sm:px-6 text-left">
                        @if($anggrek->foto)
                            <img src="{{ asset($anggrek->foto) }}" alt="{{ $anggrek->nama_anggrek }}" class="h-10 w-10 object-cover rounded">
                        @else
                            <span class="text-gray-400">No image</span>
                        @endif
                    </td>
                    <td class="py-3 px-2 sm:px-6 text-center">
                        <div class="flex item-center justify-center space-x-1 sm:space-x-2">
                            <a href="{{ route('anggrek.show',$anggrek)}}" class="text-blue-500 hover:text-blue-700" title="Lihat">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="{{route('anggrek.edit', $anggrek)}}" class="text-green-500 hover:text-green-700" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </a>
                            <form action="{{route('anggrek.destroy',$anggrek)}}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $anggreks->links() }}
    </div>
</div>
@endsection
