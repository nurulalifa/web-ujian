@extends('layouts.admin')

@section('content')

<div class="p-8">

<div class="mb-6">
        <h1 class="text-3xl font-bold text-slate-800">
            Manajemen Pengguna
        </h1>

        <nav class="flex mt-2 text-sm text-slate-500">
            <a href="{{ route('admin.dashboard') }}"
               class="hover:text-blue-600 transition">
                Dashboard
            </a>

            <span class="mx-2">/</span>

            <span class="font-medium text-slate-700">
                Data Pengguna
            </span>
        </nav>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500">Total Admin</p>
                    <h3 class="text-3xl font-bold text-red-600">
                        {{ $admins->count() }}
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-xl bg-red-100 flex items-center justify-center">
                    <i class="fas fa-user-shield text-red-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500">Total Siswa</p>
                    <h3 class="text-3xl font-bold text-blue-600">
                        {{ $students->count() }}
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center">
                    <i class="fas fa-user-graduate text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- Tabs -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

        <div class="border-b border-slate-200 bg-slate-50">
            <ul class="flex">
                <li>
                    <button
                        class="px-6 py-4 font-semibold text-blue-600 border-b-2 border-blue-600"
                        id="admin-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#admin-pane">

                        <i class="fas fa-user-shield mr-2"></i>
                        Data Admin
                    </button>
                </li>

                <li>
                    <button
                        class="px-6 py-4 font-semibold text-slate-500 hover:text-blue-600 transition"
                        id="student-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#student-pane">

                        <i class="fas fa-users mr-2"></i>
                        Data Siswa
                    </button>
                </li>
            </ul>
        </div>

        <div class="tab-content">

            <!-- ADMIN -->
            <div class="tab-pane fade show active p-6"
                 id="admin-pane">

                <div class="overflow-x-auto">

                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-100 text-slate-700">
                                <th class="text-left px-4 py-3">Nama Admin</th>
                                <th class="text-left px-4 py-3">Email</th>
                                <th class="text-center px-4 py-3">Role</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($admins as $admin)

                            <tr class="border-b hover:bg-slate-50 transition">

                                <td class="px-4 py-3 font-semibold text-slate-800">
                                    {{ $admin->name }}
                                </td>

                                <td class="px-4 py-3 text-slate-600">
                                    {{ $admin->email }}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                        Administrator
                                    </span>
                                </td>

                            </tr>

                            @endforeach

                        </tbody>
                    </table>

                </div>

            </div>

            <!-- SISWA -->
            <div class="tab-pane fade p-6"
                 id="student-pane">

                <div class="overflow-x-auto">

                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-100 text-slate-700">
                                <th class="text-left px-4 py-3">NISN</th>
                                <th class="text-left px-4 py-3">Nama Siswa</th>
                                <th class="text-left px-4 py-3">Username</th>
                                <th class="text-left px-4 py-3">Asal Sekolah</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($students as $siswa)

                            <tr class="border-b hover:bg-slate-50 transition">

                                <td class="px-4 py-3 font-bold text-blue-600">
                                    {{ $siswa->nisn }}
                                </td>

                                <td class="px-4 py-3 font-medium text-slate-800">
                                    {{ $siswa->name }}
                                </td>

                                <td class="px-4 py-3">
                                    <span class="bg-slate-100 px-2 py-1 rounded text-slate-700">
                                        {{ $siswa->username }}
                                    </span>
                                </td>

                                <td class="px-4 py-3">
                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        {{ $siswa->school->name }}
                                    </span>
                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="4"
                                    class="text-center py-10 text-slate-400">

                                    <i class="fas fa-folder-open text-4xl mb-3 block"></i>

                                    Belum ada data pengguna siswa.
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
