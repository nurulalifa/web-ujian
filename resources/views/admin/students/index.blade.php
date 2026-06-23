@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Kelola Data Siswa</h1>
            <ol class="breadcrumb mb-0 small mt-1">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Siswa</li>
            </ol>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-success text-white">
                    <h6 class="m-0 fw-bold"><i class="fas fa-file-excel me-2"></i>Import Data Siswa (.CSV)</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.students.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label fw-bold small">Pilih File CSV</label>
                            <input type="file" name="file" id="file" class="form-control" required>
                            
                            <div class="card bg-light mt-3 border-0">
                                <div class="card-body p-2 small text-muted">
                                    <strong class="text-dark"><i class="fas fa-info-circle me-1"></i> Format Kolom CSV:</strong>
                                    <p class="mb-0 mt-1">Susunan kolom di Excel sebelum di-save as CSV:</p>
                                    <code>school_id, nisn, name, username, password</code>
                                    <p class="mb-0 mt-2 text-danger">*Catatan: school_id harus berupa angka ID Sekolah yang ada di database.</p>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-upload me-1"></i> Import Siswa
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-dark text-white">
                    <h6 class="m-0 fw-bold"><i class="fas fa-users me-2"></i>Daftar Siswa Terdaftar</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-3" style="width: 5%">No</th>
                                    <th style="width: 25%">NISN / Username</th>
                                    <th style="width: 40%">Nama Siswa</th>
                                    <th style="width: 20%">Sekolah</th>
                                    <th class="text-center" style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($students as $index => $siswa)
                                <tr>
                                    <td class="ps-3">{{ $index + 1 }}</td>
                                    <td>
                                        <span class="fw-bold d-block">{{ $siswa->nisn }}</span>
                                        <small class="text-muted">User: {{ $siswa->username }}</small>
                                    </td>
                                    <td>{{ $siswa->name }}</td>
                                    <td>
                                        <span class="badge bg-info text-dark">{{ $siswa->school->name }}</span>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.students.destroy', $siswa->id) }}" method="POST" onsubmit="return confirm('Hapus siswa ini? Semua nilai ujiannya juga akan terhapus!')">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-5">
                                        <i class="fas fa-user-slash fa-2x d-block mb-2"></i>
                                        Belum ada data siswa. Silakan import file CSV siswa Anda.
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
