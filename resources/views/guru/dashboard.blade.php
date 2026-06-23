@extends('layouts.app')
@section('content')
<div class="card p-4 border-0 shadow-sm bg-white mb-4">
    <h4 class="fw-bold text-dark">Selamat Datang di Panel Guru</h4>
    <p class="text-muted">Berikut adalah ringkasan data ujian UTBK / UAS-UTS saat ini.</p>
</div>
<div class="row g-4">
    <div class="col-md-4">
        <div class="card p-3 border-0 shadow-sm bg-white d-flex flex-row justify-content-between align-items-center">
            <div><span class="text-muted small d-block">Total Soal</span><h3 class="fw-bold m-0 mt-1">{{ $totalSoal }}</h3></div>
            <div class="p-3 bg-primary-subtle text-primary rounded"><i class="bi bi-file-earmark-text fs-3"></i></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-3 border-0 shadow-sm bg-white d-flex flex-row justify-content-between align-items-center">
            <div><span class="text-muted small d-block">Ujian Aktif</span><h3 class="fw-bold m-0 mt-1">{{ $ujianAktif }}</h3></div>
            <div class="p-3 bg-success-subtle text-success rounded"><i class="bi bi-play-circle fs-3"></i></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-3 border-0 shadow-sm bg-white d-flex flex-row justify-content-between align-items-center">
            <div><span class="text-muted small d-block">Siswa Mengikuti</span><h3 class="fw-bold m-0 mt-1">{{ $siswaOnline }}</h3></div>
            <div class="p-3 bg-info-subtle text-info rounded"><i class="bi bi-people fs-3"></i></div>
        </div>
    </div>
</div>
@endsection