<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Kosvia</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
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

                <a href="/admin/chat" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-slate-400 hover:bg-slate-700/50 hover:text-white transition-colors">
                    <i data-lucide="message-square" class="w-5 h-5 mr-3"></i> Chat
                </a>
            </nav>

            </aside>

        <div class="flex-1 flex flex-col">

            <header class="bg-slate-800/50 border-b border-slate-700 px-8 py-4 flex justify-between items-center">
                <div>
                    <h1 class="text-lg font-semibold text-white">Home Dashboard</h1>
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

            <main class="p-8">
                @if (session('success'))
                <div class="bg-teal-500/10 border border-teal-500/30 text-teal-300 px-4 py-3 rounded-lg relative mb-8" role="alert">
                    <div class="flex items-center">
                        <div class="py-1"><i data-lucide="check-circle" class="w-5 h-5 mr-3"></i></div>
                        <div>
                            <span class="font-semibold">{{ session('success') }}</span>
                        </div>
                    </div>
                </div>
                @endif

                <div class="mb-10">
                    <p class="text-slate-400">Selamat datang kembali!</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-slate-800 border border-slate-700 rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="bg-teal-500/10 p-3 rounded-lg">
                                <i data-lucide="home" class="w-6 h-6 text-teal-400"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-slate-400">Jumlah Kost</p>
                                <p class="text-2xl font-bold text-white">125</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-slate-800 border border-slate-700 rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="bg-sky-500/10 p-3 rounded-lg">
                                <i data-lucide="users" class="w-6 h-6 text-sky-400"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-slate-400">Jumlah Pengguna</p>
                                <p class="text-2xl font-bold text-white">480</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-800 border border-slate-700 rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="bg-amber-500/10 p-3 rounded-lg">
                                <i data-lucide="user-check" class="w-6 h-6 text-amber-400"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-slate-400">Jumlah Pemilik Kos</p>
                                <p class="text-2xl font-bold text-white">27</p>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-3 bg-slate-800 border border-slate-700 rounded-lg p-6">
                        <h2 class="text-lg font-semibold text-white mb-4">Grafik Pendapatan Admin (6 Bulan Terakhir)</h2>
                        <div class="h-80">
                            <canvas id="pendapatanChart"></canvas>
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

    <script>
        const ctx = document.getElementById('pendapatanChart').getContext('2d');
        const labels = ['Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober'];
        const dataPendapatan = [950000, 1500000, 1300000, 1750000, 1600000, 2100000];

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pendapatan',
                    data: dataPendapatan,
                    borderColor: 'rgb(54, 211, 153)',
                    backgroundColor: 'rgba(54, 211, 153, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'rgba(100, 116, 139, 0.7)', // Warna teks sumbu Y
                            callback: function(value, index, values) {
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                            }
                        },
                        grid: {
                            color: 'rgba(100, 116, 139, 0.2)' // Warna garis grid
                        }
                    },
                    x: {
                        ticks: {
                            color: 'rgba(100, 116, 139, 0.7)' // Warna teks sumbu X
                        },
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
</body>
</html>
