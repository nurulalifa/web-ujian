@extends('layouts.app')
@section('content')
<div class="card p-4 border-0 shadow-sm bg-white mb-4">
    <h5 class="fw-bold mb-3">Tambah Jenis / Sub Ujian</h5>
    <form action="{{ route('guru.jenis-ujian.store') }}" method="POST" class="d-flex gap-2">
        @csrf
        <input type="text" name="nama_jenis_ujian" class="form-control" placeholder="Contoh: TPS, UTBK-Saintek, UTS Ganjil" required>
        <button type="submit" class="btn btn-primary px-4">Simpan</button>
    </form>
</div>
<div class="card p-4 border-0 shadow-sm bg-white">
    <h5 class="fw-bold mb-3">Daftar Kategori Sub Ujian</h5>
    <ul class="list-group">
        @foreach($jenisUjians ?? [] as $ju)
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $ju->nama_jenis_ujian }}</li>
        @endforeach
    </ul>
</div>
@endsection