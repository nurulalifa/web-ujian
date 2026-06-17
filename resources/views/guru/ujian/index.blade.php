<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kontrol Ujian - Guru</title>
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
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 py-4">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Guru /</span> Kontrol Ujian</h4>

                        @if(session('sukses'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ session('sukses') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Pelaksanaan Ujian AKTIF</h5>
                                <a href="{{ url('/guru/ujian/create') }}" class="btn btn-primary btn-sm"><i class="bx bx-plus"></i> Buat Jadwal Ujian</a>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Ujian</th>
                                            <th>Tanggal & Durasi</th>
                                            <th>Status Pelaksanaan</th>
                                            <th>Aksi Kontrol</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @forelse($ujians as $key => $u)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <strong>{{ $u->nama_ujian }}</strong><br>
                                                    <small class="text-muted">Sekolah: {{ $u->sekolah->nama_sekolah ?? 'Semua Sekolah' }}</small>
                                                </td>
                                                <td>
                                                    {{ $u->tanggal }}<br>
                                                    <small class="text-primary"><i class="bx bx-time"></i> {{ $u->durasi }} Menit</small>
                                                </td>
                                                <td>
                                                    @if(!$u->mulai_ujian && !$u->selesai_ujian)
                                                        <span class="badge bg-label-secondary">Belum Mulai</span>
                                                    @elseif($u->mulai_ujian && !$u->selesai_ujian)
                                                        <span class="badge bg-label-success animate-flash">Sedang Berjalan</span><br>
                                                        <small class="text-muted">Mulai: {{ date('H:i', strtotime($u->mulai_ujian)) }}</small>
                                                    @else
                                                        <span class="badge bg-label-danger">Selesai / Ditutup</span><br>
                                                        <small class="text-muted">Selesai: {{ date('H:i', strtotime($u->selesai_ujian)) }}</small>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(!$u->mulai_ujian)
                                                        <form action="{{ url('/guru/ujian/'.$u->id.'/mulai') }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success btn-sm me-1" onclick="return confirm('Mulai ujian sekarang?')">
                                                                <i class="bx bx-play"></i> Mulai
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if($u->mulai_ujian && !$u->selesai_ujian)
                                                        <form action="{{ url('/guru/ujian/'.$u->id.'/selesai') }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Paksa selesaikan ujian sekarang?')">
                                                                <i class="bx bx-stop"></i> Selesai
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if($u->selesai_ujian)
                                                        <button class="btn btn-secondary btn-sm" disabled><i class="bx bx-lock"></i> Terkunci</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Belum ada jadwal pelaksanaan ujian.</td>
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