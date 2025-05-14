@extends('layouts.app')

@section('navbar')
<body class="bg-gray-100 font-sans">
    <div class="flex flex-col md:flex-row h-screen">
        <!-- Mobile Sidebar Toggle -->
        <div class="md:hidden bg-primary-800 p-4 flex justify-between items-center">
            <div class="text-xl font-bold text-white">Anggrek AI</div>
            <button id="sidebarToggle" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>


        <div id="sidebar" class="w-64 bg-primary-800 text-white p-4 transform -translate-x-full md:translate-x-0 transition-transform duration-300 fixed md:relative h-full z-50 flex flex-col">
            <div class="text-xl font-bold mb-8 hidden md:block ">Anggrek AI</div>
            <nav>
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('dashboardkaryawan') }}" class="block px-4 py-2 rounded hover:bg-primary-700 {{ request()->routeIs('dashboardkaryawan') ? 'bg-primary-600' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-2 relative group">
                            <a href="#" class="flex items-center justify-between px-4 py-2 rounded hover:bg-primary-600 {{ request()->routeIs(['inventaris.*','inventaris-habis.*','inventaris-tak-habis.*']) ? 'bg-primary-600' : '' }}">
                                Inventaris
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>
                            <ul class="ml-4 mt-1 hidden group-hover:block bg-primary-800 rounded">
                                <li class="mb-1">
                                    <a href="{{ route('inventariskaryawan-habis.index') }}" class="block px-4 py-2 rounded hover:bg-primary-600 {{ request()->routeIs(['inventaris.habis','inventaris-habis.*']) ? 'bg-primary-600' : '' }}">
                                        Inventaris Habis
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('inventariskaryawan-tak-habis.index') }}" class="block px-4 py-2 rounded hover:bg-primary-600 {{ request()->routeIs(['inventaris.takhabis','inventaris-tak-habis.*']) ? 'bg-primary-600' : '' }}">
                                        Inventaris Tak Habis
                                    </a>
                                </li>
                            </ul>
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
                </ul>
            </nav>
            <div class="mt-auto">
                <ul>
                    <li class="mb-2">
                        <form action="{{ route('logout') }}" method="GET">
                        @csrf
                        <button type="submit" class="block px-4 w-full py-2 rounded hover:bg-yellow-600 bg-yellow-400 }}">
                            Logout
                        </button>
                    </form>
                    </li>
                </ul>
            </div>
        </div>


        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <header class="bg-white shadow p-4">
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
