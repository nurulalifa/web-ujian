<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembar Ujian - {{ $ujian->nama_ujian ?? 'Simulasi UTBK' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card-header { background-color: #dc3545; color: white; }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            
            <div class="card mb-4 shadow-sm">
                <div class="card-header text-center py-3">
                    <h4 class="mb-0 fw-bold">{{ $ujian->nama_ujian ?? 'Simulasi UTBK 2026' }}</h4>
                </div>
                <div class="card-body bg-light">
                    <small class="text-muted">Mata Pelajaran / Sesi: <strong>Potensi Kognitif & Penalaran Matematika</strong></small>
                </div>
            </div>

            <form action="{{ url('siswa/ujian/' . ($ujian->id ?? 1) . '/selesai') }}" method="POST">
                @csrf

                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <p class="fw-bold">Soal 1. Jika $x + 3 = 7$, maka berapakah nilai dari $2x + 1$?</p>
                        <div class="form-check my-2">
                            <input class="form-check-input" type="radio" name="jawaban[1]" id="q1_a" value="A" required>
                            <label class="form-check-label" for="q1_a">A. 5</label>
                        </div>
                        <div class="form-check my-2">
                            <input class="form-check-input" type="radio" name="jawaban[1]" id="q1_b" value="B">
                            <label class="form-check-label" for="q1_b">B. 7</label>
                        </div>
                        <div class="form-check my-2">
                            <input class="form-check-input" type="radio" name="jawaban[1]" id="q1_c" value="C">
                            <label class="form-check-label" for="q1_c">C. 9</label>
                        </div>
                        <div class="form-check my-2">
                            <input class="form-check-input" type="radio" name="jawaban[1]" id="q1_d" value="D">
                            <label class="form-check-label" for="q1_d">D. 11</label>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <p class="fw-bold">Soal 2. Manakah kata di bawah ini yang merupakan sinonim dari kata "Ekuivalen"?</p>
                        <div class="form-check my-2">
                            <input class="form-check-input" type="radio" name="jawaban[2]" id="q2_a" value="A" required>
                            <label class="form-check-label" for="q2_a">A. Berbeda</label>
                        </div>
                        <div class="form-check my-2">
                            <input class="form-check-input" type="radio" name="jawaban[2]" id="q2_b" value="B">
                            <label class="form-check-label" for="q2_b">B. Sebanding / Sama Nilai</label>
                        </div>
                        <div class="form-check my-2">
                            <input class="form-check-input" type="radio" name="jawaban[2]" id="q2_c" value="C">
                            <label class="form-check-label" for="q2_c">C. Berlawanan</label>
                        </div>
                        <div class="form-check my-2">
                            <input class="form-check-input" type="radio" name="jawaban[2]" id="q2_d" value="D">
                            <label class="form-check-label" for="q2_d">D. Mutlak</label>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-danger btn-lg px-5 shadow">
                        Selesai & Kirim Ujian
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

</body>
</html>