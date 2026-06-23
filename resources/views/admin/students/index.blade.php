@extends('layouts.admin')

@section('content')
<div class="p-8">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-800">
            Kelola Data Siswa
        </h1>

        <nav class="flex mt-2 text-sm text-slate-500">
            <a href="{{ route('admin.dashboard') }}"
               class="hover:text-blue-600 transition">
                Dashboard
            </a>

            <span class="mx-2">/</span>

            <span class="font-medium text-slate-700">
                Data Siswa
            </span>
        </nav>
    </div>

    @if(session('success'))
    <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-4 rounded-xl flex items-center">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('success') }}
    </div>
    @endif

    <!-- Statistik -->
    <div class="grid md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-slate-500">
                        Total Siswa
                    </p>

                    <h3 class="text-3xl font-bold text-blue-600">
                        {{ $students->count() }}
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
                        Status Data
                    </p>

                    <h3 class="text-lg font-bold text-emerald-600">
                        Aktif
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-xl bg-emerald-100 flex items-center justify-center">
                    <i class="fas fa-database text-emerald-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-slate-500">
                        Import CSV
                    </p>

                    <h3 class="text-lg font-bold text-orange-600">
                        Siap Digunakan
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-xl bg-orange-100 flex items-center justify-center">
                    <i class="fas fa-file-csv text-orange-600 text-xl"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="grid lg:grid-cols-3 gap-6">

        <!-- Import CSV -->
        <div class="lg:col-span-1">

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                <div class="bg-emerald-600 px-6 py-4">
                    <h3 class="font-bold text-white flex items-center">
                        <i class="fas fa-file-import mr-2"></i>
                        Import Data Siswa
                    </h3>
                </div>

                <div class="p-6">

                    <form action="{{ route('admin.students.import') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Pilih File CSV
                        </label>

                        <input type="file"
                               name="file"
                               required
                               class="w-full border border-slate-300 rounded-lg p-3 text-sm">

                        <div class="mt-4 bg-slate-50 border border-slate-200 rounded-xl p-4">

                            <p class="font-semibold text-slate-700 mb-2">
                                Format CSV
                            </p>

                            <code class="text-xs text-blue-600">
                                school_id, nisn, name, username, password
                            </code>

                            <p class="text-xs text-red-500 mt-3">
                                school_id harus sesuai dengan ID sekolah yang ada di database.
                            </p>

                        </div>

                        <button type="submit"
                                class="w-full mt-5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 rounded-xl transition">

                            <i class="fas fa-upload mr-2"></i>
                            Import Data Siswa

                        </button>

                    </form>

                </div>

            </div>

        </div>

        <!-- Tabel Siswa -->
        <div class="lg:col-span-2">

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                <div class="bg-slate-800 px-6 py-4">
                    <h3 class="font-bold text-white flex items-center">
                        <i class="fas fa-users mr-2"></i>
                        Daftar Siswa Terdaftar
                    </h3>
                </div>

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-slate-50 border-b">

                            <tr>
                                <th class="px-4 py-4 text-left text-sm font-bold text-slate-700">No</th>
                                <th class="px-4 py-4 text-left text-sm font-bold text-slate-700">NISN</th>
                                <th class="px-4 py-4 text-left text-sm font-bold text-slate-700">Nama</th>
                                <th class="px-4 py-4 text-left text-sm font-bold text-slate-700">Sekolah</th>
                                <th class="px-4 py-4 text-center text-sm font-bold text-slate-700">Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                        @forelse($students as $index => $siswa)

                            <tr class="border-b hover:bg-slate-50 transition">

                                <td class="px-4 py-4">
                                    {{ $index + 1 }}
                                </td>

                                <td class="px-4 py-4">
                                    <div class="font-semibold text-blue-600">
                                        {{ $siswa->nisn }}
                                    </div>

                                    <div class="text-xs text-slate-500">
                                        {{ $siswa->username }}
                                    </div>
                                </td>

                                <td class="px-4 py-4 font-medium">
                                    {{ $siswa->name }}
                                </td>

                                <td class="px-4 py-4">
                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        {{ $siswa->school->name }}
                                    </span>
                                </td>

                                <td class="px-4 py-4 text-center">

                                    <form action="{{ route('admin.students.destroy', $siswa->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Hapus siswa ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="bg-red-100 hover:bg-red-200 text-red-600 px-3 py-2 rounded-lg transition">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5"
                                    class="text-center py-16">

                                    <i class="fas fa-user-slash text-5xl text-slate-300 mb-4"></i>

                                    <p class="text-slate-500 font-medium">
                                        Belum ada data siswa
                                    </p>

                                    <p class="text-sm text-slate-400 mt-1">
                                        Silakan import file CSV terlebih dahulu
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

