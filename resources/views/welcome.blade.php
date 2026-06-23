<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian Online | SMKN 7 Pekanbaru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 font-sans min-h-screen flex flex-col justify-between">

    <header class="bg-blue-700 text-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="bg-white p-2 rounded-full text-blue-700 text-xl font-bold w-10 h-10 flex items-center justify-center shadow">
                    <i class="fas fa-school"></i>
                </div>
                <div>
                    <h1 class="font-bold text-lg leading-tight">SMK NEGERI 7 PEKANBARU</h1>
                    <p class="text-xs text-blue-200">Sistem Informasi Ujian Online</p>
                </div>
            </div>
            <span class="text-sm bg-blue-800 px-3 py-1 rounded-full text-blue-100 hidden sm:inline-block">
                <i class="far fa-calendar-alt mr-1"></i> 2026/2027
            </span>
        </div>
    </header>

    <main class="container mx-auto px-4 py-12 flex-grow flex items-center justify-center">
        <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md w-full border border-slate-200">
            
            <div class="text-center mb-8">
                <span class="text-xs font-semibold uppercase tracking-widest bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                    Selamat Datang
                </span>
                <h2 class="text-xl font-bold text-slate-800 mt-3">
                    Aplikasi Ujian Online
                </h2>
                <p class="text-sm text-slate-500 mt-1">
                    Silakan masuk menggunakan akun siswa atau guru yang terdaftar.
                </p>
            </div>

            <form action="#" method="POST" class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Nomor Induk Siswa / Username</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" name="username" required placeholder="Masukkan NISN atau Username" 
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="password" required placeholder="••••••••" 
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center text-slate-600 cursor-pointer">
                        <input type="checkbox" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 mr-1.5">
                        Ingat Saya
                    </label>
                    <a href="#" class="text-blue-600 hover:underline font-medium">Lupa Password?</a>
                </div>

                <button type="submit" 
                    class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg text-sm shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all flex items-center justify-center space-x-2">
                    <span>Masuk ke Ujian</span>
                    <i class="fas fa-arrow-right text-xs"></i>
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-slate-100 text-center text-xs text-slate-400">
                <p><i class="fas fa-info-circle mr-1"></i> Kendala login? Hubungi Proktor/Teknisi Ruangan.</p>
            </div>

        </div>
    </main>

    <footer class="bg-slate-800 text-slate-400 py-4 text-center text-xs border-t border-slate-700">
        <div class="container mx-auto px-4">
            &copy; 2026 SMK Negeri 7 Pekanbaru. All Rights Reserved.
        </div>
    </footer>

</body>
</html>