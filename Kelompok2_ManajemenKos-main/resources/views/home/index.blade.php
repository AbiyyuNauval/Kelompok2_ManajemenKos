<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kosvia - Temukan Kost Eksklusif</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        /* Font Family Kustom */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-900 text-slate-300">

    <header class="bg-slate-800/80 border-b border-slate-700 sticky top-0 z-50 backdrop-blur-sm">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-teal-400">Kosvia</a>
            
            <div class="hidden md:flex items-center space-x-6">
                <a href="#" class="text-slate-300 hover:text-teal-400 font-medium transition-colors">Sewa Kost</a>
                <a href="#" class="text-slate-300 hover:text-teal-400 font-medium transition-colors">Tentang Kami</a>
            </div>
            
            <div class="flex items-center space-x-4">
                <a href="/home/login" class="px-4 py-2 text-teal-400 border border-teal-500 rounded-lg hover:bg-teal-500/10 transition-colors">Login</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="pt-20 pb-24">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Temukan Penginapan Eksklusif</h1>
                <p class="text-slate-400 md:text-lg mb-8">Ribuan pilihan kost dan apartemen premium di seluruh Indonesia.</p>
                
                <div class="max-w-3xl mx-auto bg-slate-800 border border-slate-700 p-3 rounded-full flex items-center">
                    <i data-lucide="search" class="w-6 h-6 text-slate-500 mx-4"></i>
                    <input type="text" placeholder="Masukkan nama lokasi atau area..." class="w-full py-2 text-lg bg-transparent text-white focus:outline-none placeholder-slate-500">
                    <button class="bg-teal-500 text-white font-semibold px-8 py-3 rounded-full hover:bg-teal-600 whitespace-nowrap transition-colors">Cari</button>
                </div>
            </div>
        </section>

        <section class="py-16 bg-slate-900/50">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-white mb-8">Pilihan Populer Untukmu</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    @foreach ($kosts as $kost)
                    <div class="bg-slate-800 rounded-lg border border-slate-700 overflow-hidden hover:border-teal-500 transition-colors duration-300 group">
                        <div class="relative">
                            <img src="{{ $kost['gambar_url'] }}" alt="{{ $kost['nama'] }}" class="w-full h-48 object-cover">
                            <span class="absolute top-3 left-3 bg-slate-700 text-teal-400 text-sm font-semibold px-3 py-1 rounded-full">{{ $kost['tipe'] }}</span>
                        </div>
                        
                        <div class="p-5">
                            <div class="flex items-center gap-2 mb-2 text-xs text-slate-400">
                                @foreach (array_slice($kost['fasilitas_unggulan'], 0, 2) as $fasilitas)
                                    <span class="bg-slate-700 px-2 py-1 rounded">{{ $fasilitas }}</span>
                                @endforeach
                                @if (count($kost['fasilitas_unggulan']) > 2)
                                    <span class="font-bold text-slate-500">+{{ count($kost['fasilitas_unggulan']) - 2 }}</span>
                                @endif
                            </div>

                            <h3 class="text-lg font-bold text-white truncate group-hover:text-teal-400 transition-colors">{{ $kost['nama'] }}</h3>
                            
                            <p class="text-sm text-slate-400 flex items-center mt-1">
                                <i data-lucide="map-pin" class="w-4 h-4 mr-1"></i>
                                {{ $kost['lokasi'] }}
                            </p>
                            
                            <p class="text-xl font-bold text-teal-400 mt-4">
                                Rp {{ number_format($kost['harga_per_bulan'], 0, ',', '.') }} <span class="text-sm font-normal text-slate-500">/ bulan</span>
                            </p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
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