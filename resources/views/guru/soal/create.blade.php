@extends('layouts.app')

@section('content')
<div class="card p-4 border-0 shadow-sm bg-white" style="border-radius: 10px;">
    <h5 class="fw-bold mb-4"><i class="bi bi-file-earmark-plus me-2 text-primary"></i>Form Pembuatan Soal Baru</h5>
    
    <form action="{{ route('guru.soal.store') }}" method="POST">
        @csrf 
        <div class="mb-3">
            <label class="form-label fw-bold text-secondary">Pilih Induk Paket Ujian</label>
            <select class="form-select" name="ujian_id" required>
                <option value="" selected disabled>-- Pilih Paket Ujian --</option>
                @foreach($ujians ?? [] as $u) 
                    <option value="{{ $u->id }}">{{ $u->nama_ujian }}</option> 
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold text-secondary">Pilih Komponen Sub / Jenis Ujian</label>
            <select class="form-select" name="jenis_ujian_id" required>
                {{-- Mencari ID Jenis Ujian Pilihan Ganda secara dinamis berdasarkan data pertama yang ada --}}
                @foreach($jenisUjians ?? [] as $ju)
                    @if(Str::contains(Str::lower($ju->nama_jenis_ujian), 'pilihan ganda') || $loop->first)
                        <option value="{{ $ju->id }}" selected>Pilihan Ganda</option>
                        @break
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold text-secondary fs-5">Teks Narasi Soal</label>
            <textarea class="form-control" name="soal" rows="8" placeholder="Ketik butir soal di sini (tanpa menyertakan pilihan A/B/C/D/E)..." style="font-size: 1.05rem;" required></textarea>
        </div>

        <div class="card bg-light p-3 mb-4 border-0" style="border-radius: 8px;">
            <h6 class="fw-bold text-secondary mb-3"><i class="bi bi-list-ol me-2 text-primary"></i>Input Pilihan Jawaban</h6>
            
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text fw-bold bg-white text-primary">A</span>
                    <input type="text" class="form-control" name="pilihan_a" placeholder="Ketik isi pilihan jawaban A" required>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text fw-bold bg-white text-primary">B</span>
                    <input type="text" class="form-control" name="pilihan_b" placeholder="Ketik isi pilihan jawaban B" required>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text fw-bold bg-white text-primary">C</span>
                    <input type="text" class="form-control" name="pilihan_c" placeholder="Ketik isi pilihan jawaban C" required>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text fw-bold bg-white text-primary">D</span>
                    <input type="text" class="form-control" name="pilihan_d" placeholder="Ketik isi pilihan jawaban D" required>
                </div>
            </div>

            <div class="mb-0">
                <div class="input-group">
                    <span class="input-group-text fw-bold bg-white text-primary">E</span>
                    <input type="text" class="form-control" name="pilihan_e" placeholder="Ketik isi pilihan jawaban E (Kosongkan jika hanya sampai D)">
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label fw-bold text-secondary">Kunci Jawaban</label>
                <input type="text" class="form-control" name="jawaban" placeholder="Contoh: C" maxlength="1" style="text-transform: uppercase;" required>
                <div class="form-text">Masukkan 1 huruf kapital (A/B/C/D/E)</div>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold text-secondary">Bobot Poin</label>
                <input type="number" class="form-control" name="point" value="5" min="1" required>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i>Simpan Instrumen Soal</button>
            <a href="{{ route('guru.soal.index') }}" class="btn btn-light px-3">Kembali</a>
        </div>
    </form>
</div>
@endsection