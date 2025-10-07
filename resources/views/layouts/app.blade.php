<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kosvia - Temukan Kost Eksklusif')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 text-slate-300">

    <header class="bg-slate-800/80 border-b border-slate-700 sticky top-0 z-50 backdrop-blur-sm">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/home" class="text-2xl font-bold text-teal-400">Kosvia</a>

            <div class="flex items-center space-x-4">
                @if (session('user'))
                    <span class="font-medium text-white hidden sm:block">Halo, {{ session('user')['username'] }}!</span>

                    @if (session('role') == 'Admin')
                        <a href="/admin/dashboard" class="text-slate-300 hover:text-teal-400 text-sm font-medium">Dashboard</a>
                    @endif

                    <a href="/logout" class="px-4 py-2 text-red-400 border border-red-500 rounded-lg hover:bg-red-500/10 transition-colors text-sm">Logout</a>
                @else
                    <a href="/home/login" class="px-4 py-2 text-teal-400 border border-teal-500 rounded-lg hover:bg-teal-500/10 transition-colors">Login</a>
                @endif
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white pt-12 pb-8">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h4 class="font-bold mb-4">Kosvia</h4>
                    <a href="#" class="block hover:underline">Tentang Kami</a>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Hubungi Kami</h4>
                    <div class="flex space-x-4">
                        <a href="#"><i data-lucide="facebook"></i></a>
                        <a href="#"><i data-lucide="twitter"></i></a>
                        <a href="#"><i data-lucide="instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-6 text-center text-sm text-gray-400">
                &copy; {{ date('Y') }} Kosvia. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
