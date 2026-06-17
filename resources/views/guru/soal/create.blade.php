<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Soal - Guru</title>
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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Guru / Kelola Soal /</span> Tambah Soal</h4>

                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Form Input Soal Baru</h5>
                                <a href="{{ url('/guru/soal') }}" class="btn btn-secondary btn-sm">Kembali</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('/guru/soal') }}" method="POST">
                                    @csrf
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Hubungkan ke Paket Ujian</label>
                                        <select name="ujian_id" class="form-select" required>
                                            <option value="">-- Pilih Ujian --</option>
                                            @foreach($ujians as $u)
                                                <option value="{{ $u->id }}">{{ $u->nama_ujian }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Pertanyaan Soal</label>
                                        <textarea name="pertanyaan" class="form-control" rows="4" placeholder="Tuliskan soal ujian di sini..." required></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Pilihan A</label>
                                            <input type="text" name="a" class="form-control" placeholder="Jawaban A" required />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Pilihan B</label>
                                            <input type="text" name="b" class="form-control" placeholder="Jawaban B" required />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Pilihan C</label>
                                            <input type="text" name="c" class="form-control" placeholder="Jawaban C" required />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Pilihan D</label>
                                            <input type="text" name="d" class="form-control" placeholder="Jawaban D" required />
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Kunci Jawaban Benar</label>
                                        <select name="jawaban" class="form-select" required>
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary d-block w-100 mt-4">Simpan Pertanyaan</button>
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