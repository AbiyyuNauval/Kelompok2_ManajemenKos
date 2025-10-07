<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pemilik Kos - Kosvia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 text-slate-300">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-slate-800 border-r border-slate-700 p-6 flex flex-col">
            <a href="" class="text-2xl font-bold text-teal-400 mb-10">Kosvia Panel</a>
            <nav class="flex flex-col space-y-2">
                <a href="" class="flex items-center bg-slate-700 text-white px-4 py-2.5 rounded-lg font-semibold">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
                    Dashboard
                </a>
                <a href="" class="flex items-center text-slate-300 hover:bg-slate-700/50 hover:text-white px-4 py-2.5 rounded-lg transition-colors">
                    <i data-lucide="home" class="w-5 h-5 mr-3"></i>
                    Kelola Properti
                </a>
                </nav>
            <div class="mt-auto">
                 <form action="" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center text-red-400 hover:bg-red-500/10 hover:text-red-300 px-4 py-2.5 rounded-lg transition-colors">
                         <i data-lucide="log-out" class="w-5 h-5 mr-3"></i>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold text-white mb-2">Selamat Datang Kembali!</h1>
            <p class="text-slate-400 mb-8">Berikut adalah ringkasan aktivitas properti Anda.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-slate-800 border border-slate-700 rounded-lg p-6">
                    <h3 class="text-slate-400 text-sm font-medium mb-2">Total Properti Kos</h3>
                    {{-- Baris ini diaktifkan untuk menampilkan variabel $jumlahKos --}}
                    {{-- <p class="text-3xl font-bold text-white">{{ $jumlahKos }}</p> --}}
                </div>
                <div class="bg-slate-800 border border-slate-700 rounded-lg p-6">
                    <h3 class="text-slate-400 text-sm font-medium mb-2">Total Kamar</h3>
                    <p class="text-3xl font-bold text-white">0</p>
                </div>
                <div class="bg-slate-800 border border-slate-700 rounded-lg p-6">
                    <h3 class="text-slate-400 text-sm font-medium mb-2">Booking Baru</h3>
                    <p class="text-3xl font-bold text-teal-400">0</p>
                </div>
            </div>

            <div class="bg-slate-800 border border-slate-700 rounded-lg p-6">
                <h3 class="text-lg font-bold text-white mb-4">Aksi Cepat</h3>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="" class="w-full sm:w-auto flex-1 text-center bg-slate-700 hover:bg-slate-600 text-white font-semibold py-3 px-5 rounded-lg transition-colors">
                        Lihat & Kelola Semua Properti
                    </a>
                    <a href="" class="w-full sm:w-auto flex-1 text-center bg-teal-500 hover:bg-teal-600 text-white font-semibold py-3 px-5 rounded-lg transition-colors">
                        + Tambah Properti Baru
                    </a>
                </div>
            </div>

        </main>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
