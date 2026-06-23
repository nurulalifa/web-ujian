<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | SMKN 7 Pekanbaru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 font-sans min-h-screen flex">

    <aside class="w-64 bg-slate-900 text-slate-200 flex flex-col min-h-screen shadow-xl">
        <div class="p-5 bg-slate-950 flex items-center space-x-3 border-b border-slate-800">
            <div class="bg-blue-600 p-2 rounded-lg text-white">
                <i class="fas fa-school text-lg"></i>
            </div>
            <div>
                <h2 class="font-bold text-sm text-white tracking-wide">SMKN 7 PEKANBARU</h2>
                <p class="text-xs text-slate-400">Panel Administrator</p>
            </div>
        </div>

        <nav class="flex-grow p-4 space-y-2">
            <p class="text-xs font-semibold text-slate-500 uppercase px-3 tracking-wider">Utama</p>
            
            <a href="/admin/dashboard" class="flex items-center space-x-3 px-3 py-2.5 bg-blue-600 text-white rounded-lg font-medium transition-all shadow-md">
                <i class="fas fa-th-large w-5 text-center"></i>
                <span>Dashboard</span>
            </a>
            
            <a href="/admin/users" class="flex items-center space-x-3 px-3 py-2.5 hover:bg-slate-800 rounded-lg text-slate-400 hover:text-slate-200 transition-all">
                <i class="fas fa-users-cog w-5 text-center"></i>
                <span>Manajemen User</span>
            </a>

            <p class="text-xs font-semibold text-slate-500 uppercase px-3 tracking-wider pt-4">Data Master</p>

            <a href="/admin/schools" class="flex items-center space-x-3 px-3 py-2.5 hover:bg-slate-800 rounded-lg text-slate-400 hover:text-slate-200 transition-all">
                <i class="fas fa-university w-5 text-center"></i>
                <span>Data Sekolah</span>
            </a>

            <a href="/admin/exam-types" class="flex items-center space-x-3 px-3 py-2.5 hover:bg-slate-800 rounded-lg text-slate-400 hover:text-slate-200 transition-all">
                <i class="fas fa-file-alt w-5 text-center"></i>
                <span>Jenis Ujian</span>
            </a>

            <p class="text-xs font-semibold text-slate-500 uppercase px-3 tracking-wider pt-4">Akademik</p>

            <a href="/admin/students" class="flex items-center space-x-3 px-3 py-2.5 hover:bg-slate-800 rounded-lg text-slate-400 hover:text-slate-200 transition-all">
                <i class="fas fa-user-graduate w-5 text-center"></i>
                <span>Data Siswa</span>
            </a>

            <a href="/admin/questions" class="flex items-center space-x-3 px-3 py-2.5 hover:bg-slate-800 rounded-lg text-slate-400 hover:text-slate-200 transition-all">
                <i class="fas fa-book w-5 text-center"></i>
                <span>Bank Soal</span>
            </a>

            <a href="/admin/scores" class="flex items-center space-x-3 px-3 py-2.5 hover:bg-slate-800 rounded-lg text-slate-400 hover:text-slate-200 transition-all">
                <i class="fas fa-chart-bar w-5 text-center"></i>
                <span>Rekap Nilai</span>
            </a>
        </nav>

        <div class="p-4 border-t border-slate-800 bg-slate-950">
            <a href="/" class="flex items-center justify-center space-x-2 w-full py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg text-sm transition-all shadow-md">
                <i class="fas fa-sign-out-alt"></i>
                <span>Keluar</span>
            </a>
        </div>
    </aside>

    <main class="flex-grow flex flex-col min-h-screen overflow-y-auto">
        <header class="bg-white shadow-sm px-8 py-4 flex justify-between items-center border-b border-slate-200">
            <div class="flex items-center space-x-2">
                <h1 class="text-xl font-bold text-slate-800">Selamat Datang, Admin!</h1>
            </div>
            <div class="flex items-center space-x-3">
                <div class="text-right">
                    <p class="text-sm font-semibold text-slate-700">Proktor Utama</p>
                    <p class="text-xs text-emerald-600 font-medium flex items-center justify-end">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 mr-1.5 animate-pulse"></span> Online
                    </p>
                </div>
                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold shadow-sm border border-blue-200">
                    ADM
                </div>
            </div>
        </header>

        <div class="p-8 space-y-8 flex-grow">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 flex items-center justify-between transition-all hover:shadow-md">
                    <div>
                        <p class="text-sm font-medium text-slate-400 uppercase tracking-wider">Total Siswa</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">1,240</h3>
                    </div>
                    <div class="bg-blue-50 text-blue-600 p-4 rounded-xl text-xl">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 flex items-center justify-between transition-all hover:shadow-md">
                    <div>
                        <p class="text-sm font-medium text-slate-400 uppercase tracking-wider">Total Soal</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">450</h3>
                    </div>
                    <div class="bg-amber-50 text-amber-600 p-4 rounded-xl text-xl">
                        <i class="fas fa-book"></i>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 flex items-center justify-between transition-all hover:shadow-md">
                    <div>
                        <p class="text-sm font-medium text-slate-400 uppercase tracking-wider">Jenis Ujian</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">4 Aktif</h3>
                    </div>
                    <div class="bg-purple-50 text-purple-600 p-4 rounded-xl text-xl">
                        <i class="fas fa-file-alt"></i>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 flex items-center justify-between transition-all hover:shadow-md">
                    <div>
                        <p class="text-sm font-medium text-slate-400 uppercase tracking-wider">Status Ujian</p>
                        <h3 class="text-2xl font-bold text-emerald-600 mt-1">Berjalan</h3>
                    </div>
                    <div class="bg-emerald-50 text-emerald-600 p-4 rounded-xl text-xl">
                        <i class="fas fa-server"></i>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 lg:col-span-2">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-bold text-slate-800 text-lg">Nilai Ujian Terbaru</h3>
                        <a href="/admin/scores" class="text-xs font-semibold text-blue-600 hover:underline">Lihat Semua</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-slate-600">
                            <thead class="bg-slate-50 text-slate-400 uppercase text-xs tracking-wider">
                                <tr>
                                    <th class="py-3 px-4">Siswa</th>
                                    <th class="py-3 px-4">Kelas</th>
                                    <th class="py-3 px-4">Mata Pelajaran</th>
                                    <th class="py-3 px-4 text-center">Nilai</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr>
                                    <td class="py-3.5 px-4 font-medium text-slate-800">Muhammad Rafli</td>
                                    <td class="py-3.5 px-4">XII RPL 1</td>
                                    <td class="py-3.5 px-4">Pemrograman Web</td>
                                    <td class="py-3.5 px-4 text-center font-bold text-emerald-600">90</td>
                                </tr>
                                <tr>
                                    <td class="py-3.5 px-4 font-medium text-slate-800">Siti Aminah</td>
                                    <td class="py-3.5 px-4">XII TKJ 2</td>
                                    <td class="py-3.5 px-4">Administrasi Jaringan</td>
                                    <td class="py-3.5 px-4 text-center font-bold text-emerald-600">85</td>
                                </tr>
                                <tr>
                                    <td class="py-3.5 px-4 font-medium text-slate-800">Ahmad Dhani</td>
                                    <td class="py-3.5 px-4">XI MM 1</td>
                                    <td class="py-3.5 px-4">Desain Grafis</td>
                                    <td class="py-3.5 px-4 text-center font-bold text-amber-500">72</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                    <h3 class="font-bold text-slate-800 text-lg mb-4">Informasi Sistem</h3>
                    <div class="space-y-4">
                        <div class="p-3.5 bg-blue-50 rounded-lg border-l-4 border-blue-500">
                            <h4 class="text-sm font-semibold text-blue-800">Sinkronisasi Database</h4>
                            <p class="text-xs text-blue-600 mt-0.5">Koneksi database `web-ujian` berhasil terhubung menggunakan port 3306.</p>
                        </div>
                        <div class="p-3.5 bg-purple-50 rounded-lg border-l-4 border-purple-500">
                            <h4 class="text-sm font-semibold text-purple-800">Fitur CSV Active</h4>
                            <p class="text-xs text-purple-600 mt-0.5">Fungsi upload data siswa dan soal via Excel (.csv) siap digunakan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="bg-white border-t border-slate-200 py-4 px-8 text-center text-xs text-slate-400">
            &copy; 2026 SMK Negeri 7 Pekanbaru. All Rights Reserved.
        </footer>
    </main>

</body>
</html>