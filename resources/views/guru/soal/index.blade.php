@extends('layouts.app')

@section('content')
<div class="card p-4 border-0 shadow-sm bg-white" style="border-radius: 10px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold mb-0">Daftar Bank Soal Pilihan Ganda</h5>
        <a href="{{ route('guru.soal.create') }}" class="btn btn-primary btn-sm px-3">
            <i class="bi bi-plus-circle me-1"></i> Tambah Soal Manual
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Detail Sesi & Sub Ujian</th>
                    <th>Isi Teks Soal</th>
                    <th class="text-center">Kunci</th>
                    <th class="text-center">Poin</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($soals as $index => $s)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <span class="fw-bold text-primary d-block">{{ $s->ujian->nama_ujian ?? 'Ujian Umum' }}</span>
                        <small class="text-muted">{{ $s->jenisUjian->nama_jenis_ujian ?? 'Tanpa Sub-Kategori' }}</small>
                    </td>
                    <td>{{ Str::limit($s->soal, 60, '...') }}</td>
                    <td class="text-center fw-bold text-success">{{ $s->jawaban }}</td>
                    <td class="text-center"><span class="badge bg-light text-dark">{{ $s->point }}</span></td>
                    <td class="text-center">
                        <form action="{{ route('guru.soal.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Hapus soal ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">
                        <i class="bi bi-folder-x fs-2 d-block mb-2 text-secondary"></i>
                        Belum ada instrumen soal di dalam database. Silakan klik tombol Tambah Soal!
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection