@extends('layouts.guru')

@section('content')

<div class="p-8">

    <!-- Header -->
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-slate-800">
            Jadwal & Sesi Ujian
        </h1>

        <p class="text-slate-500 mt-1">
            Buat jadwal ujian dan kontrol akses pelaksanaan ujian siswa.
        </p>

    </div>

    <!-- Statistik -->
    <div class="grid md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

            <div class="flex justify-between items-center">

                <div>
                    <p class="text-sm text-slate-500">
                        Total Sesi
                    </p>

                    <h3 class="text-3xl font-bold text-blue-600">
                        {{ $ujians->count() }}
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center">
                    <i class="fas fa-calendar-alt text-blue-600 text-xl"></i>
                </div>

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

            <div class="flex justify-between items-center">

                <div>
                    <p class="text-sm text-slate-500">
                        Sedang Berlangsung
                    </p>

                    <h3 class="text-3xl font-bold text-emerald-600">
                        {{ $ujians->where('status','mulai')->count() }}
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-xl bg-emerald-100 flex items-center justify-center">
                    <i class="fas fa-play-circle text-emerald-600 text-xl"></i>
                </div>

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

            <div class="flex justify-between items-center">

                <div>
                    <p class="text-sm text-slate-500">
                        Selesai
                    </p>

                    <h3 class="text-3xl font-bold text-red-600">
                        {{ $ujians->where('status','selesai')->count() }}
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-xl bg-red-100 flex items-center justify-center">
                    <i class="fas fa-stop-circle text-red-600 text-xl"></i>
                </div>

            </div>

        </div>

    </div>

    <div class="grid lg:grid-cols-3 gap-6">

        <!-- FORM -->
        <div class="lg:col-span-1">

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                <div class="bg-blue-600 px-6 py-4">

                    <h3 class="font-bold text-white">
                        <i class="fas fa-plus-circle mr-2"></i>
                        Buat Sesi Ujian
                    </h3>

                </div>

                <div class="p-6">

                    <form action="{{ route('guru.ujian.store') }}" method="POST">

                        @csrf

                        <div class="space-y-4">

                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Sekolah
                                </label>

                                <select
                                    name="sekolah_id"
                                    required
                                    class="w-full border border-slate-300 rounded-xl px-4 py-3">

                                    <option value="">
                                        -- Pilih Sekolah --
                                    </option>

                                    @foreach($sekolahs ?? [] as $sek)

                                        <option value="{{ $sek->id }}">
                                            {{ $sek->nama_sekolah }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Nama Ujian
                                </label>

                                <input
                                    type="text"
                                    name="nama_ujian"
                                    required
                                    placeholder="Contoh: UAS Ganjil 2026"
                                    class="w-full border border-slate-300 rounded-xl px-4 py-3">

                            </div>

                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Tanggal
                                </label>

                                <input
                                    type="date"
                                    name="tgl"
                                    required
                                    class="w-full border border-slate-300 rounded-xl px-4 py-3">

                            </div>

                            <div class="grid grid-cols-2 gap-4">

                                <div>

                                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                                        Mulai
                                    </label>

                                    <input
                                        type="time"
                                        name="mulai_ujian"
                                        required
                                        class="w-full border border-slate-300 rounded-xl px-4 py-3">

                                </div>

                                <div>

                                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                                        Selesai
                                    </label>

                                    <input
                                        type="time"
                                        name="selesai_ujian"
                                        required
                                        class="w-full border border-slate-300 rounded-xl px-4 py-3">

                                </div>

                            </div>

                            <button
                                type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">

                                <i class="fas fa-save mr-2"></i>
                                Simpan Jadwal

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

        <!-- TABLE -->
        <div class="lg:col-span-2">

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                <div class="px-6 py-4 border-b border-slate-200 bg-slate-50">

                    <div class="flex justify-between items-center">

                        <h3 class="font-bold text-slate-800">
                            Daftar Jadwal Ujian
                        </h3>

                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                            {{ $ujians->count() }} Jadwal
                        </span>

                    </div>

                </div>

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-slate-100">

                            <tr>

                                <th class="px-5 py-4 text-left">Sesi Ujian</th>
                                <th class="px-5 py-4 text-center">Tanggal</th>
                                <th class="px-5 py-4 text-center">Waktu</th>
                                <th class="px-5 py-4 text-center">Status</th>
                                <th class="px-5 py-4 text-center">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($ujians as $u)

                            <tr class="border-b border-slate-100 hover:bg-slate-50">

                                <td class="px-5 py-4">

                                    <div class="font-semibold text-slate-800">
                                        {{ $u->nama_ujian }}
                                    </div>

                                    <div class="text-xs text-slate-500 mt-1">
                                        {{ $u->sekolah->nama_sekolah ?? 'Sekolah Umum' }}
                                    </div>

                                </td>

                                <td class="px-5 py-4 text-center">
                                    {{ \Carbon\Carbon::parse($u->tgl)->translatedFormat('d M Y') }}
                                </td>

                                <td class="px-5 py-4 text-center">

                                    <span class="text-emerald-600 font-medium">
                                        {{ $u->mulai_ujian }}
                                    </span>

                                    -

                                    <span class="text-red-600 font-medium">
                                        {{ $u->selesai_ujian }}
                                    </span>

                                </td>

                                <td class="px-5 py-4 text-center">

                                    @if($u->status == 'mulai')

                                        <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">
                                            Berlangsung
                                        </span>

                                    @elseif($u->status == 'selesai')

                                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                            Selesai
                                        </span>

                                    @else

                                        <span class="bg-slate-100 text-slate-700 px-3 py-1 rounded-full text-xs font-semibold">
                                            Belum Mulai
                                        </span>

                                    @endif

                                </td>

                                <td class="px-5 py-4 text-center">

                                    <form action="{{ route('guru.ujian.toggle', $u->id) }}" method="POST">

                                        @csrf

                                        @if($u->status == 'belum')

                                            <input type="hidden" name="status" value="mulai">

                                            <button
                                                class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-xl text-sm">

                                                Mulai

                                            </button>

                                        @elseif($u->status == 'mulai')

                                            <input type="hidden" name="status" value="selesai">

                                            <button
                                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl text-sm">

                                                Selesai

                                            </button>

                                        @else

                                            <button
                                                type="button"
                                                disabled
                                                class="bg-slate-200 text-slate-500 px-4 py-2 rounded-xl text-sm">

                                                Selesai

                                            </button>

                                        @endif

                                    </form>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="5" class="text-center py-20">

                                    <i class="fas fa-calendar-times text-6xl text-slate-300 mb-4"></i>

                                    <h4 class="font-semibold text-slate-600">
                                        Belum Ada Jadwal Ujian
                                    </h4>

                                    <p class="text-slate-400 mt-2">
                                        Silakan buat jadwal ujian terlebih dahulu.
                                    </p>

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

