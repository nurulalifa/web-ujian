@extends('layouts.admin')

@section('content')

<div class="p-8">

    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Rekap Nilai Ujian
            </h1>

            <p class="text-slate-500 mt-1">
                Monitoring hasil ujian seluruh peserta berdasarkan jenis ujian.
            </p>
        </div>

        <button
            onclick="window.print()"
            class="mt-4 md:mt-0 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl font-semibold shadow-sm transition">

            <i class="fas fa-print mr-2"></i>
            Cetak Rekap

        </button>

    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-slate-500">Total Nilai</p>
                    <h3 class="text-3xl font-bold text-blue-600">
                        {{ $scores->count() }}
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center">
                    <i class="fas fa-clipboard-list text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-slate-500">Lulus</p>
                    <h3 class="text-3xl font-bold text-emerald-600">
                        {{ $scores->where('total_score', '>=', 75)->count() }}
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-xl bg-emerald-100 flex items-center justify-center">
                    <i class="fas fa-check-circle text-emerald-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-slate-500">Belum Lulus</p>
                    <h3 class="text-3xl font-bold text-red-600">
                        {{ $scores->where('total_score', '<', 75)->count() }}
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-xl bg-red-100 flex items-center justify-center">
                    <i class="fas fa-times-circle text-red-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-slate-500">Rata-rata</p>
                    <h3 class="text-3xl font-bold text-indigo-600">
                        {{ round($scores->avg('total_score') ?? 0) }}
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-xl bg-indigo-100 flex items-center justify-center">
                    <i class="fas fa-chart-line text-indigo-600 text-xl"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- Tabel -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50">

            <div class="flex justify-between items-center">

                <h3 class="font-bold text-slate-800 flex items-center">
                    <i class="fas fa-graduation-cap mr-2 text-blue-600"></i>
                    Data Hasil Ujian Siswa
                </h3>

                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                    {{ $scores->count() }} Data
                </span>

            </div>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-100">

                    <tr class="text-left text-slate-600 text-sm">

                        <th class="px-5 py-4">No</th>
                        <th class="px-5 py-4">Siswa</th>
                        <th class="px-5 py-4">Sekolah</th>
                        <th class="px-5 py-4">Jenis Ujian</th>
                        <th class="px-5 py-4 text-center">Nilai</th>
                        <th class="px-5 py-4 text-center">Tanggal</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($scores as $index => $nilai)

                    <tr class="border-b border-slate-100 hover:bg-slate-50 transition">

                        <td class="px-5 py-4">
                            {{ $index + 1 }}
                        </td>

                        <td class="px-5 py-4">

                            <div class="font-semibold text-slate-800">
                                {{ $nilai->student->name }}
                            </div>

                            <div class="text-xs text-slate-500 mt-1">
                                NISN : {{ $nilai->student->nisn }}
                            </div>

                        </td>

                        <td class="px-5 py-4">

                            <span class="bg-cyan-100 text-cyan-700 px-3 py-1 rounded-full text-xs font-semibold">
                                {{ $nilai->student->school->name }}
                            </span>

                        </td>

                        <td class="px-5 py-4">

                            <span class="bg-slate-200 text-slate-700 px-3 py-1 rounded-full text-xs font-semibold">
                                {{ $nilai->examType->name }}
                            </span>

                        </td>

                        <td class="px-5 py-4 text-center">

                            @if($nilai->total_score >= 75)

                                <span class="bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full font-bold">
                                    {{ $nilai->total_score }}
                                </span>

                            @else

                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full font-bold">
                                    {{ $nilai->total_score }}
                                </span>

                            @endif

                        </td>

                        <td class="px-5 py-4 text-center text-sm text-slate-500">
                            {{ $nilai->created_at->format('d M Y, H:i') }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="py-16 text-center">

                            <i class="fas fa-clipboard-list text-5xl text-slate-300 mb-4"></i>

                            <p class="text-slate-500 font-medium">
                                Belum ada data nilai ujian
                            </p>

                            <p class="text-sm text-slate-400 mt-2">
                                Data akan muncul setelah siswa menyelesaikan ujian.
                            </p>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

