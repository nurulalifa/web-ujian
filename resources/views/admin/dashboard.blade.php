 @extends('layouts.guru')
 @section('content')
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
@endsection
