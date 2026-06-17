<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    // Menampilkan daftar seluruh siswa
    public function index()
    {
        $siswas = DB::table('users')->where('role', 'siswa')->get();
        return view('guru.siswa.index', compact('siswas'));
    }

    // Form tambah siswa baru
    public function create()
    {
        return view('guru.siswa.create');
    }

    // Menyimpan data siswa baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        DB::table('users')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'siswa',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/guru/siswa')->with('success', 'Siswa berhasil ditambahkan!');
    }

    // Form edit data siswa
    public function edit($id)
    {
        $siswa = DB::table('users')->where('id', $id)->first();
        return view('guru.siswa.edit', compact('siswa'));
    }

    // Memperbarui data siswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'updated_at' => now(),
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        DB::table('users')->where('id', $id)->update($data);

        return redirect('/guru/siswa')->with('success', 'Data siswa berhasil diperbarui!');
    }

    // Menghapus data siswa
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/guru/siswa')->with('success', 'Data siswa berhasil dihapus!');
    }
}