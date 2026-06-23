@extends('layouts.guru')

@section('content')

<div class="p-8">

    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Bank Soal Pilihan Ganda
            </h1>

            <p class="text-slate-500 mt-1">
                Kelola seluruh instrumen soal yang digunakan pada ujian.
            </p>
        </div>

        <a href="{{ route('guru.soal.create') }}"
           class="mt-4 md:mt-0 inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl font-semibold shadow-sm transition">

            <i class="fas fa-plus-circle"></i>
            Tambah Soal

        </a>

    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

            <div class="flex justify-between items-center">

                <div>
                    <p class="text-sm text-slate-500">
                        Total Soal
                    </p>

                    <h3 class="text-3xl font-bold text-blue-600">
                        {{ $soals->count() }}
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center">
                    <i class="fas fa-book text-blue-600 text-xl"></i>
                </div>

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

            <div class="flex justify-between items-center">

                <div>
                    <p class="text-sm text-slate-500">
                        Jenis Ujian
                    </p>

                    <h3 class="text-3xl font-bold text-indigo-600">
                        {{ $soals->pluck('jenis_ujian_id')->unique()->count() }}
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-xl bg-indigo-100 flex items-center justify-center">
                    <i class="fas fa-file-alt text-indigo-600 text-xl"></i>
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

    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

        <!-- Header Table -->
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50">

            <div class="flex flex-col md:flex-row justify-between md:items-center gap-4">

                <div>
                    <h3 class="font-bold text-slate-800">
                        Daftar Bank Soal
                    </h3>

                    <p class="text-sm text-slate-500">
                        Total {{ $soals->count() }} soal tersedia
                    </p>
                </div>

            </div>

        </div>

        <!-- Table -->
        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-100">

                    <tr class="text-left">

                        <th class="px-5 py-4 w-16 text-slate-600">
                            No
                        </th>

                        <th class="px-5 py-4 text-slate-600">
                            Ujian
                        </th>

                        <th class="px-5 py-4 text-slate-600">
                            Soal
                        </th>

                        <th class="px-5 py-4 text-center text-slate-600">
                            Kunci
                        </th>

                        <th class="px-5 py-4 text-center text-slate-600">
                            Poin
                        </th>

                        <th class="px-5 py-4 text-center text-slate-600">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($soals as $index => $s)

                    <tr class="border-b border-slate-100 hover:bg-slate-50 transition">

                        <td class="px-5 py-4 text-slate-500">
                            {{ $index + 1 }}
                        </td>

                        <td class="px-5 py-4">

                            <div class="font-semibold text-blue-600">
                                {{ $s->ujian->nama_ujian ?? 'Ujian Umum' }}
                            </div>

                            <div class="text-xs text-slate-500 mt-1">
                                {{ $s->jenisUjian->nama_jenis_ujian ?? 'Tanpa Sub-Kategori' }}
                            </div>

                        </td>

                        <td class="px-5 py-4">

                            <div class="max-w-xl">

                                <p class="text-slate-800">
                                    {{ Str::limit($s->soal, 90) }}
                                </p>

                            </div>

                        </td>

                        <td class="px-5 py-4 text-center">

                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-emerald-100 text-emerald-700 font-bold">
                                {{ $s->jawaban }}
                            </span>

                        </td>

                        <td class="px-5 py-4 text-center">

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">
                                {{ $s->point }}
                            </span>

                        </td>

                        <td class="px-5 py-4 text-center">

                            <form
                                action="{{ route('guru.soal.destroy', $s->id) }}"
                                method="POST"
                                onsubmit="return confirm('Hapus soal ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="inline-flex items-center gap-2 bg-red-50 hover:bg-red-100 text-red-600 px-4 py-2 rounded-xl border border-red-200 transition">

                                    <i class="fas fa-trash"></i>
                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center py-20">

                            <i class="fas fa-folder-open text-6xl text-slate-300 mb-4"></i>

                            <h4 class="text-lg font-semibold text-slate-600">
                                Belum Ada Soal
                            </h4>

                            <p class="text-slate-400 mt-2">
                                Silakan tambahkan soal baru untuk memulai.
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

