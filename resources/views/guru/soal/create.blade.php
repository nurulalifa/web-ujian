@extends('layouts.guru')

@section('content')

<div class="p-8">

    <!-- Header -->
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-slate-800">
            Tambah Soal Baru
        </h1>

        <p class="text-slate-500 mt-1">
            Buat instrumen soal pilihan ganda untuk kebutuhan ujian siswa.
        </p>

    </div>

    <form action="{{ route('guru.soal.store') }}" method="POST">

        @csrf

        <div class="grid lg:grid-cols-3 gap-6">

            <!-- Form Utama -->
            <div class="lg:col-span-2">

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                    <div class="bg-blue-600 px-6 py-4">

                        <h3 class="font-bold text-white">
                            <i class="fas fa-file-alt mr-2"></i>
                            Informasi Soal
                        </h3>

                    </div>

                    <div class="p-6 space-y-5">

                        <!-- Paket Ujian -->
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Paket Ujian
                            </label>

                            <select
                                name="ujian_id"
                                required
                                class="w-full border border-slate-300 rounded-xl px-4 py-3">

                                <option value="">
                                    -- Pilih Paket Ujian --
                                </option>

                                @foreach($ujians ?? [] as $u)

                                    <option value="{{ $u->id }}">
                                        {{ $u->nama_ujian }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Jenis Ujian -->
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Jenis Ujian
                            </label>

                            <select
                                name="jenis_ujian_id"
                                required
                                class="w-full border border-slate-300 rounded-xl px-4 py-3">

                                @foreach($jenisUjians ?? [] as $ju)

                                    @if(Str::contains(Str::lower($ju->nama_jenis_ujian), 'pilihan ganda') || $loop->first)

                                        <option value="{{ $ju->id }}">
                                            {{ $ju->nama_jenis_ujian }}
                                        </option>

                                    @endif

                                @endforeach

                            </select>

                        </div>

                        <!-- Soal -->
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Narasi Soal
                            </label>

                            <textarea
                                name="soal"
                                rows="8"
                                required
                                placeholder="Ketik soal di sini..."
                                class="w-full border border-slate-300 rounded-xl px-4 py-3 resize-none"></textarea>

                        </div>

                    </div>

                </div>

                <!-- Pilihan Jawaban -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mt-6">

                    <div class="bg-slate-800 px-6 py-4">

                        <h3 class="font-bold text-white">
                            <i class="fas fa-list-ol mr-2"></i>
                            Pilihan Jawaban
                        </h3>

                    </div>

                    <div class="p-6 space-y-4">

                        @foreach(['A','B','C','D','E'] as $opsi)

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Pilihan {{ $opsi }}
                            </label>

                            <div class="flex">

                                <div class="w-12 bg-blue-600 text-white flex items-center justify-center rounded-l-xl font-bold">
                                    {{ $opsi }}
                                </div>

                                <input
                                    type="text"
                                    name="pilihan_{{ strtolower($opsi) }}"
                                    class="flex-1 border border-slate-300 rounded-r-xl px-4 py-3"
                                    placeholder="Masukkan jawaban {{ $opsi }}"
                                    {{ $opsi != 'E' ? 'required' : '' }}>

                            </div>

                        </div>

                        @endforeach

                    </div>

                </div>

            </div>

            <!-- Sidebar -->
            <div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                    <div class="bg-emerald-600 px-6 py-4">

                        <h3 class="font-bold text-white">
                            <i class="fas fa-cog mr-2"></i>
                            Pengaturan Soal
                        </h3>

                    </div>

                    <div class="p-6 space-y-5">

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Kunci Jawaban
                            </label>

                            <input
                                type="text"
                                name="jawaban"
                                maxlength="1"
                                required
                                placeholder="A / B / C / D / E"
                                class="w-full border border-slate-300 rounded-xl px-4 py-3 uppercase">

                            <p class="text-xs text-slate-500 mt-2">
                                Masukkan satu huruf jawaban yang benar.
                            </p>

                        </div>

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Bobot Nilai
                            </label>

                            <input
                                type="number"
                                name="point"
                                value="5"
                                min="1"
                                required
                                class="w-full border border-slate-300 rounded-xl px-4 py-3">

                        </div>

                        <div class="border-t pt-5">

                            <button
                                type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">

                                <i class="fas fa-save mr-2"></i>
                                Simpan Soal

                            </button>

                            <a
                                href="{{ route('guru.soal.index') }}"
                                class="block text-center mt-3 bg-slate-100 hover:bg-slate-200 text-slate-700 py-3 rounded-xl font-semibold transition">

                                Kembali

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection
