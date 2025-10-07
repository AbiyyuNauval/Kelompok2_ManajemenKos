<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($kos) ? 'Edit' : 'Tambah' }} Properti Kos - Kosvia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 text-slate-300">

    <main class="container mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold text-white mb-8">
            {{ isset($kos) ? 'Edit Properti Kos' : 'Tambah Properti Kos Baru' }}
        </h1>

        <div class="w-full max-w-2xl bg-slate-800 border border-slate-700 rounded-lg p-8">

            <form action="{{ isset($kos) ? route('manajemen-kos.update', $kos->id) : route('manajemen-kos.store') }}" method="POST">
                @csrf
                @if (isset($kos))
                    @method('PUT')
                @endif

                <div class="space-y-6">
                    <div>
                        <label for="nama_kos" class="block text-sm font-medium text-slate-300 mb-2">Nama Kos</label>
                        <input type="text" name="nama_kos" id="nama_kos" value="{{ old('nama_kos', $kos->nama_kos ?? '') }}"
                               class="w-full bg-slate-700 border border-slate-600 text-white rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500"
                               placeholder="Contoh: Kos Apik Tipe A" required>
                    </div>

                    <div>
                        <label for="alamat" class="block text-sm font-medium text-slate-300 mb-2">Alamat Lengkap</label>
                        <textarea name="alamat" id="alamat" rows="3"
                                  class="w-full bg-slate-700 border border-slate-600 text-white rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                  placeholder="Masukkan alamat lengkap properti kos" required>{{ old('alamat', $kos->alamat ?? '') }}</textarea>
                    </div>

                    <div>
                        <label for="harga_bulanan" class="block text-sm font-medium text-slate-300 mb-2">Harga per Bulan (Rp)</label>
                        <input type="number" name="harga_bulanan" id="harga_bulanan" value="{{ old('harga_bulanan', $kos->harga_bulanan ?? '') }}"
                               class="w-full bg-slate-700 border border-slate-600 text-white rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500"
                               placeholder="Contoh: 1500000" required>
                    </div>

                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-slate-300 mb-2">Deskripsi (Opsional)</label>
                        <textarea name="deskripsi" id="deskripsi" rows="5"
                                  class="w-full bg-slate-700 border border-slate-600 text-white rounded-md px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                  placeholder="Jelaskan tentang fasilitas, peraturan, dll.">{{ old('deskripsi', $kos->deskripsi ?? '') }}</textarea>
                    </div>
                </div>

                <div class="mt-8 flex items-center justify-end space-x-4">
                    <a href="{{ route('manajemen-kos.index') }}" class="text-slate-400 hover:text-white">Batal</a>
                    <button type="submit"
                            class="bg-teal-500 text-white font-semibold py-2.5 px-6 rounded-lg hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-900 focus:ring-teal-500 transition-colors">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
