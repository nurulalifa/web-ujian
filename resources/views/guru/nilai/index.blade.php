@extends('layouts.app')

@section('content')
<div class="card p-4 border-0 shadow-sm bg-white" style="border-radius: 10px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold mb-0">
            <i class="bi bi-trophy me-2 text-primary"></i>Daftar Nilai Ujian Siswa
        </h5>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr class="text-nowrap bg-light">
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Nama Ujian</th>
                    <th>Total Poin / Nilai</th>
                    <th>Tanggal Submit</th>
                </tr>
            </thead>
            <tbody>
                @forelse($nilais ?? [] as $index => $nilai)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><strong>{{ $nilai->siswa->nama ?? 'Siswa Terhapus' }}</strong></td>
                        <td>{{ $nilai->ujian->nama_ujian ?? 'Ujian Terhapus' }}</td>
                        <td>
                            <span class="badge bg-label-primary fs-6 px-3 py-2">
                                {{ $nilai->total_poin ?? $nilai->skor ?? '0' }}
                            </span>
                        </td>
                        <td>{{ $nilai->created_at ? $nilai->created_at->format('d M Y - H:i') : '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">
                            <i class="bi bi-info-circle me-1"></i> Belum ada data nilai siswa yang masuk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection