@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Rekap Nilai Ujian</h1>
            <ol class="breadcrumb mb-0 small mt-1">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Nilai</li>
            </ol>
        </div>
        <button class="btn btn-outline-primary btn-sm" onclick="window.print()">
            <i class="fas fa-print me-1"></i> Cetak Halaman
        </button>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-dark text-white d-flex justify-content-between align-items-center">
                    <h6 class="m-0 fw-bold"><i class="fas fa-graduation-cap me-2"></i>Nilai Hasil Ujian Siswa</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-3" style="width: 5%">No</th>
                                    <th style="width: 25%">Nama Siswa</th>
                                    <th style="width: 20%">Asal Sekolah</th>
                                    <th style="width: 20%">Jenis Ujian</th>
                                    <th class="text-center" style="width: 15%">Skor Akhir</th>
                                    <th class="text-center" style="width: 15%">Tanggal Ujian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($scores as $index => $nilai)
                                <tr>
                                    <td class="ps-3">{{ $index + 1 }}</td>
                                    <td>
                                        <span class="fw-bold d-block">{{ $nilai->student->name }}</span>
                                        <small class="text-muted">NISN: {{ $nilai->student->nisn }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-info text-dark">{{ $nilai->student->school->name }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary p-2">{{ $nilai->examType->name }}</span>
                                    </td>
                                    <td class="text-center">
                                        @if($nilai->total_score >= 75)
                                            <span class="badge bg-success fs-6 px-3 py-2">{{ $nilai->total_score }}</span>
                                        @else
                                            <span class="badge bg-danger fs-6 px-3 py-2">{{ $nilai->total_score }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center text-muted small">
                                        {{ $nilai->created_at->format('d M Y, H:i') }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-5">
                                        <i class="fas fa-clipboard-list fa-2x d-block mb-2"></i>
                                        Belum ada siswa yang menyelesaikan ujian. Data nilai masih kosong.
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
</div>
@endsection