@extends('layouts.admin')
@section('content')
<div class="p-8">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-800">
            Profil Sekolah
        </h1>

        <p class="text-slate-500 mt-1">
            Informasi sekolah dan distribusi siswa berdasarkan tingkat kelas
        </p>
    </div>

    <!-- Hero Card -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-3xl p-8 text-white shadow-xl mb-8">

        <div class="flex flex-col md:flex-row items-center gap-6">

            <div class="w-24 h-24 rounded-3xl bg-white/20 backdrop-blur flex items-center justify-center text-4xl font-black">
                S7
            </div>

            <div class="flex-1">
                <h2 class="text-3xl font-bold">
                    SMK Negeri 7 Pekanbaru
                </h2>

                <div class="flex flex-wrap gap-4 mt-3 text-sm">

                    <span class="bg-white/20 px-3 py-1 rounded-full">
                        NPSN : 10404445
                    </span>

                    <span class="bg-green-500/20 px-3 py-1 rounded-full">
                        Akreditasi A
                    </span>

                </div>
            </div>

        </div>
    </div>

    <!-- Statistik -->
    <div class="grid md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-200">
            <div class="flex justify-between">
                <div>
                    <p class="text-slate-500 text-sm">
                        Total Siswa
                    </p>

                    <h3 class="text-3xl font-bold text-blue-600">
                        2.956
                    </h3>
                </div>

                <i class="fas fa-users text-4xl text-blue-200"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-200">
            <div class="flex justify-between">
                <div>
                    <p class="text-slate-500 text-sm">
                        Total Jurusan
                    </p>

                    <h3 class="text-3xl font-bold text-indigo-600">
                        10
                    </h3>
                </div>

                <i class="fas fa-graduation-cap text-4xl text-indigo-200"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-200">
            <div class="flex justify-between">
                <div>
                    <p class="text-slate-500 text-sm">
                        Tingkat Kelas
                    </p>

                    <h3 class="text-3xl font-bold text-emerald-600">
                        3
                    </h3>
                </div>

                <i class="fas fa-layer-group text-4xl text-emerald-200"></i>
            </div>
        </div>

    </div>

    <!-- Kelas X -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mb-6">

        <div class="bg-blue-50 px-6 py-4 flex justify-between items-center">

            <div class="flex items-center gap-3">
                <i class="fas fa-graduation-cap text-blue-600"></i>

                <h3 class="font-bold text-slate-800">
                    Kelas X
                </h3>
            </div>

            <span class="bg-blue-600 text-white px-4 py-1 rounded-full text-sm">
                921 Siswa
            </span>

        </div>

        <div class="grid md:grid-cols-5 gap-4 p-6">

            <div class="border rounded-xl p-4 hover:shadow-md transition">
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-laptop-code text-blue-500"></i>
                    <span class="font-semibold">RPL</span>
                </div>

                <p class="text-sm text-slate-500">
                    3 Kelas
                </p>

                <p class="font-bold text-lg">
                    108 Siswa
                </p>
            </div>

        </div>

    </div>

</div>
@endsection
{{-- </html> --}}
