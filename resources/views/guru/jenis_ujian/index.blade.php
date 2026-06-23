@extends('layouts.guru')

@section('content')
    <div class="p-8">

        <!-- Header -->
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-slate-800">
                Jenis / Sub Ujian
            </h1>

            <p class="text-slate-500 mt-1">
                Kelola kategori ujian yang akan digunakan pada sesi ujian.
            </p>

        </div>

        <!-- Statistik -->
        <div class="grid md:grid-cols-3 gap-6 mb-8">

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

                <div class="flex justify-between items-center">

                    <div>
                        <p class="text-sm text-slate-500">
                            Total Kategori
                        </p>

                        <h3 class="text-3xl font-bold text-blue-600">
                            {{ count($jenisUjians ?? []) }}
                        </h3>
                    </div>

                    <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-file-alt text-blue-600 text-xl"></i>
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
                            Sistem
                        </p>

                        <h3 class="text-lg font-bold text-indigo-600">
                            Guru Panel
                        </h3>
                    </div>

                    <div class="w-14 h-14 rounded-xl bg-indigo-100 flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-indigo-600 text-xl"></i>
                    </div>

                </div>

            </div>

        </div>

        <div class="grid lg:grid-cols-3 gap-6">

            <!-- Form -->
            <div class="lg:col-span-1">

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                    <div class="bg-blue-600 px-6 py-4">

                        <h3 class="font-bold text-white">
                            <i class="fas fa-plus-circle mr-2"></i>
                            Tambah Jenis Ujian
                        </h3>

                    </div>

                    <div class="p-6">

                        <form action="{{ route('guru.jenis-ujian.store') }}" method="POST">

                            @csrf

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Nama Jenis / Sub Ujian
                            </label>

                            <input type="text" name="name" placeholder="Contoh: TPS, UTBK-Saintek, UTS Ganjil"
                                required
                                class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                            <button type="submit"
                                class="w-full mt-5 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">

                                <i class="fas fa-save mr-2"></i>
                                Simpan Kategori

                            </button>

                        </form>

                    </div>

                </div>

            </div>

            <!-- List -->
            <div class="lg:col-span-2">

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                    <div class="px-6 py-4 border-b border-slate-200 bg-slate-50">

                        <div class="flex justify-between items-center">

                            <h3 class="font-bold text-slate-800">
                                Daftar Kategori Ujian
                            </h3>

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                                {{ count($jenisUjians ?? []) }} Data
                            </span>

                        </div>

                    </div>

                    <div class="divide-y divide-slate-100">

                        @forelse($jenisUjians ?? [] as $index => $ju)
                            <div class="flex items-center justify-between px-6 py-4 hover:bg-slate-50 transition">

                                <div class="flex items-center gap-4">

                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">

                                        {{ $index + 1 }}

                                    </div>

                                    <div>

                                        <p class="font-semibold text-slate-800">
                                            {{ $ju->name }}
                                        </p>

                                        <p class="text-xs text-slate-500">
                                            Kategori Ujian
                                        </p>

                                    </div>

                                </div>


                                <div class="flex items-center gap-2">

                                    <span
                                        class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        Aktif
                                    </span>

                                    <form action="{{ route('guru.jenis-ujian.destroy', $ju->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="bg-red-100 hover:bg-red-200 text-red-600 w-9 h-9 rounded-xl flex items-center justify-center transition">

                                            <i class="fas fa-trash text-sm"></i>

                                        </button>

                                    </form>

                                </div>


                            </div>

                        @empty

                            <div class="text-center py-16">

                                <i class="fas fa-folder-open text-5xl text-slate-300 mb-4"></i>

                                <h4 class="font-semibold text-slate-600">
                                    Belum Ada Kategori
                                </h4>

                                <p class="text-sm text-slate-400 mt-2">
                                    Tambahkan kategori ujian pertama Anda.
                                </p>

                            </div>
                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
