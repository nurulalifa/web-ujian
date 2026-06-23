@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Kelola Bank Soal</h1>
            <ol class="breadcrumb mb-0 small mt-1">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Soal</li>
            </ol>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i> Terjadi kesalahan saat mengunggah file.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary text-white">
                    <h6 class="m-0 fw-bold"><i class="fas fa-file-csv me-2"></i>Import Soal via CSV</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.questions.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label fw-bold small">Pilih File CSV</label>
                            <input type="file" name="file" id="file" class="form-control" required>
                            
                            <div class="card bg-light mt-3 border-0">
                                <div class="card-body p-2 small text-muted">
                                    <strong class="text-dark"><i class="fas fa-info-circle me-1"></i> Aturan Kolom CSV:</strong>
                                    <p class="mb-0 mt-1">Struktur baris/kolom di excel/CSV harus berurutan seperti ini:</p>
                                    <code>exam_type_id, question_text, option_a, option_b, option_c, option_d, correct_answer</code>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-upload me-1"></i> Unggah & Import
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-dark text-white">
                    <h6 class="m-0 fw-bold"><i class="fas fa-table me-2"></i>Daftar Soal yang Tersedia</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-3" style="width: 15%">Jenis Ujian</th>
                                    <th style="width: 55%">Pertanyaan</th>
                                    <th class