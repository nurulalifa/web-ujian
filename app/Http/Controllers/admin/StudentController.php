<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;

use App\Models\Schools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index() {
        $students = Student::with('school')->get();
        $schools = Schools::all();
        return view('admin.students.index', compact('students', 'schools'));
    }

    public function store(Request $request) {
        $request->validate([
            'school_id' => 'required',
            'nisn' => 'required|unique:students',
            'name' => 'required',
            'username' => 'required|unique:students',
            'password' => 'required',
        ]);

        Student::create([
            'school_id' => $request->school_id,
            'nisn' => $request->nisn,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function import(Request $request) {
        $request->validate(['file' => 'required|mimes:csv,txt']);

        $file = fopen($request->file('file')->getRealPath(), 'r');
        fgetcsv($file); // Melewati baris pertama (header)

        while (($row = fgetcsv($file, 1000, ",")) !== FALSE) {
            Student::create([
                'school_id' => $row[0], // ID Sekolah harus sesuai di DB
                'nisn'      => $row[1],
                'name'      => $row[2],
                'username'  => $row[3],
                'password'  => Hash::make($row[4]),
            ]);
        }
        fclose($file);

        return redirect()->back()->with('success', 'Data siswa berhasil diimport.');
    }

    // Tambahkan method destroy() untuk hapus siswa
    public function destroy(Student $student) {
        $student->delete();
        return redirect()->back()->with('success', 'Siswa berhasil dihapus.');
    }
}
