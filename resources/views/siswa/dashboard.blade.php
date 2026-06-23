<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3>Selamat Datang, Siswa! 👋</h3>
                <hr>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Ujian yang Tersedia Hari Ini</h5>
                    </div>
                    <div class="card-body">
                        @if($ujianAktif->isEmpty())
                            <p class="text-muted">Tidak ada ujian aktif untuk hari ini.</p>
                        @else
                            <div class="list-group">
                                @foreach($ujianAktif as $uj)
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6>{{ $uj->{'Nama Ujian'} }}</h6>
                                            <small class="text-muted">Jam: {{ $uj->mulai_ujian }} - {{ $uj->selesai_ujian }}</small>
                                        </div>
                                        <a href="{{ route('siswa.ujian', $uj->id_ujian) }}" class="btn btn-success btn-sm">Mulai Ujian</a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Riwayat Nilai & Rekomendasi Kampus</h5>
                    </div>
                    <div class="card-body">
                        @if($riwayatNilai->isEmpty())
                            <p class="text-muted">Belum ada riwayat ujian.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Ujian</th>
                                            <th>Total Nilai</th>
                                            <th>Rekomendasi Kampus / Sekolah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($riwayatNilai as $nilai)
                                            <tr>
                                                <td>{{ $nilai->ujian->{'Nama Ujian'} }}</td>
                                                <td><span class="badge bg-primary fs-6">{{ $nilai->total_nilai }}</span></td>
                                                <td><strong>{{ $nilai->rekomendasi }}</strong></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>