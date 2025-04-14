@extends('layouts.app')

@section('navbar')
<body class="bg-gray-100 font-sans">
    <div class="flex flex-col md:flex-row h-screen">
        <!-- Mobile Sidebar Toggle -->
        <div class="md:hidden bg-primary-800 p-4 flex justify-between items-center sticky top-0 z-20">
            <div class="text-xl font-bold text-white">Anggrek AI</div>
            <button id="sidebarToggle" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Sidebar - Hidden on mobile by default -->
        <div id="sidebar" class="w-64 bg-primary-800 text-white p-4 transform -translate-x-full md:translate-x-0 transition-transform duration-300 fixed md:relative h-full z-50 overflow-y-auto">
            <div class="text-xl font-bold mb-8 hidden md:block">Anggrek AI</div>
            <nav>
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('dashboardadmin') }}" class="block px-4 py-2 rounded hover:bg-primary-700 {{ request()->routeIs('dashboardadmin') ? 'bg-primary-600' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('anggrek.index')}}" class="block px-4 py-2 rounded hover:bg-primary-700 {{ request()->routeIs('anggrek.*') ? 'bg-primary-600' : '' }}">
                            Anggrek
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{--  --}}" class="block px-4 py-2 rounded hover:bg-primary-700 {{ request()->routeIs('employees.*') ? 'bg-primary-600' : '' }}">
                            Data Karyawan
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{--  --}}" class="block px-4 py-2 rounded hover:bg-primary-700">
                            Ajukan Izin
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('articles.index') }}" class="block px-4 py-2 rounded hover:bg-primary-700  {{ request()->routeIs('articles.*') ? 'bg-primary-600' : '' }}">
                            Article
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto pt-16 md:pt-0">
            <header class="bg-white shadow p-4 sticky top-0 z-10">
                <div class="flex justify-between items-center">
                    <h1 class="text-xl md:text-2xl font-semibold text-gray-800">@yield('title')</h1>
                    <div class="text-gray-600 text-sm md:text-base px-2.5">
                        {{ Auth::user()->name }}
                    </div>
                </div>
            </header>

            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- JavaScript for mobile sidebar toggle -->
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>
</body>
</html>
@endsection
