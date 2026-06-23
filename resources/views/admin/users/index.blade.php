@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Manajemen Pengguna (User)</h1>
            <ol class="breadcrumb mb-0 small mt-1">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Melihat User</li>
            </ol>
        </div>
    </div>

    <ul class="nav nav-tabs mb-3" id="userTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active fw-bold" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin-pane" type="button" role="tab"><i class="fas fa-user-shield me-1"></i> Data Admin/Petugas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold" id="student-tab" data-bs-toggle="tab" data-bs-target="#student-pane" type="button" role="tab"><i class="fas fa-users me-1"></i> Data Pengguna Siswa</button>
        </li>
    </ul>

    <div class="tab-content card shadow p-3" id="userTabContent">
        <div class="tab-pane fade show active" id="admin-pane" role="tabpanel">
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Akun</th>
                            <th>Email Admin</th>
                            <th>Hak Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                        <tr>
                            <td class="fw-bold">{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td><span class="badge bg-danger">Administrator</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="student-pane" role="tabpanel">
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Username Login</th>
                            <th>Asal Sekolah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $siswa)
                        <tr>
                            <td class="fw-bold text-primary">{{ $siswa->nisn }}</td>
                            <td>{{ $siswa->name }}</td>
                            <td><code>{{ $siswa->username }}</code></td>
                            <td><span class="badge bg-info text-dark">{{ $siswa->school->name }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-3">Tidak ada data pengguna siswa.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection