<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Soal - Guru | Web Ujian</title>
    
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}" />
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <span class="app-brand-text demo menu-text fw-bolder ms-2">Web Ujian</span>
                </div>
                <div class="menu-inner-shadow"></div>
                
                <ul class="menu-inner py-1">
                    <li class="menu-item {{ Request::is('guru/dashboard') ? 'active' : '' }}">
                        <a href="{{ url('/guru/dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div>Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Request::is('guru/soal*') ? 'active' : '' }}">
                        <a href="{{ url('/guru/soal') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-book-open"></i>
                            <div>Kelola Soal</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Request::is('guru/ujian*') ? 'active' : '' }}">
                        <a href="{{ url('/guru/ujian') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-stopwatch"></i>
                            <div>Kontrol Ujian</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Request::is('guru/nilai-siswa*') ? 'active' : '' }}">
                        <a href="{{ url('/guru/nilai-siswa') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-medal"></i>
                            <div>Daftar Nilai</div>
                        </a>
                    </li>
                </ul>
            </aside>

            <div class="layout-page">
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="navbar-nav align-items-center">
                        <span class="fw-semibold">Manajemen Data Soal</span>
                    </div>
                </nav>

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 py-4">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Guru /</span> Kelola Soal</h4>

                        @if(session('sukses'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ session('sukses') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Daftar Pertanyaan Ujian</h5>
                                <a href="{{ url('/guru/soal/create') }}" class="btn btn-primary btn-sm"><i class="bx bx-plus"></i> Tambah Soal</a>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ujian</th>
                                            <th>Pertanyaan Soal</th>
                                            <th>Kunci Jawaban</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @forelse($soals as $key => $s)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $s->ujian->nama_ujian ?? 'Tanpa Paket Ujian' }}</td>
                                                <td>{{ Str::limit($s->pertanyaan, 60) }}</td>
                                                <td><span class="badge bg-label-success">{{ strtoupper($s->jawaban) }}</span></td>
                                                <td>
                                                    <a href="{{ url('/guru/soal/'.$s->id.'/edit') }}" class="btn btn-warning btn-sm p-1 me-1"><i class="bx bx-edit"></i></a>
                                                    <form action="{{ url('/guru/soal/'.$s->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm p-1" onclick="return confirm('Yakin ingin menghapus soal ini?')"><i class="bx bx-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-muted py-4">Belum ada data soal di database. silakan klik Tambah Soal.</td>
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
    </div>
</body>
</html>