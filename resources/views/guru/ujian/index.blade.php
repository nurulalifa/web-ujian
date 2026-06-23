@extends('layouts.app')

@section('content')
<div class="card p-4 border-0 shadow-sm bg-white mb-4" style="border-radius: 10px;">
    <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-calendar-plus me-2 text-primary"></i>Buat Jadwal / Sesi Ujian Baru</h5>
    
    <form action="{{ route('guru.ujian.store') }}" method="POST">
        @csrf <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label small fw-bold text-secondary">Pilih Instansi Sekolah</label>
                <select class="form-select" name="sekolah_id" required>
                    <option value="" selected disabled>-- Pilih Sekolah --</option>
                    @foreach($sekolahs ?? [] as $sek)
                        <option value="{{ $sek->id }}">{{ $sek->nama_sekolah }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-8">
                <label class="form-label small fw-bold text-secondary">Nama Paket / Sesi Ujian</label>
                <input type="text" name="nama_ujian" class="form-control" placeholder="Contoh: UTBK Tryout Sesi 1 / UAS Ganjil 2026" required>
            </div>

            <div class="col-md-4">
                <label class="form-label small fw-bold text-secondary">Tanggal Ujian</label>
                <input type="date" name="tgl" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label class="form-label small fw-bold text-secondary">Jam Mulai Ujian</label>
                <input type="time" name="mulai_ujian" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label class="form-label small fw-bold text-secondary">Jam Selesai Ujian</label>
                <input type="time" name="selesai_ujian" class="form-control" required>
            </div>
        </div>

        <div class="mt-3 text-end">
            <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-plus-circle me-1"></i> Daftarkan Jadwal Ujian
            </button>
        </div>
    </form>
</div>

<div class="card p-4 border-0 shadow-sm bg-white" style="border-radius: 10px;">
    <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-stopwatch me-2 text-danger"></i>Kontrol Aktivasi & Jadwal Ujian</h5>
    
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama Sesi Ujian</th>
                    <th>Tanggal</th>
                    <th class="text-center">Mulai</th>
                    <th class="text-center">Selesai</th>
                    <th class="text-center">Status Akses</th>
                    <th class="text-center" style="width: 180px;">Aksi Sakelar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ujians as $u)
                <tr>
                    <td>
                        <span class="fw-bold text-dark d-block">{{ $u->nama_ujian }}</span>
                        <small class="text-muted"><i class="bi bi-bank me-1"></i>{{ $u->sekolah->nama_sekolah ?? 'Sekolah Umum' }}</small>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($u->tgl)->translatedFormat('d F Y') }}</td>
                    <td class="text-center fw-medium text-success">{{ $u->mulai_ujian }}</td>
                    <td class="text-center fw-medium text-danger">{{ $u->selesai_ujian }}</td>
                    <td class="text-center">
                        @if($u->status === 'mulai')
                            <span class="badge bg-success-subtle text-success border border-success px-2 py-1">Sedang Berlangsung</span>
                        @elseif($u->status === 'selesai')
                            <span class="badge bg-danger-subtle text-danger border border-danger px-2 py-1">Sudah Selesai</span>
                        @else
                            <span class="badge bg-secondary-subtle text-secondary border border-secondary px-2 py-1">Belum Dimulai</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <form action="{{ route('guru.ujian.toggle', $u->id) }}" method="POST">
                            @csrf
                            @if($u->status === 'belum')
                                <input type="hidden" name="status" value="mulai">
                                <button type="submit" class="btn btn-sm btn-success w-100">
                                    <i class="bi bi-play-fill me-1"></i> Mulai Sesi
                                </button>
                            @elseif($u->status === 'mulai')
                                <input type="hidden" name="status" value="selesai">
                                <button type="submit" class="btn btn-sm btn-danger w-100">
                                    <i class="bi bi-stop-fill me-1"></i> Hentikan Sesi
                                </button>
                            @else
                                <button type="button" class="btn btn-sm btn-light w-100 text-muted" disabled>
                                    <i class="bi bi-check2-all me-1"></i> Selesai
                                </button>
                            @endif
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">
                        <i class="bi bi-calendar-x fs-2 d-block mb-2 text-secondary"></i>
                        Belum ada jadwal pelaksanaan ujian yang dibuat. Silakan isi form di atas!
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection