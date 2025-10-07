<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kosvia</title>
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
<body class="bg-slate-900">

    <div class="min-h-screen flex flex-col items-center justify-center px-4">
        <a href="#" class="text-3xl font-bold text-teal-400 mb-8">Kosvia</a>

        <div class="w-full max-w-md bg-slate-800 border border-slate-700 rounded-lg p-8">
            <h2 class="text-2xl font-bold text-white text-center mb-1">Selamat Datang Kembali!</h2>
            <p class="text-slate-400 text-center mb-8">Silakan login ke akun Anda.</p>

            <form action="/home/login" method="POST">
                @csrf

                @if (isset($error))
                    <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-lg relative mb-6" role="alert">
                        <div class="flex items-center">
                            <div class="py-1">
                                <i data-lucide="alert-triangle" class="w-5 h-5 mr-3"></i>
                            </div>
                            <div>
                                <span class="font-semibold block sm:inline">{{ $error }}</span>
                            </div>
                        </div>
                    </div>
                @endif

                @if (isset($success))
                    <div class="bg-teal-500/10 border border-teal-500/30 text-teal-400 px-4 py-3 rounded-lg relative mb-6" role="alert">
                        <div class="flex items-center">
                            <div class="py-1">
                                <i data-lucide="check-circle" class="w-5 h-5 mr-3"></i>
                            </div>
                            <div>
                                <span class="block sm:inline">{{ $success }}</span>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="space-y-6">
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
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox" 
                               class="h-4 w-4 rounded border-slate-600 bg-slate-700 text-teal-500 focus:ring-teal-500">
                        <label for="remember-me" class="ml-2 block text-sm text-slate-400">Ingat Saya</label>
                    </div>
                    <div class="text-sm">
                        <a href="#" class="font-medium text-teal-400 hover:text-teal-300">Lupa Password?</a>
                    </div>
                </div>

                <div class="mt-8">
                    <button type="submit" 
                            class="w-full bg-teal-500 text-white font-semibold py-3 px-4 rounded-lg hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-900 focus:ring-teal-500 transition-colors">
                        Login
                    </button>
                </div>
            </form>

            <p class="mt-8 text-center text-sm text-slate-400">
                Belum punya akun?
                <a href="/home/signup" class="font-medium text-teal-400 hover:text-teal-300">Daftar di sini</a>
            </p>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>