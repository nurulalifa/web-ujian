<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          rel="stylesheet">
</head>

<body class="bg-slate-100 min-h-screen">

    <div class="max-w-7xl mx-auto p-6 lg:p-8">

        <!-- Header -->
        <div class="mb-8">

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <h1 class="text-3xl font-bold text-slate-800">
                            Selamat Datang 👋
                        </h1>

                        <p class="text-slate-500 mt-1">
                            Silakan mengikuti ujian yang tersedia dan pantau hasil belajar Anda.
                        </p>

                    </div>

                    <div
                        class="w-14 h-14 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xl font-bold">

                        S

                    </div>

                </div>

            </div>

        </div>

        <!-- Statistik -->
        <div class="grid md:grid-cols-3 gap-6 mb-8">

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-sm text-slate-500">
                            Ujian Aktif
                        </p>

                        <h3 class="text-3xl font-bold text-blue-600">
                            {{ $ujianAktif->count() }}
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-book-open text-blue-600 text-xl"></i>
                    </div>

                </div>

            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-sm text-slate-500">
                            Riwayat Ujian
                        </p>

                        <h3 class="text-3xl font-bold text-emerald-600">
                            {{ $riwayatNilai->count() }}
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-xl bg-emerald-100 flex items-center justify-center">
                        <i class="fas fa-chart-line text-emerald-600 text-xl"></i>
                    </div>

                </div>

            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-sm text-slate-500">
                            Status
                        </p>

                        <h3 class="text-lg font-bold text-green-600">
                            Aktif
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center">
                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                    </div>

                </div>

            </div>

        </div>

        <!-- Ujian Aktif -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mb-8">

            <div class="bg-blue-600 px-6 py-4">

                <h3 class="font-bold text-white">
                    <i class="fas fa-play-circle mr-2"></i>
                    Ujian yang Tersedia Hari Ini
                </h3>

            </div>

            <div class="p-6">

                @if($ujianAktif->isEmpty())

                    <div class="text-center py-12">

                        <i class="fas fa-calendar-times text-5xl text-slate-300 mb-4"></i>

                        <p class="text-slate-500">
                            Tidak ada ujian aktif untuk hari ini.
                        </p>

                    </div>

                @else

                    <div class="space-y-4">

                        @foreach($ujianAktif as $uj)

                        <div class="border border-slate-200 rounded-xl p-5 hover:border-blue-300 hover:bg-blue-50 transition">

                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                                <div>

                                    <h4 class="font-bold text-slate-800 text-lg">
                                        {{ $uj->nama_ujian }}
                                    </h4>

                                    <p class="text-slate-500 text-sm mt-1">

                                        <i class="fas fa-clock mr-1"></i>

                                        {{ $uj->mulai_ujian }}
                                        -
                                        {{ $uj->selesai_ujian }}

                                    </p>

                                </div>

                                <a href="{{ route('siswa.ujian', $uj->id) }}"
                                   class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl font-semibold text-center">

                                    Mulai Ujian

                                </a>

                            </div>

                        </div>

                        @endforeach

                    </div>

                @endif

            </div>

        </div>

        <!-- Riwayat Nilai -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

            <div class="bg-emerald-600 px-6 py-4">

                <h3 class="font-bold text-white">
                    <i class="fas fa-trophy mr-2"></i>
                    Riwayat Nilai & Rekomendasi
                </h3>

            </div>

            <div class="overflow-x-auto">

                @if($riwayatNilai->isEmpty())

                    <div class="text-center py-12">

                        <i class="fas fa-chart-bar text-5xl text-slate-300 mb-4"></i>

                        <p class="text-slate-500">
                            Belum ada riwayat ujian.
                        </p>

                    </div>

                @else

                    <table class="w-full">

                        <thead class="bg-slate-100">

                            <tr>

                                <th class="px-5 py-4 text-left">
                                    Nama Ujian
                                </th>

                                <th class="px-5 py-4 text-center">
                                    Nilai
                                </th>

                                <th class="px-5 py-4 text-left">
                                    Rekomendasi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($riwayatNilai as $nilai)

                            <tr class="border-b border-slate-100 hover:bg-slate-50">

                                <td class="px-5 py-4">

                                    {{ $nilai->ujian->nama_ujian ?? '-' }}

                                </td>

                                <td class="px-5 py-4 text-center">

                                    <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-bold">

                                        {{ $nilai->total_nilai }}

                                    </span>

                                </td>

                                <td class="px-5 py-4">

                                    <span class="font-semibold text-emerald-600">

                                        {{ $nilai->rekomendasi }}

                                    </span>

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                @endif

            </div>

        </div>

    </div>

</body>
</html>
