<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Kosvia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-900">

    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-8">
        <a href="/" class="text-3xl font-bold text-teal-400 mb-8">Kosvia</a>

        <div class="w-full max-w-md bg-slate-800 border border-slate-700 rounded-lg p-8">
            <h2 class="text-2xl font-bold text-white text-center mb-1">Buat Akun Baru</h2>
            <p class="text-slate-400 text-center mb-8">Selamat datang! Mari kita mulai.</p>

            <form action="/home/signup" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-lg relative mb-6" role="alert">
                        <div class="flex items-center">
                            <div class="py-1">
                                <i data-lucide="alert-triangle" class="w-5 h-5 mr-3"></i>
                            </div>
                            <div>
                                <span class="font-semibold block sm:inline">Terjadi kesalahan</span>
                                <ul class="list-disc pl-5 mt-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-300 mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i data-lucide="user" class="w-5 h-5 text-slate-500"></i>
                            </span>
                            <input type="text" name="name" id="name"
                                   class="w-full bg-slate-700 border border-slate-600 text-white rounded-md pl-10 pr-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                   placeholder="Nama lengkap Anda" required>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-300 mb-2">Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i data-lucide="mail" class="w-5 h-5 text-slate-500"></i>
                            </span>
                            <input type="email" name="email" id="email"
                                   class="w-full bg-slate-700 border border-slate-600 text-white rounded-md pl-10 pr-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                   placeholder="anda@email.com" required>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-300 mb-2">Password</label>
                        <div class="relative">
                             <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i data-lucide="lock" class="w-5 h-5 text-slate-500"></i>
                            </span>
                            <input type="password" name="password" id="password"
                                   class="w-full bg-slate-700 border border-slate-600 text-white rounded-md pl-10 pr-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                   placeholder="••••••••" required>
                        </div>
                    </div>
                    
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-slate-300 mb-2">Konfirmasi Password</label>
                        <div class="relative">
                             <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i data-lucide="lock-keyhole" class="w-5 h-5 text-slate-500"></i>
                            </span>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="w-full bg-slate-700 border border-slate-600 text-white rounded-md pl-10 pr-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                   placeholder="••••••••" required>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <button type="submit"
                            class="w-full bg-teal-500 text-white font-semibold py-3 px-4 rounded-lg hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-900 focus:ring-teal-500 transition-colors">
                        Daftar
                    </button>
                </div>
            </form>

            <p class="mt-8 text-center text-sm text-slate-400">
                Sudah punya akun?
                <a href="/home/login" class="font-medium text-teal-400 hover:text-teal-300">Login di sini</a>
            </p>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>