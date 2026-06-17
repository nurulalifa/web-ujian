<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UjianController extends Controller
{
    // Menampilkan daftar seluruh paket ujian
    public function index()
    {
        $ujians = DB::table('ujian')->get();
        return view('guru.ujian.index', compact('ujians'));
    }

    // Form membuat paket ujian baru
    public function create()
    {
        return view('guru.ujian.create');
    }

    // Menyimpan paket ujian baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_ujian' => 'required|string|max:255',
            'tgl' => 'required|date',
            'mulai_ujian' => 'required',
            'selesai_ujian' => 'required',
        ]);

        DB::table('ujian')->insert([
            'nama_ujian' => $request->nama_ujian,
            'tgl' => $request->tgl,
            'mulai_ujian' => $request->mulai_ujian,
            'selesai_ujian' => $request->selesai_ujian,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/guru/ujian')->with('success', 'Paket ujian berhasil dibuat!');
    }

    // Form edit paket ujian
    public function edit($id)
    {
        $ujian = DB::table('ujian')->where('id', $id)->first();
        return view('guru.ujian.edit', compact('ujian'));
    }

    // Memperbarui data paket ujian
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ujian' => 'required|string|max:255',
            'tgl' => 'required|date',
            'mulai_ujian' => 'required',
            'selesai_ujian' => 'required',
        ]);

        DB::table('ujian')->where('id', $id)->update([
            'nama_ujian' => $request->nama_ujian,
            'tgl' => $request->tgl,
            'mulai_ujian' => $request->mulai_ujian,
            'selesai_ujian' => $request->selesai_ujian,
            'updated_at' => now(),
        ]);

        return redirect('/guru/ujian')->with('success', 'Paket ujian berhasil diperbarui!');
    }

    // Menghapus paket ujian beserta soal di dalamnya
    public function destroy($id)
    {
        // Opsional: Hapus soal yang terikat dengan ujian ini terlebih dahulu jika ada foreign key constraint
        DB::table('soal')->where('ujian_id', $id)->delete();
        
        DB::table('ujian')->where('id', $id)->delete();

        return redirect('/guru/ujian')->with('success', 'Paket ujian berhasil dihapus!');
    }
}