<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function index()
    {
        $examTypes = ExamType::orderBy('name', 'asc')->get();
        return view('admin.exam_types.index', compact('examTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:exam_types,name',
        ]);

        ExamType::create($request->all());

        return redirect()->back()->with('success', 'Jenis ujian baru berhasil ditambahkan.');
    }

    public function destroy(ExamType $examType)
    {
        // Menghapus jenis ujian akan menghapus soal terkait secara otomatis (cascade)
        $examType->delete();

        return redirect()->back()->with('success', 'Jenis ujian berhasil dihapus.');
    }
}