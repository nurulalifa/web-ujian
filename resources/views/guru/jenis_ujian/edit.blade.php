<h2>Edit Jenis Ujian</h2>

<form action="{{ route('jenis-ujian.update', $jenis->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nama_jenis" value="{{ $jenis->nama_jenis }}">

    <button type="submit">Update</button>
</form>