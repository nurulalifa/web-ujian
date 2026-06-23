@extends('layouts.guru')

@section('content')

<div class="p-8">

    <!-- Header -->
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-slate-800">
            Rekap Nilai Siswa
        </h1>

        <p class="text-slate-500 mt-1">
            Pantau hasil ujian dan performa seluruh peserta ujian.
        </p>

    </div>

    <!-- Statistik -->
    <div class="grid md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-sm text-slate-500">
                        Total Nilai
                    </p>

                    <h3 class="text-3xl font-bold text-blue-600">
                        {{ $nilais->count() }}
                    </h3>

                </div>

                <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-chart-bar text-blue-600 text-xl"></i>
                </div>

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-sm text-slate-500">
                        Nilai Tertinggi
                    </p>

                    <h3 class="text-3xl font-bold text-emerald-600">
                        {{ $nilais->max('total_poin') ?? 0 }}
                    </h3>

                </div>

                <div class="w-14 h-14 bg-emerald-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-trophy text-emerald-600 text-xl"></i>
                </div>

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-sm text-slate-500">
                        Rata-rata Nilai
                    </p>

                    <h3 class="text-3xl font-bold text-amber-600">
                        {{ round($nilais->avg('total_poin') ?? 0) }}
                    </h3>

                </div>

                <div class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-star text-amber-600 text-xl"></i>
                </div>

            </div>

        </div>

    </div>

    <!-- Tabel Nilai -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

        <!-- Header Tabel -->
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50">

            <div class="flex justify-between items-center">

                <div>

                    <h3 class="font-bold text-slate-800">
                        Daftar Nilai Ujian
                    </h3>

                    <p class="text-sm text-slate-500">
                        Total {{ $nilais->count() }} data nilai siswa
                    </p>

                </div>

                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                    Aktif
                </span>

            </div>

        </div>

        <!-- Table -->
        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-100">

                    <tr>

                        <th class="px-5 py-4 text-left text-slate-600 w-16">
                            No
                        </th>

                        <th class="px-5 py-4 text-left text-slate-600">
                            Nama Siswa
                        </th>

                        <th class="px-5 py-4 text-left text-slate-600">
                            Nama Ujian
                        </th>

                        <th class="px-5 py-4 text-center text-slate-600">
                            Nilai
                        </th>

                        <th class="px-5 py-4 text-center text-slate-600">
                            Tanggal Submit
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($nilais ?? [] as $index => $nilai)

                    <tr class="border-b border-slate-100 hover:bg-slate-50 transition">

                        <td class="px-5 py-4 text-slate-500">
                            {{ $index + 1 }}
                        </td>

                        <td class="px-5 py-4">

                            <div class="font-semibold text-slate-800">
                                {{ $nilai->siswa->nama ?? 'Siswa Terhapus' }}
                            </div>

                        </td>

                        <td class="px-5 py-4">

                            <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-xs font-semibold">

                                {{ $nilai->ujian->nama_ujian ?? 'Ujian Terhapus' }}

                            </span>

                        </td>

                        <td class="px-5 py-4 text-center">

                            @php
                                $skor = $nilai->total_poin ?? $nilai->skor ?? 0;
                            @endphp

                            @if($skor >= 75)

                                <span class="bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full font-bold">

                                    {{ $skor }}

                                </span>

                            @elseif($skor >= 50)

                                <span class="bg-amber-100 text-amber-700 px-4 py-2 rounded-full font-bold">

                                    {{ $skor }}

                                </span>

                            @else

                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full font-bold">

                                    {{ $skor }}

                                </span>

                            @endif

                        </td>

                        <td class="px-5 py-4 text-center text-slate-500">

                            {{ $nilai->created_at
                                ? $nilai->created_at->format('d M Y • H:i')
                                : '-' }}

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5" class="text-center py-20">

                            <i class="fas fa-clipboard-list text-6xl text-slate-300 mb-4"></i>

                            <h4 class="text-lg font-semibold text-slate-600">
                                Belum Ada Data Nilai
                            </h4>

                            <p class="text-slate-400 mt-2">
                                Nilai siswa akan muncul setelah ujian selesai dikerjakan.
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

