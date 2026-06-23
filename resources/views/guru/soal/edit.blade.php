<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Soal - Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        body { background-color: #f5f5f9; font-family: 'Public Sans', sans-serif; color: #566a7f; }
        .sidebar { width: 260px; background: #fff; min-height: 100vh; position: fixed; box-shadow: 0 0.125rem 0.25rem rgba(161, 172, 184, 0.4); }
        .brand { padding: 1.5rem; font-size: 1.5rem; font-weight: 700; color: #696cff; text-transform: uppercase; text-decoration: none; display: block; }
        .menu-list { list-style: none; padding: 0 0.75rem; }
        .menu-item a { display: flex; align-items: center; padding: 0.625rem 1rem; color: #697a8d; text-decoration: none; border-radius: 0.375rem; margin-bottom: 0.25rem; font-size: 0.9375rem; }
        .menu-item a:hover { background-color: rgba(105, 108, 255, 0.04); color: #696cff; }
        .menu-item.active a { background-color: rgba(105, 108, 255, 0.16) !important; color: #696cff !important; font-weight: 500; }
        .menu-item i { font-size: 1.3rem; margin-right: 0.5rem; }
        .main-content { margin-left: 260px; padding: 2rem; }
        .card { border: none; box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12); border-radius: 0.5rem; background: #fff; }
        .card-header { background: #fff; border-bottom: 1px solid #d9dee3; padding: 1.5rem; font-size: 1.125rem; font-weight: 500; color: #566a7f; }
        .form-label { color: #566a7f; font-weight: 600; font-size: 0.75rem; letter-spacing: 0.5px; text-transform: uppercase; }
        .form-control, .form-select { border: 1px solid #d9dee3; color: #697a8d; }
        .form-control:focus, .form-select:focus { border-color: #696cff; box-shadow: 0 0 0 0.2rem rgba(105, 108, 255, 0.25); }
        .btn-primary { background-color: #696cff; border-color: #696cff; }
        .btn-primary:hover { background-color: #5f61e6; border-color: #5f61e6; }
        .btn-secondary { background-color: #8592a3; border-color: #8592a3; color: #fff; }
        .btn-secondary:hover { background-color: #788393; border-color: #788393; color: #fff; }
    </style>
</head>
<body>

    <div class="sidebar">
        <a href="#" class="brand">web ujian</a>
        <ul class="menu-list">
            <li class="menu-item">
                <a href="{{ url('/guru/dashboard') }}"><i class='bx bx-home-circle'></i> Dashboard</a>
            </li>
            <li class="menu-item active">
                <a href="{{ url('/guru/soal') }}"><i class='bx bx-book-open'></i> Kelola Soal</a>
            </li>
            <li class="menu-item">
                <a href="{{ url('/guru/ujian') }}"><i class='bx bx-stopwatch'></i> Kontrol Ujian</a>
            </li>
            <li class="menu-item">
                <a href="{{ url('/guru/nilai') }}"><i class='bx bx-id-card'></i> Daftar Nilai</a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="container-fluid">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Guru / Kelola Soal /</span> Edit Soal</h4>

            <div class="card">
                <div class="card-header">Form Edit Data Soal</div>
                <div class="card-body p-4">
                    
                    <form action="{{ url('/guru/soal/' . $soal->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">HUBUNGKAN KE PAKET UJIAN</label>
                            <select name="ujian_id" class="form-select" required>
                                <option value="">-- Pilih Ujian --</option>
                                @foreach($ujians as $ujian)
                                    <option value="{{ $ujian->id }}" {{ $soal->ujian_id == $ujian->id ? 'selected' : '' }}>
                                        {{ $ujian->nama_ujian }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">PERTANYAAN SOAL</label>
                            <textarea name="soal" class="form-control" rows="4" required>{{ $soal->soal }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">PILIHAN A</label>
                                <input type="text" name="a" class="form-control" value="{{ $soal->a }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">PILIHAN B</label>
                                <input type="text" name="b" class="form-control" value="{{ $soal->b }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">PILIHAN C</label>
                                <input type="text" name="c" class="form-control" value="{{ $soal->c }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">PILIHAN D</label>
                                <input type="text" name="d" class="form-control" value="{{ $soal->d }}" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">KUNCI JAWABAN BENAR</label>
                            <select name="kunci" class="form-select" required>
                                <option value="A" {{ $soal->kunci == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ $soal->kunci == 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ $soal->kunci == 'C' ? 'selected' : '' }}>C</option>
                                <option value="D" {{ $soal->kunci == 'D' ? 'selected' : '' }}>D</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary px-4 me-2">Simpan Perubahan Soal</button>
                        <a href="{{ url('/guru/soal') }}" class="btn btn-secondary px-4">Kembali</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>
</html>