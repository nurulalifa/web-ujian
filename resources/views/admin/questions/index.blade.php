@extends('layouts.admin')

@section('content')

<div class="p-8">

    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Kelola Bank Soal
            </h1>

            <p class="text-slate-500 mt-1">
                Import, kelola, dan pantau seluruh bank soal ujian.
            </p>
        </div>

    </div>

    <!-- Alert Success -->
    @if(session('success'))
    <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-4 rounded-xl flex items-center">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('success') }}
    </div>
    @endif

    <!-- Alert Error -->
    @if($errors->any())
    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl flex items-center">
        <i class="fas fa-exclamation-circle mr-3"></i>
        Terjadi kesalahan saat mengunggah file CSV.
    </div>
    @endif

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

            <div class="flex justify-between items-center">

                <div>
                    <p class="text-sm text-slate-500">
                        Total Soal
                    </p>

                    <h3 class="text-3xl font-bold text-blue-600">
                        {{ $questions->count() }}
                    </h3>
                </div>

                <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center">
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
                        {{ $examTypes->count() }}
                    </h3>
                </div>

                <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-file-alt text-indigo-600 text-xl"></i>
                </div>

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">

            <div class="flex justify-between items-center">

                <div>
                    <p class="text-sm text-slate-500">
                        Soal Hari Ini
                    </p>

                    <h3 class="text-3xl font-bold text-amber-600">
                        {{ $questions->where('created_at','>=',today())->count() }}
                    </h3>
                </div>

                <div class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-calendar-day text-amber-600 text-xl"></i>
                </div>

            </div>

        </div>

    </div>

    <!-- Content -->
    <div class="grid xl:grid-cols-12 gap-6">

        <!-- Import -->
        <div class="xl:col-span-3">

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                <div class="bg-blue-600 px-6 py-4">
                    <h3 class="font-bold text-white">
                        <i class="fas fa-file-import mr-2"></i>
                        Import Soal CSV
                    </h3>
                </div>

                <div class="p-6">

                    <form action="{{ route('admin.questions.import') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Pilih File CSV
                        </label>

                        <input
                            type="file"
                            name="file"
                            required
                            class="w-full border border-slate-300 rounded-xl p-3">

                        <div class="mt-4 bg-slate-50 border border-slate-200 rounded-xl p-4">

                            <h4 class="font-semibold text-slate-700 mb-2">
                                Format CSV
                            </h4>

                            <code class="text-xs text-blue-600 break-all">
                                exam_type_id,
                                question_text,
                                option_a,
                                option_b,
                                option_c,
                                option_d,
                                correct_answer
                            </code>

                        </div>

                        <button
                            type="submit"
                            class="w-full mt-5 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">

                            <i class="fas fa-upload mr-2"></i>
                            Import Soal

                        </button>

                    </form>

                </div>

            </div>

        </div>

        <!-- Tabel -->
        <div class="xl:col-span-9">

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                <!-- Header Table -->
                <div class="px-6 py-4 border-b border-slate-200 bg-slate-50">

                    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">

                        <div>
                            <h3 class="font-bold text-slate-800">
                                Daftar Bank Soal
                            </h3>

                            <p class="text-sm text-slate-500">
                                Kelola seluruh soal yang tersedia
                            </p>
                        </div>

                        <div class="relative">

                            <input
                                type="text"
                                placeholder="Cari soal..."
                                class="pl-10 pr-4 py-2 border border-slate-300 rounded-xl w-full lg:w-72">

                            <i class="fas fa-search absolute left-3 top-3 text-slate-400"></i>

                        </div>

                    </div>

                </div>

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-slate-100">

                            <tr>

                                <th class="px-4 py-4 text-center w-16">
                                    No
                                </th>

                                <th class="px-4 py-4 text-left">
                                    Jenis Ujian
                                </th>

                                <th class="px-4 py-4 text-left">
                                    Pertanyaan
                                </th>

                                <th class="px-4 py-4 text-center">
                                    Kunci
                                </th>

                                <th class="px-4 py-4 text-center">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($questions as $question)

                            <tr class="border-b border-slate-100 hover:bg-slate-50 transition">

                                <td class="px-4 py-4 text-center text-slate-500">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-4 py-4">

                                    <span class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold border border-blue-200">

                                        <i class="fas fa-file-alt"></i>

                                        {{ $question->examType->name }}

                                    </span>

                                </td>

                                <td class="px-4 py-4">

                                    <div class="max-w-xl">

                                        <p class="font-medium text-slate-800">
                                            {{ Str::limit($question->question_text, 100) }}
                                        </p>

                                        <span class="text-xs text-slate-400">
                                            ID Soal #{{ $question->id }}
                                        </span>

                                    </div>

                                </td>

                                <td class="px-4 py-4 text-center">

                                    <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full font-bold">

                                        {{ $question->correct_answer }}

                                    </span>

                                </td>

                                <td class="px-4 py-4 text-center">

                                    <form
                                        action="{{ route('admin.questions.destroy', $question->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Hapus soal ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="inline-flex items-center gap-2 bg-red-50 hover:bg-red-100 text-red-600 px-4 py-2 rounded-xl border border-red-200 transition">

                                            <i class="fas fa-trash"></i>
                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="5" class="text-center py-20">

                                    <i class="fas fa-book-open text-6xl text-slate-300 mb-4"></i>

                                    <p class="text-slate-500 font-semibold text-lg">
                                        Belum Ada Soal
                                    </p>

                                    <p class="text-slate-400 text-sm mt-2">
                                        Silakan import soal menggunakan file CSV.
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
