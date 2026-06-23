<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buat Jadwal Ujian - Guru</title>
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
                <ul class="menu-inner py-1">
                    <li class="menu-item">
                        <a href="{{ url('/guru/dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div>Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('/guru/soal') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-book-open"></i>
                            <div>Kelola Soal</div>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="{{ url('/guru/ujian') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-stopwatch"></i>
                            <div>Kontrol Ujian</div>
                        </a>
                    </li>
                </ul>
            </aside>

            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 py-4">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Guru / Kontrol Ujian /</span> Buat Jadwal</h4>

                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Form Pembuatan Jadwal Ujian</h5>
                                <a href="{{ url('/guru/ujian') }}" class="btn btn-secondary btn-sm">Kembali</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('/guru/ujian') }}" method="POST">
                                    @csrf
                                    
                                    <div class="mb-3">
                                        <label class="form-label" for="nama_ujian">Nama Ujian / Paket Ujian</label>
                                        <input type="text" class="form-control" id="nama_ujian" name="nama_ujian" placeholder="Contoh: UTBK Tryout 1" required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="sekolah_id">Target Sekolah</label>
                                        <select class="form-select" id="sekolah_id" name="sekolah_id" required>
                                            <option value="">-- Pilih Sekolah --</option>
                                            @foreach($sekolahs as $sekolah)
                                                <option value="{{ $sekolah->id }}">{{ $sekolah->nama_sekolah }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="tanggal">Tanggal Pelaksanaan</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" required />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="durasi">Durasi Ujian (Dalam Menit)</label>
                                            <input type="number" class="form-control" id="durasi" name="durasi" placeholder="Contoh: 90" min="1" required />
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary d-block w-100 mt-3">Simpan & Publikasikan Jadwal</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>