<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-slate-900 text-slate-300">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-slate-800 border-r border-slate-700 flex flex-col">
            <div class="p-6">
                <a href="/admin/dashboard" class="text-2xl font-bold text-teal-400">Admin Kosvia</a>
            </div>
            <nav class="flex-1 px-4 py-2 space-y-2">
                <a href="/admin/dashboard" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ Request::is('admin/dashboard') ? 'bg-slate-700 text-white' : 'text-slate-400 hover:bg-slate-700/50 hover:text-white' }} transition-colors">
                    <i data-lucide="home" class="w-5 h-5 mr-3"></i> Home
                </a>
                <a href="/admin/chat" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ Request::is('admin/chat') ? 'bg-slate-700 text-white' : 'text-slate-400 hover:bg-slate-700/50 hover:text-white' }} transition-colors">
                    <i data-lucide="message-square" class="w-5 h-5 mr-3"></i> Chat
                </a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="bg-slate-800/50 border-b border-slate-700 px-8 py-4 flex justify-between items-center">
                <div>
                    <h1 class="text-lg font-semibold text-white">Chat</h1>
                </div>

                <div class="relative">
                        <button id="profile-button" class="flex items-center space-x-3 focus:outline-none">
                            <div class="w-9 h-9 bg-slate-700 rounded-full flex items-center justify-center">
                                <i data-lucide="user" class="w-5 h-5 text-slate-300"></i>
                            </div>
                            <span class="text-sm font-medium text-white">{{ session('user')['username'] ?? 'Admin' }}</span>
                        </button>

                        <div id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-slate-800 border border-slate-700 rounded-md shadow-lg py-1 z-20 hidden">
                            <a href="/logout" class="flex items-center w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-red-500/10">
                                <i data-lucide="log-out" class="w-4 h-4 mr-2"></i> Logout
                            </a>
                        </div>
                    </div>
            </header>

            <main class="flex-1 flex overflow-hidden">
                <div class="w-1/3 bg-slate-800 border-r border-slate-700 flex flex-col">
                    <div class="p-4 border-b border-slate-700">
                        <input type="text" placeholder="Cari Pemilik Kos..." class="w-full bg-slate-700 border-slate-600 rounded-md py-2 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-teal-500">
                    </div>
                    <div class="flex-1 overflow-y-auto">
                        <div class="p-4 flex items-center bg-slate-700 border-r-2 border-teal-400 cursor-pointer">
                            <div class="w-10 h-10 rounded-full bg-teal-500 flex-shrink-0 mr-3 flex items-center justify-center font-bold text-white">S</div>
                            <div>
                                <h3 class="font-semibold text-white">Budi (Kos Merah)</h3>
                                <p class="text-xs text-slate-400 truncate">Halo Admin, saya mau menanyakan kenapa status pembayaran...</p>
                            </div>
                        </div>
                        <div class="p-4 flex items-center justify-between hover:bg-slate-700/50 cursor-pointer">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-sky-500 flex-shrink-0 mr-3 flex items-center justify-center font-bold text-white">B</div>
                                <div>
                                    <h3 class="font-semibold text-white">Agus (Kos Kuning)</h3>
                                    <p class="text-xs text-slate-400 truncate">Halo admin, saya mau tanya soal...</p>
                                </div>
                            </div>
                            <span class="bg-teal-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                                3
                            </span>
                        </div>
                    </div>
                </div>

                <div class="w-2/3 flex flex-col">
                    <div class="p-4 border-b border-slate-700 flex items-center">
                        <div class="w-10 h-10 rounded-full bg-teal-500 flex-shrink-0 mr-3 flex items-center justify-center font-bold text-white">S</div>
                        <div>
                            <h3 class="font-semibold text-white">Budi (Kos Merah)</h3>
                            <p class="text-xs text-emerald-400">Online</p>
                        </div>
                    </div>
                    <div class="flex-1 p-6 overflow-y-auto space-y-6">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-full bg-teal-500 flex-shrink-0 flex items-center justify-center font-bold text-white text-sm">S</div>
                            <div class="bg-slate-700 p-3 rounded-lg max-w-md">
                                <p class="text-sm">Halo Admin, saya mau menanyakan kenapa status pembayaran untuk bulan Oktober masih tertunda ya di sistem saya?</p>
                                <p class="text-xs text-slate-400 text-right mt-1">09:15</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 justify-end">
                            <div class="bg-teal-500 text-white p-3 rounded-lg max-w-md">
                                <p class="text-sm">Selamat pagi, Pak Budi. Mohon ditunggu sebentar, kami sedang melakukan pengecekan pada sistem. Akan kami kabari segera jika sudah ada update.</p>
                                <p class="text-xs text-teal-200 text-right mt-1">09:16</p>
                            </div>
                            <div class="w-8 h-8 rounded-full bg-slate-700 flex-shrink-0 flex items-center justify-center font-bold text-white text-sm">A</div>
                        </div>
                    </div>
                    <div class="p-4 bg-slate-800 border-t border-slate-700">
                        <div class="flex items-center gap-4">
                            <input type="text" placeholder="Ketik balasan untuk Budi..." class="flex-1 bg-slate-700 border-slate-600 rounded-full py-2 px-5 text-sm focus:outline-none focus:ring-2 focus:ring-teal-500">
                            <button class="bg-teal-500 text-white p-2.5 rounded-full hover:bg-teal-600 transition-colors">
                                <i data-lucide="send" class="w-5 h-5"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        lucide.createIcons();

        const profileButton = document.getElementById('profile-button');
        const profileDropdown = document.getElementById('profile-dropdown');

        profileButton.addEventListener('click', () => {
            profileDropdown.classList.toggle('hidden');
        });

        window.addEventListener('click', (e) => {
            if (!profileButton.contains(e.target) && !profileDropdown.contains(e.target)) {
                profileDropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
