<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kos Saya - Kosvia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 text-slate-300">

   <header class="bg-slate-800/80 border-b border-slate-700 sticky top-0 z-50">
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
        {{-- MODIFIKASI LINK LOGO --}}
        <a href="<mark class="bg-yellow-200">{{ route('pemilik.dashboard') }}</mark>" class="text-2xl font-bold text-teal-400"><mark class="bg-yellow-200">Kosvia Panel</mark></a>
        <div class="flex items-center space-x-4">
            <span class="text-white">Halo, {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                {{-- Tombol Logout sudah berada di kanan atas --}}
                <button type="submit" class="px-4 py-2 text-red-400 border border-red-500 rounded-lg hover:bg-red-500/10 transition-colors">Logout</button>
            </form>
            </div>
        </nav>
    </header>

    <main class="container mx-auto px-6 py-12">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-white">Properti Kos Saya</h1>
            <a href="{{ route('manajemen-kos.create') }}" class="bg-teal-500 text-white font-semibold px-5 py-2.5 rounded-lg hover:bg-teal-600 transition-colors flex items-center">
                <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
                Tambah Kos Baru
            </a>
        </div>

        @if (session('success'))
            <div class="bg-teal-500/10 border border-teal-500/30 text-teal-400 px-4 py-3 rounded-lg relative mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-slate-800 border border-slate-700 rounded-lg overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-slate-700/50">
                    <tr>
                        <th class="p-4 font-semibold text-white">Nama Kos</th>
                        <th class="p-4 font-semibold text-white">Alamat</th>
                        <th class="p-4 font-semibold text-white">Harga / Bulan</th>
                        <th class="p-4 font-semibold text-white text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($daftarKos as $kos)
                    <tr class="border-t border-slate-700">
                        <td class="p-4 text-white font-medium">{{ $kos->nama_kos }}</td>
                        <td class="p-4 text-slate-400">{{ $kos->alamat }}</td>
                        <td class="p-4 text-teal-400 font-semibold">Rp {{ number_format($kos->harga_bulanan, 0, ',', '.') }}</td>
                        <td class="p-4 text-right">
                            <div class="flex justify-end space-x-3">
                                <a href="{{ route('manajemen-kos.edit', $kos->id) }}" class="text-blue-400 hover:text-blue-300">Edit</a>
                                <form action="{{ route('manajemen-kos.destroy', $kos->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus kos ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-8 text-center text-slate-500">
                            Anda belum memiliki properti kos. Silakan tambahkan kos baru.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-8">
            {{ $daftarKos->links() }}
        </div>
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
