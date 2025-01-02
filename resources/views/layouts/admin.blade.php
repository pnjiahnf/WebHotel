<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div id="app" class="relative min-h-screen flex">
        <!-- Sidebar -->
        <div 
            id="sidebar" 
            class="fixed bg-gray-800 text-white w-64 min-h-screen transform -translate-x-full transition-transform duration-300"
        >
            <div class="p-4 text-center">
                <h1 class="text-xl font-bold">GOLDEN HOTEL</h1>
            </div>
            <ul class="mt-4">
                <li class="py-2 px-4 hover:bg-gray-700">
                    <a href="{{ route('hotels.index') }}" class="block">Manajemen Hotel</a>
                </li>
                 <li class="py-2 px-4 hover:bg-gray-700">
                    <a href="{{ route('reservasi.index') }}" class="block">Manajemen Reservasi</a>
                </li>
               {{-- <li class="py-2 px-4 hover:bg-gray-700">
                    <a href="#" class="block">Manajemen Kamar</a>
                </li>
                <li class="py-2 px-4 hover:bg-gray-700">
                    <a href="#" class="block">Manajemen Tamu</a>
                </li>
                <li class="py-2 px-4 hover:bg-gray-700">
                    <a href="#" class="block">Laporan Keuangan</a>
                </li>
                <li class="py-2 px-4 hover:bg-gray-700">
                    <a href="#" class="block">Laporan Pemakaian Kamar</a> --}}
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Bar -->
            <div class="bg-white shadow p-4 flex items-center justify-between">
                <button 
                    id="toggleSidebar" 
                    class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700"
                >
                    Menu
                </button>
                <h1 class="text-xl font-bold">Admin Dashboard</h1>
            </div>

            <!-- Content -->
            <div class="p-6">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleSidebar = document.getElementById('toggleSidebar');

        // Toggle Sidebar
        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        // Close Sidebar when clicking outside
        window.addEventListener('click', (e) => {
            if (!sidebar.contains(e.target) && !toggleSidebar.contains(e.target)) {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
</body>
</html>
