@extends('layouts.app')
@section('content')
<div class="card p-4 border-0 shadow-sm bg-white">
    <h5 class="fw-bold mb-3">Status Pemantauan Siswa</h5>
    <table class="table table-striped">
        <thead><tr><th>Nama Siswa</th><th>Email</th><th>No HP / WA</th><th>Status</th></tr></thead>
        <tbody>
            @foreach($siswas ?? [] as $s)
            <tr>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->email }}</td>
                <td>{{ $s->no_hp }}</td>
                <td><span class="badge bg-success">Terdaftar</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection