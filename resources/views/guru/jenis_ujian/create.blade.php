<h2>Tambah Jenis Ujian</h2>

<form action="{{ route('jenis-ujian.store') }}" method="POST">
    @csrf

    <input type="text" name="nama_jenis" placeholder="Nama Jenis">

    <button type="submit">Simpan</button>
</form>