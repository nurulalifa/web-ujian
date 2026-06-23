@extends('layouts.admin')
@section('content')
<div class="p-8">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Kelola Jenis Ujian
            </h1>

            <p class="text-slate-500 mt-1">
                Tambah, ubah, dan hapus kategori ujian sekolah.
            </p>
        </div>

        <div class="bg-blue-100 text-blue-700 px-4 py-2 rounded-xl font-semibold">
            {{ count($examTypes ?? []) }} Jenis Ujian
        </div>

    </div>

    <!-- Statistik -->
    <div class="grid md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex justify-between">
                <div>
                    <p class="text-sm text-slate-500">
                        Total Jenis Ujian
                    </p>

                    <h3 class="text-3xl font-bold text-blue-600">
                        <span id="total-ujian">3</span>
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center">
                    <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex justify-between">
                <div>
                    <p class="text-sm text-slate-500">
                        Status Sistem
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
            <div class="flex justify-between">
                <div>
                    <p class="text-sm text-slate-500">
                        Kategori
                    </p>

                    <h3 class="text-lg font-bold text-indigo-600">
                        Akademik
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
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

            <div class="bg-blue-600 px-6 py-4">
                <h3 id="form-title" class="font-bold text-white">
                    Tambah Jenis Ujian
                </h3>
            </div>

            <div class="p-6">

                <form id="ujian-form" onsubmit="saveData(event)">

                    <input type="hidden" id="edit-id">

                    <div class="mb-4">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Kode Ujian
                        </label>

                        <input
                            type="text"
                            id="kode-ujian"
                            required
                            class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">

                    </div>

                    <div class="mb-5">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Nama Jenis Ujian
                        </label>

                        <input
                            type="text"
                            id="nama-ujian"
                            required
                            class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">

                    </div>

                    <button
                        type="submit"
                        id="btn-submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">

                        Simpan Data

                    </button>

                    <button
                        type="button"
                        id="btn-cancel"
                        onclick="resetForm()"
                        class="hidden w-full mt-3 bg-slate-200 hover:bg-slate-300 text-slate-700 py-3 rounded-xl font-semibold transition">

                        Batal

                    </button>

                </form>

            </div>

        </div>

        <!-- Table -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

            <div class="bg-slate-800 px-6 py-4">
                <h3 class="font-bold text-white">
                    Daftar Jenis Ujian
                </h3>
            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-slate-50 border-b">

                        <tr>
                            <th class="px-4 py-4 text-left">No</th>
                            <th class="px-4 py-4 text-left">Kode</th>
                            <th class="px-4 py-4 text-left">Nama Ujian</th>
                            <th class="px-4 py-4 text-center">Aksi</th>
                        </tr>

                    </thead>

                    <tbody id="table-body">

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


@endsection
