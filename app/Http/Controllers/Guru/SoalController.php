<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Soal;
use App\Models\Ujian;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * 1. Menampilkan Semua Daftar Soal
     */
    public function index()
    {
        $soals = Soal::latest()->get();
        return view('guru.soal.index', compact('soals'));
    }

    /**
     * 2. Menampilkan Form Tambah Soal Baru
     */
    public function create()
    {
        $ujians = Ujian::all();
        return view('guru.soal.create', compact('ujians'));
    }

    /**
     * 3. Menyimpan Soal Baru ke Database
     */
    public function store(Request $request)
    {
        $request->validate([
            'ujian_id' => 'required',
            'soal'     => 'required',
            'a'        => 'required',
            'b'        => 'required',
            'c'        => 'required',
            'd'        => 'required',
            'kunci'    => 'required',
        ]);

        Soal::create($request->all());

        return redirect('/guru/soal')->with('sukses', 'Soal berhasil ditambahkan!');
    }

    /**
     * 4. Menampilkan Form Edit Soal (Mengatasi Error Method Does Not Exist)
     */
    public function edit($id)
    {
        // Mencari data soal berdasarkan ID yang dipilih
        $soal = Soal::findOrFail($id);
        
        // Mengambil semua paket ujian untuk dropdown pilihan
        $ujians = Ujian::all();

        // Mengarahkan ke file resources/views/guru/soal/edit.blade.php
        return view('guru.soal.edit', compact('soal', 'ujians'));
    }

    /**
     * 5. Menyimpan Perubahan Data Soal ke Database
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ujian_id' => 'required',
            'soal'     => 'required',
            'a'        => 'required',
            'b'        => 'required',
            'c'        => 'required',
            'd'        => 'required',
            'kunci'    => 'required',
        ]);

        $soal = Soal::findOrFail($id);
        $soal->update($request->all());

        return redirect('/guru/soal')->with('sukses', 'Data soal berhasil diperbarui!');
    }

    /**
     * 6. Menghapus Soal
     */
    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);
        $soal->delete();

        return redirect('/guru/soal')->with('sukses', 'Soal berhasil dihapus!');
    }
}