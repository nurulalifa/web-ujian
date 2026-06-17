<h2>Jenis Ujian</h2>

<a href="{{ route('jenis-ujian.create') }}">+ Tambah</a>

<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Jenis</th>
        <th>Aksi</th>
    </tr>

    @foreach($jenis as $j)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $j->nama_jenis }}</td>
        <td>
            <a href="{{ route('jenis-ujian.edit', $j->id) }}">Edit</a>

            <form action="{{ route('jenis-ujian.destroy', $j->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>