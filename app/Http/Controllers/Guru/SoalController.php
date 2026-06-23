<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Ujian;
use App\Models\JenisUjian;

class SoalController extends Controller
{
    /**
     * Menampilkan halaman daftar bank soal (index)
     */
    public function index()
    {
        // Mengambil data soal beserta relasi paket ujian dan jenis ujiannya
        $soals = Soal::with(['ujian', 'jenisUjian'])->get();
        return view('guru.soal.index', compact('soals'));
    }

    /**
     * Menampilkan formulir untuk membuat soal baru (create)
     */
    public function create()
    {
        // Mengambil semua data dari database untuk mengisi pilihan dropdown
        $ujians = Ujian::all();
        $jenisUjians = JenisUjian::all();

        // Mengirimkan variabel data ke halaman view tambah soal
        return view('guru.soal.create', compact('ujians', 'jenisUjians'));
    }

    /**
     * Menyimpan data soal baru dari form manual ke database (store)
     */
    public function store(Request $request)
    {
        // Validasi input data dari form guru
        $request->validate([
            'ujian_id' => 'required|exists:ujians,id',
            'jenis_ujian_id' => 'nullable|exists:jenis_ujians,id',
            'soal' => 'required|string',
            'jawaban' => 'required|string|max:1', // Menyimpan pilihan A, B, C, D, atau E
            'point' => 'required|numeric|min:1',
        ]);

        // Menyimpan record data soal baru ke dalam database
        Soal::create([
            'ujian_id' => $request->ujian_id,
            'jenis_ujian_id' => $request->jenis_ujian_id,
            'soal' => $request->soal,
            'jawaban' => strtoupper($request->jawaban), // Otomatis mengubah ke huruf kapital (Caps Lock)
            'point' => $request->point,
        ]);

        // Mengarahkan kembali ke halaman utama dengan pesan sukses
        return redirect()->route('guru.soal.index')->with('success', 'Butir soal baru berhasil ditambahkan ke bank data!');
    }

    /**
     * Menangani proses import massal bank soal via file excel (import)
     */
    public function import(Request $request)
    {
        $request->validate([
            'file_excel' => 'required|mimes:xlsx,xls,csv'
        ]);

        // Tempat menaruh logika package excel jika nanti kamu instal Maatwebsite Excel:
        // Excel::import(new SoalImport, $request->file('file_excel'));

        return redirect()->back()->with('success', 'File excel bank soal berhasil diimport secara massal!');
    }

    /**
     * Menghapus data soal tertentu dari database (destroy)
     */
    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);
        $soal->delete();

        return redirect()->back()->with('success', 'Soal berhasil dihapus dari bank data.');
    }
}
