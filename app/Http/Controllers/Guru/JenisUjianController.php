<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\JenisUjian;
use Illuminate\Http\Request;

class JenisUjianController extends Controller
{
    public function index()
    {
        $jenis = JenisUjian::all();
        return view('guru.jenis_ujian.index', compact('jenis'));
    }

    public function create()
    {
        return view('guru.jenis_ujian.create');
    }

    public function store(Request $request)
    {
        JenisUjian::create([
            'nama_jenis' => $request->nama_jenis
        ]);

        return redirect()->route('jenis-ujian.index')
            ->with('success', 'Jenis ujian berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jenis = JenisUjian::findOrFail($id);
        return view('guru.jenis_ujian.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $jenis = JenisUjian::findOrFail($id);
        $jenis->update([
            'nama_jenis' => $request->nama_jenis
        ]);

        return redirect()->route('jenis-ujian.index')
            ->with('success', 'Berhasil diupdate');
    }

    public function destroy($id)
    {
        JenisUjian::destroy($id);

        return redirect()->route('jenis-ujian.index')
            ->with('success', 'Berhasil dihapus');
    }
}