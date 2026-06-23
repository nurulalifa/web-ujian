<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | SMKN 7 Pekanbaru</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        rel="stylesheet">
</head>

<body class="bg-slate-100 overflow-hidden">

    <div class="flex h-screen">

        <!-- SIDEBAR -->
        <aside id="sidebar"
            class="fixed lg:relative inset-y-0 left-0 z-50 w-72 bg-slate-900 text-slate-200 flex flex-col shadow-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300">

            <!-- Logo -->
            <div class="p-5 bg-slate-950 flex items-center gap-3 border-b border-slate-800">

                <div class="bg-blue-600 p-2 rounded-lg text-white">
                    <i class="fas fa-school text-lg"></i>
                </div>

                <div>
                    <h2 class="font-bold text-sm text-white tracking-wide">
                        SMKN 7 PEKANBARU
                    </h2>

                    <p class="text-xs text-slate-400">
                        Panel Guru
                    </p>
                </div>

            </div>

            <!-- Menu -->
            <nav class="flex-1 overflow-y-auto p-4 space-y-2">

                <p class="text-xs font-semibold text-slate-500 uppercase px-3 tracking-wider">
                    Utama
                </p>

                <a href="/guru/dashboard"
                    class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-slate-800 transition">

                    <i class="fas fa-th-large w-5"></i>
                    Dashboard

                </a>

                {{-- <a href="/guru/users"
                    class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-slate-800 transition">

                    <i class="fas fa-users-cog w-5"></i>
                    Manajemen User

                </a> --}}

                <p class="text-xs font-semibold text-slate-500 uppercase px-3 tracking-wider pt-4">
                    Data Master
                </p>

                {{-- <a href="/guru/schools"
                    class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-slate-800 transition">

                    <i class="fas fa-university w-5"></i>
                    Data Sekolah

                </a> --}}

                <a href="/guru/jenis-ujian"
                    class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-slate-800 transition">

                    <i class="fas fa-file-alt w-5"></i>
                    Jenis Ujian

                </a>
                 <a href="/guru/soal"
                    class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-slate-800 transition">

                    <i class="fas fa-book w-5"></i>
                    Bank Soal

                </a>

                <p class="text-xs font-semibold text-slate-500 uppercase px-3 tracking-wider pt-4">
                    Akademik
                </p>

                <a href="/guru/status-siswa"
                    class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-slate-800 transition">

                    <i class="fas fa-user-graduate w-5"></i>
                    Data Siswa

                </a>


                <a href="/guru/ujian"
                    class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-slate-800 transition">

                    <i class="fas fa-university w-5"></i>
                    Ujian

                </a>

                <a href="/guru/nilai"
                    class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-slate-800 transition">

                    <i class="fas fa-chart-bar w-5"></i>
                    Rekap Nilai

                </a>

            </nav>

            <!-- Logout -->
            <div class="p-4 border-t border-slate-800 bg-slate-950">

                <a href="/"
                    class="flex items-center justify-center gap-2 w-full py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-xl transition">

                    <i class="fas fa-sign-out-alt"></i>
                    Keluar

                </a>

            </div>

        </aside>

        <!-- Overlay Mobile -->
        <div id="overlay"
            class="hidden fixed inset-0 bg-black/50 z-40 lg:hidden"
            onclick="toggleSidebar()">
        </div>

        <!-- MAIN -->
        <div class="flex-1 flex flex-col min-w-0">

            <!-- HEADER -->
            <header
                class="h-16 bg-white border-b border-slate-200 shadow-sm flex items-center justify-between px-6 flex-shrink-0">

                <div class="flex items-center gap-4">

                    <button
                        onclick="toggleSidebar()"
                        class="lg:hidden text-slate-700">

                        <i class="fas fa-bars text-xl"></i>

                    </button>

                    <h1 class="font-bold text-slate-800 text-lg">
                        Selamat Datang, Guru!
                    </h1>

                </div>

                <div class="flex items-center gap-3">

                    <div class="text-right hidden sm:block">

                        <p class="text-sm font-semibold text-slate-700">
                            Proktor Utama
                        </p>

                        <p class="text-xs text-emerald-600 font-medium">
                            ● Online
                        </p>

                    </div>

                    <div
                        class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold border border-blue-200">

                        ADM

                    </div>

                </div>

            </header>

            <!-- CONTENT -->
            <main class="flex-1 overflow-y-auto">

                <div class="min-h-full">

                    @yield('content')

                </div>

            </main>

            <!-- FOOTER -->
            <footer
                class="bg-white border-t border-slate-200 py-4 px-8 text-center text-xs text-slate-400 flex-shrink-0">

                &copy; 2026 SMK Negeri 7 Pekanbaru. All Rights Reserved.

            </footer>

        </div>

    </div>

    <script>

        function toggleSidebar() {

            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');

        }

    </script>

</body>

</html>
