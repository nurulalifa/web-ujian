<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisUjian; // Membaca tabel jenis_ujians / sub_ujian
use App\Models\ExamType; // Membaca tabel exam_types / sub_ujian
class JenisUjianController extends Controller
{
    public function index()
    {
        $jenisUjians = ExamType::all();
        return view('guru.jenis_ujian.index', compact('jenisUjians'));
    }

    public function store(Request $request)
{
    // $request->validate([
    //     'name' => 'required|string|max:255'
    // ]);

    // Menginput data langsung menggunakan class Model yang sudah dipasang $fillable
    ExamType::create([
        'name' => $request->name
    ]);

    return redirect()->back()->with('success', 'Kategori sub ujian baru berhasil disimpan!');
}

    public function destroy($id)
    {
        JenisUjian::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Jenis ujian berhasil dihapus.');
    }
}
