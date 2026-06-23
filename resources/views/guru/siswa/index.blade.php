@extends('layouts.guru')

@section('content')

<div class="p-8">

    <!-- Header -->
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-slate-800">
            Status Pemantauan Siswa
        </h1>

        <p class="text-slate-500 mt-1">
            Monitoring data peserta ujian yang telah terdaftar pada sistem.
        </p>

    </div>

    <!-- Statistik -->
    <div class="grid md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-sm text-slate-500">
                        Total Siswa
                    </p>

                    <h3 class="text-3xl font-bold text-blue-600">
                        {{ count($siswas ?? []) }}
                    </h3>

                </div>

                <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center">
                    <i class="fas fa-user-graduate text-blue-600 text-xl"></i>
                </div>

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-sm text-slate-500">
                        Status
                    </p>

                    <h3 class="text-lg font-bold text-emerald-600">
                        Aktif
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

                    <p class="text-sm text-slate-500">
                        Monitoring
                    </p>

                    <h3 class="text-lg font-bold text-indigo-600">
                        Real Time
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

        <!-- Header -->
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50">

            <div class="flex justify-between items-center">

                <div>

                    <h3 class="font-bold text-slate-800">
                        Daftar Peserta
                    </h3>

                    <p class="text-sm text-slate-500">
                        Total {{ count($siswas ?? []) }} siswa terdaftar
                    </p>

                </div>

                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                    Data Aktif
                </span>

            </div>

        </div>

        <!-- Table -->
        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-100">

                    <tr>

                        <th class="px-5 py-4 text-left text-slate-600">
                            No
                        </th>

                        <th class="px-5 py-4 text-left text-slate-600">
                            Nama Siswa
                        </th>

                        <th class="px-5 py-4 text-left text-slate-600">
                            Email
                        </th>

                        <th class="px-5 py-4 text-left text-slate-600">
                            No HP / WhatsApp
                        </th>

                        <th class="px-5 py-4 text-center text-slate-600">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($siswas ?? [] as $index => $s)

                    <tr class="border-b border-slate-100 hover:bg-slate-50 transition">

                        <td class="px-5 py-4 text-slate-500">
                            {{ $index + 1 }}
                        </td>

                        <td class="px-5 py-4">

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">

                                    {{ strtoupper(substr($s->nama, 0, 1)) }}

                                </div>

                                <div>

                                    <p class="font-semibold text-slate-800">
                                        {{ $s->nama }}
                                    </p>

                                    <p class="text-xs text-slate-500">
                                        Peserta Ujian
                                    </p>

                                </div>

                            </div>

                        </td>

                        <td class="px-5 py-4 text-slate-600">
                            {{ $s->email }}
                        </td>

                        <td class="px-5 py-4 text-slate-600">
                            {{ $s->no_hp }}
                        </td>

                        <td class="px-5 py-4 text-center">

                            <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">

                                <i class="fas fa-check-circle mr-1"></i>
                                Terdaftar

                            </span>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5" class="text-center py-20">

                            <i class="fas fa-user-slash text-6xl text-slate-300 mb-4"></i>

                            <h4 class="font-semibold text-slate-600">
                                Belum Ada Data Siswa
                            </h4>

                            <p class="text-sm text-slate-400 mt-2">
                                Data siswa yang terdaftar akan muncul di halaman ini.
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
